$(document).ready(checkAuthentication())
  function checkAuthentication() {
    $.get('../Conexion/authenticated.php', function(data) {
        if (!data.authenticated) {
            window.location.href="index.php";
        }
    }).fail(function(error) {
        console.error('Error al verificar la autenticación:', error);
    });
} 

function logout(){
    $.get('../Conexion/logout.php', function(data) {
        if (data.success) {
            console.log('Cierre de sesión exitoso');
            checkAuthentication();
        } else {
            console.log('Cierre de sesión fallido:', data.message);
        }
    }).fail(function(error) {
        console.error('Error al cerrar sesión:', error);
    });
}