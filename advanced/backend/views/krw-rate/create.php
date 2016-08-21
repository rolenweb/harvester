<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\KrwRate */

$this->title = 'Create Krw Rate';
$this->params['breadcrumbs'][] = ['label' => 'Krw Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krw-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
