CREATE DATABASE c3;

USE c3;

CREATE TABLE usuario(
id INTEGER NOT NULL PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
username VARCHAR(10) NOT NULL,
pass VARCHAR(15) NOT NULL
);

CREATE TABLE alumno(
rut VARCHAR(10) NOT NULL PRIMARY KEY,
carrera VARCHAR(50) NOT NULL,
id INTEGER NOT NULL,
FOREIGN KEY (id) REFERENCES usuario(id)
);