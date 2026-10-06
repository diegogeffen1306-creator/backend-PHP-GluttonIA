<?php
session_start();

if (isset($_SESSION["idusuario"])) {
    header("Location: admin/dashboard.php");
    exit;
}

$error = "";

if (isset($_GET["error"])) {

    if ($_GET["error"] == "campos") {
        $error = "Por favor completa todos los campos.";
    }

    if ($_GET["error"] == "credenciales") {
        $error = "El correo o la contraseña son incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingreso de Usuarios - GluttonIA</title>

    <link rel="stylesheet" href="../css/login.css">

</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <div class="logo-login">

                <div class="logo-circle">
                    🍗
                </div>

            </div>

            <h1>GluttonIA</h1>

            <p class="subtitulo">
                Panel administrativo
            </p>

            <?php if ($error != ""): ?>

                <div class="mensaje-error">
                    <?php echo $error; ?>
                </div>

            <?php endif; ?>

            <form action="../controller/logincontroller.php" method="POST">

                <div class="campo">

                    <label for="correo">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        placeholder="admin@gluttonia.com"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="password">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Ingrese su contraseña"
                        required
                    >

                </div>

                <button type="submit" class="btn-login">
                    INGRESAR
                </button>

            </form>

            <a href="index.php" class="volver">
                ← Volver al inicio
            </a>

        </div>

    </div>

</body>

</html>