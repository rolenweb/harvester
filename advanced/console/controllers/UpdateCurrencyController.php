<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\currency\AudRate;
use common\models\currency\BgnRate;
use common\models\currency\BrlRate;
use common\models\currency\CadRate;
use common\models\currency\ChfRate;
use common\models\currency\CnyRate;
use common\models\currency\CzkRate;
use common\models\currency\DkkRate;
use common\models\currency\EurRate;
use common\models\currency\GBPRate;
use common\models\currency\HkdRate;
use common\models\currency\HrkRate;
use common\models\currency\HufRate;
use common\models\currency\IdrRate;
use common\models\currency\IlsRate;
use common\models\currency\InrRate;
use common\models\currency\JpyRate;
use common\models\currency\KrwRate;
use common\models\currency\MxnRate;
use common\models\currency\MyrRate;
use common\models\currency\NokRate;
use common\models\currency\NzdRate;
use common\models\currency\PhpRate;
use common\models\currency\PlnRate;
use common\models\currency\RonRate;
use common\models\currency\RubRate;
use common\models\currency\SekRate;
use common\models\currency\SgdRate;
use common\models\currency\ThbRate;
use common\models\currency\TryRate;
use common\models\currency\ZarRate;
use common\models\currency\UsdRate;
use common\models\currency\Schedule;


class UpdateCurrencyController extends Controller
{
    const HISTORY_DATE_CURRENCY_RATE = "2000-01-01";
    
    
    public function actionIndex($currency = null)
    {
        if ($currency === null) {
            $list = [
                'USD',
                'EUR',
                'AUD',
                'BGN',
                'BRL',
                'CAD',
                'CHF',
                'CNY',
                'CZK',
                'DKK',
                'GBP',
                'HKD',
                'HRK',
                'HUF',
                'IDR',
                'ILS',
                'INR',
                'JPY',
                'KRW',
                'MXN',
                'MYR',
                'NOK',
                'NZD',
                'PHP',
                'PLN',
                'RON',
                'RUB',
                'SEK',
                'SGD',
                'THB',
                'TRY',
                'ZAR',
            ];
            foreach ($list as $currency) {
                $this->updateCurrencyRate($currency);    
            }
        }else{
            $this->updateCurrencyRate($currency);
        }
    }

