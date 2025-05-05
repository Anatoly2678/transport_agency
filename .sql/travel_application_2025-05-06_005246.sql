-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.127.126.26    Database: travel
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agency_id` int DEFAULT NULL,
  `route_to` int DEFAULT NULL,
  `route_from` int DEFAULT NULL,
  `transport_to` int DEFAULT NULL,
  `transport_from` int DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `city_arrival_from` varchar(100) DEFAULT NULL,
  `flight_number_from` varchar(20) DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `city_arrival_to` varchar(100) DEFAULT NULL,
  `flight_number_to` varchar(20) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `application_unique` (`number`),
  UNIQUE KEY `application_unique_1` (`number`,`agency_id`),
  KEY `application_route_FK` (`route_to`),
  KEY `application_route_FK_1` (`route_from`),
  KEY `application_transport_type_FK` (`transport_to`),
  KEY `application_transport_type_FK_1` (`transport_from`),
  KEY `application_agency_FK` (`agency_id`),
  CONSTRAINT `application_agency_FK` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`),
  CONSTRAINT `application_route_FK` FOREIGN KEY (`route_to`) REFERENCES `route` (`id`),
  CONSTRAINT `application_route_FK_1` FOREIGN KEY (`route_from`) REFERENCES `route` (`id`),
  CONSTRAINT `application_transport_type_FK` FOREIGN KEY (`transport_to`) REFERENCES `transport_type` (`id`),
  CONSTRAINT `application_transport_type_FK_1` FOREIGN KEY (`transport_from`) REFERENCES `transport_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-06  0:52:48
