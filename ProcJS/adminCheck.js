$(document).ready(function() {
    // Agrega un manejador de eventos a todos los elementos con la clase autorizar-producto
    $('.autorizar-producto').on('click', function (event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

        // Obtén el productId del botón clicado
        var productId = $(this).data('product-id');
        console.log('ID del producto:', productId);

        // Realiza la llamada AJAX al archivo PHP para autorizar el producto
        //var jsonData = JSON.parse(data);
        $.ajax({
            type: 'POST',
            url: '../Conexion/DetallesProducto.php',
            data: { idProducto: productId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Accede directamente a los datos
                    var detallesProducto = response.data;
        
                    // Ahora puedes trabajar con detallesProducto sin la envoltura "Detalles"
                    console.log(detallesProducto);
                } else {
                    console.error('Error en la solicitud: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud AJAX: ' + status + ' ' + error);
            }
        });
    });
});
