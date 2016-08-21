<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\ZarRate */

$this->title = 'Update Zar Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zar Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zar-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
