<?php
require_once __DIR__ . '/../model/clientemodel.php';

$clienteModelo = new ClienteModelo();

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {

    case 'insertar':
        $clienteModelo->insertCliente(
            $_POST['nombrecliente'],
            $_POST['apellidocliente'],
            $_POST['pedidosRealizados']
        );
        // Redirecciona inmediatamente de vuelta para refrescar la pantalla y actualizar el contador
        header("Location: ../view/admin/cliente.php");
        exit;

    case 'listar':
        $clientes = $clienteModelo->getClientes();

        while ($fila = $clientes->fetch_assoc()) {
            echo "ID: " . $fila['Idcliente'] . "<br>";
            echo "Nombre: " . $fila['nombrecliente'] . "<br>";
            echo "Apellido: " . $fila['apellidocliente'] . "<br>";
            echo "Pedidos realizados: " . $fila['pedidosRealizados'] . "<br><hr>";
        }
        break;

    case 'consultar':
        $cliente = $clienteModelo->getClienteById($_GET['Idcliente']);

        if ($fila = $cliente->fetch_assoc()) {
            echo "ID: " . $fila['Idcliente'] . "<br>";
            echo "Nombre: " . $fila['nombrecliente'] . "<br>";
            echo "Apellido: " . $fila['apellidocliente'] . "<br>";
            echo "Pedidos realizados: " . $fila['pedidosRealizados'] . "<br>";
        } else {
            echo "Cliente no encontrado";
        }
        break;

    case 'actualizar':
        $clienteModelo->updateCliente(
            $_POST['Idcliente'],
            $_POST['nombrecliente'],
            $_POST['apellidocliente'],
            $_POST['pedidosRealizados']
        );
        header("Location: ../view/admin/cliente.php");
        exit;

    case 'eliminar':
        $id = $_GET['idcliente'];  // minúscula "c", coincide con la URL
        $clienteModelo->deleteCliente($id);
        header("Location: ../view/admin/cliente.php");
        exit;
}
?>
