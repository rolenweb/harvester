<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\Project */
//$this->registerJsFile('@web/js/estimation/estimation.js', ['depends' => [\yii\web\JqueryAsset::className()]]);



$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'project-view']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Domains', ['domain/index','DomainSearch[project_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
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
            'title',
            'desctiption:html',
            [
                'label' => 'Forecast Trafic(unic/month)',
                'value' => $model->forecastTraffic,
            ],
            [
                'label' => 'Forecast Income('.$model->currency.'/month)',
                'value' => $model->forecastIncome,
            ],
            [
                'label' => 'Forecast Cost('.$model->currency.'/month)',
                'value' => $model->forecastCost,
            ],
            'currency',
            [
                'label' => 'Status',
                'value' => $model->titleStatus
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]);
echo Html::endTag('div');
?>
