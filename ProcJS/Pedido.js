function Pedidos()
        {
            var jsonDatos =
            {
                "action" : 0
            }

            $.ajax({
                type: 'POST',
                url: '../Conexion/PedidosAPI.php',
                data: jsonDatos,
                success: function (response)
                {
                    console.log(response);
                    response.trim();

                    var startIndex = response.indexOf('[{');

                    if (startIndex !== -1) {
                        response = response.substring(startIndex);
                    }
                    console.log(response);
                    jsoncito = JSON.parse(response);
                    $('#SeccionReporte').empty();
                    
                    const promesas = [];

                    jsoncito.forEach(element => {
                        const promesa = new Promise((resolve, reject) => {
                            $.get("../Conexion/PedidosAPI.php?action=0", function(data2){
                                resolve({element, data2});
                            }).fail(function (error){
                                reject(error);
                            });
                        });
                        promesas.push(promesa);
                    });

                    Promise.all(promesas)
                        .then(resultadosCompletos => {
                            resultadosCompletos.forEach(({element, data2}) => {
                                $('#SeccionReporte').append(`<div class="row">
                                 <div class="col"> 
                                    <h2>Mis pedidos</h2>
                                    <table class="table table-hover table-rounded"> 
                                    <tbody>
                                        <tr>
                                            <td>
                                            <div>
                                                <div>
                                                    <h3>${element.NombreProd}</h3>
                                                    <p><b>Categoria: </b>${element.name}</p>
                                                    <h6><b>Cantidad:</b> ${element.cantidadProducto}</h6
                                                    <h6>${element.Precio}</h6>
                                                    <p><b>Fecha del pedido: </b> ${element.ventatime} </p>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>`);
                            });
                        }).catch(error => {
                            console.error('Hubo un problema con una o más solicitudes GET:', error);
                        });


                    //window.location.href = "../PantallasPHP/ReporteVentas.php"
                },
                error: function (xhr, status, error)
                {
                    console.log('Error', error);
                }
            })


        }