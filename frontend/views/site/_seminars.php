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
<? if($seminars){ ?>
    <div class="carousel-item active">
        <div class="carousel-caption">
        <?$k = 0;foreach($seminars as $v){?>
            <?if($k==0){?>
                <div class="top-capture-wrap shadow-sm d-flex">
                    <div class="img-wrapp">
                        <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="">
                    </div>
                    <div class="slide-pup d-none d-md-block">
                        <div class="top-slide-pop d-flex">
                            <div class="tsp-numb">
                                <?
                                $month = date('n', $v->data)-1;
                                $month =  $arr[$month];

                                $datad = date('d', $v->data);
                                ?>
                                <span><?=$datad?></span><div class="smalltext"><?=$month?></div>
                            </div>
                            <div class="tsp-title">
                                <?=$v->title_opisanie?>
                                <?=$v->text_opisanie?>
                            </div>
                        </div>
                        <?=$v->text?>
                        <div class="tsp-but">
                            <a href="/trainings_and_seminars/<?=$v->url?>" style="color: #001849;">Читать далее</a>
                        </div>
                    </div>
                </div>
            <?}else{?>
                <?if($k==1){?>
                    <div class="top-capture-wrap1 shadow-sm d-md-flex justify-content-between d-none ">
                <?}?>
                    <div class="slide-pup ">
                        <div class="top-slide-pop d-flex">
                            <div class="tsp-numb">
                                <?
                                $month = date('n', $v->data)-1;
                                $month =  $arr[$month];

                                $datad = date('d', $v->data);
                                ?>
                                <span><?=$datad?></span><div class="smalltext"><?=$month?></div>
                            </div>
                            <div class="tsp-title">
                                <?=$v->title_opisanie?>
                                <?=$v->text_opisanie?>
                            </div>
                        </div>
                        <?=$v->text?>
                        <div class="tsp-but">
                            <a href="/trainings_and_seminars/<?=$v->url?>" style="color: #001849;">Читать далее</a>
                        </div>
                    </div>
                <?if($k==2){?>
                    </div>
                <?}?>
            <?}?>
        <?$k++;}?>
        </div>
    </div>

    <?foreach($seminars as $v){?>
        <div class="carousel-item  ">
            <div class="carousel-caption">
                <div class="top-capture-wrap1 ">
                    <div class="slide-pup">
                        <div class="top-slide-pop d-flex">
                            <div class="tsp-numb">
                                <?
                                $month = date('n', $v->data)-1;
                                $month =  $arr[$month];

                                $datad = date('d', $v->data);
                                ?>
                                <span><?=$datad?></span><div class="smalltext"><?=$month?></div>
                            </div>
                            <div class="tsp-title">
                                <?=$v->title_opisanie?>
                                <?=$v->text_opisanie?>
                            </div>
                        </div>
                        <?=$v->text?>
                        <div class="tsp-but">
                            <a href="/trainings_and_seminars/<?=$v->url?>" style="color: #001849;">Читать далее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>
<? } ?>
