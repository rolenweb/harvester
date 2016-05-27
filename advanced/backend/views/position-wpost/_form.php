<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\SettingWpost;

/* @var $this yii\web\View */
/* @var $model common\models\PositionWpost */
/* @var $form yii\widgets\ActiveForm */
echo Html::beginTag('div',['class' => 'position-wpost-form']);
    $form = ActiveForm::begin();
    echo Html::activeDropDownList($model, 'setting_id', ArrayHelper::map(SettingWpost::dropDownList(), 'id', 'domain'),['class' => 'form-control']);
    echo $form->field($model, 'start')->textInput();        
    echo $form->field($model, 'current')->textInput();
    echo $form->field($model, 'end')->textInput();
    echo Html::beginTag('div',['class' => 'form-group']);
        echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    echo Html::endTag('div');
    ActiveForm::end();    
echo Html::endTag('div');
