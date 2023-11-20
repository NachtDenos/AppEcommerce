<?php 
include('config.php');
$productName = isset($_GET['nombreProd']) ? $_GET['nombreProd']: null;
$currency = "MXN";
$productPrice = isset($_GET['precio']) ? $_GET['precio']: null;
$productId = isset($_GET['idProducto']) ? $_GET['idProducto']: null;
$orderNumber = rand();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
 
<title>Demo Paypal Express Checkout</title>
</head>

<body>
<div class="container">
    <h2>CheckOut con PayPal</h2>  
    <br>
    <table class="table">
        <tr>
          <td style="width:150px"><img src="demo_product.jpg" style="width:50px" /></td>
          <td style="width:150px">$ <?php echo $productPrice; ?></td>
          <td style="width:150px">Nombre Producto: <?php echo $productName; ?></td>
          <td style="width:150px">Id Producto: <?php echo $productId; ?></td>
          <td style="width:150px">
          <?php include 'paypalcheckout.php'; ?>
          </td>
        </tr>
    </table>    
</div>
</body>