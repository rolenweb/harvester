<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\estimation\ForecastTraffic */

$this->title = 'Create Forecast Traffic';
$this->params['breadcrumbs'][] = ['label' => 'Forecast Traffics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forecast-traffic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
