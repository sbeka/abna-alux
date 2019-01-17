<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Seminars */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Спикеры и менторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'description',
                'value' => $model->description,
                'format' => 'raw',
            ],
            'keywords',
            [
                'attribute' => 'url',
                'value' => function ($model) {
                    $url = '/';
                    if($model->url == '/')
                        $url = "";
                    return Html::a('Посмотреть на сайте', $url.$model->url, ['target' => 'blank']);
                },
                'format' => 'raw',
            ],
            'title_opisanie',
            [
                'attribute' => 'text_opisanie',
                'value' => $model->text_opisanie,
                'format' => 'raw',
            ],
            'img',
            [
                'attribute' => 'text',
                'value' => $model->text,
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return \backend\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
