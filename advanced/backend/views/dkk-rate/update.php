<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\DkkRate */

$this->title = 'Update Dkk Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dkk Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dkk-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
