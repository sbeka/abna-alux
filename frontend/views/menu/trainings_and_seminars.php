<header>
    <?= \frontend\widgets\HeaderWidget::Widget() ?>
    <div class="op-sem-slider1">
        <div id="carouselExampleControls10" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <? $i = 1;foreach($slider as $v){ ?>
                    <div class="carousel-item <?if($i==1) echo "active";?>">
                        <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="<?$v->title1?>">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?=$v->title1?></h5>
                            <p><?=$v->title2?></p>
                            <span><?=$v->title3?></span>
                        </div>
                        <? if($model->data > time()){ ?>
                            <div class="bot-line">
                                <div class="bot-line">
                                    <div class="bot-line-cont d-flex">
                                        <div class="blc-left w-50">
                                            До начала <br>
                                            семинара осталось
                                        </div>
                                        <div class="blc-right w-50 d-flex">
                                            <div class="sp-pup-num">
                                                <span id="day">16</span>
                                                <div class="sp-smalltext">дней</div>
                                            </div>
                                            <div class="sp-pup-num">
                                                <span id="hours">12</span>
                                                <div class="sp-smalltext">часов</div>
                                            </div>
                                            <div class="sp-pup-num">
                                                <span id="minutes">55</span>
                                                <div class="sp-smalltext">минут</div>
                                            </div>
                                            <div class="sp-pup-num">
                                                <span id="seconds">09</span>
                                                <div class="sp-smalltext">секунд</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                <? $i++;} ?>
            </div>
        </div>
    </div>
</header>
<?
  $data .= date("Y, ",$model->data);
  $data .= date("n",$model->data)-1;
  $data .= date(", d, H, i",$model->data);
?>
<script>
    function fulltime () {
        var time=new Date();
        var newYear=new Date(<?=$data?>);
        var totalRemains=(newYear.getTime()-time.getTime());

        if (totalRemains>1){
            var RemainsSec = (parseInt(totalRemains/1000));
            var RemainsFullDays=(parseInt(RemainsSec));
            var secInLastDay=RemainsSec-RemainsFullDays*24*3600;
            var RemainsFullHours=(parseInt(secInLastDay/3600));
            if (RemainsFullHours<10){RemainsFullHours="0"+RemainsFullHours;}
            var secInLastHour=secInLastDay-RemainsFullHours*3600;
            var RemainsMinutes=(parseInt(secInLastHour/60));
            if (RemainsMinutes<10){RemainsMinutes="0"+RemainsMinutes;}
            var lastSec=secInLastHour-RemainsMinutes*60;
            if (lastSec<10){lastSec="0"+lastSec;}

            var day = RemainsFullDays / 86400;
            var day = Math.floor(day);

            var hours = (RemainsFullDays - day * 86400) / 3600;
            var hours = Math.floor(hours);

            var minutes = (RemainsFullDays - day * 86400 - hours * 3600) / 60;
            var minutes = Math.floor(minutes);

            var seconds = RemainsFullDays - day * 86400 - hours * 3600 - minutes * 60;
            var seconds = Math.floor(seconds);

            document.getElementById("day").innerHTML=day;
            document.getElementById("hours").innerHTML=hours;
            document.getElementById("minutes").innerHTML=minutes;
            document.getElementById("seconds").innerHTML=seconds;
            setTimeout('fulltime()',10);
        }

        else{
            document.getElementById("clock").innerHTML="Поздравляем с Новой Эрой!";
        }
    }
    fulltime();
</script>
<main class="d-flex justify-content-center pt-2 flex-column ">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                <li class="breadcrumb-item"><a href="/trainings_and_seminars">Тренинги и семинары</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$model->title_opisanie?></li>
            </ol>
        </nav>
        <? if(!empty($model->masterClassTasksImg)){ ?>
            <div class="title">
                <h1 class="mb-4">задачи мастер класса</h1>
                <span class="aint-befor"></span>
            </div>
            <div class="master-goals d-flex">
                <?foreach($model->masterClassTasksImg as $v){?>
                    <div class="goal text-center flex-column">
                        <img class="shadow" src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="">
                        <h3 class="mt-4"><?=$v->name?></h3>
                        <span ><?=\frontend\controllers\Functions::deleteCKEditorFirstTag1($v->text)?></span>
                    </div>
                <? } ?>
            </div>
        <? } ?>
    </div>

    <div class="price pt-4 pb-4 mb-4 text-center">
        <div class="title">
            <h1 class="mb-4">задачи мастер класса</h1>
            <span class="aint-befor"></span>
        </div>
        <div class="container">
            <? if(!empty($model->masterClassTasks)){ ?>
                <div class="price-content d-flex justify-content-around">
                    <?foreach($model->masterClassTasks as $v){?>
                        <div class="price-item ">
                            <div class="top-p-title">
                                <h2 class=" m-0"><?=$v->name?></h2>
                            </div>
                            <?=$v->text?>
                            <div class="bot-p-cont">
                                <p><?=$v->price?> ₸</p>
                                <a href=""><div class="price-but">принять участие</div></a>
                            </div>
                        </div>
                    <?}?>
                </div>
            <? } ?>
            <? if(!empty($model->corporateProjects)){ ?>
                <div class="price-content d-flex justify-content-center mt-2">
                    <div class="double-p-item shadow">
                        <div class="top-p-title">
                            <h2 class=" m-0">корпоративные проекты</h2>
                        </div>
                        <div class="double-p-cont d-flex">
                            <?foreach($model->corporateProjects as $v){?>
                                <div class="double-p-item-pup w-50">
                                    <h3><?=$v->name?></h3>
                                    <?=$v->text?>
                                    <a href=""> <div class="double-price-but">подробнее</div> </a>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
    <div class="op-sem-description">
        <div class="container">

            <div class="o-s-descr">
                <div class="title text-left">
                    <h1 class="mb-4">описание</h1>
                    <span class="aint-befor"></span>
                </div>
                <div class="o-s-descr-text">
                    <?=\frontend\controllers\Functions::deleteCKEditorFirstTag1($model->opisanie);?>
                </div>
            </div>
        </div>
    </div>
    <div class="for-who d-flex mb-4">
        <div class="container for-who-wrap">
            <div class="for-who-item shadow">
                <div class="for-who-item-cont">
                    <div class="title text-left">
                        <h1 class="mb-4">Индивидуализация:</h1>
                        <span class="aint-befor"></span>
                    </div>
                    <?=$model->individualizacia?>
                </div>
                <div class="for-who-item-cont">
                    <div class="title text-left">
                        <h1 class="mb-4">Продолжительность:</h1>
                        <span class="aint-befor"></span>
                    </div>
                    <?=$model->prodolzhitelnost?>
                </div>

            </div>
            <div class="for-who-item shadow">
                <div class="for-who-item-cont">
                    <div class="title text-left">
                        <h1 class="mb-4">Для кого мастер-класс:</h1>
                        <span class="aint-befor"></span>
                    </div>
                    <?=$model->dla_kogo?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="prog-steps mb-4 text-center">
        <div class="title">
            <h1 class="mb-4">Программа мастер-класса <br>
                состоит из девяти секций</h1>
            <span class="aint-befor"></span>
        </div>
        <div class="container">
            <div class="p-s-tabs-wrap  d-flex">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?$i = 1;foreach($model->section as $v){?>
                        <a class="nav-link " id="tab1" data-toggle="pill" href="#d<?=$i?>d" role="tab" aria-controls="v-pills-home" aria-selected="<?if($i==1)echo 'true';else echo 'false';?>">
                            <div class="p-s-tabs-numb"><span><?=$i?></span></div>
                            <div class="p-s-tabs-text">
                                <?=$v->name?>
                            </div>
                        </a>
                    <?$i++;}?>
                </div>
                <div class="tab-content shadow" id="v-pills-tabContent">
                    <?$i = 1;foreach($model->section as $v){?>
                    <div class="tab-pane<?if($i==1) echo ' fade show active';?>" id="d<?=$i?>d" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h2><?=$v->title?></h2>
                        <?=$v->text?>
                    </div>
                    <?$i++;}?>
                </div>
            </div>
        </div>
    </div>
    <div class="op-sem-dop-info mt-4">
        <div class="container">
            <div class="os-di-right">
                <div class="title text-left">
                    <h1 class="mb-4">дополнительная информация</h1>
                    <span class="aint-befor"></span>
                </div>
                <?=$model->dop_info?>
            </div>
            <div class="os-di-left"></div>
        </div>
    </div>
    <?if($model->clientCenteredness){?>
        <div class="klientocentr">
            <div class="container">
                <div class="title">
                    <h1 class="mb-4">Принципы «Клиентоцентричности 360˚</h1>
                    <span class="aint-befor" style="border-top:4px solid #fff;padding: 0rem 2rem;"></span>
                </div>
                <div class="klientocentr-infogr d-flex justify-content-around flex-column flex-md-row">
                    <? foreach($model->clientCenteredness as $v){ ?>
                        <div class="klientocentr-infogr-item">
                            <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="">
                            <h4><?=$v->name?></h4>
                            <?=$v->text?>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    <?}?>
    <div class="postscriptum">
        <div class="container">
            <?=$model->dop_text?>
        </div>
    </div>
</main>
