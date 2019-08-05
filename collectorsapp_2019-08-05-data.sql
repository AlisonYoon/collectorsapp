# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.20.20 (MySQL 5.6.44)
# Database: collectorsapp
# Generation Time: 2019-08-05 14:46:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table grocery_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grocery_item`;

CREATE TABLE `grocery_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL DEFAULT '',
  `category` enum('PANTRY','FRIDGE','FREEZER','PRODUCE','OTHER') NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `remaining` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `grocery_item` WRITE;
/*!40000 ALTER TABLE `grocery_item` DISABLE KEYS */;

INSERT INTO `grocery_item` (`id`, `item`, `category`, `price`, `remaining`)
VALUES
	(1,'vegetable oil','PANTRY',2,50),
	(2,'salt','PANTRY',5,30),
	(3,'olive oil','PANTRY',5,60),
	(4,'sesame oil','PANTRY',7,5),
	(5,'balsamic vinegar','PANTRY',9,40),
	(6,'flour','PANTRY',2,90),
	(7,'sugar','PANTRY',2,95),
	(8,'yeast','PANTRY',3,60),
	(9,'honey','PANTRY',5,40),
	(10,'maple syrup','FRIDGE',7,45),
	(11,'oat milk','FRIDGE',2,70),
	(12,'frozen seafood','FREEZER',14,0);

/*!40000 ALTER TABLE `grocery_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grocery_to_do
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grocery_to_do`;

CREATE TABLE `grocery_to_do` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL DEFAULT '',
  `category` enum('PANTRY','FRIDGE','FREEZER','PRODUCE','OTHER') NOT NULL,
  `price` int(11) unsigned DEFAULT NULL,
  `from` enum('CO-OP','FRUIT STAND','SCOOPAWAY','KOREAN MARKET','FISH MARKET','AMAZON') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `grocery_to_do` WRITE;
/*!40000 ALTER TABLE `grocery_to_do` DISABLE KEYS */;

INSERT INTO `grocery_to_do` (`id`, `item`, `category`, `price`, `from`)
VALUES
	(1,'sesame oil','PANTRY',7,'KOREAN MARKET'),
	(2,'frozen seafood','FREEZER',14,'FISH MARKET');

/*!40000 ALTER TABLE `grocery_to_do` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
