<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\InrRate */

$this->title = 'Update Inr Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inr Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inr-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
