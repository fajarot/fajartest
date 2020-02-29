-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.18 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for arkademy
CREATE DATABASE IF NOT EXISTS `arkademy` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `arkademy`;

-- Dumping structure for table arkademy.cashier
CREATE TABLE IF NOT EXISTS `cashier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table arkademy.cashier: ~3 rows (approximately)
/*!40000 ALTER TABLE `cashier` DISABLE KEYS */;
INSERT INTO `cashier` (`id`, `name`) VALUES
	(1, 'fajar'),
	(2, 'budi'),
	(3, 'agus');
/*!40000 ALTER TABLE `cashier` ENABLE KEYS */;

-- Dumping structure for table arkademy.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table arkademy.category: ~3 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'makanan'),
	(2, 'minuman'),
	(3, 'camilan');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table arkademy.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_cashier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`id_category`),
  KEY `FK_product_cashier` (`id_cashier`),
  CONSTRAINT `FK_product_cashier` FOREIGN KEY (`id_cashier`) REFERENCES `cashier` (`id`),
  CONSTRAINT `FK_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table arkademy.product: ~3 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `price`, `id_category`, `id_cashier`) VALUES
	(1, 'indomie', '5.000', 1, 2),
	(2, 'kopi', '7.300', 2, 3),
	(3, 'ayam goreng', '5.600', 1, 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
