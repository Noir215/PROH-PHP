<html>
	<body>
	<div class="container">
        <table class="carrito text-center">
            <thead>
                <tr>
                    <td>C&oacute;digo Pedido</td>
                    <td>C&oacute;digo Producto</td>
                    <td>Unidades</td>
                    <td>Precio Unitario</td>
                </tr>
            </thead>
            <tbody>
                
        <?php
        
            $detalles = $_REQUEST['listado-detalles'];
            
            foreach ($detalles as $detalle) { 
        ?>
                <tr>
                    <td><?php echo $detalle[0] ?></td>
                    <td><?php echo $detalle[1] ?></td>
                    <td><?php echo $detalle[2] ?></td>
                    <td><?php echo $detalle[3] ?></td>
                </tr>
        <?php
            }
        ?>      
            </tbody>
            
        </table>
	</div>
</body>
</html>