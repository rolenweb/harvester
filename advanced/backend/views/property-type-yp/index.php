<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PropertyTypeYpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Property Type Yps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-type-yp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Property Type Yp', ['create'], ['class' => 'btn btn-success']) ?>
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
            'pattern',
            'type',
            [
                    'attribute'=>'created_at',
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
