<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\db\Query;
use yii\helpers\Console;
use common\models\SettingWpost;

use console\tools\CurlClient;
use console\tools\SymfonyParser;
use Symfony\Component\DomCrawler\Link;

use SimpleXMLElement;

class WpostController extends Controller
{
    const IP = '46.36.220.30';

    public function actionIndex()
    {
        $active = SettingWpost::find()->where(['status' => SettingWpost::ACTIVE])->all();
        if (count($active) == 0) {
            self::error('No is active');
            return;
        }
        if (count($active) == 1) {
            $this->Wpost($active[0]->id);
        }
        if (count($active) > 1) {
            $ind = rand(0, count($active)-1);
            $this->Wpost($active[$ind]->id);
        }

    }

    public function Wpost($id)
    {
        sleep(rand(1,60));

        $setting = SettingWpost::find()->where(['id' => $id])->limit(1)->one();
        if ($setting === null) {
            self::error('Setting is null');
            return;
        }
        $position = $setting->position;
        if ($position === null) {
            self::error('Position is null');
            return;
        }
        if ($position->current == $position->end) {
            self::success('Process is ended');
            return;
        }
        $key = (new Query())->from($setting->keys)->where(['id' => $position->current])->limit(1)->one(Yii::$app->db5);
        if ($key === null) {
            self::error('The table of keys is null');
            return;
        }
        
        $query = str_replace(' ', '+', $key['key']);
        $user = $setting->user;
        $psw = $this->getPassword($setting->hash);
        $url = 'http://'.$setting->domain.'/xmlrpc.php';
        if (isset($key['categories'])) {
            $key_tags = $key['categories'];
        }else if (isset($key['key'])) {
            $key_tags = $key['key'];
        }
        $tags = $this->getTags($key_tags,$this->cutTags($this->xmlToArray($this->getTerms($url, $user, $psw,'post_tag'))));
        $result_google = $this->parsePage($query);//$this->google($query, self::IP, 8);
        $content_post = $this->createContentPost($result_google);
        if ($content_post !== NULL) {
            $content_wp = array(
                'post_type' => 'post',
                'post_content' => $content_post,
                'post_title' => ucfirst($key['key']),
                'post_status' => 'publish',
                'terms' => [
                   'post_tag' => $tags,
                ],
            );
            $wp_res = $this->getResponseError($this->xmlRpc($url, $content_wp, $user, $psw));
        }

        $this->nextPosition($setting);
    }

    protected function getPassword($hash)
    {
        if ($hash == '16bc5988cc76c9185861e377d28ba12e') {
            $psw = 'gfhjkm21';
        }
        return $psw;
    }

    public function google($query,$ip = '93.120.172.173',$rsz = 8)
    {
        $url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$query."&userip=".$ip."&rsz=".$rsz;
        var_dump( $url);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //curl_setopt($ch, CURLOPT_REFERER, /* Enter the URL of your site here */);

        $body = curl_exec($ch);
        var_dump($body);

        curl_close($ch);

        $json = json_decode($body);
        return $json;
    }

    protected static function success($message)
    {
        Console::output(Console::ansiFormat($message, [Console::FG_GREEN]));
    }

    protected static function error($message)
    {
        Console::output(Console::ansiFormat($message, [Console::FG_RED]));
    }
    public function parsePage($search)
    {
        $results = [];
        if (isset($search)) {
            $url = 'http://www.google.com/search?hl=en&output=search&q='.$search;
            $client = new CurlClient();
            $content = $client->setUrl($url)->getContentWithInfo();
            if ($content['info']['http_code'] == 200) {
                $results['title'] = $this->parseProperty($client,$content,'h3.r > a');
                $results['description'] = $this->parseProperty($client,$content,'span.st','html');
                $results['url'] = $this->parseProperty($client,$content,'h3.r > a','url');
                
            }
        }
        
        return $results;
    }

    public function parseProperty($client,$content, $pattern, $type = 'text')
    {
        $out = [];
        $parser = new SymfonyParser();
        if ($type == 'text') {
            $nodes = $parser->in($content['result'], $client->getContentType())->find($pattern); 
            if ($nodes != NULL) {
                foreach ($nodes as $node) {
                    $out[] = $node->textContent;
                }
            } 
        }
        if ($type == 'html') {
            $nodes = $parser->in($content['result'], $client->getContentType())->findHtml($pattern); 
            if ($nodes != NULL) {
                foreach ($nodes as $node) {
                    $out[] = $node;
                }
            } 
        }
        if ($type == 'url') {
            $urls = $parser->in($content['result'], $client->getContentType())->findHref($pattern);
            if (!empty($urls)) {
                foreach ($urls as $url) {
                    $out[] = str_replace('/url?q=', '', $url);
                }
            }
        }
        
        return $out; 
    }

    public function createContentPost($gcontent)
    {
        $out = '';
        if (!empty($gcontent['title'])) {
            foreach ($gcontent['title'] as $key => $item) {
                $out .= '<p><strong>'.$item.'</strong></p>';
                if (isset($gcontent['description'][$key])) {
                    $out .= '<p>'.$gcontent['description'][$key].'</p>';
                }
                if (isset($gcontent['url'][$key])) {
                    $out .= '<p class = "text-right"><a href="'.$gcontent['url'][$key].'">[more]</a></p>';
                }
                
            }
        }
        return $out;
    }

