<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PayDayLoans1 */

$this->title = 'Update Pay Day Loans1: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pay Day Loans1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pay-day-loans1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
