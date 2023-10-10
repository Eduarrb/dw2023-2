CREATE DATABASE kompi

USE kompi

CREATE TABLE usuarios (
    user_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_names VARCHAR(100) NOT NULL,
    user_email VARCHAR(100) NOT NULL,
    user_img TEXT,
    user_pass VARCHAR(255) NOT NULL,
    user_token TEXT,
    user_status TINYINT DEFAULT 0 COMMENT 'status 0: usuario no activo, status 1: usaurio activo',
    user_rol VARCHAR(10) NOT NULL DEFAULT 'cliente'
)

CREATE TABLE productos (
    prod_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    prod_nombre VARCHAR(50) NOT NULL,
    prod_descri TEXT NOT NULL,
    prod_precio DECIMAL(10,2) NOT NULL,
    prod_canti INT NOT NULL,
    prod_img TEXT NOT NULL
)

CREATE TABLE carrito (
    cart_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cart_user_id INT(10) UNSIGNED NOT NULL,
    cart_prod_id INT(10) UNSIGNED NOT NULL,
    cart_canti INT NOT NULL
)

ALTER TABLE carrito
    ADD CONSTRAINT fk_userId FOREIGN KEY (cart_user_id)
    REFERENCES usuarios (user_id)
    ON DELETE CASCADE ON UPDATE CASCADE

ALTER TABLE carrito
    ADD CONSTRAINT fk_prodId FOREIGN KEY (cart_prod_id)
    REFERENCES productos (prod_id)
    ON DELETE CASCADE ON UPDATE CASCADE

CREATE TABLE pedidos (
    ped_pref_id TEXT NOT NULL,
    ped_pay_id INT NOT NULL,
    ped_user_id INT(10) UNSIGNED NOT NULL,
    ped_status VARCHAR(25) NOT NULL,
    ped_fecha DATETIME NOT NULL
)

ALTER TABLE pedidos
    ADD CONSTRAINT fk_pedUserId FOREIGN KEY (ped_user_id)
    REFERENCES usuarios (user_id)
    ON DELETE CASCADE ON UPDATE CASCADE