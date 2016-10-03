<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\socks\Socks */

$this->title = 'Create Socks';
$this->params['breadcrumbs'][] = ['label' => 'Socks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
