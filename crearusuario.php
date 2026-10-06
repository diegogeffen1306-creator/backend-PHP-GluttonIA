<?php

require_once "config/config.php";


$usuario = "admin";

$nombre = "Administrador";

$password = "Admin123*";

$hash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO usuarios
        (usuario, nombreusuario, password, rol, estado)
        VALUES (?, ?, ?, 'administrador', 1)";


$stmt = $conexion->prepare($sql);


if (!$stmt) {

    die("Error en la consulta: " . $conexion->error);

}


$stmt->bind_param(
    "sss",
    $usuario,
    $nombre,
    $hash
);


if ($stmt->execute()) {

    echo "<h2>Usuario creado correctamente</h2>";

    echo "<p>Usuario: admin</p>";

    echo "<p>Contraseña: Admin123*</p>";

} else {

    echo "Error: " . $stmt->error;

}