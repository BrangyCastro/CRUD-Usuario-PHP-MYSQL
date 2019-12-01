CREATE DATABASE web_usuarios;

use usuarios;

CREATE TABLE usuarios(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  apellido VARCHAR(255) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  fecha_nacimiento DATA
);

DESCRIBE usuarios;
