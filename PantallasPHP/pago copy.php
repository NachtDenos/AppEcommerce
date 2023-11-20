<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo de Pago | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/newProducto.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navColor static">
                <div class="col alingImage">
                    <a class="navbar-brand" href="dashboard.php"><img src="../Imagenes/ElNegociosLogo.png" alt="logo" width="70px" class="rounded-circle"></a>
                </div>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><a><img src="../Imagenes/filtro.png" alt="logo" width="23px" class="rounded-circle"></a></button>
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
    <br> <br> <br> <br> <br> <br> <br>
    <div class="centrar-metodo">
        <div class="container prod-ventana">
           
                <h1>Método de Pago</h1>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="contenido-form">
    
                                <label for="typeCard">Tipo de Tarjeta</label>
                                <select id="typeCard" name="typeCard" class="input-form">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <option value="master">MasterCard</option>
                                    <option value="visa">Visa</option>
                                    <option value="carnet">Carnet</option>
                                </select>
    
                                <label for="numCard">Número de la tarjeta</label>
                                <input type="number" name="numCard" placeholder="Tarjeta" id="numCard" class="input-form">
                                
                                <label for="nameCard">Nombre de la tarjeta</label>
                                <input type="text" name="nameCard" placeholder="Nombre" id="nameCard" class="input-form">

                                <label for="selectMes">Expiración</label>
                                <div class="row">
                                    <div class="col">
                                        <select name="mes" id="selectMes" class="input-form">
                                            <option disabled selected>Mes</option>
                                            <option >01</option>
                                            <option >02</option>
                                            <option >03</option>
                                            <option >04</option>
                                            <option >05</option>
                                            <option >06</option>
                                            <option >07</option>
                                            <option >08</option>
                                            <option >09</option>
                                            <option >10</option>
                                            <option >11</option>
                                            <option >12</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="year" id="selectYear" class="input-form">
                                            <option disabled selected>Año</option>
                                            <option >2023</option>
                                            <option >2024</option>
                                            <option >2025</option>
                                            <option >2026</option>
                                            <option >2027</option>
                                            <option >2028</option>
                                            <option >2029</option>
                                            <option >2030</option>
                                            <option >2031</option>
                                            <option >2032</option>
                                            <option >2033</option>
                                            <option >2034</option>
                                        </select>
                                    </div>
                                </div>
    
                                <label for="codeCard">Código de Seguridad</label>
                                <input type="number" name="codeCard" placeholder="Código" id="codeCard" class="input-form">
                                
                                <h1 style="text-align: center;">Datos producto</h1>
                                <input class="btn btn-form" type="submit" value="Realizar compra" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    
    <br> <br> <br>
    <hr> 

    <footer class="text-white">
        <div class="text-center p-5" style="background-color: #252323">
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

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content fondo-modal">
            <form>
                <div class="modal-header">
                    <h2 id="exampleModal2Label">Califica lo que compraste</h2>
                    
                  </div>
                  <div class="modal-body">
                      <div class="row">
                        <div class="col">
                          <img src="../Imagenes/agua.png" style="max-width: 200px; min-width: 200px;">
                        </div>
                        <div class="col">
                          <h2>Botella de Agua</h2>
                          <p class="text-center">Categoría: Botellas</p>
                          <h5 class="text-center">$200.00</h5>
                        </div>
                      </div>
                        <div class="row">
                         <hr>
                          <h5>Califica el producto</h5>
                          <label for="ptProd">Puntuación</label>
                            <select id="ptProd" name="ptProd">
                                <option value="" disabled selected>Selecciona una puntuación para el producto</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                          <label for="comentaProd">Comentarios</label>
                          <input type="text" class="input-modal" name="comentaProd" placeholder="Titulo" id="comentaProd">
                          <input type="text" class="input-modal" name="comentaProd" placeholder="Comentarios" id="comentaProd">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <input class="btn btn-modal" type="submit" value="Confirmar">
                  </div>
            </form>
          </div>
        </div>
    </div>


</body>
</html>