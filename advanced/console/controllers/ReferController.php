<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\refer\UrlRefer;
use common\models\refer\Position;
use common\models\refer\Domains;

class ReferController extends Controller
{
    
    public function actionIndex($mode = 'refer')
    {
        if ($mode == 'refer') {
            $positions = Position::find()->where(['status' => Position::ACTIVE])->all();
            if ($positions === null) {
                return false;
            }
            foreach ($positions as $position) {
                $this->refer($position->url->url,$position->domain->url);
                $position->url_id = UrlRefer::next($position->url_id);
                $position->save();
                
            }
            //$this->refer('http://japanesecomposers.info/ja/modules/popnupblog/index.php?postid=243','http://sedrfty777.com');
        }
        if ($mode == 'checker') {
            var_dump($this->checker('http://worldsportsclub.org/modules/popnupblog/index.php?postid=149'));
        }
        if ($mode == 'load') {
            $this->loadUrlFromFile();
        }
        
    }

    public function refer($url, $referer)
    {
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_NOBODY,true);
        curl_setopt($curl, CURLOPT_TIMEOUT,10);
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
        curl_setopt($curl, CURLOPT_TIMEOUT,10);
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
        var_dump($code);
        return $code;
    }

    public function loadUrlFromFile()
    {
        set_time_limit(6000);
        $file = Yii::$app->basePath.'/files/spam_stata_210914.txt';
        if (file_exists($file)) {
            $file_txt = file($file);
            $n = 0;
            foreach ($file_txt as $line) {
                var_dump($n);
                var_dump($line);
                if ($this->checker(trim($line)) === 200) {
                    if (UrlRefer::find()->where(['url' => trim($line)])->limit(1)->one() === NULL) {
                        var_dump('ok');
                        $var = [
                            'url' => trim($line),
                            'status' => UrlRefer::ACTIVE,
                        ];
                        $new_url = new UrlRefer();
                        $new_url->attributes = $var;
                        $new_url->save();
                    }
                }
                
                $n++;
            }
        }
    }
    
}
?>