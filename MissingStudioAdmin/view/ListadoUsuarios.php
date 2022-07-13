<html>
	<body>
	<div class="container">
<table class="carrito text-center">
    <thead>
        <tr>
            <td>C&oacute;digo</td>
            <td>Login</td>
            <td>Activo</td>
            <td>Es administrador</td>
        </tr>
    </thead>
    <tbody>
        
<?php

    $usuarios = $_REQUEST['listado-usuarios'];
    
    foreach ($usuarios as $usuario) { 
?>
        <tr>
            <td><?php echo $usuario['codigo'] ?></td>
            <td><?php echo $usuario['usuario'] ?></td>
            <td><?php 
                    if ($usuario['activo']==1) { ?>
                	&#10003;
                <?php } else { ?>    
                	&#10060; 
                <?php } ?>    
            </td>
            <td><?php 
                    if ($usuario['admin']==1) { ?>
                		&#10003;
                <?php } else { ?>    
                		&#10060; 
                <?php } ?>    
            </td>
            <td><?php 
                    if ($usuario['activo']==1) { ?>
                    <form name="" method="POST" onsubmit="ProcesarForm(this, '../control/BloquearUsuario.php', 'cuerpo'); return false">
                		<input name="cod_usu" type="hidden" value="<?php echo $usuario['codigo'] ?>"/>
                		<input name="act_usu" type="hidden" value="0"/>
                		<button type="submit" class="btn btn-outline-light">Bloquear</button>
                	</form>
                <?php } else { ?>   
                	<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/BloquearUsuario.php', 'cuerpo'); return false">
                		<input name="cod_usu" type="hidden" value="<?php echo $usuario['codigo'] ?>"/>
                		<input name="act_usu" type="hidden" value="1"/>
                		<button type="submit" class="btn btn-outline-light">Desbloquear</button>
                	</form> 
                <?php } ?>  
            </td>
            <td><?php 
                    if ($usuario['admin']==1) { ?>
                    <form name="" method="POST" onsubmit="ProcesarForm(this, '../control/AdminUsuario.php', 'cuerpo'); return false">
                		<input name="cod_usu" type="hidden" value="<?php echo $usuario['codigo'] ?>"/>
                		<input name="admin_usu" type="hidden" value="0"/>
                		<button type="submit" class="btn btn-outline-light">Quitar Admin</button>
                	</form>
                <?php } else { ?>   
                	<form name="" method="POST" onsubmit="ProcesarForm(this, '../control/AdminUsuario.php', 'cuerpo'); return false">
                		<input name="cod_usu" type="hidden" value="<?php echo $usuario['codigo'] ?>"/>
                		<input name="admin_usu" type="hidden" value="1"/>
                		<button type="submit" class="btn btn-outline-light">Hacer Admin</button>
                	</form> 
                <?php } ?>  
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