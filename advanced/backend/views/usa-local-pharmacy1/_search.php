<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UsaLocalPharmacy1Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usa-local-pharmacy1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'street_address') ?>

    <?= $form->field($model, 'city_state') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'open_details') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'extra_phones') ?>

    <?php // echo $form->field($model, 'years_in_business') ?>

    <?php // echo $form->field($model, 'brands') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'categories') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
