-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2023 a las 23:16:40
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
-- Base de datos: `kompi2`
--
CREATE DATABASE IF NOT EXISTS `kompi2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kompi2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `createdAt`, `updatedAt`) VALUES
(1, 'Equipos de computo', '2023-09-06 14:56:04', '2023-09-06 14:56:04'),
(2, 'Perifericos', '2023-09-06 14:56:14', '2023-09-06 14:56:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `oferta` double DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `categoriaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `activo`, `cantidad`, `precio`, `oferta`, `createdAt`, `updatedAt`, `categoriaId`) VALUES
('04e67eb8-4997-4b95-8c70-79235bc2b84c', 'MONITOR LG 27\' 140 MHZ', '<div>MONITOR GAMER</div>', 'WybbV6GLN.jpg', 1, 9, 1250, NULL, '2023-09-11 15:26:58', '2023-09-12 13:50:21', 2),
('7a6171d8-469a-43e6-9bd9-2f8effcbe4ad', 'MEMORIA RAM 16GB DDR5', '<div>MEMORIA RAM 16GB&nbsp;</div>', '3zdW3yNfp.jpg', 1, 60, 345, NULL, '2023-09-11 15:26:03', '2023-09-11 15:26:03', 2),
('876f32d8-5566-48c7-9ffd-a12d500e7299', 'MOUSE GAMER', '<div>MOUSE GAMER LOGITEC</div>', 'HSLj5hsH6.jpg', 1, 32, 60, NULL, '2023-09-11 15:25:21', '2023-09-11 15:25:21', 2),
('d058e82c-bcac-4b66-b0e4-80c4c9344b66', 'RTX 4090 ', '<div>TARJETA DE VÍDEO</div>', 'qm_gk7qcV.jpg', 1, 20, 3599, NULL, '2023-09-11 15:24:53', '2023-09-11 15:24:53', 2),
('d9997d82-40c2-4819-9e32-79166d3bd9aa', 'TECLADO MECANICO HP', '<div>TECLADO</div>', 'CGlf_Q-3X.jpg', 1, 20, 250, NULL, '2023-09-11 15:26:27', '2023-09-11 15:26:27', 2),
('dcadc662-66dc-4ff4-ae41-8e2d77396951', 'PC GAMER 2023', '<div>LA MEJOR PC GAMER</div>', 'F-oCJqaNK.jpg', 1, 10, 2500, NULL, '2023-09-11 15:23:32', '2023-09-11 15:23:32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `token`, `confirmado`, `createdAt`, `updatedAt`) VALUES
(1, 'Eduardo', 'eduardo@gmail.com', '$2b$10$yI2HXpoknJS/I9ys6jfeaOUNQ10wrjPlE2pNjpFBgly4tqL4upY9i', 'admin', 'ii88b8sspk81h9b901ca', 1, '2023-09-01 14:18:39', '2023-09-02 15:43:13'),
(2, 'karina', 'karina@gmail.com', '$2b$10$V9Jm77h2QRkc5BaXmNYjrOwpOI/m9.aR3/3Omyb31g7ap8cN.o5Va', 'cliente', '', 1, '2023-09-01 14:19:47', '2023-09-01 14:20:03'),
(3, 'Sofia', 'sofia@gmail.com', '$2b$10$sTSc90aTw33TOuBUVHg0bufZmXEr0peVs5PuzZYahh4gQL1fmdv/G', 'cliente', 'eokkmsijqp81h9bainbo', NULL, '2023-09-02 16:10:54', '2023-09-02 16:10:54'),
(4, 'correo@correo.com', 'correo@correo.com', '$2b$10$BvkSMIbonxj.bDqJri7omOYCNha6SnW.Mt00qlTd8.GGBVdgAyPNq', 'cliente', 'dg3hvvebft1h9bam7fc', NULL, '2023-09-02 16:12:49', '2023-09-02 16:12:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaId` (`categoriaId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
