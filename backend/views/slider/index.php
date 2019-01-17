<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'description',
                'value' => $model->description,
                'format' => 'raw',
            ],
            [
                'attribute' => 'url',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'filter' => \backend\controllers\Label::statusList(),
                'value' => function ($model) {
                    return \backend\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template'=>'{view} {update}',
            ]
        ],
    ]); ?>
</div>
