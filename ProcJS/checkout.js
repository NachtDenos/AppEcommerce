document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('formPago');

    if (form) { // Asegúrate de que el formulario se haya encontrado
        form.addEventListener('submit', function(event) {
            event.preventDefault();  // Evita que el formulario se envíe normalmente

            // Recopila los datos del formulario
            var nameCardValue = document.getElementById('nameProd').textContent;
            var cantidadCardValue = document.getElementById('cantProducto').value;
            var precioProdCardValue = document.getElementById('PrecioProd').textContent;


            var jsonDatos = {
                "name": nameCardValue,
                "cantidad": cantidadCardValue,
                "precio": precioProdCardValue,
                "MuchosProductos" : false
            };

            // Determina la acción según el botón presionado
            var action = event.submitter.getAttribute('data-action');

            // Realiza acciones específicas según la acción
            switch (action) {
                case 'comprar':
                    // Acciones específicas para el botón "Comprar"
                    fetch('pago.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(jsonDatos)
                    })
                    .then(response => {
                        // Manejar la respuesta si es necesario
                        console.log(response);
                        // Puedes redirigir a otra página si es necesario
                        // window.location.href = 'otra_pagina.php';
                    }).catch(error => {
                        console.error('Error:', error);
                    });
                    break;
                default:
                    console.error('Acción no reconocida.');
            }
        });
    } else {
        console.error('El formulario no se encontró en el DOM.');
    }
});
