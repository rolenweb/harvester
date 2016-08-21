<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\InrRate */

$this->title = 'Create Inr Rate';
$this->params['breadcrumbs'][] = ['label' => 'Inr Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inr-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
