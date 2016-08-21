<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\HkdRate */

$this->title = 'Create Hkd Rate';
$this->params['breadcrumbs'][] = ['label' => 'Hkd Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hkd-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
