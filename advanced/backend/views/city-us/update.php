<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CityUs */

$this->title = 'Update City Us: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'City uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-us-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
