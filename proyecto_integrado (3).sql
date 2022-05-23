-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2022 a las 23:01:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_integrado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `numeroAula` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `numeroAula`) VALUES
(1, 'Aula129'),
(2, 'Aula126');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `contenido` varchar(255) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `contenido`, `id_incidencia`, `fecha_modificacion`, `id_usuario`) VALUES
(1, 'el internet no se conecta bien por la mañana, da bastantes fallos', 2, '0000-00-00', 1),
(2, 'sigue fallando', 4, '2022-05-19', 11),
(4, 'sigue fallando', 10, '2022-05-21', 10),
(5, 'todo mal', 10, '2022-05-19', 10),
(6, 'todo mal', 10, '2022-05-19', 10),
(9, 'solo hay que poner uno', 14, '2022-05-23', 11),
(10, 'explicar mejor incidencia', 2, '2022-05-23', 3),
(11, 'necesito más información', 2, '2022-05-23', 3),
(12, 'necesito más información', 2, '2022-05-23', 3),
(13, 'necesito más información', 2, '2022-05-23', 3),
(14, 'falta información', 2, '2022-05-23', 3),
(15, 'falta información', 2, '2022-05-23', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `estado` enum('nuevo','en progreso','resuelto','derivado') NOT NULL,
  `propuestaCierre` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_usuario`, `titulo`, `id_aula`, `fecha_creacion`, `fecha_modificacion`, `fecha_cierre`, `estado`, `propuestaCierre`) VALUES
(2, 2, 'Conexión a internet inestable', 1, '2022-04-01', '0000-00-00', '2022-05-22', 'resuelto', 1),
(3, 2, 'virus en el pc nº2, se ha avisado a la empresa inf', 1, '2022-05-15', '2022-05-23', '0000-00-00', 'derivado', NULL),
(4, 3, 'Cables cambiados', 1, '2022-05-15', '2022-05-23', '0000-00-00', 'resuelto', NULL),
(5, 7, 'Solicitadas 2 memorias más', 1, '2022-01-05', '2022-05-23', '0000-00-00', 'derivado', NULL),
(9, 7, 'incidencia con la torre 2, llevada al servicio tec', 1, '2022-01-05', '2022-05-23', '0000-00-00', 'derivado', NULL),
(10, 7, 'incidencia con la torre 2, llevada al servicio tec', 1, '2022-01-05', '2022-05-23', '0000-00-00', 'derivado', NULL),
(11, 10, 'Falta un monitor', 2, '2022-05-16', '0000-00-00', '0000-00-00', 'nuevo', NULL),
(12, 7, 'incidencia con la torre 2', 1, '2022-01-05', '0000-00-00', '0000-00-00', 'nuevo', NULL),
(13, 10, 'teclado robado', 2, '2022-05-16', '0000-00-00', '2022-05-22', 'resuelto', 1),
(14, 11, 'faltan monitores', 2, '2022-05-18', '0000-00-00', '0000-00-00', 'nuevo', 1),
(15, 11, 'Conexión a internet inestable', 2, '2022-05-21', '0000-00-00', '0000-00-00', 'nuevo', NULL),
(16, 11, 'no hay cables de red', 1, '2022-05-21', '0000-00-00', '0000-00-00', 'nuevo', NULL),
(17, 11, 'falta 1 teclado', 1, '2022-05-23', '0000-00-00', '0000-00-00', 'nuevo', 0),
(18, 11, 'han robado 4 monitores', 2, '2022-05-23', '0000-00-00', '0000-00-00', 'nuevo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id`, `nombre`, `email`, `mensaje`, `password`) VALUES
(1, 'jesus-23', 'jesus.gonzalez.munoz@iespoligonosur.org', 'quiero registrarme', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('administrador','usuarioRegistrado','usuarioNoRegistrado','') NOT NULL,
  `mail` varchar(255) NOT NULL,
  `validacionEmail` tinyint(1) NOT NULL,
  `notificacionEmail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `rol`, `mail`, `validacionEmail`, `notificacionEmail`) VALUES
(1, 'ramon_romero2', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'administrador', 'ramon_romero.al@iespoligonosur.org', 0, 0),
(2, 'j_fer19', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 'administrador', 'j.fernandez.dominguez.al@iespoligonosur.org', 0, 0),
(3, 'javier_jimenez', '$2y$10$hZ0YOfMtVmg1AlwXB4Od1.qMfjjOcSCWwKNXcI8dYrmoznknYp0D.', 'administrador', 'jjimenez@iespoligonosur.org', 1, 0),
(6, 'ramon_299', '$2y$10$IR5zwQt7MpuXEEiKAi54W.n4nWONTwY8d7eJ7KLpeNR/Zd606HtDu', 'usuarioRegistrado', 'r234@iespoligonosur.org', 0, 0),
(7, 'santi534', '12345', 'usuarioRegistrado', 'santi_25@iespoligonosur.org', 1, 1),
(10, 'er_pejeta', '$2y$10$/mzpaZh5gaHjf34QW4IX.O/tZyceu9hHPgpw4VYgcYGRGQZex0tcS', 'usuarioRegistrado', 'pejeta@iespoligonosur.org', 1, 1),
(11, 'd´artagnan', '$2y$10$tTJSraV5AbrHB6sftaHGl.xH50CId0lIZm7PolKZr/FMAKlvC7/f2', 'usuarioRegistrado', 'unoparatodos@iespoligonosur.org', 1, 1),
(15, 'tomasito', '$2y$10$mrctYDXVtECg02BRzJAoce11uZ00TDdOnsWW33mANT7rp140yRdoy', 'usuarioRegistrado', 'tomasito19@iespoligonosur.org', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validacion`
--

CREATE TABLE `validacion` (
  `id_peticion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `userValidado` tinyint(1) DEFAULT NULL,
  `userNovalidado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `validacion`
--

INSERT INTO `validacion` (`id_peticion`, `id_usuario`, `userValidado`, `userNovalidado`) VALUES
(1, 1, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_incidencia` (`id_incidencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `validacion`
--
ALTER TABLE `validacion`
  ADD PRIMARY KEY (`id_peticion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_incidencia`) REFERENCES `incidencias` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`);

--
-- Filtros para la tabla `validacion`
--
ALTER TABLE `validacion`
  ADD CONSTRAINT `validacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `validacion_ibfk_2` FOREIGN KEY (`id_peticion`) REFERENCES `peticiones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
