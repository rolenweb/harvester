<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\CnyRate */

$this->title = 'Create Cny Rate';
$this->params['breadcrumbs'][] = ['label' => 'Cny Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cny-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
