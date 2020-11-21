-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 13:57:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `roperia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `codigo_interno` varchar(100) NOT NULL,
  `codigo_barras` varchar(100) NOT NULL,
  `nombre_articulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `codigo_interno`, `codigo_barras`, `nombre_articulo`, `descripcion`, `precio`, `stock`, `iva`) VALUES
(3, '123456789', '123456789133456', 'pelota', 'mundial sudafrica', 20000, 6, 5),
(4, '1232121212', '147852369852147', 'remera', 'coleccion verano ', 0, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo`
--

CREATE TABLE `atributo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atributo`
--

INSERT INTO `atributo` (`id`, `codigo`, `nombre`, `descripcion`, `estado`) VALUES
(8, 'tamaño', 'Tamaño', '', 'activo'),
(10, 'color', 'Color', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo_detalle`
--

CREATE TABLE `atributo_detalle` (
  `id` int(11) NOT NULL,
  `id_atributo` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atributo_detalle`
--

INSERT INTO `atributo_detalle` (`id`, `id_atributo`, `valor`, `estado`) VALUES
(4, 8, 'xl', 'activo'),
(5, 8, 'grande', ''),
(6, 10, 'blanco', 'inactivo'),
(9, 10, 'verde oscuro', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo_detalle_articulo`
--

CREATE TABLE `atributo_detalle_articulo` (
  `id` int(11) NOT NULL,
  `id_atributo` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `tipo_documento` varchar(100) NOT NULL,
  `numero_documento` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `numero_contacto` varchar(100) NOT NULL,
  `email_contacto` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `razon_social`, `tipo_documento`, `numero_documento`, `fecha_registro`, `numero_contacto`, `email_contacto`, `direccion`) VALUES
(8, 'as', 'RUC', 'aaaa', '2020-10-23', 'aa', 'aaaaa@aaaa', 'aaaaaaaaaaaaaaaa'),
(9, 'Stock', 'CI', '111111111111111111111111', '2020-10-23', '1111111111111111111111111', 'ffffff@gmail.com', '111111111111111111111111111111111'),
(10, 'javier villalba', 'CI', '800000', '2020-11-12', '0971869339', 'ffffff@gmail.comjd', 'Itaugua'),
(11, 'ruben dario', 'CI', '4791713', '2020-11-12', '0971868339', 'ruben_kfrutos@hotmail.com', 'mil viviendas'),
(12, 'ruben dario', 'CI', '4791713', '2020-11-12', '0971868339', 'ruben_kfrutos@hotmail.com', 'mil viviendas'),
(13, 'luciano', 'CI', '1156868-2', '2020-11-14', '0982800663', 'wwww.@gmail.com', 'manzana 2 lote 14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_articulo`
--

CREATE TABLE `compra_articulo` (
  `id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `fecha_compra` date NOT NULL DEFAULT current_timestamp(),
  `id_proveedor` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra_articulo`
--

INSERT INTO `compra_articulo` (`id`, `fecha_registro`, `fecha_compra`, `id_proveedor`, `estado`) VALUES
(20, '0000-00-00', '2020-10-10', 6565, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_articulo_detalle`
--

CREATE TABLE `compra_articulo_detalle` (
  `id` int(11) NOT NULL,
  `id_compra_articulo` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_credito`
--

CREATE TABLE `control_credito` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto_total` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `entrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `control_credito`
--

INSERT INTO `control_credito` (`id`, `id_cliente`, `monto_total`, `saldo`, `entrega`) VALUES
(222, 12, 50000, 500000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion_venta`
--

CREATE TABLE `devolucion_venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `motivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devolucion_venta`
--

INSERT INTO `devolucion_venta` (`id`, `id_producto`, `id_cliente`, `fecha`, `cantidad`, `id_usuario`, `motivo`) VALUES
(20, 60, 90, '2020-11-03', 5, 31, 'cambio de tama;o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `id_control_credito` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `id_control_credito`, `fecha_pago`, `monto`) VALUES
(20, 222, '2020-11-11', 250000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `tipo_documento` varchar(100) NOT NULL,
  `numero_documento` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `numero_contacto` varchar(100) NOT NULL,
  `email_contacto` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `razon_social`, `tipo_documento`, `numero_documento`, `fecha_registro`, `numero_contacto`, `email_contacto`, `direccion`) VALUES
(1, 'Stockffff', 'RUC', '15151151165165', '0000-00-00', '0971868339', 'ffffff@gmail.com', 'san antonio'),
(3, 'patricio', 'CI', '', '0000-00-00', '0971868339', 'wwww.@gmail.com', 'mil viviendas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero_documento` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL,
  `numero_contacto` varchar(100) NOT NULL,
  `email_contacto` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `numero_documento`, `fecha_registro`, `numero_contacto`, `email_contacto`, `direccion`, `username`, `password`) VALUES
(2, '', '', '0000-00-00', '', '', '', 'pepito', '123'),
(3, 'ruben kostinchok f', '4791713', '0000-00-00', '0971868339', 'ruben_kfrutos@hotmail.com', 'mil  viviendas', 'kfrutos', '123'),
(4, 'ruben', '4791713', '0000-00-00', '0971868339', 'ruben_kfrutos@hotmail.com', 'mil viviendas', 'Ruben Kostinchok', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `iva_5` int(11) NOT NULL,
  `iva_10` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha_venta`, `id_cliente`, `id_usuario`, `subtotal`, `descuento`, `iva_5`, `iva_10`, `total`) VALUES
(1, '2020-05-22', 8, 2, 2500, 0, 0, 0, 2000000),
(2, '2020-07-21', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto_importe` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `atributo`
--
ALTER TABLE `atributo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `atributo_detalle`
--
ALTER TABLE `atributo_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `atributo_detalle_articulo`
--
ALTER TABLE `atributo_detalle_articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra_articulo`
--
ALTER TABLE `compra_articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra_articulo_detalle`
--
ALTER TABLE `compra_articulo_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control_credito`
--
ALTER TABLE `control_credito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devolucion_venta`
--
ALTER TABLE `devolucion_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `atributo`
--
ALTER TABLE `atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `atributo_detalle`
--
ALTER TABLE `atributo_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `atributo_detalle_articulo`
--
ALTER TABLE `atributo_detalle_articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `compra_articulo`
--
ALTER TABLE `compra_articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `compra_articulo_detalle`
--
ALTER TABLE `compra_articulo_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control_credito`
--
ALTER TABLE `control_credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `devolucion_venta`
--
ALTER TABLE `devolucion_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
