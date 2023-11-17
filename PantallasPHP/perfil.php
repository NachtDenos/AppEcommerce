<?php
include_once '../Conexion/ProductosAPI.php';
if(isset($_SESSION['usuario']))
{
 $usuario = $_SESSION['usuario'];
 $Username = $usuario['User'];
}
else
{
 header("Location: ../Pantallas/login.php");
 exit();
}
$imagenBlob = $usuario['Img'];
if ($imagenBlob) {
  // Convierte los datos BLOB a una representación base64
  $imagenBase64 = base64_encode($imagenBlob);
} else {
  // Si no se encontró la imagen, puedes proporcionar una imagen por defecto.
  $imagenBase64 = base64_encode(file_get_contents('../Imagenes/agua.png'));
}

$ObjProd = new ProductosAPI();
$IdUsuarioLogeado = $usuario['id'];
//$JSONProductos = $ObjProd->ObtenerProductosUsuario($usuario['User']);
$JSONProductos = $ObjProd->ObtenerProductosUsuario($IdUsuarioLogeado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/perfil.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navColor static">
                <div class="col alingImage">
                    <a class="navbar-brand" href="dashboard.php"><img src="../Imagenes/ElNegociosLogo.png" alt="logo" width="70px" class="rounded-circle"></a>
                </div>
                <button type="button" class="btn btn-dark"><a><img src="../Imagenes/filtro.png" alt="logo" width="23px" class="rounded-circle"></a></button>
                <div class="col alingFlex">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="btn  btn-dark" type="submit"><a><img src="../Imagenes/lupa.png" alt="logo" width="23px" class="rounded-circle"></a></button>
                      </form>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <a><img src="../Imagenes/menu.png" alt="logo" width="23px" class="rounded-circle"></a>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="listas.php">Mis Listas</a></li>
                      <li><a class="dropdown-item" href="newProducto.php">Ventas</a></li>
                      <li><a class="dropdown-item" href="ReporteVentas.php">Consulta de Ventas</a></li>
                      <li><a class="dropdown-item" href="PedidosRealizados.php">Pedidos</a></li>
                      <li><a class="dropdown-item" href="productosActuales.php">Stock</a></li>
                      <li><a class="dropdown-item" href="adminCheck.php">Aceptar Productos</a></li>
                    </ul>
                  </div>
                <div class="col alingFlex">
                  <a href="carrito.php"><button type="button" class="btn btn-dark"><img src="../Imagenes/carrito.png" alt="logo" width="40px" class="rounded-circle"></button></a>  
                  <a class="navbar-brand" href="perfil.php"><img src="../Imagenes/iconBlack.png" alt="logo" width="70px" class="rounded-circle"></a>
                </div> 
        </nav>
    </div>
    <br> <br> <br> <br>
    <div class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                  <img src="data:image/jpeg;base64, <?php echo $imagenBlob; ?>" alt="img-avatar">
                   <!-- <img src="Imagenes/iconBlack.png" alt="img-avatar"> -->
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h1 class="titulo"> <?php echo $usuario['Nombre']; ?>
                  <a class="navbar-brand" href="ModificarPerfil.php"><img src="../Imagenes/Edit.png" alt="logo" width="25px" class="rounded-circle"></a>
                </h1>
                <div class="row" style="width: 100%;">
                    <div class="col">
                        <p> <img src="../Imagenes/carritoBlack.png" width="30px"><?php if($usuario['Visibilidad'] == 0)
                        {
                          echo "Vendedor";
                        } 
                        else
                         echo "Usuario";?></p>
                    </div>
                    <div class="col">
                        <p><?php if($usuario['RolUsuario'] == 0)
                        {
                          echo "Publico";
                        } 
                        else if($usuario['RolUsuario'] == 1)
                        {
                         echo "Privado";
                        }else
                        {
                          echo "Admin";
                        }
                        ?> <img src="../Imagenes/publico.png" width="30px"> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1>Productos/Listas</h1>
    <div class="container margen d-flex row-right-product">
        <div class="row">
             <?php
                              if ($JSONProductos !== false) {
                               


                              // Itera sobre los productos y construye la estructura HTML deseada
                              foreach ($JSONProductos as $producto) {
                                $imageBlob = $producto['Foto'];
                                $image = base64_encode($imageBlob);
                                $imageExt = $producto['Foto'];
                                /*
                                $fotoBase64 = base64_encode($producto['Foto']);
                                $tipoContenido = 'image/jpeg'; // Ajusta según el tipo de imagen almacenada
                                $imagenSrc = 'data:' . $tipoContenido . ';base64,' . $fotoBase64;
                                */
                                  echo '<div class="col alingFlex row-right-product">';
                                    echo '<div class="card text-center estilo-card" style="width: 15rem" value="' . $producto['Id_Productos'] .'">';
                                    echo '<img src="' . ($imageBlob ? 'data:image/'.$imageExt.';base64,'.$image : '../Imagenes/agua.png') . '" class="card-img-top" style="height: 10rem;">';
                                        echo '<div class="card-body">';
                                         echo '<a href="editProducto.php" class="product-name">';
                                          echo '<h5 class="card-title">' . $producto['NombreProd'] . '</h5>';
                                           //echo '<h2>' . $producto['Id_Productos'] . '</h2>';
                                  // Agrega aquí otras etiquetas HTML con los datos necesarios
                                            echo '<p class="card-text">'. '$' . $producto['Precio'] . '</p>';
                                         echo '</a>';
                                        echo '</div>';
                                    echo '</div>';
                                  echo '</div>';
                              }
                          } else {
                              // Maneja el caso en que la obtención de datos falla
                              echo "Error en la obtención de productos";
                          }
                          ?>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <img src="../Imagenes/agua.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="producto.php" class="product-name">
                        <h5 class="card-title">Botella de agua.</h5>
                        <p class="card-text">$200.00</p>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-white">
        <div class="text-center p-4" style="background-color: #252323">
            <p>Pagina creada por:</p>
            <p>Edson Eduardo Arguello Tienda & Isaac Espinoza Morales</p>
            <p>LMAD | UANL</p>
        </div>
    </footer>
</body>
</html>