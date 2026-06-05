<?php

class ControladorUsuarios {

    // Mostrar Usuarios

    static public function ctrMostrarUsuarios(){

        $tabla = "usuarios";

        $respuesta=ModeloUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;

    }

    /*==============================================
    Registrar Usuario
    ==============================================*/

    static public function ctrCrearUsuario(){
    
        if(isset($_POST["nuevoNombre"]) && isset ($_POST["nuevoUsuario"])){



            /*==============================
            Validar Imagen
            ==============================*/

            $ruta="";


            if(isset($_FILES["nuevaFoto"]["tmp_name"]) && $_FILES["nuevaFoto"]["tmp_name"] != ""){


                list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                $nuevoAncho=500;
                $nuevoAlto=500;


                /*==============================================
                Crear Directorio donde vamos aguardar la foto
                ==============================================*/


                $directorio="vistas/img/usuarios/".$_POST["nuevoNombre"];

                mkdir($directorio,0755);

                /*==============================================
                De acuerdo al tipo de imagen aplicamos las funciones por defecto de php
                ==============================================*/


                if($_FILES["nuevaFoto"]["type"]=="image/jpeg"){


                    /*==============================================
                    Guardamos la imagen en el directorio
                    ==============================================*/

                    $aleatorio=mt_rand(100,999);

                    $ruta="vistas/img/usuarios/".$_POST["nuevoNombre"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                    imagejpeg($destino,$ruta);


                }

                if($_FILES["nuevaFoto"]["type"]=="image/png"){

                    /*==============================================
                    Guardamos la imagen en el directorio
                    ==============================================*/

                    $aleatorio=mt_rand(100,999);

                    $ruta="vistas/img/usuarios/".$_POST["nuevoNombre"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                    imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                    imagepng($destino,$ruta);

                }

            

            }
                
                /*==============================================
                la siguiente parte es para guardar la informacion del usuario en la base de datos
                ==============================================*/

                $tabla = "usuarios"; 

                $encriptar = crypt($_POST["nuevoPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    
                    "nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta);
                    
                    $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos); 
                     
                    
                    if($respuesta == "ok"){ 


                        echo "<script>

                        swal.fire({
                                title: 'se guardo correctamente el usuario',
                                icon: 'success',
                                }).then ((result) => {
                                    
                                    window.location = 'usuarios';

                                })  
                                    
                                
                        </script>";
                                
                    }

                        


                    




                }
            
            }
}   

    




?>



