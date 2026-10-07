<?php

session_start();

if (!isset($_SESSION['idusuario'])) {
    header('Location: ../../login.php');
    exit;
}

require_once '../../model/menumodel.php';

$menuModelo = new MenuModelo();

$menus = $menuModelo->getMenus();

$totalMenus = 0;

if ($menus) {
    $totalMenus = $menus->num_rows;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Menú - GluttonIA</title>

    <link rel="stylesheet" href="../../css/admin.css">

</head>

<body>

<div class="admin-container">

    <!-- BARRA LATERAL -->

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">🍗</div>

            <h2>GluttonIA</h2>

            <span>Panel administrativo</span>

        </div>


        <nav>

            <a href="dashboard.php">
                🏠 Inicio
            </a>

            <a href="cliente.php">
                👥 Clientes
            </a>

            <a href="menu.php" class="activo">
                🍔 Menú
            </a>

            <a href="#">
                🧾 Órdenes
            </a>

            <a href="#">
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

            <a href="../../controller/logout.php"
               class="cerrar">
                🚪 Cerrar sesión
            </a>

        </div>

    </aside>


    <!-- CONTENIDO -->

    <main class="contenido">

        <header class="topbar">

            <div>

                <h1>Módulo de Menú</h1>

                <p>
                    Administra los productos e ingredientes
                    disponibles en el restaurante.
                </p>

            </div>


            <div class="usuario">

                👤
                <?php
                echo htmlspecialchars($_SESSION['nombreusuario']);
                ?>

            </div>

        </header>


        <!-- TARJETA TOTAL -->

        <section class="tarjetas">

            <div class="tarjeta">

                <div class="icono">
                    🍔
                </div>

                <div>

                    <span>Productos del Menú</span>

                    <strong>
                        <?php echo $totalMenus; ?>
                    </strong>

                </div>

            </div>

        </section>


        <!-- LISTADO -->

        <section class="panel">

            <h2>
                Listar Todos los Productos
            </h2>

            <div style="overflow-x:auto;">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Menú</th>

                            <th>Ingredientes</th>

                            <th>Acciones</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    if ($menus && $menus->num_rows > 0) {

                        while ($fila = $menus->fetch_assoc()) {

                    ?>

                        <tr>

                            <td>
                                <?php echo $fila['IdMenú']; ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($fila['menú']);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($fila['ingredientes']);
                                ?>
                            </td>

                            <td>

                                <a href="menu.php?id=<?php echo $fila['IdMenú']; ?>">
                                    Consultar
                                </a>

                            </td>

                        </tr>

                    <?php

                        }

                    } else {

                    ?>

                        <tr>

                            <td colspan="4">
                                No hay productos registrados.
                            </td>

                        </tr>

                    <?php

                    }

                    ?>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- INSERTAR -->

        <section class="panel">

            <h2>
                Insertar Producto al Menú
            </h2>

            <form action="../../controller/menucontroller.php?accion=insertar"
                  method="POST">

                <label>
                    Nombre del producto:
                </label>

                <input type="text"
                       name="menu"
                       required>


                <label>
                    Ingredientes:
                </label>

                <textarea name="ingredientes"
                          rows="4"
                          required></textarea>


                <button type="submit">
                    Insertar Producto
                </button>

            </form>

        </section>


        <!-- CONSULTAR -->

        <section class="panel">

            <h2>
                Consultar Producto por ID
            </h2>

            <form action="../../controller/menucontroller.php"
                  method="GET">

                <input type="hidden"
                       name="accion"
                       value="consultar">

                <label>
                    ID del producto:
                </label>

                <input type="number"
                       name="IdMenú"
                       required>

                <button type="submit">
                    Consultar
                </button>

            </form>

        </section>


        <!-- ACTUALIZAR -->

        <section class="panel">

            <h2>
                Actualizar Producto
            </h2>

            <form action="../../controller/menucontroller.php?accion=actualizar"
                  method="POST">

                <label>
                    ID:
                </label>

                <input type="number"
                       name="IdMenú"
                       required>


                <label>
                    Nombre del producto:
                </label>

                <input type="text"
                       name="menu"
                       required>


                <label>
                    Ingredientes:
                </label>

                <textarea name="ingredientes"
                          rows="4"
                          required></textarea>


                <button type="submit">
                    Actualizar Producto
                </button>

            </form>

        </section>


        <!-- ELIMINAR -->

        <section class="panel">

            <h2>
                Eliminar Producto
            </h2>

            <form action="../../controller/menucontroller.php"
                  method="GET">

                <input type="hidden"
                       name="accion"
                       value="eliminar">

                <label>
                    ID del producto:
                </label>

                <input type="number"
                       name="IdMenú"
                       required>

                <button type="submit">
                    Eliminar Producto
                </button>

            </form>

        </section>

    </main>

</div>

</body>

</html>