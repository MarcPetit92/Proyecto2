-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2016 a las 20:12:18
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
  `inc_fecha_ini` date NOT NULL,
  `inc_fecha_fin` date NOT NULL,
  `rec_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_incidencias`
--

INSERT INTO `tbl_incidencias` (`inc_id`, `inc_descripcion`, `inc_fecha_ini`, `inc_fecha_fin`, `rec_id`, `usu_id`) VALUES
(1, 'Escribe la descripcion... ', '2016-11-09', '2016-11-09', 2, 5),
(2, 'Describe el problema ...', '2016-11-09', '2016-11-09', 3, 1),
(3, 'Describe el problema ...', '2016-11-09', '0000-00-00', 3, 1),
(4, 'esto no va', '2016-11-09', '0000-00-00', 4, 1);

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
(2, 'Aula teoria 100', 0, '1.jpg', 1),
(3, 'Aula teoria 200', 0, '2.jpg', 1),
(4, 'Aula teoria 300', 0, '3.jpg', 1),
(5, 'Aula teoria 400', 1, '4.jpg', 1),
(6, 'Aula informatica 100', 1, '5.jpg', 3),
(7, 'Aula informatica 200', 1, '6.jpg', 3),
(8, 'Despacho A1', 1, '7.jpg', 4),
(9, 'Despacho A2', 1, '8.jpg', 4),
(10, 'Sala B1', 1, '9.jpg', 5),
(11, 'Proyector C1', 1, '10.jpg', 6),
(12, 'Carro portatiles D1', 1, '11.jpg', 7),
(13, 'Portatil P100', 1, '12.jpg', 8),
(14, 'Portatil P101', 1, '13.jpg', 8),
(15, 'Portail P102', 1, '14.jpg', 8),
(16, 'Movil M100', 1, '15.jpg', 9),
(17, 'Movil M101', 1, '16.jpg', 9);

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

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`res_id`, `res_fecha_ini`, `res_fecha_fin`, `res_hora_ini`, `res_hora_fin`, `rec_id`, `usu_id`) VALUES
(1, '2016-11-07', '2016-11-08', '17:41:36', '16:53:13', 1, 6),
(2, '2016-11-07', '2016-11-08', '17:44:22', '16:53:16', 2, 6),
(3, '2016-11-07', '2016-11-08', '18:01:17', '12:48:25', 1, 1),
(4, '2016-11-07', '2016-11-08', '19:47:28', '14:01:37', 2, 5),
(5, '2016-11-07', '2016-11-08', '19:48:26', '14:01:42', 2, 5),
(6, '2016-11-07', '2016-11-08', '19:48:44', '14:01:31', 3, 5),
(7, '2016-11-07', '2016-11-08', '19:49:28', '14:01:32', 4, 5),
(8, '2016-11-07', '2016-11-08', '19:49:49', '14:01:32', 5, 5),
(9, '2016-11-07', '2016-11-08', '19:50:10', '14:01:34', 2, 5),
(10, '2016-11-07', '2016-11-08', '19:51:01', '14:01:35', 3, 5),
(11, '2016-11-07', '2016-11-08', '19:56:57', '14:01:38', 15, 5),
(12, '2016-11-07', '2016-11-08', '20:03:06', '12:48:20', 2, 1),
(13, '2016-11-07', '2016-11-08', '20:04:14', '12:48:26', 2, 1),
(14, '2016-11-07', '2016-11-08', '20:45:11', '12:48:26', 2, 1),
(15, '2016-11-08', '2016-11-08', '12:04:26', '12:57:58', 4, 2),
(16, '2016-11-08', '2016-11-08', '12:39:59', '12:48:24', 4, 1),
(17, '2016-11-08', '2016-11-08', '12:40:18', '12:48:23', 4, 1),
(18, '2016-11-08', '2016-11-08', '12:45:16', '12:48:22', 5, 1),
(19, '2016-11-08', '2016-11-08', '12:49:51', '13:45:46', 16, 1),
(20, '2016-11-08', '2016-11-08', '12:57:43', '12:57:55', 2, 2),
(21, '2016-11-08', '2016-11-08', '13:34:42', '13:34:51', 2, 2),
(22, '2016-11-08', '2016-11-08', '13:34:56', '13:35:01', 2, 2),
(23, '2016-11-08', '2016-11-08', '13:40:07', '13:48:04', 2, 1),
(24, '2016-11-08', '2016-11-08', '13:48:25', '13:58:16', 2, 1),
(25, '2016-11-08', '2016-11-08', '13:51:31', '13:56:12', 4, 1),
(26, '2016-11-08', '2016-11-08', '14:01:21', '14:01:37', 4, 5),
(27, '2016-11-08', '2016-11-08', '14:02:40', '14:02:50', 2, 5),
(28, '2016-11-08', '2016-11-08', '14:03:23', '14:03:25', 2, 5),
(29, '2016-11-08', '2016-11-08', '14:03:28', '14:03:46', 3, 5),
(30, '2016-11-08', '2016-11-08', '14:03:33', '14:03:40', 4, 5),
(31, '2016-11-08', '2016-11-08', '14:05:52', '14:05:54', 2, 5),
(32, '2016-11-08', '2016-11-08', '15:11:41', '15:11:50', 2, 1),
(33, '2016-11-08', '2016-11-08', '15:13:58', '16:01:39', 2, 1),
(34, '2016-11-08', '2016-11-08', '15:40:07', '16:17:35', 3, 1),
(35, '2016-11-08', '2016-11-08', '15:54:17', '16:17:36', 4, 1),
(36, '2016-11-08', '2016-11-08', '15:54:21', '16:17:37', 5, 1),
(37, '2016-11-08', '2016-11-08', '16:01:52', '16:02:01', 2, 1),
(38, '2016-11-08', '2016-11-08', '16:18:57', '16:19:27', 3, 1),
(39, '2016-11-08', '2016-11-08', '16:19:31', '16:38:54', 3, 1),
(40, '2016-11-08', '2016-11-08', '16:19:34', '16:38:59', 2, 1),
(41, '2016-11-08', '2016-11-08', '16:19:36', '16:19:50', 4, 1),
(42, '2016-11-08', '2016-11-08', '16:20:37', '16:38:52', 4, 1),
(43, '2016-11-08', '2016-11-08', '16:37:14', '16:38:57', 4, 1),
(44, '2016-11-08', '2016-11-08', '16:37:45', '16:38:51', 7, 1),
(45, '2016-11-08', '2016-11-08', '16:38:47', '16:38:49', 5, 1),
(46, '2016-11-08', '2016-11-08', '16:39:04', '16:41:12', 2, 1),
(47, '2016-11-08', '2016-11-08', '16:40:10', '16:41:10', 3, 1),
(48, '2016-11-08', '2016-11-08', '16:40:14', '16:41:09', 4, 1),
(49, '2016-11-08', '2016-11-08', '16:40:50', '16:41:11', 14, 1),
(50, '2016-11-08', '2016-11-08', '16:41:42', '16:49:53', 2, 1),
(51, '2016-11-08', '2016-11-08', '16:42:13', '16:49:52', 3, 1),
(52, '2016-11-08', '2016-11-08', '16:45:12', '16:49:50', 7, 1),
(53, '2016-11-08', '2016-11-08', '16:45:20', '16:49:51', 11, 1),
(54, '2016-11-08', '2016-11-09', '16:50:24', '13:12:09', 2, 2),
(55, '2016-11-08', '2016-11-09', '16:50:28', '13:12:09', 3, 2),
(56, '2016-11-08', '2016-11-08', '16:51:56', '16:52:52', 4, 5),
(57, '2016-11-08', '2016-11-08', '16:51:59', '16:52:52', 5, 5),
(58, '2016-11-08', '2016-11-08', '16:52:03', '16:52:50', 7, 5),
(59, '2016-11-08', '2016-11-08', '16:53:40', '16:53:59', 2, 6),
(60, '2016-11-08', '2016-11-08', '16:53:42', '16:53:53', 4, 6),
(61, '2016-11-08', '2016-11-08', '16:53:45', '16:53:58', 5, 6),
(62, '2016-11-08', '2016-11-09', '17:02:19', '13:12:32', 2, 6),
(63, '2016-11-08', '2016-11-08', '17:30:02', '17:30:11', 4, 5),
(64, '2016-11-08', '2016-11-08', '17:30:06', '17:30:12', 5, 5),
(65, '2016-11-08', '2016-11-08', '17:30:10', '17:30:14', 7, 5),
(66, '2016-11-08', '2016-11-08', '18:42:58', '18:43:30', 4, 1),
(67, '2016-11-08', '2016-11-09', '19:19:20', '13:14:17', 7, 1),
(68, '2016-11-08', '2016-11-08', '22:30:06', '22:30:09', 4, 5),
(69, '2016-11-08', '2016-11-09', '22:35:08', '13:13:56', 4, 5),
(70, '2016-11-08', '2016-11-09', '22:48:43', '13:13:57', 5, 5),
(71, '2016-11-08', '2016-11-09', '22:48:55', '13:13:54', 10, 5),
(72, '2016-11-08', '2016-11-09', '22:48:59', '13:13:56', 8, 5),
(73, '2016-11-09', '2016-11-09', '13:12:02', '13:12:08', 11, 2),
(74, '2016-11-09', '2016-11-09', '13:13:05', '13:13:54', 2, 5),
(75, '2016-11-09', '2016-11-09', '13:23:38', '13:25:28', 2, 5),
(76, '2016-11-09', '2016-11-09', '13:24:58', '13:25:29', 6, 5),
(77, '2016-11-09', '2016-11-09', '13:25:13', '13:25:27', 9, 5),
(78, '2016-11-09', '2016-11-09', '13:26:27', '13:26:29', 6, 2),
(79, '2016-11-09', '2016-11-09', '13:26:45', '13:26:47', 6, 2),
(80, '2016-11-09', NULL, '17:21:13', NULL, 3, 1),
(81, '2016-11-09', '2016-11-09', '18:05:10', '19:13:02', 2, 5),
(82, '2016-11-09', '2016-11-09', '19:08:51', '19:13:03', 4, 5),
(83, '2016-11-09', '2016-11-09', '19:09:49', '19:11:06', 6, 5),
(84, '2016-11-09', NULL, '19:15:20', NULL, 2, 5),
(85, '2016-11-09', NULL, '20:06:11', NULL, 4, 1);

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
(2, 'edhuch', 'qazQAZ123', 'Edhuardo', 'Chacaliaza', 'edhu.chacaliaza@gmail.com', 'Usuario'),
(5, 'user', 'pass', 'name', 'surname', 'email', 'Administrador'),
(6, 'usuario', 'contra', 'nombre', 'apellido', 'correo', 'Usuario');

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
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `rec_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `res_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_recurso`
--
ALTER TABLE `tbl_tipo_recurso`
  MODIFY `tip_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
