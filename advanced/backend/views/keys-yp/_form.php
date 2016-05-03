<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KeysYp */
/* @var $form yii\widgets\ActiveForm */

echo Html::beginTag('div',['class' => 'keys-yp-form']);
	$form = ActiveForm::begin();
	echo $form->field($model, 'key')->textInput(['maxlength' => true]);
	echo Html::beginTag('div',['class' => 'form-group']);
		echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
	echo Html::endTag('div');
	ActiveForm::end();	
echo Html::endTag('div');
?>

