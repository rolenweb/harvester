<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\SgdRate */

$this->title = 'Create Sgd Rate';
$this->params['breadcrumbs'][] = ['label' => 'Sgd Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgd-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
