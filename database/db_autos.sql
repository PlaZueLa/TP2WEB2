-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 02:49:00
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_autos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Urbano'),
(2, 'Pick up'),
(3, 'Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'marquitos@tandil.com', '$2a$12$.08A.mN/JTkjdxRXBUX1C.VdVMthEMRUr6iRRfZ6sghJOElENfQge');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `fecha_creacion` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `fecha_creacion`, `precio`, `descripcion`, `id_categoria`) VALUES
(8, 'Ford', 'Ranger', '2011', 3710000, 'Ranger usada color rojo, 122000km, tipo de combustible nafta/gnc, 4 puertas, transmisión manual, motor 2.3, dirección hidráulica. ', 2),
(9, 'Toyota', 'Hilux', '2015', 6000000, 'Hilux usada color blanco, 250000km, tipo de combustible diésel, 4 puertas, transmisión automática, motor 3.0, dirección hidráulica.', 2),
(10, 'Volkswagen', 'Amarok', '2018', 10000000, 'Amarok usada color azul, 85000km, tipo de combustible diésel, 4 puertas, transmisión automática, motor 3.0, dirección hidráulica.', 2),
(11, 'Chevrolet', 'S10', '2015', 6000000, 'S10 usada color blanco, 175000k, tipo de combustible diésel, 4 puertas, transmisión automática, motor 2.8, dirección hidráulica. ', 2),
(12, 'Renault', 'Kangoo', '2011', 1800000, 'Furgón Kangoo usado color blanco, 110000km, tipo de combustible diésel, 3 puertas, transmisión manual, motor 1.5, dirección hidráulica.', 3),
(13, 'Fiat', 'Fiorino', '2017', 2780000, 'Furgón Fiorino usado color gris, 90000km, tipo de combustible nafta, 4 puertas, transmisión manual, motor 1.5, dirección hidráulica.', 3),
(14, 'Citroën', 'Berlingo', '2018', 2800000, 'Furgón Berlingo usado color azul, 100000k, tipo de combustible diésel, 3 puertas, transmisión manual, motor 1.6, dirección hidráulica.', 3),
(48, 'Toyota', 'Yaris', '2019', 4300000, 'Yaris usado color gris, 30000km, tipo de combustible nafta, 4 puertas, transmisión manual, motor 1.5, dirección eléctrica.', 1),
(52, 'Toyota', 'Supra', '1994', 55000000, 'Supra usada color naranja, 120000km, tipo de combustible nafta, 4 puertas, transmisión manual, motor 2.3, dirección mecánica.', 1),
(53, 'Honda', 'Civic', '1996', 41000000, 'Civic usado color negro, 222000km, tipo de combustible nafta, 2 puertas, transmisión manual, motor 2.0, dirección mecánica.', 1),
(54, 'Nissan', 'Skyline', '2003', 67000000, 'Skyline usado color azul, 20000km, tipo de combustible nafta, 2 puertas, transmisión manual, motor 2.5, dirección mecánica.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
