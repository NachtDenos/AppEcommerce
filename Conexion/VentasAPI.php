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

class VentasAPI extends DB
{   

function GenerarVentaProducto($Nombre, $IdComprador, $Cant, $Precio, $TarjetaNumero)
{
        
    $conn = $this->connectDB();

    $sql = "Call VentaProducto(:NombreProducto, :IdComprador, :CantidadComprar, :Precio, :NumeroTarjeta);";
    $statement = $conn->prepare($sql);

    $statement->bindParam(':NombreProducto', $Nombre, PDO::PARAM_STR);
    $statement->bindParam(':IdComprador', $IdComprador, PDO::PARAM_STR);
    $statement->bindParam(':CantidadComprar', $Cant, PDO::PARAM_STR);
    $statement->bindParam(':Precio', $Precio, PDO::PARAM_STR);
    $statement->bindParam(':NumeroTarjeta', $TarjetaNumero, PDO::PARAM_STR);
    if($statement->execute())
    {
        echo "Working Code";

        header("Location: ../PantallasPHP/dashboard.php");

    }
    else
    {
        header("Location: ../PantallasPHP/pago.php");
    }
    $conn->closeConnection();
}

function DatosPayPalInsert($PaymentId, $PayerId)
{
        
    $conn = $this->connectDB();

    $sql = "Call IngresarDatosPayPal(:IdComprador, :IdCompra);";
    $statement = $conn->prepare($sql);

    $statement->bindParam(':IdComprador', $Nombre, PDO::PARAM_STR);
    $statement->bindParam(':IdCompra', $IdComprador, PDO::PARAM_STR);
    if($statement->execute())
    {
        echo "Working Code";

        header("Location: ../PantallasPHP/dashboard.php");

    }
    else
    {
        header("Location: ../PantallasPHP/pago.php");
    }
    $conn->closeConnection();
}

}



if(isset($_GET['action']))
{
    $action = $_GET['action'];
    echo($action);
    
    switch($action)
    {
        case 'comprar':
            echo '<br>';
            echo 'Venta Producto';
            echo '<br>';
            $NombreProd = $_POST['prodCard'];
            echo ($NombreProd);
            echo '<br>';
            $cantidadProducto = $_POST['CantidadCard'];
            echo ($cantidadProducto);
            echo '<br>';
            $precioProducto = $_POST['precioProdCard'];
            echo ($precioProducto);
            echo '<br>';
            $idU = $usuario['id'];
            echo ($idU);
            echo '<br>';
            $numetoTarjeta = $_POST['numCard'];
            echo ($numetoTarjeta);
            echo '<br>';

            $categoriaObj = new VentasAPI();
            $categoriaObj->GenerarVentaProducto($NombreProd, $idU, $cantidadProducto, $precioProducto, $numetoTarjeta);
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