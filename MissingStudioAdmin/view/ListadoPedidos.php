<html>
	<body>
	<div class="container">
	<?php if(isset($_REQUEST['mensaje'])) {?>
	<h3><?php echo $_REQUEST['mensaje']?></h3>
	<?php } ?>
	<div class="filtros">
	<div>
		<form  name="" method="POST" onsubmit="ProcesarForm(this,'../control/FiltrarPorUsuario.php','cuerpo');return false" autocomplete="off">
        	<input class="btn btn-outline-light" name="usuario" type="number" autocomplete="off" value="persona"/>
        	<button class="btn btn-outline-light" type="submit" class="btn btn-light">Filtrar por usuario</button>
      	</form>
	</div>
	<div>
		<form  name="" method="POST" onsubmit="ProcesarForm(this,'../control/FiltrarPorFecha.php','cuerpo');return false" autocomplete="off">
        	<input class="btn btn-outline-light" name="fecha" type="date" autocomplete="off" value=""/>
        	<select class="btn btn-outline-light" name="tipo" required="required">
					<option value="Concreta" selected="selected"> Concreta </option>
					<option value="Anterior"> Anterior </option>
					<option value="Posterior"> Posterior </option>
			</select>
        	<button class="btn btn-outline-light" type="submit" class="btn btn-light">Filtrar por fecha</button>
      	</form>
	</div>
	<div>
		<form  name="" method="POST" onsubmit="ProcesarForm(this,'../control/FiltrarPorProducto.php','cuerpo');return false" autocomplete="off">
        	<input class="btn btn-outline-light" name="cod_pro" type="number" autocomplete="off" value=""/>
            <button class="btn btn-outline-light" type="submit" class="btn btn-light">Filtrar por producto</button>
      	</form>
	</div>
	</div>
<table class="carrito text-center">
    <thead>
        <tr>
            <td>C&oacute;digo</td>
            <td>Persona</td>
            <td>Fecha</td>
            <td>Importe</td>
            <td>Estado</td>
            <td>Pago</td>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        $pedidos = $_REQUEST['listado-pedidos'];
        
        foreach ($pedidos as $pedido) {
    ?>
    		<tr>
    			<td><?php echo $pedido['codigo']?></td>
    			<td><?php echo $pedido['persona']?></td>
    			<td><?php echo $pedido['fecha']?></td>
    			<td><?php echo $pedido['importe']?></td>
    			<?php if ($pedido['estado'] == 0) {?>
					<td>Pendiente</td>
				<?php } else if ($pedido['estado'] == 1) {?>
					<td>Enviado</td>
				<?php }  else if ($pedido['estado'] == 2){?>
					<td>Entregado</td>
				<?php } else {?>
					<td>Cancelado</td>
				<?php }?>
				<td><?php echo $pedido['pago']?></td>
				<?php 
				if ($pedido['estado'] != -1) {
				?>
				<td>
					<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/ModificarEstadoDetalle.php', 'cuerpo'); return false">
					<input name="estado" type="hidden" value="<?php echo $pedido['estado'] ?>"/>
                		<input name="codigo" type="hidden" value="<?php echo $pedido['codigo'] ?>"/>
                		<button type="submit" class="btn btn-outline-light">Modificar Estado</button>
                	</form> 
				</td>
				<?php
				} else {
                ?>
                <td>  </td>
                <?php 
				}
                ?>
				<td>
					<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/ListarDetalles.php', 'cuerpo'); return false">
                		<input name="codigo" type="hidden" value="<?php echo $pedido['codigo'] ?>"/>
                		<button type="submit" class="btn btn-outline-light">Mostrar Detalles</button>
                	</form> 
				</td>
    		</tr>
    <?php 
        }
    ?>
        
    </tbody>
    
</table>
</div>
</body>
</html>