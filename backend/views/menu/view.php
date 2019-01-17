<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

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
            'name',
            [
                'attribute' => 'description',
                'value' => $model->description,
                'format' => 'raw',
            ],
            [
                'attribute' => 'keywords',
                'value' => $model->keywords,
                'format' => 'raw',
            ],
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
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return \backend\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'top',
                'value' => function ($model) {
                    if($model->top == 1)
                        return 'Да';
                    else
                        return 'Нет';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'middle',
                'value' => function ($model) {
                    if($model->middle == 1)
                        return 'Да';
                    else
                        return 'Нет';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'footer',
                'value' => function ($model) {
                    if($model->footer == 1)
                        return 'Да';
                    else
                        return 'Нет';
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
