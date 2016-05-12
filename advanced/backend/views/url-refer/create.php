<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UrlRefer */

$this->title = 'Create Url Refer';
$this->params['breadcrumbs'][] = ['label' => 'Url Refers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-refer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
