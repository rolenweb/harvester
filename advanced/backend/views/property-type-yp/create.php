<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PropertyTypeYp */

$this->title = 'Create Property Type Yp';
$this->params['breadcrumbs'][] = ['label' => 'Property Type Yps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'property-type-yp-create']);
	echo Html::beginTag('h1');
		echo Html::encode($this->title);
	echo Html::endTag('h1');
	echo $this->render('_form', [
        'model' => $model,
    ]);
echo Html::endTag('div');
?>
