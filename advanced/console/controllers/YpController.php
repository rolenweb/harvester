<?php
namespace console\controllers;

use yii\console\Controller;
use console\tools\CurlClient;
use console\tools\SymfonyParser;
use Symfony\Component\DomCrawler\Link;

class YpController extends Controller
{
    
    public function actionIndex()
    {
        
        $this->loadPage('pharmacy', 'Abilene%2C+KS');
        
    }

    public function loadPage($search, $loc)
    {
        if (isset($search) && isset($loc)) {
            $url = 'http://www.yellowpages.com/search?search_terms='.$search.'&geo_location_terms='.$loc;
            $client = new CurlClient();
            $content = $client->setUrl($url)->getContentWithInfo(); 
            var_dump($content);
        }
    }
}
?>