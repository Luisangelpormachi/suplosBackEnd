-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-10-2022 a las 20:40:09
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intelcost_bienes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

DROP TABLE IF EXISTS `bienes`;
CREATE TABLE IF NOT EXISTS `bienes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo_postal` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bienes`
--

INSERT INTO `bienes` (`id`, `direccion`, `ciudad`, `telefono`, `codigo_postal`, `tipo`, `precio`) VALUES
(13, '340-985 Lobortis. Avenue', 'Washington', '049-063-4896', '5411', 'Casa de Campo', '$83,847'),
(14, 'Ap #325-2507 Quisque Av.', 'Los Angeles', '623-807-2869', '89804', 'Casa de Campo', '$36,087');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
