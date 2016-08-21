<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\SekRate */

$this->title = 'Create Sek Rate';
$this->params['breadcrumbs'][] = ['label' => 'Sek Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sek-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
