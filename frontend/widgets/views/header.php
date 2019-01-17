<div class="container">
    <div class="first-top-row d-flex justify-content-between">
        <div class=" text-left">
            <ul>
                <? $i = 1; foreach($menu_top as $v){ ?>
                    <? if($i == 1){ ?>
                        <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
                    <? }else{ ?>
                        <li>&bull;</li>
                        <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
                    <? } ?>
                <? $i++;} ?>
            </ul>
        </div>
        <div class="cbrg text-right d-flex justify-content-around">
            <div class="cabinet mr-2"><i class="fas fa-lock"></i><a href="">Личный кабинет</a></div>
            <div class="registr ml-2"><i class="far fa-user"></i><a href="">Регистрация</a></div>
        </div>
    </div>
    <hr>
    <div class="second-top-row d-flex justify-content-between">
        <div class="logo"><a href="/"><img src="/images/logo-abna.png" alt=""></a></div>
        <div class="top-article">
            <span>АСТАНИНСКАЯ АКАДЕМИЯ БИЗНЕСА И НЕТВОРКИНГА</span><br>
            г.Алматы, Бизнес центр "Южный", 5 этаж
        </div>
        <div class="top-phone">
            +7 (727)<span>237-77-89</span><br>
            <a href="" class="text-uppercase">Обратный звонок</a>
        </div>
    </div>
    <hr>
    <div class="thrird-top-row justify-content-between mb-3">
        <ul>
            <? $i = 1; foreach($menu_middle as $v){ ?>
                <? if($i == 1){ ?>
                    <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
                <? }else{ ?>
                    <li>&bull;</li>
                    <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
                <? } ?>
            <? $i++;} ?>
        </ul>
    </div>
</div>