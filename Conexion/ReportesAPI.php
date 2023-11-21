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

class ReportesAPI extends DB
{   

function ReporteVenta($IdUsuario, $Fecha1, $Fecha2)
{
        
    $conn = $this->connectDB();

    $sql = "Call ReporteVentas(:VIdUsuario, :Fecha1, :Fecha2);";
    $statement = $conn->prepare($sql);

    $statement->bindParam(':VIdUsuario', $IdUsuario, PDO::PARAM_STR);
    $statement->bindParam(':Fecha1', $Fecha1, PDO::PARAM_STR);
    $statement->bindParam(':Fecha2', $Fecha2, PDO::PARAM_STR);
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

function ObtenerReporte($param, $param1, $param3)
{
    $consulta = new ReportesAPI();
    $res = $consulta->ReporteVenta($param, $param1,$param3);
   
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


if(isset($_get['action']))
{
    $action = $_et['action'];
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

