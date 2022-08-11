CREATE DATABASE maliergestion;;
USE maliergestion;

CREATE TABLE categoria(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 	categoria VARCHAR(60)
);


INSERT INTO categoria VALUES(NULL, "tecnologia");
INSERT INTO categoria VALUES(NULL, "vehiculos");
INSERT INTO categoria VALUES(NULL, "musica");

CREATE TABLE persona(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	nombres VARCHAR(100),
    telefono CHAR(9),
	correo VARCHAR(70)
);


CREATE TABLE cuenta(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_persona INT NOT NULL,
    usuario VARCHAR(60),
    clave VARCHAR(60),
    estado VARCHAR(60) DEFAULT "inactivo",
    token TEXT, 
    CONSTRAINT fk_cueper FOREIGN KEY(id_persona) 
    REFERENCES persona(id)
);


CREATE TABLE cliente(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT NOT NULL,
    id_persona INT NOT NULL,
    CONSTRAINT fk_cliper FOREIGN KEY(id_persona) 
    REFERENCES persona(id),
    CONSTRAINT fk_clicat FOREIGN KEY(id_categoria) 
    REFERENCES categoria(id)   
);
CREATE TABLE plantilla(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT NOT NULL,
	plantilla TEXT, 
    CONSTRAINT fk_placat FOREIGN KEY(id_categoria) 
	REFERENCES categoria(id)   
);



drop procedure if exists CREAR_USUARIO;
delimiter //
CREATE PROCEDURE  CREAR_USUARIO
(in nombres varchar(100), in telefono char(9), in correo varchar(70), in id_categoria INT)
BEGIN
DECLARE id_persona, aux, id_cliente INT;
	set aux = (select persona.id 
               from persona 
               where persona.correo = correo);
	if(aux<=>NULL) then
      START TRANSACTION;
        insert into persona values(NULL,nombres,telefono, correo);
          set id_persona = last_insert_id();
    
        insert into cliente values(NULL,id_categoria,id_persona);
          set id_cliente = last_insert_id();
        if(id_cliente !='NULL') then 
          commit; 
        else 
          rollback;
          signal sqlstate '45000' set message_text = 'No se pudo registrar al cliente.';
        end if;
  else signal sqlstate '45000' set message_text = 'El correo ya esta registrado.';
	end if;
END;
//


drop VIEW if exists TABLA_CLIENTES;
CREATE VIEW TABLA_CLIENTES AS SELECT
 CL.id,
 PE.nombres, 
 PE.telefono,
 PE.correo, 
 CA.categoria 
 FROM persona PE INNER JOIN cliente CL ON PE.id = CL.id_persona
 INNER JOIN categoria CA ON CA.id = CL.id_categoria;


drop procedure if exists INFO_CLIENTE;
delimiter //
CREATE PROCEDURE  INFO_CLIENTE
( in id INT)
BEGIN

SELECT
 CL.id,
 PE.id AS 'id_persona',
 PE.nombres, 
 PE.telefono,
 PE.correo, 
 CA.categoria 
 FROM persona PE INNER JOIN cliente CL ON PE.id = CL.id_persona
 INNER JOIN categoria CA ON CA.id = CL.id_categoria WHERE CL.id = id

END;
//


