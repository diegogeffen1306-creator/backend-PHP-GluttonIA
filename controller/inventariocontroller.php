<?php

require_once __DIR__ . '/../model/modelinventario.php';

$inventarioModelo = new InventarioModelo();

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {

    // INSERTAR INSUMO

    case 'insertar':

        echo $inventarioModelo->insertInsumo(
            $_POST['nombre_insumo'],
            $_POST['cantidad_stock'],
            $_POST['unidad_medida']
        );

        break;


    // LISTAR INSUMOS

    case 'listar':

        $insumos = $inventarioModelo->getInsumos();

        while ($fila = $insumos->fetch_assoc()) {

            echo "ID: " . $fila['IdInsumo'] . "<br>";

            echo "Insumo: " . $fila['nombre_insumo'] . "<br>";

            echo "Cantidad: " . $fila['cantidad_stock'] . "<br>";

            echo "Unidad: " . $fila['unidad_medida'] . "<br>";

            echo "<hr>";
        }

        break;


    // CONSULTAR POR ID

    case 'consultar':

        $insumo = $inventarioModelo->getInsumoById(
            $_GET['IdInsumo']
        );

        if ($fila = $insumo->fetch_assoc()) {

            echo "ID: " . $fila['IdInsumo'] . "<br>";

            echo "Insumo: " . $fila['nombre_insumo'] . "<br>";

            echo "Cantidad: " . $fila['cantidad_stock'] . "<br>";

            echo "Unidad: " . $fila['unidad_medida'] . "<br>";

        } else {

            echo "Insumo no encontrado";
        }

        break;


    // ACTUALIZAR

    case 'actualizar':

        echo $inventarioModelo->updateInsumo(

            $_POST['IdInsumo'],

            $_POST['nombre_insumo'],

            $_POST['cantidad_stock'],

            $_POST['unidad_medida']

        );

        break;


    // ELIMINAR

    case 'eliminar':

        $id = $_GET['IdInsumo'];

        echo $inventarioModelo->deleteInsumo($id);

        break;
}

?>