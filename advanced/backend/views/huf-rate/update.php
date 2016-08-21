<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\HufRate */

$this->title = 'Update Huf Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Huf Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="huf-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
