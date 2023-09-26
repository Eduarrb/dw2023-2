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