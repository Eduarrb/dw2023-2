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