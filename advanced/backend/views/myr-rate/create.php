<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\MyrRate */

$this->title = 'Create Myr Rate';
$this->params['breadcrumbs'][] = ['label' => 'Myr Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myr-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
