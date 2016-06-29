<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\estimation\Domain;

/* @var $this yii\web\View */
/* @var $model common\models\estimation\StatisticsTraffic */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('@web/css/jquery-ui/jquery-ui.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/jquery-ui/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/estimation/estimation.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$get_data = Yii::$app->request->get();
if (isset($get_data['domain_id'])) {
    $model->domain_id = $get_data['domain_id'];
}

echo Html::beginTag('div',['class' => 'statistics-traffic-form']);
    $form = ActiveForm::begin();
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::activeDropDownList($model, 'domain_id',ArrayHelper::map(Domain::dropdown(), 'id', 'name'),['class' => 'form-control']);
        echo Html::endTag('div');
        echo $form->field($model, 'month')->textInput();
        echo $form->field($model, 'traffic')->textInput();
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        echo Html::endTag('div');
    ActiveForm::end();    
echo Html::endTag('div');
?>
