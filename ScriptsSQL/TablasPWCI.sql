CREATE DATABASE IF NOT EXISTS pwci_pia;
use pwci_pia;

create table if not exists Roles
(
	Id_Rol int auto_increment primary key,
    Rol int
    -- 1 Sera Admin, 2 Vendedor y 3 Cliente en caso de no funcionar lo cambiare a varchahr
    
);
DROP TABLESPACE pwci_piapwci;
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
    Visibilidad int,
    Rol	int
    
);

Alter table Usuarios
drop Constraint FK_RolId
foreign key (Rol) references Roles(Id_Rol);

create table if not exists Productos
(
	Id_Productos int primary key auto_increment,
    Cant_Existencia int not null,
    Nombre Varchar(35),
    Descripcion Varchar(35),
    Video	blob,
    Tipo char(1),
    Precio Decimal(10,2),
    Valoracion Decimal(2,2),
    UsuarioAdmin int null,
    UsuarioVendedor int,
    Visibilidad int
);

Alter table Productos
drop Constraint FK_AdminPermit
foreign key (UsuarioAdmin) references Usuarios(Id_Usuario);


Alter table Productos
drop Constraint FK_VendedorPublicador
foreign key (UsuarioVendedor) references Usuarios(Id_Uscategoryuario);

create table if not exists Listas(
	Id_Lista int primary key auto_increment,
    Nombre Varchar(20),
    Descripcion varchar(100),
    Id_Usuario int
);

Alter table Listas
drop Constraint FK_UsuarioOwner
foreign key (Id_Usuario) references Usuarios(Id_Usuario);


create table if not exists Img_Lista(
Id_ImgList int primary key auto_increment,
Lista int,
Imagen blob
);


Alter table Img_Lista
ADD Constraint FK_ListaImg
foreign key (Lista) references Listas(Id_Lista);

create table if not exists Objetos_Lista(
Id_Objetos int primary key auto_increment,
Lista int,
Producto int

);

Alter table Objetos_Lista
ADD Constraint FK_Lista
foreign key (Lista) references Listas(Id_Lista);
-- Esta va vinculada a productos, luego lo hago
-- Alter table Objetos_Lista
-- ADD Constraint FK_Lista
-- foreign key (Lista) references Listas(Id_Lista);



