<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    $pedidos = [];
    
    $pedidos = AccesoBD::FiltrarPedidosUsu($_REQUEST['usuario']);
    $_REQUEST['listado-usuarios'] = $pedidos;
    
    include_once '../view/ListadoFiltro.php';
}
else
{
    header("Location: Login.php");
}
?>