<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PositionYpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Position Yps';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'position-yp-index']);
    echo Html::beginTag('h2');
        echo Html::encode($this->title);
    echo Html::endTag('h2');
    echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute'=>'key_id',
                    'content'=>function($data){
                        return $data->key->key;
                    }
                ],
                [
                    'attribute'=>'start',
                    'content'=>function($data){
                        return $data->startCity->name.', '.$data->startCity->state;
                    }
                ],
                [
                    'attribute'=>'current',
                    'content'=>function($data){
                        return $data->currentCity->name.', '.$data->currentCity->state;
                    }
                ],
                [
                    'attribute'=>'current',
                    'label' => 'process',
                    'content'=>function($data){
                        $process = $data->process();
                        return $process[0].' from '.$process[1].' or '.round($process[0]/$process[1]*100).'%';
                    }
                ],
                [
                    'attribute'=>'end',
                    'content'=>function($data){
                        return $data->endCity->name.', '.$data->endCity->state;
                    }
                ],
                
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    echo Html::beginTag('p');
        echo Html::a('Create Position Yp', ['create'], ['class' => 'btn btn-success']);
    echo Html::endTag('p');
echo Html::endTag('div');
?>
