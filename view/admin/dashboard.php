<?php

session_start();

if (!isset($_SESSION["idusuario"])) {
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel Administrativo - GluttonIA</title>

    <link rel="stylesheet" href="../../css/admin.css">

</head>

<body>

    <div class="admin-container">

        <!-- BARRA LATERAL -->

        <aside class="sidebar">

            <div class="logo">

                <div class="logo-icon">
                    🍗
                </div>

                <h2>GluttonIA</h2>

                <span>Panel administrativo</span>

            </div>

            <nav>

                <a href="dashboard.php" class="activo">
                    🏠 Inicio
                </a>

                <a href="cliente.php">
                    👥 Clientes
                </a>

                <a href="menu.php">
                    🍔 Menú
                </a>

                <a href="#">
                    🧾 Órdenes
                </a>

                <a href="inventario.php">
                    📦 Inventario
                </a>

                <a href="#">
                    🚚 Delivery
                </a>

                <a href="#">
                    👨‍💼 Empleados
                </a>

                <a href="#">
                    👤 Usuarios
                </a>

                <a href="#">
                    📊 Reportes
                </a>

            </nav>

            <div class="sidebar-bottom">

                <a href="#">
                    ⚙️ Configuración
                </a>

                <a href="../../controller/logout.php" class="cerrar">
                    🚪 Cerrar sesión
                </a>

            </div>

        </aside>


        <!-- CONTENIDO -->

        <main class="contenido">

            <header class="topbar">

                <div>

                    <h1>Panel administrativo</h1>

                    <p>
                        Bienvenido al sistema de gestión de GluttonIA
                    </p>

                </div>

                <div class="usuario">

                    👤

                    <?php
                    echo htmlspecialchars($_SESSION["nombreusuario"]);
                    ?>

                </div>

            </header>


            <!-- TARJETAS -->

            <section class="tarjetas">

                <div class="tarjeta">

                    <div class="icono">
                        👥
                    </div>

                    <div>
                        <span>Clientes</span>
                        <strong>0</strong>
                    </div>

                </div>


                <div class="tarjeta">

                    <div class="icono">
                        🍔
                    </div>

                    <div>
                        <span>Productos</span>
                        <strong>0</strong>
                    </div>

                </div>


                <div class="tarjeta">

                    <div class="icono">
                        🧾
                    </div>

                    <div>
                        <span>Pedidos</span>
                        <strong>0</strong>
                    </div>

                </div>


                <div class="tarjeta">

                    <div class="icono">
                        📦
                    </div>

                    <div>
                        <span>Inventario</span>
                        <strong>0</strong>
                    </div>

                </div>

            </section>


            <!-- ACCESOS -->

            <section class="panel">

                <h2>Accesos rápidos</h2>

                <div class="accesos">

                    <a href="cliente.php">
                        <span>👥</span>
                        Clientes
                    </a>

                    <a href="menu.php">
                        <span>🍔</span> 
                        Menú
                    </a>

                    <a href="#">
                        <span>🧾</span>
                        Nueva orden
                    </a>

                    <a href="inventario.php">
                        <span>📦</span>
                        Inventario
                    </a>

                </div>

            </section>


            <!-- INFORMACIÓN -->

            <section class="panel">

                <h2>Información del sistema</h2>

                <p>
                    GluttonIA es el sistema de gestión para la
                    administración de pedidos, clientes, productos
                    e inventario del restaurante.
                </p>

            </section>

        </main>

    </div>

</body>

</html>