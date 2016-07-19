<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\UsdRate */

$this->title = 'Create Usd Rate';
$this->params['breadcrumbs'][] = ['label' => 'Usd Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usd-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
