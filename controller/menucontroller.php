<?php

require_once __DIR__ . '/../model/menumodel.php';

$menuModelo = new MenuModelo();

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {

    // INSERTAR PRODUCTO
    case 'insertar':

        echo $menuModelo->insertMenu(
            $_POST['menu'],
            $_POST['ingredientes']
        );

        break;


    // LISTAR PRODUCTOS
    case 'listar':

        $menus = $menuModelo->getMenus();

        while ($fila = $menus->fetch_assoc()) {

            echo "ID: " . $fila['IdMenú'] . "<br>";
            echo "Menú: " . $fila['menú'] . "<br>";
            echo "Ingredientes: " . $fila['ingredientes'] . "<br>";
            echo "<hr>";
        }

        break;


    // CONSULTAR POR ID
    case 'consultar':

        $menu = $menuModelo->getMenuById($_GET['IdMenú']);

        if ($fila = $menu->fetch_assoc()) {

            echo "ID: " . $fila['IdMenú'] . "<br>";
            echo "Menú: " . $fila['menú'] . "<br>";
            echo "Ingredientes: " . $fila['ingredientes'] . "<br>";

        } else {

            echo "Producto del menú no encontrado";
        }

        break;


    // ACTUALIZAR
    case 'actualizar':

        echo $menuModelo->updateMenu(
            $_POST['IdMenú'],
            $_POST['menu'],
            $_POST['ingredientes']
        );

        break;


    // ELIMINAR
    case 'eliminar':

        $id = $_GET['IdMenú'];

        echo $menuModelo->deleteMenu($id);

        break;
}

?>