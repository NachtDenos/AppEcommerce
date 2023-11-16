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
    function CrearProductos($NombreProd, $DescProd, $CantExistencia, $VideoProducto, $PrecioProd, $Visibilidad, $Foto1Prod, $Foto2Prod, $Foto3Prod, $Categoria, $Correo, $TipoProducto)
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
        $stmt->bindParam(':VideoProducto', $VideoProducto, PDO::PARAM_LOB);
        $stmt->bindParam(':PrecioProducto', $PrecioProd, PDO::PARAM_STR);
        $stmt->bindParam(':Visibilidad', $Visibilidad, PDO::PARAM_STR);
        $stmt->bindParam(':FotoProducto', $Foto1Prod, PDO::PARAM_STR);
        $stmt->bindParam(':FotoProducto2', $Foto2Prod, PDO::PARAM_STR);
        $stmt->bindParam(':FotoProducto3', $Foto3Prod, PDO::PARAM_STR);
        $stmt->bindParam(':CorreoVendedor', $Categoria, PDO::PARAM_STR);
        $stmt->bindParam(':CategoriaNombre', $Correo, PDO::PARAM_STR);
        $stmt->bindParam(':TipoProd', $TipoProducto, PDO::PARAM_STR);


    }
}


?>