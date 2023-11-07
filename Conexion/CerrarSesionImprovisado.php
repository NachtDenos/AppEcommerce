<?php 
	class CerrarSesionButton{

		function borrarSesion()
		{

 				  if (isset($_SESSION['usuario'])) {
                 unset($_SESSION['usuario']); // Esto vaciará la variable de sesión 'usuario'
              }
              header("Location: ../Login.php");
              exit();
		}
	}


	$obj = new CerrarSesionButton();
	$obj->borrarSesion();
 ?>