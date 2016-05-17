<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\PropertyYp;

/* @var $this yii\web\View */
/* @var $model common\models\CityUs */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'City uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'city-us-view']);
    echo Html::beginTag('h1');
        echo Html::encode($this->title);
    echo Html::endTag('h1');
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'state',
            'lon',
            'lat',
            'created_at',
            'updated_at',
        ],
    ]);
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
echo Html::endTag('div');
echo Html::beginTag('div',['class' => 'table-responsive']);
    echo Html::beginTag('table',['class' => 'table table-bordered']);

if ($keysYp !== NULL) {
    foreach ($keysYp as $keyYp) {
        $count = count(PropertyYp::countItem($keyYp->id, $model->id));
        echo Html::beginTag('tr');
            echo Html::beginTag('th',['class' => 'text-center', 'colspan' => 2]);
                echo $keyYp->key;
            echo Html::endTag('th');
        echo Html::endTag('tr');
        if ($keyYp->key == 'pharmacy') {
            for ($i=0; $i < $count; $i++) { 
                echo Html::beginTag('tr');
                    echo Html::beginTag('td');
                        echo $i;
                    echo Html::endTag('td');
                    echo Html::beginTag('td');
                        $properties = PropertyYp::forItem($keyYp->id, $model->id, $i);
                        if ($properties !== NULL) {
                            echo Html::beginTag('div',['class' => 'table-responsive']);
                                echo Html::beginTag('table',['class' => 'table table-bordered']);
                                foreach ($properties as $property) {
                                    echo Html::beginTag('tr');
                                        echo Html::beginTag('td');
                                            echo $property->type->name;
                                            
                                        echo Html::endTag('td');
                                        echo Html::beginTag('td');
                                            echo $property->value;
                                        echo Html::endTag('td');
                                    echo Html::endTag('tr');
                                }
                                echo Html::endTag('table');
                            echo Html::endTag('div');
                        }
                        
                    echo Html::endTag('td');
                echo Html::endTag('tr');
                
            }
            
        }
        if ($keyYp->key == 'payday loans') {
            for ($i=0; $i < $count; $i++) { 
                echo Html::beginTag('tr');
                    echo Html::beginTag('td');
                        echo $i;
                    echo Html::endTag('td');
                    echo Html::beginTag('td');
                        $properties = PropertyYp::forItem($keyYp->id, $model->id, $i);
                        if ($properties !== NULL) {
                            echo Html::beginTag('div',['class' => 'table-responsive']);
                                echo Html::beginTag('table',['class' => 'table table-bordered']);
                                foreach ($properties as $property) {
                                    echo Html::beginTag('tr');
                                        echo Html::beginTag('td');
                                            echo $property->type->name;
                                            
                                        echo Html::endTag('td');
                                        echo Html::beginTag('td');
                                            echo $property->value;
                                        echo Html::endTag('td');
                                    echo Html::endTag('tr');
                                }
                                echo Html::endTag('table');
                            echo Html::endTag('div');
                        }
                        
                    echo Html::endTag('td');
                echo Html::endTag('tr');
                
            }
            
        }
    }
}
    echo Html::endTag('table');
echo Html::endTag('div');
?>
