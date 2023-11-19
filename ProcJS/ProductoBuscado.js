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
            var startIndex = data.indexOf('[{');

            // Si se encuentra '{', toma el substring a partir de esa posición
            if (startIndex !== -1) {
                data = data.substring(startIndex);
            }
            console.log(data);
            try {
                resultados = JSON.parse(data);
                $('#CardContenedor').empty();
                
            const promesas = [];

            resultados.forEach(element => {
                const promesa = new Promise((resolve, reject) => {
                    $.get("../Conexion/BusquedaAPI.php?action=0", function(data2){
                        resolve({element, data2});
                    }).fail(function (error) {
                        reject(error);
                    });
                });

                promesas.push(promesa);
            });
            
            Promise.all(promesas)
                .then(resultadosCompletos => {
                    resultadosCompletos.forEach(({ element, data2 }) => {
                        if(element.Precio != 0){
                            $('#CardContenedor').append(`<div class="row">
                                <div class="col alingFlex">
                                    <div class="card text-center estilo-card" style="width: 15rem" id="Producto" data-IdProd=" ${element.Id_Productos}" ">
                                        <img src="../Imagenes/agua.png" class="card-img-top" style="height: 10rem;">
                                        <div class="card-body">
                                            <a id="ComprarProducto" href="#" class="product-name">
                                             <h5 class="card-title">${element.NombreProd}</h5>
                                             <p class="card-text">$${element.Precio}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                        }
                    });
                }).catch(error => {
                    // Manejar errores de las solicitudes
                    console.error('Hubo un problema con una o más solicitudes GET:', error);
                });







                // Resto del código...
            } catch (error) {
                console.log('No se pudo parsear como JSON:', error);
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





