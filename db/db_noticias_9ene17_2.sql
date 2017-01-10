-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 01:23 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
SELECT a.id_app, a.titulo, a.idioma_default, a.plataforma, a.icono, a.manejable, a.activo, a.fecha_creacion, a.ultimo_cambio, i.titulo AS titulo_idioma, i.abreviacion
FROM apps a
INNER JOIN idioma i
ON i.id_idioma = a.idioma_default
WHERE a.activo = 1
AND i.activo = 1
AND a.id_app = appId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getNewsLanguagesByApp` (IN `appId` INT)  READS SQL DATA
    COMMENT 'Obtiene los idiomas que se manejan en una aplicación.'
SELECT i.id_idioma, i.titulo, i.abreviacion
FROM idioma i
WHERE i.id_idioma IN (SELECT n.idioma 
                      FROM noticia n 
                      WHERE n.app_lider = appId)
ORDER BY i.titulo ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getNewsOfLanguage` (IN `oAppId` INT, IN `oLanguageId` INT)  READS SQL DATA
    COMMENT 'Obtiene las noticias de acuerdo a la id del lenguaje y app'
SELECT `id_noticia`, `app_lider`, `idioma`, `icono`, `encabezado`, `contenido`, `global`, `publicada`, `activo`, `fecha_visible`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio` 
FROM `noticia` 
WHERE `app_lider` = oAppId
AND `idioma` = oLanguageId$$

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
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene las aplicaciones que se trataran.';

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id_app`, `titulo`, `idioma_default`, `plataforma`, `icono`, `manejable`, `activo`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(5, 'Global', 16, 3, 'global.png', 0, 1, '2016-12-22 18:01:00', NULL, NULL, '2017-01-03 17:17:37'),
(6, 'App test', 16, 0, NULL, 1, 1, '2017-01-04 10:40:29', NULL, NULL, '2017-01-04 10:40:29'),
(7, 'App test', 16, 0, NULL, 1, 1, '2017-01-04 10:40:31', NULL, NULL, '2017-01-04 10:40:31');

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
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla usada para almacenar los idiomas que tienen las apps.';

--
-- Dumping data for table `idioma`
--

