<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\UsaLocalPharmacy1;
use common\models\LocalUsaPharmacyWpost;

class ConvertProductToKeyController extends Controller
{
    
    public function actionIndex($mode = 'local-pharmacy')
    {
        if ($mode == 'local-pharmacy') {
            $this->localPharmacy();
        }
    }

    public function LocalPharmacy()
    {
        set_time_limit(60000);
        $pharmacies = UsaLocalPharmacy1::find()->all();
        if ($pharmacies === NULL) {
            return;
        }
        $random = $this->shuffle_assoc($pharmacies);
        if ($random === NULL) {
            return;
        }
        foreach ($random as $item) {
            
            $var = [
                'title' => $item->title,
                'key' => $this->getKey($item->title, $item->city_state),
                'street_address' => $item->street_address,
                'city_state' => $item->city_state,
                'phone' => $item->phone,
                'website' => $item->website,
                'open_details' => $item->open_details,
                'description' => $item->description,
                'extra_phones' => $item->extra_phones,
                'years_in_business' => $item->years_in_business,
                'brands' => $item->brands,
                'payment' => $item->payment,
                'categories' => $item->categories,
                'categories' => $item->categories,
            ];
            $new_pharmacy = new LocalUsaPharmacyWpost();
            $new_pharmacy->attributes = $var;
            $new_pharmacy->save();
        }
    }

    public function shuffle_assoc($list) {
        if (!is_array($list)){
            return $list;
        }
        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $i => $key){
            $random[$i] = $list[$key];
        }
        return $random;
    } 

    public function getKey($title, $state)
    {
        $out = '';
        if ($this->thereIsWord($title)) {
            $out = strtolower($title.' pharmacy '.$state);
        }else{
            $out = strtolower($title.' '.$state);
        }
        return $this->filterKey($out);
    }

    public function thereIsWord($title)
    {
        $out = (bool)true;
        if (strpos(strtolower($title), 'pharmac')) {
            $out = (bool)false;
        }
        if (strpos(strtolower($title), 'drug')) {
            $out = (bool)false;
        }
        return $out;
    }

    public function filterKey($key)
    {
        $out = $key;
        $filter = [',','@','#','$','%','^','&','*','(',')','+','=','!','\'','"','`','.','?',':',';','-', ' - '];
        foreach ($filter as $item) {
            if ($item == '-') {
                $out = str_replace($item, ' ', $out);
            }else{
                $out = str_replace($item, '', $out);
            }
            
        }
        return $out;
    }
}
?>