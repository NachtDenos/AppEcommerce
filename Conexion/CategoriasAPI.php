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
include_once 'CategoriasAPI.php';
//Ya tengo el SP para crear categorias.

class CategoriasAPI extends DB
{   
    //El problema si marca error de caracteres es la funcion public construct o el constructor por default
    function ObtenerCategorias()
{
    $kevin = $this->connectDB();
    $query = "Call GetCategorias();";
    $stmt = $kevin->prepare($query);
    $stmt->execute();

    $categorias = array(); // Crear un array para almacenar las categorías

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categorias[] = $result; // Agregar cada categoría al array
    }

    return $categorias;

}

function ObtenerCategorias2()
{
    $kevin = $this->connectDB();
    $query = "Call GetCategorias();";
    $stmt = $kevin->prepare($query);
    $stmt->execute();

    $categorias = array(); // Crear un array para almacenar las categorías

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categorias[] = $result; // Agregar cada categoría al array
    }

    return $categorias;
}

    function CrearCategorias($Nombre, $Descripcion, $Correo)
    {
        
        $conn = $this->connectDB();

        $sql = "Call CrearCategoria(:CategoriaName, :CategoriaDescription, :CorreoLogeado);";
        $statement = $conn->prepare($sql);

        $statement->bindParam(':CategoriaName', $Nombre, PDO::PARAM_STR);
        $statement->bindParam(':CategoriaDescription', $Descripcion, PDO::PARAM_STR);
        $statement->bindParam(':CorreoLogeado', $Correo, PDO::PARAM_STR);
        if($statement->execute())
        {
            echo "Working Code";

            header("Location: ../PantallasPHP/newProducto.php");

        }
        else
        {
           header("Location: ../PantallasPHP/newProducto.php");
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
        case 'insert':
            
            echo 'Crear Categoria';
            $NombreCategoria = $_POST['CategoriaName'];
            $DesCategoria = $_POST['CatDescription'];
            $CorreoU = $usuario['Mail'];
            $categoriaObj = new CategoriasAPI();
            $categoriaObj->CrearCategorias($NombreCategoria, $DesCategoria, $CorreoU);
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