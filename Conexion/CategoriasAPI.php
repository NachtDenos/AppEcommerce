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
class CategoriasAPI extends DB
{   
    function ObtenerCategorias()
    {
        $kevin = $this->connectDB();


        $query = "Call GetCategorias();";
        $kevin = $kevin-prepare($query);
        $kevin->execute();

        $result = $kevin->fetch(PDO::FETCH_ASSOC);


        if ($result == true) {
           
                $obj = array(
                    "IdCat" => $result['categoryID'],
                    "Nombre Categoria" => $result['name']
                );
                

                $_SESSION['Categoria'] = $obj;
                
                

                header("Location: ../PantallasPHP/newProducto.php");
                exit(); 
        }else{
            $error = "Hubo un problema";
            
            header("Location: ../PantallasPHP/CrearCategoria.php");
            
        exit();
            
        }
        return $query;
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

            //header("Location: ../PantallasPHP/newProducto.php");

        }
        else
        {
           // header("Location: ../PantallasPHP/newProducto.php");
        }
        $conn->closeConnection();
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