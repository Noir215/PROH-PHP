<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    AccesoBD::modificarEstadoPedido($_REQUEST['codigo'], $_REQUEST['estado']);
    $pedidos = AccesoBD::obtenerListadoPedidos();
    $_REQUEST['listado-pedidos']= $pedidos;
    $_REQUEST['mensaje']="Se ha modificado el estado del pedido";
    
    include_once '../view/ListadoPedidos.php';
}
else
{
    header("Location: Login.php");
}
?>