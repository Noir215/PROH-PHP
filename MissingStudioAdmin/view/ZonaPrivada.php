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
           	<header class="cabecera container-fluid">
                <a href="#" onclick="Cargar('../control/ListarUsuarios.php','cuerpo')" class="letras_top">Usuarios</a>
                <a href="#" onclick="Cargar('../control/ListarProductos.php','cuerpo')" class="letras_top">Productos</a>
                <a href="#" onclick="Cargar('../control/ListarPedidos.php','cuerpo')" class="letras_top">Pedidos</a>
                <a href="../control/Logout.php" class="letras_top">Cerrar sesi&oacute;n</a>
            </header>
        </div>
        <br/><br/>
        <h1 class="h1_paginas"> The Missing Studio Admin Page</h1>
        <div id="cuerpo">
        	<button onclick="Cargar('../control/ListarUsuarios.php','cuerpo')" class=usu_admin>Usuarios</button>
			<button onclick="Cargar('../control/ListarProductos.php','cuerpo')" class=usu_admin>Productos</button>
			<button onclick="Cargar('../control/ListarPedidos.php','cuerpo')" class=usu_admin>Pedidos</button>
        </div>
        <br><br><br><br>
        <footer id="pie" class="mt-4 p-1 text-white">
            &copy; &Aacute;ngel Dolz Gonz&aacute;lez <?php echo date("Y"); ?>
        </footer>
        
    </body>
</html>