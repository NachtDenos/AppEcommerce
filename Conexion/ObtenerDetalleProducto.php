<?php
include_once 'ProductosAPI.php';
include_once 'ConexionPDP.php';

function ObtenerProd()
{
    $idProducto = $_POST['IdProducto'];
    $consulta = new ProductosAPI();
    $res = $consulta->ObtenerDetalleProducto($idProducto);

    if ($res) {
        // Verifica si $res es un arreglo antes de llamar a fetchAll
        if (is_array($res)) {
            return $res;
        } else {
            // Si no es un arreglo, podría ser un mensaje de error u otra cosa
            return array('error' => 'Error en la obtención de productos');
        }
    } else {
        // Manejo de error si ObtenerProductosAprovados() devuelve false
        return array('error' => 'Error en la obtención de productos');
    }
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 0:
            $resultado = ObtenerProd();
            
           

            echo json_encode($resultado);
            //header("Location: ../PantallasPHP/producto.php");
            exit;
            break;
        default:
            // Manejar otras acciones si es necesario
            break;
    }
}
?>