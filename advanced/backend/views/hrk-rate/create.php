<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\HrkRate */

$this->title = 'Create Hrk Rate';
$this->params['breadcrumbs'][] = ['label' => 'Hrk Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrk-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
