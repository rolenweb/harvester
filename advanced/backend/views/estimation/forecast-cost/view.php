<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\ForecastCost */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Forecast Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'forecast-cost-view']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-xs',
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
            [
                'label' => 'Cost(month)('.$model->domain->project->currency.')',
                'value' => $model->cost,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]);
echo Html::endTag('div');
?>
