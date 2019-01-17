<?= \frontend\widgets\HeaderWidget::Widget() ?>
<main class="d-flex justify-content-center pt-2 flex-column ">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная страница</a></li>
                <li class="breadcrumb-item active" aria-current="page">Спикеры</li>
            </ol>
        </nav>
        <div class="title">
            <h1 class="mb-4">спикеры</h1>
            <span class="aint-befor"></span>
        </div>
        <?foreach($model as $k => $v){?>
            <?if($k==0){?>
            <div  class="speaker-item d-flex flex-md-row flex-column justify-content-between shadow">
                <div class="col-md-4 col-sm-12 p-md-0"><img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt=""></div>
                <div class="col-md-8 col-sm-12 text-left ml-3">
                    <div class="si-title">
                        <h1 class="mb-3 mt-md-0 mt-3"><?=$v->title_opisanie?></h1>
                        <span class="aint-befor"></span>
                    </div>
                    <span class="si-text"><?=$v->text?></span>
                </div>
            </div>
            <?}else{?>
                <div data-aos="" class="speaker-item d-flex flex-md-row flex-column justify-content-between shadow mt-md-4 mt-3">
                    <div class="col-md-4 p-md-0"><img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt=""></div>
                    <div class="col-md-8 text-left ml-3">
                        <div class="si-title">
                            <h1 class="mb-3"><?=$v->title_opisanie?></h1>
                            <span class="aint-befor"></span>
                        </div>
                        <span class="si-text"><?=$v->text?></span>
                    </div>
                </div>
            <?}?>
        <?}?>
    </div>
</main>