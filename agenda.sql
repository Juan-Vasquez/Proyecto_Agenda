CREATE DATABASE agenda;

USE agenda;

CREATE TABLE usuarios
(
	idUsuarios int NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	email varchar(45) NOT NULL,
	password varchar(300) NOT NULL,
	fechaNacimiento date NOT NULL,
	PRIMARY KEY(idUsuarios)
	
);

CREATE TABLE eventos
(
	idEventos int NOT NULL AUTO_INCREMENT,
	titulo varchar(45) NOT NULL,
	fechaInicio date NOT NULL,
	diaEntero boolean NOT NULL,
	fechaFinalizacion date,
	horaInicio time,
	horaFinalizacion time,
	fk_usuarios integer NOT NULL,
	PRIMARY KEY(idEventos)
);


ALTER TABLE agenda.eventos ADD CONSTRAINT fk_usuarios_usuarios FOREIGN KEY(fk_usuarios) REFERENCES agenda.usuarios(idUsuarios);