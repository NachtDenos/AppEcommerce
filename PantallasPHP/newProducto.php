<?php 

session_start();

 
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
    <title>Vender | El Negocios</title>
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
    <div class="container prod-ventana">
        <form>
            <h1>Vender/Cotizar Producto</h1>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="contenido-form">
                            <label for="nameP">Nombre</label>
                            <input type="text" name="nameP" placeholder="Nombre" id="nameP" class="input-form">
                            
                            <label for="descP">Descripción</label>
                            <input type="text" name="descP" placeholder="Descripción" id="descP" class="input-form">
                            
                            <div class="imageinput">
                                <label for="imagenProd1">Seleccione la primer imagen del Producto:</label>
                                <input type="file" id="imagenProd1" name="imagenProd1" accept="image/*" class="input-form">
                            </div>

                            <div class="imageinput">
                                <label for="imagenProd2">Seleccione la segunda imagen del Producto:</label>
                                <input type="file" id="imagenProd2" name="imagenProd2" accept="image/*" class="input-form">
                            </div>

                            <div class="imageinput">
                                <label for="imagenProd3">Seleccione la tercer imagen del Producto:</label>
                                <input type="file" id="imagenProd3" name="imagenProd3" accept="image/*" class="input-form">
                            </div>

                            <div class="imageinput">
                                <label for="videoProd">Selecciona un video para el producto:</label>
                                <input type="file" id="videoProd" name="videoProd" accept="video/*" class="input-form">
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="contenido-form">
                            <label for="ventaCot">Elige si el producto se venderá o cotizará</label>
                            <select id="ventaCot" name="ventaCot" class="input-form">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="venta">Venta</option>
                                <option value="cot">Cotización</option>
                            </select>

                            <label for="precioProd">Precio</label>
                            <input type="number" name="precioProd" placeholder="Precio" id="precioProd" class="input-form">

                            <label for="inventProd">Inventario</label>
                            <input type="number" name="inventProd" placeholder="Inventario" id="inventProd" class="input-form">

                            <label for="cateProd">Categoría</label>
                            <select id="cateProd" name="cateProd" class="input-form">
                                <option value="" disabled selected>Selecciona la categoría</option>
                                <option value="pub">Nueva Categoría</option>
                                <option value="priv">Botellas</option>
                                <option value="priv">Juegos</option>
                                <option value="priv">Cocina</option>
                            </select>

                            <label for="nameCatProd">Nombre de la nueva categoría</label>
                            <input type="text" name="nameCatProd" placeholder="Nombre de la categoría" id="nameCatProd" class="input-form">

                            <label for="newCatProd">Descripción de la nueva categoría</label>
                            <input type="text" name="newCatProd" placeholder="Descripción de la categoría" id="newCatProd" class="input-form">

                            <input class="btn btn-form" type="submit" value="Confirmar Producto">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <footer class="text-white">
        <div class="text-center p-2" style="background-color: #252323">
            <p>Pagina creada por:</p>
            <p>Edson Eduardo Arguello Tienda & Isaac Espinoza Morales</p>
            <p>LMAD | UANL</p>
        </div>
    </footer>
</body>
</html>