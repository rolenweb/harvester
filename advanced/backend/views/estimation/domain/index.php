<?php

use yii\helpers\Html;
use yii\grid\GridView;

$project_id = getIdProject();
/* @var $this yii\web\View */
/* @var $searchModel common\models\estimation\DomainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Domains';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['project/index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div',['class' => 'domain-index']);
    echo Html::tag('h1',Html::encode($this->title));
    echo Html::tag('p',Html::a('Create Domain', ['create','project_id' => $project_id], ['class' => 'btn btn-success']));
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'project_id',
                'label' => 'Project',
                'content'=>function($data){
                    return $data->project->title;
                }
            ],
            [
                'attribute'=>'status',
                'label' => 'Status',
                'content'=>function($data){
                    return $data->titleStatus;
                }
            ],
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
    ]);
echo Html::endTag('div');


function getIdProject()
{
    $out = null;
    $request = Yii::$app->request;
    if ($request->isGet)  { 
        if ($request->get('DomainSearch') !== null) {
            if (isset($request->get('DomainSearch')['project_id'])) {
                $out = $request->get('DomainSearch')['project_id'];
            }
        }
    }
    return $out;
}

?>