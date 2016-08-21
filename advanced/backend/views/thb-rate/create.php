<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\ThbRate */

$this->title = 'Create Thb Rate';
$this->params['breadcrumbs'][] = ['label' => 'Thb Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thb-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
