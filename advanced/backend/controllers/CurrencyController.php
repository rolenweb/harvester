<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
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

/**
 * Site controller
 */
class CurrencyController extends Controller
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
                        'actions' => ['error','api'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $list_currency = [
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
        return $this->render('index',[
                'list_currency' => $list_currency
            ]);
    }

    /**
    * @param string $cur1
    * @param string $cur2
    * @param datetime $day
    * @param integer $period
    * @return json
    */
    public function actionApi($type, $cur1, $cur2, $day = null, $period = null)
    {
        if ($type == 'day') {
            $data = $this->day($cur1, $cur2, $day);
            return json_encode($data);
        }

        if ($type == 'chart') {
            $data = $this->chart($cur1,$cur2,$period);
            return json_encode($data);
        }

        
    }

    /**
    * @param string $cur1
    * @param string $cur2
    * @param datetime $day
    * @return array
    */
    public function day($cur1, $cur2, $day)
    {
        if (strtoupper($cur1) == 'USD') {
            $rate = UsdRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();
        }
        if (strtoupper($cur1) == 'EUR') {
            $rate = EurRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();
        }
        if (strtoupper($cur1) == 'AUD') {
            $rate = AudRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();
        }
        if (strtoupper($cur1) == 'BGN') {
            $rate = BgnRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'BRL') {
            $rate = BrlRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'CAD') {
            $rate = CadRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'CHF') {
            $rate = ChfRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'CNY') {
            $rate = CnyRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'CZK') {
            $rate = CzkRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'DKK') {
            $rate = DkkRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'GBP') {
            $rate = GbpRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'HKD') {
            $rate = HkdRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'HRK') {
            $rate = HrkRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'HUF') {
            $rate = HufRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'IDR') {
            $rate = IdrRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'ILS') {
            $rate = IlsRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'INR') {
            $rate = InrRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'JPY') {
            $rate = JpyRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'KRW') {
            $rate = KrwRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'MXN') {
            $rate = MxnRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'MYR') {
            $rate = MyrRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'NOK') {
            $rate = NokRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'NZD') {
            $rate = NzdRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'PHP') {
            $rate = PhpRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'PLN') {
            $rate = PlnRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'RON') {
            $rate = RonRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'RUB') {
            $rate = RubRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'SEK') {
            $rate = SekRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'SGD') {
            $rate = SgdRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'THB') {
            $rate = ThbRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'TRY') {
            $rate = TryRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        if (strtoupper($cur1) == 'ZAR') {
            $rate = ZarRate::find()->where(['and',['code' => strtoupper($cur2)],'date <= :day'],[':day' => date("Y-m-d",strtotime($day))])->select(['code','rate','date'])->orderBy(['id' => SORT_DESC])->limit(1)->asArray()->one();   
        }
        return [
            'cur1' => $cur1,
            'cur2' => $cur2,
            'rate' => $rate,
        ];
    }

    /**
    * @param string $cur1
    * @param string $cur2
    * @param integer $period
    * @return array
    */
    public function chart($cur1, $cur2, $period)
    {
        $day = date("Y-m-d",strtotime("-$period month",time()));
        if (strtoupper($cur1) == 'USD') {
            $rate = UsdRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'EUR') {
            $rate = EurRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'AUD') {
            $rate = AudRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'BGN') {
            $rate = BgnRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'BRL') {
            $rate = BrlRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'CAD') {
            $rate = CadRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'CHF') {
            $rate = ChfRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'CNY') {
            $rate = CnyRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'CZK') {
            $rate = CzkRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'DKK') {
            $rate = DkkRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'GBP') {
            $rate = GbpRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'HKD') {
            $rate = HkdRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'HRK') {
            $rate = HrkRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'HUF') {
            $rate = HufRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'IDR') {
            $rate = IdrRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'ILS') {
            $rate = IlsRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'INR') {
            $rate = InrRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'JPY') {
            $rate = JpyRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'KRW') {
            $rate = KrwRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'MXN') {
            $rate = MxnRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'MYR') {
            $rate = MyrRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'NOK') {
            $rate = NokRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'NZD') {
            $rate = NzdRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'PHP') {
            $rate = PhpRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'PLN') {
            $rate = PlnRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'RON') {
            $rate = RonRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'RUB') {
            $rate = RubRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'SEK') {
            $rate = SekRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'SGD') {
            $rate = SgdRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'THB') {
            $rate = ThbRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'TRY') {
            $rate = TryRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        if (strtoupper($cur1) == 'ZAR') {
            $rate = ZarRate::find()->where(['and',['code' => strtoupper($cur2)],'date > :day'],[':day' => $day])->select(['code','rate','date'])->asArray()->all();
        }
        return [
            'cur1' => $cur1,
            'cur2' => $cur2,
            'rate' => $rate,
        ];
    }
}
