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
-- Table structure for table `livros`
--

DROP TABLE IF EXISTS `livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livros` (
  `ISBN` varchar(30) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Quantidade` int DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `Secao` varchar(60) DEFAULT NULL,
  `resumo` varchar(900) DEFAULT NULL,
  `Imagem` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livros`
--

LOCK TABLES `livros` WRITE;
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` VALUES ('1','Mentirosos',1,'Drama','2','Cadence Sinclair é a neta mais velha e herdeira da família Sinclair, onde todos são bonitos e inteligentes e louros e ricos. Todos os verões, a família se reúne na ilha particular de Beechwood, onde Cady cresce ao lado dos primos, Mirren e Johnny, e do amigo Gat, um grupo nomeado de Mentirosos pelas tias. Os verões são cheios de lembranças e diversão, até o verão dos quinze.','mentirosos.jfif'),('111','Diario de um banana',3,'Infantil','5r',' Não é fácil ser criança. E ninguém sabe disso melhor do que Greg Heffley, que se vê mergulhado no ensino fundamental, onde fracotes subdesenvolvidos dividem os corredores com garotos que são mais altos, mais malvados e já se barbeiam.','diario_banana.jpg'),('121','Learning Javascript',3,'Científico','5p','Referência completa para programadores, JavaScript: O guia definitivo fornece uma ampla descrição da linguagem JavaScript básica e das APIs JavaScript do lado do cliente definidas pelos navegadores Web.','javascript.jpg'),('123','Corte de Rosas e Espinhos ',1,'Romance','e2','Ela roubou uma vida. Agora, deve pagar com o coração.','corte_de_espinhos.jpg'),('421','Python e django',3,'Científico','3p','Python é uma das linguagens de programação mais versáteis do mercado. Devido à sua larga utilização em áreas tão distintas como automação de tarefas repetitivas e aprendizado de máquina, aliada a uma sintaxe simples e, ao mesmo tempo, poderosa, tem sido adotada nos mais diversos setores, tanto para ensinar programação a iniciantes, quanto para tarefas avançadas como treinar um sistema de reconhecimento de imagens.','python-e-django.jpg'),('555','Corte de névoa e fúria',4,'Romance','2b','Por amor ela enganou a morte.','corte_de_nevoa.jfif'),('587','Percy Jackson: Maldição dos titans',6,'Aventura','a3','Um chamado do amigo Grover deixa Percy a postos para mais uma missão: dois novos meios-sangues foram encontrados, e sua ascendência ainda é desconhecida. Como sempre, Percy sabe que precisará contar com o poder de seus aliados heróis, com sua leal espada Contracorrente... e com uma caroninha da mãe. ','percy_titans.jpg'),('668','Senhor dos aneis:A imandade do anel',3,'Literatura jovem','6m','Este volume está composto pela primeira (A Sociedade do Anel), segunda (As Duas Torres) e terceira parte (O Retorno do Rei) da grande obra de ficção fantástica de J. R. R. Tolkien, O Senhor dos Anéis.','irmandade_do_Anel.jfif');
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;
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
