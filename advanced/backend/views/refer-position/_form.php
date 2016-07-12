<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\refer\Domains;

/* @var $this yii\web\View */
/* @var $model common\models\refer\Position */
/* @var $form yii\widgets\ActiveForm */

echo Html::beginTag('div',['class' => 'position-form']);
    $form = ActiveForm::begin();
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'domain_id',ArrayHelper::map(Domains::dropdown(), 'id', 'domain'),['class' => 'form-control']);
        echo Html::endTag('div');
        echo $form->field($model, 'url_id')->textInput(['placeholder' => 'Url ID'])->label(false);
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'status', [1 => 'Active', 2 => 'Pending', 3 => 'Stop'],['class' => 'form-control']);  
        echo Html::endTag('div');
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        echo Html::endTag('div');
    ActiveForm::end();    
echo Html::endTag('div');
?>
