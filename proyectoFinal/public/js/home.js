$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('#actualizar').click(function () {
        actualizar();
    });

    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
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
   console.log(data);
   $.ajax({
       /*headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },*/
       url: update,
       data: data,
       method: 'POST',
       success: function (response) {
           if (response.actualizado == true) {
               alert("okay");
           }
       }
   }).then(function (value) {
       swal("This modal will disappear soon!", {
           icon: "success",
           buttons: false,
           timer: 1000,
       });
   })
}