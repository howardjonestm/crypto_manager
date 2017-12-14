-- MySQL dump 10.13  Distrib 5.7.19, for osx10.12 (x86_64)
--
-- Host: localhost    Database: s6
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `s6`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `s6` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `s6`;

--
-- Table structure for table `bet`
--

DROP TABLE IF EXISTS `bet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bet` (
  `betid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `betWeekid` int(11) NOT NULL,
  `datePlaced` date NOT NULL,
  PRIMARY KEY (`betid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bet`
--

LOCK TABLES `bet` WRITE;
/*!40000 ALTER TABLE `bet` DISABLE KEYS */;
INSERT INTO `bet` VALUES (27,1,2,'2017-10-18'),(28,1,2,'2017-10-18'),(29,1,8,'2017-10-18'),(30,3,1,'2017-10-19'),(31,3,1,'2017-10-19');
/*!40000 ALTER TABLE `bet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `betSelection`
--

DROP TABLE IF EXISTS `betSelection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `betSelection` (
  `betSelectionid` int(11) NOT NULL AUTO_INCREMENT,
  `betid` int(11) NOT NULL,
  `playerid` int(11) NOT NULL,
  `didScore` int(1) NOT NULL,
  `betWeekid` int(11) DEFAULT NULL,
  PRIMARY KEY (`betSelectionid`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `betSelection`
--

LOCK TABLES `betSelection` WRITE;
/*!40000 ALTER TABLE `betSelection` DISABLE KEYS */;
INSERT INTO `betSelection` VALUES (121,27,1,1,2),(122,27,2,1,2),(123,27,3,1,2),(124,27,4,1,2),(125,27,6,0,2),(126,27,7,0,2),(127,28,1,0,2),(128,28,2,0,2),(129,28,5,0,2),(130,28,4,0,2),(131,28,6,0,2),(132,28,9,0,2),(133,29,1,1,8),(134,29,2,1,8),(135,29,3,1,8),(136,29,4,1,8),(137,29,5,1,8),(138,29,6,1,8),(139,31,4,0,1),(140,31,8,1,1),(141,31,9,0,1),(142,31,10,0,1),(143,31,12,0,1),(144,31,16,1,1);
/*!40000 ALTER TABLE `betSelection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `betWeek`
--

DROP TABLE IF EXISTS `betWeek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `betWeek` (
  `betweekid` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`betweekid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `betWeek`
--

LOCK TABLES `betWeek` WRITE;
/*!40000 ALTER TABLE `betWeek` DISABLE KEYS */;
/*!40000 ALTER TABLE `betWeek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Harry','$2y$10$2j55pjSa7b.5EMs2GtZRYOhIsxVvwz8N..0FDA0ZVY6B2S36b7uPG','1994-02-02 00:00:00'),(2,'James','$2y$10$Sbzx3WmSH9AzdX7BjLC1E.3YmQ83lQffGOhDXoDj5BZa/LL5SGQ8q','1988-02-10 00:00:00'),(3,'luke','$2y$10$cbLLyiOi9f/8Sc8IrsJbLufBMZdWww6tn0Uejaqk9wgYVNePG8Tfa','1992-01-14 00:00:00'),(4,'howardjonestm','$2y$10$AjZ7aNEvYBJ0RdsRdD7hEuAjLKYO24xL6NLdkQpJ5q/tWuJMltlti','1990-09-01 00:00:00'),(5,'qwerty','$2y$10$MWcON608Y4kmhMO/Sogaz.54KcThwCMi6ajnC1SeAnXYn9HDCTPXy','1990-09-01 00:00:00'),(6,'hjhj007','$2y$10$mmGaSekW3ZDxCNjKYFM9MuHCUEpueS1AbhZJcgg4aTBWPTJyutV3O','1995-09-01 00:00:00');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `playerid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`playerid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'Ademola Lookman'),(2,'Ahmed Musa'),(3,'Alexis Sanchez'),(4,'Ashley Barnes'),(5,'Ayoze Perez'),(6,'Benik Afobe'),(7,'Callum Wilson'),(8,'Christian Benteke'),(9,'Connor Wickham'),(10,'Danny Welbeck'),(11,'Diego Costa'),(12,'Freddie Ladapo'),(13,'Islam Slimani'),(14,'Jamie Vardy'),(15,'Jermain Defoe'),(16,'Joshua King'),(17,'Nahki Wells'),(18,'Olivier Giroud'),(19,'Oumar Niasse'),(20,'Sergio Aguero'),(21,'Theo Walcott');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playerWeek`
--

DROP TABLE IF EXISTS `playerWeek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playerWeek` (
  `playerid` int(11) NOT NULL,
  `weekid` int(11) NOT NULL,
  `didScore` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playerWeek`
--

LOCK TABLES `playerWeek` WRITE;
/*!40000 ALTER TABLE `playerWeek` DISABLE KEYS */;
INSERT INTO `playerWeek` VALUES (1,2,1),(2,2,1),(3,2,1),(4,2,1),(5,2,1),(16,2,1),(8,4,1),(1,7,1),(2,7,1),(3,7,1),(4,7,1),(5,7,1),(6,7,1),(7,7,1),(8,7,1),(9,7,1),(10,7,1),(11,7,1),(12,7,1),(13,7,1),(14,7,1),(15,7,1),(16,7,1),(17,7,1),(18,7,1),(19,7,1),(20,7,1),(21,7,1),(1,8,1),(2,8,1),(3,8,1),(4,8,1),(5,8,1),(6,8,1),(7,8,1),(1,1,1),(2,1,1),(3,1,1),(6,1,1),(8,1,1),(14,1,1),(16,1,1),(19,1,1);
/*!40000 ALTER TABLE `playerWeek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `crypto_manager`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `crypto_manager` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `crypto_manager`;

--
-- Table structure for table `logged_in_member`
--

DROP TABLE IF EXISTS `logged_in_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logged_in_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `token` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logged_in_member`
--

LOCK TABLES `logged_in_member` WRITE;
/*!40000 ALTER TABLE `logged_in_member` DISABLE KEYS */;
INSERT INTO `logged_in_member` VALUES (3,8,'98b71b6b01090af695e49d9b1f3651e1','b936cee86c9f87aa5d3c6f2e84cb5a4239a5fe50480a6ec66b70ab5b1f4ac6730c6c515421b327ec1d69402e53dfb49ad7381eb067b338fd7b0cb22247225d47');
/*!40000 ALTER TABLE `logged_in_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(128) NOT NULL,
  `password` char(128) NOT NULL,
  `user_salt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'123','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(2,'432','2a1c6afcf4070cd58cad8a24795c60f938b7e21ffbd259dc2565a634ff8a248bbf6b5c662f35dab4ab4f18a9b709d061543ec86c6bf94347e77214247402ee4b','123'),(3,'543','83ddc58c832fbc749edfa4c2941399249ad684a3aeddc93acf6b854e32e92c6b476499109714351a725a09260c4bcc5cb4f80394aaeba6892385a72b3d494539','123'),(4,'ashley','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(5,'123321','47f29fbfe0c92d0ab2431dc9cdb917e9dd171cc23c9eaf7f373b99c8308df50067983a3715e473cd68fdfe24b6624ab9b23a3c9532bf175d3aef45f6d94a2361','123'),(6,'fasdfdsdf','e7e0d86d9fc76ea19267796ea7159ee8c5bb7004413b3c808d2df6bd8a735daa9987349cfb5ff7909a9c926c530b9517eaa10a35e0a39d776dc560ba007354ed','123'),(7,'qwerty','14dad1d5508e1d059837524c62d9f1e9c029ad3310d7a278206c66d5883135986cfb53fd98e438f8f612e5c88d8313893e7e616e3741be317e2c2006ca894255','123'),(8,'zxcv','c9f399fad37e9125323dbe782ea7dd10b86de0c4e7c919db8531173a26ed6c8a106328c46a73b3a9cd361ed2b4ce0dd8bfd207afd0d3c3cbe768200f190c9967','123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-10 12:24:16
