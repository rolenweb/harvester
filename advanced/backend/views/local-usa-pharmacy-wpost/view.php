<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LocalUsaPharmacyWpost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Local Usa Pharmacy Wposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-usa-pharmacy-wpost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'key',
            'title',
            'street_address',
            'city_state',
            'phone',
            'website',
            'open_details',
            'description',
            'extra_phones',
            'years_in_business',
            'brands',
            'payment',
            'categories',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>