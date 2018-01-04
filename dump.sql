-- MySQL dump 10.13  Distrib 5.7.19, for osx10.12 (x86_64)
--
-- Host: localhost    Database: crypto_manager
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
-- Table structure for table `balances`
--

DROP TABLE IF EXISTS `balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `btc` double NOT NULL,
  `eth` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balances`
--

LOCK TABLES `balances` WRITE;
/*!40000 ALTER TABLE `balances` DISABLE KEYS */;
INSERT INTO `balances` VALUES (1,1,0,0),(2,2,10,10),(3,3,0,0),(4,4,0,0),(5,5,0,0),(6,6,0,0),(7,7,0,0),(8,8,0,0),(9,9,162,-10),(10,10,46,34),(11,11,0,0),(12,12,0,0),(13,13,100,-50),(14,14,0,0),(15,15,87.6665446,-100),(16,16,0,0),(17,17,950,0),(18,18,270.9106,95.9779),(19,19,0,0);
/*!40000 ALTER TABLE `balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_membership`
--

DROP TABLE IF EXISTS `group_membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_membership` (
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_membership`
--

LOCK TABLES `group_membership` WRITE;
/*!40000 ALTER TABLE `group_membership` DISABLE KEYS */;
INSERT INTO `group_membership` VALUES (1,28),(6,28),(1,27),(13,NULL),(13,NULL),(13,41),(14,43),(1,43),(3,43),(14,46),(14,48),(15,49),(3,49),(NULL,NULL),(NULL,NULL),(NULL,NULL),(16,50),(3,50),(17,54),(3,53),(18,57),(18,58),(18,59),(3,NULL),(18,60),(3,60),(3,59),(3,57),(16,57);
/*!40000 ALTER TABLE `group_membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_transaction`
--

DROP TABLE IF EXISTS `group_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_transaction` (
  `group_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(12) DEFAULT NULL,
  `eth_change` double NOT NULL,
  `btc_change` double NOT NULL,
  `eth_market_value` double NOT NULL,
  `btc_market_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_transaction`
--

LOCK TABLES `group_transaction` WRITE;
/*!40000 ALTER TABLE `group_transaction` DISABLE KEYS */;
INSERT INTO `group_transaction` VALUES ('Newdffdg','1234@1234',1513689436,12,12,841.616,18338.2),('','1234@1234',1513689684,0,0,842.659,18411.1),('6@6 Leeds the way','6@6',1513689867,-13.44,12.22,842.659,18411.1),('Judith\'s group','judith@judith',1513714594,-12.44444,12.2222,846.944,18168.3),('Melissa\'s group','Melissa@Melissa',1514135172,-10900,1000,665.249,13472.6),('This is melissa\'s group','Melissa@Melissa',1514463196,12.22,100,713.061,14376.7),('This a new group','56@56',1514556302,-100,100,751.931,14528.4),('Howard\'s group','56@56',1514914843,0,0,2.41471,14021),('Howard\'s group','56@56',1514916395,-1222,12,2.43757,14015.6),('sdffdf','56@56',1514918307,122,-12,2.42106,14549),('sdffdf','56@56',1514918338,122,-12,2.42106,14549),('Howard\'s group','56@56',1514918370,-12,12,2.39224,14549),('sdffdf','56@56',1514918449,122,122,2.39224,14656),('Howard\'s group','56@56',1514919022,23,23,897.363,14743.7),('Howard\'s group','56@56',1514919049,122,122,893.337,14817.8),('Select','56@56',1514919175,-122,122,893.337,14817.8),('Select','56@56',1514919177,0,0,893.337,14817.8),('Select','56@56',1514919183,-233,-233,893.337,14817.8),('sdffdf','56@56',1514925621,0,12,872.567,15190.6),('sdffdf','56@56',1514939167,12.3333,12.233,889.876,15100.6),('A modal added group','56@56',1515008825,12,12,939.615,15035.5),('Howard\'s group','56@56',1515062142,0,0,960.424,14908.3),('A team of keen investors','56@56',1515063909,0,-12,967.75,14986.5);
/*!40000 ALTER TABLE `group_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `admin_user` int(11) NOT NULL,
  `group_description` varchar(300) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'12121',9,'dfgfdfdgdg'),(2,'Project uno',10,'A group of friends investing in bitcoin together '),(3,'Project dos',10,'A group of friends investing in ethmereu together '),(4,'bhbhbh',11,'bhbhbh'),(5,'New dfdsf',11,'fsgsfdg'),(6,'New dfdsfyrty',11,'fsgsfdgttr'),(7,'My new projecy',11,'A quick and easy description '),(26,'sfsddsgf',12,'sdfgfsdsfg'),(27,'sfsdfgs',12,'fsgfsdgdg'),(28,'qwert',12,'qwert'),(41,'NewGroupForFUn',13,'A new investment group'),(43,'6@6 Leeds the way',14,'A selection of people who know what they\'re doing '),(46,'blahBlah',14,'fwerrewrrewerw'),(48,'trereert',14,'gddfgdggfd'),(49,'Judith\'s group',15,'blah blah blah'),(50,'This is a new group',16,'blah blah blah'),(53,'This is melissa\'s group',17,'Melissa work friends investment group '),(54,'Another group by Melissa',17,'Things are happening here '),(57,'Howard\'s group',18,'A new investment group'),(58,'sdffdf',18,'sdfds'),(59,'A modal added group',18,'This is a new group added by modal'),(60,'A team of keen investors ',18,'We want to make mega money ');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logged_in_member`
--

LOCK TABLES `logged_in_member` WRITE;
/*!40000 ALTER TABLE `logged_in_member` DISABLE KEYS */;
INSERT INTO `logged_in_member` VALUES (8,10,'4f441c1e221c478af630278e85b57f16','b936cee86c9f87aa5d3c6f2e84cb5a4239a5fe50480a6ec66b70ab5b1f4ac6730c6c515421b327ec1d69402e53dfb49ad7381eb067b338fd7b0cb22247225d47'),(9,11,'4f441c1e221c478af630278e85b57f16','b936cee86c9f87aa5d3c6f2e84cb5a4239a5fe50480a6ec66b70ab5b1f4ac6730c6c515421b327ec1d69402e53dfb49ad7381eb067b338fd7b0cb22247225d47'),(15,15,'4f441c1e221c478af630278e85b57f16','b936cee86c9f87aa5d3c6f2e84cb5a4239a5fe50480a6ec66b70ab5b1f4ac6730c6c515421b327ec1d69402e53dfb49ad7381eb067b338fd7b0cb22247225d47'),(25,13,'77e43e694977b9a2d9b082314f436d3f','b936cee86c9f87aa5d3c6f2e84cb5a4239a5fe50480a6ec66b70ab5b1f4ac6730c6c515421b327ec1d69402e53dfb49ad7381eb067b338fd7b0cb22247225d47');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'qwerty','14dad1d5508e1d059837524c62d9f1e9c029ad3310d7a278206c66d5883135986cfb53fd98e438f8f612e5c88d8313893e7e616e3741be317e2c2006ca894255','123'),(2,'1234','fec26731ef4ddbb306192e6c2d3607e8de134ba76d66c71680628871f650d7c0cbbe913716eb77f301b8b9efc9e61f194827d8debbe9c079a5c9923cad71a5cd','123'),(3,'howard.j@live.co.uk','5791d3023a55571910aaaac78b84742cf841dbc3595c2894b4d4740534976a933db20479aee282cc9112ad06ebff4fd61096b4b695c18e657f5b842940e9f0f0','123'),(4,'howard.j@live.co.uk3','5791d3023a55571910aaaac78b84742cf841dbc3595c2894b4d4740534976a933db20479aee282cc9112ad06ebff4fd61096b4b695c18e657f5b842940e9f0f0','123'),(5,'dogdog@dog.dog','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(6,'1@1','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(7,'12@12','0755e7833cbc4c544aa8a4483434d9142884031fd53d211d85e98c47e9b0a8b850ac791f842c7f58ce19503b76e2a43d1e09e7adca113c75a79171dd7aa83834','123'),(8,'4@4','5e182c2e6b3bc0a2656e5c0f0f74c831477862eb6c06b578203f58e2713eb0c920215a473e0045b4c2ad9fd185d98031d2e13eb0347f0cb7b5c623e3d447cb76','123'),(9,'5@5','5e182c2e6b3bc0a2656e5c0f0f74c831477862eb6c06b578203f58e2713eb0c920215a473e0045b4c2ad9fd185d98031d2e13eb0347f0cb7b5c623e3d447cb76','123'),(10,'C@M','5e182c2e6b3bc0a2656e5c0f0f74c831477862eb6c06b578203f58e2713eb0c920215a473e0045b4c2ad9fd185d98031d2e13eb0347f0cb7b5c623e3d447cb76','123'),(11,'1@3','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(12,'1@32','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(13,'1234@1234','fec26731ef4ddbb306192e6c2d3607e8de134ba76d66c71680628871f650d7c0cbbe913716eb77f301b8b9efc9e61f194827d8debbe9c079a5c9923cad71a5cd','123'),(14,'6@6','fec26731ef4ddbb306192e6c2d3607e8de134ba76d66c71680628871f650d7c0cbbe913716eb77f301b8b9efc9e61f194827d8debbe9c079a5c9923cad71a5cd','123'),(15,'judith@judith','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123'),(16,'2345@2345','76c454279b4570d91edb2e20aee6dabfe780234bfff9aff583fb049637c6511200ab8ae19eabb686c370de89b53db8fb8dc47e04e6da2a22edf5d59a477d7234','123'),(17,'Melissa@Melissa','fec26731ef4ddbb306192e6c2d3607e8de134ba76d66c71680628871f650d7c0cbbe913716eb77f301b8b9efc9e61f194827d8debbe9c079a5c9923cad71a5cd','123'),(18,'56@56','ac0cb09ac7ce98c4ccf4b6be8dd071296ca5dd8c82f82a7a9a2a0d9dfbc1e3595bac16478778c866c7f046dd557584cc294442f7a8d87e37b0269f9067161258','123'),(19,'123123@123123','b6f3a6ccef0313776da81e420032bac387a0b9e8c03cb373fc9867e1b16eaf40de476be5d8a8d5a1ea4078295b12d9a62190dc9f780c06a8c0b64c0a1f7efca9','123');
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

-- Dump completed on 2018-01-04 12:19:40
