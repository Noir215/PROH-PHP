<?php

require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    AccesoBD::bloquearUsuario($_POST['act_usu'], $_POST['cod_usu']);
    $usuarios = AccesoBD::obtenerListadoUsuarios();
    $_REQUEST['listado-usuarios'] = $usuarios;
    
    include_once '../view/ListadoUsuarios.php';
    //header("Location: ListadoUsuarios.php");
}

?>