-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2016 a las 11:34:19
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
  `Nombre` varchar(40) NOT NULL,
  `Alimento` varchar(40) NOT NULL,
  `Cantidad` varchar(40) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id`, `Nombre`, `Alimento`, `Cantidad`, `Descripcion`, `Fecha`) VALUES
(1, 'Alexander Mendez', 'Harina', '3', 'para hacer arepa', '2016-04-21'),
(2, 'Alexander', 'Harina', '3', 's', '2016-04-21'),
(3, 'Jose Gonzales', 'Harina', '1', 'para el comedor', '2016-04-21'),
(4, 'Jonathan Torres "La Mamita"', 'Arroz', '5', 'ContribuciÃ³n con el comedor', '2016-04-21'),
(5, 'Alberto', 'Harina', '1', 'Donativo', '2016-04-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dinero`
--

CREATE TABLE `dinero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `cantidad` int(40) NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dinero`
--

INSERT INTO `dinero` (`id`, `nombre`, `cantidad`, `mensaje`, `fecha`) VALUES
(1, 'Alexander Mendez', 4000, 'Donacion para las fiestas patronales.', '2016-04-18'),
(2, 'Alberto Matos', 10000, 'Aporte para la pintura de la iglesia.', '2016-04-20'),
(3, 'Juan Gonzales', 5000, 'Aporte para los adornos de la iglesia en las eucaristias.', '2016-04-20'),
(4, 'Jorgineth Camacho', 100, 'Donacion para contribuir con los alimentos', '2016-04-21'),
(5, 'Alfredo Mendez', 10000, 'Donacion para ayuda con el Comedor Parroquial.', '2016-04-21'),
(6, 'Jonathan Torres', 2000, 'para comprar verduras', '2016-04-21'),
(8, 'Alex', 1000, 'donativo', '2016-04-23'),
(9, 'Alberto Matos', 10000, 'Donativo', '2016-04-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donadores`
--

CREATE TABLE `donadores` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `donadores`
--

INSERT INTO `donadores` (`id`, `descripcion`) VALUES
(1, 'Persona'),
(2, 'Grupo Apostolado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrersos`
--

CREATE TABLE `ingrersos` (
  `id` int(6) NOT NULL,
  `id_categoria` int(2) NOT NULL,
  `id_donadores` int(2) NOT NULL,
  `id_usuario` int(2) NOT NULL,
  `nombre_indetificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mteriales`
--

CREATE TABLE `mteriales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `material` varchar(40) NOT NULL,
  `cantidad` int(40) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mteriales`
--

INSERT INTO `mteriales` (`id`, `nombre`, `material`, `cantidad`, `descripcion`, `fecha`) VALUES
(1, 'Alexander Mendez', 'Escalera', 1, 'Escalera de dos metros de altura, marca bellota, color plateado', '2016-04-19'),
(2, 'Angel Cardenas', 'Desinfectante', 2, 'Desinfectante para guates, marca calidex, de 1 litro', '2016-04-19'),
(3, 'Alberto Matos', 'Cepillo de Barrer', 1, 'Cepillo de barrer ', '2016-04-20'),
(4, 'Alexander', 'Cepillo', 1, 'Cepillo donado a la iglesia, para la contribuciÃ³n de los materiales de limpieza que sirvan para el aseo de la misma', '2016-04-23'),
(5, 'Alexander Mendez', 'Cepillo', 1, 'Cepillo donado a la iglesia, para la contribuciÃ³n de los materiales de limpieza que sirvan para el aseo de la misma', '2016-04-23');

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
  `id_cantidad` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 23463244, 'Mendez Bermudez', 'Alexander Jose', 'Analista', 'Alex', '1234', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dinero`
--
ALTER TABLE `dinero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `donadores`
--
ALTER TABLE `donadores`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ingrersos`
--
ALTER TABLE `ingrersos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mteriales`
--
ALTER TABLE `mteriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
