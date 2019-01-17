<div class="footer-middle d-flex justify-content-around">
    <ul>
        <? $i = 1; foreach($menu as $v){ ?>
            <? if($i == 1){ ?>
                <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
            <? }else{ ?>
                <li>&bull;</li>
                <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
            <? } ?>
            <? $i++;} ?>
    </ul>
</div>