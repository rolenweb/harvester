<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\ZarRate */

$this->title = 'Create Zar Rate';
$this->params['breadcrumbs'][] = ['label' => 'Zar Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zar-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
