<?php
session_start();

$vendedor = $_SESSION['Vendor'];

//echo ($vendedor);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes | El Negocios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/mensajes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navColor static">
                <div class="col alingImage">
                    <a class="navbar-brand" href="dashboard.php"><img src="../Imagenes/ElNegociosLogo.png" alt="logo" width="70px" class="rounded-circle"></a>
                </div>
                
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
    <div class="container">
        <div class="chatbox">
            <div class="col-1">
                <div class="ancho-texto">
                    <div class="msg-row">
                        <div class="msg-text">
                            <h3 class="msg-text-titulo"><?php echo ($_SESSION['Vendor']['Nombre']); ?> </h3>
                            <p>Hola como estas</p>
                        </div>
                        <img src="../Imagenes/iconBlack.png" class="msg-img">
                    </div>
                    <div class="msg-row msg-row2">
                        <img src="../Imagenes/iconBlack.png" class="msg-img">
                        <div class="msg-text">
                            <h3 class="msg-text-titulo">Aylin Galindo</h3>
                            <p>Bien y tu?</p>
                        </div>
                    </div>
                    <div class="msg-row">
                        <div class="msg-text">
                            <h3 class="msg-text-titulo">Edson Arguello</h3>
                            <p>Muy bien gracias</p>
                        </div>
                        <img src="../Imagenes/iconBlack.png" class="msg-img">
                    </div>
                </div>
            </div>
            <div class="col-2 ancho-texto">
                <h3>Mensajes</h3>
                <ul>
                    <li><a href="#">Aylin Galindo</a></li>
                    <hr>
                </ul>
            </div>
        </div>
        <div>
            <input type="text" placeholder="Escribe tu mensaje..." class="mensaje-escri">
        </div>
    </div>
    <br> <br>
    <footer class="text-white">
        <div class="text-center p-2" style="background-color: #252323">
            <p>Pagina creada por:</p>
            <p>Edson Eduardo Arguello Tienda & Isaac Espinoza Morales</p>
            <p>LMAD | UANL</p>
        </div>
    </footer>




    <!-- Modal -->
    




</body>
</html>