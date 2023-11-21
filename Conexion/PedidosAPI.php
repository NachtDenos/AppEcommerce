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

class PedidosAPI extends DB
{   

function ObtenerPedidos($IdUsuario)
{
        
    $conn = $this->connectDB();

    $sql = "Call PedidosRealizados(:IdUsuario);";
    $statement = $conn->prepare($sql);

    $statement->bindParam(':IdUsuario', $IdUsuario, PDO::PARAM_STR);
    if($statement->execute())
    {
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        //echo "Working Code";
//header("Location: ../PantallasPHP/ReportesVentas.php");
    }
    else
    {
        header("Location: ../PantallasPHP/dashboard.php");
        return array();
    }
    //$conn->closeConnection();
}

}

function ObtenerReporte($param)
{
    $consulta = new PedidosAPI();
    $res = $consulta->ObtenerPedidos($param);
   
    if ($res) {
        // Verifica si $res es un arreglo antes de llamar a fetchAll
       
        return $res;
        
    } else {
        // Manejo de error si ObtenerProductosAprovados() devuelve false
        return array('error' => 'Error en la obtención de productos');
    }
}



if(isset($_POST['action']))
{
    $action = $_POST['action'];
    echo($action);
    
    switch($action)
    {
        case '0':
            $idU = $usuario['id'];
            $jsonResponse = ObtenerReporte($idU);
            echo json_encode($jsonResponse);
            break;
            //Fui al baño
    }

}


if(isset($_get['action']))
{
    $action = $_get['action'];
    echo($action);
    
    switch($action)
    {
        case '0':
            $idU = $usuario['id'];
            //echo ($idU);
            $Fecha1 = $_POST['Fecha1'];
            //echo ($Fecha1);
            $Fecha2 = $_POST['Fecha2'];
            //echo ($Fecha2);
            $jsonResponse = ObtenerReporte($idU, $Fecha1, $Fecha2);
            echo json_encode($jsonResponse);
            break;
            //Fui al baño
    }

}

