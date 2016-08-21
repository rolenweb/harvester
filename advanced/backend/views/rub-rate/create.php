<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\RubRate */

$this->title = 'Create Rub Rate';
$this->params['breadcrumbs'][] = ['label' => 'Rub Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rub-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
