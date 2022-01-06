-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2021 a las 22:01:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistente`
--

CREATE TABLE `asistente` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `chapa_identificacion` varchar(100) DEFAULT NULL,
  `no_unidad` varchar(100) DEFAULT NULL,
  `institucion` varchar(150) DEFAULT NULL,
  `otra_institucion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistente`
--

INSERT INTO `asistente` (`id`, `id_boleta`, `nombre`, `chapa_identificacion`, `no_unidad`, `institucion`, `otra_institucion`) VALUES
(19, 1, 'JOSÉ RODOLFO FLORES RUIZ', '1010', '101', 'PNC', 'NO INDICA'),
(20, 1, 'MARIA DOLORES CASTRO FALLA', '401', '100', 'PNC', 'NO INDICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `codigo_boleta` int(10) UNSIGNED NOT NULL,
  `boletas_asociadas` varchar(300) DEFAULT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_commit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`codigo_boleta`, `boletas_asociadas`, `fecha_commit`, `usuario_commit`) VALUES
(1, NULL, '2021-10-18 17:43:53', 1),
(10010, NULL, '2021-10-23 19:58:44', 1),
(20001, NULL, '2021-10-30 16:48:07', 1),
(40000, NULL, '2021-10-30 16:58:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clima`
--

CREATE TABLE `clima` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clima`
--

INSERT INTO `clima` (`id`, `nombre`, `estado`, `fecha_commit`) VALUES
(1, 'SECO', 1, '2021-09-17 16:58:21'),
(2, 'LLUVIOSO', 1, '2021-09-17 16:58:21'),
(3, 'NEBLINA', 1, '2021-09-17 16:59:03'),
(4, 'VIENTO FUERTE', 1, '2021-09-17 16:59:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` int(10) UNSIGNED DEFAULT NULL,
  `domicilio` varchar(250) DEFAULT NULL,
  `estado_conductor` varchar(100) DEFAULT NULL,
  `conductor_consignado` int(11) DEFAULT NULL,
  `lugar_de_traslado` varchar(200) DEFAULT NULL,
  `sintomas_ebriedad` int(11) DEFAULT NULL,
  `grados` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id`, `id_boleta`, `nombre`, `edad`, `sexo`, `domicilio`, `estado_conductor`, `conductor_consignado`, `lugar_de_traslado`, `sintomas_ebriedad`, `grados`) VALUES
(38, 1, 'Fernando José Martínez Flores', 22, 1, 'San Cristóbal Acasaguastlán, El Progreso', 'ILESO', 2, 'NINGUNO', 2, '10'),
(39, 1, 'ADRIAN JOSUÉ MEJÍA GALDÁMEZ', 23, 1, 'Estanzuela, Zacapa', 'FUGADO', 2, 'NO INDICA', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_commit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `estado`, `fecha_commit`, `usuario_commit`) VALUES
(1, 'ZACAPA', 1, '2021-09-16 02:44:11', 1),
(2, 'EL PROGRESO', 1, '2021-10-17 18:35:33', 1),
(3, 'CHIQUIMULA', 1, '2021-10-17 23:01:24', 1),
(4, 'IZABAL', 1, '2021-12-14 23:52:36', 1),
(5, 'PETÉN', 1, '2021-12-14 23:54:26', 1),
(6, 'QUICHÉ', 1, '2021-12-14 23:56:43', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iluminacion`
--

