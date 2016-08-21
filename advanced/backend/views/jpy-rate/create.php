<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\JpyRate */

$this->title = 'Create Jpy Rate';
$this->params['breadcrumbs'][] = ['label' => 'Jpy Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jpy-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
