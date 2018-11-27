-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for condtravel
CREATE DATABASE IF NOT EXISTS `condtravel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `condtravel`;

-- Dumping structure for table condtravel.t_customer
CREATE TABLE IF NOT EXISTS `t_customer` (
  `customer_name` varchar(30) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_phonenumber` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`customer_name`,`customer_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table condtravel.t_customer: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_customer` ENABLE KEYS */;

-- Dumping structure for table condtravel.t_order
CREATE TABLE IF NOT EXISTS `t_order` (
  `order_id` int(3) NOT NULL AUTO_INCREMENT,
  `quantity` int(8) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `departure` datetime NOT NULL,
  `payment_proof` char(1) NOT NULL DEFAULT 'F',
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `FK_t_order_t_customer` (`customer_name`,`customer_email`),
  KEY `FK_t_order_t_schedule` (`departure`),
  CONSTRAINT `FK_t_order_t_customer` FOREIGN KEY (`customer_name`, `customer_email`) REFERENCES `t_customer` (`customer_name`, `customer_email`),
  CONSTRAINT `FK_t_order_t_schedule` FOREIGN KEY (`departure`) REFERENCES `t_schedule` (`departure`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table condtravel.t_order: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_order` ENABLE KEYS */;

-- Dumping structure for table condtravel.t_schedule
CREATE TABLE IF NOT EXISTS `t_schedule` (
  `route` char(2) NOT NULL,
  `departure` datetime NOT NULL,
  `price` int(12) NOT NULL,
  PRIMARY KEY (`departure`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table condtravel.t_schedule: ~205 rows (approximately)
/*!40000 ALTER TABLE `t_schedule` DISABLE KEYS */;
INSERT INTO `t_schedule` (`route`, `departure`, `price`) VALUES
	('BJ', '2018-12-01 09:00:00', 50000),
	('JB', '2018-12-01 13:00:00', 50000),
	('BJ', '2018-12-02 09:00:00', 50000),
	('JB', '2018-12-02 13:00:00', 50000),
	('BJ', '2018-12-03 09:00:00', 50000),
	('JB', '2018-12-03 13:00:00', 50000),
	('BJ', '2018-12-04 09:00:00', 50000),
	('JB', '2018-12-04 13:00:00', 50000),
	('BJ', '2018-12-05 09:00:00', 50000),
	('JB', '2018-12-05 13:00:00', 50000),
	('BJ', '2018-12-06 09:00:00', 50000),
	('JB', '2018-12-06 13:00:00', 50000),
	('BJ', '2018-12-07 09:00:00', 50000),
	('JB', '2018-12-07 13:00:00', 50000),
	('BJ', '2018-12-08 09:00:00', 50000),
	('JB', '2018-12-08 13:00:00', 50000),
	('BJ', '2018-12-09 09:00:00', 50000),
	('JB', '2018-12-09 13:00:00', 50000),
	('BJ', '2018-12-10 09:00:00', 50000),
	('JB', '2018-12-10 13:00:00', 50000),
	('BJ', '2018-12-11 09:00:00', 50000),
	('JB', '2018-12-11 13:00:00', 50000),
	('BJ', '2018-12-12 09:00:00', 50000),
	('JB', '2018-12-12 13:00:00', 50000),
	('BJ', '2018-12-13 09:00:00', 50000),
	('JB', '2018-12-13 13:00:00', 50000),
	('BJ', '2018-12-14 09:00:00', 50000),
	('JB', '2018-12-14 13:00:00', 50000),
	('BJ', '2018-12-15 09:00:00', 50000),
	('JB', '2018-12-15 13:00:00', 50000),
	('BJ', '2018-12-16 09:00:00', 50000),
	('JB', '2018-12-16 13:00:00', 50000),
	('BJ', '2018-12-17 09:00:00', 50000),
	('JB', '2018-12-17 13:00:00', 50000),
	('BJ', '2018-12-18 09:00:00', 50000),
	('JB', '2018-12-18 13:00:00', 50000),
	('BJ', '2018-12-19 09:00:00', 50000),
	('JB', '2018-12-19 13:00:00', 50000),
	('BJ', '2018-12-20 09:00:00', 50000),
	('JB', '2018-12-20 13:00:00', 50000),
	('BJ', '2018-12-21 09:00:00', 50000),
	('JB', '2018-12-21 13:00:00', 50000),
	('BJ', '2018-12-22 09:00:00', 50000),
	('JB', '2018-12-22 13:00:00', 50000),
	('BJ', '2018-12-23 09:00:00', 50000),
	('JB', '2018-12-23 13:00:00', 50000),
	('BJ', '2018-12-24 09:00:00', 50000),
	('JB', '2018-12-24 13:00:00', 50000),
	('BJ', '2018-12-25 09:00:00', 50000),
	('JB', '2018-12-25 13:00:00', 50000),
	('BJ', '2018-12-26 09:00:00', 50000),
	('JB', '2018-12-26 13:00:00', 50000),
	('BJ', '2018-12-27 09:00:00', 50000),
	('JB', '2018-12-27 13:00:00', 50000),
	('BJ', '2018-12-28 09:00:00', 50000),
	('JB', '2018-12-28 13:00:00', 50000),
	('BJ', '2018-12-29 09:00:00', 50000),
	('JB', '2018-12-29 13:00:00', 50000),
	('BJ', '2018-12-30 09:00:00', 50000),
	('JB', '2018-12-30 13:00:00', 50000),
	('BJ', '2018-12-31 09:00:00', 50000),
	('JB', '2018-12-31 13:00:00', 50000),
	('BJ', '2019-01-01 09:00:00', 50000),
	('JB', '2019-01-01 13:00:00', 50000),
	('BJ', '2019-01-02 09:00:00', 50000),
	('JB', '2019-01-02 13:00:00', 50000),
	('BJ', '2019-01-03 09:00:00', 50000),
	('JB', '2019-01-03 13:00:00', 50000),
	('BJ', '2019-01-04 09:00:00', 50000),
	('JB', '2019-01-04 13:00:00', 50000),
	('BJ', '2019-01-05 09:00:00', 50000),
	('JB', '2019-01-05 13:00:00', 50000),
	('BJ', '2019-01-06 09:00:00', 50000),
	('JB', '2019-01-06 13:00:00', 50000),
	('BJ', '2019-01-07 09:00:00', 50000),
	('JB', '2019-01-07 13:00:00', 50000),
	('BJ', '2019-01-08 09:00:00', 50000),
	('JB', '2019-01-08 13:00:00', 50000),
	('BJ', '2019-01-09 09:00:00', 50000),
	('JB', '2019-01-09 13:00:00', 50000),
	('BJ', '2019-01-10 09:00:00', 50000),
	('JB', '2019-01-10 13:00:00', 50000),
	('BJ', '2019-01-11 09:00:00', 50000),
	('JB', '2019-01-11 13:00:00', 50000),
	('BJ', '2019-01-12 09:00:00', 50000),
	('JB', '2019-01-12 13:00:00', 50000),
	('BJ', '2019-01-13 09:00:00', 50000),
	('JB', '2019-01-13 13:00:00', 50000),
	('BJ', '2019-01-14 09:00:00', 50000),
	('JB', '2019-01-14 13:00:00', 50000),
	('BJ', '2019-01-15 09:00:00', 50000),
	('JB', '2019-01-15 13:00:00', 50000),
	('BJ', '2019-01-16 09:00:00', 50000),
	('JB', '2019-01-16 13:00:00', 50000),
	('BJ', '2019-01-17 09:00:00', 50000),
	('JB', '2019-01-17 13:00:00', 50000),
	('BJ', '2019-01-18 09:00:00', 50000),
	('JB', '2019-01-18 13:00:00', 50000),
	('BJ', '2019-01-19 09:00:00', 50000),
	('JB', '2019-01-19 13:00:00', 50000),
	('BJ', '2019-01-20 09:00:00', 50000),
	('JB', '2019-01-20 13:00:00', 50000),
	('BJ', '2019-01-21 09:00:00', 50000),
	('JB', '2019-01-21 13:00:00', 50000),
	('BJ', '2019-01-22 09:00:00', 50000),
	('JB', '2019-01-22 13:00:00', 50000),
	('BJ', '2019-01-23 09:00:00', 50000),
	('JB', '2019-01-23 13:00:00', 50000),
	('BJ', '2019-01-24 09:00:00', 50000),
	('JB', '2019-01-24 13:00:00', 50000),
	('BJ', '2019-01-25 09:00:00', 50000),
	('JB', '2019-01-25 13:00:00', 50000),
	('BJ', '2019-01-26 09:00:00', 50000),
	('JB', '2019-01-26 13:00:00', 50000),
	('BJ', '2019-01-27 09:00:00', 50000),
	('JB', '2019-01-27 13:00:00', 50000),
	('BJ', '2019-01-28 09:00:00', 50000),
	('JB', '2019-01-28 13:00:00', 50000),
	('BJ', '2019-01-29 09:00:00', 50000),
	('JB', '2019-01-29 13:00:00', 50000),
	('BJ', '2019-01-30 09:00:00', 50000),
	('JB', '2019-01-30 13:00:00', 50000),
	('BJ', '2019-01-31 09:00:00', 50000),
	('JB', '2019-01-31 13:00:00', 50000),
	('BJ', '2019-02-01 09:00:00', 50000),
	('JB', '2019-02-01 13:00:00', 50000),
	('BJ', '2019-02-02 09:00:00', 50000),
	('JB', '2019-02-02 13:00:00', 50000),
	('BJ', '2019-02-03 09:00:00', 50000),
	('JB', '2019-02-03 13:00:00', 50000),
	('BJ', '2019-02-04 09:00:00', 50000),
	('JB', '2019-02-04 13:00:00', 50000),
	('BJ', '2019-02-05 09:00:00', 50000),
	('JB', '2019-02-05 13:00:00', 50000),
	('BJ', '2019-02-06 09:00:00', 50000),
	('JB', '2019-02-06 13:00:00', 50000),
	('BJ', '2019-02-07 09:00:00', 50000),
	('JB', '2019-02-07 13:00:00', 50000);
/*!40000 ALTER TABLE `t_schedule` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
