-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 02:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_noticias`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getApp` (IN `appId` INT)  READS SQL DATA
    COMMENT 'Obtiene toda la información de la aplicación y sus noticias.'
SELECT `id_app`, a.titulo, `idioma_default`, `plataforma`, a.icono, a.manejable, a.activo, a.fecha_creacion, a.ultimo_cambio, i.titulo AS titulo_idioma, i.abreviacion
FROM apps AS a
INNER JOIN idioma as i on i.id_idioma = a.idioma_default
WHERE a.activo = 1
AND i.activo = 1
AND a.id_app = appId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id_app` int(5) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `idioma_default` int(5) NOT NULL,
  `plataforma` int(2) NOT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `manejable` tinyint(1) NOT NULL DEFAULT '1',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene las aplicaciones que se trataran.';

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id_app`, `titulo`, `idioma_default`, `plataforma`, `icono`, `manejable`, `activo`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(5, 'Global', 16, 3, 'global.png', 0, 1, '2016-12-22 18:01:00', NULL, NULL, '2017-01-07 20:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `idioma`
--

CREATE TABLE `idioma` (
  `id_idioma` int(5) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `abreviacion` varchar(2) NOT NULL,
  `manejable` tinyint(1) NOT NULL DEFAULT '1',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla usada para almacenar los idiomas que tienen las apps.';

--
-- Dumping data for table `idioma`
--

INSERT INTO `idioma` (`id_idioma`, `titulo`, `abreviacion`, `manejable`, `activo`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(16, 'Ingles', 'EN', 0, 1, '2016-12-22 18:00:00', NULL, NULL, '2017-01-07 20:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(5) NOT NULL,
  `type` int(1) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(5) NOT NULL,
  `app_lider` int(5) NOT NULL,
  `idioma` int(5) NOT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `encabezado` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `global` tinyint(1) NOT NULL DEFAULT '0',
  `publicada` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plataformas`
--

CREATE TABLE `plataformas` (
  `id_plataforma` int(5) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `icono` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `manejable` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `plataformas`
--

INSERT INTO `plataformas` (`id_plataforma`, `titulo`, `icono`, `manejable`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(3, 'Unasingned', NULL, 0, '2017-01-02 12:50:00', NULL, NULL, '2017-01-07 20:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ap_paterno` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ap_materno` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `ap_paterno`, `ap_materno`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(1, 'albertoha94', 'qwerty123', 'Alberto', 'Herrera', 'Alanis', '2017-01-02 12:22:00', NULL, NULL, '2017-01-07 20:07:45'),
(2, 'oz111', 'qwerty123', 'Oscar', 'Hernandez', 'Hernandez', '2017-01-02 12:23:00', NULL, NULL, '2017-01-07 20:07:45'),
(3, 'lanne_ein', 'qwerty123', 'Brenda', 'Ruiz', 'Acosta', '2017-01-02 12:24:00', NULL, NULL, '2017-01-07 20:07:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id_idioma`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id_plataforma`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id_app` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_idioma` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id_plataforma` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
