<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\currency\CadRate */

$this->title = 'Create Cad Rate';
$this->params['breadcrumbs'][] = ['label' => 'Cad Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cad-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
