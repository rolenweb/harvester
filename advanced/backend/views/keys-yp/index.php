<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KeysYpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keys Yps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keys-yp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Keys Yp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
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
