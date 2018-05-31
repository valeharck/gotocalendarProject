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
                            <div class="card-body" >
                                <div class="form-group" id="divAdd" style="border-bottom: 1px solid #4e555b">
                                <buton class="btn-sm btn btn-dark" id="addTarea" style="float: right;display: inline;margin-top: 5px;" onclick="addTarea(`+actual.id+`)">Añadir</buton>
                                <input type="text" name="tasks" class="form-control" placeholder="Tarea" id="inputTarea`+actual.id+`" style="width: 85%;margin-bottom: 10px"/>
                            </div>
                             <div class="mr-5 ml-5">`;
                if (typeof tasks!== 'undefined' && tasks.length > 0) {
                    for (let j = 0; j < tasks.length ; j++) {
                        texto += `<li >`+tasks[j].body+`<span class="fa fa-check" style="float: right;color: green" onclick="removeTarea(`+tasks[j].id+`)"></span></li>`;
                    }
                }
                texto+=`</div>
                    </div>
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
    axios.post(addRecd,data).then(function (response) {
        if (response.data.success == false) {
            swal( "El titulo no puede estar vacio" , {
                icon: "warning",
                buttons: false,
                timer: 1000,
            });
            $('#modalRec').modal('hide');
        } else {
            swal("Recordatorio añadido", {
                icon: "success",
                buttons: false,
                timer: 1000,
            });
            $('#myModalRec').modal('hide');
            cargarInformacion();
        }

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
   axios.put(updRecord,data).then(function (response) {
       if (response.data.success == false){
           swal( "El titulo no puede estar vacio" , {
               icon: "warning",
               buttons: false,
               timer: 1000,
           });
           $('#modalU').modal('hide');
       }else {
           swal("Recordatorio modificado", {
               icon: "success",
               buttons: false,
               timer: 1000,
           });
           $('#modalU').modal('hide');
           cargarInformacion();
       }
    })
}

function borarRecordatorio(id) {
    axios.delete('recordatorios/' + id).then(function () {
        swal("Recordatorio eliminado", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        cargarInformacion();
    })
}

function addTarea(id){
    var data = {
        'body': $('#inputTarea' + id).val(),
        'rec_id': id
    }
    axios.post(anyadirTarea, data).then(function (response) {
        console.log(response);
        if (response.data.success == false){
            swal( "La tarea no puede estar vacio" , {
                icon: "warning",
                buttons: false,
                timer: 1000,
            });
        }else {
            swal("Tarea creada", {
                icon: "success",
                buttons: false,
                timer: 1000,
            });
            cargarInformacion();
        }
    })
}

function removeTarea(id) {
    axios.delete('recordatorios/task/' + id).then(function () {
            swal("Tarea eliminada", {
                icon: "success",
                buttons: false,
                timer: 1000,
            });
            cargarInformacion();
    })
}
