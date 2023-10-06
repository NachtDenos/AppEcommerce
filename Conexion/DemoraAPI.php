<?php
	include_once 'ConexionPDP.php';


	class DemoraAPI extends DB{
		function login(string $Correo, string $Pass){
			//$querie ="SELECT Correo, Contraseña, Usuario, ImagenPerfil, Nombre, ApellidoP, ApellidoM, Sexo, Rol 
			////	WHERE Correo = '".$Correo."'
			//	AND Contraseña = '"$password"'";

				$query = $this->connect()->query("SELECT Id_Usuario,Correo, Contraseña, Usuario, ImagenPerfil, Nombre, ApellidoP, ApellidoM, Sexo, Rol 
					FROM usuarios 
					WHERE Correo = '".$Correo."'
					AND Contraseña = '".$Pass."'"
					);

			return $query;
		}
	}
?>

