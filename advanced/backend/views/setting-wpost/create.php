<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SettingWpost */

$this->title = 'Create Setting Wpost';
$this->params['breadcrumbs'][] = ['label' => 'Setting Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-wpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
