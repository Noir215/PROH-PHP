<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $descripcion = $_REQUEST['des_pro'];
    $precio = $_REQUEST['pre_pro'];
    $existencias = $_REQUEST['ex_pro'];
    $imagen = $_REQUEST['img_pro'];
    
    AccesoBD::insertarProducto($descripcion, $precio, $existencias, $imagen);
    
    $_REQUEST['mensaje'] = "Producto modificado";
    
    $productos = AccesoBD::obtenerListadoProductos();
    
    $_REQUEST['listado-productos']=$productos;
    
    include_once '../view/ListadoProductos.php';
}
else
{
    header("Location: Login.php");
}
?>