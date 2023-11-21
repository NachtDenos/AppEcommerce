<?php
 session_start();

 if(isset($_SESSION['usuario']))
 {
  $usuario = $_SESSION['usuario'];
 }
 else
 {
  header("Location: login.php");
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Estilos/dashboard.css">
    <script src="../ProcJS/ObtenerProductosDashboard.js"></script>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navColor static">
                <div class="col alingImage">
                    <a class="navbar-brand" href="dashboard.php"><img src="../Imagenes/ElNegociosLogo.png" alt="logo" width="70px" class="rounded-circle"></a>
                </div>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><a><img src="../Imagenes/filtro.png" alt="logo" width="23px" class="rounded-circle"></a></button>
                <div class="col alingFlex">
                  <form id="formBusqueda" class="d-flex" role="search" action="dashboardBusqueda.php" method="get">
                        <input id="ContenedorSearch" name="Buscador" class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" data-TextoSearch="">
                        <button class="btn btn-dark" type="submit"><a><img src="../Imagenes/lupa.png" alt="logo" width="23px" class="rounded-circle"></a></button>
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
                      <li><a class="dropdown-item" href="Pedidos.php">Mis Pedidos</a></li>
                    </ul>
                  </div>
                <div class="col alingFlex">
                  <a href="carrito.php"><button type="button" class="btn btn-dark"><img src="../Imagenes/carrito.png" alt="logo" width="40px" class="rounded-circle"></button></a>
                  <a class="navbar-brand" href="perfil.php"><img src=" data:image/jpeg;base64,  <?php echo $imagenBase64; ?>" alt="logo" width="70px" class="rounded-circle"></a>
                </div> 
        </nav>
    </div>
    <br> <br> <br> <br>
    <div>
        <h1><a><img src="../Imagenes/carritoBlack.png" width="45px"></a>Recomendados</h1>
    </div>
    <div class="container margen d-flex row-right-product" id="CardContenedor">
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
        <div class="row">
            <div class="col alingFlex">
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
    <hr>
    
    <footer class="text-white">
        <div class="text-center p-2" style="background-color: #252323">
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
                  <h2 id="exampleModalLabel">Busqueda Avanzada</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="contenido-form">
                        <input class="input-modal" type="text" name="searchA" placeholder="Buscar" id="searchA">
                        
                      <h4>Filtros:</h4>

                        <label for="precioModal">Precio</label>
                        <select id="precioModal" name="precioModal">
                            <option value="">Ninguno</option>
                            <option value="maxPre">Mayor Precio</option>
                            <option value="minPre">Menor Precio</option>
                        </select>

                        <label for="califModal">Calificación</label>
                        <select id="califModal" name="califModal">
                            <option value="">Ninguno</option>
                            <option value="maxCalif">Mejor Calificación</option>
                            <option value="minCalif">Menor Calificación</option>
                        </select>

                        <label for="vendModal">Vendidos</label>
                        <select id="vendModal" name="vendModal">
                            <option value="">Ninguno</option>
                            <option value="maxVend">Más Vendidos</option>
                            <option value="minVend">Menos Vendidos</option>
                        </select>
    
                    </div>
                </div>
                <div class="modal-footer">
                  <input class="btn btn-modal" type="submit" value="Buscar">
                </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content fondo-modal">
          <form>
              <div class="modal-header">
                  <h2 id="exampleModal2Label">Busqueda Avanzada</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                  <input class="btn btn-modal" type="submit" value="Buscar">
                </div>
          </form>
        </div>
      </div>
    </div>


</body>
</html>