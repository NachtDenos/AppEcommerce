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

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroUsuarios`(IN `CorreoP` VARCHAR(100) CHARSET utf8mb4, IN `UsuarioP` VARCHAR(100) CHARSET utf8mb4, IN `ContrasenaP` VARCHAR(100) CHARSET utf8mb4, IN `ImagenUsuario` BLOB, IN `NombreP` VARCHAR(100) CHARSET utf8mb4, IN `SexoP` VARCHAR(10) CHARSET utf8mb4, IN `VisibilidadP` INT(1) UNSIGNED, IN `RolP` INT(1) UNSIGNED)
BEGIN
INSERT INTO usuarios (usuarios.Correo, usuarios.Usuario, usuarios.Contraseña, usuarios.ImagenPerfil, usuarios.Nombre, usuarios.Sexo, usuarios.Visibilidad, usuarios.Rol)
VALUES (CorreoP, UsuarioP, ContraseñaP, ImagenUsuario, NombreP, SexoP, VisibilidadP, RolP);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUsuarios`(IN `UsuarioNuevo` VARCHAR(255) CHARSET utf8mb4, IN `NombreNuevo` VARCHAR(255) CHARSET utf8mb4, IN `ContraNueva` VARCHAR(255) CHARSET utf8mb4, IN `SexoNuevo` VARCHAR(10) CHARSET utf8mb4, IN `Visibilidad` INT(1) UNSIGNED, IN `CorreoNuevo` VARCHAR(255) CHARSET utf8mb4, IN `CorreoActual` VARCHAR(255) CHARSET utf8mb4)
BEGIN
set @IdUsuario = (SELECT usuarios.Id_Usuario FROM usuarios WHERE usuarios.Correo = CorreoActual);
UPDATE usuarios set usuarios.Nombre = NombreNuevo, usuarios.Contraseña = ContraNueva, usuarios.Sexo = SexoNuevo, usuarios.Visibilidad = Visibilidad, usuarios.Correo = CorreoNuevo WHERE usuarios.Correo = CorreoActual;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearCategoria`(IN `CategoriaName` VARCHAR(255), IN `CategoriaDescription` VARCHAR(255), IN `CorreoLogeado` VARCHAR(255))
BEGIN
set @IdUsuario = (SELECT usuarios.Id_Usuario FROM usuarios WHERE usuarios.Correo = CorreoLogeado);
INSERT category (category.name, category.description, category.user) VALUES (CategoriaName, CategoriaDescription, @IdUsuario);

END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearProductos`(IN `NombreProducto` VARCHAR(255) CHARSET utf8mb4, IN `DescripcionProducto` VARCHAR(255), IN `CantidadProducto` INT(255), IN `VideoProducto` BLOB, IN `PrecioProducto` DECIMAL(10,2) UNSIGNED, IN `Visibilidad` INT(1) UNSIGNED, IN `FotoProducto` BLOB, IN `FotoProducto2` BLOB, IN `FotoProducto3` BLOB, IN `CorreoVendedor` VARCHAR(255) CHARSET utf8mb4, IN `CategoriaNombre` VARCHAR(255) CHARSET utf8mb4)
Begin 
set @IdUsuarioVendedor = (SELECT usuarios.Id_Usuario FROM usuarios WHERE usuarios.Correo = CorreoVendedor);
set @IdCategoria = (SELECT category.categoryID from category WHERE category.name = CategoriaNombre);
INSERT INTO productos (productos.Nombre, productos.Descripcion, productos.Cant_Existencia, productos.Video, productos.Precio, productos.Visibilidad, productos.Foto, productos.Foto2, productos.Foto3, productos.UsuarioVendedor, productos.CategoriaId) VALUES (NombreProducto, DescripcionProducto, CantidadProducto, VideoProducto, PrecioProducto, Visibilidad, FotoProducto, FotoProducto2, FotoProducto3, @IdUsuarioVendedor, @IdCategoria);
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCategorias`()
SELECT category.categoryID, category.name FROM category$$
DELIMITER ;