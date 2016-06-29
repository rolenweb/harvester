<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsIncome */

$this->title = 'Create Statistics Income';
$this->params['breadcrumbs'][] = ['label' => 'Statistics Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-income-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
