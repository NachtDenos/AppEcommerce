<?php
include_once '../Conexion/ReportesAPI.php';

$IdUsuarioLogeado = $usuario['id'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Ventas | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/carrito.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../ProcJS/Reporte.js"></script>
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
    <br> <br> <br> <br> <br>
    <h1 class="marginlef"><a><img src="../Imagenes/carritoBlack.png" width="45px"></a>Reporte de Ventas</h1>
    <p class="marginlef">Filtro:</p>
    <div class="container">
        <form>
            <div class="row">
                <div class="col text-center">
                    <input type="text" name="IdUsuarioLogeado" value="<?php echo ($IdUsuarioLogeado); ?>">
                    <input type="text" name="fechaIniFil" placeholder="YYYY-MM-DD" id="fechaIniFil" value="2023-11-20">
                    <input type="text" name="fechaFinalFil" placeholder="YYYY-MM-DD" id="fechaFinalFil" value="2023-11-21">
                </div>
                <div class="col text-center">
                    <input type="text" name="cateMisProd" placeholder="Categoría" id="cateMisProd">
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <input class="btn btn-compra" type="button" value="Buscar" onClick="ReporteFechas()">
                </div>
                <div class="col text-center">
                    <input class="btn btn-compra" type="submit" value="Buscar">
                </div>
            </div>
        </form>
    </div>
    <div class="cont">
        <div class="row" id="SeccionReporte">
            <div class="col">
                <h2>Mis Ventas</h2>
                <table class="table table-hover table-rounded">
                    <tbody>
                      <tr>
                        <td class="imagen-celda"><img class="imagen-carrito" src="../Imagenes/agua.png"></td>
                        <td>
                            <div>
                                <div>
                                    <h3>Botella de Agua</h3>
                                    <p><b>Categoría:</b> Botellas</p>
                                    <p><b>Puntuación:</b> 6/10</p>
                                    <h6><b>Cantidad:</b> 3</h6>
                                    <h6>$600.00</h6>
                                    <p><b>Hora de la venta:</b> 07:00 am</p>
                                    <p><b>Fecha de la venta:</b> 14/09/2023</p>
                                    <p><b>Existencia Actual:</b> 6</p>
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
                                    <p><b>Categoría:</b> Botellas</p>
                                    <p><b>Puntuación:</b> 6/10</p>
                                    <h6><b>Cantidad:</b> 3</h6>
                                    <h6>$600.00</h6>
                                    <p><b>Hora de la venta:</b> 07:00 am</p>
                                    <p><b>Fecha de la venta:</b> 14/08/2023</p>
                                    <p><b>Existencia Actual:</b> 6</p>
                                </div>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col">
                <h2>Resumen</h2>
                <table class="table table-hover table-rounded">
                    <thead>
                        <tr>
                          <th><h4>Fecha</h4></th>
                          <th><h4>Categoría</h4></th>
                          <th><h4>Ventas</h4></th>
                        </tr>
                      </thead>
                    <tbody>
                      <tr>
                        <td>
                            <p><b>Septiembre 2023</b></p>
                        </td>
                        <td>
                            <div>
                                <div>
                                    <h5>Botellas</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p><b>Ventas:</b> 3</p>
                            <p><b>Ganancias:</b> $600</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <p><b>Agosto 2023</b></p>
                        </td>
                        <td>
                            <div>
                                <div>
                                    <h5>Botellas</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p><b>Ventas:</b> 3</p>
                            <p><b>Ganancias:</b> $600</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
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

    <script>

    </script>


</body>