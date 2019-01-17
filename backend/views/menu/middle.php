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
            [
                'value' => function ($model) {
                    return
                        Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', ['move-up', 'id' => $model->id, 'where' => 'middle']) .
                        Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', ['move-down', 'id' => $model->id, 'where' => 'middle']);
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'text-align: center'],
            ],
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
                'buttons'=>[
                    'delete'=>function ($url, $model) {
                        if($model->url!='trainings_and_seminars'&&$model->url!='forums')
                            return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id],
                                ['title' => Yii::t('yii', 'Delete'), 'aria-label' => Yii::t('yii', 'Delete'), 'data-pjax' => '0',
                                    'data-confirm' => "Вы уверены, что хотите удалить этот элемент?", 'data-method' => 'post']);
                    }
                ],
                'template'=>'{view} {update} {delete}',
            ]
        ],
    ]); ?>
</div>
