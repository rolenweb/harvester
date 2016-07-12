<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\refer\Domains */
/* @var $form yii\widgets\ActiveForm */

echo Html::beginTag('div',['class' => 'domains-form']);
    $form = ActiveForm::begin();
        echo $form->field($model, 'domain')->textInput(['maxlength' => true]);
        echo $form->field($model, 'url')->textInput(['maxlength' => true]);
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'status', [1 => 'Active', 2 => 'Pending', 3 => 'Stop'],['class' => 'form-control']);  
        echo Html::endTag('div');
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        echo Html::endTag('div');
    ActiveForm::end();        
echo Html::endTag('div');

?>