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
    function AltaListas($NombreLista, $DescLista, $PrivLista, $CorreoU)
    {
        $conn = $this->connectDB();

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenL"])) {
			$imagen = file_get_contents($_FILES["imagenL"]["tmp_name"]);
			$imagenBlob = base64_encode($imagen);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen;
			echo "El campo de imagen no se envió correctamente.";
		}

        //Los params deben llamarse igual que en el SP, al menos me ha tocado asi si no truena por no encontrar
        $sql = "Call CrearListas(:nombre, :descripcion, :correoLog,:privacidad, :foto);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $NombreLista, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $DescLista, PDO::PARAM_STR);
        $stmt->bindParam(':correoLog', $CorreoU, PDO::PARAM_STR);
        $stmt->bindParam(':privacidad', $PrivLista, PDO::PARAM_STR);
        $stmt->bindParam(':foto', $imagenBlob, PDO::PARAM_LOB);

        if($stmt->execute())
			{
				echo "Working Code";
				header("Location: ../PantallasPHP/listas.php");
			}
			else
			{
				header("Location: ../PantallasPHP/listas.php");
				echo "Error al dar de alta";
			}
            $conn->closeConnection();
    }

    function ObtenerListasUsuario($User)
    {
        //$User = $usuario['User'];
        $conn = $this->connectDB();
        $sql = "Call ObtenerListasUsuario(:IdUsuario);"; //Obtiene los productos del usuario que los creo, para editar usamos que al darle click pase los datos de la pestaña 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdUsuario', $User, PDO::PARAM_STR);
       

    
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

    function ObtenerListasId($IdAtraer)
    {
        //$User = $usuario['User'];
        $conn = $this->connectDB();
        $sql = "Call ObtenerListaPorId(:listaID);"; //Obtiene los productos del usuario que los creo, para editar usamos que al darle click pase los datos de la pestaña 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':listaID', $IdAtraer, PDO::PARAM_STR);
       

    
        if ($stmt->execute()) {
            // Inicializa un arreglo para almacenar los resultados
            $data = array();
        
            // Recorre los resultados y agrega cada fila al arreglo
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            // Imprime el JSON resultante
            //echo json_encode($data); //Desconemntala la primera vez que pruebas para verificar que funcion y imprime datos
            return $data;
        
            
        } else {
            // Si la llamada al stored procedure falla, imprime un mensaje de error o maneja la situación de otra manera
            echo "Error en la llamada al stored procedure";
            return array();
        }
        
    }

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

    function BajaListaProducto($IdProductoBaja, $IdLista)
    {

        $conn = $this->connectDB();
        $sql = "Call BajaListaProducto(:IdProducto, :IdLista);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdProducto', $IdProductoBaja, PDO::PARAM_STR);
        $stmt->bindParam(':IdLista', $IdLista, PDO::PARAM_STR);
        
        if($stmt->execute()) {
            echo "Producto eliminado correctamente";
            header("Location: ../PantallasPHP/listas.php");
            // Redireccionar o realizar otras acciones después de eliminar
        } else {
            echo "Error al eliminar el producto";
            header("Location: ../PantallasPHP/listas.php");
            // Puedes agregar más detalles sobre el error si es necesario
        }
            
        $conn->closeConnection();
    }


    function BajaLista($IdListaBaja)
    {
        $conn = $this->connectDB();
        $sql = "Call BajaLista(:IdLista);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdLista', $IdListaBaja, PDO::PARAM_STR); // Corregir aquí
        
        if($stmt->execute()) {
            echo "Producto eliminado correctamente";
            header("Location: ../PantallasPHP/listas.php");
            // Redireccionar o realizar otras acciones después de eliminar
        } else {
            echo "Error al eliminar el producto";
            header("Location: ../PantallasPHP/listas.php");
            // Puedes agregar más detalles sobre el error si es necesario
        }
            
        $conn->closeConnection();
    }

    function Carrito($IdProductoBaja)
    {
        $conn = $this->connectDB();
        $sql = "Call hola(:IdProducto);";
        $stament = $conn->prepare($sql);
        $stament->bindParam(':IdProducto', $IdProductoBaja, PDO::PARAM_STR);
        if($stament->execute())
        {
            echo "Working Code";
           
            header("Location: ../PantallasPHP/listas.php");
            return true;
        }
        else
        {
            
            header("Location: ../PantallasPHP/listas.php");
            echo "Error al modificar usuario: " . $stmt.error;
            return false;
        }

		$conn->closeConnection();


    }


    function AgregarProdListas($ListaSelect, $IdProd)
    {
        $conn = $this->connectDB();
        //Los params deben llamarse igual que en el SP, al menos me ha tocado asi si no truena por no encontrar
        $sql = "Call AgregarProdListas(:listaID, :IdProd);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':listaID', $ListaSelect, PDO::PARAM_STR);
        $stmt->bindParam(':IdProd', $IdProd, PDO::PARAM_STR);

        if($stmt->execute())
			{
				echo "Working Code";
				header("Location: ../PantallasPHP/listas.php");
			}
			else
			{
				header("Location: ../PantallasPHP/listas.php");
				echo "Error al dar de alta";
			}
            $conn->closeConnection();

    }
    

}

if(isset($_GET['action']))
{
    $action = $_GET['action'];
    echo($action);
    
    switch($action)
    {
        case 'insert':
            echo 'Crear Lista';
            $NombreLista = $_POST['nameL'];
            $DescLista = $_POST['descL'];
            $PrivLista = $_POST['privL'];
            $CorreoU = $usuario['Mail'];
            $Obj = new ListasAPI();
            echo"Entro";
            $Obj->AltaListas($NombreLista, $DescLista, $PrivLista, $CorreoU);
            break;
        case 'eliminarProducto':
            echo"Entro";
            $IdProductoBorrar = $_POST['idProducto'];
            $IdLista = $_POST['idLista'];
            $Obj = new ListasAPI();
            $Obj->BajaListaProducto($IdProductoBorrar, $IdLista);
            echo"Entro";
            break;
        case 'agregarCarrito':
            echo 'Agregemos al carrito';
            $Obj = new ListasAPI();
            $Obj->Carrito($IdProductoBorrar);
            break;
        case 'delete':
            echo 'Borramos una lista';
            $IdListaBaja = $_POST['listaID'];
            $Obj = new ListasAPI();
            $Obj->BajaLista($IdListaBaja);
            break;
        case 'AgregarLista':
            echo 'Agregamos Productos a Lista';
            $ListaSelect = $_POST['listaSeleccionada'];
            $IdProd = $_POST['idProducto'];
            $Obj = new ListasAPI();
            $Obj->AgregarProdListas($ListaSelect, $IdProd);
            break;

    }

}
?>