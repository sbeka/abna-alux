<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']]);
    ?>
    <div class="col-md-12 pl-0 pr-0">
        <ul id="myTab" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">Основное</a>
            </li>
            <li class="nav-item">
                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link">Мета теги</a>
            </li>
            <li class="nav-item">
                <a id="dop-tab" data-toggle="tab" href="#dop" role="tab" aria-controls="profile" aria-selected="false" class="nav-link">Дополнительно</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content bg-white box-shadow p-4 mb-4">
            <div id="dop" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">
                <?= $form->field($model, 'opisanie')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'editorOptions' => [
                        'allowedContent' => true,
                        'height' => 300,
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]) ?>

                <?= $form->field($model, 'individualizacia')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'editorOptions' => [
                        'allowedContent' => true,
                        'height' => 300,
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]) ?>

                <?= $form->field($model, 'dla_kogo')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'editorOptions' => [
                        'allowedContent' => true,
                        'height' => 300,
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]) ?>

                <?= $form->field($model, 'prodolzhitelnost')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'editorOptions' => [
                        'allowedContent' => true,
                        'height' => 300,
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]) ?>

                <?= $form->field($model, 'dop_info')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'editorOptions' => [
                        'allowedContent' => true,
                        'height' => 300,
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]) ?>

                <?= $form->field($model, 'dop_text')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'editorOptions' => [
                        'allowedContent' => true,
                        'height' => 300,
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]) ?>
            </div>
            <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'title_opisanie')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'text_opisanie')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                ]) ?>

                <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                ]) ?>

                <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::className(), [
                    'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                ]) ?>

                <?
                    $hours = [];
                    for($i = 0; $i<=24;$i++)
                        $hours[] = $i;

                    $minutes = [];
                    for($i = 0; $i<=60;$i++)
                        $minutes[] = $i;
                ?>

                <?= $form->field($model, 'hours')->dropDownList($hours, ['prompt' => '', 'style' => 'width:100px;']) ?>
                <?= $form->field($model, 'minutes')->dropDownList($minutes, ['prompt' => '', 'style' => 'width:100px;']) ?>

                <?= $form->field($model, 'status')->dropDownList(['0' => 'Не активно', '1' => 'Ативно'], ['prompt' => '']) ?>

                <div class="row">
                    <div class="col-md-4 col-xs-3" style="text-align: center">
                        <div style="margin-top:20px;">
                            <img src="/backend/web/<?=$model->path.$model->img?>" alt="" style="width:400px;">
                        </div>
                    </div>
                </div>

                <?= $form->field($model, 'img')->label(false)->widget(FileInput::className(), [
                    'options' => [
                        'accept' => 'image/*',
                        'multiple' => false,
                    ]
                ]) ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
