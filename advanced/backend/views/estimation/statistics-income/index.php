<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\StatisticsIncomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statistics Incomes';
$this->params['breadcrumbs'][] = $this->title;

$domain_id = getIdDomain();

echo Html::beginTag('div',['class' => 'statistics-income-index']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Create Statistics Income', ['create','domain_id' => $domain_id], ['class' => 'btn btn-success']);
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
            [
                'attribute'=>'month',
                'label' => 'Month',
                'content'=>function($data){
                    return date("m-Y",strtotime($data->month));
                }
            ],
            'income',
            'created_at:date',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
echo Html::endTag('div');

function getIdDomain()
{
    $out = null;
    $request = Yii::$app->request;
    if ($request->isGet)  { 
        if ($request->get('StatisticsIncomeSearch') !== null) {
            if (isset($request->get('StatisticsIncomeSearch')['domain_id'])) {
                $out = $request->get('StatisticsIncomeSearch')['domain_id'];
            }
        }
    }
    return $out;
}
?>
