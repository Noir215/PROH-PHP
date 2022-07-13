<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $codigo = $_REQUEST['cod_pro'];
    $descripcion = $_REQUEST['des_pro'];
    $precio = $_REQUEST['pre_pro'];
    $existencias = $_REQUEST['ex_pro'];
    $imagen = $_REQUEST['img_pro'];
    
    AccesoBD::modificarProducto($codigo, $descripcion, $precio, $existencias, $imagen);
    
    $_REQUEST['mensaje'] = "Producto modificado";
    
    $productos = AccesoBD::obtenerListadoProductos();
    
    $_REQUEST['listado-productos']=$productos;
    $_REQUEST['mensaje']="Se ha modificado el producto";
    
    include_once '../view/ListadoProductos.php';
}
else
{
    header("Location: Login.php");
}
?>