<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\IdrRate */

$this->title = 'Create Idr Rate';
$this->params['breadcrumbs'][] = ['label' => 'Idr Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idr-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
