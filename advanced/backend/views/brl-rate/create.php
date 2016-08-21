<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\BrlRate */

$this->title = 'Create Brl Rate';
$this->params['breadcrumbs'][] = ['label' => 'Brl Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brl-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
