<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\estimation\ForecastIncome */

$this->title = 'Create Forecast Income';
$this->params['breadcrumbs'][] = ['label' => 'Forecast Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forecast-income-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
