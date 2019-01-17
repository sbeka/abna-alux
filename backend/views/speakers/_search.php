<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SeminarsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'keywords') ?>

    <?= $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'title_opisanie') ?>

    <?php // echo $form->field($model, 'text_opisanie') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
