<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "direpro";
    

$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);


if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
