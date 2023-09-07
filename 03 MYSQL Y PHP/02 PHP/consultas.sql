ALTER TABLE peliculas ADD COLUMN peli_img TEXT AFTER peli_dire_id

UPDATE peliculas SET peli_img = 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg'