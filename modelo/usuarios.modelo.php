<?php

require_once "conexion.php";

class ModeloUsuarios
{

    static public function mdlMostrarUsuarios($tabla)
    {




        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");


        $stmt->execute();


        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }


    static public function mdlIngresarUsuario($tabla, $datos)
    {


        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(nombre,usuario,password,perfil,foto) VALUES (:nombre,:usuario,:password,:perfil,:foto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if ($stmt->execute()) {


            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

?>