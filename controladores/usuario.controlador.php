<?php

class ControladorUsuarios {

    // Mostrar Usuarios

    static public function ctrMostrarUsuarios(){

        $tabla = "usuarios";

        $respuesta=ModeloUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;
        
    }

} 

?>