    public function updateCurrencyRate($currnecy)
    {

        if ($currnecy == 'USD') {
            $last_date = UsdRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'EUR') {
            $last_date = EurRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'AUD') {
            $last_date = AudRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'BGN') {
            $last_date = BgnRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'BRL') {
            $last_date = BrlRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'CAD') {
            $last_date = CadRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'CHF') {
            $last_date = ChfRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'CNY') {
            $last_date = CnyRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'CZK') {
            $last_date = CzkRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'DKK') {
            $last_date = DkkRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'GBP') {
            $last_date = GbpRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'HKD') {
            $last_date = HkdRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'HRK') {
            $last_date = HrkRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'HUF') {
            $last_date = HufRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'IDR') {
            $last_date = IdrRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'ILS') {
            $last_date = IlsRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'INR') {
            $last_date = InrRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'JPY') {
            $last_date = JpyRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'KRW') {
            $last_date = KrwRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'MXN') {
            $last_date = MxnRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'MYR') {
            $last_date = MyrRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'NOK') {
            $last_date = NokRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'NZD') {
            $last_date = NzdRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'PHP') {
            $last_date = PhpRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'PLN') {
            $last_date = PlnRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'RON') {
            $last_date = RonRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'RUB') {
            $last_date = RubRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'SEK') {
            $last_date = SekRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'SGD') {
            $last_date = SgdRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'THB') {
            $last_date = ThbRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'TRY') {
            $last_date = TryRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        if ($currnecy == 'ZAR') {
            $last_date = ZarRate::find()->orderBy(['date' => SORT_DESC])->limit(1)->one();
        }
        
        if ($last_date != NULL) {
            $start_date = date("Y-m-d",strtotime("+1 day", strtotime($last_date->date)));
        }
        else{
            $start_date = self::HISTORY_DATE_CURRENCY_RATE;
        }
        
        $n=0;
        while ($start_date <= date("Y-m-d")) {
            $rate = $this->loadCurrencyRates($currnecy, $start_date);
            
            if ($rate != NULL && property_exists($rate, 'rates')) {
                $random_currency = $this->randomCurrency($currnecy);
                foreach ($rate->rates as $key => $value) {
                    if ($currnecy == 'USD') {
                        $new_rec = new UsdRate();
                    }
                    if ($currnecy == 'EUR') {
                        $new_rec = new EurRate();
                    }
                    if ($currnecy == 'AUD') {
                        $new_rec = new AudRate();
                    }
                    if ($currnecy == 'BGN') {
                        $new_rec = new BgnRate();
                    }
                    if ($currnecy == 'BRL') {
                        $new_rec = new BrlRate();
                    }
                    if ($currnecy == 'CAD') {
                        $new_rec = new CadRate();
                    }
                    if ($currnecy == 'CHF') {
                        $new_rec = new ChfRate();
                    }
                    if ($currnecy == 'CNY') {
                        $new_rec = new CnyRate();
                    }
                    if ($currnecy == 'CZK') {
                        $new_rec = new CzkRate();
                    }
                    if ($currnecy == 'DKK') {
                        $new_rec = new DkkRate();
                    }
                    if ($currnecy == 'GBP') {
                        $new_rec = new GbpRate();
                    }
                    if ($currnecy == 'HKD') {
                        $new_rec = new HkdRate();
                    }
                    if ($currnecy == 'HRK') {
                        $new_rec = new HrkRate();
                    }
                    if ($currnecy == 'HUF') {
                        $new_rec = new HufRate();
                    }
                    if ($currnecy == 'IDR') {
                        $new_rec = new IdrRate();
                    }
                    if ($currnecy == 'ILS') {
                        $new_rec = new IlsRate();
                    }
                    if ($currnecy == 'INR') {
                        $new_rec = new InrRate();
                    }
                    if ($currnecy == 'JPY') {
                        $new_rec = new JpyRate();
                    }
                    if ($currnecy == 'KRW') {
                        $new_rec = new KrwRate();
                    }
                    if ($currnecy == 'MXN') {
                        $new_rec = new MxnRate();
                    }
                    if ($currnecy == 'MYR') {
                        $new_rec = new MyrRate();
                    }
                    if ($currnecy == 'NOK') {
                        $new_rec = new NokRate();
                    }
                    if ($currnecy == 'NZD') {
                        $new_rec = new NzdRate();
                    }
                    if ($currnecy == 'PHP') {
                        $new_rec = new PhpRate();
                    }
                    if ($currnecy == 'PLN') {
                        $new_rec = new PlnRate();
                    }
                    if ($currnecy == 'RON') {
                        $new_rec = new RonRate();
                    }
                    if ($currnecy == 'RUB') {
                        $new_rec = new RubRate();
                    }
                    if ($currnecy == 'SEK') {
                        $new_rec = new SekRate();
                    }
                    if ($currnecy == 'SGD') {
                        $new_rec = new SgdRate();
                    }
                    if ($currnecy == 'THB') {
                        $new_rec = new ThbRate();
                    }
                    if ($currnecy == 'TRY') {
                        $new_rec = new TryRate();
                    }
                    if ($currnecy == 'ZAR') {
                        $new_rec = new ZarRate();
                    }

                    $new_rec->date = $start_date;
                    $new_rec->code = $key;
                    $new_rec->rate = $value;
                    if ($new_rec->save()) {
                        if ($random_currency == $key) {
                            $this->newSchedule($currnecy,$key,$start_date);
                        }
                    }
                }
            }
            
            $start_date = date("Y-m-d", strtotime("+1 day", strtotime($start_date)));
            if ($n == 10000) {
                die();
            }
            $n++;
        }
    }

    public function loadCurrencyRates($base, $date)
    {
        $our = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://api.fixer.io/latest?base=".$base."&date=".$date);
        //curl_setopt($ch, CURLOPT_URL, "http://api.fixer.io/".$date);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        $out = json_decode($response);
        return $out;
    }
    
    
    public function randomCurrency($currency)
    {
        $list = [
            'USD',
            'EUR',
            'AUD',
            'BGN',
            'BRL',
            'CAD',
            'CHF',
            'CNY',
            'CZK',
            'DKK',
            'GBP',
            'HKD',
            'HRK',
            'HUF',
            'IDR',
            'ILS',
            'INR',
            'JPY',
            'KRW',
            'MXN',
            'MYR',
            'NOK',
            'NZD',
            'PHP',
            'PLN',
            'RON',
            'RUB',
            'SEK',
            'SGD',
            'THB',
            'TRY',
            'ZAR',
        ];
        $key = array_search($currency,$list);
        if($key!==false){
            unset($list[$key]);
        }
        $new_list = array_values($list);
        return $new_list[rand(0,count($new_list)-1)];
    }

    public function newSchedule($cur1,$cur2,$date)
    {
        $new_schedule = new Schedule();
        $new_schedule->cur1 = $cur1;
        $new_schedule->cur2 = $cur2;
        $new_schedule->status = 1;
        $new_schedule->date = date("Y-m-d",strtotime($date));
        $new_schedule->save();
        return;
    }
    
}
?>