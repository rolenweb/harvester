<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\KeysYp;

/* @var $this yii\web\View */
/* @var $model common\models\PropertyTypeYp */
/* @var $form yii\widgets\ActiveForm */

echo Html::beginTag('div',['class' => 'property-type-yp-form']);
    $form = ActiveForm::begin();
    echo $form->field($model, 'name')->textInput(['maxlength' => true]);
    echo Html::activeDropDownList($model, 'type',['string' => 'String', 'image' => 'Image', 'url' => 'Url', 'html' => 'Html'],['class' => 'form-control']);
    echo Html::activeDropDownList($model, 'key_id', ArrayHelper::map(KeysYp::dropDownList(), 'id', 'key'),['class' => 'form-control']);
    echo $form->field($model, 'pattern')->textInput(['maxlength' => true]);
    echo Html::beginTag('div',['class' => 'form-group']);
        echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    echo Html::endTag('div');
    ActiveForm::end();    
echo Html::endTag('div');
?>
