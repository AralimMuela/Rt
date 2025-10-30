<?php

function conectarBaseDatos() {
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $baseDatos = 'guardcomen';

    // Crear conexión
    $conexion = new mysqli($host, $usuario, $contrasena, $baseDatos);

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    return $conexion;
}


?>