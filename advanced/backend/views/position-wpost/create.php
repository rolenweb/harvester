<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PositionWpost */

$this->title = 'Create Position Wpost';
$this->params['breadcrumbs'][] = ['label' => 'Position Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-wpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
