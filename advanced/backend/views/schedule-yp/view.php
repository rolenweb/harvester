<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ScheduleYp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Schedule Yps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-yp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'key_id',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
