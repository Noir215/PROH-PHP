<html>
	<body>
	<?php 
	if(isset($_REQUEST['mensaje'])) {
	?>
	<h2><?php echo $_REQUEST['mensaje']?></h2>
	<?php 
	}
	?>
<div class="container">
    <table class="carrito text-center">
        <thead>
            <tr>
                <td>C&oacute;digo</td>
                <td>Descripci&oacute;n</td>
                <td>Precio</td>
                <td>Existencias</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
        
        <?php 
            $productos = $_REQUEST['listado-productos'];
            
            foreach ($productos as $producto) {
        ?>
        		<tr>
        			<td><?php echo $producto['codigo']?></td>
        			<td><?php echo $producto['descripcion']?></td>
        			<td><?php echo $producto['precio']?></td>
        			<td><?php echo $producto['existencias']?></td>
    				<td><?php echo $producto['imagen']?></td>
    				<td>
    					<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/ObtenerProducto.php', 'cuerpo'); return false;">
    						<input name="cod_pro" type="hidden" value="<?php echo $producto['codigo']?>"/>
        					<button type="submit" class="btn btn-outline-light">Modificar</button>
    					</form>
    				</td>
        		</tr>
        <?php 
            }
        ?>
            
        </tbody>
        
    </table>
    <div>
    	<button onclick="Cargar('../view/InsertarProducto.php','cuerpo')" class="btn btn-outline-light">Insertar Producto</button>
    </div>
</div>
</body>
</html>