<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UrlReferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Url Refers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-refer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Url Refer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            'status',
            [
                'attribute'=>'status',
                'label' => 'Status',
                'content'=>function($data){
                    if ($data->status == 10) {
                        return 'Active';
                    }
                    if ($data->status == 5) {
                        return 'Error';
                    }
                }
            ],
            [
                'attribute'=>'created_at',
                'label' => 'Created',
                'content'=>function($data){
                    return date("Y-m-d H:i:s", $data->created_at);
                }
            ],
            [
                'attribute'=>'updated_at',
                'label' => 'Created',
                'content'=>function($data){
                    return date("Y-m-d H:i:s", $data->created_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
