<?php
include_once 'ConexionPDP.php';
include_once 'ProductosAPI.php';
class AutorizarProducto extends DB
{
    
    function AutorizarProducto($IdProductoEdit, $CorreoPuñetas)
    {
        $conn = $this->connectDB();
        //  $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ?, Visibilidad = ? where Correo = ?";
        $sql = "Call AutorizarProductos(:IdProducto, :CorreoAdmin);";
        $stament = $conn->prepare($sql);
        //Se ejecutan los parametros en el orden establecido en la DB
        $stament->bindParam(':IdProducto', $IdProductoEdit, PDO::PARAM_STR);
        $stament->bindParam(':CorreoAdmin', $CorreoPuñetas, PDO::PARAM_STR);
        //$stament->bindParam(':RolNuevo', $Rol, PDO::PARAM_STR);
        if($stament->execute())
        {
            echo "Working Code";
            //echo $stament;
           
            header("Location: ../PantallasPHP/perfil.php");
            return true;
        }
        else
        {
            
            header("Location: ../PantallasPHP/editProducto.php");
            echo "Error al modificar usuario: " . $stmt.error;
            return false;
        }

		$conn->closeConnection();


    }
}

if (isset($_POST['IdProducto'])) {
    $idProducto = $_POST['IdProducto'];
    $Correito = $usuario['Mail'];
    $objDetalles = new AutorizarProducto();
    $detallesProducto = $objDetalles->AutorizarProducto($idProducto, $Correito);
    
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

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado']);
}
?>