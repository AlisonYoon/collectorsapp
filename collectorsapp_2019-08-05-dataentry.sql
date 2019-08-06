# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.20.20 (MySQL 5.6.44)
# Database: collectorsapp
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
	(1,'vegetable oil','PANTRY',200,50),
	(2,'salt','PANTRY',550,30),
	(3,'olive oil','PANTRY',650,60),
	(4,'sesame oil','PANTRY',785,5),
	(5,'balsamic vinegar','PANTRY',950,40),
	(6,'flour','PANTRY',200,90),
	(7,'sugar','PANTRY',200,95),
	(8,'yeast','PANTRY',350,60),
	(9,'honey','PANTRY',450,40),
	(10,'maple syrup','FRIDGE',760,45),
	(11,'oat milk','FRIDGE',165,70),
	(12,'frozen seafood','FREEZER',1470,0),
	(13,'zucchini','PRODUCE',100,70),
	(14,'onion','PRODUCE',280,40),
	(15,'cabbage','PRODUCE',250,30),
	(16,'tofu','FRIDGE',250,100),
	(17,'mushroom','PRODUCE',100,80),
	(18,'carrot','PRODUCE',65,50),
	(19,'hummus','FRIDGE',300,95),
	(20,'hemp milk','FRIDGE',180,100),
	(21,'rice milk','FRIDGE',170,100),
	(22,'pasta','OTHER',165,100),
	(23,'cereal','OTHER',300,60),
	(24,'ginger rhubarb jam','FRIDGE',450,60),
	(25,'strawberry jam','FRIDGE',350,50),
	(26,'spread butter','FRIDGE',300,80),
	(27,'green onion','PRODUCE',130,80),
	(28,'ice cream','FREEZER',500,45),
	(29,'soy sauce','PANTRY',650,90),
	(30,'gochujang','FRIDGE',550,70),
	(33,'rice cake','FRIDGE',750,20),
	(34,'cauliflower','PRODUCE',250,50),
	(35,'apple vinegar','PANTRY',250,60),
	(36,'rice','PANTRY',1630,95);

/*!40000 ALTER TABLE `grocery_item` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
