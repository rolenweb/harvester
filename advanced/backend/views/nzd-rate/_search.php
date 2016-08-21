<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\currency\NzdRateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nzd-rate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
