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


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 0:
            $TextoBusqueda = $_POST['TextoSearch'];
            $Objprod = new ProductosAPI();
            echo ($TextoBusqueda);
            $resultados= $Objprod->BusquedaSimple($TextoBusqueda);
            echo json_encode($resultados);
            break;
        default:
            // Manejar otras acciones si es necesario
            break;
    }
}
?>