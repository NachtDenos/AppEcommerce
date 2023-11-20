<?php 
/*
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
*/
include_once '../Conexion/ListasAPI.php';
$listaId = $_GET['id'];
$ListaObj = new ListasAPI();
$ListaJSON = $ListaObj->ObtenerListasId($listaId);
$ProductListaObj = new ListasAPI();
$JSONListaProd = $ProductListaObj->ObtenerProductosLista($listaId);
//var_dump ($ProductoJSON);
$idLista = $ListaJSON[0]['listaID'];
$nombreLista = $ListaJSON[0]['nombre'];
$descripcionLista = $ListaJSON[0]['descripcion'];
$usuarioLista = $ListaJSON[0]['usuario'];
$privacidadLista = $ListaJSON[0]['privacidad'];
$fotoLista = $ListaJSON[0]['foto'];
//echo $nombreProducto 

?>
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
    <h1 class="marginlef"><a><img src="../Imagenes/carritoBlack.png" width="45px"></a><?php echo $nombreLista ?></h1>
    <p class="marginlef"><?php echo $descripcionLista ?></p>
    <?php
        if ($privacidadLista == 'pub') {
                echo '<p class="marginlef letra-peque">Pública</p>';
                } elseif ($privacidadLista == 'priv') {
                    echo '<p class="marginlef letra-peque">Privada</p>';
                } else {
                echo '<p class="marginlef letra-peque">Desconocida</p>';
        }
    ?>
    <div class="cont">
        <div class="row">
            <div class="col">
                <table class="table table-hover table-rounded">
                    <tbody>
                    <?php
                        if ($JSONListaProd !== false) {
                            // Itera sobre los productos y construye la estructura HTML deseada
                            foreach ($JSONListaProd as $prod) {
                                $imageBlob = $prod['Foto'];
                                $image = base64_encode($imageBlob);
                                $imageExt = $prod['Foto'];
                                
                                echo '<tr>';
                                    echo '<td class="imagen-celda"><img class="imagen-carrito" src="../Imagenes/lista.png"></td>';
                                    echo '<td>';
                                    echo '<form id="FormCarritoLista" action="../Conexion/ListasAPI.php?action=agregarCarrito" method="post" enctype="multipart/form-data">';
                                        echo '<div>';
                                            echo '<div>';
                                                echo '<input type="hidden" name="idProducto" value="' . $prod['Id_Productos'] . '">';
                                                echo '<h3>' . $prod['NombreProd'] . '</h3>';
                                                echo '<h6>Vendido por: ' . $prod['Vendedor'] . '</h6>';
                                                echo '<h6>$' . $prod['Precio'] . '</h6>';
                                                echo '<p>' . $prod['Descripcion'] . '</p>';
                                                echo '<p class="letra-peque">Disponible: ' . $prod['Cant_Existencia'] . ' Articulos</p>';
                                            echo '</div>';
                                            echo '<div>';
                                                echo '<input type="hidden" name="action" value="agregarCarrito">';
                                                echo '<input class="btn btn-compra" type="submit" value="Agregar al carrito">';
                                    echo '</form>';
                                    echo '<form id="FormBajaProdLista" action="../Conexion/ListasAPI.php?action=eliminarProducto" method="post" enctype="multipart/form-data">';
                                                echo '<input type="hidden" name="idProducto" value="' . $prod['Id_Productos'] . '">';
                                                echo '<input type="hidden" name="idLista" value="' . $idLista . '">';
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
                    <!--
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
                    -->
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
