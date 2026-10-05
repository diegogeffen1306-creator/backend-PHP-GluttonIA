<?php
require_once('../model/clientemodel.php');

$clienteModelo = new ClienteModelo();

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {

    case 'insertar':
        echo $clienteModelo->insertCliente(
            $_POST['nombrecliente'],
            $_POST['apellidocliente'],
            $_POST['pedidosRealizados']
        );
        break;

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
        echo $clienteModelo->updateCliente(
            $_POST['Idcliente'],
            $_POST['nombrecliente'],
            $_POST['apellidocliente'],
            $_POST['pedidosRealizados']
        );
        break;

    case 'eliminar':
    $id = $_GET['idcliente'];  // minúscula "c", coincide con la URL
    if ($clienteModelo->deleteCliente($id)) {
        echo "Cliente eliminado correctamente";
    } else {
        echo "Error al eliminar el cliente";
    }
    break;
}

?>