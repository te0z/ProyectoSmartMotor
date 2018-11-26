-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 07:17:03
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isaproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `usuario` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`usuario`, `password`, `nombre`, `apellido`, `correo`) VALUES
('isa', 'isa', 'Isabelino', 'Gomez', 'isagomez@hotmail.com'),
('isabelino', 'isabelino', 'Isabelino', 'Alegre', 'mivaan.ctes@gmail.com'),
('jromero', 'juanadmin', 'Juan', 'Romero', 'jromero@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idequipo` int(10) NOT NULL,
  `user` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombrequipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `temperatura` double NOT NULL,
  `amperes` double NOT NULL,
  `voltaje` double NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `user`, `nombrequipo`, `temperatura`, `amperes`, `voltaje`, `hora`) VALUES
(1, 'jromero', 'Horno Panadero', 158.9, 0, 0, '2018-11-03 20:38:44'),
(2, 'jromero', 'Camara Frigorifica', 0.15, 0, 0, '2018-11-04 21:23:21'),
(3, 'isabelino', 'Control Temperatura', 15.8, 0, 0, '2018-11-04 21:30:53'),
(1000, 'isabelino', 'ArduinoPrueba', 24.56, 0, 0, '2018-11-13 14:46:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `idregistro` int(11) NOT NULL,
  `equipo` int(11) NOT NULL,
  `temp` double NOT NULL,
  `amp` double NOT NULL,
  `volt` double NOT NULL,
  `hr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`idregistro`, `equipo`, `temp`, `amp`, `volt`, `hr`) VALUES
(1, 3, 105, 2, 125.5, '2018-11-12 21:09:49'),
(146, 1000, 27.75, 0, 0, '2018-11-13 02:35:40'),
(147, 1000, 27.75, 0, 0, '2018-11-13 02:35:45'),
(148, 1000, 27.75, 0, 0, '2018-11-13 02:35:50'),
(149, 1000, 27.75, 0, 0, '2018-11-13 02:35:55'),
(150, 1000, 27.75, 0, 0, '2018-11-13 02:36:00'),
(151, 1000, 27.75, 0, 0, '2018-11-13 02:36:05'),
(152, 1000, 27.75, 0, 0, '2018-11-13 02:36:10'),
(153, 1000, 27.75, 0, 0, '2018-11-13 02:36:15'),
(154, 1000, 27.75, 0, 0, '2018-11-13 02:36:20'),
(155, 1000, 27.75, 0, 0, '2018-11-13 02:36:25'),
(156, 1000, 27.75, 0, 0, '2018-11-13 02:36:30'),
(157, 1000, 27.75, 0, 0, '2018-11-13 02:36:35'),
(158, 1000, 27.75, 0, 0, '2018-11-13 02:36:40'),
(159, 1000, 27.75, 0, 0, '2018-11-13 02:36:45'),
(160, 1000, 27.75, 0, 0, '2018-11-13 02:36:50'),
(161, 1000, 27.75, 0, 0, '2018-11-13 02:36:55'),
(162, 1000, 27.81, 0, 0, '2018-11-13 02:37:00'),
(163, 1000, 27.81, 0, 0, '2018-11-13 02:37:05'),
(164, 1000, 27.81, 0, 0, '2018-11-13 02:37:10'),
(165, 1000, 27.81, 0, 0, '2018-11-13 02:37:15'),
(166, 1000, 27.81, 0, 0, '2018-11-13 02:37:20'),
(167, 1000, 27.81, 0, 0, '2018-11-13 02:37:25'),
(168, 1000, 27.81, 0, 0, '2018-11-13 02:37:30'),
(169, 1000, 27.81, 0, 0, '2018-11-13 02:37:35'),
(170, 1000, 27.81, 0, 0, '2018-11-13 02:37:40'),
(171, 1000, 27.81, 0, 0, '2018-11-13 02:37:45'),
(172, 1000, 27.81, 0, 0, '2018-11-13 02:37:50'),
(173, 1000, 27.81, 0, 0, '2018-11-13 02:37:55'),
(174, 1000, 27.81, 0, 0, '2018-11-13 02:38:00'),
(175, 1000, 27.81, 0, 0, '2018-11-13 02:38:05'),
(176, 1000, 27.81, 0, 0, '2018-11-13 02:38:10'),
(177, 1000, 27.81, 0, 0, '2018-11-13 02:38:15'),
(178, 1000, 27.81, 0, 0, '2018-11-13 02:38:20'),
(179, 1000, 27.81, 0, 0, '2018-11-13 02:38:25'),
(180, 1000, 27.81, 0, 0, '2018-11-13 02:38:30'),
(181, 1000, 27.81, 0, 0, '2018-11-13 02:38:35'),
(182, 1000, 27.81, 0, 0, '2018-11-13 02:38:40'),
(183, 1000, 27.87, 0, 0, '2018-11-13 02:38:45'),
(184, 1000, 27.81, 0, 0, '2018-11-13 02:38:50'),
(185, 1000, 24.5, 0, 0, '2018-11-13 14:46:12'),
(186, 1000, 24.5, 0, 0, '2018-11-13 14:46:17'),
(187, 1000, 24.5, 0, 0, '2018-11-13 14:46:22'),
(188, 1000, 24.5, 0, 0, '2018-11-13 14:46:27'),
(189, 1000, 24.5, 0, 0, '2018-11-13 14:46:32'),
(190, 1000, 24.5, 0, 0, '2018-11-13 14:46:37'),
(191, 1000, 24.56, 0, 0, '2018-11-13 14:46:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idequipo`),
  ADD KEY `fk_usuario` (`user`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`idregistro`),
  ADD KEY `equipo` (`equipo`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idequipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`user`) REFERENCES `clientes` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_equipo` FOREIGN KEY (`equipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
