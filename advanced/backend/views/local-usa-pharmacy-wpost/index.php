<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LocalUsaPharmacyWpostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Local Usa Pharmacy Wposts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-usa-pharmacy-wpost-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Local Usa Pharmacy Wpost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'title',
            'street_address',
            'city_state',
            // 'phone',
            // 'website',
            // 'open_details',
            // 'description',
            // 'extra_phones',
            // 'years_in_business',
            // 'brands',
            // 'payment',
            // 'categories',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
