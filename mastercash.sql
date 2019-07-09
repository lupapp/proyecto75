-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 23:18:31
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mastercash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes`
--

CREATE TABLE `ajustes` (
  `idajustes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonos`
--

CREATE TABLE `bonos` (
  `idbonos` int(11) NOT NULL,
  `valorBono` varchar(45) NOT NULL,
  `cantUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bonos`
--

INSERT INTO `bonos` (`idbonos`, `valorBono`, `cantUsers`) VALUES
(1, '100', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartillas`
--

CREATE TABLE `cartillas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_padre` int(11) NOT NULL,
  `posicion` int(10) NOT NULL,
  `posicion1` int(10) NOT NULL,
  `posicion2` int(10) NOT NULL,
  `fecha_vencimiento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado_cartilla` int(50) NOT NULL,
  `fecha_creacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cartillas`
--

INSERT INTO `cartillas` (`id`, `id_user`, `id_plan`, `id_padre`, `posicion`, `posicion1`, `posicion2`, `fecha_vencimiento`, `estado_cartilla`, `fecha_creacion`) VALUES
(1, 33, 16, 0, 0, 0, 0, '2025-10-16', 1, '2018-03-01'),
(2, 269, 16, 1, 0, 0, 0, '2025-10-16', 1, '2018-03-01'),
(3, 270, 15, 2, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(4, 271, 16, 2, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(5, 272, 15, 3, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(6, 273, 15, 3, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(7, 274, 15, 4, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(8, 275, 15, 4, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(9, 276, 15, 6, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(10, 277, 15, 6, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(11, 279, 15, 7, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(12, 278, 15, 7, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(13, 280, 15, 8, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(14, 281, 15, 12, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(15, 282, 15, 1, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(16, 283, 15, 15, 1, 0, 0, '2025-10-16', 1, '2018-03-01'),
(17, 284, 15, 15, 2, 0, 0, '2025-10-16', 1, '2018-03-01'),
(18, 285, 15, 8, 2, 0, 0, '2025-10-17', 1, '2018-03-02'),
(19, 286, 15, 9, 1, 0, 0, '2025-11-25', 1, '2018-04-10'),
(23, 293, 18, 0, 0, 0, 0, '2048-11-1', 1, '2018-04-17'),
(24, 294, 19, 23, 0, 0, 0, '2048-11-1', 1, '2018-04-17'),
(25, 295, 18, 24, 1, 0, 0, '2048-11-1', 1, '2018-04-17'),
(26, 296, 19, 24, 2, 0, 0, '2048-11-1', 1, '2018-04-17'),
(27, 282, 18, 23, 2, 0, 0, '2048-11-7', 1, '2018-04-23'),
(28, 298, 18, 25, 1, 0, 0, '2048-11-11', 1, '2018-04-27'),
(29, 299, 18, 25, 2, 0, 0, '2048-11-11', 1, '2018-04-27'),
(30, 302, 18, 26, 1, 0, 0, '2049-01-20', 1, '2018-07-04'),
(31, 303, 18, 26, 2, 0, 0, '2049-01-22', 1, '2018-07-06'),
(32, 304, 18, 31, 1, 0, 0, '2049-01-23', 1, '2018-07-07'),
(33, 305, 18, 31, 2, 0, 0, '2049-01-29', 1, '2018-07-13'),
(34, 306, 18, 33, 1, 0, 0, '2049-01-29', 1, '2018-07-13'),
(35, 307, 18, 29, 1, 0, 0, '2049-02-15', 1, '2018-07-30'),
(36, 308, 18, 30, 1, 0, 0, '2049-03-3', 1, '2018-08-15'),
(37, 309, 18, 27, 2, 0, 0, '2049-03-8', 1, '2018-08-20'),
(38, 311, 18, 30, 2, 0, 0, '2049-03-12', 1, '2018-08-24'),
(40, 293, 18, 0, 0, 0, 0, '2049-03-24', 1, '2018-09-05'),
(41, 293, 18, 0, 0, 0, 0, '2049-03-24', 1, '2018-09-05'),
(42, 293, 18, 0, 0, 0, 0, '2049-03-24', 1, '2018-09-05'),
(43, 293, 18, 0, 0, 0, 0, '2049-03-24', 1, '2018-09-05'),
(44, 294, 18, 0, 0, 0, 0, '2049-03-24', 1, '2018-09-05'),
(45, 312, 18, 29, 2, 0, 0, '2049-03-26', 1, '2018-09-07'),
(46, 313, 15, 0, 0, 0, 0, '2021-04-21', 1, '2018-10-05'),
(47, 315, 15, 0, 0, 0, 0, '2021-04-22', 1, '2018-10-06'),
(48, 315, 15, 0, 0, 0, 0, '2021-04-22', 1, '2018-10-06'),
(49, 315, 15, 0, 0, 0, 0, '2021-04-22', 1, '2018-10-06'),
(50, 315, 15, 0, 0, 0, 0, '2021-04-22', 1, '2018-10-06'),
(51, 315, 15, 0, 0, 0, 0, '2021-04-22', 1, '2018-10-06'),
(52, 318, 15, 47, 1, 0, 0, '2021-04-24', 1, '2018-10-08'),
(53, 319, 15, 47, 2, 0, 0, '2021-04-25', 1, '2018-10-09'),
(54, 320, 15, 53, 1, 0, 0, '2021-04-26', 1, '2018-10-10'),
(55, 320, 15, 53, 1, 0, 0, '2021-04-26', 1, '2018-10-10'),
(56, 322, 15, 48, 1, 0, 0, '2021-04-27', 1, '2018-10-11'),
(57, 323, 15, 52, 1, 0, 0, '2021-04-27', 1, '2018-10-11'),
(58, 324, 15, 48, 2, 0, 0, '2021-04-28', 1, '2018-10-12'),
(59, 298, 21, 0, 0, 0, 0, '2021-04-30', 1, '2018-10-14'),
(60, 324, 15, 59, 1, 0, 0, '2021-05-1', 1, '2018-10-15'),
(61, 324, 21, 59, 2, 0, 0, '2021-05-1', 1, '2018-10-15'),
(62, 327, 15, 59, 1, 0, 0, '2021-05-1', 1, '2018-10-15'),
(63, 304, 21, 59, 3, 0, 0, '2021-05-1', 1, '2018-10-15'),
(64, 273, 15, 59, 5, 0, 0, '2021-05-1', 1, '2018-10-15'),
(65, 285, 19, 59, 6, 0, 0, '1969-12-31', 1, '2018-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

CREATE TABLE `comisiones` (
  `id` int(11) NOT NULL,
  `id_cartilla_R` int(11) NOT NULL,
  `id_cartilla_G` int(11) NOT NULL,
  `nivel_cartilla_G` int(10) NOT NULL,
  `fecha` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha_cobro` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comisiones`
--

INSERT INTO `comisiones` (`id`, `id_cartilla_R`, `id_cartilla_G`, `nivel_cartilla_G`, `fecha`, `valor`, `estado`, `fecha_cobro`) VALUES
(1, 1, 2, 1, '2018-03-1', '100.00', '1', ''),
(2, 2, 3, 1, '2018-03-1', '100.00', '1', ''),
(3, 1, 3, 2, '2018-03-1', '75.00', '0', ''),
(4, 2, 4, 1, '2018-03-1', '100.00', '1', ''),
(5, 1, 4, 2, '2018-03-1', '75.00', '1', ''),
(6, 3, 5, 1, '2018-03-1', '100.00', '1', ''),
(7, 2, 5, 2, '2018-03-1', '75.00', '1', ''),
(8, 3, 6, 1, '2018-03-1', '100.00', '1', ''),
(9, 2, 6, 2, '2018-03-1', '75.00', '1', ''),
(10, 4, 7, 1, '2018-03-1', '100.00', '0', ''),
(11, 2, 7, 2, '2018-03-1', '75.00', '1', ''),
(12, 4, 8, 1, '2018-03-1', '100.00', '0', ''),
(13, 2, 8, 2, '2018-03-1', '75.00', '1', ''),
(14, 1, 2, 1, '2018-03-1', '200.00', '1', ''),
(15, 6, 9, 1, '2018-03-1', '100.00', '0', ''),
(16, 3, 9, 2, '2018-03-1', '75.00', '1', ''),
(17, 6, 10, 1, '2018-03-1', '100.00', '0', ''),
(18, 3, 10, 2, '2018-03-1', '75.00', '1', ''),
(19, 7, 11, 1, '2018-03-1', '100.00', '1', ''),
(20, 4, 11, 2, '2018-03-1', '75.00', '0', ''),
(21, 7, 12, 1, '2018-03-1', '100.00', '1', ''),
(22, 4, 12, 2, '2018-03-1', '75.00', '0', ''),
(23, 8, 13, 1, '2018-03-1', '100.00', '1', ''),
(24, 4, 13, 2, '2018-03-1', '75.00', '0', ''),
(25, 12, 14, 1, '2018-03-1', '100.00', '1', ''),
(26, 7, 14, 2, '2018-03-1', '75.00', '1', ''),
(27, 1, 15, 1, '2018-03-1', '100.00', '1', ''),
(28, 15, 16, 1, '2018-03-1', '100.00', '1', ''),
(29, 1, 16, 2, '2018-03-1', '75.00', '1', ''),
(30, 15, 17, 1, '2018-03-1', '100.00', '1', ''),
(33, 4, 18, 2, '2018-03-2', '75.00', '0', ''),
(34, 2, 4, 1, '2018-03-2', '200.00', '1', ''),
(35, 1, 4, 2, '2018-03-2', '150.00', '1', ''),
(36, 9, 19, 1, '2018-04-10', '100.00', '0', ''),
(37, 6, 19, 2, '2018-04-10', '75.00', '0', ''),
(39, 23, 24, 1, '2018-04-17', '10.00', '0', ''),
(40, 24, 25, 1, '2018-04-17', '10.00', '0', ''),
(41, 23, 25, 2, '2018-04-17', '7.50', '1', ''),
(42, 24, 26, 1, '2018-04-17', '10.00', '0', ''),
(43, 23, 26, 2, '2018-04-17', '7.50', '1', ''),
(44, 23, 27, 1, '2018-04-23', '10.00', '1', ''),
(45, 25, 28, 1, '2018-04-27', '10.00', '1', ''),
(46, 24, 28, 2, '2018-04-27', '7.50', '1', ''),
(47, 25, 29, 1, '2018-04-27', '10.00', '1', ''),
(48, 24, 29, 2, '2018-04-27', '7.50', '1', ''),
(49, 24, 30, 1, '2018-07-4', '10.00', '0', ''),
(50, 24, 30, 2, '2018-07-4', '7.50', '1', ''),
(51, 24, 31, 1, '2018-07-6', '10.00', '0', ''),
(52, 24, 31, 2, '2018-07-6', '7.50', '1', ''),
(53, 31, 32, 1, '2018-07-7', '10.00', '1', ''),
(54, 26, 32, 2, '2018-07-7', '7.50', '1', ''),
(55, 23, 24, 1, '2018-07-9', '20.00', '1', ''),
(56, 31, 33, 1, '2018-07-13', '10.00', '1', ''),
(57, 26, 33, 2, '2018-07-13', '7.50', '1', ''),
(58, 24, 34, 1, '2018-07-13', '10.00', '0', ''),
(59, 31, 34, 2, '2018-07-13', '7.50', '1', ''),
(60, 25, 35, 1, '2018-07-30', '10.00', '1', ''),
(61, 25, 35, 2, '2018-07-30', '7.50', '1', ''),
(62, 24, 36, 1, '2018-08-15', '10.00', '1', ''),
(63, 26, 36, 2, '2018-08-15', '7.50', '1', ''),
(64, 23, 37, 1, '2018-08-20', '10.00', '1', ''),
(65, 23, 37, 2, '2018-08-20', '7.50', '1', ''),
(66, 24, 38, 1, '2018-08-24', '10.00', '1', ''),
(67, 26, 38, 2, '2018-08-24', '7.50', '1', ''),
(70, 29, 45, 1, '2018-09-7', '10.00', '1', ''),
(71, 25, 45, 2, '2018-09-7', '7.50', '1', ''),
(72, 24, 26, 1, '2018-09-7', '20.00', '1', ''),
(73, 23, 26, 2, '2018-09-7', '15.00', '1', ''),
(74, 47, 52, 1, '2018-10-8', '10.00', '1', ''),
(75, 47, 53, 1, '2018-10-9', '10.00', '1', ''),
(76, 53, 54, 1, '2018-10-10', '10.00', '0', ''),
(77, 47, 54, 2, '2018-10-10', '10.00', '1', ''),
(78, 53, 55, 1, '2018-10-10', '10.00', '0', ''),
(79, 47, 55, 2, '2018-10-10', '10.00', '1', ''),
(80, 47, 56, 1, '2018-10-11', '10.00', '1', ''),
(81, 52, 57, 1, '2018-10-11', '10.00', '1', ''),
(82, 47, 57, 2, '2018-10-11', '10.00', '1', ''),
(83, 47, 58, 1, '2018-10-12', '10.00', '1', ''),
(84, 59, 60, 1, '2018-10-14', '5.00', '1', ''),
(85, 59, 61, 1, '2018-10-14', '5.00', '1', ''),
(86, 59, 62, 1, '2018-10-14', '5.00', '1', ''),
(87, 59, 63, 1, '2018-10-14', '5.00', '1', ''),
(88, 59, 64, 1, '2018-10-15', '5.00', '1', ''),
(89, 59, 65, 1, '2018-10-15', '20.00', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crypto_payments`
--

CREATE TABLE `crypto_payments` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `boxID` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `boxType` enum('paymentbox','captchabox') NOT NULL,
  `orderID` varchar(50) NOT NULL DEFAULT '',
  `userID` varchar(50) NOT NULL DEFAULT '',
  `countryID` varchar(3) NOT NULL DEFAULT '',
  `coinLabel` varchar(6) NOT NULL DEFAULT '',
  `amount` double(20,8) NOT NULL DEFAULT '0.00000000',
  `amountUSD` double(20,8) NOT NULL DEFAULT '0.00000000',
  `unrecognised` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `addr` varchar(34) NOT NULL DEFAULT '',
  `txID` char(64) NOT NULL DEFAULT '',
  `txDate` datetime DEFAULT NULL,
  `txConfirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `txCheckDate` datetime DEFAULT NULL,
  `processed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `processedDate` datetime DEFAULT NULL,
  `recordCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago`
--

CREATE TABLE `metodopago` (
  `idMetodoPago` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `tipoMetodo` varchar(50) NOT NULL,
  `metodo` varchar(45) NOT NULL,
  `urlMonedero` varchar(50) DEFAULT NULL,
  `soporteDeposito` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_08_22_193649_create_users_table', 1),
('2017_08_22_194547_create_users_table', 2),
('2016_07_07_223315_crear_tabla_tipos_usuario', 3),
('2016_07_07_225615_update_table_users_V2', 3),
('2014_10_12_100000_create_password_resets_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id` int(20) NOT NULL,
  `id_cartilla` int(11) NOT NULL,
  `id_cartilla_padre` int(11) NOT NULL,
  `numero_padre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id`, `id_cartilla`, `id_cartilla_padre`, `numero_padre`) VALUES
(1, 1, 0, 1),
(2, 2, 1, 1),
(3, 2, 0, 2),
(4, 3, 2, 1),
(5, 3, 1, 2),
(6, 4, 2, 1),
(7, 4, 1, 2),
(8, 5, 3, 1),
(9, 5, 2, 2),
(10, 6, 3, 1),
(11, 6, 2, 2),
(12, 7, 4, 1),
(13, 7, 2, 2),
(14, 8, 4, 1),
(15, 8, 2, 2),
(16, 9, 6, 1),
(17, 9, 3, 2),
(18, 10, 6, 1),
(19, 10, 3, 2),
(20, 11, 7, 1),
(21, 11, 4, 2),
(22, 12, 7, 1),
(23, 12, 4, 2),
(24, 13, 8, 1),
(25, 13, 4, 2),
(26, 14, 12, 1),
(27, 14, 7, 2),
(28, 15, 1, 1),
(29, 15, 0, 2),
(30, 16, 15, 1),
(31, 16, 1, 2),
(32, 17, 15, 1),
(33, 17, 1, 2),
(34, 18, 8, 1),
(35, 18, 4, 2),
(36, 19, 9, 1),
(37, 19, 6, 2),
(42, 23, 0, 1),
(43, 24, 23, 1),
(44, 24, 0, 2),
(45, 25, 24, 1),
(46, 25, 23, 2),
(47, 26, 24, 1),
(48, 26, 23, 2),
(49, 27, 23, 1),
(50, 27, 0, 2),
(51, 28, 25, 1),
(52, 28, 24, 2),
(53, 29, 25, 1),
(54, 29, 24, 2),
(55, 30, 26, 1),
(56, 30, 24, 2),
(57, 31, 26, 1),
(58, 31, 24, 2),
(59, 32, 31, 1),
(60, 32, 26, 2),
(61, 33, 31, 1),
(62, 33, 26, 2),
(63, 34, 33, 1),
(64, 34, 31, 2),
(65, 35, 29, 1),
(66, 35, 25, 2),
(67, 36, 30, 1),
(68, 36, 26, 2),
(69, 37, 27, 1),
(70, 37, 23, 2),
(71, 38, 30, 1),
(72, 38, 26, 2),
(73, 39, 3, 1),
(74, 39, 2, 2),
(75, 40, 0, 1),
(76, 41, 0, 1),
(77, 42, 0, 1),
(78, 43, 0, 1),
(79, 44, 0, 1),
(80, 45, 29, 1),
(81, 45, 25, 2),
(82, 46, 0, 1),
(83, 47, 0, 1),
(84, 48, 0, 1),
(85, 49, 0, 1),
(86, 50, 0, 1),
(87, 51, 0, 1),
(88, 52, 47, 1),
(89, 52, 0, 2),
(90, 53, 47, 1),
(91, 53, 0, 2),
(92, 54, 53, 1),
(93, 54, 47, 2),
(94, 55, 53, 1),
(95, 55, 47, 2),
(96, 56, 48, 1),
(97, 56, 0, 2),
(98, 57, 52, 1),
(99, 57, 47, 2),
(100, 58, 48, 1),
(101, 58, 0, 2),
(102, 59, 0, 1),
(103, 60, 59, 1),
(104, 60, 0, 2),
(105, 61, 59, 1),
(106, 61, 0, 2),
(107, 62, 59, 1),
(108, 62, 0, 2),
(109, 63, 59, 1),
(110, 63, 0, 2),
(111, 64, 59, 1),
(112, 64, 0, 2),
(113, 65, 59, 1),
(114, 65, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cartilla_padre` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `metodo_pago` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_pago` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(20,0) NOT NULL,
  `estado` int(11) NOT NULL,
  `documento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `referido` int(10) NOT NULL,
  `posicion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_user`, `id_cartilla_padre`, `id_plan`, `metodo_pago`, `fecha_pago`, `valor`, `estado`, `documento`, `referido`, `posicion`) VALUES
(1, 270, 2, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(2, 271, 2, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(3, 272, 3, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(4, 273, 3, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(5, 274, 4, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(6, 275, 4, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(7, 276, 6, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(8, 277, 6, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(9, 278, 7, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(10, 279, 7, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(11, 280, 8, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(12, 281, 12, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(13, 282, 1, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(14, 283, 15, 15, '1', '2018-03-01', '0', 1, '0000', 0, 1),
(15, 284, 15, 15, '1', '2018-03-01', '0', 1, '0000', 0, 2),
(16, 285, 8, 15, '1', '2018-03-02', '0', 1, '3129145', 0, 2),
(17, 286, 9, 15, '1', '2018-04-10', '0', 1, '', 0, 1),
(18, 288, 21, 18, '1', '2018-04-13', '0', 1, '', 0, 1),
(19, 295, 24, 18, '1', '2018-04-17', '0', 1, '5959084', 0, 1),
(20, 296, 24, 18, '1', '2018-04-17', '0', 1, '', 0, 2),
(21, 296, 23, 18, '1', '2018-04-23', '0', 1, '', 0, 2),
(22, 298, 25, 18, '1', '2018-04-27', '0', 1, '9791244', 0, 1),
(23, 299, 25, 18, '1', '2018-04-27', '0', 1, '9774873', 0, 2),
(24, 302, 26, 18, '1', '2018-07-04', '0', 1, '', 24, 1),
(25, 303, 26, 18, '1', '2018-07-06', '0', 1, '0002', 24, 2),
(26, 304, 31, 18, '1', '2018-07-07', '0', 1, '0003', 31, 1),
(27, 305, 31, 18, '1', '2018-07-13', '0', 1, '004', 31, 2),
(28, 306, 33, 18, '1', '2018-07-13', '0', 1, '0005', 24, 1),
(29, 307, 29, 18, '1', '2018-07-30', '0', 1, '006', 25, 1),
(30, 308, 30, 18, '1', '2018-08-15', '0', 1, '007', 24, 1),
(31, 309, 27, 18, '1', '2018-08-20', '0', 1, '008', 23, 2),
(32, 311, 30, 18, '1', '2018-08-24', '0', 1, '009', 24, 2),
(33, 312, 29, 18, '1', '2018-09-07', '0', 1, '011', 0, 2),
(34, 318, 47, 15, '1', '2018-10-08', '25', 1, '054084', 47, 1),
(35, 319, 47, 15, '1', '2018-10-09', '25', 1, '0000', 47, 2),
(36, 320, 53, 15, '1', '2018-10-09', '25', 1, '0000', 53, 1),
(37, 320, 53, 15, '1', '2018-10-09', '25', 1, '0000', 0, 1),
(38, 322, 48, 15, '1', '2018-10-10', '25', 1, '0000efectivo', 47, 1),
(39, 323, 52, 15, '1', '2018-10-11', '25', 1, '8600120', 0, 1),
(40, 324, 48, 15, '1', '2018-10-12', '25', 1, '015519', 47, 2),
(41, 324, 59, 15, '1', '2018-10-15', '0', 1, '', 0, 1),
(42, 324, 59, 21, '1', '2018-10-15', '0', 1, '', 0, 2),
(43, 304, 59, 21, '1', '2018-10-15', '0', 1, '', 0, 3),
(44, 304, 59, 21, '1', '2018-10-15', '0', 1, '', 0, 3),
(45, 327, 59, 15, '1', '2018-10-15', '0', 1, '', 0, 1),
(46, 304, 59, 21, '1', '2018-10-15', '25', 1, '', 0, 3),
(47, 304, 59, 21, '1', '2018-10-15', '25', 1, '', 0, 3),
(48, 304, 59, 21, '1', '2018-10-15', '25', 1, '', 0, 3),
(49, 273, 59, 15, '1', '2018-10-15', '25', 1, '', 0, 5),
(50, 285, 59, 19, '1', '2018-10-15', '100', 1, '', 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre_plan` varchar(45) DEFAULT NULL,
  `valor_plan` decimal(10,2) DEFAULT NULL,
  `cant_hijos` int(10) NOT NULL,
  `porcentaje_comision` int(10) DEFAULT NULL,
  `porcentaje_comision2` int(10) DEFAULT NULL,
  `porcentaje_fondo` int(10) DEFAULT NULL,
  `dias_vencimiento` int(10) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `avatar_plan` varchar(45) DEFAULT NULL,
  `avatar_user` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor_bono` decimal(10,2) NOT NULL,
  `cant_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre_plan`, `valor_plan`, `cant_hijos`, `porcentaje_comision`, `porcentaje_comision2`, `porcentaje_fondo`, `dias_vencimiento`, `estado`, `avatar_plan`, `avatar_user`, `valor_bono`, `cant_users`) VALUES
(15, 'JUNIOR', '25.00', 2, 40, 40, 0, 30, 'Activo', 'iconStart.png', 'userStart.png', '0.00', 10),
(16, 'SENIOR', '1000.00', 2, 20, 15, 10, 90, 'Activo', 'ejecutivo.png', 'userEjecutivo.png', '50.00', 6),
(17, 'MASTER', '2000.00', 10, 20, 15, 0, 365, 'Activo', 'planes.png', 'Master User.png', '50.00', 6),
(18, 'Start', '50.00', 10, 20, 15, 0, 360, 'Activo', 'start.png', 'uStart.png', '50.00', 6),
(19, 'Coach', '100.00', 2, 20, 15, 0, 365, 'Activo', 'Coach Pack.png', 'Coach User.png', '50.00', 6),
(20, 'Líder', '200.00', 2, 20, 15, 0, 365, 'Activo', 'Líder Pack.png', 'Líder User.png', '50.00', 6),
(21, 'Economica', '25.00', 10, 20, 15, 0, 30, 'Activo', 'economico.png', 'economico_avatar.png', '50.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_hijos`
--

CREATE TABLE `red_hijos` (
  `id` int(11) NOT NULL,
  `id_cartilla` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cartilla_hija` int(11) NOT NULL,
  `nivel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `id_cartilla` int(10) NOT NULL,
  `ids_comisiones` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `estado` int(2) NOT NULL,
  `fecha_solicitud` varchar(45) DEFAULT NULL,
  `fecha_pago` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `id_cartilla`, `ids_comisiones`, `valor`, `estado`, `fecha_solicitud`, `fecha_pago`) VALUES
(1, 4, '10,12,20,22,24,33', '500', 1, '2018-03-05', '2018-03-05'),
(2, 9, '36', '100', 1, '2018-04-18', '2018-04-18'),
(3, 6, '15,17,37', '275', 1, '2018-04-18', '2018-04-18'),
(4, 24, '40,42,49,51,58', '50', 1, '2018-08-15', '2018-08-15'),
(5, 23, '39', '10', 1, '2018-10-04', '2018-10-11'),
(6, 53, '76,78', '20', 1, '2018-10-10', '2018-10-10'),
(7, 1, '3', '75', 0, '2018-10-25', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', NULL, NULL),
(2, 'STANDARD', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoDocumento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaInscripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoUsuario` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `email`, `password`, `tipoDocumento`, `cc`, `nacimiento`, `fechaInscripcion`, `telefono`, `celular`, `direccion`, `ciudad`, `provincia`, `pais`, `rol`, `avatar`, `remember_token`, `created_at`, `updated_at`, `tipoUsuario`) VALUES
(33, 'Mastercash', 'Hernan Mera', 'registro@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'CI', '1803608452', '15/05/1982', '25/September/2017', '2828982', '0995371121', 'Av. Cevallos y Eloy Alfaro', 'Ambato', 'Tunguragua', 'Ecuador', 'admin', '', '', '', '', ''),
(269, 'Rosario', 'Rosario Ines Mestanza Lombeida', 'charitomestanza2018@gmail.com', '397dcd4d8d9b6852ce6ece354e27139b', 'CI', '0200973535', '', '1/March/2018', '', '0982394328', 'Recinto Catazacon', 'El Corazon', 'Cotopaxi', 'Ecuador', 'standard', '', '', '', '', ''),
(270, 'Jackeline', 'Graciela Jackeline Vasquez M.', 'charitomestanza2018@gmail.com', '7fd3a408efa3bcaef080ea6d3c2b44c4', 'CI', '1803972304', '', '1/March/2018', '', '0968452532', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(271, 'MercyV', 'Mercy Mariela Vasquez Mestanza', 'charitomestanza2018@gmail.com', '1ed4c879a4d928c8d1ed983fb2eb1424', 'CI', '1803972296', '', '1/March/2018', '', '0981831107', '', '', '', '', 'standard', '', '', '', '', ''),
(272, 'Deicy', 'Deicy Elizabeth Vasquez M.', 'deicybeth@hotmail.com', '64996eef1131fa1cd2867d51ab0eb022', 'CI', '1803972288', '', '1/March/2018', '', '0984657784', 'Av. 12 de Noviembre y Juan B. Vela', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(273, 'AngelP', 'Angel Vicente Parra Tapia', 'charitomestanza2018@gmail.com', '32aa4c80907751eedb48d865bf39bb7b', 'CI', '1804230652', '', '1/March/2018', '', '0987289811', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(274, 'RosaE', 'Rosa Elvira Chulco Quishpe', 'rosachulco2018@gmail.com', '1bfdbe8905ec6339b883fc6d67f0be22', 'CI', '1802798650', '', '1/March/2018', '', '0960011916', 'Moraspungo', 'El Corazon', 'Cotopaxi', 'Ecuador', 'standard', '', '', '', '', ''),
(275, 'MariaP', 'Maria Leonor Piña Moya', 'charitomestanza2018@gmail.com', 'ecd94bd1cd2c9ee155d3d5ea97b5744a', 'CI', '1706225701', '', '1/March/2018', '', '0993243109', '', 'Santo Domingo', 'Tsachilas', 'Ecuador', 'standard', '', '', '', '', ''),
(276, 'CarmenJ', 'Carmen Jaramillo Sarango', 'charitomestanza2018@gmail.com', '955dc002df6eea720faad117e9e057a1', 'CI', '1701815290', '', '1/March/2018', '', '0993956595', '', '', '', '', 'standard', '', '', '', '', ''),
(277, 'MabelO', 'Mabel de Jesus Ortiz Leon', 'charitomestanza2018@gmail.com', '46066b271b7cb7f63ff655d06366b0ab', 'CI', '1706224779', '', '1/March/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(278, 'LuzM', 'Luz Maria Chulco Quishpe', 'rosachulco2018@gmail.com', 'a2d2953d978fa80cca530e43d12cb94c', 'CI', '1721041562', '', '1/March/2018', '', '0985472924', '', '', '', '', 'standard', '', '', '', '', ''),
(279, 'DorisG', 'Martha Doris Gonzalez Mora', 'charitomestanza2018@gmail.com', '42ec2a9d9be640a60b01231a9dbe6c8c', 'CI', '1200474342', '', '1/March/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(280, 'MariaT', 'Maria Azuncion Tiban Tiban', 'charitomestanza2018@gmail.com', '3bad6caa2f3ce921311292b925551d58', 'CI', '1801033265', '', '1/March/2018', '', '0997132702', '', '', '', '', 'standard', '', '', '', '', ''),
(281, 'LuisA', 'Luis Alonso Allaica Caranqui', 'rosachulco2018@gmail.com', 'dea51f6b20d1e7758c771b0bbce6be8f', 'CI', '0602987661', '', '1/March/2018', '', '0978761242', '', '', '', '', 'standard', '', '', '', '', ''),
(282, 'MarianitaC', 'Marianita de Jesus Cabrera M', 'deicybeth@hotmail.com', 'cf7e7cd3c36a7b21a5dd458b3d089292', 'CI', '1801999515', '', '1/March/2018', '', '0984411082', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(283, 'HildaR', 'Hilda Graciela Rivera T', 'hildagrtgeminis@gmail.com', '6748cc7b2f4efd52dfe1d0716bdd8535', 'CI', '1803171949', '', '1/March/2018', '', '0982332983', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(284, 'JimmyC', 'Jimmy Arturo Carpio Segovia', 'deicybeth@hotmail.com', '0f8f94a2fd915c12ca295b4921d69ce7', 'CI', '09117456758', '', '1/March/2018', '', '0995448686', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(285, 'AngelR', 'Angel Serafin Ramon Ortega', 'charitomestanza2018@gmail.com', 'ab1dbd386662b62477b62087a389256a', 'CI', '1100068194', '', '2/March/2018', '', '0967173986', '', 'Santo Domingo', 'Tsachilas', 'Ecuador', 'standard', '', '', '', '', ''),
(286, 'RuthP', 'Ruth Jeaneth Peña Places', 'charitomestanza2018@gmail.com', '243a579ad59a62febbc664415e974f49', 'CI', '0501725584', '', '10/April/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(293, 'OlgerM', 'Olger Mera', 'registrowt@gmail.com', '898f1d67f84396a7387a399f9eafc566', 'CI', '1803608453', '', '17/April/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(294, 'MariaS', 'Maria Celina Salazar Gavilanez', 'charitin70@hotmail.es', 'a38b16173474ba8b1a95bcbc30d3b8a5', 'CI', '1704062486', '', '17/April/2018', '', '0998999796', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(295, 'RosarioR', 'Rosario Verenice Ramos Toro', 'charitin70@hotmail.es', '0f1cc1d3e6bd2180afb6631ae9a04534', 'CI', '1802414316', '', '17/April/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(296, 'SergioA', 'Sergio Fernando Alvarez Mancer', 'sergiofer77@yahoo.es', 'ea7637e6d2f72752c032683c5226bf85', 'CI', '1500566771', '', '17/April/2018', '', '0958820531', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(298, 'AliciaR', 'Alicia Janeth Ramos Toro', 'charitin70@hotmail.es', 'dd26e3a0e67be4d748ca194df030f267', 'CI', '1803135365', '', '27/April/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(299, 'VictorL', 'Victor Hugo Lopez Yanez', 'charitin70@hotmail.es', 'c7323a30b198ed1ec1ddbeae0f207e53', 'CI', '1801425073', '11/09/1965', '27/April/2018', '032466179', '0989616576', 'PINLLO', 'AMBATO', 'TUNGURAHUA', 'ECUADOR', 'standard', '', '', '', '', ''),
(300, 'PatricioS', 'Edwin Patricio Santana Cruz', 'enigmaproducciones62@gmail.com', '723e4c643aa68205e3909f05ffb05472', 'CI', '1802543346', '', '9/May/2018', '', '0992287084', '', 'Ambato', 'Tungurahua', 'Ecuador', 'standard', '', '', '', '', ''),
(301, 'EsperanzaG', 'Eva Esperanza Gomez Huertas', 'gevaesperanza@yahoo.com', '415f52fbb2427cca82f0bff5f47d8afc', 'CI', '1710675941', '', '19/May/2018', '', '0983068240', 'Cevallos', '', '', 'Ecuador', 'standard', '', '', '', '', ''),
(302, 'MarinaM', 'Maria Delia Morales Villacis', 'charitin70@hotmail.es', '9d40509cb0a720b24a23a73556ed451e', 'CI', '0500685698', '', '4/July/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(303, 'DanielV', 'Daniel Emanuel Viera Salazar', 'charitin70@hotmail.es', '81dc9bdb52d04dc20036dbd8313ed055', 'CI', '180537331-1', '', '6/July/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(304, 'AnaPaula', 'Silvana Verónica Chulde Garzón', 'silvanavero2010@hotmail.com', '0c2fe50984085085865233e3b78d44fd', 'CI', '1718721945', '', '7/July/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(305, 'CarlosV', 'Carlos Enrique Viera Pérez', 'charitin70@hotmail.es', '976e22fdcc5715211011c2934c8a6e27', 'CI', '050073561-0', '', '13/July/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(306, 'PaquitaN', 'Paquita Núñez Robles', 'ginagutierrez14@hotmail.com', '8c889689f2285c001b4d018aaa4b92ad', 'CI', '1800971432', '', '13/July/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(307, 'GuevaraC', 'Carlos Guevara', 'alupacar@hotmail.com', '8070371bc80e9a600fb2a0c3224bba8e', 'CI', '1802052306', '', '30/July/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(308, 'TanniaB', 'Tannia Alexandra Bonilla Solís', 'sergiofer77@yahoo.es', 'e8d3b20b32fbdf28a8172aacdc45ab89', 'CI', '1804245817', '', '15/August/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(309, 'EduardoV', 'Angel Eduardo Veintimilla O.', 'angelveintimilla1966@gmail.com', 'd0f7db40e698109f62a4de9e7b2b93dd', 'CI', '0911763266', '', '20/August/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(310, 'Prueba', 'Prueba nuevo plan', 'registrowt@gmail.com', '29e6b59977646629a1a9974fc16578d3', 'CI', '1803608421', '23/08/2018', '23/August/2018', '032828982', '0995371121', '', '', '', '', 'standard', '', '', '', '', ''),
(311, 'Madeley', 'Patricia Magdalena Narváez Y.', 'paty-magda@hotmail.com', '0207ae2c0835e37334d6bb3da48573ff', 'CI', '1710861269', '', '24/August/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(312, 'NancyM', 'Nancy Teresa Manjarrés Nerea', 'registrowt@gmail.com', '7241a9a1fd4b3bff6c32c7109a7e17be', 'CI', '1800970939', '', '7/September/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(315, 'Poderenred', 'Joselo Lojano Quiroga', 'joselo-2010@hotmail.com', 'db0316ae09d67d9b9fdd74f9c1975f61', 'CI', '1900382639', '', '6/October/2018', '', '0998675759', 'Chimbacalle', 'Quito', 'Pichincha', 'Ecuador', 'standard', '', '', '', '', ''),
(318, 'marielalojano', 'MARIELA LOJANO QUIROGA', 'marielalojanocherman@hotmail.com', '40750a260601b813d4581d2b8bcc919a', 'CI', '1900433382', '', '8/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(319, 'katyandrade', 'KATY MARILU ANDRADE NIETO', 'sra.katy.16@hotmail.com', 'c44fc3dc27984f16f56ae04ac3ba779f', 'CI', '1400395719', '', '9/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(320, 'roxanaazogue', 'Roxana Azogue', 'roxanaazogue2018@gmail.com', '2fa195cc1694c87f697a46383edb3bd0', 'CI', '1600642738', '', '9/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(322, 'oroenlinea', 'HERNAN MERA', 'registrowt@gmail.com', '7a1ac1622294e104b0bec1862ab760bf', 'CI', '0995371121', '', '10/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(323, 'Campeon1', 'Félix Lojano', 'fslojano@hotmail.com', 'dd384afc6f5f59b97c8e32017ea7ef51', 'CI', '1900318302', '', '11/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(324, 'julialozano', 'Julia Lozano', 'joselo-2010@hotmail.com', 'c434dfa86bded33a9e479eb71272db7b', 'CI', '1400546691', '', '12/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', ''),
(327, 'Mastercash25', 'jjdskfajdlsj', 'lupaproyectos@gmail.com', 'aa2a473adff0c9402d6df15c4941da84', 'CI', '4456666', '', '15/October/2018', '', '', '', '', '', '', 'standard', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustes`
--
ALTER TABLE `ajustes`
  ADD PRIMARY KEY (`idajustes`);

--
-- Indices de la tabla `bonos`
--
ALTER TABLE `bonos`
  ADD PRIMARY KEY (`idbonos`);

--
-- Indices de la tabla `cartillas`
--
ALTER TABLE `cartillas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comisiones`
--
ALTER TABLE `comisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crypto_payments`
--
ALTER TABLE `crypto_payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD UNIQUE KEY `key3` (`boxID`,`orderID`,`userID`,`txID`,`amount`,`addr`),
  ADD KEY `boxID` (`boxID`),
  ADD KEY `boxType` (`boxType`),
  ADD KEY `userID` (`userID`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `amount` (`amount`),
  ADD KEY `amountUSD` (`amountUSD`),
  ADD KEY `coinLabel` (`coinLabel`),
  ADD KEY `unrecognised` (`unrecognised`),
  ADD KEY `addr` (`addr`),
  ADD KEY `txID` (`txID`),
  ADD KEY `txDate` (`txDate`),
  ADD KEY `txConfirmed` (`txConfirmed`),
  ADD KEY `txCheckDate` (`txCheckDate`),
  ADD KEY `processed` (`processed`),
  ADD KEY `processedDate` (`processedDate`),
  ADD KEY `recordCreated` (`recordCreated`),
  ADD KEY `key1` (`boxID`,`orderID`),
  ADD KEY `key2` (`boxID`,`orderID`,`userID`);

--
-- Indices de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`idMetodoPago`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `red_hijos`
--
ALTER TABLE `red_hijos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `cc` (`cc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajustes`
--
ALTER TABLE `ajustes`
  MODIFY `idajustes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bonos`
--
ALTER TABLE `bonos`
  MODIFY `idbonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cartillas`
--
ALTER TABLE `cartillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `comisiones`
--
ALTER TABLE `comisiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `crypto_payments`
--
ALTER TABLE `crypto_payments`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  MODIFY `idMetodoPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `red_hijos`
--
ALTER TABLE `red_hijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
