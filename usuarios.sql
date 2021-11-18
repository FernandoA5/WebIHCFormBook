-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-11-2021 a las 15:38:57
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17781435_fdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fechaRegistro`, `activo`) VALUES
(1, 'Fernando', 'Fernando@gmail.com', '$2y$10$gFmi8xxJ./kt7o5AifbtXOtoFlL0N7pQQNG1coy3QnKCBKRkOaHKS', '2021-10-17 20:02:48', 0),
(2, 'Gustavo', 'gusamuel.352@hotmail.com', '$2y$10$lPeALIBTG9P5I469JsXkOOsE7f9yDCJcjL6ApvSfTTJuxZprng/Ua', '2021-10-17 20:13:02', 0),
(3, 'jennifer', 'macarenojennifer104@gmail.com', '$2y$10$BsGGVbrpz/bRIXIMHD9nb.uHE53CtC64x4vxsb1H7cfFpghxinVJW', '2021-10-17 21:18:55', 0),
(4, 'isabel', 'kagaminediejenny@gmail.com', '$2y$10$Ib9tITRolS7DDrB1qZ8mPuBDQrj5zIcjHlIV.e8Rz/kwf2ujq8fDu', '2021-10-17 21:27:06', 0),
(5, 'Eliud', 'eliud.santander@gmail.com', '$2y$10$zAS7CtTytqNp2mb/OEXOFeqjbxOBP.OusZyYBdOyEpYaIb8ui2z1m', '2021-10-17 21:49:15', 0),
(6, 'MauricioPorras', 'mape.14@outlook.com', '$2y$10$bJbY8m9tNzCK3qLL6Q5goOwEpbluJLS0lk/4I.ChAYoW4zqHExWg2', '2021-10-17 22:24:55', 0),
(7, 'Brian1995', 'briandorantes@hotmail.com', '$2y$10$ThhDHaca3LFXzYpXuCslcO3WBKGvnaDpCTc.XkGP76iMHiervx9ES', '2021-10-18 01:12:34', 0),
(8, 'Adrian', 'adrianrdz0126@gmail.com', '$2y$10$noOqKh8.PCZ6zhkSLm1t7ukCkNx3mSomMrbPsLykqh6i6WffP5FjS', '2021-10-19 02:35:21', 0),
(9, 'Abraham12', 'kevincalvin1@hotmail.com', '$2y$10$OUs8vvyEd5ZDIEeZ1O5bHOUXkT8ZrCwFjJAbVwuv6Wk71QG/ioEe.', '2021-11-18 15:22:14', 0),
(10, 'AngelValentin', 'AngelValentin21@hotmail.com', '$2y$10$tMPan7hjO.1gTRZb0UkVhe36U986Y/TvxZ3lKIk7lyYZaAxikG6bm', '2021-11-18 15:26:26', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
