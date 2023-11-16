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

class ProductosAPI extends DB
{
    
}


?>