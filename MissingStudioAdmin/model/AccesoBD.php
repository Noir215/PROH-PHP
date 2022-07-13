<?php

class AccesoBD
{
    private static function conectar()
    {
        $bbdd = mysqli_connect("localhost","root","","bddtv");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n",mysqli_connect_error());
            exit();
        }
        return $bbdd;
    }
    
    private static function desconectar($bbdd)
    {
        mysqli_close($bbdd);
    }
    
    public static function comprobarUsuarioAdmin($login,$clave) {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "SELECT * FROM usuarios WHERE usuario=? and clave=? and admin=1")) {
            mysqli_stmt_bind_param($st,"ss",$login,$clave);
            mysqli_stmt_execute($st);
            
            $result=mysqli_stmt_fetch($st);
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function obtenerListadoUsuarios() {
        
        $bbdd = AccesoBD::conectar();
        
        $usuarios= [];
        
        if ($resultado = mysqli_query($bbdd,"SELECT codigo, usuario, activo, admin  FROM usuarios")) {
            while ($fila = mysqli_fetch_array($resultado)) {
                array_push($usuarios, $fila);
            }
            
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $usuarios;
    }
    
    public static function bloquearUsuario($activo, $codigo) {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "UPDATE usuarios SET activo = ? WHERE codigo = ?")) {
            mysqli_stmt_bind_param($st, "ss", $activo, $codigo);
            mysqli_stmt_execute($st);
            
            $result=$st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function adminUsuario ($admin, $codigo) {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "UPDATE usuarios SET admin = ? WHERE codigo = ?")) {
            mysqli_stmt_bind_param($st, "is", $admin, $codigo);
            mysqli_stmt_execute($st);
            
            $result = $st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function insertarProducto($descripcion,$precio,$existencias,$imagen) {
        
        
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "INSERT INTO productos (codigo,descripcion,precio,existencias,imagen) VALUES (NULL,?,?,?,?)")) {
            mysqli_stmt_bind_param($st,"sdis",$descripcion,$precio,$existencias,$imagen);
            mysqli_stmt_execute($st);
            
            $result=$st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function obtenerListadoProductos() {
        
        $bbdd = AccesoBD::conectar();
        
        $productos= [];
        
        if ($resultado = mysqli_query($bbdd,"SELECT codigo, descripcion, precio, existencias, imagen  FROM productos")) {
            while ($fila = mysqli_fetch_array($resultado)) {
                array_push($productos, $fila);
            }
            
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $productos;
    }
    
    public static function obtenerDetallesProducto($codigo) {
        $bbdd = AccesoBD::conectar();
        
        $detalles = [];
        
        if ($st = mysqli_prepare($bbdd,"SELECT codigo_pedido, codigo_producto, unidades, precio_unitario FROM detalle WHERE codigo_pedido = ?")) {
            mysqli_stmt_bind_param($st,"i",$codigo);
            mysqli_stmt_execute($st);
            mysqli_stmt_bind_result($st, $codigo, $codigo_producto, $unidades, $precio_unitario);
            
            while (mysqli_stmt_fetch ($st)) {
                $fila = [];
                array_push($fila, $codigo, $codigo_producto, $unidades, $precio_unitario);
                array_push($detalles, $fila);
            }
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $detalles;
    }
    
    public static function modificarProducto ($codigo, $descripcion,$precio,$existencias,$imagen) {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "UPDATE productos SET descripcion = ?, precio = ?, existencias = ?, imagen = ? WHERE codigo = ?")) {
            mysqli_stmt_bind_param($st, "sddsd", $descripcion, $precio, $existencias, $imagen, $codigo);
            mysqli_stmt_execute($st);
            
            $result=$st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function obtenerProducto ($codigo) {
        $bbdd = AccesoBD::conectar();
        
        if ($st = mysqli_prepare($bbdd, "SELECT * FROM productos WHERE codigo=?")) {
            mysqli_stmt_bind_param($st,"s",$codigo);
            mysqli_stmt_execute($st);
            $result = $st->get_result();
            $producto=$result->fetch_assoc();
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $producto;
    }
    
    public static function modificarEstadoPedido ($codigo, $estado) {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        $aux = 0;
        
        if ($estado == 0) {
            $aux = 1;
        }
        if ($estado == 1) {
            $aux = 2;
        }
        if ($estado == 2) {
            $aux = 2;
        }
        
        if ($st = mysqli_prepare($bbdd, "UPDATE pedidos SET estado = ? WHERE codigo = ?")) {
            mysqli_stmt_bind_param($st, "dd", $aux, $codigo);
            mysqli_stmt_execute($st);
            
            $result=$st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function obtenerListadoPedidos() {
        
        $bbdd = AccesoBD::conectar();
        
        $pedidos= [];
        
        if ($resultado = mysqli_query($bbdd,"SELECT codigo, persona, fecha, importe, estado, pago  FROM pedidos")) {
            while ($fila = mysqli_fetch_array($resultado)) {
                array_push($pedidos, $fila);
            }
           
            AccesoBD::desconectar($bbdd);
        }
       
        return $pedidos;
    }
    
    public static function FiltrarProducto($producto) {
        
        $bbdd = AccesoBD::conectar();
        
        $pedidos= [];
        
        if ($st = mysqli_prepare($bbdd, "SELECT codigo, persona, fecha, importe, estado, pago FROM pedidos JOIN detalle ON pedidos.codigo = detalle.codigo_pedido WHERE detalle.codigo_producto = ?")) {
            mysqli_stmt_bind_param($st,"i",$producto);
            mysqli_stmt_execute($st);
            
            mysqli_stmt_bind_result($st, $codigo, $persona, $fecha, $importe, $estado, $pago);
            
            while (mysqli_stmt_fetch($st)) {
                $fila = [];
                array_push($fila, $codigo, $persona, $fecha, $importe, $estado, $pago);
                array_push($pedidos, $fila);
            }
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $pedidos;
    } 
    
    public static function FiltrarFechaAnterior ($fecha) {
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        
        if ($st = mysqli_prepare($bbdd, "SELECT codigo, persona, fecha, importe, estado, pago FROM pedidos WHERE fecha < ?")) {
            mysqli_stmt_bind_param($st,"s",$fecha);
            
            mysqli_stmt_execute($st);
            mysqli_stmt_bind_result($st, $codigo, $persona, $fecha, $importe, $estado, $pago);
            
            while (mysqli_stmt_fetch($st)) {
                $fila = [];
                
                array_push($fila, $codigo, $persona, $fecha, $importe, $estado, $pago);
                array_push($pedidos, $fila);
            }
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $pedidos;
    }
    
    public static function FiltrarFechaPosterior ($fecha) {
        $bbdd = AccesoBD::conectar();
        
        $pedidos= [];
        
        if ($st = mysqli_prepare($bbdd, "SELECT codigo, persona, fecha, importe, estado, pago FROM pedidos WHERE fecha > ?")) {
            mysqli_stmt_bind_param($st,"s",$fecha);
            mysqli_stmt_execute($st);
            mysqli_stmt_bind_result($st, $codigo, $persona, $fecha, $importe, $estado, $pago);
            
            while (mysqli_stmt_fetch($st)) {
                $fila = [];
                array_push($fila, $codigo, $persona, $fecha, $importe, $estado, $pago);
                array_push($pedidos, $fila);
            }
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $pedidos;
    }
    
    public static function FiltrarFechaConcreta ($fecha) {
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        
        if ($st = mysqli_prepare($bbdd, "SELECT codigo, persona, fecha, importe, estado, pago FROM pedidos WHERE fecha = ?")) {
            mysqli_stmt_bind_param($st,"s",$fecha);
            mysqli_stmt_execute($st);
            
            mysqli_stmt_bind_result($st, $codigo, $persona, $fecha, $importe, $estado, $pago);
            
            while (mysqli_stmt_fetch($st)) {
                $fila = [];
                array_push($fila, $codigo, $persona, $fecha, $importe, $estado, $pago);
                array_push($pedidos, $fila);
            }
            
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $pedidos;
    }
    
    public static function FiltrarPedidosUsu ($codigo) {
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        
        if ($st = mysqli_prepare($bbdd, "SELECT codigo, persona, fecha, importe, estado, pago FROM pedidos WHERE persona = ?")) {
            mysqli_stmt_bind_param($st,"i",$codigo);
            mysqli_stmt_execute($st);
            
            mysqli_stmt_bind_result($st, $codigo, $persona, $fecha, $importe, $estado, $pago);
            
            while (mysqli_stmt_fetch ($st)) {
                $fila = [];
                array_push($fila, $codigo, $persona, $fecha, $importe, $estado, $pago);
                array_push($pedidos, $fila);
            }
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $pedidos;
    }
    
    
}
?>