-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2018 a las 23:55:59
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lovethexperience`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE `evento`;
CREATE TABLE `evento` (
  `IdEvento` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Lugar` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`IdEvento`, `Nombre`, `Fecha`, `Lugar`) VALUES
(1, 'Carrera 1', '2018-11-03', 'Capital Federal'),
(2, 'Carrera 2', '2018-11-03', 'Capital Federal'),
(3, 'Carrera 3', '2018-11-04', 'La Plata'),
(4, 'Carrera 4', '2018-11-04', 'Mendoza'),
(5, 'Carrera 5', '2018-11-05', 'Capital Federal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--
DROP TABLE `fotos`;
CREATE TABLE `fotos` (
  `IdFoto` int(11) NOT NULL,
  `IdIdentificacion` int(11) NOT NULL,
  `Ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`IdFoto`, `IdIdentificacion`, `Ruta`) VALUES
(1, 1, 'uploads\\001.jpg'),
(2, 1, 'uploads\\002.jpg'),
(3, 1, 'uploads\\003.jpg'),
(4, 2, 'uploads\\004.jpg'),
(5, 2, 'uploads\\005.jpg'),
(6, 2, 'uploads\\006.jpg'),
(7, 3, 'uploads\\007.jpg'),
(8, 3, 'uploads\\008.jpg'),
(9, 3, 'uploads\\009.jpg'),
(10, 4, 'uploads\\010.jpg'),
(11, 4, 'uploads\\011.jpg'),
(12, 4, 'uploads\\012.jpg'),
(13, 5, 'uploads\\013.jpg'),
(14, 5, 'uploads\\014.jpg'),
(15, 5, 'uploads\\015.jpg'),
(16, 6, 'uploads\\016.jpg'),
(17, 6, 'uploads\\017.jpg'),
(18, 6, 'uploads\\018.jpg'),
(19, 7, 'uploads\\019.jpg'),
(20, 7, 'uploads\\020.jpg'),
(21, 7, 'uploads\0021.jpg'),
(22, 8, 'uploads\0022.jpg'),
(23, 8, 'uploads\0023.jpg'),
(24, 8, 'uploads\0024.jpg'),
(25, 9, 'uploads\0025.jpg'),
(26, 9, 'uploads\0026.jpg'),
(27, 9, 'uploads\0027.jpg'),
(28, 10, 'uploads\0028.jpg'),
(29, 10, 'uploads\0029.jpg'),
(30, 10, 'uploads\0030.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificacion`
--
DROP TABLE `identificacion`;
CREATE TABLE `identificacion` (
  `IdIdentificacion` int(11) NOT NULL,
  `IdEvento` int(11) NOT NULL,
  `IdTipoIdentificacion` int(11) NOT NULL,
  `Identificacion` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `identificacion`
--

INSERT INTO `identificacion` (`IdIdentificacion`, `IdEvento`, `IdTipoIdentificacion`, `Identificacion`) VALUES
(1, 1, 1, '0034'),
(2, 1, 1, '0015'),
(3, 2, 1, '0100'),
(4, 3, 1, '0101'),
(5, 1, 1, '2165'),
(6, 5, 1, '9371'),
(7, 5, 1, '0193'),
(8, 1, 1, '4728'),
(9, 3, 1, '7841'),
(10, 4, 1, '3526');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentificacion`
--

CREATE TABLE `tipoidentificacion` (
  `IdTipoIdentificacion` int(11) NOT NULL,
  `TipoIdentificacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipoidentificacion`
--

INSERT INTO `tipoidentificacion` (`IdTipoIdentificacion`, `TipoIdentificacion`) VALUES
(1, 'Dorsal'),
(2, 'DNI'),
(3, 'Codigo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`IdEvento`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`IdFoto`);

--
-- Indices de la tabla `identificacion`
--
ALTER TABLE `identificacion`
  ADD PRIMARY KEY (`IdIdentificacion`);

--
-- Indices de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  ADD PRIMARY KEY (`IdTipoIdentificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `IdEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `identificacion`
--
ALTER TABLE `identificacion`
  MODIFY `IdIdentificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  MODIFY `IdTipoIdentificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
