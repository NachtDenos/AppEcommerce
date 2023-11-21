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

class VentasAPICarrito extends DB
{   

    function GenerarVentaProducto($IdComprador, $TarjetaNumero)
    {
        $conn = $this->connectDB();

        $sql = "Call VentaProductoCarrito(:IdComprador, :NumeroTarjeta);";
        $statement = $conn->prepare($sql);

        $statement->bindParam(':IdComprador', $IdComprador, PDO::PARAM_STR);
        $statement->bindParam(':NumeroTarjeta', $TarjetaNumero, PDO::PARAM_STR);
        
        if ($statement->execute()) {
            echo "Working Code";
            header("Location: ../PantallasPHP/dashboard.php");
        } else {
            header("Location: ../PantallasPHP/pago.php");
        }
        $conn->closeConnection();
    }

}



if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'comprar':
            $IdUsuario = $_POST['idUsuario'];
            $numetoTarjeta = $_POST['numCard'];


            $categoriaObj = new VentasAPICarrito();
            $categoriaObj->GenerarVentaProducto($IdUsuario, $numetoTarjeta);
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