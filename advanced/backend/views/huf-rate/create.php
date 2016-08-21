<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\HufRate */

$this->title = 'Create Huf Rate';
$this->params['breadcrumbs'][] = ['label' => 'Huf Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huf-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
