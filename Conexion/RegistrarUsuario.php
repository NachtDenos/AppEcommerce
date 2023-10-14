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
		//$ProfilePic = $_POST['imagenR'];
		$imageName = mysqli_real_escape_string($conn, $_FILES["imagenR"]["name"]);

		$imageData = mysqli_real_escape_string($conn ,$_Files_get_contents($_FILES["imageR"]["tmp_name"]));
		$imageType = mysqli_real_escape_string($conn, $_FILES["imageR"]["type"]);

		if(substr($imageType, 0 ,5) == "image")
		{
			$sql = "INSERT INTO usuarios (Correo, Usuario, Contraseña, ImagenPerfil, Nombre,
			Sexo, Visibilidad) VALUES (?, ?, ?, ?, ?, ?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param($Email, $Username, $password, $imageData, $nombeComple, $gender, $visibilidad);
			if($stmt->execute())
			{
				echo "Working Code";
				header("Location: ../index.html");
			}
			else
			{
				header("Location: ../Register.html");
				echo "Error al registrar usuario: " . $stmt.error;
			}
			
		
		}
		else
		{
			echo "Only Images allowed";
		}

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