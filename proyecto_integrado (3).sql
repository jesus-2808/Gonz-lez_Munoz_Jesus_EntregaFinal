-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-06-2022 a las 03:16:53
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
(9, 'prueba', 14, '2022-06-20', 11),
(11, 'necesito más información', 2, '2022-05-23', 3),
(12, 'necesito más información', 2, '2022-05-23', 3),
(13, 'necesito más información', 2, '2022-05-23', 3),
(14, 'falta información', 2, '2022-05-23', 3),
(16, 'pendiente de verificacion', 16, '2022-06-06', 11),
(17, 'sigue igual', 5, '2022-06-07', 3),
(18, 'ha llegado 1 cable', 16, '2022-06-08', 3),
(19, 'solicitados 4 más', 16, '2022-06-08', 3),
(20, 'queremos 4 cables de red', 16, '2022-06-08', 3),
(21, 'siguen faltando', 17, '2022-06-08', 3),
(22, 'faltan 5 teclados', 17, '2022-06-08', 3),
(23, 'faltan 4 teclados', 17, '2022-06-08', 3),
(24, 'faltan 4 teclados', 17, '2022-06-08', 3),
(25, 'faltan 4 teclados', 17, '2022-06-08', 3),
(26, 'faltan 4 teclados', 17, '2022-06-08', 3),
(29, 'seguimos esperando', 5, '2022-06-08', 3),
(30, 'esperando que las manden', 5, '2022-06-08', 3),
(31, 'estamos buscando material', 30, '2022-06-14', 3),
(32, 'seguimos buscando material', 30, '2022-06-14', 3),
(33, 'reparando', 29, '2022-06-14', 3),
(34, 'hay que revisar el catalizador del carter piller', 32, '2022-06-16', 3),
(35, 'sigue el problema', 32, '2022-06-16', 3),
(36, 'en seguimiento', 30, '2022-06-16', 3),
(37, 'probando mensaje', 30, '2022-06-16', 3),
(38, 'probando mensaje', 29, '2022-06-16', 3),
(39, 'probando', 29, '2022-06-16', 3),
(40, 'primer coment', 34, '2022-06-20', 11),
(41, 'probando', 34, '2022-06-20', 11),
(42, 'verificando', 34, '2022-06-20', 11),
(43, 'quiero acometer una modificación', 34, '2022-06-20', 11),
(44, 'la comentasion', 34, '2022-06-20', 11),
(45, 'cambia', 34, '2022-06-20', 11),
(46, 'probando email', 34, '2022-06-20', 11),
(47, 'a ver si ahora si, cojones', 34, '2022-06-20', 11),
(48, 'venga otra vez', 34, '2022-06-20', 11),
(49, 'otra vez', 34, '2022-06-20', 11),
(50, 'comentario del admin', 34, '2022-06-20', 3),
(51, 'cosas extrañas', 36, '2022-06-20', 3),
(52, 'seguimiento', 37, '2022-06-20', 11),
(53, 'hay cosas regular', 37, '2022-06-20', 11),
(54, 'seguimiento', 34, '2022-06-20', 3);

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
(2, 2, 'Conexión a internet inestable', 1, '2022-04-01', '2022-05-27', '2022-05-27', 'resuelto', 1),
(5, 7, 'Solicitadas 7 memorias más', 1, '2022-01-05', '2022-06-10', '2022-06-10', 'resuelto', NULL),
(9, 7, 'incidencia con la torre 2, llevada al servicio tec', 1, '2022-01-05', '2022-06-10', '2022-06-10', 'resuelto', NULL),
(11, 10, 'Falta un monitor. ', 2, '2022-05-16', '2022-06-10', '2022-06-16', 'resuelto', NULL),
(13, 10, 'teclado repuesto', 2, '2022-05-16', '2022-05-27', '2022-06-08', 'resuelto', 1),
(14, 11, 'faltan 3 monitores', 2, '2022-05-18', '2022-05-27', '2022-05-27', 'resuelto', 1),
(16, 11, 'no hay cables de red y hace falta reponer teclados', 1, '2022-05-21', '2022-06-10', '2022-06-16', 'resuelto', NULL),
(17, 11, 'falta 8 teclado', 1, '2022-05-23', '2022-06-08', '2022-06-08', 'resuelto', 1),
(18, 11, 'han robado 6 monitores', 2, '2022-05-23', '2022-06-10', '2022-06-16', 'resuelto', 0),
(21, 11, 'los ratones han mordido los cables de alimentación', 2, '2022-06-10', '2022-06-10', '2022-06-10', 'resuelto', 0),
(22, 11, 'los ratones han mordido los cables de alimentación', 2, '2022-06-10', '2022-06-10', '2022-06-13', 'resuelto', 1),
(23, 11, 'falta 1 monitor', 2, '2022-06-10', '0000-00-00', '2022-06-10', 'resuelto', 0),
(24, 11, 'mal contacto cable nº11', 2, '2022-06-10', '2022-06-10', '2022-06-16', 'resuelto', 0),
(25, 11, 'faltan 3 monitores', 2, '2022-06-10', '2022-06-16', '2022-06-16', 'resuelto', 1),
(26, 11, 'mesa coja', 2, '2022-06-10', '0000-00-00', '2022-06-16', 'resuelto', 1),
(27, 18, 'circuito pc 1 quemado', 2, '2022-06-10', '0000-00-00', '2022-06-13', 'resuelto', 1),
(28, 18, 'circuito pc1 quemado', 2, '2022-06-10', '2022-06-13', '2022-06-14', 'resuelto', 1),
(29, 11, 'cpu quemada ordenador 5', 2, '2022-06-12', '2022-06-16', '2022-06-17', 'resuelto', 1),
(30, 18, 'mesa rota fila 1, buscando celo', 2, '2022-06-14', '2022-06-14', '2022-06-16', 'resuelto', 0),
(31, 18, 'ordenador 1 ardiendo', 1, '2022-06-14', '0000-00-00', '2022-06-14', 'resuelto', 1),
(32, 3, 'hemos detectado una fuga en la junta de la trócola', 1, '2022-06-16', '0000-00-00', '2022-06-17', 'resuelto', 0),
(33, 3, 'hace mucho calor', 1, '2022-06-17', '0000-00-00', '2022-06-20', 'resuelto', 0),
(34, 11, 'cosas malillas', 1, '2022-06-20', '2022-06-21', '0000-00-00', 'en progreso', 0),
(35, 11, 'probando últimas funcionalidades', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(36, 3, 'estan pasando cosas', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 0),
(37, 11, 'están fallando los plomos', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(38, 3, 'se han saltado los plomos', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 0),
(39, 11, 'hay un problema', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(40, 11, 'nueva prueba', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(41, 18, 'fogata de ordenador', 2, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(42, 18, 'están fallando cosas', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(43, 18, 'incidencia de prueba', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(44, 18, 'han pasado cosas', 1, '2022-06-20', '0000-00-00', '2022-06-20', 'resuelto', 1),
(45, 11, 'reponer cables de alimentación', 1, '2022-06-21', '0000-00-00', '2022-06-21', 'resuelto', 1);

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
(45, 'manolillo23', 'manolillo23@iespoligonosur.org', 'me quiero registrar', '$2y$10$kirRHtvkn7RwFGFmAMDVw.ixVoPqwr1/85gih.ka1l6ZzMlzXnhOq');

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
(7, 'santi_534', '12345', 'usuarioRegistrado', 'santi_25@iespoligonosur.org', 1, 1),
(10, 'er_pejeta', '$2y$10$/mzpaZh5gaHjf34QW4IX.O/tZyceu9hHPgpw4VYgcYGRGQZex0tcS', 'usuarioRegistrado', 'pejeta@iespoligonosur.org', 1, 1),
(11, 'd´artagnan', '$2y$10$tTJSraV5AbrHB6sftaHGl.xH50CId0lIZm7PolKZr/FMAKlvC7/f2', 'usuarioRegistrado', 'unoparatodos@iespoligonosur.org', 1, 0),
(15, 'tomasito', '$2y$10$mrctYDXVtECg02BRzJAoce11uZ00TDdOnsWW33mANT7rp140yRdoy', 'usuarioRegistrado', 'tomasito_25@iespoligonosur.org', 1, 1),
(17, 'josemi_psur1', '$2y$10$xfUOAa8l2D6tguIrS7k3X.IeVsfl70ENRQgHZm0sttUchSV/zaIHq', 'usuarioRegistrado', 'josemi@iespoligonosur.org', 1, 1),
(18, 'foyone', '$2y$10$rHGPGBA8aVHBV7ucnDzR4OASL7lljNJDtWCwApsGjtExr3oupk7xa', 'usuarioRegistrado', 'foyone@iespoligonosur.org', 1, 1),
(26, 'javier_28', '$2y$10$OJEooU1TDmzwgtOtgi82ce2P9a3L23FB6cBtO.V/y.tWIy1VfjOzy', 'usuarioRegistrado', 'javi27@iespoligonosur.org', 1, 1),
(27, 'angel_23', '$2y$10$TnfnwTNBRf3LEThLdQnSk.ORq.5Cw1PJkKqE.tUAdkX0iLSHtD44y', 'usuarioRegistrado', 'angel_23@iespoligonosur.org', 1, 1),
(28, 'jc_reyes32', '$2y$10$DJQKSyZzWHhmhqSZYXKsPuVjOxoDZGt.xsZP9issmv1t.V6ryICNa', 'usuarioRegistrado', 'jc_reyes2@iespoligonosur.org', 1, 1),
(29, 'gerardo_picao', '$2y$10$keq5S41.ArtJ4e0459LxAebeLT0AuzKYVfpc1CnXjN.TyViZqO8wm', 'usuarioRegistrado', 'piquetero@iespoligonosur.org', 1, 1),
(30, 'antonio_fernandez1', '$2y$10$axSlJnKhZ/P5LGc0E54m.eTgS5f.Yt5nQUTr.aC/czcmqDgzGTCca', 'usuarioRegistrado', 'antfer@iespoligonosur.org', 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
