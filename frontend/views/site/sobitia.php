<? foreach($seminars as $v){ ?>
    <div class="cal-dates p-4 d-flex flex-row justify-content-between">
        <div class="cal-numb-wrap d-flex">
            <div class="cal-numb">
                <?
                $month = date('n', $seminar->data)-1;
                $month =  $arr[$month];

                $datad = date('d', $seminar->data);
                ?>
                <span><?=$datad?></span>
                <div class="cal-smalltext"><?=$month?></div>
            </div>
            <div class="cal-pup-textt">
                <?=$v->title_opisanie?>
            </div>
        </div>
        <div class="cal-time d-flex">
            <div class="cal-hour">19</div>
            <div class="cal-min-am-pm">
                <div class="cal-mins">00</div>
                <div class="cal-am-pm">am</div>
            </div>
        </div>
    </div>
<? } ?>
<? foreach($forums as $v){ ?>
    <div class="cal-dates p-4 d-flex flex-row justify-content-between">
        <div class="cal-numb-wrap d-flex">
            <div class="cal-numb">
                <?
                $month = date('n', $seminar->data)-1;
                $month =  $arr[$month];

                $datad = date('d', $seminar->data);
                ?>
                <span><?=$datad?></span>
                <div class="cal-smalltext"><?=$month?></div>
            </div>
            <div class="cal-pup-textt">
                <?=$v->title_opisanie?>
            </div>
        </div>
        <div class="cal-time d-flex">
            <div class="cal-hour">19</div>
            <div class="cal-min-am-pm">
                <div class="cal-mins">00</div>
                <div class="cal-am-pm">am</div>
            </div>
        </div>
    </div>
<? } ?>
