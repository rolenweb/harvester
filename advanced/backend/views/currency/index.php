<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Harvester';
echo Html::beginTag('div',['class' => 'currency-index']);
    echo Html::beginTag('div',['class' => 'body-content']);
        echo Html::beginTag('div',['class' => 'row']);
            if ($list_currency !== NULL) {
                foreach ($list_currency as $currency) {
                    echo Html::beginTag('div',['class' => 'col-sm-1 top-10']);
                        echo Html::a($currency,['/'.strtolower($currency).'-rate'],['class' => 'btn btn-default']);                            
                    echo Html::endTag('div');        
                }
            }

        echo Html::endTag('div');        
    echo Html::endTag('div');    
echo Html::endTag('div');
?>

