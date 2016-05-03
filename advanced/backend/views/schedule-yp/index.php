<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\ScheduleYp;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ScheduleYpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedule Yps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-yp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Schedule Yp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'key_id',
                'content'=>function($data){
                        return $data->key->key;
                }
            ],
            [
                'attribute'=>'status',
                'content'=>function($data){
                    if ($data->status == ScheduleYp::PENDING ) {
                        return 'Pending';
                    }
                    if ($data->status == ScheduleYp::ACTIVE ) {
                        return 'Active';
                    }
                    if ($data->status == ScheduleYp::FINISH ) {
                        return 'Finish';
                    }
                }
            ],
            [
                'attribute'=>'start',
                'content'=>function($data){
                    if ($data->start !== NULL) {
                        return date("Y-m-d H:i:s", $data->start);
                    }
                }
            ],
            [
                'attribute'=>'end',
                'content'=>function($data){
                    if ($data->end !== NULL) {
                        return date("Y-m-d H:i:s", $data->end);
                    }
                }
            ],
            
            'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
