<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\db\Query;
use common\models\SettingWpost;

class WpostController extends Controller
{
    const IP = '46.36.220.30';

    public function actionIndex()
    {
        $this->Wpost();
    }

    public function Wpost()
    {
        $setting = SettingWpost::find()->where(['status' => SettingWpost::ACTIVE])->limit(1)->one();
        if ($setting === null) {
            self::error('Setting is null');
            return;
        }
        $position = $setting->position;
        if ($position === null) {
            self::error('Position is null');
            return;
        }
        $key = (new Query())->from($setting->keys)->where(['id' => $position->current])->limit(1)->one(Yii::$app->db5);
        if ($key === null) {
            self::error('The table of keys is null');
            return;
        }
        $query =$key['key'];
        $user = $setting->user;
        $psw = $this->getPassword($setting->hash);
        $url = 'http://'.$setting->domain.'/xmlrpc.php';
        $tags = [];//$this->getTags($model_key['key'],$this->cutTags($this->xmlToArray($this->getTerms($url, $user, $psw,'post_tag'))));
        $result_google = $this->google($query, self::IP, 8);
        var_dump($result_google);
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
}
?>