<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Refer | Harvester';
echo Html::beginTag('div',['class' => 'site-index']);
    echo Html::beginTag('div',['class' => 'body-content']);
        echo Html::beginTag('div',['class' => 'body-content']);
            echo Html::beginTag('div',['class' => 'row']);
                echo Html::beginTag('div',['class' => 'col-sm-1']);
                    echo Html::a('Usa Local Pharmacy 1',['/usa-local-pharmacy1'],['class' => 'btn btn-default btn-sm']);
                echo Html::endTag('div');        
                
            echo Html::endTag('div');        
        echo Html::endTag('div');    
    echo Html::endTag('div');
echo Html::endTag('div');
?>

