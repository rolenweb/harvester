<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\KeysYp;

/* @var $this yii\web\View */
/* @var $model common\models\ScheduleYp */
/* @var $form yii\widgets\ActiveForm */

echo Html::beginTag('div',['class' => 'schedule-yp-form']);
    $form = ActiveForm::begin();
        echo Html::beginTag('div',['class' => 'row']);
            echo Html::beginTag('div',['class' => 'col-sm-4']);
                echo Html::activeDropDownList($model, 'name', ['yp' => 'Yellow Pages'],['class' => 'form-control']);
            echo Html::endTag('div');
            echo Html::beginTag('div',['class' => 'col-sm-4']);
                echo Html::activeDropDownList($model, 'key_id', ArrayHelper::map(KeysYp::dropDownList(), 'id', 'key'),['class' => 'form-control']);
            echo Html::endTag('div');
            echo Html::beginTag('div',['class' => 'col-sm-4']);
                echo Html::activeDropDownList($model, 'status', [5 => 'Pending', 10 => 'Active', 15 => 'Finish'],['class' => 'form-control']);
            echo Html::endTag('div');
            echo Html::beginTag('div',['class' => 'col-sm-4']);
                echo $form->field($model, 'end')->textInput();
            echo Html::endTag('div');
        echo Html::endTag('div');
        echo Html::beginTag('div',['class' => 'row']);
            echo Html::beginTag('div',['class' => 'col-sm-12 text-right']);
                echo Html::beginTag('div',['class' => 'form-group']);
                    echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
                echo Html::endTag('div');
            echo Html::endTag('div');
        echo Html::endTag('div');
        
    ActiveForm::end();
echo Html::endTag('div');
?>


