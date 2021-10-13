-- Progettazione Web 
DROP DATABASE if exists isola; 
CREATE DATABASE isola; 
USE isola; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: isola
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `allenamenti`
--

DROP TABLE IF EXISTS `allenamenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allenamenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `cavallo` varchar(50) NOT NULL,
  `campo` varchar(50) NOT NULL,
  `inizio` time NOT NULL,
  `fine` time NOT NULL,
  `giorno` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allenamenti`
--

LOCK TABLES `allenamenti` WRITE;
/*!40000 ALTER TABLE `allenamenti` DISABLE KEYS */;
INSERT INTO `allenamenti` VALUES (10,'leo','Walter','B','18:00:00','19:00:00','2020-01-23'),(11,'leo','Walter','A','17:00:00','17:30:00','2020-01-31'),(12,'leo','Walter','A','16:00:00','18:00:00','2020-01-29'),(13,'albe','Billy','A','17:30:00','18:00:00','2020-01-31'),(14,'albe','Billy','A','17:00:00','17:30:00','2020-01-30');
/*!40000 ALTER TABLE `allenamenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profilo`
--

DROP TABLE IF EXISTS `profilo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profilo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `patenteFise` varchar(10) DEFAULT NULL,
  `numeroPatente` varchar(50) DEFAULT NULL,
  `cavallo` varchar(50) DEFAULT NULL,
  `numeroPassaportoCavallo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profilo`
--

LOCK TABLES `profilo` WRITE;
/*!40000 ALTER TABLE `profilo` DISABLE KEYS */;
INSERT INTO `profilo` VALUES (12,'leo@gmail.com','Leonardo','Spada','leo','B1','B5678','Walter','W321'),(13,'edo@gmail.com','Edoardo','Fazzini','edo',NULL,NULL,NULL,NULL),(14,'albe@gmail.com','Alberto','Angela','albe','L1','L8756','Billy','H6799'),(15,'ver@gmail.com','Veronica','Verdi','vero','A1','J7890','Petula','B5457');
/*!40000 ALTER TABLE `profilo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrazioni`
--

DROP TABLE IF EXISTS `registrazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrazioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrazioni`
--

LOCK TABLES `registrazioni` WRITE;
/*!40000 ALTER TABLE `registrazioni` DISABLE KEYS */;
INSERT INTO `registrazioni` VALUES (1,'morucci46@gmail.com','Davide','Morucci','admin','21232F297A57A5A743894A0E4A801FC3',1),(15,'leo@gmail.com','Leonardo','Spada','leo','0f759dd1ea6c4c76cedc299039ca4f23',0),(16,'edo@gmail.com','Edoardo','Fazzini','edo','d2d612f72e42577991f4a5936cecbcc0',0),(17,'albe@gmail.com','Alberto','Angela','albe','728ee8ece2c17c022064497c634eda0e',0),(18,'ver@gmail.com','Veronica','Verdi','vero','cc491de401e5dbcde41ef91090975f42',0);
/*!40000 ALTER TABLE `registrazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_mensile`
--

DROP TABLE IF EXISTS `registro_mensile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_mensile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pensione` varchar(50) NOT NULL,
  `paddock` int(11) NOT NULL,
  `giostra` int(11) NOT NULL,
  `maniscalco` int(11) NOT NULL,
  `veterinario` int(11) NOT NULL,
  `istruttore` varchar(50) NOT NULL,
  `mensile` varchar(50) NOT NULL,
  `mese_inizio` date NOT NULL,
  `mese_fine` date NOT NULL,
  `costo` int(11) NOT NULL,
  `pagato` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_mensile`
--

LOCK TABLES `registro_mensile` WRITE;
/*!40000 ALTER TABLE `registro_mensile` DISABLE KEYS */;
INSERT INTO `registro_mensile` VALUES (18,'vero','americana',1,0,1,0,'Ilaria','Completo','2020-01-15','2020-02-14',570,0),(19,'leo','americana',0,0,0,1,'Barbara','Ridotto','2020-01-15','2020-02-14',535,1),(20,'albe','inglese',1,0,0,0,'Ilaria','Completo','2020-01-30','2020-02-29',520,0),(21,'albe','americana',1,0,0,0,'Ilaria','Completo','2020-03-28','2020-04-27',540,0),(22,'albe','italiana',0,0,0,0,'Giulia','Ridotto','2020-05-31','2020-06-30',470,1);
/*!40000 ALTER TABLE `registro_mensile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-14 10:30:30
