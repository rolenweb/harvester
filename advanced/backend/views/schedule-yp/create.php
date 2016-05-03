<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ScheduleYp */

$this->title = 'Create Schedule Yp';
$this->params['breadcrumbs'][] = ['label' => 'Schedule Yps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'schedule-yp-create']);
	echo Html::beginTag('h1');
		echo Html::encode($this->title);
	echo Html::endTag('h1');
	echo $this->render('_form', [
        'model' => $model,
    ]);
echo Html::endTag('div');
?>
