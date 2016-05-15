<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UsaLocalPharmacy1 */

$this->title = 'Create Usa Local Pharmacy1';
$this->params['breadcrumbs'][] = ['label' => 'Usa Local Pharmacy1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usa-local-pharmacy1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