CREATE TABLE `iluminacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `iluminacion`
--

INSERT INTO `iluminacion` (`id`, `nombre`, `estado`, `fecha_commit`) VALUES
(1, 'NATURAL', 1, '2021-09-17 16:57:42'),
(2, 'ARTIFICIAL', 1, '2021-09-17 16:57:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `porta_licencia` int(11) NOT NULL,
  `estado_licencia` varchar(100) DEFAULT NULL,
  `tipo_licencia` varchar(100) DEFAULT NULL,
  `no_licencia` varchar(100) DEFAULT NULL,
  `consignada` int(11) DEFAULT NULL,
  `autoridad_consignadora` varchar(150) DEFAULT NULL,
  `doc_consignado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id`, `id_boleta`, `porta_licencia`, `estado_licencia`, `tipo_licencia`, `no_licencia`, `consignada`, `autoridad_consignadora`, `doc_consignado`) VALUES
(28, 1, 1, 'ALTERADA', 'C', '3053379550204', 2, 'NINGUNO', 'NINGUNO'),
(29, 1, 2, 'NO PORTA LICENCIA', 'NO INDICA', 'NO INDICA', 2, 'NINGUNO', 'NINGUNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_departamento` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_commit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `id_departamento`, `nombre`, `estado`, `fecha_commit`, `usuario_commit`) VALUES
(3, 1, 'ZACAPA', 1, '2021-09-16 02:46:39', 1),
(4, 1, 'TECULUTÁN', 1, '2021-10-17 23:10:45', 1),
(5, 1, 'USUMATLÁN', 1, '2021-10-17 23:11:48', 1),
(7, 2, 'SAN CRISTÓBAL ACASAGUASTLÁN', 1, '2021-12-15 02:56:26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id`, `id_boleta`, `descripcion`) VALUES
(15, 1, 'LOS SEÑORES INVOLUCRADOS LLEGARON A ACUERDOS VERBALES CON LA ASEGURADORA PARA DEFINIR LOS TÉRMINOS DE NEGOCIACIÓN DE PÉRDIDAS EQUITATIVAS PARA AMBOS CONDUCTORES, POR LO QUE EL TESTIGO ASISTENTE 1 Y ASISTENTE 2 DAN FE DE LO PACTADO.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `estado`, `fecha_commit`) VALUES
(1, 'SUPERVISOR', 1, '2021-09-15 19:45:58'),
(2, 'AGENTE', 1, '2021-09-15 19:45:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion1`
--

CREATE TABLE `seccion1` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `boleta_siguiente` int(11) NOT NULL,
  `inicio` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `departamento` int(10) UNSIGNED NOT NULL,
  `municipio` int(10) UNSIGNED NOT NULL,
  `area` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `sentido_via` varchar(100) DEFAULT NULL,
  `aldea` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `km` float DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_commit` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion1`
--

INSERT INTO `seccion1` (`id`, `id_boleta`, `boleta_siguiente`, `inicio`, `fin`, `departamento`, `municipio`, `area`, `ruta`, `sentido_via`, `aldea`, `direccion`, `km`, `fecha`, `hora`, `fecha_commit`) VALUES
(20, 1, 2, 1, 2, 1, 3, 0, 'CA-9', 'CARRIL IZQUIERDO', 'ALDEA EL MANZANAL', '2DA A, ZONA 1', 10, '2021-10-18', '11:44:00', 'CURRENT_TIMESTAMP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion2`
--

CREATE TABLE `seccion2` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `tipo_de_hecho` varchar(100) NOT NULL,
  `tipo_de_choque` varchar(100) DEFAULT NULL,
  `otro_especifique` varchar(100) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion2`
--

INSERT INTO `seccion2` (`id`, `id_boleta`, `tipo_de_hecho`, `tipo_de_choque`, `otro_especifique`, `observaciones`) VALUES
(19, 1, 'CHOQUE', 'FRONTAL', 'NO INDICA', 'TENDIDO ELÉCTRICO DAÑADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion3`
--

CREATE TABLE `seccion3` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `id_sexo` int(10) UNSIGNED NOT NULL,
  `edad` int(11) NOT NULL,
  `id_tipo_persona` int(10) UNSIGNED NOT NULL,
  `id_tipo_consecuencia` int(10) UNSIGNED NOT NULL,
  `num_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion3`
--

INSERT INTO `seccion3` (`id`, `id_boleta`, `id_sexo`, `edad`, `id_tipo_persona`, `id_tipo_consecuencia`, `num_vehiculo`) VALUES
(63, 1, 1, 20, 1, 1, 1),
(64, 1, 2, 20, 2, 1, 2),
(65, 1, 2, 22, 1, 2, 1),
(66, 1, 2, 21, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion4`
--

CREATE TABLE `seccion4` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `tipo_senal` int(10) UNSIGNED NOT NULL,
  `estado_tiempo` int(10) UNSIGNED NOT NULL,
  `tipo_iluminacion` int(10) UNSIGNED NOT NULL,
  `otra_senal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion4`
--

INSERT INTO `seccion4` (`id`, `id_boleta`, `tipo_senal`, `estado_tiempo`, `tipo_iluminacion`, `otra_senal`) VALUES
(34, 1, 2, 1, 1, 'NO INDICA'),
(35, 1, 6, 1, 1, 'NO INDICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion7`
--

CREATE TABLE `seccion7` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `no_pas_accidentados` int(11) DEFAULT NULL,
  `hubo_lesionados` int(11) NOT NULL,
  `hubo_fallecidos` int(11) NOT NULL,
  `lesionados` int(11) DEFAULT NULL,
  `lesionados_leves` int(11) DEFAULT NULL,
  `lesionados_graves` int(11) DEFAULT NULL,
  `trasladador_lesionados` varchar(100) DEFAULT NULL,
  `fallecidos` int(11) DEFAULT NULL,
  `trasladador_fallecidos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion7`
--

INSERT INTO `seccion7` (`id`, `id_boleta`, `no_pas_accidentados`, `hubo_lesionados`, `hubo_fallecidos`, `lesionados`, `lesionados_leves`, `lesionados_graves`, `trasladador_lesionados`, `fallecidos`, `trasladador_fallecidos`) VALUES
(20, 1, 5, 1, 1, 2, 1, 1, 'BV', 2, 'BV'),
(21, 1, 4, 1, 1, 4, 2, 2, 'BV', 1, 'BV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion8`
--

CREATE TABLE `seccion8` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `cinturon` int(11) DEFAULT NULL,
  `silla_p_bebe` int(11) DEFAULT NULL,
  `casco` int(11) DEFAULT NULL,
  `falta_equipo_seg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion8`
--

INSERT INTO `seccion8` (`id`, `id_boleta`, `cinturon`, `silla_p_bebe`, `casco`, `falta_equipo_seg`) VALUES
(22, 1, 1, 2, 2, 1),
(23, 1, 1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion9`
--

CREATE TABLE `seccion9` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `material_via` varchar(100) DEFAULT NULL,
  `topografia` varchar(100) DEFAULT NULL,
  `caract_geometricas` varchar(100) DEFAULT NULL,
  `direccion_via` varchar(100) DEFAULT NULL,
  `condicion_via` varchar(100) DEFAULT NULL,
  `senalizacion` varchar(100) DEFAULT NULL,
  `observacion_senalizacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion9`
--

INSERT INTO `seccion9` (`id`, `id_boleta`, `material_via`, `topografia`, `caract_geometricas`, `direccion_via`, `condicion_via`, `senalizacion`, `observacion_senalizacion`) VALUES
(12, 1, 'ASFALTO', 'SUBIDA', 'RECTA', 'UNA SOLA DIRECCIÓN', 'SECA', 'EXISTE', 'CARRETERA CON DEMASIADO BACHEO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion10`
--

CREATE TABLE `seccion10` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `acuerdo_iniciativa_propia` int(11) DEFAULT NULL,
  `acuerdo_por_aseguradora` int(11) DEFAULT NULL,
  `nombre_aseguradora` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion10`
--

INSERT INTO `seccion10` (`id`, `id_boleta`, `acuerdo_iniciativa_propia`, `acuerdo_por_aseguradora`, `nombre_aseguradora`) VALUES
(18, 1, 1, 2, 'NO INDICA'),
(19, 1, 2, 1, 'ASEGURADORA RURAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senal`
--

CREATE TABLE `senal` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `senal`
--

INSERT INTO `senal` (`id`, `nombre`, `estado`, `fecha_commit`) VALUES
(1, 'EXCESO DE VELOCIDAD', 1, '2021-09-17 16:53:36'),
(2, 'NO REBASAR', 1, '2021-09-17 16:53:36'),
(3, 'VIRAJE PROHIBIDO', 1, '2021-09-17 16:54:02'),
(4, 'CIRCULAR EN VÍA CONTRARIA', 1, '2021-09-17 16:54:02'),
(5, 'EXCESO DE PASAJEROS', 1, '2021-09-17 16:54:31'),
(6, 'EXCESO DE CARGA', 1, '2021-09-17 16:54:31'),
(7, 'CEDER EL PASO', 1, '2021-09-17 16:54:58'),
(8, 'ESTACIONAMIENTO PROHIBIDO', 1, '2021-09-17 16:54:58'),
(9, 'NO VIRAR EN U', 1, '2021-09-17 16:55:14'),
(10, 'ALTO', 1, '2021-09-17 16:55:14'),
(11, 'UNA VÍA', 1, '2021-09-17 16:55:38'),
(12, 'NO LLEVAR LUCES ENCENDIDAS (SI ES DE NOCHE)', 1, '2021-09-17 16:55:38'),
(13, 'NO VIRAR A LA IZQUIERDA', 1, '2021-09-17 16:56:21'),
(14, 'OTRA', 1, '2021-09-17 16:56:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `nombre`, `fecha_commit`) VALUES
(1, 'HOMBRE', '2021-09-15 19:46:16'),
(2, 'MUJER', '2021-09-15 19:46:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoconsecuencia`
--

CREATE TABLE `tipoconsecuencia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoconsecuencia`
--

INSERT INTO `tipoconsecuencia` (`id`, `nombre`, `fecha_commit`) VALUES
(1, 'A. PERSONAS LESIONADAS', '2021-09-15 19:47:53'),
(2, 'B. PERSONAS FALLECIDAS', '2021-09-15 19:47:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersona`
--

CREATE TABLE `tipopersona` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopersona`
--

INSERT INTO `tipopersona` (`id`, `nombre`, `fecha_commit`) VALUES
(1, 'PEATÓN', '2021-09-15 19:48:21'),
(2, 'PASAJERO', '2021-09-15 19:48:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`id`, `nombre`, `estado`, `fecha_commit`) VALUES
(1, 'MOTOCICLETA', 1, '2021-09-15 19:49:36'),
(2, 'MOTOTAXI', 1, '2021-09-15 19:49:36'),
(3, 'AUTOMÓVIL', 1, '2021-09-15 19:49:53'),
(4, 'PICK-UP', 1, '2021-09-15 19:49:53'),
(5, 'VEHÍCULO AGRÍCOLA', 1, '2021-09-15 19:50:21'),
(6, 'MICROBÚS', 1, '2021-09-15 19:50:21'),
(7, 'PANEL', 1, '2021-09-15 19:50:38'),
(8, 'CAMIONETA', 1, '2021-09-15 19:50:38'),
(9, 'BUS URBANO', 1, '2021-09-15 19:51:00'),
(10, 'BUS EXTRAURBANO', 1, '2021-09-15 19:51:00'),
(11, 'BUS ESCOLAR', 1, '2021-09-15 19:51:19'),
(12, 'BUS DE TURISMO', 1, '2021-09-15 19:51:19'),
(13, 'CAMIÓN', 1, '2021-09-15 19:51:34'),
(14, 'CABEZAL', 1, '2021-09-15 19:51:34'),
(15, 'FURGÓN', 1, '2021-09-15 19:51:49'),
(16, 'REMOLQUE', 1, '2021-09-15 19:51:49'),
(17, 'GRÚA', 1, '2021-09-15 19:52:08'),
(18, 'PLATAFORMA', 1, '2021-09-15 19:52:08'),
(19, 'TRACTOR', 1, '2021-09-15 19:53:46'),
(20, 'OTRO TIPO, ESPECIFÍQUE', 1, '2021-09-15 19:53:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rol` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_commit` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_commit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_rol`, `nombres`, `apellidos`, `correo`, `password`, `estado`, `fecha_commit`, `usuario_commit`) VALUES
(1, 1, 'Fernando José', 'Martínez Flores', 'ferfer21140@gmail.com', '12345', 1, '2021-09-15 19:46:44', 0),
(5, 2, ' Samuel Estuardo', ' Ramirez Garcia', 'sam0411@gmail.com', 'asdfg', 1, '2021-09-18 18:35:38', 1),
(9, 1, 'José Andres', 'Hernández Flores', 'joseandres21140@gmail.com', '12345', 1, '2021-10-18 00:01:11', 1),
(10, 1, 'Oscar René', 'Ortíz', 'oscarortiz2021@gmail.com', '12345', 1, '2021-10-18 00:02:31', 1),
(11, 1, 'Maria Dolores', 'Castro Falla', 'mcastro@gmail.com', '12345', 1, '2021-10-18 00:19:34', 1),
(14, 1, 'Marcos Daniel', 'López Alonso', 'marcos2021@gmail.com', '12345', 1, '2021-12-14 18:21:44', 10),
(15, 1, 'Juan Manuel', 'Sánchez López', 'juanmanuel@gmail.com', '12345', 1, '2021-12-16 20:38:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculoinvolucrado`
--

CREATE TABLE `vehiculoinvolucrado` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_boleta` int(10) UNSIGNED NOT NULL,
  `placa` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `tarjeta_circulacion` varchar(150) DEFAULT NULL,
  `consignado` int(11) DEFAULT -1,
  `consignador` varchar(100) DEFAULT NULL,
  `tipo_vehiculo` int(10) UNSIGNED NOT NULL,
  `servicio` varchar(100) DEFAULT NULL,
  `especifique_otro_vehiculo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculoinvolucrado`
--

INSERT INTO `vehiculoinvolucrado` (`id`, `id_boleta`, `placa`, `color`, `marca`, `modelo`, `tarjeta_circulacion`, `consignado`, `consignador`, `tipo_vehiculo`, `servicio`, `especifique_otro_vehiculo`) VALUES
(27, 1, 'P-258BFJ', 'BLANCO', 'TOYOTA', '1994', '10010', 0, 'NINGUNO', 4, 'NO INDICA', 'NO INDICA'),
(28, 1, 'P060HMS', 'GRIS', 'MITSUBISHI', '2007', '4010201', 1, 'PNC', 8, 'NO INDICA', 'NO INDICA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistente`
--
ALTER TABLE `asistente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_BOLETA_BOLETA_idx` (`id_boleta`);

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`codigo_boleta`),
  ADD KEY `fk_boleta_usuario_idx` (`usuario_commit`);

--
-- Indices de la tabla `clima`
--
ALTER TABLE `clima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_BOLETA_BOLETA_idx` (`id_boleta`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_departamento_usuario_idx` (`usuario_commit`);

--
-- Indices de la tabla `iluminacion`
--
ALTER TABLE `iluminacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_boleta` (`id_boleta`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio_departamento_idx` (`id_departamento`),
  ADD KEY `fk_municipio_usuario_idx` (`usuario_commit`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_observaciones_idx` (`id_boleta`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccion1`
--
ALTER TABLE `seccion1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sec1_departamento_idx` (`departamento`),
  ADD KEY `fk_sec1_municipio_idx` (`municipio`),
  ADD KEY `fk_sec1_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion2`
--
ALTER TABLE `seccion2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sec2_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion3`
--
ALTER TABLE `seccion3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sub3_sexo_idx` (`id_sexo`),
  ADD KEY `fk_sub3_tipo_idx` (`id_tipo_persona`),
  ADD KEY `fk_sub3_tipo_consecuencia_idx` (`id_tipo_consecuencia`),
  ADD KEY `fk_sec3_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion4`
--
ALTER TABLE `seccion4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sec4_senal_idx` (`tipo_senal`),
  ADD KEY `fk_sec4_iluminacion_idx` (`tipo_iluminacion`),
  ADD KEY `fk_sec4_clima_idx` (`estado_tiempo`),
  ADD KEY `fk_sec4_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion7`
--
ALTER TABLE `seccion7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sec7_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion8`
--
ALTER TABLE `seccion8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sec8_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion9`
--
ALTER TABLE `seccion9`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sec9_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `seccion10`
--
ALTER TABLE `seccion10`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idboleta_boleta_idx` (`id_boleta`);

--
-- Indices de la tabla `senal`
--
ALTER TABLE `senal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoconsecuencia`
--
ALTER TABLE `tipoconsecuencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_rol_idx` (`id_rol`);

--
-- Indices de la tabla `vehiculoinvolucrado`
--
ALTER TABLE `vehiculoinvolucrado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SEC6_TIPO_VEHICULO_idx` (`tipo_vehiculo`),
  ADD KEY `FK_SEC6_BOLETA_idx` (`id_boleta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistente`
--
ALTER TABLE `asistente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clima`
--
ALTER TABLE `clima`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `iluminacion`
--
ALTER TABLE `iluminacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seccion1`
--
ALTER TABLE `seccion1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `seccion2`
--
ALTER TABLE `seccion2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `seccion3`
--
ALTER TABLE `seccion3`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `seccion4`
--
ALTER TABLE `seccion4`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `seccion7`
--
ALTER TABLE `seccion7`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `seccion8`
--
ALTER TABLE `seccion8`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `seccion9`
--
ALTER TABLE `seccion9`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `seccion10`
--
ALTER TABLE `seccion10`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `senal`
--
ALTER TABLE `senal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoconsecuencia`
--
ALTER TABLE `tipoconsecuencia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vehiculoinvolucrado`
--
ALTER TABLE `vehiculoinvolucrado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistente`
--
ALTER TABLE `asistente`
  ADD CONSTRAINT `FK_ID_BOLETA_BOLETA_GENERAL` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `fk_boleta_usuario` FOREIGN KEY (`usuario_commit`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `FK_ID_BOLETA_BOLETA` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_usuario` FOREIGN KEY (`usuario_commit`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD CONSTRAINT `fk_idBoletaConductor_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`),
  ADD CONSTRAINT `licencia_ibfk_1` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_municipio_usuario` FOREIGN KEY (`usuario_commit`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `fk_observaciones` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion1`
--
ALTER TABLE `seccion1`
  ADD CONSTRAINT `fk_sec1_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sec1_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sec1_municipio` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion2`
--
ALTER TABLE `seccion2`
  ADD CONSTRAINT `fk_sec2_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion3`
--
ALTER TABLE `seccion3`
  ADD CONSTRAINT `fk_sec3_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sub3_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sub3_tipo` FOREIGN KEY (`id_tipo_persona`) REFERENCES `tipopersona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sub3_tipo_consecuencia` FOREIGN KEY (`id_tipo_consecuencia`) REFERENCES `tipoconsecuencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion4`
--
ALTER TABLE `seccion4`
  ADD CONSTRAINT `fk_sec4_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sec4_clima` FOREIGN KEY (`estado_tiempo`) REFERENCES `clima` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sec4_iluminacion` FOREIGN KEY (`tipo_iluminacion`) REFERENCES `iluminacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sec4_senal` FOREIGN KEY (`tipo_senal`) REFERENCES `senal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion7`
--
ALTER TABLE `seccion7`
  ADD CONSTRAINT `fk_sec7_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion8`
--
ALTER TABLE `seccion8`
  ADD CONSTRAINT `fk_sec8_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion9`
--
ALTER TABLE `seccion9`
  ADD CONSTRAINT `fk_sec9_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion10`
--
ALTER TABLE `seccion10`
  ADD CONSTRAINT `fk_idboleta_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculoinvolucrado`
--
ALTER TABLE `vehiculoinvolucrado`
  ADD CONSTRAINT `FK_SEC6_BOLETA` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`codigo_boleta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_SEC6_TIPO_VEHICULO` FOREIGN KEY (`tipo_vehiculo`) REFERENCES `tipovehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
