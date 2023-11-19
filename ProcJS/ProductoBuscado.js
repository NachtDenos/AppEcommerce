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
            
            // Intenta encontrar la posición del primer '{'
            var startIndex = data.indexOf('{');

            // Si se encuentra '{', toma el substring a partir de esa posición
            if (startIndex !== -1) {
                data = data.substring(startIndex);
            }
            console.log(data);
            

            resultados= JSON.parse(data);

            $('#CardContenedor').empty();

                        // Itera sobre cada resultado
                for (var i = 0; i < resultados.length; i++) {
                    // Accede a cada resultado usando resultados[i]
                    // Haz algo con cada resultado, por ejemplo, crea y agrega elementos al DOM
                    console.log(resultados[i]);
                }

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





