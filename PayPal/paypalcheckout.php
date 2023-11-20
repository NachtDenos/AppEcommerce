<?php 

include_once '../Conexion/VentasAPI.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<div id="paypal-button-container">

</div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
paypal.Button.render({
  env: '<?php echo PayPalENV; ?>',
  client: {
    <?php if(ProPayPal) { ?>  
    production: '<?php echo PayPalClientId; ?>'
    <?php } else { ?>
    sandbox: '<?php echo PayPalClientId; ?>'
    <?php } ?>  
  },
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: '<?php echo $productPrice; ?>',
          currency: '<?php echo $currency; ?>'
        }
      }]
    });
  },
  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
       // console.log(
        //s
        //echo ($productId);
        //);
        window.location = "<?php echo PayPalBaseUrl ?>orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo $productId; ?>";
      });
  }
}, '#paypal-button');


function InsertPaypal(var PaymentId, var PayerId)
{
  var = {
    "IdPaypal" : PaymentId,
    "PayPalPayerId" : PayerId
  }

  $.ajax({
      type: 'POST'
      url: '../Conexion/VentasAPI.php'
  })
}

</script>

</body>
</html>