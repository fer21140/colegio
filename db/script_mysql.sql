-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-04-2022 a las 05:30:06
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id18714308_dbcolegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `carnet` varchar(100) NOT NULL,
  `primerNombre` varchar(100) NOT NULL,
  `segundoNombre` varchar(100) DEFAULT NULL,
  `tercerNombre` varchar(100) DEFAULT NULL,
  `primerApellido` varchar(100) NOT NULL,
  `segundoApellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fotografia` longblob DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `carnet`, `primerNombre`, `segundoNombre`, `tercerNombre`, `primerApellido`, `segundoApellido`, `direccion`, `telefono`, `usuario`, `password`, `fotografia`, `estado`, `fecha_commit`) VALUES
(13, 'D438DYMU', 'FERNANDO', 'JOSÉ', '', 'MARTÍNEZ', 'FLORES', 'BARRIO EL CEMENTERIO, SAN CRISTÓBAL ACASAGUASTLÁ', 41392318, 'fer21140', '12345', NULL, 1, '2022-03-02 16:52:38'),
(14, 'KN21JH', 'DANNY', 'JUNIOR', NULL, 'FLORES', 'SÁNCHEZ', 'BARRIO EL CEMENTERIO', 323183819, 'danyf', '12345', NULL, 1, '2022-04-02 00:41:28'),
(15, 'D46TGD', 'ALVARO', 'DANIEL', '', 'ORTEGA', 'FUENTES', 'BARRIO BELLA VISTA', 56438765, 'aortegad46tgd', 'El3zyvigIT', NULL, 1, '2022-04-03 05:23:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_alumno` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefonoCelular` int(11) NOT NULL,
  `telefonoCasa` int(11) DEFAULT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `id_alumno`, `nombres`, `apellidos`, `direccion`, `telefonoCelular`, `telefonoCasa`, `fecha_commit`) VALUES
(16, 13, 'MARÍA DOLORES', 'CASTRO FALLA', 'BARRIO EL CEMENTERIO, SAN CRISTÓBAL ACASAGUASTLÁ', 2147483647, 2147483647, '2022-03-07 15:32:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_profesor` int(10) UNSIGNED NOT NULL,
  `id_grado` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fin` varchar(45) NOT NULL,
  `dias_semana` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `id_profesor`, `id_grado`, `nombre`, `hora_inicio`, `hora_fin`, `dias_semana`, `estado`, `fecha_commit`) VALUES
(40, 11, 14, 'IDIOMA ESPANOL', '07:00', '08:00', '2345', 1, '2022-03-02 22:45:52'),
(41, 10, 14, 'MATEMÁTICA', '08:00', '08:30', '12345', 1, '2022-03-02 22:46:34'),
(42, 11, 14, 'AMBIENTE SOCIAL Y NATURAL', '08:30', '09:00', '12345', 1, '2022-03-02 22:47:01'),
(43, 11, 14, 'BELLEZA TRABAJO Y RECREACIÓN', '09:00', '09:30', '12345', 1, '2022-03-02 22:47:50'),
(44, 11, 14, 'IDIOMA INGLÉS', '10:00', '10:30', '12345', 1, '2022-03-02 22:48:35'),
(45, 11, 14, 'MORAL', '10:30', '11:00', '12345', 1, '2022-03-02 22:49:04'),
(46, 11, 14, 'EDUCACIÓN FÍSICA', '11:00', '12:00', '3', 1, '2022-03-02 22:50:17'),
(47, 11, 14, 'COMPUTACIÓN', '12:00', '12:30', '12345', 1, '2022-03-02 22:50:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`, `estado`, `fecha_commit`) VALUES
(1, 'PREPRIMARIA', 1, '2021-02-05 14:02:52'),
(14, 'PRIMERO PRIMARIA', 1, '2021-03-14 23:52:21'),
(15, 'SEGUNDO PRIMARIA', 1, '2022-01-08 15:33:35'),
(16, 'TERCERO PRIMARIA', 1, '2022-01-08 15:57:26'),
(17, 'CUARTO PRIMARIA', 1, '2022-01-08 15:57:35'),
(18, 'QUINTO PRIMARIA', 1, '2022-01-08 15:57:43'),
(19, 'SEXTO PRIMARIA', 1, '2022-01-08 15:57:50'),
(20, 'PRIMERO BÁSICO', 1, '2022-01-08 15:57:57'),
(21, 'SEGUNDO BÁSICO', 1, '2022-01-08 15:58:04'),
(22, 'TERCERO BÁSICO', 1, '2022-01-08 15:58:14'),
(23, '4TO BACHILLERATO EN CIENCIAS Y LETRAS CON ORIENTACIÓN EN COMPUTACIÓN', 1, '2022-03-01 17:00:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_alumno` int(10) UNSIGNED NOT NULL,
  `id_grado` int(10) UNSIGNED NOT NULL,
  `valor_inscripcion` float NOT NULL,
  `valor_mensual` float NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `id_alumno`, `id_grado`, `valor_inscripcion`, `valor_mensual`, `estado`, `fecha_commit`, `anio`) VALUES
