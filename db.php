<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "registro";

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>