$(document).ready(function(){
    //ObtenerProductos();
    BuscarProductos();
})



function BuscarProductos()
{
    var textoSearch = $('#ContenedorSearch').data('texto-search');
    console.log(textoSearch);
    var jsonDatos={
        "action": 0,
        "TextoSearch": textoSearch
    }

    $.ajax({
        url: '../Conexion/BusquedaAPI.php',
        method: 'POST',
        async: true,
        data: jsonDatos,
        success: function(data)
        {
            data = data.trim();
            if (data.charAt(0) === 'e') {
                data = data.substring(1);  // Eliminar el caracter 'e' al principio
            }
            console.log(data);

            resultados= JSON.parse(data);

            $('#CardContenedor').empty();

        },
    error: function (xhr, status, error) {
        // Manejar errores de la solicitud AJAX principal
        console.log('Error:', error);
    }

    });
}//Fin de esta funcion


function PasarDatos(){
    var productId = $(this).attr('data-idProd');
    console.log(productId);
    var jsonDatos={
        "action":0,
        "IdProducto": productId
    }
    $.ajax({
        url: '../Conexion/ObtenerDetalleProducto.php',
        method: 'POST',
        async: false,
        data: jsonDatos,
        success: function(data)
        {
            console.log(data);
            var responseData = JSON.parse(data);
            console.log(responseData);
            console.log('Edson Naco');
            window.location.href = "../PantallasPHP/producto.php?datos=" + encodeURIComponent(JSON.stringify(responseData));
        }

    })

}

function botonBuscar()
{
    var textoSearch = $(this).attr('data-idProd');
    $('#ContenedorSearch').on('click', '.form-control me-2', BuscarProductos(textoSearch));

}

function botonComprar()
{
    
    $('#CardContenedor').on('click', '.estilo-card', PasarDatos);

}





