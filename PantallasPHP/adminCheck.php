<?php
 //include_once '../Conexion/CategoriasAPI.php'; //Aqui ya inicio la sesion
 include_once '../Conexion/ProductosAPI.php';
 
 if(isset($_SESSION['usuario']))
 {
  $usuario = $_SESSION['usuario'];

  $rolUser = $usuario['RolUsuario'];

  if($rolUser != 2)
  {
    header("Location: ../PantallasPHP/login.php"); //Si no es admin, regresa al login, para que se logge
  }

 }
 else
 {
  header("Location: ../PantallasPHP/login.php");
  exit();
 }
 $ObjProd = new ProductosAPI();
 $JSONProductos = $ObjProd->ObtenerProductosAprovacion();
 //echo($JSONProductos);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Confirmar | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/adminCheck.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                      <li><a class="dropdown-item" href="newProducto.php">Vender</a></li>
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
    <div class="text-center">
        <h1>Productos por confirmar</h1>
    </div>
    <div class="container margen d-flex row-right-product">
        <div class="row">
          <!--Aqui es para el cuadro del producto -->
                <?php
                          // Verifica si se obtuvieron datos correctamente
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
                                         echo '<a href="#" class="product-name" data-bs-toggle="modal" data-bs-target="#exampleModal">';
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
                <!-- Este es la base para las pestañitas
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <img src="../Imagenes/agua.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="#" class="product-name" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <h5 class="card-title">Botella de agua.</h5>
                        <p class="card-text">$200.00</p>
                      </a>
                    </div>
                </div>
            </div>
                        -->
        </div>
    </div>
    <hr>
   
    <footer class="text-white">
        <div class="text-center p-4" style="background-color: #252323">
            <p>Pagina creada por:</p>
            <p>Edson Eduardo Arguello Tienda & Isaac Espinoza Morales</p>
            <p>LMAD | UANL</p>
        </div>
    </footer>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content fondo-modal">
          <form>
              <div class="modal-header">
                  <h2 id="exampleModalLabel">Autorizar producto</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col">
                        <img src="../Imagenes/agua.png" style="max-width: 200px; min-width: 200px;">
                      </div>
                      <div class="col">
                        <h2>Botella de Agua</h2>
                        <p>Categoría: Botellas</p>
                        <h5>$200.00</h5>
                        <p>Stock: 9 Articulos</p>
                      </div>
                    </div>
                    <div class="row">
                      <hr>
                        <h5>Descripción</h5>
                        <p>Es un agua muy cara pero tambien muy refrescante, ayuda mucho a la piel porque te hace no comer comida chatarra ya que te deja sin dinero.</p>
                    </div>
                </div>
                <div class="modal-footer">
                  <input class="btn btn-modal" type="submit" value="Rechazar">
                  <input class="btn btn-modal" type="submit" value="Autorizar">
                </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>