<?php 
include_once 'ConexionPDP.php';
include_once 'ProductosAPI.php';
class BusquedaAPI extends DB
{   

    /*
    //El problema si marca error de caracteres es la funcion public construct o el constructor por default
    function BusquedaSimple()
{
    $kevin = $this->connectDB();
    $query = "Call BusquedaSimple();";
    $stmt = $kevin->prepare($query);
    $stmt->execute();

    $productos = array(); // Crear un array para almacenar las categorías

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $productos[] = $result; // Agregar cada categoría al array
    }

    return $productos;

}
*/
}
function ObtenerProd($param)
{
    $consulta = new ProductosAPI();
    $res = $consulta->BusquedaSimple($param);

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
            $TextoBusqueda = $_POST['TextoSearch'];
            /*
            $Objprod = new ProductosAPI();
            echo ($TextoBusqueda);
            $resultados= $Objprod->BusquedaSimple($TextoBusqueda);
            */
            echo json_encode(ObtenerProd($TextoBusqueda));
            break;
        default:
            // Manejar otras acciones si es necesario
            break;
    }
}
?>