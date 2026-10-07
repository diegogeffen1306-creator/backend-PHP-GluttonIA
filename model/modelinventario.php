<?php

require_once __DIR__ . '/../config/config.php';

class InventarioModelo
{
    // INSERTAR INSUMO
    public function insertInsumo($nombre, $stock, $medida)
    {
        global $conexion;

        $sql = "INSERT INTO `inventario`
                (`nombre_insumo`, `cantidad_stock`, `unidad_medida`)
                VALUES ('$nombre', '$stock', '$medida')";

        if ($conexion->query($sql) === TRUE) {

            return "Insumo insertado correctamente";

        } else {

            return "Error: " . $conexion->error;
        }
    }


    // LISTAR INSUMOS
    public function getInsumos()
    {
        global $conexion;

        $sql = "SELECT *
                FROM `inventario`";

        return $conexion->query($sql);
    }


    // CONSULTAR POR ID
    public function getInsumoById($idinsumo)
    {
        global $conexion;

        $sql = "SELECT *
                FROM `inventario`
                WHERE `IdInsumo` = '$idinsumo'";

        return $conexion->query($sql);
    }


    // ACTUALIZAR INSUMO
    public function updateInsumo(
        $idinsumo,
        $nombre,
        $stock,
        $medida
    )
    {
        global $conexion;

        $sql = "UPDATE `inventario`
                SET `nombre_insumo` = '$nombre',
                    `cantidad_stock` = '$stock',
                    `unidad_medida` = '$medida'
                WHERE `IdInsumo` = '$idinsumo'";

        if ($conexion->query($sql) === TRUE) {

            return "Insumo actualizado correctamente";

        } else {

            return "Error: " . $conexion->error;
        }
    }


    // ELIMINAR INSUMO
    public function deleteInsumo($idinsumo)
    {
        global $conexion;

        $sql = "DELETE FROM `inventario`
                WHERE `IdInsumo` = '$idinsumo'";

        if ($conexion->query($sql) === TRUE) {

            return "Insumo eliminado correctamente";

        } else {

            return "Error: " . $conexion->error;
        }
    }
}

?>