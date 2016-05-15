<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UsaLocalPharmacy1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usa Local Pharmacy1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usa-local-pharmacy1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usa Local Pharmacy1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'street_address',
            'city_state',
            'phone',
            // 'website',
            'open_details',
            // 'description',
            // 'extra_phones',
            // 'years_in_business',
            // 'brands',
            // 'payment',
            // 'categories',
            [
                'attribute'=>'updated_at',
                'label' => 'Created',
                'content'=>function($data){
                    return date("Y-m-d H:i:s", $data->created_at);
                }
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
