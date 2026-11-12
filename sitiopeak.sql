-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2026 at 03:09 PM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitiopeak`
--

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id_calificaciones` int NOT NULL AUTO_INCREMENT,
  `id_sabor` int NOT NULL,
  `puntuacion` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_calificaciones`),
  KEY `id_sabor` (`id_sabor`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificaciones`, `id_sabor`, `puntuacion`, `fecha`) VALUES
(25, 4, 4, '2026-11-12 08:42:54'),
(6, 6, 3, '2026-10-30 12:44:11'),
(7, 3, 2, '2026-10-30 12:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre`, `email`, `mensaje`) VALUES
(1, 'Catalina CARREIRA', 'catapcarreira@gmail.com', 'TREMENDA la pagina!!'),
(2, 'Faustino', 'faus@gmail.com', 'Me encanta el helado y la pagina web!!!');

-- --------------------------------------------------------

--
-- Table structure for table `sabores`
--

DROP TABLE IF EXISTS `sabores`;
CREATE TABLE IF NOT EXISTS `sabores` (
  `id_sabor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linea` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_sabor`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sabores`
--

INSERT INTO `sabores` (`id_sabor`, `nombre`, `linea`, `descripcion`, `imagen`) VALUES
(1, 'Chocolate Brownie', '	PRO', 'Cremoso, intenso y con pedacitos de brownie.', 'img-/chocolate-brownie-pro.png'),
(2, 'Cookies & Cream', 'PRO', 'Helado cremoso con trocitos de galletitas de chocolate.', 'img-/cookiesandcream-pro.png'),
(3, 'Vainilla', 'PRO', 'Helado de vainilla cremoso, suave y con alto contenido de proteína.', 'img-/vainilla-pro.png'),
(4, 'Dulce de Leche', 'PRO', 'Helado de dulce de leche cremoso, intenso y con alto contenido de proteína.', 'img-/dulcedeleche-pro.png'),
(5, 'Oat Latte', 'PLANT', 'Helado de café con base de avena, cremoso y de origen vegetal.', 'img-/oatlate-plant.png'),
(6, 'Pistachio', 'PLANT', 'Helado de pistacho con base vegetal, suave y con intenso sabor a frutos secos.', 'img-/pistachio-plant.png'),
(7, 'Banana Peanut', 'PLANT', 'Helado de banana y maní con base vegetal, cremoso y naturalmente dulce.', 'img-/bananapeanut-plant.png'),
(8, 'Coconut', 'PLANT', 'Helado de coco con base vegetal, de textura suave y sabor tropical.', 'img-/coconut-plant.png'),
(9, 'Cherry', 'PURE', 'Helado frutal de cereza, fresco y elaborado con ingredientes simples.', 'img-/cherry-pure.png'),
(10, 'Lemon', 'PURE', 'Helado de limón fresco, ligero y con un toque cítrico.', 'img-/Lemon-pure.png'),
(11, 'Blueberry', 'PURE', 'Helado de arándanos, frutal y refrescante, elaborado con ingredientes simples.', 'img-/blueberry.png'),
(12, 'Strawberry Cream', 'PURE', 'Helado de frutillas con una textura suave y cremosa, de sabor fresco y delicado.', 'img-/strawberry-cream.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `email`, `password`) VALUES
(8, 'Faustino', 'Santoro', 'Faus@gmail.com', 'faus12'),
(9, 'Catalina', 'Carreira', 'catapcarreira@gmail.com', '12'),
(3, 'Lu', 'Lula', 'Lulula@gmail.com', 'Lulula90'),
(6, 'Catalina', 'Carreira', 'catapcarreira@gmail.com', '12345'),
(5, 'Mara', 'Balbi', 'marapbalbi@gmail.com', 'Mara12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
