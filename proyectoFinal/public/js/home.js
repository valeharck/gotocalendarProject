$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('#actualizar').click(function () { actualizar() });
    $('#anyadNota').click(function () { addNota() });
})
function actualizar() {
   var nombre = $('#nombre').val();
   var apellidos = $('#apellidos').val();
   var fecha_nacimiento = $('#fecha_nacimiento').val();
   var email = $('#email').val();
   var username = $('#username').val();
   var password = $('#password').val();

   var data = {
       'nombre' : nombre,
       'apellidos' : apellidos,
       'fecha_nacimiento' : fecha_nacimiento,
       'email' : email,
       'username' : username,
       'password' : password
   }

   axios.put(update,data).then(function (response) {

       if (response){
           console.log(response)
           axios.get(profile);
           swal({
               title: "Error al actualizar el usuario",
               text: "Compruebe que todos los campos estan bien",
               icon: "warning",
               buttons: false,
               timer: 3000,
           });
       } else {
           console.log(response)
           swal("Usuario actualizado", {
               icon: "success",
               buttons: false,
               timer: 1000,
           });
           axios.get(profile);
       }
   })
}
function addNota() {
    var nota = $('#addNota').val();
    var data = {
        'nota' : nota
    }
    axios.all([
        axios.post(anyadir,data),
        axios.get(notas)
    ]).then(axios.spread(function (noteAd, note) {
        swal("Nota añadida correctamente", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        location.reload();
    }));
}
function actualizarNota(id_nota){
    var data = {
        'id' : id_nota,
        'nota' : $('#nota'+id_nota).val()
    }
    axios.all([
        axios.put(updateNota,data),
        axios.get(notas)
    ]).then(axios.spread(function (noteUp, note) {
        swal("Nota actualizada correctamente", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        location.reload();
    }));
}
function delNota(id_nota){
    axios.all([
        axios.delete('bloc/' + id_nota),
        axios.get(notas)
    ]).then(axios.spread(function (noted, note) {
        swal("Nota eliminada correctamente", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        location.reload();
    }));
}