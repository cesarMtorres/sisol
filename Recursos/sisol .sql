-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2019 a las 09:46:26
-- Versión del servidor: 5.7.25-0ubuntu0.16.04.2
-- Versión de PHP: 7.3.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Agremiado`
--

CREATE TABLE `Agremiado` (
  `Id` int(7) NOT NULL,
  `Civ` int(10) NOT NULL,
  `Trabajo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Saldo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Auditoria`
--

CREATE TABLE `Auditoria` (
  `Codigo` int(11) NOT NULL,
  `Status` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Bitacora`
--

CREATE TABLE `Bitacora` (
  `Id` int(10) NOT NULL,
  `Accion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Tabla` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carga_familiar`
--

CREATE TABLE `Carga_familiar` (
  `Id` int(5) NOT NULL,
  `Fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cepir`
--

CREATE TABLE `Cepir` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Configuracion`
--

CREATE TABLE `Configuracion` (
  `Id` int(5) NOT NULL,
  `Nombre_instituto` int(100) NOT NULL,
  `Logo_instituto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especialidad`
--

CREATE TABLE `Especialidad` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE `Estado` (
  `Id` tinyint(4) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Funcion`
--

CREATE TABLE `Funcion` (
  `Id` int(5) NOT NULL,
  `Cod_funcion` int(5) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Instituto`
--

CREATE TABLE `Instituto` (
  `Id` int(4) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Municipio`
--

CREATE TABLE `Municipio` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pago`
--

CREATE TABLE `Pago` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` int(11) NOT NULL,
  `Referencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Parentesco`
--

CREATE TABLE `Parentesco` (
  `Id` int(2) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Parroquia`
--

CREATE TABLE `Parroquia` (
  `Id` int(4) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfil`
--

CREATE TABLE `Perfil` (
  `Id` int(5) NOT NULL,
  `Tipo_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `Id` int(10) NOT NULL,
  `Cedula` int(10) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Plano`
--

CREATE TABLE `Plano` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proyecto`
--

CREATE TABLE `Proyecto` (
  `Id` int(6) NOT NULL,
  `Numero_revision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Solvencia`
--

CREATE TABLE `Solvencia` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Mes` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_pago`
--

CREATE TABLE `Tipo_pago` (
  `Id` int(4) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_proyecto`
--

CREATE TABLE `Tipo_proyecto` (
  `Id` int(6) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Transaccion`
--

CREATE TABLE `Transaccion` (
  `Id` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Universidad`
--

CREATE TABLE `Universidad` (
  `Id` int(5) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `Id` int(5) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Intentos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Visado`
--

CREATE TABLE `Visado` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Agremiado`
--
ALTER TABLE `Agremiado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Bitacora`
--
ALTER TABLE `Bitacora`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Carga_familiar`
--
ALTER TABLE `Carga_familiar`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Cepir`
--
ALTER TABLE `Cepir`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Especialidad`
--
ALTER TABLE `Especialidad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Funcion`
--
ALTER TABLE `Funcion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Instituto`
--
ALTER TABLE `Instituto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Municipio`
--
ALTER TABLE `Municipio`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Pago`
--
ALTER TABLE `Pago`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Parentesco`
--
ALTER TABLE `Parentesco`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Parroquia`
--
ALTER TABLE `Parroquia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `Plano`
--
ALTER TABLE `Plano`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Proyecto`
--
ALTER TABLE `Proyecto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Solvencia`
--
ALTER TABLE `Solvencia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Tipo_pago`
--
ALTER TABLE `Tipo_pago`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Tipo_proyecto`
--
ALTER TABLE `Tipo_proyecto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Transaccion`
--
ALTER TABLE `Transaccion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Universidad`
--
ALTER TABLE `Universidad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Visado`
--
ALTER TABLE `Visado`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Agremiado`
--
ALTER TABLE `Agremiado`
  MODIFY `Id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Bitacora`
--
ALTER TABLE `Bitacora`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Carga_familiar`
--
ALTER TABLE `Carga_familiar`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Cepir`
--
ALTER TABLE `Cepir`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Especialidad`
--
ALTER TABLE `Especialidad`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Estado`
--
ALTER TABLE `Estado`
  MODIFY `Id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Funcion`
--
ALTER TABLE `Funcion`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Instituto`
--
ALTER TABLE `Instituto`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Municipio`
--
ALTER TABLE `Municipio`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pago`
--
ALTER TABLE `Pago`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Parentesco`
--
ALTER TABLE `Parentesco`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Parroquia`
--
ALTER TABLE `Parroquia`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Plano`
--
ALTER TABLE `Plano`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Proyecto`
--
ALTER TABLE `Proyecto`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Solvencia`
--
ALTER TABLE `Solvencia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Tipo_pago`
--
ALTER TABLE `Tipo_pago`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Tipo_proyecto`
--
ALTER TABLE `Tipo_proyecto`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Transaccion`
--
ALTER TABLE `Transaccion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Universidad`
--
ALTER TABLE `Universidad`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Visado`
--
ALTER TABLE `Visado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
