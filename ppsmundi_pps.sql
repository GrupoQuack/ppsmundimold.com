-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-07-2020 a las 20:09:33
-- Versión del servidor: 5.6.47
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ppsmundi_pps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso`
--

CREATE TABLE `caso` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Visible` tinyint(1) NOT NULL DEFAULT '1',
  `Posicion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caso`
--

INSERT INTO `caso` (`Id`, `Titulo`, `Descripcion`, `Nombre`, `URL`, `Type`, `Visible`, `Posicion`) VALUES
(10, 'Tarima One Way', 'Molde para tarima one way, con un tiempo de ciclo de 46 segundos el molde puede operar con material 100% reciclado.', 'Tarimaoneway', 'http://www.ppsmundimold.com.mx/admin/img/casos/Tarimaoneway.png', 'png', 1, 3),
(9, 'Molde para caja de Uva', 'Molde para caja de uva, opera a un ciclo de hasta 9 segundos,  molde con compuertas neumÃ¡ticas valvuladas y una colada caliente marca Husky.', 'CajaUva', 'http://www.ppsmundimold.com.mx/admin/img/casos/CajaUva.jpeg', 'jpeg', 1, 2),
(8, 'Molde para tarima Stack Mold', 'Stack Mold para dos piezas de tarima exactamente iguales, molde operando en MÃ©xico.', 'Tarimadoblemolde', 'http://www.ppsmundimold.com.mx/admin/img/casos/Tarimadoblemolde.jpeg', 'jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('superadmin', 'moldS$50'),
('omar', 'baro840904');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caso`
--
ALTER TABLE `caso`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`) USING BTREE,
  ADD UNIQUE KEY `Posicion` (`Posicion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caso`
--
ALTER TABLE `caso`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
