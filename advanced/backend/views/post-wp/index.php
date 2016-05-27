<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Refer | Harvester';
echo Html::beginTag('div',['class' => 'site-index']);
    echo Html::beginTag('div',['class' => 'body-content']);
        echo Html::beginTag('div',['class' => 'body-content']);
            echo Html::beginTag('div',['class' => 'row']);
                echo Html::beginTag('div',['class' => 'col-sm-2']);
                    echo Html::a('Keys',['/post-wp-keys'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-2']);
                    echo Html::a('Setting',['/setting-wpost'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                echo Html::beginTag('div',['class' => 'col-sm-2']);
                    echo Html::a('Position',['/position-wpost'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
            echo Html::endTag('div');        
        echo Html::endTag('div');    
    echo Html::endTag('div');
echo Html::endTag('div');
?>

