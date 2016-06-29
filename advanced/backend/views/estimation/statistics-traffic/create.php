<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsTraffic */

$this->title = 'Create Statistics Traffic';
$this->params['breadcrumbs'][] = ['label' => 'Statistics Traffics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-traffic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
