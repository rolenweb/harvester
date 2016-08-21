<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\TryRate */

$this->title = 'Create Try Rate';
$this->params['breadcrumbs'][] = ['label' => 'Try Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="try-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
