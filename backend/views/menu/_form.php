<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12 pl-0 pr-0">
        <ul id="myTab" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">Основное</a>
            </li>
            <li class="nav-item">
                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link">Мета теги</a>
            </li>
            <li class="nav-item">
                <a id="profile-tab" data-toggle="tab" href="#for-home" role="tab" aria-controls="profile" aria-selected="false" class="nav-link">Для главной</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content bg-white box-shadow p-4 mb-4">
            <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="for-home" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">
                <?= $form->field($model, 'title1')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'title2')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'title3')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'title4')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                ]) ?>
            </div>
            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                ]) ?>

                <?= $form->field($model, 'top')->checkbox() ?>

                <?= $form->field($model, 'middle')->checkbox() ?>

                <?= $form->field($model, 'footer')->checkbox() ?>

                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'status')->dropDownList(['0' => 'Не активно', '1' => 'Ативно'], ['prompt' => '']) ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
