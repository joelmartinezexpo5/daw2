create database dwes_04_supermercado;

use dwes_04_supermercado;

create table categorias (
	id int auto_increment primary key,
    nombre varchar(100) not null
);

create table productos(
	id int auto_increment primary key,
    codigo varchar(50) not null,
    precio decimal(10, 2) not null,
    nombre varchar(100) not null,
    categoria_id int not null,
    foreign key (categoria_id) references categorias(id)
);

create table alimentaciones (
	producto_id int primary key,
    mes_caducidad int not null,
    anio_caducidad int not null,
    foreign key (producto_id) references productos(id)
);

create table electronicas (
	producto_id int primary key,
    plazo_garantia int not null,
    foreign key (producto_id) references productos(id)
);