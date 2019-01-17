<?
use yii\helpers\Html;

$this->title = 'Слайдер '.$menu->title;
$this->params['breadcrumbs'][] = ['label' => 'меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('Редактирование', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>
<div class="box" id="photos">
    <div class="box-body">
        <div class="row">
            <?php foreach ($Slider as $v): ?>
                <div class="col-md-2 col-xs-3" style="text-align: center">
                    <div style="margin-top:20px;">
                        <img src="/backend/web/<?=$v->path.$v->img?>" alt="" style="width: 80px;height: 80px;"><br /><br />
                        <?=$v->title1?><br /><br />
                        <?=$v->title2?><br /><br />
                        <?=$v->title3?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>