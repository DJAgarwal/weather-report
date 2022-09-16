-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for weather_report
CREATE DATABASE IF NOT EXISTS `weather_report` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `weather_report`;

-- Dumping structure for table weather_report.weather_data
CREATE TABLE IF NOT EXISTS `weather_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `weather` varchar(50) DEFAULT NULL,
  `weather_desc` varchar(50) DEFAULT NULL,
  `temp` float DEFAULT NULL,
  `min_temp` float DEFAULT NULL,
  `max_temp` float DEFAULT NULL,
  `pressure` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `wind_speed` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
