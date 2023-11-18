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
                    
                    var producto = response.data[0];
                    // Verificar que producto esté definido
                    if (producto) {
                        // Llenar los elementos del modal con la información del producto
                        $('#modal-ImagenProducto').attr('src', producto.Foto);
                        
                        $('#modal-NombreProducto').text(producto.NombreProd);
                        $('#modal-CategoriaProducto').text('Categoría: ' + producto.name); 
                        $('#modal-PrecioProducto').text('$' + producto.Precio);
                        $('#modal-ExistenciaProducto').text('Stock: ' + producto.Cant_Existencia + ' Artículos'); // Ajusta el nombre de la propiedad según tu JSON
                        $('#modal-DescripcionProducto').text(producto.Descripcion);
                        $('#modal-imagen').attr('src', 'ruta_de_tu_imagen/' + producto.Foto); // Ajusta el nombre de la propiedad según tu JSON

                        // Mostrar el modal
                        $('#exampleModal').modal('show');
                    } else {
                        console.error('El objeto producto es undefined o null.');
                    }
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
