use pwci_pia;
Select * from usuarios;
DELETE FROM usuarios WHERE Correo = 'WonderMedia@gmail.com';
INSERT INTO usuarios (Correo, Usuario, Contraseña)
VALUES ("Isaacpro553@gmail.com", "Wonder", "1234567");
INSERT INTO usuarios (Correo, Usuario, Contraseña)
VALUES ("Kevin@gmail.com", "Chevin", "Familia73");

-- Query del SP de registro Usuarios
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroUsuarios`(IN `CorreoP` VARCHAR(100) CHARSET utf8mb4, IN `UsuarioP` VARCHAR(100) CHARSET utf8mb4, IN `ContrasenaP` VARCHAR(100) CHARSET utf8mb4, IN `ImagenUsuario` BLOB, IN `NombreP` VARCHAR(100) CHARSET utf8mb4, IN `SexoP` VARCHAR(10) CHARSET utf8mb4, IN `VisibilidadP` INT(1) UNSIGNED, IN `RolP` INT(1) UNSIGNED)
BEGIN
INSERT INTO usuarios (usuarios.Correo, usuarios.Usuario, usuarios.Contraseña, usuarios.ImagenPerfil, usuarios.Nombre, usuarios.Sexo, usuarios.Visibilidad, usuarios.Rol)
VALUES (CorreoP, UsuarioP, ContraseñaP, ImagenUsuario, NombreP, SexoP, VisibilidadP, RolP);
END$$
DELIMITER ;