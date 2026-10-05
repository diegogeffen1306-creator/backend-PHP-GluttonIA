<?php
$conexion = new mysqli("localhost", "root", "", "BDGluttonIA");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>