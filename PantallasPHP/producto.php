<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Producto | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/producto.css">
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

    <div class="container prod-ventana">
        <div class="row">
            <div class="col fondo-imagen">
                <div class="img-cont">
                    <img src="../Imagenes/agua.png" class="main_img">
                </div>
                <div class="thumbnail-cont">
                    <img src="../Imagenes/agua.png" class="thumbnail active">
                    <img src="../Imagenes/agua2.png" class="thumbnail">
                    <img src="../Imagenes/agua3.png" class="thumbnail">
                    <img src="../Imagenes/agua4.png" class="thumbnail">
                </div>
            </div>
            <div class="col" >
                <h1>Botella de Agua</h1>
                <p>Categoría: Botellas</p>
                <p>Puntuación: 6/10</p>
                <hr>
                <h3>$200.00</h3>
                <hr>
                <h2>Descripción</h2>
                <p>Es un agua muy cara pero tambien muy refrescante, ayuda mucho a la piel porque te hace no comer comida chatarra ya que te deja sin dinero.</p>
            </div>
            <div class="col">
                <form class="formato-form">
                    <h1>Compra</h1>
                    <div class="contenido-form">
                        <label for="cantPro">Cantidad</label>
                        <input type="number" name="cantPro" placeholder="Cantidad" id="cantPro">
                    </div>
                    <div>
                        <p>Entrega GRATIS</p>
                        <h4>Disponible: 9 Articulos</h4>
                            <br>
                        <p>Vendidor por: Paco Jimenez</p>
                        <p>Toda compra queda sujeta a los terminos y condiciones en caso de extravio o algun percance.</p>
                        
                    </div>
                    <div class="other-register">
                        <button class="btn btn-compra" type="submit" formaction="pago.php">
                            Comprar
                        </button>
                        <button class="btn btn-compra" type="submit" formaction="carrito.php">
                            Añadir al carrito
                        </button>
                        <button class="btn btn-compra" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            Añadir a lista
                        </button>
                    </div>
                    <br>
                    <div>
                        <button class="btn btn-compra" type="submit" formaction="mensajes.php">
                            Cotizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
                <div class="row">
                    <div class="col">
                        <h1><a><img src="../Imagenes/carritoBlack.png" width="45px"></a>Comentarios</h1>
                    </div>
                    <div class="col text-end">
                        <button class="btn-coment" data-bs-toggle="modal" data-bs-target="#exampleModal2"> Agregar comentario</button>
                    </div>
                </div>
                <div>
                    <div>
                        <h6><a><img src="../Imagenes/iconBlack.png" width="45px" class="img-coment"></a> Edson Eduardo</h6>
                    </div>
                    <div class="conten-coment">
                        <div>
                            <h4>Buen producto</h4>
                        </div>
                        <div>
                            <p>Me ayudo mucho a quedarme sin dinero.</p>
                        </div>
                        <div class="footer-coment">
                            <p>10 de septiembre del 2023</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <div>
                        <h6><a><img src="../Imagenes/iconBlack.png" width="45px" class="img-coment"></a> Isaac Espinoza</h6>
                    </div>
                    <div class="conten-coment">
                        <div>
                            <h4>No es cierto</h4>
                        </div>
                        <div>
                            <p>El de arriba miente.</p>
                        </div>
                        <div class="footer-coment">
                            <p>11 de septiembre del 2023</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <div>
                        <h6><a><img src="../Imagenes/iconBlack.png" width="45px" class="img-coment"></a> Aylin Galindo</h6>
                    </div>
                    <div class="conten-coment">
                        <div>
                            <h4>Hola soy nueva</h4>
                        </div>
                        <div>
                            <p>Pero no nueva de nacer, nueva comprando.</p>
                        </div>
                        <div class="footer-coment">
                            <p>11 de septiembre del 2023</p>
                        </div>
                    </div>
                </div>
                <hr>
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
    <script src="../ProcJS/producto.js"></script>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content formato-form">
          <form class="contenido-form">
              <div class="modal-header">
                  <h2 id="exampleModal2Label">Comenta algo...</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row">
                          <input type="text" class="input-form" name="comentaProd" placeholder="Titulo..." id="comentaProd">
                          <textarea class="input-form" name="comentarioProd" placeholder="Escribe tu comentario..." id="comentarioProd"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                   <input class="btn btn-compra" type="submit" value="Confirmar">
                </div>
          </form>
        </div>
      </div>
    </div>


    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content formato-form">
          <form class="contenido-form">
              <div class="modal-header">
                  <h2 id="exampleModal3Label">Agregar a lista</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row contenido-form">
                            <label for="listaSeleccionada">Selecciona una lista:</label>
                            <select class="input-form" name="listaSeleccionada" id="listaSeleccionada">
                                <option value="lista1">Lista 1</option>
                                <option value="lista2">Lista 2</option>
                                <option value="lista3">Lista 3</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                   <input class="btn btn-compra" type="submit" value="Confirmar">
                </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>