<?php

include_once 'ConexionPDP.php';

class ModifyAPI extends DB
{
    function ModificarUser($Nombre, $Usuario, $Contrasena, $Genero, $Correo)
    {
        $conn = $this->connectDB();

        $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ? where Correo = ?";
        $stament = $conn->prepare($sql);
        $stament->bindParam(1, $Nombre, PDO::PARAM_STR);
        $stament->bindParam(2, $Contrasena, PDO::PARAM_STR);
        $stament->bindParam(3, $Usuario, PDO::PARAM_STR);
        $stament->bindParam(4, $Genero, PDO::PARAM_STR);
        $stament->bindParam(5, $Correo, PDO::PARAM_STR);
        if($stament->execute())
        {
            echo "Working Code";
            //echo $stament;
            header("Location: ../perfil.html");
        }
        else
        {
            header("Location: ../ModificarPerfil.php");
            echo "Error al modificar usuario: " . $stmt.error;
        }
        
        
		$conn->closeConnection();


    }
}


$Email = $_POST['email'];
$Username = $_POST['nameuR'];
$password = $_POST['passR'];
//$visibilidad = $_POST['rolR'];
$nombeComple = $_POST['nameR'];
//$birthDate = $_POST['dateR'];
$gender = $_POST['genderR'];


if ($_POST['RegButton'] > 0) {
	$obj = new ModifyAPI();
	$obj->ModificarUser($nombeComple, $Username, $password, $gender, $Email);
	// code...
}


?>