<?php

class AdminApp
{
    // Obtiene el path de la aplicaci�n
    public static function app_dir()
    {
        $url = $_SERVER['REQUEST_URI'];
        $path = parse_url($url)['path'];
        $datos = explode("/", $path);
        echo "/".$datos[1];
    }
};
    
?>