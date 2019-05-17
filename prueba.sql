CREATE DATABASE prueba;

CREATE TABLE usuarios
(
	idUsuarios int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre varchar(45) NOT NULL,
	email varchar(45) NOT NULL,
	password varchar(300) NOT NULL,
	fechaNacimiento date NOT NULL 
);

CREATE TABLE eventos
(
	idEventos int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	titulo varchar(45) NOT NULL,
	fechaInicio date NOT NULL,
	diaEntero boolean NOT NULL,
	fechaFinalizacion date,
	horaInicio time,
	horaFinalizacion time,
	fk_usuarios integer NOT NULL
);


ALTER TABLE prueba.eventos ADD CONSTRAINT fk_usuarios_usuarios FOREIGN KEY(fk_usuarios) REFERENCES prueba.usuarios(idUsuarios);