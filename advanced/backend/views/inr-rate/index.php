<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\currency\InrRateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inr Rates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inr-rate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inr Rate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at:datetime',
            //'updated_at',
            'date',
            'code',
            'rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
