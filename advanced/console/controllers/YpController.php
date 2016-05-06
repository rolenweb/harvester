<?php
namespace console\controllers;

use yii\console\Controller;
use console\tools\CurlClient;
use console\tools\SymfonyParser;
use Symfony\Component\DomCrawler\Link;

use common\models\ScheduleYp;
use common\models\PositionYp;
use common\models\CityUs;
use common\models\KeysYp;
use common\models\PropertyYp;

class YpController extends Controller
{
    
    public function actionIndex($id)
    {
        $schedule = ScheduleYp::findOne($id);
        if ($schedule !== NULL && $schedule->status == ScheduleYp::ACTIVE) {
            if ($schedule->end !== NULL || ($schedule->start === NULL && $schedule->end === NULL)) {
                ScheduleYp::start($id);
                $position = PositionYp::find()->where(['key_id' => $schedule->key_id])->limit(1)->one();
                $key = $schedule->key;
                if ($position !== NULL) {
                    if ($key !== NULL) {
                        $city = CityUs::findOne($position->current);
                        if ($city !== NULL) {
                            $content = $this->loadPage($key->key, str_replace(' ', '+', $city->name).'%2C+'.$city->state);

                            if ($content['info']['http_code'] == 200) {
                                $n_pages = $this->getNpage($content);
                                $pages = $this->parsePage($key->key, str_replace(' ', '+', $city->name).'%2C+'.$city->state, $n_pages, 'div.info > h3.n > a');
                                
                                if ($pages !== NULL) {
                                    foreach ($pages as $pid => $page) {
                                        $this->parseProperty($key, $city, $page, $pid);
                                    }
                                    $this->changePosition($position);
                                }
                                
                            }
                        }
                    }
                }
                ScheduleYp::stop($id);
            }else{

            }
        }else{

        }
        
    }

    public function loadPage($search, $loc,$page = 1)
    {
        if (isset($search) && isset($loc)) {
            if ($page == 1 || $page === NULL) {
                $url = 'http://www.yellowpages.com/search?search_terms='.$search.'&geo_location_terms='.$loc;
            }else{
                $url = 'http://www.yellowpages.com/search?search_terms='.$search.'&geo_location_terms='.$loc.'&page='.$page;
            }
            
            $client = new CurlClient();
            return $client->setUrl($url)->getContentWithInfo(); 
        }
    }

    public function getNpage($content)
    {
        $n = 1;
        $pattern = 'div.pagination > p';
        $client = new CurlClient();
        $parser = new SymfonyParser();
        $result = $parser->in($content['result'], $client->getContentType())->find($pattern); 
        if (isset($result[0])) {
            preg_match( '/of (.*)results/' , $result[0]->textContent , $pm);
            if (isset($pm[1])) {
                $n = ceil((int)$pm[1]/30);
            }
        }
        
        return $n;

    }

    public function parsePage($search, $loc, $page, $pattern)
    {
        $out = [];
        for ($i=1; $i <= $page ; $i++) { 
            $content = $this->loadPage($search, $loc, $i);
            if ($content['info']['http_code'] == 200) {
                $client = new CurlClient();
                $parser = new SymfonyParser();
                $nodes = $parser->in($content['result'], $client->getContentType())->find($pattern);
                foreach ($nodes as $node) {
                    $link = new Link($node, 'http://www.yellowpages.com', 'GET');
                    $out[] = $link->getUri();
                }
            }    
            sleep(1);
        }
        return array_unique($out);
    }

    public function parseProperty($key, $city, $page, $pid)
    {
        $client = new CurlClient();
        $content = $client->setUrl($page)->getContentWithInfo(); 
        $results = [];
        if ($content['info']['http_code'] == 200) {
            if ($key->propertyTypes !== NULL) {
                foreach ($key->propertyTypes as $property) {
                    if ($property->type == 'string') {
                        $parser = new SymfonyParser();
                        $nodes = $parser->in($content['result'], $client->getContentType())->find($property->pattern); 
                        if ($nodes != NULL) {
                            foreach ($nodes as $node) {
                                $results[$property->id][] = $node->textContent;
                            }
                        }   
                    }
                    if ($property->type == 'url') {
                        $parser = new SymfonyParser();
                        $results[$property->id] = $parser->in($content['result'], $client->getContentType())->findHref($property->pattern);
                    }
                    if ($property->type == 'html') {
                        $parser = new SymfonyParser();
                        $nodes = $parser->in($content['result'], $client->getContentType())->findHtml($property->pattern); 
                        if ($nodes != NULL) {
                            foreach ($nodes as $node) {
                                $results[$property->id][] = $node;
                            }
                        }  
                    }
                    if ($property->type == 'image') {
                        
                    }
                }
                if (isset($results)) {
                    foreach ($results as $ptid => $result) {
                        if (isset($result)) {
                            foreach ($result as $item) {
                                $this->saveProperty($key,$city,$ptid, $item, $pid);
                            }
                        }
                    }
                }
            }
        }
    }

    public function saveProperty($key,$city,$ptid,$value, $pid)
    {
        $old_property = PropertyYp::find()->where([
                'key_id' => $key->id,
                'city_id' => $city->id,
                'property_type_id' => $ptid,
                'value' => $value,
                'number' => $pid,
            ])->limit(1)->one();
        if ($old_property === NULL) {
            $var = [];
            $var = [
                'key_id' => $key->id,
                'city_id' => $city->id,
                'property_type_id' => $ptid,
                'value' => $value,
                'number' => $pid,
            ];
            $new_property = new PropertyYp();
            $new_property->attributes = $var;
            $new_property->save();
        }
        return;
    }

    public function changePosition($position)
    {
        $next = CityUs::next($position->current);
        if ($next !== NULL) {
            $position->current = $next;
            $position->save();
        }
        return;
        
    }
}
?>