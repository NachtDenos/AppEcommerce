$(document).ready(function () {
    // En cuanto se cargue el documento
    $('.autorizar-producto').click(function (e) {
        e.preventDefault();

        // Cambia 'card' a '.card' para seleccionar por clase
        var idProducto = $(this).closest('.card').data('idproducto');
        console.log('ID del producto:', idProducto);

        $.ajax({
            url: '../Conexion/ProductosAPI.php?action=Detalles',
            type: 'POST',
            data: { idProducto: idProducto },
            dataType: 'json',
            success: function (data) {
                console.log('Respuesta del servidor:', response);

                // Verifica si la propiedad 'html' está presente en la respuesta
                if (response && response.html) {
                    $('#exampleModal .modal-body').html(response.html);
                    $('#exampleModal').modal('show');
                } else {
                    console.error('La propiedad "html" no está presente en la respuesta.');
                }
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
                console.error('Error al obtener detalles del producto', error);
            }
        });
    });
});
