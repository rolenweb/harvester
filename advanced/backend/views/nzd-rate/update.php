<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\NzdRate */

$this->title = 'Update Nzd Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nzd Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nzd-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
