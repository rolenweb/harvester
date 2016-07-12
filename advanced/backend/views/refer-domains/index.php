<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\refer\DomainsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Domains';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'domains-index']);
    echo Html::beginTag('h1');
        echo Html::encode($this->title);
    echo Html::endTag('h1');
    echo Html::beginTag('p');
        echo Html::a('Create Domains', ['create'], ['class' => 'btn btn-success']);
    echo Html::endTag('p');
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'domain',
            'url:url',
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
