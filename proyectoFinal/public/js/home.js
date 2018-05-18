$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('#actualizar').click(function () {
        actualizar();
    });
})


function actualizar() {
   let nombre = $('#nombre').val();
   let apellidos = $('#apellidos').val();
   let fecha_nacimiento = $('#fecha_nacimiento').val();
   let email = $('#email').val();
   let username = $('#username').val();
   let password = $('#password').val();

   alert('Usuario ' + nombre + ', ' + apellidos + ', ' +fecha_nacimiento+ ', ' + email + ', ' + username + ', ' + password);
    swal("This modal will disappear soon!", {
        icon: "success",
        buttons: false,
        timer: 3000,
    });
}