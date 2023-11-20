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
    

}

if(isset($_GET['action']))
{
    $action = $_GET['action'];
    echo($action);
    
    switch($action)
    {
        case 'agregarCarrito':
            echo 'Agregemos al carrito';
            $Obj = new ListasAPI();
            $Obj->Carrito($IdProductoBorrar);
            break;
    }

}
?>