<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SeminarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тренинги и семинары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создание тренинга и семинара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_opisanie',
            'title',
            'description:ntext',
            'keywords',
            'url:url',
            [
                'attribute' => 'data',
                'value' => function ($model) {
                    return date('Y-m-d', $model->data);
                },
            ],
            //'title_opisanie',
            //'text_opisanie:ntext',
            //'img',
            //'text:ntext',
            //'data',
            //'sort',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
