-- ⚡⚡ JOINS ⚡⚡

SELECT *
    FROM actores a, personajes b
        WHERE a.act_id = b.per_act_id

--  💥💥 2 tablas
SELECT *
    FROM actores a
        INNER JOIN personajes b
            ON a.act_id = b.per_act_id

SELECT *
    FROM personajes a
        INNER JOIN actores b
            ON a.per_act_id = b.act_id

SELECT 
    a.dire_nombres,
    b.peli_nombre
    FROM directores a
        INNER JOIN peliculas b
            ON a.dire_id = b.peli_dire_id

-----------------------------------------------------
SELECT *
    FROM actores a
        LEFT JOIN personajes b
            ON a.act_id = b.per_act_id

SELECT *
    FROM personajes a
        LEFT JOIN actores b
            ON a.per_act_id = b.act_id

SELECT *
    FROM actores a
        RIGHT JOIN personajes b
            ON a.act_id = b.per_act_id

SELECT * 
    FROM peliculas a
        LEFT JOIN directores b
            ON a.peli_dire_id = b.dire_id

-- 💥💥 3 tablas
-- peliculas, personajes, actores
SELECT *
    FROM peliculas a 
        INNER JOIN personajes b ON a.peli_id = b.per_peli_id
        RIGHT JOIN actores c ON c.act_id = b.per_act_id

SELECT *
    FROM personajes a
        INNER JOIN peliculas b ON a.per_peli_id = b.peli_id
        INNER JOIN directores c ON b.peli_dire_id = c.dire_id

-- 💥💥 de 3 a mas tablas
SELECT *
    FROM personajes a
        INNER JOIN peliculas b ON a.per_peli_id = b.peli_id
        INNER JOIN directores c ON b.peli_dire_id = c.dire_id -- A
        INNER JOIN actores d ON a.per_act_id = d.act_id  -- B