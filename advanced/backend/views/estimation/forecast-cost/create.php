<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\estimation\ForecastCost */

$this->title = 'Create Forecast Cost';
$this->params['breadcrumbs'][] = ['label' => 'Forecast Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forecast-cost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
