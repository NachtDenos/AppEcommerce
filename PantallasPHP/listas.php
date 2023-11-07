<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/listas.css">
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
    <div>
        <h1><a><img src="../Imagenes/carritoBlack.png" width="45px"></a>Listas</h1>
        
    </div>
    <div class="text-start">
        <input class="btn btn-compra" type="submit" value="Crear Lista" data-bs-toggle="modal" data-bs-target="#exampleModal">
    </div>
    <div class="container margen d-flex row-right-product">
        <div class="row">
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col alingFlex row-right-product">
                <div class="card text-center estilo-card" style="width: 15rem">
                    <input class="btn text-end btn-delete-lista" type="submit" value="X">
                    <img src="../Imagenes/lista.png" class="card-img-top" style="height: 10rem;">
                    <div class="card-body">
                      <a href="miLista.php" class="product-name">
                        <h5 class="card-title card-title-product">Lista 1.</h5>
                        <p class="card-text card-title-product">Es mi primer lista, que emoción.</p>
                      </a>
                    </div>
                </div>
            </div>
            
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
                  <h2 id="exampleModalLabel">Crear Lista</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="contenido-form">
                        <label for="nameL">Nombre de la lista</label>
                        <input class="input-modal" type="text" name="nameL" placeholder="Lista" id="nameL">
                        
                        <label for="descL">Descripción</label>
                        <input class="input-modal" type="text" name="descL" placeholder="Descripción" id="descL">
                        
                        <label for="privL">Privacidad</label>
                        <select id="privL" name="privL">
                            <option value="" disabled selected>Selecciona la privacidad de la lista</option>
                            <option value="pub">Publica</option>
                            <option value="priv">Privada</option>
                        </select>
    
                        <div class="imageinput">
                            <label for="imagenL">Selecciona una imagen para la lista: (Opcional)</label>
                            <input class="input-modal" type="file" id="imagenL" name="imagenL" accept="image/*">
                        </div>
    
                    </div>
                </div>
                <div class="modal-footer">
                  <input class="btn btn-modal" type="submit" value="Agregar">
                </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>