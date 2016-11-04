-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2016 a las 16:37:39
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u163772754_p2ir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencias`
--

CREATE TABLE `tbl_incidencias` (
  `inc_id` int(11) NOT NULL,
  `inc_descripcion` text NOT NULL,
  `inc_fecha_ini` datetime NOT NULL,
  `inc_fecha_fin` datetime NOT NULL,
  `rec_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `rec_id` int(4) NOT NULL,
  `rec_nombre` varchar(30) NOT NULL,
  `rec_disponibilidad` tinyint(1) NOT NULL,
  `rec_foto` varchar(100) NOT NULL,
  `tip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`rec_id`, `rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES
(1, 'Aula teoria 100', 1, '1.jpg', 1),
(2, 'Aula teoria 100', 1, '1.jpg', 1),
(3, 'Aula teoria 200', 1, '2.jpg', 1),
(4, 'Aula teoria 300', 1, '3.jpg', 1),
(5, 'Aula teoria 400', 1, '4.jpg', 1),
(6, 'Aula informatca 100', 1, '5.jpg', 2),
(7, 'Aula informatca 200', 1, '6.jpg', 2),
(8, 'Despacho A1', 1, '7.jpg', 3),
(9, 'Despacho A2', 1, '8.jpg', 3),
(10, 'Sala B1', 1, '9.jpg', 4),
(11, 'Proyector C1', 1, '10.jpg', 5),
(12, 'Carro portatiles D1', 1, '11.jpg', 6),
(13, 'Portail P100', 1, '12.jpg', 7),
(14, 'Portail P101', 1, '13.jpg', 7),
(15, 'Portail P102', 1, '14.jpg', 7),
(16, 'Movil M100', 1, '15.jpg', 8),
(17, 'Movil M101', 1, '16.jpg', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `res_id` int(4) NOT NULL,
  `res_fecha_ini` date NOT NULL,
  `res_fecha_fin` date DEFAULT NULL,
  `res_hora_ini` time NOT NULL,
  `res_hora_fin` time DEFAULT NULL,
  `rec_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_recurso`
--

CREATE TABLE `tbl_tipo_recurso` (
  `tip_id` int(4) NOT NULL,
  `tip_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_recurso`
--

INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES
(1, 'Aula Teoria'),
(2, 'Aula Teoria'),
(3, 'Aula Informatica'),
(4, 'Despacho'),
(5, 'Sala Reuniones'),
(6, 'Proyector'),
(7, 'Carrito'),
(8, 'Portatil'),
(9, 'Movil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(4) NOT NULL,
  `usu_alias` varchar(10) NOT NULL,
  `usu_pass` varchar(10) NOT NULL,
  `usu_nombre` varchar(15) NOT NULL,
  `usu_apellido` varchar(20) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_tipo` enum('Administrador','Usuario','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_alias`, `usu_pass`, `usu_nombre`, `usu_apellido`, `usu_email`, `usu_tipo`) VALUES
(1, 'mpetit', '12345', 'Marc', 'Petit', 'marc@gmail.com', 'Administrador'),
(2, 'edhuch', 'qazQAZ123', 'Edhuardo', 'Chacaliaza', 'edhu.chacaliaza@gmail.com', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`res_id`);

--
-- Indices de la tabla `tbl_tipo_recurso`
--
ALTER TABLE `tbl_tipo_recurso`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `rec_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `res_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_recurso`
--
ALTER TABLE `tbl_tipo_recurso`
  MODIFY `tip_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
