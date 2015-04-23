-- MySQL dump 10.13  Distrib 5.6.21, for osx10.6 (x86_64)
--
-- Host: localhost    Database: cap
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `minimumAge` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Seniors',23),(2,'Espoirs',20),(3,'Juniors',18),(4,'Vétérans 1',40),(5,'Vétérans 2',50),(6,'Vétérans 3',60),(7,'Vétérans 4',70),(223,'Cadets',15),(224,'Benjamins',13);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrants`
--

DROP TABLE IF EXISTS `entrants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `runId` int(10) unsigned NOT NULL,
  `runnerId` int(10) unsigned NOT NULL,
  `bibNumber` varchar(10) DEFAULT NULL,
  `runTime` time DEFAULT NULL,
  `didFinish` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `runTime` (`runTime`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrants`
--

LOCK TABLES `entrants` WRITE;
/*!40000 ALTER TABLE `entrants` DISABLE KEYS */;
INSERT INTO `entrants` VALUES (1,1,1,'00372','00:43:35',1),(2,1,2,'00374','00:52:38',1),(3,2,1,'986',NULL,0),(4,2,2,'275','00:00:00',1),(6,2,2,'275','00:30:25',1),(13,4,3,'007789','01:20:36',1),(19,4,3,'007789','01:20:36',1),(21,103,1,'00358','01:38:52',1),(22,103,2,'00360','01:42:52',1);
/*!40000 ALTER TABLE `entrants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `location` varchar(80) DEFAULT NULL,
  `rundate` date NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Corrida pédestre de Toulouse','Toulouse Capitole','2015-07-03','Randonnée pédestre dans les rues de Toulouse à la tombée du soleil.'),(5,'Les boucles boulocaines','Bouloc','2015-06-01','Parcours nature dans le village de Bouloc et ses environs.'),(100,'Semi de Blagnac','Blagnac-Andromède','2015-03-08','Parcours tout plat dans les nouveaux quartiers de Blagnac et de la zone Andromède'),(101,'Marathon de New-York','New-York Manhattan','2015-05-10','Une course mythique dans les rues de la Grosse Pomme.'),(102,'Semi-marathon de Colomiers','Colomiers le Perget','2015-04-05','Un parcours plat et propice à un bon chrono dans le nouveau quartier du Perget, à Colomiers.'),(103,'Semi-marathon de Barcelone','Barcelone, las Rambles','2015-02-15','Un peu d\'exotisme avec ce parcours en Catalogne!'),(105,'dddsdfsdf','sdfsdf','2015-04-30','sdfsdfsdf');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `runners`
--

DROP TABLE IF EXISTS `runners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `runners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birthDate` date NOT NULL,
  `ffaId` varchar(20) DEFAULT NULL,
  `picture` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lastName` (`lastName`,`firstName`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runners`
--

LOCK TABLES `runners` WRITE;
/*!40000 ALTER TABLE `runners` DISABLE KEYS */;
INSERT INTO `runners` VALUES (1,'Martin','Jean-Marc','M','1974-03-02','PR123654',NULL),(2,'Cazaux','Irène','F','1975-06-15','L987654',NULL),(4,'Petit','Annie','J','1972-06-11','L000000',NULL),(103,'Smith','John','M','1977-07-15','',NULL),(154,'Button','Benjamin','M','1978-05-06',NULL,NULL),(155,'Gentile','Milo','M','1974-03-23',NULL,NULL);
/*!40000 ALTER TABLE `runners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `runs`
--

DROP TABLE IF EXISTS `runs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `runs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventId` int(10) unsigned NOT NULL,
  `start` time NOT NULL,
  `name` varchar(25) NOT NULL,
  `distance` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventId` (`eventId`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runs`
--

LOCK TABLES `runs` WRITE;
/*!40000 ALTER TABLE `runs` DISABLE KEYS */;
INSERT INTO `runs` VALUES (1,1,'20:00:00','10 km',10.00),(100,5,'10:45:00','Marathon (42 km)',42.20),(103,5,'19:30:00','Semi-marathon',21.10),(145,3,'10:00:00','Semi-marathon (21km)',21.10),(187,5,'19:30:00','10 km',10.00),(189,103,'10:00:00','Semi-marathon',21.10),(190,102,'09:15:00','Semi-marathon',21.10);
/*!40000 ALTER TABLE `runs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwevents`
--

DROP TABLE IF EXISTS `vwevents`;
/*!50001 DROP VIEW IF EXISTS `vwevents`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vwevents` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `location`,
 1 AS `date`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vwevents`
--

/*!50001 DROP VIEW IF EXISTS `vwevents`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwevents` AS select `events`.`id` AS `id`,`events`.`name` AS `name`,`events`.`location` AS `location`,`events`.`rundate` AS `date`,`events`.`description` AS `description` from `events` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-23 10:24:55
