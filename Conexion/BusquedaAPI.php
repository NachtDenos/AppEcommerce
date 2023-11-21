<?php 
include_once 'ConexionPDP.php';
include_once 'ProductosAPI.php';
class BusquedaAPI extends DB
{   

    function SacarImagenes($idProducto)
    {
        $conn = $this->connectDB();
        $sql = "CALL GetImgs(:IdProducto);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdProducto', $idProducto, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            // Recoge todas las filas en un array
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $data;
        } else {
            // Si la llamada al stored procedure falla, imprime un mensaje de error o maneja la situación de otra manera
            echo "Error en la llamada al stored procedure: " . print_r($stmt->errorInfo(), true);
            return array();
        }
    }
    

}

function ObtenerProd($param)
{
    $consulta = new ProductosAPI();
    $res = $consulta->BusquedaSimple($param);
   
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
        case "0":
            $TextoBusqueda = $_POST['TextoSearch'];
            /*
            $Objprod = new ProductosAPI();
            echo ($TextoBusqueda);
            $resultados= $Objprod->BusquedaSimple($TextoBusqueda);
            */
            $resultados = ObtenerProd($TextoBusqueda);
            echo json_encode($resultados);
            break;
        default:
            // Manejar otras acciones si es necesario
            break;
    }
}

if(isset($_GET['showImgs'])){
    $ObjMierdero = new BusquedaAPI();
    header("Content-type: image/jpg");
    echo $ObjMierdero->SacarImagenes($_GET['showImgs'])['Foto'];
    
}



?>