ALTER TABLE peliculas ADD COLUMN peli_img TEXT AFTER peli_dire_id

UPDATE peliculas SET peli_img = 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg'

SELECT 
    a.peli_nombre,
    a.peli_img,
    CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director,
    a.peli_restricciones
    FROM peliculas a
        INNER JOIN directores b ON a.peli_dire_id = dire_id