<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CityUs */

$this->title = 'Create City Us';
$this->params['breadcrumbs'][] = ['label' => 'City uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-us-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
