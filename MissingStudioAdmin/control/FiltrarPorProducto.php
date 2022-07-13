<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    $pedido = [];
    $pedido = AccesoBD::FiltrarProducto($_REQUEST['cod_pro']);
    $_REQUEST['listado-usuarios'] = $pedido;
    
    include_once '../view/ListadoFiltro.php';
}
else
{
    header("Location: Login.php");
}
?>