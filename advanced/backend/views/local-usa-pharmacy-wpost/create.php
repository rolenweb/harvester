<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LocalUsaPharmacyWpost */

$this->title = 'Create Local Usa Pharmacy Wpost';
$this->params['breadcrumbs'][] = ['label' => 'Local Usa Pharmacy Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-usa-pharmacy-wpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
