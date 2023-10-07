<?php 

	include_once 'Consulta.php';
	include_once 'DemoraAPI.php';


	class Login{

		function obtenerUsuario()
		{
			//Instanciamos la clase
			$Usuario = new DemoraAPI();
			$arrregloUsuario = array();
			$arrregloUsuario["Resultados"] = array();

			$resul = $Usuario->login('Isaacpro553@gmail.com', '1234567' );

			if ($resul != NULL) {
				
				while ($row = $resul->fetch(PDO::FETCH_ASSOC)) {
					$obj = array(
					"id" => $row['Id_Usuario'],
					"Usuario" => $row['Usuario'],
					"Correo" => $row['Correo']
				);

					array_push($arrregloUsuario["Resultados"], $obj);

				}	
				echo json_encode($arrregloUsuario);

			}
			else
			{
				echo json_encode(array('mensaje' => 'No hay elementos'));
			}

		}
		//Pasar todo esto, al DemoraApi
		function LoginUsuario()
		{

			$User = $_POST['emailLog'];
			$contra = $_POST['passLog'];	
			session_start();
		
			$DemoraInst = new DemoraAPI();

			if (isset($_SESSION['usuario'])) {
				header("Location: index.html");
				exit();
			}
			
			if ($isset($_POST['submit'])) 
			{
				

			$result = $DemoraInst->login($User, $contra);

			

			if ($result->rowCount() == 1) {
				$_SESSION['usuario'] = $User;
				header("Location: index.php");
				exit();
				
			}else{
				$error = "Credenciales Incorrectas";
				header("Location: ../login.html");
				exit();
				}
			}
			$DemoraInst->closeConnection();
		}

	}

	function LoginGpt()
	{
		session_start();
	require_once("ConexionPDP.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["emailLog"];
    $contrasena = $_POST["passLog"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Inicio de sesión exitoso
            $row = mysqli_fetch_assoc($result);
            $_SESSION["usuario_id"] = $row["id"];
            $_SESSION["usuario_nombre"] = $row["nombre"];
            header("Location: inicio.php"); // Redirige a la página de inicio
            exit();
        } else {
            $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    } else {
        $error_message = "Error en la consulta: " . mysqli_error($conexion);
   			 }
		}
	}

	//Afuera de la clase para no loopearla
	//$objeto = new nombres();
	
	//$objeto->obtenerUsuario();
			
	//echo '<script> window.onload = function(){
	//	console.log("'.$objeto->obtenerUsuario().'");
	//};</script>';

?>

