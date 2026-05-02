<?php

require_once "conexion.php"; 

class ModeloUsuarios {

static public function mdlMostrarUsuarios($tabla){




    $stmt=conexion::conectar()->prepare("SELECT * FROM $tabla");


    $stmt->execute();


    return $stmt->fetchAll();

    $stmt->close();

    $stmt=null;






}


}


?>