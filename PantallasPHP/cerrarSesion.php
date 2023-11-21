<?php
// Inicia la sesión si aún no está iniciada
session_start();

// Cierra la sesión actual
session_destroy();

// Redirige a la página deseada después de cerrar sesión
header("Location: login.php"); // Cambia 'index.php' por la página a la que deseas redirigir
exit();
?>