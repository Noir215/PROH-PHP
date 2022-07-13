<html>
	<body>
	<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/ModificarProducto.php', 'cuerpo'); return false">
        <table class="carrito">
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
                $producto = $_REQUEST['producto'];
            ?>
            		<tr>
            			<td><input class="btn btn-outline-light" name="cod_pro" type="number" value="<?php echo $producto['codigo']?>" required="required" readonly="readonly"/></td>
            			<td><input class="btn btn-outline-light" name="des_pro" type="text" value="<?php echo $producto['descripcion']?>" required="required"/></td>
            			<td><input class="btn btn-outline-light" name="pre_pro" type="number" value="<?php echo $producto['precio']?>" required="required"/></td>
            			<td><input class="btn btn-outline-light" name="ex_pro" type="number" value="<?php echo $producto['existencias']?>" required="required"/></td>
        				<td><input class="btn btn-outline-light" name="img_pro" type="text" value="<?php echo $producto['imagen']?>" required="required"/></td>
        				<td>
        					<input name="cod_pro" type="hidden" value="<?php echo $producto['codigo']?>"/>
            				<button type="submit" class="btn btn-outline-light">Modificar</button>
        				</td>
            		</tr>
            </tbody>
            
        </table>
    </form>
    </body>
</html>