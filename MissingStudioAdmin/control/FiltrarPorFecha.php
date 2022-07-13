<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $pedidos = [];
    if ($_REQUEST['tipo'] == "Concreta") {
        $pedidos = AccesoBD::FiltrarFechaConcreta($_REQUEST['fecha']);
    }
    else if ($_REQUEST['tipo'] == "Anterior") {
        $pedidos = AccesoBD::FiltrarFechaAnterior($_REQUEST['fecha']);
    }
    else {
        $pedidos = AccesoBD::FiltrarFechaPosterior($_REQUEST['fecha']);
    }
    
    $_REQUEST['listado-usuarios'] = $pedidos;
    
    include_once '../view/ListadoFiltro.php';
}
else
{
    header("Location: Login.php");
}
?>