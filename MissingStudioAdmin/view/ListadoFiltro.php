<html>
<head>
	<body>
<div class="container">
    <table class="carrito text-center">
        <thead>
            <tr>
                <th>C&oacute;digo</th>
                <th>Persona</th>
                <th>Fecha</th>
                <th>Importe</th>
                <th>Estado</th>
                <th>M&eacute;todo</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $pedidos = $_REQUEST['listado-usuarios'];
            foreach ($pedidos as $pedido) {
        ?>
            <tr>  
                <td><?php echo $pedido[0] ?></td>
                <td><?php echo $pedido[1] ?></td>
                <td><?php echo $pedido[2] ?></td>
                <td><?php echo $pedido[3] ?></td>
                <td><?php echo $pedido[4] ?></td>
                <td><?php echo $pedido[5] ?></td>    
            </tr>
    <?php
        }
    ?>      
        </tbody>
    </table>
	<div class=>
    	<form name="" method="POST" onsubmit="ProcesarForm(this,'../control/ListarPedidos.php','cuerpo');return false" autocomplete="off">
    		<button class="btn btn-outline-light" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-reply"></i>Quitar Filtro</button>
		</form>
	</div>
</div>
</body>
</html>