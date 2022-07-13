<html>
    <head>
        <script src="<?php AdminApp::app_dir()?>/js/libCapas2122.js"></script>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="../img/FaviconBlanco.png"/>
		<link rel="stylesheet" type="text/css" href="../css/Estilo.css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<title>The Missing Studio Login</title>
    </head>
    <body>
        <?php 
        if (isset($_REQUEST['msg'])) {
        ?>
        <div style="text-align: center; color: red">
        <?php echo $_REQUEST['msg']?>
        </div>
        <?php
        }
        if (isset($_REQUEST['a_usuario'])) {
            $a_usuario = $_REQUEST['a_usuario'];
        } else {
             $a_usuario = '';
        }   
        ?>
        
        <div style="text-align: center">
            <form class="carrito" name="" method="POST" action="<?php AdminApp::app_dir()?>/control/Login.php" autocomplete="off">
                <label class="btn btn-outline-light" for="p_usuario">Usuario:</label><input class="btn btn-outline-light" name="p_usuario" type="text" value="<?php echo $a_usuario ?>" required  autocomplete="off" /><br/>
                <label class="btn btn-outline-light" for="p_clave">Clave:</label><input class="btn btn-outline-light" name="p_clave" type="password" required  autocomplete="off" /><br/>
                <input type="submit"/>
            </form>
        </div>
    </body>
</html>