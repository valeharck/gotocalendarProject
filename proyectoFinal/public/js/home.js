$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('#actualizar').click(function () {
        actualizar();
    });

    $('#anyadNota').click(function () {
        addNota();
    })

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

   axios.put(update,data).then(function () {
       swal("Usuario actualizado", {
           icon: "success",
           buttons: false,
           timer: 1000,
       });
       axios.get(profile);
   })
}

function addNota() {
    var nota = $('#nota').val();
    var data = {
        'nota' : nota
    }

    axios.post(anyadir,data).then(function () {
        axios.get(notas);
        swal("Nota añadida correctamente", {
            icon: "success",
            buttons: false,
            timer: 1000,
        });
    })
}