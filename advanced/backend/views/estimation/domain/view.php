<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\estimation\Domain;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\Domain */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'domain-view']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Forecast Traffic', ['forecast-traffic/index', 'ForecastTrafficSearch[domain_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
        echo Html::a('Forecast Income', ['forecast-income/index', 'ForecastIncomeSearch[domain_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
        echo Html::a('Forecast Cost', ['forecast-cost/index', 'ForecastCostSearch[domain_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
        echo Html::a('Statistics Traffic', ['statistics-traffic/index', 'StatisticsTrafficSearch[domain_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
        echo Html::a('Statistics Income', ['statistics-income/index', 'StatisticsIncomeSearch[domain_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
        echo Html::a('Statistics Cost', ['statistics-cost/index', 'StatisticsCostSearch[domain_id]' => $model->id], ['class' => 'btn btn-primary btn-xs']);
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
            'name',
            [
                'label' => 'Project',
                'value' => $model->project->title
            ],
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
