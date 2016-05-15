<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UsaLocalPharmacy1 */

$this->title = 'Update Usa Local Pharmacy1: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Usa Local Pharmacy1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usa-local-pharmacy1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
