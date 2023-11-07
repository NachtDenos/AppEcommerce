<?php
	include_once 'ConexionPDP.php';


	class DemoraAPI extends DB{

		function login(){

			 $kevin = $this->connectDB();
			 
			//Pasar el login, a esta parte
				if (isset($_SESSION['usuario'])) {
				header("Location: index.php");
				exit();
				}
				session_start();
				
				//Iniciamos la sesion que podremos usar de manera global en el programa

				$_SESSION['Usuario'] = 'Kevin';

				if (isset($_POST['botonLog']))
				{

				$User = $_POST['emailLog'];
				$contra = $_POST['passLog'];
				
				$query = "SELECT Id_Usuario,Correo, Contraseña,
				ImagenPerfil, Nombre, Usuario
				Sexo, Visibilidad, 
				Rol  FROM usuarios WHERE Correo = :user AND Contraseña = :contra";
				$kevin = $kevin->prepare($query);
				$kevin->bindParam(':user', $User, PDO::PARAM_STR);
				$kevin->bindParam(':contra', $contra, PDO::PARAM_STR);
				$kevin->execute();
				echo ($query);

				
				

				$result = $kevin->fetch(PDO::FETCH_ASSOC);
				//echo json_encode($result);
	
				if ($result == true) {
					//if ($kevin->rowCount() == 1) 		{
						// code...

						//$_FetchData = $result->fetch(PDO::FETCH_ASSOC);

						$obj = array(
							"id" => $result['Id_Usuario'],
							"Mail" => $result['Correo'],
							"Pass" => $result['Contraseña'],
							"Img" => $result['ImagenPerfil'],
							"Nombre" => $result['Nombre'],
							"User" => $result['Usuario'],
							"Sex" => $result['Sexo'],
							"Visibilidad" => $result['Visibilidad'],
							"RolUsuario" => $result['Rol']
						);
						

						$_SESSION['usuario'] = $obj;
						
						

						header("Location: ../PantallasPHP/dashboard.php");
						exit();
				//	}
					//else
					//{
					
					//}
					
				
				}else{
					$error = "Credenciales Incorrectas";
					
					header("Location: ../PantallasPHP/login.php");
					
					//header("Location: ../login.html");
					
				exit();
					
				}


			return $query;
			}
	}

	
}
//Fin de la Clase

if ($_POST['botonLog'] > 0) {
		$obj = new DemoraAPI();
		$obj->login();
		// code...
	}
?>

