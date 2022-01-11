-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: PraktineUzduotis
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220110174928','2022-01-10 17:49:54',612),('DoctrineMigrations\\Version20220110175402','2022-01-10 17:54:14',936),('DoctrineMigrations\\Version20220110220058','2022-01-10 22:01:37',1051);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'KP10-1-1','Taką su kietomis dangomis valymas rankiniu būdu'),(2,'KP10-1-3','Kelio barstymas frikcinėmis medžiagomis, esant slidumams');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs_done`
--

DROP TABLE IF EXISTS `jobs_done`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs_done` (
  `id` int NOT NULL AUTO_INCREMENT,
  `road_id` int DEFAULT NULL,
  `cipher_id` int DEFAULT NULL,
  `quantity` float NOT NULL,
  `section_start_id` int DEFAULT NULL,
  `section_end_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3C3AE88D962F8178` (`road_id`),
  KEY `IDX_3C3AE88D4D68C34B` (`cipher_id`),
  KEY `IDX_3C3AE88DF250A3C7` (`section_start_id`),
  KEY `IDX_3C3AE88DA8F57836` (`section_end_id`),
  CONSTRAINT `FK_3C3AE88D4D68C34B` FOREIGN KEY (`cipher_id`) REFERENCES `jobs` (`id`),
  CONSTRAINT `FK_3C3AE88D962F8178` FOREIGN KEY (`road_id`) REFERENCES `roads` (`id`),
  CONSTRAINT `FK_3C3AE88DA8F57836` FOREIGN KEY (`section_end_id`) REFERENCES `roads` (`id`),
  CONSTRAINT `FK_3C3AE88DF250A3C7` FOREIGN KEY (`section_start_id`) REFERENCES `roads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs_done`
--

LOCK TABLES `jobs_done` WRITE;
/*!40000 ALTER TABLE `jobs_done` DISABLE KEYS */;
INSERT INTO `jobs_done` VALUES (19,1,1,2.07143,1,1),(20,3,1,0.928571,3,3),(21,2,1,3,2,2);
/*!40000 ALTER TABLE `jobs_done` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roads`
--

DROP TABLE IF EXISTS `roads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `road_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_start` double NOT NULL,
  `section_end` double NOT NULL,
  `road_level` int NOT NULL,
  `road_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roads`
--

LOCK TABLES `roads` WRITE;
/*!40000 ALTER TABLE `roads` DISABLE KEYS */;
INSERT INTO `roads` VALUES (1,'A1','Vilnius-Kaunas-Klaipėda',9,67,1,'Asfaltas'),(2,'A2','Vilnius-Panevėžys',1,45,1,'Asfaltas'),(3,'A1','Vilnius-Kaunas-Klaipėda',67,93,1,'Asfaltas'),(4,'A1','Vilnius-Kaunas-Klaipėda',93,120,1,'Asfaltas');
/*!40000 ALTER TABLE `roads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'PraktineUzduotis'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-11 21:01:25
