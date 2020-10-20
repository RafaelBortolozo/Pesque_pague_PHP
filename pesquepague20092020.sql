CREATE DATABASE  IF NOT EXISTS `pesquepague` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pesquepague`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: pesquepague
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(260) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (5,'Rafael Bortolozo','rafaelbortolozo@outlook.com','NULL','09934720957','49991595586'),(13,'Bortolinho_ADM','bortolozorafael@gmail.com','$2y$10$JOED6zyYApwEAzeFaFJdMOSU.UHlegrPRo3zduNQYTh1Ibu/EQ2/S','1234567890','123456789123'),(14,'Bortolinho','bortolinho@gmail.com','$2y$10$w3DaWucaXCktfAAzxYsx/ePzpe0zyt2EKJ5AimemlKNBU4WWWrhrq','916516596','6551651646');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_produto` int NOT NULL,
  `mensagem` text,
  `qtd_kg` decimal(5,2) NOT NULL,
  `limpeza` tinyint NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `data_entrega` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PRODUTO_idx` (`id_produto`) /*!80000 INVISIBLE */,
  CONSTRAINT `FK_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,'Rafael Bortolozo',1,'Oi meu chapa',2.30,1,27.60,'2020-09-16 09:36:00'),(2,'Eduardo Rampon',4,'',2.00,0,60.00,'2020-09-15 11:59:00'),(4,'Bruno Henrique Potrikus',2,'sdfs bfd sbfdb fdsb fdb fs ',5.00,1,70.00,'2020-09-28 14:00:00'),(12,'Lorena Damasceno Cipriano',6,'Deixar cabeça, tirar escamas.',6.00,1,96.00,'2020-10-03 16:30:00'),(15,'Eunice Durães Leitão',3,'Peixe para grelha.',3.00,1,42.00,'2020-10-03 16:30:00'),(16,'Lara Quintela Macieira',5,'Fazer corte de espinho e picar em pedaços de mais ou menos 3cm de largura.',4.50,1,54.00,'2020-10-10 10:00:00'),(17,'Milton Mafra Canedo',13,'',5.00,0,75.00,'2020-09-30 08:00:00'),(18,'rafael',4,'fsgnbgff g bfd bfg bfgb',1.00,0,30.00,'2020-09-29 15:30:00');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `preco` decimal(5,2) DEFAULT NULL,
  `url_imagem_produto` varchar(150) DEFAULT NULL,
  `limpavel` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Tilápia',11.00,' /img/1600464266-tilpia.jpg',1),(2,'Catfish',13.00,' /img/1600464279-catfish.jpg',1),(3,'Carpa capim',13.00,' /img/1600464288-carpa-capim.jpg',1),(4,'Filé de tilapia',30.00,' /img/1600481398-fil-de-tilapia.jpg',0),(5,'Carpa húngara',11.00,' /img/1600481409-carpa-hngara.jpg',1),(6,'Traíra',15.00,' /img/1600464328-trara.jpg',1),(7,'Cascudo',15.00,' /img/1600464338-cascudo.jpg',1),(13,'Pacú',15.00,' /img/1600481372-pac.jpg',1),(18,'Filé de Traíra',35.00,' /img/1600480784-fil-de-trara.jpg',0);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-20 14:34:18
