/*============================================================================
           EDITAR USUARIOS             
=============================================================================*/

$(".tablas").on("click", ".btnEditarUsuario", function() {


var idUsuario = $(this).attr("idUsuarios");



var datos = new FormData();

datos.append("idUsuario", idUsuario);


$.ajax({



    url:"ajax/usuarios.ajax.php",
    metod :"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){



        
    }
})





})