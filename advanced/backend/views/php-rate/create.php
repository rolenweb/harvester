<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\PhpRate */

$this->title = 'Create Php Rate';
$this->params['breadcrumbs'][] = ['label' => 'Php Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="php-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
