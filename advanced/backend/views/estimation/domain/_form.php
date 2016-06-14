<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\estimation\Project;
use common\models\estimation\Domain;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\Domain */
/* @var $form yii\widgets\ActiveForm */

echo Html::beginTag('div',['class' => 'domain-form']);
    $form = ActiveForm::begin();
        echo $form->field($model, 'name')->textInput(['maxlength' => true]);
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'project_id',ArrayHelper::map(Project::dropdown(), 'id', 'title'),['class' => 'form-control']);
        echo Html::endTag('div');
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'status',[Domain::ACTIVE => 'Active', Domain::PENDING => 'Pending', Domain::STOP => 'Stop'],['class' => 'form-control']);
        echo Html::endTag('div');
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        echo Html::endTag('div');
    ActiveForm::end();
echo Html::endTag('div');
?>
