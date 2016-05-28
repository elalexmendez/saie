-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2016 a las 06:13:27
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `Alimento` varchar(40) NOT NULL,
  `Cantidad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id`, `Alimento`, `Cantidad`) VALUES
(1, 'Harina', '2'),
(2, 'Azucar', '0'),
(3, 'Arroz', '0'),
(4, 'Pasta', '0'),
(5, 'Cafe', '0'),
(6, 'Margarina', '0'),
(7, 'Caraotas', '0'),
(8, 'Pan', '0'),
(9, 'Uvas', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(2) NOT NULL,
  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `clasificacion`) VALUES
(1, 'Dinero'),
(2, 'Materiales'),
(3, 'Alimento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dinero`
--

CREATE TABLE `dinero` (
  `id` int(11) NOT NULL,
  `id_donadores` int(11) NOT NULL,
  `cantidad` varchar(40) NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dinero`
--

INSERT INTO `dinero` (`id`, `id_donadores`, `cantidad`, `mensaje`, `fecha`) VALUES
(1, 23463244, '200', 'donativo', '2016-05-22'),
(2, 23463244, '202', 'donativo', '2016-05-24'),
(3, 23463244, '151', 'a', '2016-05-24'),
(4, 23463244, '1000', 'donacion', '2016-05-24'),
(5, 23463244, '1000', 'donativo\r\n', '2016-05-24'),
(6, 23463244, '2000', 'donacion para las flores', '2016-05-25'),
(7, 23463244, '200', 'donativo\r\n', '2016-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donadores`
--

CREATE TABLE `donadores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donadores`
--

INSERT INTO `donadores` (`id`, `Nombre`, `Apellido`) VALUES
(14123456, 'Nuevo', 'Ramon'),
(23463244, 'Alexander', 'Mendez'),
(23463249, 'Adrian', 'Mendez'),
(87654321, 'Fulano', 'Perencejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `cantidad_dinero` int(11) NOT NULL,
  `cantidad_alimento` int(11) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `titulo`, `id_categoria`, `cantidad_dinero`, `cantidad_alimento`, `descripcion`, `fecha`) VALUES
(1, 'Pintura', 1, 100, 0, 'Para pintar el frente de la iglesia.', '2016-05-24'),
(2, 'Harina', 1, 2, 0, '', '2016-05-25'),
(3, 'Harina', 1, 0, 7, 'a', '2016-05-25'),
(4, 'Harina', 1, 0, 7, 'a', '2016-05-25'),
(5, 'Harina', 1, 0, 7, 'a', '2016-05-25'),
(6, 'Harina', 1, 0, 6, 'a', '2016-05-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrersos`
--

CREATE TABLE `ingrersos` (
  `id` int(6) NOT NULL,
  `id_donadores` int(2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_dinero` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_material` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_alimento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_alimento` int(11) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingrersos`
--

INSERT INTO `ingrersos` (`id`, `id_donadores`, `id_categoria`, `id_dinero`, `id_material`, `id_alimento`, `cantidad_alimento`, `descripcion`, `Fecha`) VALUES
(1, 23463244, 1, '255', '', '', 0, 'donativo', '2016-05-22'),
(2, 87654321, 3, '', '', 'Azucar', 0, 'donativo', '2016-05-23'),
(3, 87654321, 3, '', '', 'Pasta', 0, 'a', '2016-05-23'),
(4, 87654321, 3, '', '', 'Arroz', 11, 'as', '2016-05-23'),
(7, 23463244, 1, '1000', '', '', 0, 'donacion', '2016-05-24'),
(8, 23463244, 1, '1000', '', '', 0, 'donativo\r\n', '2016-05-24'),
(9, 23463244, 3, '', '', 'Pan', 1, 'a', '2016-05-24'),
(10, 23463244, 1, '2000', '', '', 0, 'donacion para las flores', '2016-05-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mteriales`
--

CREATE TABLE `mteriales` (
  `id` int(11) NOT NULL,
  `id_donadores` int(11) NOT NULL,
  `material` varchar(40) NOT NULL,
  `cantidad` int(40) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mteriales`
--

INSERT INTO `mteriales` (`id`, `id_donadores`, `material`, `cantidad`, `descripcion`, `fecha`) VALUES
(2, 23463244, 'escalera1', 1, 'palita', '2016-05-22'),
(3, 151, 'pico', 1, 'escoba para barre', '2016-05-22'),
(4, 23463244, 'pico', 2, 'para limpiar', '2016-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Administrador del Sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `totaldinero`
--

CREATE TABLE `totaldinero` (
  `id` int(11) NOT NULL,
  `cantidad` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `totaldinero`
--

INSERT INTO `totaldinero` (`id`, `cantidad`) VALUES
(1, 2200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cedula` int(8) NOT NULL,
  `appellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `appellidos`, `nombres`, `cargo`, `usuario`, `password`, `id_rol`) VALUES
(1, 23463244, 'Mendez Bermudez', 'Alexander Jose', 'Administrador', 'Admin', '1234', 1),
(2, 23463463, 'Gonzales', 'Jose', 'pasante', 'Secretaria', '1234', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dinero`
--
ALTER TABLE `dinero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donadores`
--
ALTER TABLE `donadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingrersos`
--
ALTER TABLE `ingrersos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mteriales`
--
ALTER TABLE `mteriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `totaldinero`
--
ALTER TABLE `totaldinero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `dinero`
--
ALTER TABLE `dinero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ingrersos`
--
ALTER TABLE `ingrersos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `mteriales`
--
ALTER TABLE `mteriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
