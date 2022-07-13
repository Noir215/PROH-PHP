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

		<title>The Missing Studio Admin</title>
    </head>
    <body>
        <div style="text-align: left">      
        </div>
        <br/><br/>
        <div id="cuerpo">
            <a href="#" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarUsuarios.php','cuerpo')" >Usuarios</a>
        	<a href="#" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarProductos.php','cuerpo')">Productos</a>
        	<a href="#" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarPedidos.php','cuerpo')">Pedidos</a>
       		<a href="<?php AdminApp::app_dir()?>/control/Logout.php">Cerrar sesi&oacute;n</a>
        </div>
        <br><br><br><br>
        <div id="pie">
            &copy; &Aacute;ngel Dolz Gonz&aacute;lez <?php echo date("Y"); ?>
        </div>
        
    </body>
</html>