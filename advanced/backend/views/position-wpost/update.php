<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PositionWpost */

$this->title = 'Update Position Wpost: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Position Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="position-wpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
