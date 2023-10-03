-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2023 a las 05:33:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kompi`
--
CREATE DATABASE IF NOT EXISTS `kompi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kompi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `cart_user_id` int(10) UNSIGNED NOT NULL,
  `cart_prod_id` int(10) UNSIGNED NOT NULL,
  `cart_canti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`cart_id`, `cart_user_id`, `cart_prod_id`, `cart_canti`) VALUES
(1, 3, 2, 2),
(2, 3, 1, 3),
(3, 4, 1, 2),
(4, 4, 4, 3),
(5, 4, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_nombre` varchar(50) NOT NULL,
  `prod_descri` text NOT NULL,
  `prod_precio` decimal(10,2) NOT NULL,
  `prod_canti` int(11) NOT NULL,
  `prod_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_nombre`, `prod_descri`, `prod_precio`, `prod_canti`, `prod_img`) VALUES
(1, 'Asus PC gamer', 'Pc gamer de alta gama con procesador', 3155.99, 3, '11bfd67fe539f68b8f83607d2b35570b.jpg'),
(2, 'Tarjeta RTX 4090 12GB', 'tarjeta de video en oferta', 4000.00, 4, 'd9924375950b2692871b5e6c47d516ff.jpg'),
(4, 'Monitor Samsumg 27\'', 'Monitor', 850.99, 6, '1cee08fa3d5e91114270b8b01140ac1d.jpg'),
(5, 'Memoria RAM 16GB DRR5', 'memoria ram', 230.00, 10, '934df8dafcd2d2093c8c02179bc07a78.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_names` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0 COMMENT 'status 0: usuario no activo, status 1: usaurio activo',
  `user_rol` varchar(10) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_names`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(1, 'Eduardo', 'eduardo@gmail.com', NULL, '$2y$12$venO8yjUEAu31i4XD1ZaheKnclMbwrI1m2zZgGdGY3NxLneQ5FKC.', '', 1, 'admin'),
(3, 'karina', 'karina@gmail.com', NULL, '$2y$12$yMqdVNjVPbkSg4.Zk..WIO1yH0KeFxlUSC2xWnychI92jQdKak.4O', '', 1, 'cliente'),
(4, 'Carlos', 'carlos@gmail.com', NULL, '$2y$12$oteb6UHWSj3aBI0Y.DEOBOsQHccXkCOx73h1d9Qy6acD2oLJXaIZe', '', 1, 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_userId` (`cart_user_id`),
  ADD KEY `fk_prodId` (`cart_prod_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_prodId` FOREIGN KEY (`cart_prod_id`) REFERENCES `productos` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`cart_user_id`) REFERENCES `usuarios` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
