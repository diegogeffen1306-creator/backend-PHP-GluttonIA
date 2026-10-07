<?php

session_start();

if (!isset($_SESSION['idusuario'])) {

    header('Location: ../../login.php');

    exit;
}

require_once '../../model/modelinventario.php';

$inventarioModelo = new InventarioModelo();

$insumos = $inventarioModelo->getInsumos();

$totalInsumos = 0;

if ($insumos) {

    $totalInsumos = $insumos->num_rows;
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestión de Inventario - GluttonIA</title>

    <link rel="stylesheet" href="../../css/admin.css">

</head>

<body>

<div class="admin-container">

    <!-- ==========================================
         BARRA LATERAL
         ========================================== -->

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

            <a href="menu.php">
                🍔 Menú
            </a>

            <a href="#">
                🧾 Órdenes
            </a>

            <a href="inventario.php" class="activo">
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


    <!-- ==========================================
         CONTENIDO
         ========================================== -->

    <main class="contenido">

        <header class="topbar">

            <div>

                <h1>Módulo de Inventario</h1>

                <p>
                    Administra los insumos y materias primas
                    disponibles en el restaurante.
                </p>

            </div>


            <div class="usuario">

                👤

                <?php

                echo htmlspecialchars(
                    $_SESSION['nombreusuario']
                );

                ?>

            </div>

        </header>


        <!-- ==========================================
             TARJETA TOTAL
             ========================================== -->

        <section class="tarjetas">

            <div class="tarjeta">

                <div class="icono">
                    📦
                </div>

                <div>

                    <span>Insumos registrados</span>

                    <strong>
                        <?php echo $totalInsumos; ?>
                    </strong>

                </div>

            </div>

        </section>


        <!-- ==========================================
             LISTADO
             ========================================== -->

        <section class="panel">

            <h2>
                Listar Todos los Insumos
            </h2>


            <div style="overflow-x:auto;">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Insumo / Materia Prima</th>

                            <th>Stock Disponible</th>

                            <th>Unidad de Medida</th>

                            <th>Acciones</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    if ($insumos && $insumos->num_rows > 0) {

                        while ($fila = $insumos->fetch_assoc()) {

                    ?>

                        <tr>

                            <td>

                                <?php
                                echo $fila['IdInsumo'];
                                ?>

                            </td>


                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $fila['nombre_insumo']
                                );

                                ?>

                            </td>


                            <td>

                                <?php
                                echo $fila['cantidad_stock'];
                                ?>

                            </td>


                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $fila['unidad_medida']
                                );

                                ?>

                            </td>


                            <td>

                                <a href="inventario.php?id=<?php echo $fila['IdInsumo']; ?>">

                                    Consultar

                                </a>

                            </td>

                        </tr>

                    <?php

                        }

                    } else {

                    ?>

                        <tr>

                            <td colspan="5">

                                No hay insumos registrados.

                            </td>

                        </tr>

                    <?php

                    }

                    ?>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- ==========================================
             INSERTAR
             ========================================== -->

        <section class="panel">

            <h2>
                Insertar Insumo al Inventario
            </h2>


            <form
                action="../../controller/inventariocontroller.php?accion=insertar"
                method="POST"
            >

                <label>
                    Nombre del insumo:
                </label>

                <input
                    type="text"
                    name="nombre_insumo"
                    required
                >


                <label>
                    Cantidad en stock:
                </label>

                <input
                    type="number"
                    name="cantidad_stock"
                    step="0.01"
                    min="0"
                    required
                >


                <label>
                    Unidad de medida:
                </label>

                <select
                    name="unidad_medida"
                    required
                >

                    <option value="gramos">
                        Gramos (g)
                    </option>

                    <option value="unidades">
                        Unidades (und)
                    </option>

                    <option value="mililitros">
                        Mililitros (ml)
                    </option>

                </select>


                <button type="submit">

                    Insertar Insumo

                </button>

            </form>

        </section>


        <!-- ==========================================
             CONSULTAR
             ========================================== -->

        <section class="panel">

            <h2>
                Consultar Insumo por ID
            </h2>


            <form
                action="../../controller/inventariocontroller.php"
                method="GET"
            >

                <input
                    type="hidden"
                    name="accion"
                    value="consultar"
                >


                <label>
                    ID del insumo:
                </label>

                <input
                    type="number"
                    name="IdInsumo"
                    required
                >


                <button type="submit">

                    Consultar

                </button>

            </form>

        </section>


        <!-- ==========================================
             ACTUALIZAR
             ========================================== -->

        <section class="panel">

            <h2>
                Actualizar Insumo
            </h2>


            <form
                action="../../controller/inventariocontroller.php?accion=actualizar"
                method="POST"
            >

                <label>
                    ID:
                </label>

                <input
                    type="number"
                    name="IdInsumo"
                    required
                >


                <label>
                    Nombre del insumo:
                </label>

                <input
                    type="text"
                    name="nombre_insumo"
                    required
                >


                <label>
                    Cantidad en stock:
                </label>

                <input
                    type="number"
                    name="cantidad_stock"
                    step="0.01"
                    min="0"
                    required
                >


                <label>
                    Unidad de medida:
                </label>

                <select
                    name="unidad_medida"
                    required
                >

                    <option value="gramos">
                        Gramos (g)
                    </option>

                    <option value="unidades">
                        Unidades (und)
                    </option>

                    <option value="mililitros">
                        Mililitros (ml)
                    </option>

                </select>


                <button type="submit">

                    Actualizar Insumo

                </button>

            </form>

        </section>


        <!-- ==========================================
             ELIMINAR
             ========================================== -->

        <section class="panel">

            <h2>
                Eliminar Insumo
            </h2>


            <form
                action="../../controller/inventariocontroller.php"
                method="GET"
            >

                <input
                    type="hidden"
                    name="accion"
                    value="eliminar"
                >


                <label>
                    ID del insumo:
                </label>

                <input
                    type="number"
                    name="IdInsumo"
                    required
                >


                <button type="submit">

                    Eliminar Insumo

                </button>

            </form>

        </section>

    </main>

</div>

</body>

</html>