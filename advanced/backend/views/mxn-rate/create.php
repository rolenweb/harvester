<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\MxnRate */

$this->title = 'Create Mxn Rate';
$this->params['breadcrumbs'][] = ['label' => 'Mxn Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mxn-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
