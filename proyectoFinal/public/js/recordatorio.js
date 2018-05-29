$(document).ready(function () {
    cargarInformacion();

    $('#botonRec').on('click', function () {
        $('#myModalRec').modal();
    });
    $('#butModalRec').on('click', function (){
        anyadirRecordatorio();    
    });


});

function cargarInformacion() {
    axios.get(getInfoRec).then(function (response, data) {
        $('#accordion').html('');
        var texto= ' ';
        console.log(response.data.length)
        if (response.data.length>0){
            var respuesta = response.data;
            console.log(respuesta);
            for (let i = 0; i <respuesta.length ; i++) {
                var actual = respuesta[i];
                var tasks = actual.tasks;
                texto += `<div class="card">
                        <div class="card-header" id="heading`+actual.id+`">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse`+actual.id+`" aria-expanded="false" aria-controls="collapseOne">
                                    `+actual.taitle+`
                                </button>
                                <button onclick='mostrarModalModify(`+actual.id+`)' id="updtRec" value="`+actual.id+`" style="float: right" class="but btn btn-link" ><span class="fas fa-edit" ></span></button>
                                <button onclick='borarRecordatorio(`+actual.id+`)' value="`+actual.id+`" style="float: right" class="btn btn-link" id="delRec"><span class="fas fa-trash-alt" ></span></button>
                            </h5>
                        </div>
                        <div id="collapse`+actual.id+`" class="collapse" aria-labelledby="heading`+actual.id+`" data-parent="#accordion">
                            <div class="card-body">`;
                if (typeof tasks!== 'undefined' && tasks.length > 0) {
                    for (let j = 0; j < tasks.length ; j++) {
                        texto += `<li>`+tasks[j].body+`<span class="fa fa-check" style="float: right;color: green"></span></li>`;
                    }
                }
                texto+=`</div>
                        </div>
                    </div>`;
            }
        } else {
            texto = '';
        }
        $('#accordion').append(texto);
    })
}
function mostrar(id) {
    axios.get('recordatorios/' + id).then(function (response,data) {
        var respuesta = response.data;
        console.log(respuesta.titulo);
        $('#titUpdt').val(respuesta.titulo);
    });
}

function anyadirRecordatorio() {
    var data = {
        'titulo' : $('#titleRec').val()
    }
    axios.post(addRecd,data).then(function () {
        swal("Recordatorio añadido", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        $('#myModalRec').modal('hide');
        cargarInformacion();
    })
}


function mostrarModalModify(id) {
    mostrar(id);
    $('#modalU').modal();
    $('#butModalRecUpdt').on('click',function () {
        updateRecordatorio(id);
    })
}
function updateRecordatorio(id) {
    var data = {
        'id' : id,
        'titulo' : $('#titUpdt').val()
    }
   axios.put(updRecord,data).then(function () {
        swal("Recordatorio modificado", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        $('#modalU').modal('hide');
        this.cargarInformacion();
    })
}

function borarRecordatorio(id) {
    axios.delete('recordatorios/' + id).then(function () {
        swal("Recordatorio eliminado", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        this.cargarInformacion();
    })
}
