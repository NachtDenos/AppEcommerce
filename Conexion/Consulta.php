<?php 

	include_once 'ConexionPDP.php';

	class consulta extends DB{
		function getNames(int $id){
			$query = $this->connect()->query('SELECT * FROM usuarios WHERE Id_Usuario = '. $id);

			return $query;
		}
	}

?>