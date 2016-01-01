CREATE DATABASE  IF NOT EXISTS `bluenexia_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bluenexia_db`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bluenexia_db
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `email_tab`
--

DROP TABLE IF EXISTS `email_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_tab` (
  `eid` int(10) NOT NULL AUTO_INCREMENT,
  `euid` int(10) DEFAULT NULL,
  `eemail` varchar(150) DEFAULT NULL,
  `edate` int(10) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_tab`
--

LOCK TABLES `email_tab` WRITE;
/*!40000 ALTER TABLE `email_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tab`
--

DROP TABLE IF EXISTS `product_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) DEFAULT NULL,
  `pprice` int(10) DEFAULT NULL,
  `pdesc` varchar(350) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tab`
--

LOCK TABLES `product_tab` WRITE;
/*!40000 ALTER TABLE `product_tab` DISABLE KEYS */;
INSERT INTO `product_tab` VALUES (1,'1 Tahun',100000,'1 Tahun',1),(2,'2 Tahun',180000,'2 Tahun',1);
/*!40000 ALTER TABLE `product_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets_tab`
--

DROP TABLE IF EXISTS `tickets_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tto` tinyint(1) DEFAULT '1',
  `tuid` int(10) DEFAULT NULL,
  `truid` int(10) DEFAULT NULL,
  `tdate` int(10) DEFAULT NULL,
  `tsubject` varchar(150) DEFAULT NULL,
  `tmsg` text,
  `tparent` int(10) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets_tab`
--

LOCK TABLES `tickets_tab` WRITE;
/*!40000 ALTER TABLE `tickets_tab` DISABLE KEYS */;
INSERT INTO `tickets_tab` VALUES (1,1,1,NULL,1451458723,'Masalah IP Address','Masalah IP Address',0,1),(2,1,1,5,1451458723,'Re: Masalah IP Address','Re: Masalah IP Address Masalah IP Address Masalah IP Address Masalah IP Address Masalah IP Address Masalah IP Address Masalah IP Address Masalah IP Address',1,1),(3,1,1,NULL,1451458723,'Masalah IP Address','Masalah IP Address',0,1),(4,1,1,NULL,1451473878,'Thanks for the information','Thanks for the information',1,1);
/*!40000 ALTER TABLE `tickets_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_tab`
--

DROP TABLE IF EXISTS `transaction_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tuid` int(10) DEFAULT NULL,
  `tno` varchar(20) DEFAULT NULL,
  `tdate` int(10) DEFAULT NULL,
  `tpid` int(10) DEFAULT NULL,
  `tfrom` int(10) DEFAULT NULL,
  `tto` int(10) DEFAULT NULL,
  `ttotal` int(10) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_tab`
--

LOCK TABLES `transaction_tab` WRITE;
/*!40000 ALTER TABLE `transaction_tab` DISABLE KEYS */;
INSERT INTO `transaction_tab` VALUES (1,1,'TR123456789',1451402285,1,1451402285,1451402285,100000,1),(2,2,'TR123461732',1451402285,1,1451402285,1451402285,100000,1),(3,3,'TR991245678',1451402285,1,1451402285,1451402285,100000,1),(4,4,'TR445456789',1451402285,1,1451402285,1451402285,100000,1),(5,1,'TR333456789',1451402285,1,1451402285,1451402285,100000,1);
/*!40000 ALTER TABLE `transaction_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_profiles_tab`
--

DROP TABLE IF EXISTS `users_profiles_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_profiles_tab` (
  `uid` int(11) NOT NULL,
  `ufullname` varchar(150) DEFAULT NULL,
  `ucountry` varchar(100) DEFAULT NULL,
  `ucity` varchar(100) DEFAULT NULL,
  `upostal` varchar(20) DEFAULT NULL,
  `uaddr` varchar(300) DEFAULT NULL,
  `uphone` varchar(20) DEFAULT NULL,
  `uavatar` varchar(300) DEFAULT NULL,
  `uttl` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_profiles_tab`
--

LOCK TABLES `users_profiles_tab` WRITE;
/*!40000 ALTER TABLE `users_profiles_tab` DISABLE KEYS */;
INSERT INTO `users_profiles_tab` VALUES (1,'Gratcy Palma','Indonesia','Jakarta','10213','Duren Tiga','091313121','wew.jpg','Jakarta*1451458723'),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Support',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users_profiles_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_tab`
--

DROP TABLE IF EXISTS `users_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `ulevel` tinyint(1) DEFAULT '1',
  `uemail` varchar(150) DEFAULT NULL,
  `upass` varchar(150) DEFAULT NULL,
  `usalt` varchar(350) DEFAULT NULL,
  `urefcode` varchar(30) DEFAULT NULL,
  `urefid` int(10) DEFAULT NULL,
  `ulastlogin` varchar(21) DEFAULT NULL,
  `uexpire` int(10) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tab`
--

LOCK TABLES `users_tab` WRITE;
/*!40000 ALTER TABLE `users_tab` DISABLE KEYS */;
INSERT INTO `users_tab` VALUES (1,1,'admin@admin.com','4Bm4JjkL4MCVWLVHxeCdDw2AQqdgpjXlnJkU5tk6LZvYSj9RsvFPUf9AHgarwJ8e','e17ecfff97e9b9b2eb1012e1aa0585100349200d','admin',0,'*1451473694',1451466459,1),(2,1,'palma@palma.com',NULL,NULL,'palma',1,NULL,NULL,1),(3,1,'cumi@cumi.com','',NULL,'cumi',1,NULL,NULL,1),(4,1,'dapur@dapur.com',NULL,NULL,'wew',1,NULL,NULL,0),(5,2,'support@max.com',NULL,NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `users_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `users_tab_AINS` AFTER INSERT ON `users_tab` FOR EACH ROW
 INSERT INTO users_profiles_tab (uid) VALUES (NEW.uid) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-30 18:19:09
