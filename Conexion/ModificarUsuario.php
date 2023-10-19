<?php

include_once 'ConexionPDP.php';

class ModifyAPI extends DB
{
    function ModificarUser($Usuario, $Nombre, $Contrasena, $Correo)
    {
        $conn = $this->connectDB();

        $sql = "UPDATE usuarios SET Nombre = ?, Contraseña = ?, Usuario = ?, Sexo = ? where Correo = ?";
        $stament = $conn->prepare($sql);
        $stament->bindParam(1, $Nombre, PDO::PARAM_STR);
        $stament->bindParam(2, $Contrasena, PDO::PARAM_STR);
        $stament->bindParam(3, $Usuario, PDO::PARAM_STR);
        $stament->bindParam(4, $Sexo, PDO::PARAM_STR);
        $stament->bindParam(5, $Correo, PDO::PARAM_STR);
        $if($stament->execute())
        {
            echo "Working Code";
            header("Location: ../")
        }




    }
}

?>