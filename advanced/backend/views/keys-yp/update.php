<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KeysYp */

$this->title = 'Update Keys Yp: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keys Yps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keys-yp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
