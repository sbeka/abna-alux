<?
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\file\FileInput;
?>
<div class="box" id="photos">
    <div class="box-header with-border" id="slider">Слайдер для <?=$title_slider->name?></div>
    <div class="box-body">

        <div class="row">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data'], 'action' => ['slider/update', 'id' => $id]
            ]); ?>
            <?php foreach ($model as $v): ?>
                <div class="col-md-4 col-xs-3" style="text-align: center">
                    <div class="btn-group">
                        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span>', ['slider/move-up', 'id' => $v->id, 'menu_id' => $v->category_id], [
                            'class' => 'btn btn-default',
                            'data-method' => 'post',
                        ]); ?>
                        <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['slider/delete', 'id' => $v->id, 'menu_id' => $v->category_id], [
                            'class' => 'btn btn-default',
                            'data-method' => 'post',
                            'data-confirm' => 'Remove photo?',
                        ]); ?>
                        <?= Html::a('<span class="glyphicon glyphicon-arrow-right"></span>', ['slider/move-down', 'id' => $v->id, 'menu_id' => $v->category_id], [
                            'class' => 'btn btn-default',
                            'data-method' => 'post',
                        ]); ?>
                    </div>
                    <div style="margin-top:20px;">
                        <img src="/backend/web/<?=$v->path.$v->img?>" alt="" style="width: 80px;height: 80px;">
                    </div>
                    <?= $form->field($v, 'id[]')->hiddenInput(['value' => $v->id]) ?>
                    <?= $form->field($v, 'title1[]')->textInput(['value' => $v->title1]) ?>
                    <?= $form->field($v, 'title2[]')->textInput(['value' => $v->title2]) ?>
                    <?= $form->field($v, 'title3[]')->textInput(['value' => $v->title3]) ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

        <?php $form = ActiveForm::begin([
            'options' => ['enctype'=>'multipart/form-data'], 'action' => ['slider/create', 'id' => $id]
        ]); ?>

        <?= $form->field($new_model, 'files[]')->label(false)->widget(FileInput::className(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
            ]
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>