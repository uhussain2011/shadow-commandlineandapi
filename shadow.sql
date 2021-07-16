-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for phpmyadmin
CREATE DATABASE IF NOT EXISTS `phpmyadmin` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `phpmyadmin`;

-- Dumping structure for table phpmyadmin.shadow
CREATE TABLE IF NOT EXISTS `shadow` (
  `isbn` int(11) NOT NULL,
  `language_code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `original_publication_year` int(11) DEFAULT NULL,
  `average_rating` float DEFAULT NULL,
  `books_count` int(11) DEFAULT NULL,
  `authors` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `original_title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


/*!40000 ALTER TABLE `shadow` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
