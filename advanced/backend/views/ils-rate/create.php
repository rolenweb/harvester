<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\IlsRate */

$this->title = 'Create Ils Rate';
$this->params['breadcrumbs'][] = ['label' => 'Ils Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ils-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
