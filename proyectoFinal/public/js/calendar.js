$(document).ready(function () {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        themeName: 'Lux',
        locale: 'es',
        header: {
            left: 'prev,next today',
            center: 'addEventButton',
            right: 'month,agendaWeek,listMonth'
        },
        locale: 'sp',
        customButtons: {
            addEventButton: {
                text: 'Añadir Evento',
                click: function () {
                    $('#myModal').modal();
                }
            },
        },
        events : info,
        eventClick: function (event) {
            var start = moment(event.start).format();
            var end = moment(event.end).format();
            $('#myModal2 #titleEvent_act').val(event.title);
            $('#myModal2 #idEvent').val(event.id);
            $('#myModal2 #fecha_ini_act').val(start);
            $('#myModal2 #fecha_fin_act').val(end);
            $('#myModal2').modal();
            //$('#calendar').fullCalendar( 'removeEvents' , 1 );
            //llamada axios para recargar pagina;
        }
    });

    $('#butModal').on('click', function () {
        addEvent();
    })
    $('#allDay').on('click',function(){
        if(!$(this).is(':checked')) {
            $('#fecha_fin').fadeIn('slow');
            $('#fecha_fin_label').fadeIn('slow');
        }else {
            $('#fecha_fin').fadeOut('slow');
            $('#fecha_fin_label').fadeOut('slow');
        }
    });

    $('#deleteEvent').on('click', function () {
        var id = $('#myModal2 #idEvent').val();
        deleteEvent(id);
    })
    $('#actulizarEvent').on('click',function () {
        var id = $('#myModal2 #idEvent').val();
        actualizarEvento(id);
    })
})

function addEvent() {
    //lamada axios para ingresar evento
    var title = $('#titleEvent').val();
    var fecha = $('#fecha_ini').val();
    var allday = $('#allDay:checked').val();
    var fin_fecha = $('#fecha_fin').val();

    if (allday == "on"){
        var data = {
            'title' : title,
            'allDay' : true,
            'fecha_ini' : fecha,
            'fecha_fin' : fin_fecha,
        };
        axios.post(addEvento,data).then(function () {
            var event={id:1 , title: title , start:  fecha};
            $('#calendar').fullCalendar( 'renderEvent', event, true);
            swal("Evento añadido", {
                icon: "success",
                buttons: false,
                timer: 1000,
            });
        })
        $('#myModal').modal('hide');
    } else {
        var data = {
            'title' : title,
            'allDay' : false,
            'fecha_ini' : fecha,
            'fecha_fin' : fin_fecha,
        }
        axios.post(addEvento,data).then(function () {
            var event={id:1 , title: title , start:  fecha, end : fin_fecha};
            $('#calendar').fullCalendar('renderEvent', event, false);
            swal("Evento añadido", {
                icon: "success",
                buttons: false,
                timer: 1000,
            });
        })
        $('#myModal').modal('hide');
    }
}

function actualizarEvento(id_evento){
    var eventUpdat = {
        'id' : id_evento,
        'title': $('#myModal2 #titleEvent_act').val(),
        'start': $('#myModal2 #fecha_ini_act').val(),
        'end': $('#myModal2 #fecha_fin_act').val()
    }
    axios.put(actualizarEv , eventUpdat).then(function () {
        $('#calendar').fullCalendar( 'updateEvents', eventUpdat );
        $('#calendar').fullCalendar( 'refetchEvents' );
        swal("Evento actualizado correctamente", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
    })

}

function deleteEvent(id_evento){
    axios.delete('calendar/' + id_evento).then(function () {
        $('#calendar').fullCalendar( 'removeEvents' , id_evento );
        swal("Evento eliminado correctamente", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
    })
    $('#myModal2').modal('hide');
}