<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScheduleYp */

$this->title = 'Update Schedule Yp: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Schedule Yps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-yp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
