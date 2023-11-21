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
//Ya tengo el SP para crear categorias.

class ChatAPI extends DB
{   

    function ChatSP($opcion, $vendedor, $usuario, $receptor, $emisor, $mensaje)
    {
        $conn = $this->connectDB();

        $sql = "Call Sp_Chat(:vOpcion, :vVendedor, :vUsuario, :vReceptor, :vEmisor, :vMensaje);";
        $statement = $conn->prepare($sql);

        $statement->bindParam(':vOpcion', $opcion, PDO::PARAM_STR);
        $statement->bindParam(':vVendedor', $vendedor, PDO::PARAM_STR);
        $statement->bindParam(':vUsuario', $usuario, PDO::PARAM_STR);
        $statement->bindParam(':vReceptor', $receptor, PDO::PARAM_STR);
        $statement->bindParam(':vEmisor', $emisor, PDO::PARAM_STR);
        $statement->bindParam(':vMensaje', $mensaje, PDO::PARAM_STR);
        
        if ($statement->execute()) {
            echo "Working Code";
            header("Location: ../PantallasPHP/mensajes.php");
        } else {
            header("Location: ../PantallasPHP/dashboard.php");
        }
        $conn->closeConnection();
    }

    function SelectChat($Param)
    {
        $conn = $this->connectDB();
        
        $selectChat = "SELECT Id_Usuario, Nombre from usuarios where Id_Usuario = :user";
        $conn = $conn->prepare($selectChat);
        $conn->bindParam(':user', $Param, PDO::PARAM_STR);
        $conn->execute();
        $resultado = $conn->fetch(PDO::FETCH_ASSOC);
        session_start();
        if($resultado == true)
        {
            $obj = array(
                "IdVen" => $resultado['Id_Usuario'],
                "Name" => $resultado['Nombre']
            );
            

            $_SESSION['Vendor'] = $obj;


            //header("Location: ../PantallasPHP/mensajes.php");
			exit();

        }
        echo ($resultado);
    }


}



if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case '0':
           // $kevin = $this->connectDB();
            $IdVendedor = $_POST['idVendedor'];
            $idU = $usuario['id'];
        
            
            $categoriaObj = new ChatAPI();
            $categoriaObj->ChatSP(0, $IdVendedor, $idU, $IdVendedor, $idU, null);
            $Obj2 = new ChatAPI();
            $res = $Obj2->SelectChat($IdVendedor); 
            echo json_encode($res);



            break;
    }
}

/*
$NombreCategoria = $_POST['CategoriaName'];
$DesCategoria = $_POST['CatDescription'];
$CorreoU = $usuario['Mail'];

    if ($_POST['CrearCatButton'] > 0) {
        $obj = new CategoriasAPI();
        $obj->CrearCategorias($NombreCategoria, $DesCategoria, $CorreoU);
        
        //$obj->ModificarUser($nombeComple, $Username, $password, $gender, $Email);
        // code...
    }

*/
?>