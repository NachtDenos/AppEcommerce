<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Listas | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/carrito.css">
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
    <br> <br> <br> <br> <br>
    <h1 class="marginlef"><a><img src="../Imagenes/carritoBlack.png" width="45px"></a>Lista 1</h1>
    <p class="marginlef">Es mi primer lista, que emoción.</p>
    <p class="marginlef letra-peque">Pública</p>
    <div class="cont">
        <div class="row">
            <div class="col">
                <table class="table table-hover table-rounded">
                    <tbody>
                      <tr>
                        <td class="imagen-celda"><img class="imagen-carrito" src="../Imagenes/agua.png"></td>
                        <td>
                            <div>
                                <div>
                                    <h3>Botella de Agua</h3>
                                    <h6>Vendido por: Paco Jimenez</h6>
                                    <h6>$200.00</h6>
                                    <p>Es un agua muy cara pero tambien muy refrescante, ayuda mucho a la piel porque te hace no comer comida chatarra ya que te deja sin dinero.</p>
                                    <p class="letra-peque">Disponible: 9 Articulos</p>
                                </div>
                                <div>
                                    <input class="btn btn-compra" type="submit" value="Agregar al carrito">
                                    <input class="btn btn-compra" type="submit" value="Eliminar">
                                </div>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="imagen-celda"><img class="imagen-carrito" src="../Imagenes/agua.png"></td>
                        <td>
                            <div>
                                <div>
                                    <h3>Botella de Agua</h3>
                                    <h6>Vendido por: Paco Jimenez</h6>
                                    <h6>$200.00</h6>
                                    <p>Es un agua muy cara pero tambien muy refrescante, ayuda mucho a la piel porque te hace no comer comida chatarra ya que te deja sin dinero.</p>
                                    <p class="letra-peque">Disponible: 9 Articulos</p>
                                </div>
                                <div>
                                    <input class="btn btn-compra" type="submit" value="Agregar al carrito">
                                    <input class="btn btn-compra" type="submit" value="Eliminar">
                                </div>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="imagen-celda"><img class="imagen-carrito" src="../Imagenes/agua.png"></td>
                        <td>
                            <div>
                                <div>
                                    <h3>Botella de Agua</h3>
                                    <h6>Vendido por: Paco Jimenez</h6>
                                    <h6>$200.00</h6>
                                    <p>Es un agua muy cara pero tambien muy refrescante, ayuda mucho a la piel porque te hace no comer comida chatarra ya que te deja sin dinero.</p>
                                    <p class="letra-peque">Disponible: 9 Articulos</p>
                                </div>
                                <div>
                                    <input class="btn btn-compra" type="submit" value="Agregar al carrito">
                                    <input class="btn btn-compra" type="submit" value="Eliminar">
                                </div>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div>

        </div>
    </div>
    <br>
    <footer class="text-white">
        <div class="text-center p-3" style="background-color: #252323">
            <p>Pagina creada por:</p>
            <p>Edson Eduardo Arguello Tienda & Isaac Espinoza Morales</p>
            <p>LMAD | UANL</p>
        </div>
    </footer>
</body>
</html>