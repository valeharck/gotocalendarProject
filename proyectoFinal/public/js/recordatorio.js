$(document).ready(function () {
    $('#botonRec').on('click', function () {
        $('#myModalRec').modal();
    })

    $('#butModalRec').on('click', function (){
        anyadirRecordatorio();    
    })
});

function anyadirRecordatorio() {
    var data = {
        'titulo' : $('#titleRec').val()
    }
    axios.post(addRecd,data).then(function () {
        swal("Evento añadido", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        $('#myModal').modal('hide');
    })
}