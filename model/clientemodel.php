<?php
require_once '../config/config.php';


class ClienteModelo {

    // INSERTAR CLIENTE
    public function insertCliente($nombrecliente, $apellidocliente, $pedidosRealizados) {
        global $conexion;

        $sql = "INSERT INTO cliente (nombrecliente, apellidocliente, pedidosRealizados) 
                VALUES ('$nombrecliente', '$apellidocliente', '$pedidosRealizados')";

        if ($conexion->query($sql) === TRUE) {
            return "Cliente insertado correctamente";
        } else {
            return "Error: " . $conexion->error;
        }
    }

    // LISTAR TODOS LOS CLIENTES
    public function getClientes() {
        global $conexion;

        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);

        return $resultado;
    }

    // CONSULTAR CLIENTE POR ID
    public function getClienteById($idcliente) {
        global $conexion;

        $sql = "SELECT * FROM cliente WHERE idcliente = '$idcliente'";
        $resultado = $conexion->query($sql);

        return $resultado;
    }

    // ACTUALIZAR CLIENTE
    public function updateCliente($idcliente, $nombrecliente, $apellidocliente, $pedidosRealizados) {
        global $conexion;

        $sql = "UPDATE cliente 
                SET nombrecliente = '$nombrecliente',
                    apellidocliente = '$apellidocliente',
                    pedidosRealizados = '$pedidosRealizados'
                WHERE idcliente = '$idcliente'";

        if ($conexion->query($sql) === TRUE) {
            return "Cliente actualizado correctamente";
        } else {
            return "Error: " . $conexion->error;
        }
    }

    // ELIMINAR CLIENTE
    public function deleteCliente($idcliente) {
        global $conexion;

        $sql = "DELETE FROM cliente WHERE idcliente = '$idcliente'";

        if ($conexion->query($sql) === TRUE) {
            return "Cliente eliminado correctamente";
        } else {
            return "Error: " . $conexion->error;
        }
    }
}

?>