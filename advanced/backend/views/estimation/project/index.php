<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\estimation\Project;

/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'desctiption:html',
            'currency',
            [
              
                'label' => 'Forecast Traffic (unic/month)',
                'content'=>function($data){
                    return $data->forecastTraffic;
                    
                }
            ],
            [
              
                'label' => 'Forecast Profic (currency/month)',
                'content'=>function($data){
                    return $data->forecastIncome - $data->forecastCost;
                    
                }
            ],
            
            [
                'attribute'=>'status',
                'label' => 'Status',
                'content'=>function($data){
                    return $data->titleStatus;
                    
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
                'label' => 'Updated',
                'content'=>function($data){
                    return date("Y-m-d H:i:s", $data->updated_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
