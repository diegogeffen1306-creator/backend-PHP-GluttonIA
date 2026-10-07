-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2026 a las 00:14:54
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
(3, 'Maria ', 'Suarez', 3),
(8, 'james ', 'rodriguez', 10),
(9, 'Mary', 'caldera', 1),
(10, 'wilmary', 'Carrillo', 3),
(11, 'lorena', 'gomez', 49),
(12, 'lorena', 'Patiño', 55),
(13, 'lorena', 'caldera', 3),
(14, 'yosmary', 'caldera', 42),
(15, 'Aylen ', 'Perez', 44),
(17, 'yosmar', 'navas', 80),
(18, 'lorena', 'Patiño', 14);

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
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `IdDetalle` int(11) NOT NULL,
  `IdOrden` int(11) NOT NULL,
  `IdMenú` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `precio_venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `IdInsumo` int(11) NOT NULL,
  `nombre_insumo` varchar(50) NOT NULL,
  `cantidad_stock` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad_medida` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`IdInsumo`, `nombre_insumo`, `cantidad_stock`, `unidad_medida`) VALUES
(1, 'Carne de res (Hamburguesa)', 5000.00, 'gramos'),
(2, 'Pan de Hamburguesa', 50.00, 'unidades'),
(3, 'Queso Cheddar', 2000.00, 'gramos'),
(4, 'tomate', 500.00, 'gramos');

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
(1, 'Pollo Broster', 'Pollo, especias, harina...'),
(2, 'combo hamburguesa', 'carne,lechuga,tomate,cebolla,pan,salsas'),
(3, 'Combo Hamburguesa Especial', 'Carne, queso, pan y papas'),
(4, 'perro caliente', 'salchicha,queso,papa,salsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `IdOrden` int(11) NOT NULL,
  `fecha_orden` datetime NOT NULL DEFAULT current_timestamp(),
  `mesa` varchar(10) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estado_orden` varchar(20) NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `IdReceta` int(11) NOT NULL,
  `IdMenú` int(11) NOT NULL,
  `IdInsumo` int(11) NOT NULL,
  `cantidad_necesaria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`IdReceta`, `IdMenú`, `IdInsumo`, `cantidad_necesaria`) VALUES
(1, 3, 1, 150.00),
(2, 3, 2, 1.00),
(3, 3, 3, 40.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombreusuario` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(30) NOT NULL DEFAULT 'administrador',
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `correo`, `password`, `rol`, `estado`, `fecha_creacion`) VALUES
(1, 'Administrador', 'admin@gluttonia.com', '$2y$12$EQlzZ5lxj4It8xaVe.BNi.QTi.yzvwAzRlJhb6Eq8YUQTaGdjCCZu', 'administrador', 1, '2026-10-06 17:54:42');

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
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `fk_detalle_orden` (`IdOrden`),
  ADD KEY `fk_detalle_menu` (`IdMenú`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`IdInsumo`);

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
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`IdReceta`),
  ADD KEY `fk_receta_menu` (`IdMenú`),
  ADD KEY `fk_receta_inventario` (`IdInsumo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `correo` (`correo`);

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
  MODIFY `Idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `IdInsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menú`
--
ALTER TABLE `menú`
  MODIFY `IdMenú` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `IdOrden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `IdReceta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `fk_detalle_menu` FOREIGN KEY (`IdMenú`) REFERENCES `menú` (`IdMenú`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_orden` FOREIGN KEY (`IdOrden`) REFERENCES `orden` (`IdOrden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `fk_receta_inventario` FOREIGN KEY (`IdInsumo`) REFERENCES `inventario` (`IdInsumo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receta_menu` FOREIGN KEY (`IdMenú`) REFERENCES `menú` (`IdMenú`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
