CREATE DATABASE  IF NOT EXISTS `bluenexia_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bluenexia_db`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bluenexia_db
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `confirmation_tab`
--

DROP TABLE IF EXISTS `confirmation_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confirmation_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cuid` int(10) DEFAULT NULL,
  `ctid` int(10) DEFAULT NULL,
  `cdate` int(10) DEFAULT NULL,
  `cdesc` varchar(350) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirmation_tab`
--

LOCK TABLES `confirmation_tab` WRITE;
/*!40000 ALTER TABLE `confirmation_tab` DISABLE KEYS */;
INSERT INTO `confirmation_tab` VALUES (1,6,7,1457542571,'wewew',1);
/*!40000 ALTER TABLE `confirmation_tab` ENABLE KEYS */;
UNLOCK TABLES;

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
  `pyear` int(10) DEFAULT NULL,
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
INSERT INTO `product_tab` VALUES (1,'1 Tahun',100000,1,'1 Tahun',1),(2,'2 Tahun',180000,2,'2 Tahun',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets_tab`
--

LOCK TABLES `tickets_tab` WRITE;
/*!40000 ALTER TABLE `tickets_tab` DISABLE KEYS */;
INSERT INTO `tickets_tab` VALUES (1,1,1,NULL,1457274569,'tutorialnya dong cui','tutorialnya dong cui',0,1),(2,1,1,5,1457274584,'ini loh link nya','cek aja disini cui.',1,1),(3,1,5,1,1457274739,'thanks kk ','thanks kk ',1,1);
/*!40000 ALTER TABLE `tickets_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token_tab`
--

DROP TABLE IF EXISTS `token_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `ttype` tinyint(1) DEFAULT '1',
  `tuid` int(10) DEFAULT NULL,
  `tkey` varchar(350) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token_tab`
--

LOCK TABLES `token_tab` WRITE;
/*!40000 ALTER TABLE `token_tab` DISABLE KEYS */;
INSERT INTO `token_tab` VALUES (1,2,7,'asdprweaadajer',1),(2,1,7,'palammamam',0);
/*!40000 ALTER TABLE `token_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_confirm_tab`
--

DROP TABLE IF EXISTS `transaction_confirm_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_confirm_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `ttid` int(10) DEFAULT NULL,
  `tdate` int(10) DEFAULT NULL,
  `tabank` int(10) DEFAULT NULL,
  `tano` varchar(50) DEFAULT NULL,
  `taname` varchar(150) DEFAULT NULL,
  `tmbank` int(10) DEFAULT NULL,
  `ttotal` int(10) DEFAULT NULL,
  `tdesc` text,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_confirm_tab`
--

LOCK TABLES `transaction_confirm_tab` WRITE;
/*!40000 ALTER TABLE `transaction_confirm_tab` DISABLE KEYS */;
INSERT INTO `transaction_confirm_tab` VALUES (1,7,1457280954,1,'wew241141','padapdkapdkadp',1,100000,'0',1);
/*!40000 ALTER TABLE `transaction_confirm_tab` ENABLE KEYS */;
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
  `tdesc` text,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_tab`
--

LOCK TABLES `transaction_tab` WRITE;
/*!40000 ALTER TABLE `transaction_tab` DISABLE KEYS */;
INSERT INTO `transaction_tab` VALUES (1,1,'TR123456789',1451402285,1,1451402285,1451402285,100000,NULL,1),(2,2,'TR123461732',1451402285,1,1451402285,1451402285,100000,NULL,0),(3,3,'TR991245678',1451402285,1,1451402285,1451402285,100000,NULL,1),(4,4,'TR445456789',1451402285,1,1451402285,1451402285,100000,NULL,1),(5,1,'TR333456789',1451402285,1,1451402285,1451402285,100000,NULL,1),(6,1,'TR',1457277805,1,NULL,NULL,100000,NULL,3),(7,1,'TR0000701060316',1457278864,1,1457278864,1488814864,100000,NULL,2);
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
INSERT INTO `users_profiles_tab` VALUES (1,'Gratcy Palma','Indonesia','Jakarta','10213','Duren Tiga','091313121','568409691b9311451493737cetakan-kembang-loyang-kembang-goyang.jpg','Jakarta*1451408400'),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Support',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Gratcy Palma','Indonesia','Jakarta','131212','wewewe','081031321313','569594ce785a41452643534pp.jpg','Jakarta*1452618000'),(7,'Gratcy Palma P Hutapea',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tab`
--

LOCK TABLES `users_tab` WRITE;
/*!40000 ALTER TABLE `users_tab` DISABLE KEYS */;
INSERT INTO `users_tab` VALUES (1,4,'user@max.com','3fbf895c0eb50c03a7a870c9586fba9379a631b6','Q4OZSj0fCb3sJjYZZwEJF6wHEvZ88peJgrDvztfX2cZTQRDAGqJG8adkVAUMcWA9','admin',0,'*1457541835',1,1),(2,3,'marketing@max.com','3fbf895c0eb50c03a7a870c9586fba9379a631b6','Q4OZSj0fCb3sJjYZZwEJF6wHEvZ88peJgrDvztfX2cZTQRDAGqJG8adkVAUMcWA9','palma',1,NULL,NULL,1),(3,2,'cumi@cumi.com','',NULL,'cumi',1,NULL,NULL,1),(4,2,'dapur@dapur.com','3fbf895c0eb50c03a7a870c9586fba9379a631b6','Q4OZSj0fCb3sJjYZZwEJF6wHEvZ88peJgrDvztfX2cZTQRDAGqJG8adkVAUMcWA9','wew',1,'*1457276558',NULL,1),(5,2,'support@max.com','3fbf895c0eb50c03a7a870c9586fba9379a631b6','Q4OZSj0fCb3sJjYZZwEJF6wHEvZ88peJgrDvztfX2cZTQRDAGqJG8adkVAUMcWA9',NULL,NULL,'*1457273487',NULL,1),(6,1,'root@max.com','3fbf895c0eb50c03a7a870c9586fba9379a631b6','Q4OZSj0fCb3sJjYZZwEJF6wHEvZ88peJgrDvztfX2cZTQRDAGqJG8adkVAUMcWA9',NULL,NULL,'*1457541638',NULL,1),(7,2,'palmagratcy@gmail.com','d117185bd4a5f3160eaf2f1a7baaaa81d686cd0a','RPSDxj0Fi7etDGl0PPSwgIfV73xyC0066wbvAXlS3nMvZ1HTA32xMB8FT8ThyqGK','palmagratcy7',NULL,NULL,NULL,0);
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

-- Dump completed on 2016-03-10 10:21:02
