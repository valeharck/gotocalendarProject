$(document).ready(function () {
    $('#date').datepicker({
        minDate: new Date(1980, 1 - 1, 1),
        maxDate: new Date(),
        yearRange: '1950:2018',
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true

    });

    $('#date').on("change",function(){
        alert("guay")
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    })

});