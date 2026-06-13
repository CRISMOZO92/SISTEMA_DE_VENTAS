/*============================================================================
        EDITAR USUARIOS             
=============================================================================*/

console.log("usuarios.js cargado");

$(".tablas").on("click", ".btnEditarUsuario", function () {

    
    var idUsuario = $(this).attr("idUsuario");

    
    var datos = new FormData();

    datos.append("idUsuario", idUsuario);


    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            console.log("RESPUESTA", respuesta);

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#editarFotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {

                $(".previsualizar").attr("src", respuesta["foto"]);


            } else {

                $(".previsualizar").attr("src", "vistas/img/usuarios/default/hermes.jpg");
            }

        },
        error: function (xhr) {
            console.log("ERROR");
            console.log(xhr.responseText);
        }
    });





})