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


class CheckSocksController extends Controller
{
    
    const URL = 'http://checkproxy.devsym.ru/';

    public function actionIndex()
    {

        $list = Socks::find()->all();
        $url = self::URL;
        foreach ($list as $socks) {
            $type = $this->getType($socks->version);
            $ip = $socks->ip;
            $port = $socks->port;
            $status = $this->status($url,$type,$ip,$port);
            self::success($socks->ip.':'.$port.' - '.$status); 
            if ($status != '200') {
                $socks->delete();
            }
            
            
        }
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