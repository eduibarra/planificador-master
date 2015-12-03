-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2015 a las 01:09:46
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `planificador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `tra_id` int(11) NOT NULL,
  `tra_titulo` varchar(45) NOT NULL,
  `tra_descripcion` varchar(500) NOT NULL,
  `tra_fecha` date NOT NULL,
  `tra_fecha_fin` date NOT NULL,
  `tra_estado` tinyint(4) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `tra_compartida` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`tra_id`, `tra_titulo`, `tra_descripcion`, `tra_fecha`, `tra_fecha_fin`, `tra_estado`, `usr_id`, `tra_compartida`) VALUES
(1, 'Hola', 'Este es una prueba del planificador', '2015-09-22', '2015-11-15', 2, NULL, NULL),
(2, 'Hola dos', 'Hola mundo', '2015-09-22', '2015-09-29', 2, NULL, NULL),
(3, 'octubre', 'Finalizo octubre el sabado', '2015-09-26', '2015-12-01', 2, NULL, NULL),
(4, 'mes que viene', 'Otra tarea en el mes de octubre', '2015-09-26', '2015-10-02', 3, NULL, NULL),
(5, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nsdfgsdgfsgwerwerwerqweqe', '2015-10-11', '2015-11-15', 2, NULL, NULL),
(6, 'Tarea de prueba', 'test #11', '2015-10-12', '2015-10-13', 3, NULL, NULL),
(7, 'Tarea de prueba', 'prueba de tarea', '2015-10-14', '2015-10-15', 3, NULL, NULL),
(8, 'Dia de la patria', 'Es una fecha muy importante para el pueblo argentino', '2015-10-14', '2016-05-25', 2, NULL, NULL),
(9, 'Tarea', 'tarea', '2015-10-15', '2015-11-16', 2, NULL, NULL),
(10, 'Tarea', 'tarea', '2015-10-15', '0000-00-00', 2, NULL, NULL),
(11, 'Tarea', 'tarea', '2015-10-15', '2015-11-12', 0, NULL, NULL),
(12, 'Tarea', 'tarea', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(13, 'Tarea', 'tarea', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(14, '', '', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(15, '', '', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(16, '', '', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(17, '', '', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(18, '', '', '2015-10-15', '0000-00-00', 0, NULL, NULL),
(19, 'Tarea de prueba', 'esta es una tarea de prueba', '2015-11-15', '2015-11-16', 1, NULL, NULL),
(20, 'a', 'aa', '2015-11-16', '2015-11-18', 1, NULL, NULL),
(21, 'aa', '111', '2015-11-16', '2015-11-19', 1, NULL, NULL),
(22, 'tarea final', 'lalala', '2015-11-17', '2015-11-17', 1, NULL, NULL),
(23, 'a', 'a', '2015-11-17', '2015-11-16', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usr_id` int(11) NOT NULL DEFAULT '0',
  `usr_nombre` varchar(45) NOT NULL,
  `usr_apellido` varchar(45) NOT NULL,
  `usr_email` varchar(45) NOT NULL,
  `usr_pass` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usr_id`, `usr_nombre`, `usr_apellido`, `usr_email`, `usr_pass`) VALUES
(1, 'Bruno', 'Diaz', 'bruno.diaz@mail.com', 'batman');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`tra_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
