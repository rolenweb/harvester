<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\GBPRate */

$this->title = 'Create Gbprate';
$this->params['breadcrumbs'][] = ['label' => 'Gbprates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gbprate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
