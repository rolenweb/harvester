<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\KeysYp;

/* @var $this yii\web\View */
/* @var $model common\models\PositionYp */
/* @var $form yii\widgets\ActiveForm */
echo Html::beginTag('div',['class' => 'position-yp-form']);
    $form = ActiveForm::begin();
    //echo $form->field($model, 'key_id')->textInput();
    echo Html::activeDropDownList($model, 'key_id', ArrayHelper::map(KeysYp::dropDownList(), 'id', 'key'),['class' => 'form-control']);
    echo $form->field($model, 'start')->textInput();
    echo $form->field($model, 'current')->textInput();
    echo $form->field($model, 'end')->textInput();
    echo Html::beginTag('div',['class' => 'form-group']);
        echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    echo Html::endTag('div');
    ActiveForm::end();    
echo Html::endTag('div');
?>

