CREATE DATABASE  IF NOT EXISTS `bluenexia_api_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bluenexia_api_db`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bluenexia_api_db
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `auth_log_tab`
--

DROP TABLE IF EXISTS `auth_log_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_log_tab` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `atype` tinyint(1) DEFAULT '0',
  `aidid` int(10) DEFAULT NULL,
  `adate` int(10) DEFAULT NULL,
  `aip` int(10) DEFAULT NULL,
  `aidentity` text,
  `atoken` text,
  `aexpire` int(10) DEFAULT NULL,
  `astatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_log_tab`
--

LOCK TABLES `auth_log_tab` WRITE;
/*!40000 ALTER TABLE `auth_log_tab` DISABLE KEYS */;
INSERT INTO `auth_log_tab` VALUES (1,1,1,1445961986,0,'[\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/45.0.2454.101 Chrome/45.0.2454.101 Safari/537.36\",\"gzip, deflate\",\"id-ID,id;q=0.8,en-US;q=0.6,en;q=0.4,en-AU;q=0.2\"]','IaLbQBf0UFhDWC87eukI1oL9H94Ihyj7Ak0clybZRQz8r6OabblgdLkcuKjSEb6R',1445962586,0),(2,1,1,1445962069,0,'[\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/45.0.2454.101 Chrome/45.0.2454.101 Safari/537.36\",\"gzip, deflate\",\"id-ID,id;q=0.8,en-US;q=0.6,en;q=0.4,en-AU;q=0.2\"]','0Z9DWMXAeKc9TkOE5CJP5wte7RtLFmY0FDwSgMF3p9fjmMV3AqrfE2CUg1jZrK88',1445963971,0),(3,1,1,1445964150,0,'[\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/45.0.2454.101 Chrome/45.0.2454.101 Safari/537.36\",\"gzip, deflate\",\"id-ID,id;q=0.8,en-US;q=0.6,en;q=0.4,en-AU;q=0.2\"]','vBGqYJv8EMPnqEFqdPteFlqonVwhghl12hf52yfvRhGl9OffjBlokDgiVHgkOSNh',1445964750,0),(4,2,1,1445964234,0,'[\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/45.0.2454.101 Chrome/45.0.2454.101 Safari/537.36\",\"gzip, deflate\",\"id-ID,id;q=0.8,en-US;q=0.6,en;q=0.4,en-AU;q=0.2\"]','fHNkLssMT2wOZtASnD1m3cNx36s2wu90H0GWxj6Y2t8HvstZHn0ol0wXy7qb3oj6',1445964834,0);
/*!40000 ALTER TABLE `auth_log_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tab`
--

DROP TABLE IF EXISTS `auth_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_tab` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `aname` varchar(150) DEFAULT NULL,
  `adesc` varchar(350) DEFAULT NULL,
  `ackey` varchar(100) DEFAULT NULL,
  `akey` text,
  `askey` text,
  `astatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tab`
--

LOCK TABLES `auth_tab` WRITE;
/*!40000 ALTER TABLE `auth_tab` DISABLE KEYS */;
INSERT INTO `auth_tab` VALUES (1,'maxindo','Maxindo','testingdoang','123','321',1);
/*!40000 ALTER TABLE `auth_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-27 23:45:58
