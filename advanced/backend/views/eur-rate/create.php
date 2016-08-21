<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\EurRate */

$this->title = 'Create Eur Rate';
$this->params['breadcrumbs'][] = ['label' => 'Eur Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eur-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
