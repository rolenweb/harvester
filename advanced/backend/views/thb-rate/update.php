<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\ThbRate */

$this->title = 'Update Thb Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Thb Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="thb-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
