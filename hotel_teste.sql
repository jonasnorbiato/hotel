-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: hotel_teste
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(80) NOT NULL,
  `telefone` char(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` char(11) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens`
--

DROP TABLE IF EXISTS `imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagens` (
  `idimagem` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `idquarto` int(11) NOT NULL,
  PRIMARY KEY (`idimagem`),
  KEY `fk_Imagens_quartos1_idx` (`idquarto`),
  CONSTRAINT `fk_Imagens_quartos1` FOREIGN KEY (`idquarto`) REFERENCES `quartos` (`idquarto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
INSERT INTO `imagens` VALUES (1,'img/familia/img1_teste.jpg',2),(2,'img/familia/img2.jpg',2),(3,'img/familia/img3.jpg',2),(4,'img/presidencial/img1.jpg',1),(5,'img/presidencial/img2.jpg',1),(6,'img/presidencial/img3.jpg',1),(7,'img/presidencial/img4.jpg',4),(8,'img/presidencial/img5.jpg',4),(9,'img/presidencial/img6.jpg',4),(10,'img/familia/img4.jpg',5),(11,'img/familia/img5.jpg',5),(12,'img/familia/img6.jpg',5),(13,'img/basico/img1.jpg',3),(14,'img/basico/img2.jpg',3),(15,'img/basico/img3.jpg',3),(16,'img/basico/img4.jpg',6),(17,'img/basico/img5.jpg',6),(18,'img/basico/img6.jpg',6);
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quartos`
--

DROP TABLE IF EXISTS `quartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quartos` (
  `idquarto` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `valor` double NOT NULL,
  `idtipoQuartos` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  PRIMARY KEY (`idquarto`),
  KEY `fk_quartos_tipoQuartos1_idx` (`idtipoQuartos`),
  CONSTRAINT `fk_quartos_tipoQuartos1` FOREIGN KEY (`idtipoQuartos`) REFERENCES `tipoQuartos` (`idtipoQuarto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quartos`
--

LOCK TABLES `quartos` WRITE;
/*!40000 ALTER TABLE `quartos` DISABLE KEYS */;
INSERT INTO `quartos` VALUES (1,505,500,1,' O quarto presidencial oferecem vista para o mar e duas camas individuais'),(2,404,250,2,' O quarto familia oferece conforte e comodidade, com capacidade maxima de cinco pessoas.'),(3,101,50,3,' O quartos Standard sao ideais para quem viaja sozinho e para casais de ferias.'),(4,510,500,1,' O quarto presidencial oferecem vista para o mar, cafe da manha no quarto e uma excelente banheira de hidromassagem'),(5,411,250,2,'O quarto familia oferece conforte e comodidade. Sao 72 mestros quadrado que acomodam ate 5 pessoas, sendo ate 2 criancas gratis.'),(6,108,50,3,' O quartos Standard sao ideais para quem viaja sozinho e para casais de ferias.');
/*!40000 ALTER TABLE `quartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `idreserva` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `idquarto` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `diarias` int(11) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `confirma` tinyint(1) NOT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `fk_reserva_clientes_idx` (`idcliente`),
  KEY `fk_reservas_quarto1_idx` (`idquarto`),
  CONSTRAINT `fk_reserva_clientes` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_quarto1` FOREIGN KEY (`idquarto`) REFERENCES `quartos` (`idquarto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (2,NULL,1,1500,3,'2017-12-28','2017-12-30',1);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoQuartos`
--

DROP TABLE IF EXISTS `tipoQuartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoQuartos` (
  `idtipoQuarto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipoQuarto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoQuartos`
--

LOCK TABLES `tipoQuartos` WRITE;
/*!40000 ALTER TABLE `tipoQuartos` DISABLE KEYS */;
INSERT INTO `tipoQuartos` VALUES (1,'Presidencial'),(2,'Familia'),(3,'Standard');
/*!40000 ALTER TABLE `tipoQuartos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-20  7:22:58
