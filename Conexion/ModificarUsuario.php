<?php
  session_start();

 
if(isset($_SESSION['usuario']))
{
 $usuario = $_SESSION['usuario'];
}
else
{
 header("Location: ../PantallasPHP/login.php");
 exit();
}


include_once 'ConexionPDP.php';
include_once 'LoginUsuario.php';

class ModifyAPI extends DB
{
    function ModificarPerfilUsuario($Nombre, $Usuario, $Contrasena, $Genero, $Visibility, $Correo, $CorreoActual)
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

        //  $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ?, Visibilidad = ? where Correo = ?";
        $sql = "Call UpdateUsuarios(:UsuarioNuevo, :NombreNuevo, :ContraNueva, :SexoNuevo, :Visibilidad, :CorreoNuevo, :CorreoActual);";
        $stament = $conn->prepare($sql);
        //Se ejecutan los parametros en el orden establecido en la DB
        $stament->bindParam(':UsuarioNuevo', $Usuario, PDO::PARAM_STR);
        $stament->bindParam(':NombreNuevo', $Nombre, PDO::PARAM_STR);
        $stament->bindParam(':ContraNueva', $Contrasena, PDO::PARAM_STR);
        $stament->bindParam(':SexoNuevo', $Genero, PDO::PARAM_STR);
        $stament->bindParam(':Visibilidad', $Visibility, PDO::PARAM_STR);
        $stament->bindParam(':CorreoNuevo', $Correo, PDO::PARAM_STR);
        $stament->bindParam(':CorreoActual', $CorreoActual, PDO::PARAM_STR);
        //$stament->bindParam(':RolNuevo', $Rol, PDO::PARAM_STR);
        if($stament->execute())
        {
            echo "Working Code";
            //echo $stament;
           
            header("Location: ../PantallasPHP/perfil.php");
            return true;
        }
        else
        {
            
            header("Location: ../PantallasPHP/ModificarPerfil.php");
            echo "Error al modificar usuario: " . $stmt.error;
            return false;
        }

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
$correoActual = $usuario['Mail'];

if ($_POST['ModButton'] > 0) {
	$obj = new ModifyAPI();
    $Obj2 = new DemoraAPI();
    $Success;
    $Success = $obj->ModificarPerfilUsuario($nombeComple, $Username, $password, $gender, $visibilidad, $Email, $correoActual);
    if($Success){
        $Obj2->loginUsuarioParam($Email, $password);
    }
	//$obj->ModificarUser($nombeComple, $Username, $password, $gender, $Email);
	// code...
}


?>