<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\RonRate */

$this->title = 'Create Ron Rate';
$this->params['breadcrumbs'][] = ['label' => 'Ron Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ron-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
