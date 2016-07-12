<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\refer\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Positions';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'position-index']);
    echo Html::beginTag('h1');
        echo Html::encode($this->title);
    echo Html::endTag('h1');
    echo Html::beginTag('p');
        echo Html::a('Create Position', ['create'], ['class' => 'btn btn-success']);
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
                    return $data->domain->domain;
                }
            ],
            [
                'attribute'=>'url_id',
                'label' => 'Url',
                'content'=>function($data){
                    return $data->url->url;
                }
            ],
            [
                'attribute'=>'status',
                'label' => 'Status',
                'content'=>function($data){
                    return $data->getStatus();
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
echo Html::endTag('div');
?>
