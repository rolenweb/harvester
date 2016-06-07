<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PayDayLoans1 */

$this->title = 'Create Pay Day Loans1';
$this->params['breadcrumbs'][] = ['label' => 'Pay Day Loans1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-day-loans1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
