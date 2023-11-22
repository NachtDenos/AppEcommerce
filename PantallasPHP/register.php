<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | El Negocios</title>
    <link rel="stylesheet" href="../Estilos/forms.css">
    <script src="https://kit.fontawesome.com/baf3df8175.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="formato-form-registro" id="formRegister" action="../Conexion/RegistrarUsuario.php" method="post" enctype="multipart/form-data">
        <div class="contenido-form-registro columna-izquierda">
            <h2 style="text-align: center;">Registro</h2>
            <br>
            <label for="emailR">Email</label>
            <input type="email" name="email" placeholder="Email" id="emailR">
            <p id="warningsEmail" class="warnings alertas"></p>
            
            <label for="nameR">Nombre de Usuario</label>
            <input type="text" name="nameuR" placeholder="Usuario" id="nameuR">
            <p id="warningsNameU" class="warnings alertas"></p>

            <label for="passR">Contraseña</label>
            <input type="password" name="passR" placeholder="Contraseña" id="passR">
            <p id="warningsPass" class="warnings alertas"></p>

            <label for="rolR">Rol de Usuario</label>
            <select id="rolR" name="rolR">
                <option value="" disabled selected>Selecciona el rol</option>
                <option value="0">Publico</option>
                <option value="1">Privado</option>
            </select>
            <p id="warningsRol" class="warnings alertas"></p>

            <label for="nameR">Nombre Completo</label>
            <input type="text" name="nameR" placeholder="Nombre" id="nameR">
            <p id="warningsName" class="warnings alertas"></p>

            <label for="dateR">Fecha de Nacimiento</label>
            <input type="date" name="dateR" placeholder="Fecha" id="dateR">
            <p id="warningsDate" class="warnings alertas"></p>

            <label for="genderR">Sexo</label>
            <select id="genderR" name="genderR">
                <option value="" disabled selected>Selecciona el genero</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="otro">Otro</option>
            </select>
            <p id="warningsGender" class="warnings alertas"></p>

            <label for="rolUR">Rol</label>
            <select id="rolUR" name="rolUR">
                <option value="" disabled selected>Selecciona que quieres ser</option>
                <option value="0">Vendedor</option>
                <option value="1">Usuario</option>
            </select>

        </div>
        <div class="contenido-form-registro columna-derecha">
            
            <div>
                <img src="../Imagenes/iconBlack.png" class="img-icon">
            </div>
            <div class="imageinput">
                <label for="imagen">Selecciona una imagen de perfil:</label>
               <!-- <input type="file" id="imagen" name="imagenFormR" accept="image/*"> -->
                <input type="file" id="imagen" name="imagen" accept="image/*">
                <p id="warningsImagen" class="warnings alertas"></p>
            </div>

            <input class="btn" type="submit" value="Registrarse" name="RegButton" id="RegButton">
            <div style="text-align: left;">
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
                <span>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></span>      
            </div>
        </div>
    </form>

    <script src="../ProcJS/validacionRe.js"></script>
</body>
</html>