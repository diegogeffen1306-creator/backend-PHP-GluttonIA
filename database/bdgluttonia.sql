-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2026 a las 03:14:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdgluttonia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `tipoCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `tipoCategoria`) VALUES
(1, 'Combo sugerido'),
(2, 'Menú del día'),
(3, 'Platos Especiales'),
(4, 'Combo sugerido'),
(5, 'Platos Especiales'),
(6, 'Combo sugerido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Idcliente` int(11) NOT NULL,
  `nombrecliente` varchar(30) NOT NULL,
  `apellidocliente` varchar(30) NOT NULL,
  `pedidosRealizados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Idcliente`, `nombrecliente`, `apellidocliente`, `pedidosRealizados`) VALUES
(1, 'Aylen ', 'Carrillo', 16),
(3, 'Maria', 'Patiño', 10),
(8, 'JAMES ', 'RAMIREZ', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery`
--

CREATE TABLE `delivery` (
  `IdDomiciliario` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL,
  `nombreDomiciliario` varchar(30) NOT NULL,
  `apellidoDomiciliario` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `totalEntregas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `delivery`
--

INSERT INTO `delivery` (`IdDomiciliario`, `IdVehiculo`, `nombreDomiciliario`, `apellidoDomiciliario`, `direccion`, `telefono`, `totalEntregas`) VALUES
(1, 1, 'Pedro', 'Perez', 'cra 105 N°50-45 sur', '320507645', 5),
(2, 2, 'Antonio', 'Morales', 'calle 57 N°30-25 sur', '324508645', 3),
(4, 4, 'Andriana', 'Carrilo', 'cra 105B N° 56f-30 sur', '312577645', 3),
(5, 5, 'Sandra', 'Rodriguez', 'cra 99 N°5-01 sur', '317577645', 2),
(6, 6, 'Pepita', 'Perez', 'cra 40 N°5-05 sur', '3246207965', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menú`
--

CREATE TABLE `menú` (
  `IdMenú` int(11) NOT NULL,
  `menú` varchar(30) NOT NULL,
  `ingredientes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menú`
--

INSERT INTO `menú` (`IdMenú`, `menú`, `ingredientes`) VALUES
(1, 'Pollo Broster', 'Pollo,especias,harina'),
(2, 'Pollo Asado', 'Pollo,especias'),
(3, 'arroz con pollo', 'Pollo,especias,arroz,zanahoria,arveja,habichuela,ajo,cebolla'),
(4, 'combo mondongo', 'mondongo,especias,papa,ajo,cebolla'),
(5, 'arroz con pollo', 'Pollo,especias,arroz,zanahoria,arveja,habichuela,ajo,cebolla'),
(6, 'Pollo Asado', 'Pollo,especias'),
(7, 'Pollo Broster', 'Pollo,especias,harina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `IdOrden` int(11) NOT NULL,
  `IdDomiciliario` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Idcliente` int(11) NOT NULL,
  `IdMenú` int(11) NOT NULL,
  `horaIngreso` datetime NOT NULL,
  `horaSalida` datetime NOT NULL,
  `estado` varchar(30) NOT NULL,
  `tiempoPreparacion` time NOT NULL,
  `responsable` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`IdOrden`, `IdDomiciliario`, `IdCategoria`, `Idcliente`, `IdMenú`, `horaIngreso`, `horaSalida`, `estado`, `tiempoPreparacion`, `responsable`) VALUES
(1, 1, 1, 1, 1, '2025-08-16 14:03:00', '2025-08-16 14:32:00', 'entregado', '00:29:00', 'operario'),
(2, 2, 2, 2, 2, '2025-08-16 13:05:00', '2025-08-16 13:35:00', 'entregado', '00:30:00', 'operario'),
(3, 3, 3, 3, 3, '2025-08-16 12:00:00', '2025-08-16 12:45:00', 'entregado', '00:45:00', 'operario'),
(4, 4, 4, 4, 4, '2025-08-16 13:00:00', '2025-08-16 13:40:00', 'entregado', '00:40:00', 'cocinero'),
(5, 5, 5, 5, 5, '2025-08-17 11:03:00', '2025-08-17 11:32:00', 'entregado', '00:29:00', 'operario'),
(6, 6, 6, 6, 6, '2025-08-17 12:05:00', '2025-08-17 12:35:00', 'entregado', '00:30:00', 'cajero'),
(7, 7, 7, 7, 7, '2025-08-17 13:10:00', '2025-08-17 13:50:00', 'entregado', '00:40:00', 'operario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `IdVehiculo` int(11) NOT NULL,
  `IdDomiciliario` int(11) NOT NULL,
  `tipoVehiculo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`IdVehiculo`, `IdDomiciliario`, `tipoVehiculo`) VALUES
(1, 1, 'bicicleta'),
(2, 2, 'Motocicleta'),
(4, 4, 'Motocicleta electrica'),
(5, 5, 'Motocicleta'),
(6, 6, 'bicicleta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Idcliente`);

--
-- Indices de la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`IdDomiciliario`);

--
-- Indices de la tabla `menú`
--
ALTER TABLE `menú`
  ADD PRIMARY KEY (`IdMenú`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`IdOrden`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`IdVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_CategoriaOrden` FOREIGN KEY (`IdCategoria`) REFERENCES `orden` (`IdOrden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_DeliveryOrden` FOREIGN KEY (`IdDomiciliario`) REFERENCES `orden` (`IdOrden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_DeliveryVehiculo` FOREIGN KEY (`IdDomiciliario`) REFERENCES `vehiculo` (`IdVehiculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menú`
--
ALTER TABLE `menú`
  ADD CONSTRAINT `fk_MenúOrden` FOREIGN KEY (`IdMenú`) REFERENCES `orden` (`IdOrden`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
