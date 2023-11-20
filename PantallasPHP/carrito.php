<?php
include_once '../Conexion/CarritoAPI.php';
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
  $imagenBase64 = base64_encode(file_get_contents('../Imagenes/iconBlack.png'));
}

$ObjCarrito = new CarritoAPI();
$IdUsuarioLogeado = $usuario['id'];
//$JSONProductos = $ObjProd->ObtenerProductosUsuario($usuario['User']);
$JSONCarrito = $ObjCarrito->ObtenerProductosCarrito($IdUsuarioLogeado);


$sumaTotal = 0;
if ($JSONCarrito !== false) {
    foreach ($JSONCarrito as $prod) {
        $sumaTotal += $prod['PrecioProd'] * $prod['Cantidad'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | El Negocios</title>
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
    <h1 class="marginlef"><a><img src="../Imagenes/carritoBlack.png" width="45px"></a>Carrito de Compras</h1>
    <div class="cont">
        <div class="row">
            <div class="col-9">
                <table class="table table-hover table-rounded">
                    <tbody>
                    <?php
                        if ($JSONCarrito !== false) {
                            // Itera sobre los productos y construye la estructura HTML deseada
                            foreach ($JSONCarrito as $prod) {
                                $imageBlob = $prod['Foto'];
                                $image = base64_encode($imageBlob);
                                $imageExt = $prod['Foto'];

                                echo '<tr>';
                                    echo '<td class="imagen-celda"><img class="imagen-carrito" src="' . ($imageBlob ? 'data:image/'.$imageExt.';base64,'.$image : '../Imagenes/agua.png') . '"></td>';
                                    echo '<td>';
                                        echo '<div>';
                                            echo '<div>';
                                                echo '<h3>' . $prod['NombreProducto'] . '</h3>';
                                                echo '<h6>Vendido por: ' . $prod['Vendedor'] . '</h6>';
                                                echo '<h6>$' . $prod['PrecioProd'] . '</h6>';
                                                echo '<p>' . $prod['Descripcion'] . '</p>';
                                                echo '<p class="letra-peque">Disponible: 9 Articulos</p>';
                                            echo '</div>';
                                            echo '<div>';
                                            echo '<form id="FormActCantidad" action="../Conexion/CarritoAPI.php?action=ActCantidad" method="post" enctype="multipart/form-data">';
                                                echo '<input type="hidden" name="idProducto" value="' . $prod['IDproducto'] . '">';
                                                echo '<input type="hidden" name="idUsuario" value="' . $IdUsuarioLogeado . '">';    
                                                echo '<input type="number" name="cantPro" placeholder="Cantidad" id="cantPro" value="' . $prod['Cantidad'] . '">';
                                                echo '<input class="btn btn-compra" type="submit" value="Actualizar cantidad">';
                                            echo '</form>';
                                            echo '<form id="FormBajaCarrito" action="../Conexion/CarritoAPI.php?action=eliminarProductoCarrito" method="post" enctype="multipart/form-data">';
                                                echo '<input type="hidden" name="idProducto" value="' . $prod['IDproducto'] . '">';
                                                echo '<input type="hidden" name="idUsuario" value="' . $IdUsuarioLogeado . '">';
                                                echo '<input class="btn btn-compra" type="submit" value="Eliminar">';
                                            echo '</form>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            // Maneja el caso en que la obtención de datos falla
                            echo "Error en la obtención de listas";
                        }
                    ?>
                      
                    </tbody>
                  </table>
            </div>
            <div class="col-3">
                <form class="formato-form" action="pago.php">
                    <h1>Compra</h1>
                    <div>
                        <p>Tu pedido es elegible con envío GRATIS. Comprueba los productos incluidos en el carrito.
                            Selecciona esta opción al tramitar el pedido.</p>
                            <br>
                        <h2>Subtotal: (<?php echo count($JSONCarrito); ?> Productos):</h2>
                        <h3>$<?php echo number_format($sumaTotal, 2); ?></h3>
                        
                    </div>
                    <input class="btn btn-compra" type="submit" value="Proceder al Pago">
                </form>
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