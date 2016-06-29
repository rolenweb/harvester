<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsCost */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statistics Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'statistics-cost-view']);
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
            
            [
                'label' => 'Domain',
                'value' => $model->domain->name,
            ],
            'month',
            'cost',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]);
echo Html::endTag('div');
?>
