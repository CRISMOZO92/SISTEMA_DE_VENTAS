<?php

require_once "../controladores/usuario.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

public $idUsuario;

public function ajaxEditarUsuario(){

    $item = "id";
    $valor = $this->idUsuario;
    $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

    echo json_encode($respuesta);



}



}

/*==============================================
Editar Usuario  
==============================================*/

if(isset($_POST["idUsuario"])){

$editar = new AjaxUsuarios();
$editar -> idUsuario = $_POST["idUsuario"];
$editar -> ajaxEditarUsuario();



}

    

    


?>