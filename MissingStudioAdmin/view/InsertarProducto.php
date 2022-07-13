<html>
	<body>
	<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/InsertarProducto.php', 'cuerpo'); return false">
        <table class="carrito">
            <thead>
                <tr>
                    <td>Descripci&oacute;n</td>
                    <td>Precio</td>
                    <td>Existencias</td>
                    <td>Imagen</td>
                </tr>
            </thead>
            <tbody>
            		<tr>
            			<td><input name="des_pro" type="text" value="" required="required"/></td>
            			<td><input name="pre_pro" type="text" value="" required="required"/></td>
            			<td><input name="ex_pro" type="number" value="" required="required"/></td>
        				<td><input name="img_pro" type="text" value="" required="required"/></td>
        				<td>
            				<button type="submit" class="btn btn-outline-light">Insertar</button>
        				</td>
            		</tr>
            </tbody>
            
        </table>
    </form>
    </body>
</html>