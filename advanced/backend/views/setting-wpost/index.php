<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\SettingWpost;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SettingWpostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Wposts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-wpost-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setting Wpost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'domain',
            'user',
            'hash',
            'keys',
            [
                'attribute'=>'status',
                'content'=>function($data){
                    if ($data->status == SettingWpost::PENDING ) {
                        return 'Pending';
                    }
                    if ($data->status == SettingWpost::ACTIVE ) {
                        return 'Active';
                    }
                    if ($data->status == SettingWpost::FINISH ) {
                        return 'Finish';
                    }
                }
            ],
            [
                'attribute'=>'created_at',
                'content'=>function($data){
                    if ($data->created_at !== NULL) {
                        return date("Y-m-d H:i:s", $data->created_at);
                    }
                }
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
