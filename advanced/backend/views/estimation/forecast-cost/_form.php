<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\estimation\Domain;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\ForecastCost */
/* @var $form yii\widgets\ActiveForm */

$get_data = Yii::$app->request->get();
if ($get_data != NULL) {
    $model->domain_id = $get_data['domain_id'];
}

echo Html::beginTag('div',['class' => 'forecast-cost-form']);
	$form = ActiveForm::begin();
		echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'domain_id',ArrayHelper::map(Domain::dropdown(), 'id', 'name'),['class' => 'form-control']);
    	echo Html::endTag('div');
    	echo $form->field($model, 'cost')->textInput();
    	echo Html::beginTag('div',['class' => 'form-group']);
    		echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-xs' : 'btn btn-primary btn-xs']);
    	echo Html::endTag('div');
	ActiveForm::end();	
echo Html::endTag('div');
?>