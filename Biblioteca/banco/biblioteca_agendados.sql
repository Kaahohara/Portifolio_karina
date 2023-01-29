-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendados`
--

DROP TABLE IF EXISTS `agendados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendados` (
  `ID_Agendados` int NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Quantidade` int DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Agendados`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendados`
--

LOCK TABLES `agendados` WRITE;
/*!40000 ALTER TABLE `agendados` DISABLE KEYS */;
INSERT INTO `agendados` VALUES (9,'1','liraoharak@gmail.com',1,'2023-01-28',NULL),(10,'668','liraoharak@gmail.com',1,'2023-01-28',NULL),(11,'555','liraoharak@gmail.com',1,'2023-01-28',NULL),(12,'587','liraoharak@gmail.com',1,'2023-01-28',NULL),(13,'555','liraoharak@gmail.com',1,'2023-01-28',NULL),(14,'668','liraoharak@gmail.com',1,'2023-01-28',NULL),(15,'1','massanori@gmail.com',1,'2023-01-28',NULL),(16,'123','liraoharak@gmail.com',1,'2023-02-01',NULL),(17,'123','liraoharak@gmail.com',1,'2023-02-02',NULL),(18,'123','liraoharak@gmail.com',1,'2023-02-02',NULL),(19,'123','liraoharak@gmail.com',1,'2023-02-02',NULL),(20,'123','liraoharak@gmail.com',1,'2023-02-02',NULL),(21,'123','liraoharak@gmail.com',1,'2023-02-02',NULL);
/*!40000 ALTER TABLE `agendados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-29 13:42:08
