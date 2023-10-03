<?php 

	include_once 'Consulta.php';

	class nombres{

		function obtenerNombres()
		{
			$nombres = new consulta();
			$arrNombres = array();
			$arrNombres["Resultados"] = array();

		$res = $nombres->getNames($_POST['id']);

		if($res != NULL)
		{
			while($row = $res->fetch(PDO::FETCH_ASSOC))
			{
				$obj = array(
					"id" => $row['Id_Usuario'],
					"Usuario" => $row['Usuario'],
					"Correo" => $row['Correo']
				);

				array_push($arrNombres["Resultados"], $obj);
			}
			echo json_encode($arrNombres);
			
		}else
			{
				echo json_encode(array('mensaje' => 'No hay elementos'));
			}
		}
	}
	if($_POST['id'] > 0)
	{
		$obj = new nombres();
		$obj->obtenerNombres();
	}
	else
	{
		echo "no submit";
	}
	

?>