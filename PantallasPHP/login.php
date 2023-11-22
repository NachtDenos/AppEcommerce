
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | El Negocios</title>
    <link rel="stylesheet" href="../Estilos/forms.css">
    <script src="https://kit.fontawesome.com/baf3df8175.js" crossorigin="anonymous"></script>
</head>
<body>

    <form class="formato-form" id="formLogin" action="../Conexion/LoginUsuario.php" method="post">
        <h2 class="titulo">Iniciar Sesión</h2>
        <span class="line"></span>
        <div class="contenido-form">
            <label for="emailLog">Email</label>
            <input type="email" name="emailLog" placeholder="Email" id="emailLog">
            <p id="warningsEmail" class="warnings alertas"></p>

            
            <label for="passLog">Contraseña</label>
            <input type="password" name="passLog" placeholder="contraseña" id="passLog">
            <p id="warningsPass" class="warnings alertas"></p>


            <input class="btn" type="submit" value="Iniciar Sesión" name="botonLog">
            <label for="rememberUser">
                <input type="checkbox" id="rememberUser" name="rememberUser" value="rememberUser">
                Recordarme
            </label>
        </div>
        <div class="registrar-iniciar">
             
        </div>
        <div class="other-register">
            
        </div>
        <div class="registrar-iniciar">
            <span>¿No tienes una cuenta? <a href="register.php"> Crea una aquí</a></span>      
            <p class="warnings" id="warnings"></p>
        </div>
    </form>
    

    <script src="validacion.js"></script>
</body>
</html>

<?php

?>
