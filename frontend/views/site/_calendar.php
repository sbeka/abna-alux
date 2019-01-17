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
<div class="">
    <div class="boxTitle d-flex mb-4">
        <span></span> <h3>Календарь событий</h3>
    </div>
    <div class="calendarplace">
        <?=$this->render('_calendar_widjet', compact('seminars_all', 'forums_all'));?>
    </div>
	<div id="calendar-events-box">
		<h1>Выберите дату</h1>
		<!--<div class="event-item">
			<div class="event-date">
				<h1>14</h1>
				<span>июня</span>
			</div>
			<div class="event-time">
				<table>
					<tr>
						<td>
							<div class="hour">10</div>
						</td>
						<td>
							<div class="minute">00</div>
							<div class="type">am</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="event-title">
				<a href="">Business and Investor Summit 2018 - Johannesburg</a>
			</div>
			<div class="clear"></div>
		</div>-->
	</div><!-- END #calendar-events-box -->
    <div class="cal-dates-wrap">
        <? if($seminars_calendar){ ?>
            <? foreach($seminars_calendar as $v){ ?>
                <div class="cal-dates p-4 d-flex flex-row justify-content-between">
                    <div class="cal-numb-wrap d-flex">
                        <div class="cal-numb">
                            <?
                            $data =  date("Y-m-d", $v->data);
                            $time = $v->data - strtotime($data);

                            $minutes = ($time % 3600) / 60;
                            $hours = $time / 3600;

                            $pattern = "/(\d+)\.(\d+)/i";
                            $replacement = "\$1";
                            $hours =  preg_replace($pattern, $replacement, $hours);

                            $month = date('n', $v->data)-1;
                            $month =  $arr[$month];

                            $datad = date('d', $v->data);
                            ?>
                            <span><?=$datad?></span>
                            <div class="cal-smalltext"><?=$month?></div>
                        </div>
                        <div class="cal-pup-textt">
                            <?=$v->title_opisanie?>
                        </div>
                    </div>
                    <div class="cal-time d-flex">
                        <div class="cal-hour"><?=$hours?></div>
                        <div class="cal-min-am-pm">
                            <div class="cal-mins"><?=$minutes?></div>
                            <div class="cal-am-pm">am</div>
                        </div>
                    </div>
                </div>
            <? } ?>
        <? } ?>
        <? if($forums_calendar){ ?>
            <? foreach($forums_calendar as $v){ ?>
                <div class="cal-dates p-4 d-flex flex-row justify-content-between">
                    <div class="cal-numb-wrap d-flex">
                        <div class="cal-numb">
                            <?
                                $data =  date("Y-m-d", $v->data);
                                $time = $v->data - strtotime($data);

                                $minutes = ($time % 3600) / 60;
                                $hours = $time / 3600;

                                $pattern = "/(\d+)\.(\d+)/i";
                                $replacement = "\$1";
                                $hours =  preg_replace($pattern, $replacement, $hours);

                                $month = date('n', $v->data)-1;
                                $month =  $arr[$month];

                                $datad = date('d', $v->data);
                            ?>
                            <span><?=$datad?></span>
                            <div class="cal-smalltext"><?=$month?></div>
                        </div>
                        <div class="cal-pup-textt">
                            <?=$v->title_opisanie?>
                        </div>
                    </div>
                    <div class="cal-time d-flex">
                        <div class="cal-hour"><?=$hours?></div>
                        <div class="cal-min-am-pm">
                            <div class="cal-mins"><?=$minutes?></div>
                            <div class="cal-am-pm">am</div>
                        </div>
                    </div>
                </div>
            <? } ?>
        <? } ?>
    </div>
</div>
<? if($seminars_left_calendar){ ?>
<div class="semifor">
    <div class="semi-title d-flex">
        <span></span> <h3>семинары и Форумы</h3>
    </div>
    <div class="seminar-pups mt-4">
        <? foreach ($seminars_left_calendar as $v){?>
        <div class="semunar-pup d-flex flex-md-row justify-content-between flex-column">
            <div class="sp-img-wrap">
                <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="" >
            </div>
            <div class="sp-text ">
                <div class="sp-pup-top d-flex">
                    <?
                        $month = date('n', $v->data)-1;
                        $month =  $arr[$month];

                        $datad = date('d', $v->data);
                    ?>
                    <div class="sp-pup-num">
                        <span><?=$datad?></span>
                        <div class="sp-smalltext"><?=$month?></div>
                    </div>
                    <div class="sp-pup-textt">
                        <?=$v->title_opisanie?>
                    </div>
                </div>
                <div class="sp-pup-sectext mt-4">
                    <?=$v->text_opisanie?>
                </div>
                <div class="sp-pup-but">
                    <a href="/trainings_and_seminars/<?=$v->url?>" style="color: #001849;">Читать далее</a>
                </div>

            </div>
        </div>
        <? } ?>
        <? foreach ($forums_left_calendar as $v){?>
            <div class="semunar-pup d-flex flex-md-row justify-content-between flex-column">
                <div class="sp-img-wrap">
                    <img src="<?='/'.@backend.'/web/'.$v->path.$v->img?>" alt="">
                </div>
                <div class="sp-text ">
                    <div class="sp-pup-top d-flex">
                        <?
                        $month = date('n', $v->data)-1;
                        $month =  $arr[$month];

                        $datad = date('d', $v->data);
                        ?>
                        <div class="sp-pup-num">
                            <span><?=$datad?></span>
                            <div class="sp-smalltext"><?=$month?></div>
                        </div>
                        <div class="sp-pup-textt">
                            <?=$v->title_opisanie?>
                        </div>
                    </div>
                    <div class="sp-pup-sectext mt-4">
                        <?=$v->text_opisanie?>
                    </div>
                    <div class="sp-pup-but">читать далее</div>
                </div>
            </div>
        <? } ?>
    </div>
</div>
<? } ?>