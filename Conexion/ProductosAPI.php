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

class ProductosAPI extends DB
{
    function AltaProductos($NombreProd, $DescProd, $CantExistencia, $PrecioProd, $Visibilidad, $Categoria, $Correo, $TipoProducto)
    {
        $conn = $this->connectDB();
        /*
        // Tiene que ver para recibir el video
        if (isset($_FILES["videoProd"])) {
			$vid = file_get_contents($_FILES["videoProd"]["tmp_name"]);
			$vidBlob = base64_encode($vid);
			// Resto del código para procesar la imagen.
		} else {
			echo $vid;
			echo "El campo de imagen no se envió correctamente.";
		}
        */
        

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenProd1"])) {
			$imagen = file_get_contents($_FILES["imagenProd1"]["tmp_name"]);
			$imagenBlob = base64_encode($imagen);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen;
			echo "El campo de imagen no se envió correctamente.";
		}

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenProd2"])) {
			$imagen2 = file_get_contents($_FILES["imagenProd2"]["tmp_name"]);
			$imagenBlob2 = base64_encode($imagen2);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen2;
			echo "El campo de imagen no se envió correctamente.";
		}

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenProd3"])) {
			$imagen3 = file_get_contents($_FILES["imagenProd3"]["tmp_name"]);
			$imagenBlob3 = base64_encode($imagen3);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen3;
			echo "El campo de imagen no se envió correctamente.";
		}
        
        

        //Los params deben llamarse igual que en el SP, al menos me ha tocado asi si no truena por no encontrar
        $sql = "Call CrearProductosImagen(:NombreProducto, :DescripcionProducto, :CantidadProducto,:PrecioProducto, :Visibilidad, :FotoProducto, :FotoProducto2, :FotoProducto3, :CorreoVendedor, :CategoriaNombre, :TipoProd);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':NombreProducto', $NombreProd, PDO::PARAM_STR);
        $stmt->bindParam(':DescripcionProducto', $DescProd, PDO::PARAM_STR);
        $stmt->bindParam(':CantidadProducto', $CantExistencia, PDO::PARAM_STR);
        $stmt->bindParam(':PrecioProducto', $PrecioProd, PDO::PARAM_STR);
        $stmt->bindParam(':Visibilidad', $Visibilidad, PDO::PARAM_STR);
        $stmt->bindParam(':FotoProducto', $imagenBlob, PDO::PARAM_LOB);
        $stmt->bindParam(':FotoProducto2', $imagenBlob2, PDO::PARAM_LOB);
        $stmt->bindParam(':FotoProducto3', $imagenBlob3, PDO::PARAM_LOB);
        $stmt->bindParam(':CorreoVendedor', $Correo, PDO::PARAM_STR);
        $stmt->bindParam(':CategoriaNombre', $Categoria, PDO::PARAM_STR);
        $stmt->bindParam(':TipoProd', $TipoProducto, PDO::PARAM_STR);

        if($stmt->execute())
			{
				echo "Working Code";
				header("Location: ../PantallasPHP/dashboard.php");
			}
			else
			{
				header("Location: ../PantallasPHP/newProducto.php");
				echo "Error al dar de alta";
			}
            $conn->closeConnection();
    }


    function AltaProductosVideo($NombreProd, $DescProd, $CantExistencia, $PrecioProd, $Visibilidad, $Categoria, $Correo, $TipoProducto)
    {
        $conn = $this->connectDB();
        
        // Tiene que ver para recibir el video
        if (isset($_FILES["videoProd"])) {
			$vid = file_get_contents($_FILES["videoProd"]["tmp_name"]);
			$vidBlob = base64_encode($vid);
			// Resto del código para procesar la imagen.
		} else {
			echo $vid;
			echo "El campo de imagen no se envió correctamente.";
		}
        
        

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenProd1"])) {
			$imagen = file_get_contents($_FILES["imagenProd1"]["tmp_name"]);
			$imagenBlob = base64_encode($imagen);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen;
			echo "El campo de imagen no se envió correctamente.";
		}

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenProd2"])) {
			$imagen2 = file_get_contents($_FILES["imagenProd2"]["tmp_name"]);
			$imagenBlob2 = base64_encode($imagen2);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen2;
			echo "El campo de imagen no se envió correctamente.";
		}

        //Fotos, copiar y pegar, cambiar valores
        if (isset($_FILES["imagenProd3"])) {
			$imagen3 = file_get_contents($_FILES["imagenProd3"]["tmp_name"]);
			$imagenBlob3 = base64_encode($imagen3);
			// Resto del código para procesar la imagen.
		} else {
			echo $imagen3;
			echo "El campo de imagen no se envió correctamente.";
		}
        
        

        //Los params deben llamarse igual que en el SP, al menos me ha tocado asi si no truena por no encontrar
        $sql = "Call CrearProductos(:NombreProducto, :DescripcionProducto, :CantidadProducto, :VideoProducto, :PrecioProducto, :Visibilidad, :FotoProducto, :FotoProducto2, :FotoProducto3, :CorreoVendedor, :CategoriaNombre, :TipoProd);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':NombreProducto', $NombreProd, PDO::PARAM_STR);
        $stmt->bindParam(':DescripcionProducto', $DescProd, PDO::PARAM_STR);
        $stmt->bindParam(':CantidadProducto', $CantExistencia, PDO::PARAM_STR);
        $stmt->bindParam(':VideoProducto', $vidBlob, PDO::PARAM_LOB);
        $stmt->bindParam(':PrecioProducto', $PrecioProd, PDO::PARAM_STR);
        $stmt->bindParam(':Visibilidad', $Visibilidad, PDO::PARAM_STR);
        $stmt->bindParam(':FotoProducto', $imagenBlob, PDO::PARAM_LOB);
        $stmt->bindParam(':FotoProducto2', $imagenBlob2, PDO::PARAM_LOB);
        $stmt->bindParam(':FotoProducto3', $imagenBlob3, PDO::PARAM_LOB);
        $stmt->bindParam(':CorreoVendedor', $Correo, PDO::PARAM_STR);
        $stmt->bindParam(':CategoriaNombre', $Categoria, PDO::PARAM_STR);
        $stmt->bindParam(':TipoProd', $TipoProducto, PDO::PARAM_STR);

        if($stmt->execute())
			{
				echo "Working Code";
				header("Location: ../PantallasPHP/dashboard.php");
			}
			else
			{
				header("Location: ../PantallasPHP/newProducto.php");
				echo "Error al dar de alta";
			}
            $conn->closeConnection();
    }

    function ObtenerProductosAprovacion()
    {
        $conn = $this->connectDB();
        $sql = "Call ObtenerProductos();";
        $stmt = $conn->prepare($sql);

    
        if ($stmt->execute()) {
            // Inicializa un arreglo para almacenar los resultados
            $data = array();
        
            // Recorre los resultados y agrega cada fila al arreglo
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        
            // Imprime el JSON resultante
            //echo json_encode($data);
        } else {
            // Si la llamada al stored procedure falla, imprime un mensaje de error o maneja la situación de otra manera
            echo "Error en la llamada al stored procedure";
            return array();
        }
        
    }

    function ObtenerProductosUsuario($User)
    {
        //$User = $usuario['User'];
        $conn = $this->connectDB();
        $sql = "Call ObtenerProductosUsuario(:UsuarioCreador);"; //Obtiene los productos del usuario que los creo, para editar usamos que al darle click pase los datos de la pestaña 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':UsuarioCreador', $User, PDO::PARAM_STR);
       

    
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

    function ObtenerProductosId($IdAtraer)
    {
        //$User = $usuario['User'];
        $conn = $this->connectDB();
        $sql = "Call ObtenerProductoPorId(:IdProducto);"; //Obtiene los productos del usuario que los creo, para editar usamos que al darle click pase los datos de la pestaña 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdProducto', $IdAtraer, PDO::PARAM_STR);
       

    
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

    function ModificarProducto($IdProductoEdit, $NombreProductoEdit, $DescripcionProductoEdit, $TipoProdEdit, $PrecioProdEdit, $InventarioProdEdit, $CategoriaEdit)
    {
        $conn = $this->connectDB();
        //  $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ?, Visibilidad = ? where Correo = ?";
        $sql = "Call EditarProductos(:IdProdEditar, :NombreProducto, :DescripcionProducto, :TipoProd, :PrecioProd, :InventarioProd, :CategoriaId);";
        $stament = $conn->prepare($sql);
        //Se ejecutan los parametros en el orden establecido en la DB
        $stament->bindParam(':IdProdEditar', $IdProductoEdit, PDO::PARAM_STR);
        $stament->bindParam(':NombreProducto', $NombreProductoEdit, PDO::PARAM_STR);
        $stament->bindParam(':DescripcionProducto', $DescripcionProductoEdit, PDO::PARAM_STR);
        $stament->bindParam(':TipoProd', $TipoProdEdit, PDO::PARAM_STR);
        $stament->bindParam(':PrecioProd', $PrecioProdEdit, PDO::PARAM_STR);
        $stament->bindParam(':InventarioProd', $InventarioProdEdit, PDO::PARAM_STR);
        $stament->bindParam(':CategoriaId', $CategoriaEdit, PDO::PARAM_STR);
        //$stament->bindParam(':RolNuevo', $Rol, PDO::PARAM_STR);
        if($stament->execute())
        {
            echo "Working Code";
            //echo $stament;
           
            header("Location: ../PantallasPHP/dashboard.php");
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

    function BajaProducto($IdProductoBaja)
    {
        $conn = $this->connectDB();
        //  $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ?, Visibilidad = ? where Correo = ?";
        $sql = "Call BajaProductos(:IdProducto);";
        $stament = $conn->prepare($sql);
        //Se ejecutan los parametros en el orden establecido en la DB
        $stament->bindParam(':IdProducto', $IdProductoBaja, PDO::PARAM_STR);
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

    function ObtenerProductosAprovados()
    {
        $conn = $this->connectDB();
        $sql = "Call ObtenerProductosAutorizados();";
        $stmt = $conn->prepare($sql);

    
        if ($stmt->execute()) {
            // Inicializa un arreglo para almacenar los resultados
            $data = array();
        
            // Recorre los resultados y agrega cada fila al arreglo
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        
            // Imprime el JSON resultante
            //echo json_encode($data);
        } else {
            // Si la llamada al stored procedure falla, imprime un mensaje de error o maneja la situación de otra manera
            echo "Error en la llamada al stored procedure";
            return array();
        }
        
    }
    
    function ObtenerDetalleProducto($IdProducto)
    {
        $conn = $this->connectDB();
        $sql = "Call ObtenerDetalleProducto(:IdProducto);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':IdProducto', $IdProducto, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            // Inicializa un arreglo para almacenar los resultados
            $data = array();
        
            // Recorre los resultados y agrega cada fila al arreglo
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        
            // Imprime el JSON resultante
            //echo json_encode($data);
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
        case 'insert':
            
            echo 'Crear Producto';
            $NombreProducto = $_POST['NombreProd'];
            $DesProducto = $_POST['DescripciónProd'];
            $TipoProd = $_POST['ventaCot'];
            $PrecioProd = $_POST['precioProd'];
            $ExistenciaProd = $_POST['inventProd'];
            $CateProd = $_POST['cateProd'];
            $CorreoU = $usuario['Mail'];
            $Obj = new ProductosAPI();
            echo"Entro";
            echo($ExistenciaProd);
            $Obj->AltaProductosVideo($NombreProducto, $DesProducto, $ExistenciaProd, $PrecioProd, 0, $CateProd, $CorreoU, $TipoProd);
            //CrearProductos($NombreProd, $DescProd, $CantExistencia, $PrecioProd, $Visibilidad, $Categoria, $Correo, $TipoProducto)
            break;
        case 'Update':
            echo "Editar Producto";
            $NombreProducto = $_POST['NombreProdEdit'];
            $DesProducto = $_POST['DescripciónProd'];
            $TipoProd = $_POST['ventaCot'];
            $PrecioProd = $_POST['precioProd'];
            $ExistenciaProd = $_POST['inventProd'];
            $CateProd = $_POST['cateProd'];
            $IdProductoFinal = $_POST['IdProductoEdit'];
            echo ($IdProductoFinal);
            $Obj = new ProductosAPI();
            $Obj->ModificarProducto($IdProductoFinal, $NombreProducto, $DesProducto, $TipoProd, $PrecioProd, $ExistenciaProd, $CateProd);
            //ModificarProducto($IdProductoEdit, $NombreProductoEdit, $DescripcionProductoEdit, $TipoProdEdit, $PrecioProdEdit, $InventarioProdEdit, $CategoriaEdit)
            break;
        case 'Delete':
            echo 'Baja Productos';
            $IdProductoFinal = $_POST['IdProductoEdit'];
            $Obj = new ProductosAPI();
            $Obj->BajaProducto($IdProductoFinal);
            break;
        case 'Detalles':
            $IdProductoFinal = $_POST['idProducto'];
            $Obj = new ProductosAPI();
            $detallesProducto = $Obj->ObtenerProductosId($IdProductoFinal);
        
            if ($detallesProducto) {
                $response = $detallesProducto;
            } else {
                $response = [
                    'success' => false,
                    'message' => 'No se recuperaron los datos del producto'
                ];
            }
        
            header('Content-Type: application/json'); // Establece el encabezado para indicar que la respuesta es de tipo JSON
            echo json_encode($response);
        break;
        case 'Autorizar':
            $IdProductoFinal = $_POST['idProducto'];
            $CorreoAdmin = $_SESSION['Mail'];
            echo "Hola";
            //$Obj = new ProductosAPI();
            //$detallesProducto = $Obj->AutorizarProducto($IdProductoFinal, $CorreoAdmin);
        break;

    }

}
?>