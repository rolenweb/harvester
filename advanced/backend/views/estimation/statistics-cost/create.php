<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsCost */

$this->title = 'Create Statistics Cost';
$this->params['breadcrumbs'][] = ['label' => 'Statistics Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-cost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
