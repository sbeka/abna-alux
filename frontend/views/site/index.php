<?
use frontend\controllers\Functions;
?>
<header>
    <?= \frontend\widgets\HeaderWidget::Widget() ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <? $i = 1;foreach($slider as $v){ ?>
                <div class="carousel-item <? if($i == 1){?>active<? } ?>">
                    <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="<?$v->title1?>">
                    <div class="carousel-caption d-none d-md-block wow flipInY">
                        <h5><?=$v->title1?></h5>
                        <p><?=$v->title2?></p>
                        <span><?=$v->title3?></span>
                    </div>
                </div>
                <? $i++;} ?>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<main class="d-flex justify-content-center pt-5 flex-column ">
    <div class="container justify-content-center">
        <div class="title">
            <h1 class="mb-4"><?=$model->title1?></h1>
            <span class="aint-befor"></span>
        </div>
        <div class="achives flex-column flex-md-row d-flex justify-content-center mb-5">
            <div class="achivments d-flex justify-content-center">
                <div class="numb"><span class="counter numb"><?=$model->title2?></span></div>
                <div class="words">проведенных
                    мероприятий</div>
            </div>
            <div class="achivments d-flex justify-content-center">
                <div class="numb"><span class="counter numb"><?=$model->title3?></span></div>
                <div class="words">учеников нашей школы</div>
            </div>
            <div class="achivments d-flex justify-content-center">
                <div class="numb">№1</div>
                <div class="words">бизнес академия в Астане</div>
            </div>
        </div>
        <div class="ach-text wow fadeInRight" data-wow-delay="1s">
            <span ><?=Functions::deleteCKEditorFirstTag1($model->title4)?></span>
            <?=$model->text?>
        </div>

    </div>
    <div class="second-slider">
        <div class="title">
            <h1 class="mb-4">ближайшие тренинги и семинары</h1>
            <span class="aint-befor"></span>
        </div>
        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                 <?=$this->render('_seminars', compact('seminars'));?>
            </div>

            <a class="carousel-control-prev d-block d-md-none" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next d-block d-md-none" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container">
		<div class="row">
			<div class="col-md-6">
				<?=$this->render('_seminars_and_forums')?>
			</div>
			<div class="col-md-6">
				<div class="seminars wow fadeInRight">
					<?=$this->render('_calendar', compact('forums_calendar', 'seminars_calendar', 'seminars_all', 'forums_all', 'seminars_left_calendar', 'forums_left_calendar'));?>
				</div>
			</div>
		</div>
        
    </div>

    <?=$this->render('_news', compact('news'));?>

    <?=$this->render('_speakers', compact('speakers'));?>
</main>