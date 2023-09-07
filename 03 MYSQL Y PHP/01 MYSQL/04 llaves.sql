-- ⚡⚡ LLAVES PRIMARIAS Y LLAVES FORANEAS ⚡⚡

ALTER TABLE peliculas CHANGE COLUMN peli_dire_id peli_dire_id INT(10) UNSIGNED

-- 1️⃣ RESTRICCIONES
-- RESTRICT 
    -- Por defecto, impide realizar modificaciones que atenten la
    -- integridad refrencial de las tablas, no permite borrar o actualizar

-- CASCADE
    -- Al actualizar o borrar los datos referenciados, también se actualiza
    -- o se borra la tabla dependiente

-- SET NULL
    -- Se establece campos NULL a la tabla dependiente al momento de actualizar o borrar el campo

-- NO ACTION: no hace nada

ALTER TABLE peliculas
    ADD CONSTRAINT fk_direId FOREIGN KEY (peli_dire_id)
    REFERENCES directores (dire_id)
    ON DELETE RESTRICT ON UPDATE RESTRICT

DELETE FROM directores WHERE dire_id = 7

DELETE FROM peliculas WHERE peli_id = 11

ALTER TABLE peliculas DROP CONSTRAINT fk_direId

ALTER TABLE peliculas
    ADD CONSTRAINT fk_direId FOREIGN KEY (peli_dire_id)
    REFERENCES directores (dire_id)
    ON DELETE CASCADE ON UPDATE CASCADE

DELETE FROM directores WHERE dire_id = 7