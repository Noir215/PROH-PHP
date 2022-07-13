<?php

require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    $detalles = AccesoBD::obtenerDetallesProducto($_REQUEST['codigo']);
    
    $_REQUEST['listado-detalles']=$detalles;
    
    include_once '../view/ListadoDetalles.php';
} else {
    header("Location: Login.php");
}

?>