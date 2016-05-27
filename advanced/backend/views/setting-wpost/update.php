<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SettingWpost */

$this->title = 'Update Setting Wpost: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Setting Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-wpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
