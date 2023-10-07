<?php
	include_once 'ConexionPDP.php';


	class DemoraAPI extends DB{
		
		function login(){
			//$querie ="SELECT Correo, Contraseña, Usuario, ImagenPerfil, Nombre, ApellidoP, ApellidoM, Sexo, Rol 
			////	WHERE Correo = '".$Correo."'
			//	AND Contraseña = '"$password"'";


			//$query = $this->connect()->query("SELECT Id_Usuario,Correo, Contraseña, Usuario, ImagenPerfil, Nombre, ApellidoP, ApellidoM, Sexo, Rol 
			//FROM usuarios 
			//WHERE Correo = '".$Correo."' AND Contraseña = '".$Pass."'"
			//);

			 $kevin = $this->connectDB();

			//Pasar el login, a esta parte

				

				if (isset($_SESSION['usuario'])) {
				header("Location: index.html");
				exit();
				}

				session_start();


				if (isset($_POST['botonLog']))
				{


				//$query = "SELECT Id_Usuario, Correo, Contraseña FROM usuarios WHERE Correo = :user AND Contraseña = :pass";
//$stmt = $this->prepare($query);
//$stmt->bindParam(':user', $User, PDO::PARAM_STR);
//$stmt->bindParam(':pass', $Pass, PDO::PARAM_STR);
//$stmt->execute();

					$User = $_POST['emailLog'];
				$contra = $_POST['passLog'];
				
				$query = "SELECT Id_Usuario,Correo, Contraseña FROM usuarios WHERE Correo = :user AND Contraseña = :pass";
				$kevin = $kevin->prepare($query);
				$kevin->bindParam(':user', $User, PDO::PARAM_STR);
				$kevin->bindParam(':pass', $contra, PDO::PARAM_STR);
				//$kevin->execute();
				echo ($query);

				$result = $kevin->execute();
				echo json_encode($result);
	
				if ($result == true) {
					if ($kevin->rowCount() == 1) {
						// code...
						$_SESSION['usuario'] = $User;
						header("Location: ../index.html");
						exit();
					}
					else
					{
						$error = "Credenciales Incorrectas";
					header("Location: ../login.html");
					exit();
					
					}
					
				
				}else{
					
				}


			return $query;
			}
	}

	
}

if ($_POST['botonLog'] > 0) {
		$obj = new DemoraAPI();
		$obj->login();
		// code...
	}
?>

