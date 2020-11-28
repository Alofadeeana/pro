-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for samad
CREATE DATABASE IF NOT EXISTS `samad` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `samad`;

-- Dumping structure for table samad.factories
CREATE TABLE IF NOT EXISTS `factories` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(150) DEFAULT NULL,
  `FAddress` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table samad.factories: ~0 rows (approximately)
DELETE FROM `factories`;
/*!40000 ALTER TABLE `factories` DISABLE KEYS */;
INSERT INTO `factories` (`FID`, `FName`, `FAddress`) VALUES
	(5, 'مصنع 1', 'الخرطوم المنطقة الصناعية'),
	(6, 'مصنع 2', 'بحري');
/*!40000 ALTER TABLE `factories` ENABLE KEYS */;

-- Dumping structure for table samad.factory_orders
CREATE TABLE IF NOT EXISTS `factory_orders` (
  `FOID` int(11) NOT NULL AUTO_INCREMENT,
  `FID` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL,
  `Oder_date` date DEFAULT NULL,
  `production_date` date DEFAULT NULL,
  `assent` int(11) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`FOID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table samad.factory_orders: ~2 rows (approximately)
DELETE FROM `factory_orders`;
/*!40000 ALTER TABLE `factory_orders` DISABLE KEYS */;
INSERT INTO `factory_orders` (`FOID`, `FID`, `SID`, `Oder_date`, `production_date`, `assent`, `note`) VALUES
	(4, 6, 4, '2020-01-27', '2020-01-27', 1, 'lllll'),
	(6, 5, 3, '2020-01-20', '2020-01-27', 2, '2');
/*!40000 ALTER TABLE `factory_orders` ENABLE KEYS */;

-- Dumping structure for table samad.samad
CREATE TABLE IF NOT EXISTS `samad` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `SName` varchar(150) DEFAULT NULL,
  `Stype` varchar(50) DEFAULT NULL,
  `SStatus` varchar(50) DEFAULT NULL,
  `howuse` text,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table samad.samad: ~0 rows (approximately)
DELETE FROM `samad`;
/*!40000 ALTER TABLE `samad` DISABLE KEYS */;
INSERT INTO `samad` (`SID`, `SName`, `Stype`, `SStatus`, `howuse`) VALUES
	(3, 'سماد 1', 'كميائي', 'سائل', 'رش باستخدام اداة 2 على الزرع'),
	(4, 'سماد 2', 'مركب', 'سائل', 'الاستخدام');
/*!40000 ALTER TABLE `samad` ENABLE KEYS */;

-- Dumping structure for table samad.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table samad.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
	(1, 'admin', 'admin', 'admin', '123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
