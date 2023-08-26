-- ⚡⚡ QUERIES - CONSULTAS

show databases

SHOW DATABASES

CREATE DATABASE dw2023_2

USE dw2023_2

CREATE TABLE personas (
    per_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    per_nombres VARCHAR(50) NOT NULL,
    per_apellidos VARCHAR(100) NOT NULL,
    per_dni CHAR(8) NOT NULL,
    per_fechaNac DATETIME NOT NULL,
    per_img TEXT
)

DESC personas

SHOW TABLES

DROP TABLE personas -- ☣️☣️☣️☣️☣️

ALTER TABLE personas ADD COLUMN per_genero VARCHAR(10)

ALTER TABLE personas DROP COLUMN per_genero

ALTER TABLE personas ADD COLUMN per_genero VARCHAR(10) NOT NULL AFTER per_dni

INSERT INTO personas (per_nombres, per_apellidos, per_dni, per_genero, per_fechaNac) VALUES
    ('Enrique', 'Suarez', '11111111', 'masculino', '1990-10-10 15:18:30')

SELECT * FROM personas

SELECT per_nombres, per_apellidos FROM personas

INSERT INTO personas (per_nombres, per_apellidos, per_dni, per_genero, per_fechaNac) VALUES
    ('Malena', 'Ruiz', '22222222', 'femenino', '2000-02-02'),
    ("Pedro", 'Hinostroza', '33333333', 'masculino', '1999-12-12'),
    ('Sofia', 'Perez', '44444444', 'femenino', '2005-03-03')

-- 💥💥☣️☣️MUCHO CUIDADO CON ESTO - LEGALMENTE
DELETE FROM personas

TRUNCATE personas

DELETE FROM personas WHERE per_id = 3

INSERT INTO personas (per_nombres, per_apellidos, per_dni, per_genero, per_fechaNac) VALUES
    ("Pedro", 'Hinostroza', '33333333', 'masculino', '1999-12-12')

-- ***************************************************************************

CREATE TABLE peliculas (
    peli_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    peli_nombre VARCHAR(50) NOT NULL,
    peli_genero VARCHAR(50) NOT NULL,
    peli_fechaEstreno DATE NOT NULL,
    peli_restricciones VARCHAR(5)
)

INSERT INTO peliculas (peli_nombre, peli_genero, peli_fechaEstreno, peli_restricciones) VALUES
    ('Spiderman: No way home', 'Ciencia Ficción', '2021-12-24', 'PG-13'),
    ('Matrix', 'ciencia ficcion', '1999-12-24', 'pg-13'),
    ('Titanic', 'Drama Romantico', '1997-09-09', 'PG-16'),
    ('Interstellar', 'CIENCIA FICCION', '2014-03-03', 'PG'),
    ('El Resplandor', 'Terror', '1980-05-05', 'PG-16'),
    ('Rocky', 'Drama', '1985-08-08', 'PG'),
    ('Rambo', 'Acción', '1986-01-01', 'PG-13'),
    ('Harry Potter: Y la odern del Fenix', 'ciencia ficcion', '2000-04-04', 'PG'),
    ('La lista de Shindler', 'Drama', '1993-12-12', 'PG-18'),
    ('Avengers', 'ciencia ficcion', '2010-05-05', 'PG'),
    ('El Señor de los anillos: La comunidad del anillo', 'Ciencia ficcion','2004-11-11', 'PG')