<header>
    <?= \frontend\widgets\HeaderWidget::Widget() ?>
    <div class="op-sem-slider1">
        <div id="carouselExampleControls10" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/op-sem-slide1.png" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>клиентоцентричность 360&deg;</h5>
                        <p>Прощай довольный клиент, да здравствует успешный клиент! </p>
                        <span>Мастер-класс Гарретта Джонстона <br>
                              CEO Macroscope Сonsulting
                            </span>

                    </div>
                    <div class="bot-line">
                        <div class="bot-line">
                            <div class="bot-line-cont d-flex">
                                <div class="blc-left w-50">
                                    До начала <br>
                                    семинара осталось
                                </div>
                                <div class="blc-right w-50 d-flex">
                                    <div class="sp-pup-num">
                                        <span>16</span>
                                        <div class="sp-smalltext">дней</div>
                                    </div>
                                    <div class="sp-pup-num">
                                        <span>12</span>
                                        <div class="sp-smalltext">часов</div>
                                    </div>
                                    <div class="sp-pup-num">
                                        <span>55</span>
                                        <div class="sp-smalltext">минут</div>
                                    </div>
                                    <div class="sp-pup-num">
                                        <span>09</span>
                                        <div class="sp-smalltext">секунд</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/images/op-sem-slide1.png" alt="...">
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <? foreach($model as $v){ ?>
        <a href="/trainings_and_seminars/<?=$v->url?>"><?=$v->title_opisanie?></a><br />
    <? } ?>
</div>