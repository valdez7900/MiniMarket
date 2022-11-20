-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para minimarket
CREATE DATABASE IF NOT EXISTS `minimarket` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `minimarket`;

-- Volcando estructura para tabla minimarket.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreArticulo` varchar(250) DEFAULT NULL,
  `precioArticulo` double NOT NULL DEFAULT 0,
  `precioDescuento` double NOT NULL DEFAULT 0,
  `fotoArticulo` longtext DEFAULT '',
  PRIMARY KEY (`idArticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarket.listaarticulos
CREATE TABLE IF NOT EXISTS `listaarticulos` (
  `idLista` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(150) DEFAULT NULL,
  `correoCliente` varchar(150) DEFAULT NULL,
  `listaProductos` longtext DEFAULT NULL,
  PRIMARY KEY (`idLista`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarket.nosotros
CREATE TABLE IF NOT EXISTS `nosotros` (
  `idNosotros` int(11) NOT NULL AUTO_INCREMENT,
  `nosotros` longtext DEFAULT NULL,
  PRIMARY KEY (`idNosotros`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarket.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(150) DEFAULT NULL,
  `contraUsuario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
