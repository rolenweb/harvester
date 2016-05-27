<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LocalUsaPharmacyWpost */

$this->title = 'Update Local Usa Pharmacy Wpost: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Local Usa Pharmacy Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="local-usa-pharmacy-wpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
