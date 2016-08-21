<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\currency\CadRate */

$this->title = 'Update Cad Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cad Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cad-rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
