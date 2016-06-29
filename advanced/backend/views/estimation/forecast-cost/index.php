<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\ForecastCostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$domain_id = getIdDomain();

$this->title = 'Forecast Costs';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'forecast-cost-index']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Create Forecast Cost', ['create','domain_id' => $domain_id], ['class' => 'btn btn-success']);
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
            'cost',
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
echo Html::endTag('div');

function getIdDomain()
{
    $out = null;
    $request = Yii::$app->request;
    if ($request->isGet)  { 
        if ($request->get('ForecastCostSearch') !== null) {
            if (isset($request->get('ForecastCostSearch')['domain_id'])) {
                $out = $request->get('ForecastCostSearch')['domain_id'];
            }
        }
    }
    return $out;
}
?>