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
        }

    });
}