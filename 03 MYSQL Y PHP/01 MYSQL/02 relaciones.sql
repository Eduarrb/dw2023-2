CREATE TABLE personajes (
    per_act_id INT NOT NULL,
    per_peli_id INT NOT NULL,
    per_nombre VARCHAR(100) NOT NULL
)

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (1, 1, 'Spiderman'),
    (2, 1, 'MJ'),
    (3, 2, 'Neo'),
    (4, 2, 'Trinity'),
    (5, 3, 'Jack'),
    (6, 3, 'Rose'),
    (7, 6, 'Rocky'),
    (8, 6, 'Adriana'),
    (11, 11, 'Aragon'),
    (12, 11, 'Gandalf')

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (7, 7, 'John Rambo')

-- ⚡⚡ 2 TABLES
SELECT 
    peliculas.peli_nombre,
    personajes.per_nombre
    FROM peliculas, personajes
        WHERE peliculas.peli_id = personajes.per_peli_id

-- EN UN CAMPO LOS NOMBRES Y APELLIDOS DE LOS ACTORES Y EN LA COLUMNA EL PERSONAJE DEL ACTOR

SELECT
    CONCAT(actores.act_nombres, ' ', actores.act_apellidos) AS actor,
    personajes.per_nombre AS personaje
    FROM actores, personajes
        WHERE actores.act_id = personajes.per_act_id

-- ⚡⚡ ALIAS DE TABLAS
SELECT
    CONCAT(ac.act_nombres, ' ', ac.act_apellidos) AS actor,
    pe.per_nombre AS personaje
    FROM actores ac, personajes pe
        WHERE ac.act_id = pe.per_act_id

-- NOMBRE DE LA PELICULA | PERSONAJE | FECHA DE ESTRENO | RESTRICCION = PG-13

SELECT
    a.peli_nombre,
    b.per_nombre,
    a.peli_fechaEstreno,
    a.peli_restricciones
    FROM peliculas a, personajes b
        WHERE a.peli_id = b.per_peli_id
        AND a.peli_restricciones = 'pg-13'

-- ⚡⚡ 3 TABLAS
SELECT *
    FROM peliculas a, personajes b, actores c
        WHERE a.peli_id = b.per_peli_id
        AND b.per_act_id = c.act_id

-- NOMBRES Y APELLIDOS | PERSONAJE | PELICULA | FECHA ESTRENO ORDENANO DESC

CREATE TABLE directores (
    dire_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    dire_nombres VARCHAR(50) NOT NULL,
    dire_apellidos VARCHAR(50) NOT NULL
)

INSERT INTO directores (dire_nombres, dire_apellidos) VALUES 
    ('John', 'Watts'),
    ('Lana', 'Wachowsky'),
    ('James', 'Cameron'),
    ('Christopher', 'Nolan'),
    ('Stanley', 'Kubric'),
    ('Peter', 'Jackson'),
    ('Steven', 'Spielberg')

ALTER TABLE peliculas ADD COLUMN peli_dire_id INT AFTER peli_id

UPDATE peliculas SET peli_dire_id = 1 WHERE peli_id = 1