<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\refer\Position */

$this->title = $model->domain->domain;
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'position-view']);
    echo Html::beginTag('h1');
        echo Html::encode($this->title);        
    echo Html::endTag('h1');
    echo Html::beginTag('p');
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
    echo Html::endTag('p');
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Domain',
                'value' => $model->domain->domain,
            ],
            [
                'label' => 'Url',
                'value' => $model->url->url,
            ],
            [
                'label' => 'Status',
                'value' => $model->getStatus(),
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]);
echo Html::endTag('div');
?>
