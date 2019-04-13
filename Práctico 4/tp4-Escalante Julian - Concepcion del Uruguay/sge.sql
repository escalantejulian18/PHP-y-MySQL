-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2015 a las 21:44:47
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
`idempleado` int(11) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `legajo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `apellido`, `nombre`, `legajo`) VALUES
(5, 'Nombre1', 'Apellido1', 801),
(8, 'nombre2', 'Apellido2', 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
`idequipo` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `mac` varchar(17) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `idempleado`, `descripcion`, `ip`, `mac`) VALUES
(1, 5, 'A1', '0', '0'),
(2, 5, 'A2', '0', '0'),
(4, 5, 'A3', '0', '0'),
(5, 5, 'A4', '0', '0'),
(7, 5, 'A7', '77', '78'),
(8, 5, 'A5', '0', '0'),
(9, 5, 'A6', '0', '0'),
(10, 8, 'A8', '0', '0'),
(11, 8, 'A9', '0', '0'),
(12, 5, 'A10', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE IF NOT EXISTS `oficina` (
`idoficina` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`idoficina`, `nombre`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(5, 'E'),
(7, 'B2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinaequipo`
--

CREATE TABLE IF NOT EXISTS `oficinaequipo` (
`idoficinaequipo` int(11) NOT NULL,
  `idoficina` int(11) NOT NULL,
  `idequipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficinaequipo`
--

INSERT INTO `oficinaequipo` (`idoficinaequipo`, `idoficina`, `idequipo`, `fecha`) VALUES
(1, 1, 1, '2015-06-26 02:51:11'),
(2, 1, 2, '2015-06-26 02:51:11'),
(3, 2, 4, '2015-06-26 02:51:54'),
(4, 2, 5, '2015-06-26 02:51:54'),
(5, 3, 9, '2015-06-26 02:52:23'),
(6, 3, 10, '2015-06-26 02:52:23'),
(7, 5, 7, '2015-06-26 02:52:54'),
(8, 5, 8, '2015-06-26 02:52:54'),
(9, 3, 11, '2015-06-26 05:13:15'),
(10, 7, 12, '2015-06-26 18:48:38'),
(11, 7, 7, '2015-06-26 19:05:21'),
(12, 1, 1, '2015-06-26 19:07:44'),
(13, 1, 1, '2015-06-26 19:11:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
 ADD PRIMARY KEY (`idequipo`), ADD KEY `idempleado` (`idempleado`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
 ADD PRIMARY KEY (`idoficina`);

--
-- Indices de la tabla `oficinaequipo`
--
ALTER TABLE `oficinaequipo`
 ADD PRIMARY KEY (`idoficinaequipo`), ADD KEY `idoficina` (`idoficina`), ADD KEY `idequipo` (`idequipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
MODIFY `idequipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `oficina`
--
ALTER TABLE `oficina`
MODIFY `idoficina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `oficinaequipo`
--
ALTER TABLE `oficinaequipo`
MODIFY `idoficinaequipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `oficinaequipo`
--
ALTER TABLE `oficinaequipo`
ADD CONSTRAINT `oficinaequipo_ibfk_2` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON UPDATE CASCADE,
ADD CONSTRAINT `oficinaequipo_ibfk_3` FOREIGN KEY (`idoficina`) REFERENCES `oficina` (`idoficina`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
