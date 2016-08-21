<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\DkkRate */

$this->title = 'Create Dkk Rate';
$this->params['breadcrumbs'][] = ['label' => 'Dkk Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dkk-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
