<?php

require_once __DIR__ . '/../config/config.php';

class MenuModelo
{
    // INSERTAR PRODUCTO
    public function insertMenu($menu, $ingredientes)
    {
        global $conexion;

        $sql = "INSERT INTO `menú` (`menú`, `ingredientes`)
                VALUES ('$menu', '$ingredientes')";

        if ($conexion->query($sql) === TRUE) {
            return "Producto del menú insertado correctamente";
        } else {
            return "Error: " . $conexion->error;
        }
    }


    // LISTAR PRODUCTOS
    public function getMenus()
    {
        global $conexion;

        $sql = "SELECT * FROM `menú`";

        return $conexion->query($sql);
    }


    // CONSULTAR POR ID
    public function getMenuById($idmenu)
    {
        global $conexion;

        $sql = "SELECT * FROM `menú`
                WHERE `IdMenú` = '$idmenu'";

        return $conexion->query($sql);
    }


    // ACTUALIZAR
    public function updateMenu($idmenu, $menu, $ingredientes)
    {
        global $conexion;

        $sql = "UPDATE `menú`
                SET `menú` = '$menu',
                    `ingredientes` = '$ingredientes'
                WHERE `IdMenú` = '$idmenu'";

        if ($conexion->query($sql) === TRUE) {
            return "Producto del menú actualizado correctamente";
        } else {
            return "Error: " . $conexion->error;
        }
    }


    // ELIMINAR
    public function deleteMenu($idmenu)
    {
        global $conexion;

        $sql = "DELETE FROM `menú`
                WHERE `IdMenú` = '$idmenu'";

        if ($conexion->query($sql) === TRUE) {
            return "Producto del menú eliminado correctamente";
        } else {
            return "Error: " . $conexion->error;
        }
    }
}

?>