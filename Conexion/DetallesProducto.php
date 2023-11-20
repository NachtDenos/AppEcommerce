<?php
include_once 'ConexionPDP.php';

class DetallesProductoAPI extends DB
{
    function ObtenerProductosPorId($IdAtraer)
    {
        $conn = $this->connectDB();
        $sql = "Call ObtenerProductoPorId(:IdProducto);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdProducto', $IdAtraer, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $data;
        } else {
            echo "Error en la llamada al stored procedure";
            return array();
        }
    }
}

if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];

    $objDetalles = new DetallesProductoAPI();
    $detallesProducto = $objDetalles->ObtenerProductosPorId($idProducto);

    if ($detallesProducto) {
        $response = [
            'success' => true,
            'message' => 'Detalles del producto obtenidos correctamente',
            'data' => $detallesProducto
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'No se recuperaron los datos del producto'
        ];
    }

    //header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado']);
}
?>