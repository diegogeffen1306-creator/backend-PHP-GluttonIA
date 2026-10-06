<?php

session_start();

require_once "../config/config.php";
require_once "../model/usuariomodel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

    if (empty($correo) || empty($password)) {

        header("Location: ../view/login.php?error=campos");
        exit;
    }

    $usuarioModel = new UsuarioModel($conexion);

    $usuario = $usuarioModel->buscarPorCorreo($correo);

    if ($usuario && password_verify($password, $usuario["password"])) {

        $_SESSION["idusuario"] = $usuario["idusuario"];
        $_SESSION["nombreusuario"] = $usuario["nombreusuario"];
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["rol"] = $usuario["rol"];

        header("Location: ../view/admin/dashboard.php");
        exit;

    } else {

        header("Location: ../view/login.php?error=credenciales");
        exit;
    }
}