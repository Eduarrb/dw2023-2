-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2023 a las 05:34:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw2023_2`
--
CREATE DATABASE IF NOT EXISTS `dw2023_2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dw2023_2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

DROP TABLE IF EXISTS `actores`;
CREATE TABLE `actores` (
  `act_id` int(10) UNSIGNED NOT NULL,
  `act_nombres` varchar(100) NOT NULL,
  `act_apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`act_id`, `act_nombres`, `act_apellidos`) VALUES
(1, 'Tom', 'Holland'),
(2, 'Zendaya', 'Colleman'),
(3, 'Keanu', 'Reeves'),
(4, 'Carrie-Anne', 'Moss'),
(5, 'Leonardo', 'Dicaprio'),
(6, 'Kate', 'Winslet'),
(7, 'Silvester', 'Stallone'),
(8, 'Talia', 'Shire'),
(9, 'Emma', 'Watson'),
(10, 'Daniel', 'Radcliffe'),
(11, 'Vigo', 'Mortensen'),
(12, 'Ian', 'Mckellen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE `directores` (
  `dire_id` int(10) UNSIGNED NOT NULL,
  `dire_nombres` varchar(50) NOT NULL,
  `dire_apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`dire_id`, `dire_nombres`, `dire_apellidos`) VALUES
(1, 'John', 'Watts'),
(2, 'Lana', 'Wachowsky'),
(3, 'James', 'Cameron'),
(4, 'Christopher', 'Nolan'),
(5, 'Stanley', 'Kubric'),
(6, 'Peter', 'Jackson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `peli_id` int(10) UNSIGNED NOT NULL,
  `peli_dire_id` int(10) UNSIGNED DEFAULT NULL,
  `peli_img` text DEFAULT NULL,
  `peli_nombre` varchar(50) NOT NULL,
  `peli_genero` varchar(50) NOT NULL,
  `peli_fechaEstreno` date NOT NULL,
  `peli_restricciones` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`peli_id`, `peli_dire_id`, `peli_img`, `peli_nombre`, `peli_genero`, `peli_fechaEstreno`, `peli_restricciones`) VALUES
(1, 1, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Spiderman: No way home', 'Ciencia Ficción', '2021-12-24', 'PG-13'),
(2, 2, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Matrix', 'ciencia ficcion', '1999-12-24', 'pg-13'),
(3, 3, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Titanic', 'Drama Romantico', '1997-09-09', 'PG-16'),
(4, 4, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Interstellar', 'CIENCIA FICCION', '2014-03-03', 'PG'),
(5, 5, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'El Resplandor', 'Terror', '1980-05-05', 'PG-16'),
(6, NULL, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Rocky', 'Drama', '1985-08-08', 'PG'),
(7, NULL, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Rambo', 'Acción', '1986-01-01', 'PG-13'),
(8, 2, 'https://es.web.img3.acsta.net/medias/nmedia/18/71/59/76/20051490.jpg', 'Harry Potter: Y la odern del Fenix', 'ciencia ficcion', '2000-04-04', 'PG-13'),
(10, NULL, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', 'Avengers', 'ciencia ficcion', '2010-05-05', 'PG'),
(12, NULL, 'https://www.atb.com.bo/wp-content/uploads/2023/02/2023241026142_1.jpg', '007: Golden Eye', 'Acción', '1995-12-24', 'PG-13'),
(13, 4, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyvdmoMsyrFmF0Wuv0IV2m6pscxh3L7_YpcSUNpRwPiWBjqFi32_7AO_YXZ5t5XICX7OQ&usqp=CAU', 'oppenheimer', 'Drama', '2023-08-08', 'PG-13'),
(14, 6, 'https://pics.filmaffinity.com/El_seanor_de_los_anillos_La_comunidad_del_anillo-744631610-large.jpg', 'La comunidad del Anillo', 'Ciencia Ficción', '2023-01-01', 'PG'),
(17, 6, 'https://pics.filmaffinity.com/El_seanor_de_los_anillos_Las_dos_torres-450612576-large.jpg', 'Las dos Torres', 'Ciencia ficción', '2023-09-06', 'PG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

DROP TABLE IF EXISTS `personajes`;
CREATE TABLE `personajes` (
  `per_act_id` int(11) NOT NULL,
  `per_peli_id` int(11) NOT NULL,
  `per_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`per_act_id`, `per_peli_id`, `per_nombre`) VALUES
(1, 1, 'Spiderman'),
(2, 1, 'MJ'),
(3, 2, 'Neo'),
(4, 2, 'Trinity'),
(5, 3, 'Jack'),
(6, 3, 'Rose'),
(7, 6, 'Rocky'),
(8, 6, 'Adriana'),
(11, 11, 'Aragon'),
(12, 11, 'Gandalf'),
(7, 7, 'John Rambo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`dire_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`peli_id`),
  ADD KEY `fk_direId` (`peli_dire_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `act_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `dire_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `peli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_direId` FOREIGN KEY (`peli_dire_id`) REFERENCES `directores` (`dire_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
