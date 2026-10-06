<?php 
session_start(); 

// 1. Protección de sesión
if (!isset($_SESSION['idusuario'])) { 
    header('Location: ../login.php'); 
    exit; 
} 

// 2. Traer la configuración de la Base de Datos (mysqli)
require_once dirname(__DIR__, 2) . '/config/config.php';

// 3. Obtener el total usando el nombre de la tabla en SINGULAR ('cliente')
$totalClientes = 0;
try {
    $resultado = $conexion->query("SELECT COUNT(*) AS total FROM cliente");
    if ($resultado) {
        $fila = $resultado->fetch_assoc();
        $totalClientes = $fila['total'];
    }
} catch (Exception $e) {
    $totalClientes = 0; 
}
?> 
<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Gestión de Clientes - GluttonIA</title> 
    <link rel="stylesheet" href="../../css/admin.css"> 
    <style>
        .contenedor-gestion { padding: 20px; }
        .formulario {
            background-color: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.05);
        }
        .formulario h2 { margin-top: 0; color: #333; font-size: 1.2rem; border-bottom: 2px solid #f4f4f4; padding-bottom: 8px;}
        label { display: block; margin-top: 12px; font-weight: bold; color: #555; font-size: 0.9rem; }
        input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background-color: #ff9800; color: white; border: none; cursor: pointer; border-radius: 5px; font-weight: bold; }
        button:hover { background-color: #e65100; }
        .grid-formularios { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px; }
        
        .tarjeta-conteo {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            max-width: 250px;
        }
        .tarjeta-conteo .icono {
            font-size: 2rem;
            margin-right: 15px;
            background: #fff3e0;
            padding: 10px;
            border-radius: 50%;
        }
        .tarjeta-conteo div { display: flex; flex-direction: column; }
        .tarjeta-conteo span { color: #777; font-size: 0.9rem; }
        .tarjeta-conteo strong { font-size: 1.8rem; color: #333; }
    </style>
</head> 
<body> 
    <div class="admin-container"> 
        <!-- BARRA LATERAL --> 
        <aside class="sidebar"> 
            <div class="logo"> 
                <div class="logo-icon"> 🍗 </div> 
                <h2>GluttonIA</h2> 
                <span>Panel administrativo</span> 
            </div> 
            <nav> 
                <a href="dashboard.php"> 🏠 Inicio </a> 
                <a href="cliente.php" class="activo"> 👥 Clientes </a> 
                <a href="#"> 🍔 Menú </a> 
                <a href="#"> 🧾 Órdenes </a> 
                <a href="#"> 📦 Inventario </a> 
                <a href="#"> 🚚 Delivery </a> 
                <a href="#"> 👨‍💼 Empleados </a> 
                <a href="#"> 👤 Usuarios </a> 
                <a href="#"> 📊 Reportes </a> 
            </nav> 
            <div class="sidebar-bottom"> 
                <a href="#"> ⚙️ Configuración </a> 
                <a href="../../controller/logout.php" class="cerrar"> 🚪 Cerrar sesión </a> 
            </div> 
        </aside> 

        <!-- CONTENIDO PRINCIPAL --> 
        <main class="contenido"> 
            <header class="topbar"> 
                <div> 
                    <h1>Módulo de Clientes</h1> 
                    <p>Administra, consulta y actualiza los registros de clientes de GluttonIA.</p> 
                </div> 
                <div class="usuario"> 
                    👤 <?php echo htmlspecialchars($_SESSION['nombreusuario']); ?> 
                </div> 
            </header> 

            <div class="contenedor-gestion">
                <!-- TARJETA INFORMATIVA AUTOMÁTICA -->
                <div class="tarjeta-conteo">
                    <div class="icono"> 👥 </div>
                    <div>
                        <span>Clientes Registrados</span>
                        <strong><?php echo $totalClientes; ?></strong>
                    </div>
                </div>

                <!-- BOTÓN LISTAR CLIENTES -->
                <div class="formulario">
                    <h2>Listar Todos los Clientes</h2>
                    <form action="../../controller/clienteController.php" method="GET">
                        <input type="hidden" name="accion" value="listar">
                        <button type="submit" style="background-color: #4CAF50;">🔍 Ver Lista Completa de Clientes</button>
                    </form>
                </div>

                <div class="grid-formularios">
                    <!-- FORMULARIO INSERTAR -->
                    <div class="formulario">
                        <h2>Insertar Cliente</h2>
                        <form action="../../controller/clienteController.php?accion=insertar" method="POST">
                            <label>Nombre Cliente:</label>
                            <input type="text" name="nombrecliente" required>

                            <label>Apellido Cliente:</label>
                            <input type="text" name="apellidocliente" required>

                            <label>Pedidos Realizados:</label>
                            <input type="number" name="pedidosRealizados" required>

                            <button type="submit">Guardar Cliente</button>
                        </form>
                    </div>

                    <!-- FORMULARIO CONSULTAR -->
                    <div class="formulario">
                        <h2>Consultar Cliente por ID</h2>
                        <form action="../../controller/clienteController.php" method="GET">
                            <input type="hidden" name="accion" value="consultar">
                            <label>ID Cliente:</label>
                            <input type="number" name="Idcliente" required>
                            <button type="submit" style="background-color: #2196F3;">Consultar Cliente</button>
                        </form>
                    </div>

                    <!-- FORMULARIO ACTUALIZAR -->
                    <div class="formulario">
                        <h2>Actualizar Cliente</h2>
                        <form action="../../controller/clienteController.php?accion=actualizar" method="POST">
                            <label>ID Cliente:</label>
                            <input type="number" name="Idcliente" required>

                            <label>Nombre Cliente:</label>
                            <input type="text" name="nombrecliente" required>

                            <label>Apellido Cliente:</label>
                            <input type="text" name="apellidocliente" required>

                            <label>Pedidos Realizados:</label>
                            <input type="number" name="pedidosRealizados" required>

                            <button type="submit">Actualizar Cliente</button>
                        </form>
                    </div>

                    <!-- FORMULARIO ELIMINAR -->
                    <div class="formulario">
                        <h2>Eliminar Cliente</h2>
                        <form action="../../controller/clienteController.php" method="GET">
                            <input type="hidden" name="accion" value="eliminar">
                            <label>ID Cliente:</label>
                            <input type="number" name="idcliente" required>
                            <button type="submit" style="background-color: #f44336;">Eliminar Cliente</button>
                        </form>
                    </div>
                </div>
            </div>
        </main> 
    </div> 
</body> 
</html>
