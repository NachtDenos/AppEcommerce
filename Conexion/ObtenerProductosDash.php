<?php
include_once 'ProductosAPI.php';
include_once 'ConexionPDP.php';

function ObtenerProd()
{
    $consulta = new ProductosAPI();
    $res = $consulta->ObtenerProductosAprovados();

    if ($res) {
        // Verifica si $res es un arreglo antes de llamar a fetchAll
            return $res;
       
    } else {
        // Manejo de error si ObtenerProductosAprovados() devuelve false
        return array('error' => 'Error en la obtención de productos');
    }
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 0:
            echo json_encode(ObtenerProd());
            break;
        default:
            // Manejar otras acciones si es necesario
            break;
    }
}
?>