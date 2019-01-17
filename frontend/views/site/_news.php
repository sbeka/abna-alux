<?
$arr = [
    'январь',
    'февраль',
    'март',
    'апрель',
    'май',
    'июнь',
    'июль',
    'август',
    'сентябрь',
    'октябрь',
    'ноябрь',
    'декабрь'
];
?>
<div class="second-slider">
    <div class="title">
        <h1 class="mb-4">новости бизнес академии</h1>
        <span class="aint-befor"></span>
    </div>
    <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption d-none d-md-block">
                    <? $i = 0;foreach($news as $v){ ?>
                        <? if($i==0){ ?>
                            <div class="top-capture-wrap1 shadow-sm d-flex justify-content-between">
                        <? } ?>
                        <? if($i!==0 && $i % 2==0){ ?>
                            </div>
                            <div class="top-capture-wrap1 shadow-sm d-flex justify-content-between">
                        <? } ?>
                            <div class="slide-pup">
                                <div class="top-slide-pop d-flex">
                                    <?
                                        $month = date('n', $v->data)-1;
                                        $month =  $arr[$month];

                                        $datad = date('d', $v->data);
                                    ?>
                                    <div class="tsp-numb">
                                        <span><?=$datad?></span><div class="smalltext"><?=$month?></div>
                                    </div>
                                    <div class="tsp-title">
                                        <?=$v->title_opisanie?>
                                    </div>
                                </div>
                                <?=$v->text_opisanie?>
                                <div class="tsp-but">
                                    Читать далее
                                </div>
                            </div>
                    <? $i++;} ?>
                        </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>