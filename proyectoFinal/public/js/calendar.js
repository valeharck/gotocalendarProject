$(document).ready(function () {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        themeName: 'Lux',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        }
    });
})