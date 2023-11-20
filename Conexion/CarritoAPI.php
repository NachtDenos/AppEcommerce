<?php 

session_start();
if(isset($_SESSION['usuario']))
{
 $usuario = $_SESSION['usuario'];
}
else
{
 header("Location: ../PantallasPHP/login.php");
 exit();
}
include_once 'ConexionPDP.php';

class CarritoAPI extends DB
{

    function ObtenerProductosCarrito($IdUsuario)
    {
        //$User = $usuario['User'];
        $conn = $this->connectDB();
        $sql = "Call ObtenerProductosDeCarrito(:usuarioID);"; //Obtiene los productos del usuario que los creo, para editar usamos que al darle click pase los datos de la pestaña 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuarioID', $IdUsuario, PDO::PARAM_STR);
       
        if ($stmt->execute()) {
            // Inicializa un arreglo para almacenar los resultados
            $data = array();
        
            // Recorre los resultados y agrega cada fila al arreglo
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            // Imprime el JSON resultante
           // echo json_encode($data); Desconemntala la primera vez que pruebas para verificar que funcion y imprime datos
            return $data;
        
            
        } else {
            // Si la llamada al stored procedure falla, imprime un mensaje de error o maneja la situación de otra manera
            echo "Error en la llamada al stored procedure";
            return array();
        }
    }
    
    function BajaCarritoProducto($IdProductoBaja, $IdUsuario)
    {

        $conn = $this->connectDB();
        $sql = "Call BajaCarritoProducto(:IdProducto, :IdUsuario);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdProducto', $IdProductoBaja, PDO::PARAM_STR);
        $stmt->bindParam(':IdUsuario', $IdUsuario, PDO::PARAM_STR);
        
        if($stmt->execute()) {
            echo "Producto eliminado correctamente";
            header("Location: ../PantallasPHP/carrito.php");
            // Redireccionar o realizar otras acciones después de eliminar
        } else {
            echo "Error al eliminar el producto";
            header("Location: ../PantallasPHP/carrito.php");
            // Puedes agregar más detalles sobre el error si es necesario
        }
            
        $conn->closeConnection();
    }

    function ActualizarCarritoProducto($IdProductoAct, $IdUsuario, $Cantidad)
    {
        if ($Cantidad > 0) 
        {
            $conn = $this->connectDB();
            $sql = "Call ActualizarCarritoProducto(:IdProducto, :IdUsuario, :Cantidad);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':IdProducto', $IdProductoAct, PDO::PARAM_STR);
            $stmt->bindParam(':IdUsuario', $IdUsuario, PDO::PARAM_STR);
            $stmt->bindParam(':Cantidad', $Cantidad, PDO::PARAM_STR);
            
            if($stmt->execute()) {
                echo "Se actualizo correctamente";
                header("Location: ../PantallasPHP/carrito.php");
                // Redireccionar o realizar otras acciones después de eliminar
            } else {
                echo "Error al actualizar cantidad";
                header("Location: ../PantallasPHP/carrito.php");
                // Puedes agregar más detalles sobre el error si es necesario
            }
                
            $conn->closeConnection();
        }
        else{
            echo "Se actualizo correctamente";
                header("Location: ../PantallasPHP/carrito.php");
        }
    }

    function Carrito($IdProductoAdd, $IdUsuario, $Cantidad)
    {
        if ($Cantidad > 0) 
        {
            $conn = $this->connectDB();
            $sql = "Call Carrito(:IdProducto, :IdUsuario, :Cantidad);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':IdProducto', $IdProductoAdd, PDO::PARAM_STR);
            $stmt->bindParam(':IdUsuario', $IdUsuario, PDO::PARAM_STR);
            $stmt->bindParam(':Cantidad', $Cantidad, PDO::PARAM_STR);
            
            if($stmt->execute()) {
                echo "Se actualizo correctamente";
                header("Location: ../PantallasPHP/carrito.php");
                // Redireccionar o realizar otras acciones después de eliminar
            } else {
                echo "Error al actualizar cantidad";
                header("Location: ../PantallasPHP/producto.php");
                // Puedes agregar más detalles sobre el error si es necesario
            }
                
            $conn->closeConnection();
        }
        else{
            echo "Se actualizo correctamente";
                header("Location: ../PantallasPHP/producto.php");
        }
    }
}

if(isset($_GET['action']))
{
    $action = $_GET['action'];
    echo($action);
    
    switch($action)
    {
        case 'agregarCarrito':
            echo 'Agregemos al carrito';
            $IdProductoAdd = $_POST['idProducto'];
            $IdUsuario = $_POST['idUsuario'];
            $Cantidad = $_POST['cantPro'];
            $Obj = new CarritoAPI();
            $Obj->Carrito($IdProductoAdd, $IdUsuario, $Cantidad);
            break;
        case 'eliminarProductoCarrito':
            echo 'Eliminar del Carrito';
            $IdProductoBorrar = $_POST['idProducto'];
            $IdUsuario = $_POST['idUsuario'];
            $Obj = new CarritoAPI();
            $Obj->BajaCarritoProducto($IdProductoBorrar, $IdUsuario);
            break;
        case 'ActCantidad':
            echo 'Actualizar Cantidad del Producto';
            $IdProductoAct = $_POST['idProducto'];
            $IdUsuario = $_POST['idUsuario'];
            $Cantidad = $_POST['cantPro'];
            $Obj = new CarritoAPI();
            $Obj->ActualizarCarritoProducto($IdProductoAct, $IdUsuario, $Cantidad);
            break;
    }

}
?>