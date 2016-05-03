<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Harvester';
echo Html::beginTag('div',['class' => 'site-index']);
    echo Html::beginTag('div',['class' => 'body-content']);
        echo Html::beginTag('div',['class' => 'body-content']);
            echo Html::beginTag('div',['class' => 'row']);
                echo Html::beginTag('div',['class' => 'col-sm-3']);
                    echo Html::a('YP',['/yp'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
            echo Html::endTag('div');        
        echo Html::endTag('div');    
    echo Html::endTag('div');
echo Html::endTag('div');
?>

