<?php
 include_once '../Conexion/CategoriasAPI.php'; //Aqui ya inicio la sesion
 if(isset($_SESSION['usuario']))
 {
  $usuario = $_SESSION['usuario'];
 }
 else
 {
  header("Location: ../PantallasPHP/login.php");
  exit();
 }
 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | El Negocios</title>
    <link rel="stylesheet" href="../Estilos/forms.css">
    <script src="https://kit.fontawesome.com/baf3df8175.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="formato-form-registro" id="formRegister" action="../Conexion/CategoriasAPI.php?action=insert" method="post" enctype="multipart/form-data">
        <div class="contenido-form-registro columna-izquierda">
            <h2 style="text-align: center;">Crear Categoria</h2>
            <br>
            <br>
            <label for="emailR">Categoria</label>
            <input type="" name="CategoriaName" placeholder="" value="" id="CategoriaName"> 
            
            
            <label for="nameR">Descripcion Categoria</label>
            <input type="text" name="CatDescription" placeholder="" value="" id="CatDescription">
        </div>
        <div class="contenido-form-registro columna-derecha">
            
            <div>
                <img src="../Imagenes/ElNegociosLogo.png" class="img-icon">
            </div>
           

            <input class="btn" type="submit" value="Crear" name="CrearCatButton" id="RegButton">
        </div>
    </form>
</body>
</html>
<?php 


/*
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['CrearCatButton'])) {
    if ($_POST['CrearCatButton'] == 'Post') {
        // Tu lógica de procesamiento aquí
        //$NombreCategoria = $_POST['CategoriaName'];
        //$DesCategoria = $_POST['CatDescription'];
        $NombreCategoria = $_POST['CategoriaName'];

        $DesCategoria = $_POST['CatDescription'];
        $CorreoU = $usuario['Mail'];
        $obj = new CategoriasAPI();
        $obj->CrearCategorias($NombreCategoria, $DesCategoria);
    }
}
*/
/*
$NombreCategoria = $_POST['CategoriaName'];
$DesCategoria = $_POST['CatDescription'];

    if ($_POST['ModButton'] == ['Post']) {
        $obj = new CategoriasAPI();
        $obj->CrearCategorias($NombreCategoria, $DesCategoria);
        
        //$obj->ModificarUser($nombeComple, $Username, $password, $gender, $Email);
        // code...
    }
*/
?>