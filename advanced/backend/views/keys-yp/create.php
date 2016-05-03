<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KeysYp */

$this->title = 'Add key';
$this->params['breadcrumbs'][] = ['label' => 'Keys Yps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo Html::beginTag('div',['class' => 'keys-yp-create']);
	echo Html::beginTag('h2');
		echo Html::encode($this->title);
	echo Html::endTag('h2');
		
	echo $this->render('_form', [
        'model' => $model,
    ]);

echo Html::endTag('div');
?>
