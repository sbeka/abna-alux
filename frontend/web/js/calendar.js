/*$('.calendar_items').click(function(){
    $.ajax({
        url: '/site/calendar',
        type: 'GET',
        data:{time: $(this).data('id')},
        success: function(res){
            $('.cal-dates-wrap').html(res);
            if(!res) alert('Ошибка!');
        },
        error: function(){
            alert('Error!');
        }
    });
});*/
// переключатель минус месяц
document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(1)').onclick = function() {
    Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month)-1);
    $('.calendar_items').click(function(){
        $.ajax({
            url: '/site/calendar',
            type: 'GET',
            data:{time: $(this).data('id')},
            success: function(res){
                //$('.cal-dates-wrap').html(res);
                if(!res) alert('Ошибка!');
            },
            error: function(){
                alert('Error!');
            }
        });
    });
}

// переключатель плюс месяц
document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(3)').onclick = function() {
    Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month)+1);
    $('.calendar_items').click(function(){
        $.ajax({
            url: '/site/calendar',
            type: 'GET',
            data:{time: $(this).data('id')},
            success: function(res){
                //$('.cal-dates-wrap').html(res);
                if(!res) alert('Ошибка!');
            },
            error: function(){
                alert('Error!');
            }
        });
    });
}

$(document).ready(function() {
	$('body').on('click', 'td.getDate', function() {
		var dataId = $(this).attr('data-id');
		console.log(dataId);
		$.ajax({
			url: 'site/getevents',
			type: 'GET',
			data: { date: dataId },
			success: function(res) {
				$('#calendar-events-box').html(res);
			},
			error: function() {
				alert('Не могу получить данные по дате, побробуйте позднее!');
			}
		});
		$.ajax({
			url: 'site/getforumandevents',
			type: 'GET',
			data: { date: dataId },
			success: function(res) {
				$('#seminar-and-forum-box').html(res);
			},
			error: function() {
				alert('Не могу получить данные по дате, побробуйте позднее!');
			}
		});
	});
});