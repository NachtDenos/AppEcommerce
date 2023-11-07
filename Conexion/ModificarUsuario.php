<?php

include_once 'ConexionPDP.php';

class ModifyAPI extends DB
{
    function ModificarPerfilUsuario($Nombre, $Usuario, $Contrasena, $Genero, $Visibility, $Correo)
    {
        $conn = $this->connectDB();
/*
        if(isset($_FILES["imagenForm2"]))
        {
            $imagen = file_get_contents($_FILES["imagenForm2"]["tmp_name"]);
            $imagenBlob = base64_encode($imagen);
        }
        else
        {
            echo "El campo de imagen no se envió correctamente.";
        }
*/
        $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ?, Visibilidad = ? where Correo = ?";
        $stament = $conn->prepare($sql);
        $stament->bindParam(1, $Nombre, PDO::PARAM_STR);
        $stament->bindParam(2, $Contrasena, PDO::PARAM_STR);
        $stament->bindParam(3, $Usuario, PDO::PARAM_STR);
        $stament->bindParam(4, $Genero, PDO::PARAM_STR);
        $stament->bindParam(5, $Visibility, PDO::PARAM_STR);
        $stament->bindParam(6, $Correo, PDO::PARAM_STR);
        if($stament->execute())
        {
            echo "Working Code";
            //echo $stament;
            header("Location: ../login.php");
        }
        else
        {
            header("Location: ../ModificarPerfil.php");
            echo "Error al modificar usuario: " . $stmt.error;
        }


        $query = "SELECT Id_Usuario,Correo, Contraseña,
				ImagenPerfil, Nombre, Usuario
				Sexo, Visibilidad, 
				Rol  FROM usuarios WHERE Correo = :user ";
				$conn = $conn->prepare($query);
				$conn->bindParam(':user', $Correo, PDO::PARAM_STR);
				$conn->execute();
				echo ($query);

				
				

				$result = $conn->fetch(PDO::FETCH_ASSOC);   

        
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
						
        
		$conn->closeConnection();


    }

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
            header("Location: ../perfil.php");
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
$visibilidad = $_POST['rolR'];
$nombeComple = $_POST['nameR'];
//$birthDate = $_POST['dateR'];
$gender = $_POST['genderR'];
//$pic = $_POST['imagen'];

if ($_POST['RegButton'] > 0) {
	$obj = new ModifyAPI();
    $obj->ModificarPerfilUsuario($nombeComple, $Username, $password, $gender, $visibilidad, $Email);
	//$obj->ModificarUser($nombeComple, $Username, $password, $gender, $Email);
	// code...
}


?>