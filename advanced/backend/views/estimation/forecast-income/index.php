<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\ForecastIncomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$domain_id = getIdDomain();

$this->title = 'Forecast Incomes';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'forecast-income-index']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Create Forecast Income', ['create','domain_id' => $domain_id], ['class' => 'btn btn-success']);
    echo Html::endTag('p');
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'domain_id',
                'label' => 'Domain',
                'content'=>function($data){
                    return $data->domain->name;
                }
            ],
            'income',
            [
                'attribute'=>'created_at',
                'label' => 'Created',
                'content'=>function($data){
                    return date("Y-m-d H:i:s", $data->created_at);
                }
            ],
            [
                'attribute'=>'updated_at',
                'label' => 'Updated',
                'content'=>function($data){
                    return date("Y-m-d H:i:s", $data->updated_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
echo Html::endTag('div');


function getIdDomain()
{
    $out = null;
    $request = Yii::$app->request;
    if ($request->isGet)  { 
        if ($request->get('ForecastIncomeSearch') !== null) {
            if (isset($request->get('ForecastIncomeSearch')['domain_id'])) {
                $out = $request->get('ForecastIncomeSearch')['domain_id'];
            }
        }
    }
    return $out;
}
?>
