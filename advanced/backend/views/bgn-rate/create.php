<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\BgnRate */

$this->title = 'Create Bgn Rate';
$this->params['breadcrumbs'][] = ['label' => 'Bgn Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bgn-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
