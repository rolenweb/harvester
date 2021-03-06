<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\UsaLocalPharmacy1;
use common\models\PayDayLoans1;
use common\models\CityUs;
use common\models\PropertyYp;
use common\models\PositionProduct;
use common\models\wpost\Usaloans;
use common\models\wpost\Roofing;

class ConvertProductController extends Controller
{
    
    public function actionIndex($mode = 'local-pharmacy')
    {
        if ($mode == 'local-pharmacy') {
            $this->localPharmacy();
        }
        if ($mode == 'local-loans') {
            $this->localLoans();
        }
        if ($mode == 'usaloans') {
            $this->usaLoans();
        }
        if ($mode == 'roofing') {
            $this->roofing();
        }
    }

    public function LocalPharmacy()
    {
        set_time_limit(60000);
        $position = PositionProduct::find()->where(['table' => 'city_us'])->limit(1)->one();
        if ($position === null) {
            return;
        }
        $cities = CityUs::find()->where(['between', 'id', $position->current, $position->end])->all();
        foreach ($cities as $city) {
            $count = count(PropertyYp::countItem(1, $city->id));
            for ($i=0; $i < $count; $i++) { 
                $properties = PropertyYp::forItem(1, $city->id, $i);
                $open_day = [];
                $open_hours = [];
                if ($properties !== NULL) {
                    $var = [];
                    foreach ($properties as $property) {
                        if (strtolower($property->type->name) == 'title') {
                            $var = array_merge($var, ['title' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'street-address') {
                            $var = array_merge($var, ['street_address' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'city-state') {
                            $var = array_merge($var, ['city_state' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'phone') {
                            $var = array_merge($var, ['phone' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'website') {
                            $var = array_merge($var, ['website' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'open-details-day') {
                            $open_day[] = $property->value;
                        }
                        if (strtolower($property->type->name) == 'open-details-hours') {
                            $open_hours[] = $property->value;
                        }
                        if (strtolower($property->type->name) == 'description') {
                            $var = array_merge($var, ['description' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'extra-phones') {
                            $var = array_merge($var, ['extra_phones' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'years-in-business') {
                            $var = array_merge($var, ['years_in_business' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'brands') {
                            $var = array_merge($var, ['brands' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'payment') {
                            $var = array_merge($var, ['payment' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'categories') {
                            $var = array_merge($var, ['categories' => $property->value]);
                        }

                        
                    }

                    if (count($open_day) > 0 && count($open_hours) > 0) {
                        $var = array_merge($var, ['open_details' => json_encode($this->toAss($open_day,$open_hours))]);
                    }
                    
                    if (count($var) > 0) {
                        if (isset($var['title']) && isset($var['street_address']) && isset($var['city_state'])) {
                            if (UsaLocalPharmacy1::find()->where(['title' => $var['title'], 'street_address' => $var['street_address'], 'city_state' => $var['city_state']])->limit(1)->one() === NULL) {
                                $new_pharmacy = new UsaLocalPharmacy1();
                                $new_pharmacy->attributes = $var;
                                $new_pharmacy->save();
                            }
                        }
                    }

                }
            }
            $position->current = CityUs::next($city->id);
            $position->save();
        }
    }

    public function LocalLoans()
    {
        set_time_limit(60000);
        $position = PositionProduct::find()->where(['table' => 'city_us','key_id' => 2])->limit(1)->one();
        if ($position === null) {
            return;
        }
        $cities = CityUs::find()->where(['between', 'id', $position->current, $position->end])->all();
        foreach ($cities as $city) {
            $count = count(PropertyYp::countItem(2, $city->id));
            for ($i=0; $i < $count; $i++) { 
                $properties = PropertyYp::forItem(2, $city->id, $i);
                $open_day = [];
                $open_hours = [];
                if ($properties !== NULL) {
                    $var = [];
                    foreach ($properties as $property) {
                        if (strtolower($property->type->name) == 'title') {
                            $var = array_merge($var, ['title' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'street-address') {
                            $var = array_merge($var, ['street_address' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'city-state') {
                            $var = array_merge($var, ['city_state' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'phone') {
                            $var = array_merge($var, ['phone' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'website') {
                            $var = array_merge($var, ['website' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'open-details-day') {
                            $open_day[] = $property->value;
                        }
                        if (strtolower($property->type->name) == 'open-details-hours') {
                            $open_hours[] = $property->value;
                        }
                        if (strtolower($property->type->name) == 'description') {
                            $var = array_merge($var, ['description' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'extra-phones') {
                            $var = array_merge($var, ['extra_phones' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'years-in-business') {
                            $var = array_merge($var, ['years_in_business' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'brands') {
                            $var = array_merge($var, ['brands' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'payment') {
                            $var = array_merge($var, ['payment' => $property->value]);
                        }
                        if (strtolower($property->type->name) == 'categories') {
                            $var = array_merge($var, ['categories' => $property->value]);
                        }

                        
                    }

                    if (count($open_day) > 0 && count($open_hours) > 0) {
                        $var = array_merge($var, ['open_details' => json_encode($this->toAss($open_day,$open_hours))]);
                    }
                    
                    if (count($var) > 0) {
                        if (isset($var['title']) && isset($var['street_address']) && isset($var['city_state'])) {
                            if (PayDayLoans1::find()->where(['title' => $var['title'], 'street_address' => $var['street_address'], 'city_state' => $var['city_state']])->limit(1)->one() === NULL) {
                                $new_pharmacy = new PayDayLoans1();
                                $new_pharmacy->attributes = $var;
                                $new_pharmacy->save();
                            }
                        }
                    }

                }
            }
            $position->current = CityUs::next($city->id);
            $position->save();
        }
    }

    public function toAss($arr1,$arr2)
    {
        $out = [];
        if (count($arr1) === count($arr2)) {
            foreach ($arr1 as $key => $value) {
                $out[$value] = $arr2[$key];
            }
        }
        return $out;
    }

    public function usaLoans()
    {
        set_time_limit(60000);
        $file_name = Yii::$app->basePath.'/files/usaloans/usaloans_24_06_16.txt';
        
        if (file_exists($file_name)){
            $file = file($file_name);
            foreach ($file as $key) {
                $new_key = new Usaloans();
                $new_key->key = trim($key);
                $new_key->save();
            }
        }
    }
    
    public function roofing()
    {
        set_time_limit(60000);
        $file_name = Yii::$app->basePath.'/files/roofing/roofing_1_0.txt';
        
        if (file_exists($file_name)){
            $file = file($file_name);
            foreach ($file as $key) {
                $new_key = new Roofing();
                $new_key->key = trim($key);
                $new_key->save();
            }
        }
    }
    
}
?>