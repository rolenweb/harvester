<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\NzdRate */

$this->title = 'Create Nzd Rate';
$this->params['breadcrumbs'][] = ['label' => 'Nzd Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nzd-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
