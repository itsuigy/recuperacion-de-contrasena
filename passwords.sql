-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-04-2024 a las 19:52:00
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `passwords`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expiracion` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasena`, `email`, `token`, `token_expiracion`) VALUES
(1, 'Pedro', '$2y$10$Sc8zwQp0NiTORO0j0rGgQupGqfNthmheEjqcT21YQXkAwHc7o2pem', 'pedravi.avi@gmail.com', NULL, '0000-00-00 00:00:00'),
(2, 'Pedro', '$2y$10$9.DJvGslw4xh.7YZ9RAIROl/gZLKXDaoxeEw8QbKS/lFjZfffjLYG', 'a20210052@utem.edu.mx', NULL, '0000-00-00 00:00:00'),
(3, 'Luis Flores', '$2y$10$XJeoJqms2IqPLpDJ1W.TUOk39UQ5ScsfrNbq3X6Ro4.IpD03HTco6', 'elstupidoluis@gmail.com', NULL, '2024-04-12 19:52:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