    public function xmlRpc($url, $content, $user, $psw)
    {
        // initialize curl
        $ch = curl_init();
        // set url ie path to xmlrpc.php
        curl_setopt($ch, CURLOPT_URL, $url);
        // xmlrpc only supports post requests
        curl_setopt($ch, CURLOPT_POST, true);
        // return transfear
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // setup post data
        
        // parameters are blog_id, username, password and content
        $params = array(1, $user, $psw, $content);
        $params = xmlrpc_encode_request('wp.newPost', $params);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        // execute the request
        $response = curl_exec($ch);
        // shutdown curl
        curl_close($ch);
        return $response;
    }

    public function getResponseError($xml)
    {
        $out = '';
        $obj = new SimpleXMLElement($xml);
        if ($obj->fault != NULL) {
            if ($obj->fault->value != NULL) {
                if ($obj->fault->value->struct != NULL) {
                    if ($obj->fault->value->struct->member != NULL) {
                        foreach ($obj->fault->value->struct->member as $member) {
                            if ($member->value->int != NULL) {
                                $out .= 'Code: '.$member->value->int.' ';
                            }
                            if ($member->value->string != NULL) {
                                $out .= 'Description: '.$member->value->string.' ';
                            }
                        }            
                    } 
                }
            }
        }
        return $out;
    }

    public function nextPosition($setting)
    {
        $position = $setting->position;
        $next_key = (new Query())->from($setting->keys)->where(['and','id > :id'],[':id' => $position->current])->limit(1)->one(Yii::$app->db5);
        $position->current = $next_key['id'];
        $position->save();
        return;
    }

    public function getTagsFromTableKey($table,$column)
    {
        $out = [];
        $column_data = (new Query())->from($table)->select($column)->all(Yii::$app->db5);
        
        if (!empty($column_data)) {
            foreach ($column_data as $single) {
                if (is_string($single[$column])) {
                    $arr = explode(',', $single[$column]);
                    if (!empty($arr)) {
                        foreach ($arr as $tag) {
                            if (!in_array(trim($tag),$out)) {
                                $out[] = trim($tag);
                            }
                        }
                    }
                }
                
            }
        }
        return $out;
    }

    public function actionNewTag($id)
    {
        $setting = SettingWpost::findOne($id);
        if ($setting === null) {
            self::error('Setting is null');
            return;
        }
        $user = $setting->user;
        $psw = $this->getPassword($setting->hash);
        $url = 'http://'.$setting->domain.'/xmlrpc.php';

        $tags = $this->getTagsFromTableKey($setting->keys,'categories');
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $this->newTags($url, $tag, $user, $psw);
            }    
        }         
    }
    public function newTags($url, $tag, $user, $psw)
    {
        // initialize curl
        $ch = curl_init();
        // set url ie path to xmlrpc.php
        curl_setopt($ch, CURLOPT_URL, $url);
        // xmlrpc only supports post requests
        curl_setopt($ch, CURLOPT_POST, true);
        // return transfear
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // setup post data
        $content = [
            'name' => $tag,
            'taxonomy' => 'post_tag',
        ];
        // parameters are blog_id, username, password and content
        $params = array(1, $user, $psw, $content);
        $params = xmlrpc_encode_request('wp.newTerm', $params);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        // execute the request
        $response = curl_exec($ch);
        // shutdown curl
        curl_close($ch);

        return $response;
    }

    public function getTags($key, $arr)
    {
        $out = [];
        if ($arr != NULL && $key != NULL) {
            foreach ($arr as $item) {
                if (strpos($key, $item['name']) !== FALSE) {
                    $out[] = $item['id'];
                }
            }
        }
        return $out;
    }

    public function cutTags($arr)
    {
        $out = [];
        $i = 0;
        if ($arr['params'] != NULL) {
            if ($arr['params']['param'] != NULL) {
                if ($arr['params']['param']['value'] != NULL) {
                    if ($arr['params']['param']['value']['array'] != NULL) {
                        if ($arr['params']['param']['value']['array']['data'] != NULL) {
                            if ($arr['params']['param']['value']['array']['data']['value'] != NULL) {
                                foreach ($arr['params']['param']['value']['array']['data']['value'] as $key => $value) {
                                    if ($value['struct'] != NULL) {
                                        if ($value['struct']['member'] != NULL) {
                                            foreach ($value['struct']['member'] as $key2 => $value2) {
                                                if ($value2 != NULL) {
                                                    if ($value2['name'] == 'term_id') {
                                                        $out[$i]['id'] = $value2['value']['string'];
                                                    }
                                                    if ($value2['name'] == 'name') {
                                                        $out[$i]['name'] = $value2['value']['string'];
                                                    }
                                                    
                                                }
                                            }
                                        }
                                    }
                                    $i++;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $out;
    }

    public function xmlToArray($xml)
    {
        return json_decode(json_encode(simplexml_load_string($xml)),TRUE);
    }

    public function getTerms($url, $user, $psw,$taxonomy)
    {
        // initialize curl
        $ch = curl_init();
        // set url ie path to xmlrpc.php
        curl_setopt($ch, CURLOPT_URL, $url);
        // xmlrpc only supports post requests
        curl_setopt($ch, CURLOPT_POST, true);
        // return transfear
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // setup post data
       
        // parameters are blog_id, username, password and content
        $params = array(1, $user, $psw, $taxonomy);
        $params = xmlrpc_encode_request('wp.getTerms', $params);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        // execute the request
        $response = curl_exec($ch);
        // shutdown curl
        curl_close($ch);

        return $response;
    }
}
?>