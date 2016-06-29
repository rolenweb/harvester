<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\ForecastTrafficSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$domain_id = getIdDomain();

$this->title = 'Forecast Traffics';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'forecast-traffic-index']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::beginTag('p');
        echo Html::a('Create Forecast Traffic', ['create','domain_id' => $domain_id], ['class' => 'btn btn-success btn-xs']);
    echo Html::endTag('p');
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'domain_id',
            'traffic',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
echo Html::endTag('div');

function getIdDomain()
{
    $out = null;
    $request = Yii::$app->request;
    if ($request->isGet)  { 
        if ($request->get('ForecastTrafficSearch') !== null) {
            if (isset($request->get('ForecastTrafficSearch')['domain_id'])) {
                $out = $request->get('ForecastTrafficSearch')['domain_id'];
            }
        }
    }
    return $out;
}
?>