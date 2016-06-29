<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\StatisticsTrafficSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statistics Traffics';
$this->params['breadcrumbs'][] = $this->title;

$domain_id = getIdDomain();

echo Html::beginTag('div',['class' => 'statistics-traffic-index']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Create Statistics Traffic', ['create','domain_id' => $domain_id], ['class' => 'btn btn-success']);
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
            'traffic',
            'created_at:datetime',
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
        if ($request->get('StatisticsTrafficSearch') !== null) {
            if (isset($request->get('StatisticsTrafficSearch')['domain_id'])) {
                $out = $request->get('StatisticsTrafficSearch')['domain_id'];
            }
        }
    }
    return $out;
}
?>
