<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UrlRefer */

$this->title = 'Update Url Refer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Url Refers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="url-refer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
