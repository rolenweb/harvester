<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\ForecastCost */

$this->title = 'Update Forecast Cost: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Forecast Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forecast-cost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
