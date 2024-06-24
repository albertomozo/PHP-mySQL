-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-06-2024 a las 13:52:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `rol` enum('A','I','U','E') NOT NULL COMMENT 'A : Administrador U : usuario  I : invitado E: Editor',
  `estado` enum('A','P','B','D') NOT NULL COMMENT 'A : Activo P: Preinscrito D: Desactivado B: Borrado',
  `token` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `boletin` char(1) NOT NULL,
  `creado` bigint(20) NOT NULL COMMENT 'fecha creacion',
  `modificado` bigint(20) NOT NULL COMMENT 'fecha ultima modificacion',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `mail`, `usuario`, `password`, `telefono`, `rol`, `estado`, `token`, `imagen`, `boletin`, `creado`, `modificado`) VALUES
(20, 'Pepe ', 'Botella', 'albertomozodocente@gmail.com', 'admin', '12345678', '66666666', 'A', 'A', '', '', '', 0, 0),
(21, 'Alberto', 'Mozo Avellaned', 'albertomozodesarrollador@gmail.com', 'alberto', '12345678', '63564565', 'U', 'P', 'hn0yet3m9ak543b4o9uqxgzs883c2c1lvd796ra1iffw6p8fj', '', '', 1664655268, 1664655268);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
