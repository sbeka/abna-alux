<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use backend\models\Banner;
use yii\db\Expression;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="shortcut icon" href="http://smartacademy.kz/favicon.ico" type="image/x-icon">-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?=$content?>
<?=$this->render("_footer");?>
<script>
    $(document).ready(function () {

        AOS.init({
            offset: 50,
            duration: 600,
            easing: 'ease-in-sine',
            delay: 100,
//            disable: window.innerWidth < 768
        });

    });

</script>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage() ?>