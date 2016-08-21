<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\AudRate */

$this->title = 'Create Aud Rate';
$this->params['breadcrumbs'][] = ['label' => 'Aud Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aud-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
