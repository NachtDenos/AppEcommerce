<?php  
include_once 'ConexionPDP.php';
/**
 * 
 */
class RegisterAPI extends DB
{
	
	function Registrar()
	{
		if(isset($_POST['RegButton']))
		{
		$conn = $this->connectDB();


		$Email = $_POST['email'];
		$Username = $_POST['nameuR'];
		$password = $_POST['passR'];
		$visibilidad = $_POST['rolR'];
		$nombeComple = $_POST['nameR'];
		$birthDate = $_POST['dateR'];
		$gender = $_POST['genderR'];
		$rolUsuario = $_POST['rolUR'];
		//$ProfilePic = $_POST['imagenR'];
		//$imagen = file_get_contents($_FILES["imagenFormR"]["tmp_name"]);
		//$imagenBlob = base64_encode($imagen);

		if (isset($_FILES["imagen"])) {
			$imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);
			$imagenBlob = base64_encode($imagen);
			// Resto del código para procesar la imagen.
		} else {
			//echo $imagen;
			echo "El campo de imagen no se envió correctamente.";
		}
		
		//$imagen = file_get_contents($_FILES['imagen']['tmp_name']);
		//$imagenBlob = base64_encode($imagen);
		//$imageName = mysqli_real_escape_string($conn, $_FILES["imagenR"]["name"]);

		//$imageData = mysqli_real_escape_string($conn , file_get_contents($_FILES[$ProfilePic]["tmp_name"]));
		//$imageType = mysqli_real_escape_string($conn, $_FILES["image"]["type"]);

	//	if(substr($imageType, 0 ,5) == "image")
	//	{
			/*$sql = "INSERT INTO usuarios (Correo, Usuario, Contraseña, ImagenPerfil, Nombre,
			Sexo, Visibilidad, Rol) VALUES (?, ?, ?, ?, ?, ?,?,?)";
			*/

			$sql = "Call RegistroUsuarios(:CorreoP, :UsuarioP, :ContrasenaP, :ImagenUsuario, :NombreP,:SexoP, :VisibilidadP, :RolP); ";
			$stmt = $conn->prepare($sql);
		//	$stmt->bind_param($Email, $Username, $password, $ProfilePic, $nombeComple, $gender, $visibilidad);
			$stmt->bindParam(':CorreoP', $Email, PDO::PARAM_STR);
    		$stmt->bindParam(':UsuarioP', $Username, PDO::PARAM_STR);
    		$stmt->bindParam(':ContrasenaP', $password, PDO::PARAM_STR);
   		    $stmt->bindParam(':ImagenUsuario', $imagenBlob, PDO::PARAM_LOB);
    		$stmt->bindParam(':NombreP', $nombeComple, PDO::PARAM_STR);
   			$stmt->bindParam(':SexoP', $gender, PDO::PARAM_STR);
   			$stmt->bindParam(':VisibilidadP', $visibilidad, PDO::PARAM_STR);
			$stmt->bindParam(':RolP', $rolUsuario, PDO::PARAM_STR);
			if($stmt->execute())
			{
				echo "Working Code";
				header("Location: ../PantallasPHP/login.php");
			}
			else
			{
				header("Location: ../PantallasPHP/register.php");
				echo "Error al registrar usuario: " . $stmt.error;
			}
			
		
	//	}
	//	else
	//	{
			echo "Only Images allowed";
	//	}

		$conn->closeConnection();
		
		
	}
}
}

if ($_POST['RegButton'] > 0) {
	$obj = new RegisterAPI();
	$obj->Registrar();
	// code...
}

?>