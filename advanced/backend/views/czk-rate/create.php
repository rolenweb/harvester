<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\CzkRate */

$this->title = 'Create Czk Rate';
$this->params['breadcrumbs'][] = ['label' => 'Czk Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="czk-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
