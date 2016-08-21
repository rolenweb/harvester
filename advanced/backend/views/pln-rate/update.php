<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\PlnRate */

$this->title = 'Update Pln Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pln Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pln-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
