<?php
  session_start();

 
 if(isset($_SESSION['usuario']))
 {
  $usuario = $_SESSION['usuario'];
 }
 else
 {
  header("Location: login.html");
  exit();
 }

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | El Negocios</title>
    <link rel="stylesheet" href="forms.css">
    <script src="https://kit.fontawesome.com/baf3df8175.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="formato-form-registro" id="formRegister" action="Conexion/ModificarUsuario.php" method="post" enctype="multipart/form-data">
        <div class="contenido-form-registro columna-izquierda">
            <h2 style="text-align: center;">Editar Perfil</h2>
            <br>
            <label for="emailR">Email</label>
            <input type="email" name="email" placeholder="<?php echo $usuario['Mail']; ?>" value="<?php echo $usuario['Mail']; ?>" id="emailR"> 
            <p id="warningsEmail" class="warnings alertas"></p>
            
            <label for="nameR">Nombre de Usuario</label>
            <input type="text" name="nameuR" placeholder="<?php echo $usuario['Sex']; ?>" value="<?php echo $usuario['Sex']; ?>" id="nameuR">
            <p id="warningsNameU" class="warnings alertas"></p>

            <label for="passR">Contraseña</label>
            <input type="password" name="passR" placeholder="<?php echo $usuario['Pass']; ?>" value="<?php echo $usuario['Pass']; ?>" id="passR">
            <p id="warningsPass" class="warnings alertas"></p>

            <label for="rolR">Rol de Usuario</label>
            <select id="rolR" name="rolR">
                <option value="" disabled selected><?php  
                if($usuario['Visibilidad'] == 0)
                {
                    echo "Publico";
                }
                else
                    echo "Privado";
                ?></option>
                <option value="0">Publico</option>
                <option value="1">Privado</option>
            </select>
            <p id="warningsRol" class="warnings alertas"></p>

            <label for="nameR">Nombre Completo</label>
            <input type="text" name="nameR" placeholder="<?php echo $usuario['Nombre']; ?>" value="<?php echo $usuario['Nombre']; ?>" id="nameR">
            <p id="warningsName" class="warnings alertas"></p>
<!--
            <label for="dateR">Fecha de Nacimiento</label>
            <input type="date" name="dateR" placeholder="Fecha" id="dateR">
            <p id="warningsDate" class="warnings alertas"></p> -->

            <label for="genderR">Sexo</label>
            <select id="genderR" name="genderR">
                <option value="" disabled selected>Masculino</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                
            </select>


            <p id="warningsGender" class="warnings alertas"></p>

        </div>
        <div class="contenido-form-registro columna-derecha">
            
            <div>
                <img src="Imagenes/iconBlack.png" class="img-icon">
            </div>
           

            <input class="btn" type="submit" value="Registrarse" name="RegButton" id="RegButton">
            <div style="text-align: left;">
                <label for="rememberUser">
                    <input type="checkbox" id="rememberUser" name="rememberUser" value="rememberUser">
                    Recordarme
                </label>
            </div>
            <div class="registrar-iniciar">
                <span>Registrate con...</span>  
            </div>
            <div class="other-register">
                <button type="submit" class="button-red"><i class="fa-brands fa-google" style="color: #ffffff; margin-right: 5px;"></i> Google</button>
                <button type="submit" class="button-red"> <i class="fa-brands fa-facebook" style="color: #ffffff; margin-right: 5px;"></i>Facebook</button>
            </div>
            <div class="registrar-iniciar">
                <span>¿Ya tienes una cuenta? <a href="#">Inicia Sesión</a></span>      
            </div>
        </div>
    </form>

    <script src="validacionRe.js"></script>
    <script>
        console.print(<?php echo $usuario ?>);
    </script>
</body>
</html>