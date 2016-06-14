<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('//cdn.tinymce.com/4/tinymce.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJs('
    tinymce.init(
    { 
        selector:"#project-desctiption",
    }
    );'
);

/* @var $this yii\web\View */
/* @var $model common\models\estimation\Project */
/* @var $form yii\widgets\ActiveForm */
echo Html::beginTag('div',['class' => 'project-form']);
    $form = ActiveForm::begin();    
        echo $form->field($model, 'title')->textInput(['maxlength' => true]);
        echo $form->field($model, 'desctiption')->textarea(['rows' => 6]);
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'currency',['usd' => 'USD', 'rub' => 'RUB'],['class' => 'form-control']);
        echo Html::endTag('div');
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'status',[1 => 'Estimation', 2 => 'Start', 3 => 'Pending', 4 => 'Stop'],['class' => 'form-control']);
        echo Html::endTag('div');
        
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        echo Html::endTag('div');
    ActiveForm::end();
echo Html::endTag('div');
?>
