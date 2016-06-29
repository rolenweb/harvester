<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsTraffic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statistics Traffics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'statistics-traffic-view']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
    echo Html::endTag('p');
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'domain_id',
            [
                'label' => 'Domain',
                'value' => $model->domain->name,
            ],
            'month',
            [
                'label' => 'Month',
                'value' => date('m-Y',strtotime($model->month)),
            ],
            'traffic',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]);
echo Html::endTag('div');
?>