(25, 13, 14, 150, 160, 1, '2022-03-02 22:53:11', 2022),
(26, 13, 14, 160, 160, 1, '2022-03-12 22:30:24', 2021),
(27, 14, 14, 150, 160, 1, '2022-04-03 02:41:50', 2022);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(10) NOT NULL,
  `id_operacion` int(10) UNSIGNED NOT NULL,
  `id_usuario_receptor` int(10) UNSIGNED NOT NULL,
  `id_usuario_operacion` int(10) UNSIGNED NOT NULL,
  `total` float NOT NULL,
  `numero_comprobante` text NOT NULL,
  `fotografia_comprobante` longblob NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `id_operacion`, `id_usuario_receptor`, `id_usuario_operacion`, `total`, `numero_comprobante`, `fotografia_comprobante`, `estado`, `fecha_commit`) VALUES
(38, 9, 13, 1, 150, '313123123', '', 1, '2022-03-02 22:58:35'),
(39, 10, 13, 1, 160, '3123131', '', 1, '2022-03-02 22:58:45'),
(40, 10, 13, 1, 160, '123123213', '', 1, '2022-03-02 22:58:58'),
(41, 10, 13, 1, 160, '321312323', '', 1, '2022-03-02 22:59:08'),
(42, 11, 13, 1, 30000, '2903434', '', 1, '2022-04-01 01:59:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED NOT NULL,
  `id_alumno` int(10) UNSIGNED NOT NULL,
  `bimestre` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `nota` float NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_curso`, `id_alumno`, `bimestre`, `anio`, `nota`, `fecha_commit`) VALUES
(72, 40, 13, 1, 2022, 25, '2022-03-02 22:54:19'),
(73, 40, 13, 2, 2022, 21, '2022-03-02 22:54:23'),
(74, 40, 13, 3, 2022, 18, '2022-03-02 22:54:29'),
(75, 40, 13, 4, 2022, 20, '2022-03-02 22:54:34'),
(76, 41, 13, 1, 2022, 18, '2022-03-02 22:54:42'),
(77, 41, 13, 2, 2022, 22, '2022-03-02 22:54:47'),
(78, 41, 13, 3, 2022, 19, '2022-03-02 22:54:54'),
(79, 41, 13, 4, 2022, 21, '2022-03-02 22:54:59'),
(80, 42, 13, 1, 2022, 17, '2022-03-02 22:55:06'),
(81, 42, 13, 2, 2022, 23, '2022-03-02 22:55:12'),
(82, 42, 13, 3, 2022, 22, '2022-03-02 22:55:18'),
(83, 42, 13, 4, 2022, 19, '2022-03-02 22:55:24'),
(84, 43, 13, 1, 2022, 25, '2022-03-02 22:55:31'),
(85, 43, 13, 2, 2022, 23, '2022-03-02 22:55:38'),
(86, 43, 13, 3, 2022, 19, '2022-03-02 22:55:43'),
(87, 43, 13, 4, 2022, 25, '2022-03-02 22:55:51'),
(88, 44, 13, 1, 2022, 24, '2022-03-02 22:55:58'),
(89, 44, 13, 2, 2022, 21, '2022-03-02 22:56:03'),
(90, 44, 13, 3, 2022, 22, '2022-03-02 22:56:09'),
(91, 44, 13, 4, 2022, 19, '2022-03-02 22:56:15'),
(92, 45, 13, 1, 2022, 23, '2022-03-02 22:56:21'),
(93, 45, 13, 2, 2022, 20, '2022-03-02 22:56:26'),
(94, 45, 13, 3, 2022, 18, '2022-03-02 22:56:32'),
(95, 45, 13, 4, 2022, 25, '2022-03-02 22:56:37'),
(96, 46, 13, 1, 2022, 20, '2022-03-02 22:56:43'),
(97, 46, 13, 2, 2022, 20, '2022-03-02 22:56:48'),
(98, 46, 13, 3, 2022, 25, '2022-03-02 22:56:54'),
(99, 46, 13, 4, 2022, 21, '2022-03-02 22:56:59'),
(100, 47, 13, 1, 2022, 19, '2022-03-02 22:57:05'),
(101, 47, 13, 2, 2022, 24, '2022-03-02 22:57:12'),
(102, 47, 13, 3, 2022, 18, '2022-03-02 22:57:18'),
(103, 47, 13, 4, 2022, 25, '2022-03-02 22:57:28'),
(104, 40, 13, 1, 2021, 19, '2022-04-01 04:06:10'),
(105, 40, 13, 2, 2021, 21, '2022-04-01 04:06:30'),
(106, 40, 13, 3, 2021, 20, '2022-04-01 04:15:01'),
(107, 40, 14, 1, 2022, 22, '2022-04-03 02:44:12'),
(108, 41, 14, 1, 2022, 25, '2022-04-03 02:44:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `costo` float NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `credito_debito` tinyint(4) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `id_usuario`, `nombre`, `descripcion`, `costo`, `fecha_commit`, `credito_debito`, `estado`) VALUES
(9, 1, 'INSCRIPCIÓN PRIMARIA', 'PAGO DE INSCRIPCIÓN CORRESPONDIENTE AL NIVEL ACADÉMICO PRIMARIA', 150, '2021-03-14 23:57:31', 1, 1),
(10, 1, 'MENSUALIDAD NIVEL PRIMARIA', 'PAGO CORRESPONDIENTE A LA MENSUALIDAD DEL NIVEL ACADÉMICO PRIMARIA', 160, '2021-03-14 23:58:44', 1, 1),
(11, 1, 'INSCRIPCIÓN BÁSICOS', 'PAGO CORRESPONDIENTE A LA INSCRIPCIÓN DEL NIVEL ACADÉMICO BÁSICOS', 200, '2022-01-09 15:14:18', 1, 1),
(12, 1, 'MENSUALIDAD NIVEL BÁSICOS', 'PAGO CORRESPONDIENTE A LA MENSUALIDAD DEL NIVEL ACADÉMICO DE BÁSICOS', 180, '2022-01-09 15:47:16', 1, 1),
(13, 1, 'INSCRIPCIÓN BACHILLERATO EN COMPUTACIÓN', 'PAGO CORRESPONDIENTE A LA INSCRIPCIÓN DEL NIVEL ACADÉMICO BACHILLERATO EN CIENCIAS Y LETRAS CON ORIENTACIÓN EN COMPUTACIÓN', 225, '2022-01-10 03:54:54', 1, 1),
(14, 1, 'MENSUALIDAD BACHILLER EN COMPUTACIÓN', 'PAGO CORRESPONDIENTE A LA MENSUALIDAD DEL NIVEL ACADÉMICO BACHILLERATO EN CIENCIAS Y LETRAS CON ORIENTACIÓN EN COMPUTACIÓN', 250, '2022-01-10 03:57:07', 1, 1),
(15, 1, 'CABLE', 'PAGO DE SERVICIO DE CABLE', 100, '2022-03-02 04:31:00', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilla`
--

CREATE TABLE `planilla` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `salario_ordinario` float NOT NULL,
  `abono` float NOT NULL,
  `descuento` float NOT NULL,
  `numero_cheque` float NOT NULL,
  `sueldo_liquido` float NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planilla`
--

INSERT INTO `planilla` (`id`, `id_empleado`, `mes`, `anio`, `salario_ordinario`, `abono`, `descuento`, `numero_cheque`, `sueldo_liquido`, `fecha_commit`) VALUES
(9, 11, 2, 2022, 3000, 300, 200, 910901, 2500, '2022-04-01 02:16:01'),
(11, 10, 4, 2022, 2000, 250, 300, 90903100, 1450, '2022-04-01 04:11:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldos`
--

CREATE TABLE `sueldos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `sueldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sueldos`
--

INSERT INTO `sueldos` (`id`, `id_empleado`, `sueldo`) VALUES
(10, 11, 3500),
(11, 10, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroles`
--

CREATE TABLE `tblroles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblroles`
--

INSERT INTO `tblroles` (`id`, `nombre`, `fecha_commit`) VALUES
(1, 'Administrador', '2021-02-05 13:56:27'),
(2, 'Profesor', '2021-02-05 13:56:41'),
(3, 'Estudiante', '2021-02-05 13:56:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rol` int(10) UNSIGNED NOT NULL,
  `dpi` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `fotografia` longblob DEFAULT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`id`, `id_rol`, `dpi`, `nombres`, `apellidos`, `email`, `password`, `telefono`, `fotografia`, `fecha_commit`, `estado`) VALUES
(1, 1, '3053379550208', 'FERNANDO JOSÉ', 'MARTINEZ FLORES', 'ferfer21140@gmail.com', 'Fer.2020', 41057814, '', '2021-02-05 13:58:14', 1),
(10, 2, '3032274770332', 'EVERILDO', 'BAILÓN MORALES', 'everildo@gmail.com', '12345', 41392318, NULL, '2022-03-02 22:38:26', 1),
(11, 2, '2313012301230', 'CARLOS ENRIQUE', 'GUDIEL AQUINO', 'carlosenrique@gmail.com', '12345', 123131011, NULL, '2022-03-02 22:43:39', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contactos_alumnos_idx` (`id_alumno`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cursos_profesor_usuario_idx` (`id_profesor`),
  ADD KEY `fk_cursos_grados_idx` (`id_grado`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matricula_idx` (`id_alumno`),
  ADD KEY `fk_matricula_grado_idx` (`id_grado`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mov_opera` (`id_operacion`),
  ADD KEY `fora_movimientos_usuarios` (`id_usuario_operacion`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nota_curso_idx` (`id_curso`),
  ADD KEY `fk_nota_alumno_idx` (`id_alumno`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operaciones_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_planilla_usuario_idx` (`id_empleado`);

--
-- Indices de la tabla `sueldos`
--
ALTER TABLE `sueldos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sueldos_usuarios_idx` (`id_empleado`);

--
-- Indices de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rol_tblusuarios_tblroles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `planilla`
--
ALTER TABLE `planilla`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sueldos`
--
ALTER TABLE `sueldos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contactos_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_grados` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cursos_profesor_usuario` FOREIGN KEY (`id_profesor`) REFERENCES `tblusuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_matricula_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matricula_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_mov_opera` FOREIGN KEY (`id_operacion`) REFERENCES `operaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fora_movimientos_usuarios` FOREIGN KEY (`id_usuario_operacion`) REFERENCES `tblusuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_nota_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD CONSTRAINT `fk_operaciones_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tblusuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD CONSTRAINT `fk_planilla_usuario` FOREIGN KEY (`id_empleado`) REFERENCES `tblusuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sueldos`
--
ALTER TABLE `sueldos`
  ADD CONSTRAINT `fk_sueldos_usuarios` FOREIGN KEY (`id_empleado`) REFERENCES `tblusuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD CONSTRAINT `fk_rol_tblusuarios_tblroles` FOREIGN KEY (`id_rol`) REFERENCES `tblroles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
