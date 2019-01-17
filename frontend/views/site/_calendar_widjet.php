<style>
   .calendar_items{
       cursor:pointer;
   }
	.calendarplace {
		padding: 10px;
		background: linear-gradient(to bottom, #62769F, #031B49);
	}
	
</style>
<div class="work">
    <div class="col3">
        <table id="calendar2">
            <thead>
            <tr>
                <td colspan="2">‹
                <td colspan="3">
                <td colspan="2">›
            <!--<tr>
                <td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
            <tbody>-->
        </table>
    </div>
    <div class="col9">
        <table id="calendar3" cellspacing="0">
            <thead>
            <tr><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td></tr>
            <tbody>
        </table>
    </div>
</div>
<script>
    function Calendar2(id, year, month) {
        var Dlast2 = new Date(year,month,0).getDate(),
            Dlast = new Date(year,month+1,0).getDate(),
            Dlast3 = new Date(year,month).getDate(),
            D = new Date(year,month,Dlast),
            D2 = new Date(year,month-1,Dlast2).getDate(),
            DNlast = new Date(D.getFullYear(),D.getMonth(),Dlast).getDay(),
            DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
            calendar = '<tr>',
            calendar3 = '<tr>',
            month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];

        if (DNfirst != 0) {
            var j = D2 - DNfirst + 1;
            for(var  i = 1; i < DNfirst; i++) {
                j++;
                calendar += '<td style="color:#8B8B8A">' + j;
                calendar3 += '<td style="color:#8B8B8A"><span>' + j + '</span>';
            }

        }else{
            var j = D2 - 6;
            for(var  i = 0; i < 6; i++) {
                j++;
                calendar += '<td style="color:#8B8B8A">' + j;
                calendar3 += '<td style="color:#8B8B8A"><span>' + j + '</span>';
            }
        }
        var array = [];
        <?
            $calendar = array();
            foreach($seminars_all as $v){
                $calendar_day = date("m",$v->data) - 1;
                $calendar = date("Yj",$v->data).$calendar_day;
        ?>
                array.push(<?=$calendar?>);
        <?  } ?>
        <?
            foreach($forums_all as $v){
                $calendar_day = date("m",$v->data) - 1;
                $calendar = date("Yj",$v->data).$calendar_day;
        ?>
            array.push(<?=$calendar?>);
        <?  } ?>
        function find(array, value) {
            for (var i = 0; i < array.length; i++) {
                if (array[i] == value) return 1;
            }
            return -1;
        }

        for(var  i = 1; i <= Dlast; i++) {
			
			var arrDate = [];
				arrDate['day'] = i;
				arrDate['month'] = D.getMonth()+1;
				arrDate['year'] = D.getFullYear();

            if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
//                calendar += '<td class="today"><span>' + i + '</span>';
                if(find(array, D.getFullYear()+""+i+""+D.getMonth())==1){
                    var time = D.getMonth()+1;
                    calendar3 += "<td class='event calendar_items getDate' data-id='"+D.getFullYear()+"-"+time+"-"+i+"'>";
                    calendar3 += "</div><span>" + i;
                }else
                    calendar3 += '<td class="today getDate" data-id="'+arrDate['year']+'-'+arrDate['month']+'-'+arrDate['day']+'"><span>' + i;
            }else if (find(array, D.getFullYear()+""+i+""+D.getMonth())==1){
//                calendar += "<td class=\"event\">" + i;
                var time = D.getMonth()+1;
                calendar3 += "<td class='event calendar_items getDate' data-id='"+D.getFullYear()+"-"+time+"-"+i+"'>";
                calendar3 += "</div><span>" + i;
            }else{
				//calendar += '<td>' + i;
                calendar3 += '<td class="getDate" data-id="'+arrDate['year']+'-'+arrDate['month']+'-'+arrDate['day']+'"><span>' + i;
            }

            if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
//              calendar += '<tr>';
                calendar3 += '<tr>';
            };
        }

        for(var  i = DNlast; i < 7; i++) {
            j = Dlast3 + i - DNlast;
//            calendar += '<td style="color:#8B8B8A">' + j;
            calendar3 += '<td style="color: #8B8B8A;"><span>' + j + '</span>';
        }

//        document.querySelector('#'+id+' tbody').innerHTML = calendar;
        document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
        document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D.getMonth();
        document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D.getFullYear();

        document.querySelector('#calendar3 tbody').innerHTML = calendar3;

//        if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {
//            // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток.
//            // Итог: всегда 6 строк для цифр
//            document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
//        }
    }
	

    Calendar2("calendar2", new Date().getFullYear(), new Date().getMonth());

</script>


