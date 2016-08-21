<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\ChfRate */

$this->title = 'Create Chf Rate';
$this->params['breadcrumbs'][] = ['label' => 'Chf Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chf-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
