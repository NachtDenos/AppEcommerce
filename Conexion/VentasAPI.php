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

    $statement->bindParam(':IdComprador', $PaymentId, PDO::PARAM_STR);
    $statement->bindParam(':IdCompra', $PayerId, PDO::PARAM_STR);
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

function GenerarVentaPayPal($NombreProducto, $IdComprador, $CantidadComprar, $Precio)
{
        
    $conn = $this->connectDB();

    $sql = "Call GenerarVentaSinPaypal(:IdProducto, :IdComprador, :CantidadComprar, :Precio);";
    $statement = $conn->prepare($sql);

    $statement->bindParam(':IdProducto', $NombreProducto, PDO::PARAM_STR);
    $statement->bindParam(':IdComprador', $IdComprador, PDO::PARAM_STR);
    $statement->bindParam(':CantidadComprar', $CantidadComprar, PDO::PARAM_STR);
    $statement->bindParam(':Precio', $Precio, PDO::PARAM_STR);
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
        case 'comprarpaypal':
            echo '<br>';
            echo 'Venta Producto';
            echo '<br>';
            $IdPayPal = $_POST['IdPaypal'];
            echo ($IdPayPal);
            echo '<br>';
            $PayerId = $_POST['PayPalPayerId'];
            echo ($PayerId);
            echo '<br>';
            $IdProd = $_POST['ProductId'];
            echo ($IdProd);
            echo '<br>';
            $idU = $usuario['id'];
            echo ($idU);
            echo '<br>';
            $Total = $_POST['PrecioTotal'];
            echo ($Total);
            echo '<br>';
            //$NombreProd = $_POST['NombreProducto'];
            //echo ($NombreProd);
            echo '<br>';
            $cantProductoCompra = $_POST['CantidadProd'];
            echo ($cantProductoCompra);
            echo '<br>';
    
            $categoriaObj = new VentasAPI();
            $categoriaObj->DatosPayPalInsert($IdPayPal, $PayerId);
            $categoriaObj->GenerarVentaPayPal($IdProd, $idU, $cantProductoCompra, $Total);

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