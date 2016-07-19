<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\CityUs;
use common\models\currency\Mask;


class ServiceController extends Controller
{
    
    public function actionIndex()
    {
        
        //$this->createUsCityBase();
        
    }

    public function createUsCityBase($country = 'US')
    {
        set_time_limit(6000);
        
        $file_city = Yii::$app->basePath.'/files/cities1000.txt';
        
        
        if (file_exists($file_city)) {

            $file_txt = file($file_city);
            
            $n_cities = 0;


            foreach ($file_txt as $line) {
                $array_data = explode('|', $line);                
                if ($array_data != NULL) {
                    if (isset($array_data[8])) {
                        if ($array_data[8] == $country) {
                            if ($country == 'US') {
                                if (CityUs::find()->where(['name' => trim($array_data[1]), 'state' => trim($array_data[10])])->limit(1)->one() == NULL) {
                                    $var = [
                                    'name' => trim($array_data[1]),
                                    'state' => trim($array_data[10]),
                                    'lat' => trim($array_data[4]),
                                    'lon' => trim($array_data[5]),
                                    ];
                                    $new_city = new CityUs();
                                    $new_city->attributes = $var;
                                    $new_city->save();
                                }
                                
                            }
                            
                        }
                    }
                }
                

            }
            
        }
    }


    public function actionLoadMaskCurrency()
    {
        set_time_limit(6000);
        
        $file_in = Yii::$app->basePath.'/files/masks/currency.txt';
        
        
        if (file_exists($file_in)) {

            $file_txt = file($file_in);
            
            
            foreach ($file_txt as $line) {
                $new = new Mask();
                $new->mask = $line;
                $new->save();
            }
            
        }
    }
    
}
?>