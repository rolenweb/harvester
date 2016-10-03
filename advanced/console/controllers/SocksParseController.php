<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\db\Query;
use yii\helpers\Console;

use console\controllers\CheckSocksController;

use common\models\socks\Socks;

use console\tools\CurlClient;
use console\tools\SymfonyParser;
use Symfony\Component\DomCrawler\Link;


class SocksParseController extends Controller
{
    
    public function actionIndex()
    {
        self::success('Parse: https://www.socks-proxy.net/');
        $this->socksProxyNet();
        
        self::success('Parse: http://hideme.ru/proxy-list/?maxtime=2000&type=45&anon=34');
        $this->hideme();
    }

    public function socksProxyNet()
    {
        $url = 'https://www.socks-proxy.net/';
        $content = $this->parsePage($url);
        $ip = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(1)');
        if (empty($ip) === false) {
            $port = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(2)');
            $code = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(3)');
            $country = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(4)');
            $version = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(5)');
            $anonymity = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(6)');
            $https = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(7)');
            foreach ($ip as $key => $item) {
                $type = $this->getType($version[$key]);
                $status = $this->status(CheckSocksController::URL,$type,$item,$port[$key]);
                self::success($item.':'.$port[$key].' - '.$status);
                if ($status == '200') {
                    if (Socks::findOne(['ip' => $item]) === null) {
                        $socks = new Socks();
                        $socks->ip = $item;
                        if (empty($port[$key]) === false) {
                            $socks->port = $port[$key];
                        }
                        if (empty($code[$key]) === false) {
                            $socks->code = $code[$key];
                        }
                        if (empty($country[$key]) === false) {
                            $socks->country = $country[$key];
                        }
                        if (empty($version[$key]) === false) {
                            $socks->version = $version[$key];
                        }
                        if (empty($anonymity[$key]) === false) {
                            $socks->anonymity = $anonymity[$key];
                        }
                        if (empty($https[$key]) === false) {
                            $socks->https = $https[$key];
                        }

                        $socks->save();
                    }
                }
                
            }
        }
    }

    public function hideme()
    {
        $url = 'http://hideme.ru/proxy-list/?maxtime=2000&type=45&anon=34';
        $content = $this->parsePage($url);
        $ip = $this->parseProperty($content,'string','table.proxy__t tbody tr td:nth-of-type(1)');
        
        if (empty($ip) === false) {
            $port = $this->parseProperty($content,'string','table.proxy__t tbody tr td:nth-of-type(2)');
            //$code = $this->parseProperty($content,'string','table#proxylisttable tbody tr td:nth-of-type(3)');
            $country = $this->parseProperty($content,'string','table.proxy__t tbody tr td:nth-of-type(3)');

            $version = $this->parseProperty($content,'string','table.proxy__t tbody tr td:nth-of-type(5)');

            $anonymity = $this->parseProperty($content, 'string','table.proxy__t tbody tr td:nth-of-type(6)');
                        
            foreach ($ip as $key => $item) {
                $type = $this->getType($version[$key]);
                $status = $this->status(CheckSocksController::URL,$type,$item,$port[$key]);
                self::success($item.':'.$port[$key].' - '.$status);
                if ($status == '200') {
                    if (Socks::findOne(['ip' => $item]) === null) {
                        $socks = new Socks();
                        $socks->ip = $item;
                        if (empty($port[$key]) === false) {
                            $socks->port = $port[$key];
                        }
                        if (empty($code[$key]) === false) {
                            $socks->code = $code[$key];
                        }
                        if (empty($country[$key]) === false) {
                            $socks->country = $country[$key];
                        }
                        if (empty($version[$key]) === false) {
                            $socks->version = $version[$key];
                        }
                        if (empty($anonymity[$key]) === false) {
                            $socks->anonymity = $anonymity[$key];
                        }
                        if (empty($https[$key]) === false) {
                            $socks->https = $https[$key];
                        }

                        $socks->save();
                    }
                }
                
            }
        }
    }

    public function parsePage($url)
    {   
        $content = (new CurlClient())->setUrl($url)->getContentWithInfo();
        if (empty($content['info']['http_code']) === false) {
            if ($content['info']['http_code'] === 200) {
                if (empty($content['result']) === false) {
                    return $content['result'];
                }
            }
        }
        return;
    }

    public function parseProperty($content,$type,$pattern,$url = null)
    {
        $parser = (new SymfonyParser)->in($content, (new CurlClient())->getContentType());
        $result = [];
        if ($type === 'link') {
            $nodes = $parser->find($pattern);
            if (empty($nodes) === false) {
                foreach ($nodes as $node) {
                    $link = new Link($node, $url, 'GET');
                    $result[] = $link->getUri();
                }       
            }
        }
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