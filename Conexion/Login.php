<?php 

	include_once 'Consulta.php';
	include_once 'DemoraAPI.php';


	class nombres{
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

	}

	//Afuera de la clase para no loopearla
	$objeto = new nombres();
	
	$objeto->obtenerUsuario();
			


?>

