$(document).ready(function(){
    ObtenerProductos();
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
                                    <div class="card text-center estilo-card" style="width: 15rem id=" ${element.Id_Productos}"">
                                        <img src="../Imagenes/agua.png" class="card-img-top" style="height: 10rem;">
                                        <div class="card-body">
                                            <a href="producto.php" class="product-name">
                                             <h5 class="card-title">${element.NombreProd}</h5>
                                             <p class="card-text">$${element.Precio}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                        }
                    });
                })
        }

    });
}