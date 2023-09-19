CREATE DATABASE IF NOT EXISTS pwci_pia;
use pwci_pia;


create table if not exists Roles
(
	Id_Rol int auto_increment primary key,
    Rol int
    -- 1 Sera Admin, 2 Vendedor y 3 Cliente en caso de no funcionar lo cambiare a varchahr
    
);

create table if not exists Usuarios
(
	Id_Usuario int auto_increment primary key,
    Correo varchar(50) not null,
    Usuario varchar(25) not null,
    Contraseña varchar(30) not null,
    ImagenPerfil blob not null,
    Nombre varchar(50) not null,
    ApellidoP varchar(50) not null,
    ApellidoM varchar(50) not null,
    Sexo char(1) not null,
    Fecha_Ingreso timestamp,
    Visibilidad boolean,
    Rol int
    
);

Alter table Usuarios
ADD Constraint FK_RolId
foreign key (Rol) references Roles(Id_Rol);


