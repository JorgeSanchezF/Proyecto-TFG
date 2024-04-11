CREATE DATABASE coleccionistadigitaldb;
use coleccionistadigitaldb;

create table if not EXISTS Juego(
id int primary key AUTO_INCREMENT,
nombre VARCHAR(50) not null,
precio decimal(5, 2) not null,
descripcion VARCHAR(200) not null,
duracion int not null);

create table if not EXISTS Etiqueta(
id int primary key AUTO_INCREMENT,
nombre varchar(20));

create table if not EXISTS juego_etiqueta(
id int primary key AUTO_INCREMENT,
juego_id int,
etiqueta_id int,
FOREIGN KEY (juego_id) REFERENCES Juego(id),
FOREIGN KEY (etiqueta_id) REFERENCES Etiqueta(id));

create table if not EXISTS Usuario(
id int primary key AUTO_INCREMENT,
correo varchar(50) not null,
apodo VARCHAR(20) not null,
contraseña varchar(50) not null,
rol_id int,
FOREIGN KEY(rol_id) REFERENCES Rol(id)
);

create table if not exists Rol(
id int PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(20)
);

create table if not EXISTS Reseña(
id int primary KEY AUTO_INCREMENT,
texto VARCHAR(300) not null,
puntuacion DECIMAL(3, 1) not null, /*puntuación de 1 a 5*/
duracion int not null, /*almacenada en minutos*/
usuario_id int not null,
FOREIGN KEY (usuario_id) REFERENCES Usuario(id)
);

create table if not EXISTS Biblioteca(
id int PRIMARY KEY AUTO_INCREMENT,
usuario_id int,
juego_id INT,
FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
FOREIGN KEY (juego_id) REFERENCES Juego(id)
);

/*INSERCIONES*/
/* INSERTADO
INSERT INTO rol(nombre)VALUE("administrador");
INSERT INTO rol(nombre)VALUE("usuario");
*/

/* NO INSERTADO
insert into etiqueta(nombre)value("Acción");
insert into etiqueta(nombre)value("Aventura");
insert into etiqueta(nombre)value("Rol");
insert into etiqueta(nombre)value("Estrategia");
insert into etiqueta(nombre)value("Terror");
insert into etiqueta(nombre)value("Primera persona");
insert into etiqueta(nombre)value("Tercera persona");
insert into etiqueta(nombre)value("Free to play");
insert into etiqueta(nombre)value("Arcade");
insert into etiqueta(nombre)value("Simulación");
insert into etiqueta(nombre)value("Casual");
insert into etiqueta(nombre)value("Deportes");
insert into etiqueta(nombre)value("Disparos");
*/