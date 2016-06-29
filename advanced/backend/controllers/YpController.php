<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use console\tools\CurlClient;
use console\tools\SymfonyParser;
use Symfony\Component\DomCrawler\Link;


/**
 * KeysYpController implements the CRUD actions for KeysYp model.
 */
class YpController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','parse-yp'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     * Lists all KeysYp models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        return $this->render('index', [
        ]);
    }

    public function actionParseYp($search,$city,$state,$page = 1)
    {
        $arr = [
            'search' => $search,
            'city' => $city,
            'state' => $state,
            'page' => $page,
        ];

        $property_type = [
            'title' => 'h3.n > a',
            'adr_street' => 'p.adr > span[itemprop = "streetAddress"]',
            'adr_city' => 'p.adr > span[itemprop = "addressLocality"]',
            'adr_state' => 'p.adr > span[itemprop = "addressRegion"]',
            'adr_post_code' => 'p.adr > span[itemprop = "postalCode"]',
            'phone' => 'div[itemprop = "telephone"]',
            'categories' => 'div.categories > a',
            'website' => 'div.links > a.track-visit-website',
            'more' => 'div.links > a.track-more-info',
        ];



        $content_yp = $this->loadPage(str_replace(' ', '+', $search), str_replace(' ', '+', $city).'%2C+'.$state, $page);
        if ($content_yp['info']['http_code'] == 200) {
            $n_pages = $this->getNpage($content_yp);
            $list_blocks = $this->parseProperty($content_yp['result'],'blocks','div.organic > div.result', 'html');
            if ($list_blocks != NULL) {
                $content_ready = [];
                foreach ($list_blocks as $id => $block) {
                    foreach ($property_type as $name => $property) {
                        if ($name == 'website') {
                            $content_ready[$id][$name] = $this->parseProperty($block,'blocks',$property, 'url');
                        }else if ($name == 'more') {
                            $content_ready[$id][$name] = $this->parseProperty($block,'blocks',$property, 'link');
                        }else{
                            $content_ready[$id][$name] = $this->parseProperty($block,'blocks',$property, 'text');
                            
                        }
                    }
                    
                }
            }else{
                $content_ready = [];
            }
        }
        return json_encode([
                'n_page' => $n_pages,
                'content_ready' => $content_ready,
            ]);
    }

    public function loadPage($search, $loc,$page = 1)
    {
        if (isset($search) && isset($loc)) {
            if ($page == 1 || $page === NULL) {
                $url = 'http://www.yellowpages.com/search?search_terms='.$search.'&geo_location_terms='.$loc;
            }else{
                $url = 'http://www.yellowpages.com/search?search_terms='.$search.'&geo_location_terms='.$loc.'&page='.$page;
            }
            //var_dump($url);
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

    public function parseProperty($content,$name,$pattern,$type)
    {
        $out = [];
        $parser = new SymfonyParser();
        $client = new CurlClient();
        if ($type == 'html') {
            $nodes = $parser->in($content, $client->getContentType())->findHtml($pattern); 
            if ($nodes != NULL) {
                foreach ($nodes as $node) {
                    $out[] = $node;
                }
            }  
        }
        if ($type == 'text') {
            $nodes = $parser->in($content, $client->getContentType())->find($pattern); 
            if ($nodes != NULL) {
                foreach ($nodes as $node) {
                    $out[] = $node->textContent;
                }
            }   
        }
        if ($type == 'url') {
            $out[] = $parser->in($content, $client->getContentType())->findHref($pattern);  
        }
        if ($type == 'link') {
            $nodes = $parser->in($content, $client->getContentType())->find($pattern);
            foreach ($nodes as $node) {
                $link = new Link($node, 'http://www.yellowpages.com', 'GET');
                $out[] = $link->getUri();
            }
        }
        return $out;
    }
}
