<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsIncome */

$this->title = 'Update Statistics Income: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statistics Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statistics-income-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
