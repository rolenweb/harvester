<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\NokRate */

$this->title = 'Create Nok Rate';
$this->params['breadcrumbs'][] = ['label' => 'Nok Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nok-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
