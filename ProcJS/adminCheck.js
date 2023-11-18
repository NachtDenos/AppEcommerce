$(document).ready(function() {
    // Agrega un manejador de eventos a todos los elementos con la clase autorizar-producto
    $('.autorizar-producto').on('click', function (event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

        // Obtén el productId del botón clicado
        var productId = $(this).data('product-id');
        console.log('ID del producto:', productId);
        // Realiza la llamada AJAX al archivo PHP para autorizar el producto
        $.ajax({
            url: '../Conexion/ProductosAPI.php?action=Detalles', // Ajusta la ruta según tu estructura de archivos
            method: 'POST',
            data: { idProducto: productId },
            success: function (data) {
                // Manejar la respuesta del servidor, por ejemplo, actualizar la interfaz
                console.log(data);
                // Cerrar el modal si es necesario
                $('#exampleModal').modal('hide');
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    });
});
