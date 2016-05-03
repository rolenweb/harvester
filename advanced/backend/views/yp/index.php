<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Yp | Harvester';
echo Html::beginTag('div',['class' => 'site-index']);
    echo Html::beginTag('div',['class' => 'body-content']);
        echo Html::beginTag('div',['class' => 'body-content']);
            echo Html::beginTag('div',['class' => 'row']);
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('Keys',['/keys-yp'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('USA Cities',['/city-us'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('Position',['/position-yp'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('Schedule',['/schedule-yp'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('Property type ',['/property-type-yp'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('Property ',['/property-yp'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
            echo Html::endTag('div');        
        echo Html::endTag('div');    
    echo Html::endTag('div');
echo Html::endTag('div');
?>

