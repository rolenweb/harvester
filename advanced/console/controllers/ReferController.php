<?php
namespace console\controllers;

use yii\console\Controller;

class ReferController extends Controller
{
    
    public function actionIndex($mode = 'refer')
    {
        if ($mode == 'refer') {
            $this->refer('http://japanesecomposers.info/ja/modules/popnupblog/index.php?postid=243','http://sedrfty777.com');
        }
        if ($mode == 'checker') {
            var_dump($this->checker('http://japanesecomposers.info/ja/modules/popnupblog/index.php?postid=243'));
        }
        
    }

    public function refer($url, $referer)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_NOBODY,true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

        curl_setopt($curl, CURLOPT_REFERER, $referer);
        $out = curl_exec($curl);
        curl_close($curl);
        return;
    }

    public function checker($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_NOBODY,true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

        //curl_setopt($curl, CURLOPT_REFERER, 'http://google.com');
        $out = curl_exec($curl);
        $info = curl_getinfo($curl);
        if (isset($info['http_code'])) {
            $code = $info['http_code'];
        }else{
            $code = 0;
        }
        curl_close($curl);
        return $code;
    }
    
}
?>