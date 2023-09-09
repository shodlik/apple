<?php

use common\models\AppleList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AppleListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Apple Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apple List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'date_appearance',
            'date_fall',
            [
                'attribute'=>'status',
                'value'=>function($model){
                    return $model->getStatus();
                }

            ],
            'color',
            'size:decimal',
            'eat',
            [
                'label'=>'action',
                'format'=>'raw',
                'value'=>function($model){
                    return '<a href="/apple/eat?id='.$model->id.'}" class="btn btn-success shadow-sm">Есть</a> <a href="/apple/fall?id='.$model->id.'}" class="btn btn-primary shadow-sm">Fall</a>';
                }
            ]

        ],
    ]); ?>


</div>