INSERT INTO `idioma` (`id_idioma`, `titulo`, `abreviacion`, `manejable`, `activo`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(16, 'Ingles', 'EN', 0, 1, '2016-12-22 18:00:00', '2017-01-02 10:00:00', NULL, '2017-01-03 17:21:04'),
(17, 'bla', 'BL', 1, 0, '2017-01-02 12:58:11', NULL, '2017-01-03 18:01:12', '2017-01-03 18:01:12'),
(18, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', NULL, '2017-01-03 18:00:59', '2017-01-03 18:00:59'),
(19, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', '2017-01-03 00:00:00', '2017-01-03 18:01:01', '2017-01-03 18:01:01'),
(20, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', NULL, '2017-01-03 18:01:02', '2017-01-03 18:01:02'),
(21, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', NULL, '2017-01-03 18:01:04', '2017-01-03 18:01:04'),
(22, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', '2017-01-02 12:00:00', '2017-01-03 18:01:06', '2017-01-03 18:01:06'),
(23, 'bla3', 'BL', 1, 0, '2017-01-02 12:59:06', '2017-01-03 17:50:09', '2017-01-03 18:01:08', '2017-01-03 18:01:08'),
(24, 'bla2', 'BL', 1, 0, '2017-01-02 12:59:06', '2017-01-03 17:48:59', '2017-01-03 18:01:10', '2017-01-03 18:01:10'),
(25, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', NULL, '2017-01-03 17:54:27', '2017-01-03 17:54:27'),
(26, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', NULL, '2017-01-03 17:08:18', '2017-01-03 17:21:04'),
(27, 'bla', 'BL', 1, 0, '2017-01-02 12:59:06', NULL, '2017-01-03 17:48:54', '2017-01-03 17:48:54'),
(28, 'testx', 'T', 1, 0, '2017-01-03 17:50:22', NULL, '2017-01-03 17:54:26', '2017-01-03 17:54:26'),
(29, 'test3', 'Q', 1, 0, '2017-01-03 17:54:04', NULL, '2017-01-03 17:54:18', '2017-01-03 17:54:18'),
(30, 'test1', 'Q', 1, 1, '2017-01-03 18:04:50', NULL, NULL, '2017-01-03 18:04:50'),
(31, 'tetx', 'X', 1, 0, '2017-01-03 18:04:57', NULL, '2017-01-04 10:02:41', '2017-01-04 10:02:41'),
(32, 'aTESTY2', 'Y', 1, 1, '2017-01-03 18:05:03', '2017-01-04 10:27:44', NULL, '2017-01-04 10:27:44'),
(33, 'testz', 'Z', 1, 1, '2017-01-03 18:05:08', NULL, NULL, '2017-01-03 18:05:08'),
(34, 'Cambio2', 'Q', 1, 1, '2017-01-03 18:05:14', '2017-01-04 10:27:50', NULL, '2017-01-04 10:27:50'),
(35, 'blep', 'S', 1, 1, '2017-01-04 10:02:29', '2017-01-04 10:27:47', NULL, '2017-01-04 10:27:47');

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
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `type`, `mensaje`, `fecha_creacion`) VALUES
(1, 1, 'Se ha modificado el lenguaje a Cambio2(Q).', '2017-01-04 09:22:00'),
(2, 1, 'Se ha modificado el lenguaje a TESTY2(Y).', '2017-01-04 09:22:09'),
(3, 1, 'Se ha modificado el lenguaje a aTESTY2(Y).', '2017-01-04 09:22:26'),
(4, 0, 'Se ha agregado el lenguaje blep(S).', '2017-01-04 10:02:30'),
(5, 2, 'DesactivaciÃ³n del lenguaje tetx(X).', '2017-01-04 10:02:42'),
(6, 1, 'Se ha modificado el lenguaje a aTESTY2(Y).', '2017-01-04 10:27:44'),
(7, 1, 'Se ha modificado el lenguaje a blep(S).', '2017-01-04 10:27:46'),
(8, 1, 'Se ha modificado el lenguaje a blep(S).', '2017-01-04 10:27:47'),
(9, 1, 'Se ha modificado el lenguaje a Cambio2(Q).', '2017-01-04 10:27:49'),
(10, 1, 'Se ha modificado el lenguaje a Cambio2(Q).', '2017-01-04 10:27:50'),
(11, 0, 'Se ha agregado la aplicaciÃ³n App test.', '2017-01-04 10:40:29'),
(12, 0, 'Se ha agregado la aplicaciÃ³n App test.', '2017-01-04 10:40:31');

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
  `fecha_visible` date DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `app_lider`, `idioma`, `icono`, `encabezado`, `contenido`, `global`, `publicada`, `activo`, `fecha_visible`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(1, 5, 16, NULL, 'test', 'sdlaslkdaslkdhaskldhkasl', 0, NULL, 1, NULL, '2017-01-09 12:44:22', NULL, NULL, '2017-01-09 12:44:22'),
(2, 5, 16, NULL, 'test', 'sdlaslkdaslkdhaskldhkasl', 0, NULL, 1, NULL, '2017-01-09 12:44:59', NULL, NULL, '2017-01-09 12:44:59'),
(3, 5, 17, NULL, 'test2', 'sdlaslkdaslkdhaskldhkasl', 0, NULL, 1, NULL, '2017-01-09 12:45:18', NULL, NULL, '2017-01-09 12:45:18'),
(4, 5, 17, NULL, 'test2', 'sdlaslkdaslkdhaskldhkasl', 0, NULL, 1, NULL, '2017-01-09 12:46:05', NULL, NULL, '2017-01-09 12:46:05'),
(5, 5, 18, NULL, 'test3', 'sdlaslkdaslkdhaskldhkasl', 0, NULL, 1, NULL, '2017-01-09 12:46:05', NULL, NULL, '2017-01-09 12:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `plataformas`
--

CREATE TABLE `plataformas` (
  `id_plataforma` int(5) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `icono` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `manejable` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `plataformas`
--

INSERT INTO `plataformas` (`id_plataforma`, `titulo`, `icono`, `manejable`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(3, 'Unasingned', NULL, 0, '2017-01-02 12:50:00', NULL, NULL, '2017-01-03 17:23:27'),
(4, 'test', 'icon', 1, '2017-01-04 12:45:34', NULL, NULL, '2017-01-04 12:45:34');

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
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `ultimo_cambio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `ap_paterno`, `ap_materno`, `fecha_creacion`, `fecha_edicion`, `fecha_baja`, `ultimo_cambio`) VALUES
(1, 'albertoha94', 'qwerty123', 'Alberto', 'Herrera', 'Alanis', '2017-01-02 12:22:00', NULL, NULL, '2017-01-03 17:24:03'),
(2, 'oz111', 'qwerty123', 'Oscar', 'Hernandez', 'Hernandez', '2017-01-02 12:23:00', NULL, NULL, '2017-01-03 17:24:03'),
(3, 'lanne_ein', 'qwerty123', 'Brenda', 'Ruiz', 'Acosta', '2017-01-02 12:24:00', NULL, NULL, '2017-01-03 17:24:03');

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
  MODIFY `id_app` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_idioma` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id_plataforma` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
