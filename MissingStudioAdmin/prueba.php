<?php
require_once('./model/AccesoBD.php');
?>

<?php 
$result = AccesoBD::modificarEstadoPedido(8, 1);
echo $result;
?>