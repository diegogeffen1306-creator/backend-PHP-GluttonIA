<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1, h2 {
            color: #333;
        }

        .contenedor {
            width: 80%;
            margin: auto;
        }

        .formulario {
            background-color: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        hr {
            margin: 40px 0;
        }
    </style>
</head>
<body>

    <div class="contenedor">

        <h1>CLIENTES</h1>

        <!-- FORMULARIO INSERTAR -->
        <div class="formulario">
            <h2>Insertar Cliente</h2>

            <form action="../controller/clienteController.php?accion=insertar" method="POST">
                
                <label>Nombre Cliente:</label>
                <input type="text" name="nombrecliente" required>

                <label>Apellido Cliente:</label>
                <input type="text" name="apellidocliente" required>

                <label>Pedidos Realizados:</label>
                <input type="number" name="pedidosRealizados" required>

                <button type="submit">Guardar Cliente</button>
            </form>
        </div>

        <hr>

        <!-- FORMULARIO CONSULTAR -->
        <div class="formulario">
            <h2>Consultar Cliente por ID</h2>

            <form action="../controller/clienteController.php" method="GET">
                <input type="hidden" name="accion" value="consultar">

                <label>ID Cliente:</label>
                <input type="number" name="Idcliente" required>

                <button type="submit">Consultar Cliente</button>
            </form>
        </div>

        <hr>

        <!-- FORMULARIO ACTUALIZAR -->
        <div class="formulario">
            <h2>Actualizar Cliente</h2>

            <form action="../controller/clienteController.php?accion=actualizar" method="POST">
                
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

        <hr>

        <!-- FORMULARIO ELIMINAR -->
        <div class="formulario">
            <h2>Eliminar Cliente</h2>

            <form action="../controller/clienteController.php" method="GET">
                <input type="hidden" name="accion" value="eliminar">

                <label>ID Cliente:</label>
                <input type="number" name="idcliente" required>

                <button type="submit">Eliminar Cliente</button>
            </form>
        </div>

        <hr>

        <!-- BOTÓN LISTAR CLIENTES -->
        <div class="formulario">
            <h2>Listar Todos los Clientes</h2>

            <form action="../controller/clienteController.php" method="GET">
                <input type="hidden" name="accion" value="listar">

                <button type="submit">Ver Clientes</button>
            </form>
        </div>