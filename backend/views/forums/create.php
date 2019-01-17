<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Seminars */

$this->title = 'Создание форума';
$this->params['breadcrumbs'][] = ['label' => 'Форумы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
