<?php

require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    $producto = AccesoBD::obtenerProducto($_REQUEST['cod_pro']);
    
    $_REQUEST['producto'] = $producto;
    
    include_once '../view/ModificarProductos.php';
} else {
        header("Location: Login.php");
}

?>