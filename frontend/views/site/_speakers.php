<link href="/main/style.css" rel="stylesheet">
<? if($speakers){ ?>
    <div class="container mt-5">
        <div class="title">
            <h1 class="mb-4">спикеры и менторы мирового уровня</h1>
            <span class="aint-befor"></span>
        </div>
        <div class="row blog mt-5">
            <div class="col-md-12">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner ">
                        <? $i = 0;foreach($speakers as $v){ ?>
                            <? if($i==0){ ?>
                                <div class="carousel-item active">
                                    <div class="row justify-content-center d-flex">
                            <? } ?>
                            <? if($i!==0 && $i % 4==0){ ?>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row justify-content-center d-flex">
                            <? } ?>
                                    <div class="col-md-3">
                                        <div class="img-wrap-speak shadow">
                                            <a href="#">
                                                <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="Image" class="">
                                            </a>
                                        </div>
                                        <h3 class="mt-4"><?=$v->title_opisanie?></h3>
                                        <?=$v->text_opisanie?>
                                    </div>
                                <!--.row-->
                        <? $i++;} ?>
                        <!--.item-->
                                </div>
                            </div>
                    </div>
                    <!--.carousel-inner-->
                </div>
                <!--.Carousel-->
                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="speak-but">вся команда</div>
    </div>
<? } ?>