$(document).ready(function(){
    ObtenerProductos();
    botonComprar();
})



function ObtenerProductos()
{
    var jsonDatos={
        "action": 0
    }

    $.ajax({
        url: '../Conexion/ObtenerProductosDash.php',
        method: 'POST',
        async: true,
        data: jsonDatos,
        success: function(data)
        {
            console.log(data);

            resultados= JSON.parse(data);

            $('#CardContenedor').empty();


            const promesas = [];

            resultados.forEach(element => {
                const promesa = new Promise((resolve, reject) => {
                    $.get("../Conexion/ObtenerProductosDash.php?action=0", function(data2){
                        resolve({element, data2});
                    }).fail(function (error) {
                        reject(error);
                    });
                });

                promesas.push(promesa);
            });

            //Espera a que las promesas se carguen

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
            console.log('Edson Naco');
        }

    })

}



function botonComprar()
{

    $('#CardContenedor').on('click', '.estilo-card', PasarDatos);

}





