-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: zoo_arcadia
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `habitat_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `habitat_id` (`habitat_id`),
  CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'Lion','Panthera leo',3,'lion.jpg','2024-07-22 10:46:30'),(2,'Léopard','Panthera pardus',3,'leopard.jpg','2024-07-22 10:46:30'),(3,'Gnou','Connochaetes',3,'gnou.jpg','2024-07-22 10:46:31'),(4,'Antilope','Antilopinae',3,'antilope.jpg','2024-07-22 10:46:31'),(5,'Zèbre','Equus quagga',3,'zebre.jpg','2024-07-22 10:46:32'),(6,'Autruche','Struthio camelus',3,'autruche.jpg','2024-07-22 10:46:32'),(7,'Lémurien','Lemuriformes',3,'lemurien.jpg','2024-07-22 10:46:33'),(8,'Rhinocéros','Rhinocerotidae',3,'rhinoceros.jpg','2024-07-22 10:46:35'),(9,'Orang-outan','Pongo',1,'orang_outan.jpg','2024-07-22 10:47:06'),(10,'Panda','Ailuropoda melanoleuca',1,'panda.jpg','2024-07-22 10:47:07'),(11,'Éléphant','Loxodonta africana',1,'elephant.jpg','2024-07-22 10:47:07'),(12,'Gorille','Gorilla',1,'gorille.jpg','2024-07-22 10:47:08'),(13,'Chimpanzé','Pan troglodytes',1,'chimpanze.jpg','2024-07-22 10:47:08'),(14,'Tigre','Panthera tigris',1,'tigre.jpg','2024-07-22 10:47:09'),(15,'Boa','Boa constrictor',2,'boa.jpg','2024-07-22 10:47:30'),(16,'Caméléon','Chamaeleonidae',2,'cameleon.jpg','2024-07-22 10:47:31'),(18,'Iguane','Iguana',2,'iguane.jpg','2024-07-22 10:47:33'),(19,'Crocodile','Crocodylidae',2,'crocodile.jpg','2024-07-22 10:47:33'),(20,'Tortue de Galapagos','Chelonoidis nigra',2,'tortue_galapagos.jpg','2024-07-22 10:47:34'),(21,'Crotale','Crotalus',2,'crotale.jpg','2024-07-22 10:47:35'),(22,'Python','Pythonidae',2,'python.jpg','2024-07-22 10:47:35'),(27,'Pingouin','Spheniscidae',4,'pingouin.jpg','2024-07-22 10:47:58'),(28,'Ours Polaire','Ursus maritimus',4,'ours_polaire.jpg','2024-07-22 10:47:58'),(29,'Phoque','Phocidae',4,'phoque.jpg','2024-07-22 10:47:59'),(30,'Poisson Exotique','Exotic Fish',4,'poisson_exotique.jpg','2024-07-22 10:48:00'),(31,'Dauphin','Delphinidae',4,'dauphin.jpg','2024-07-22 10:48:00'),(32,'Hippopotame','Hippopotamus amphibius',4,'hippopotame.jpg','2024-07-22 10:48:01'),(33,'Ours','Ursidae',5,'ours.jpg','2024-07-22 10:48:23'),(34,'Gibbon argenté','Hylobates moloch',5,'gibbon_argente.jpg','2024-07-22 10:48:23'),(35,'Ouistiti','Callitrichidae',5,'ouistiti.jpg','2024-07-22 10:48:24'),(36,'Koala','Phascolarctos cinereus',5,'koala.jpg','2024-07-22 10:48:24'),(37,'Loup','Canis lupus',5,'loup.jpg','2024-07-22 10:48:25'),(38,'Loutre','Lutrinae',5,'loutre.jpg','2024-07-22 10:48:25'),(39,'Panda roux','Ailurus fulgens',5,'panda_roux.jpg','2024-07-22 10:48:25'),(40,'Kangourou','Macropodidae',5,'kangourou.jpg','2024-07-22 10:48:27'),(41,'Girafe','Giraffa camelopardalis',5,'girafe.jpg','2024-07-22 10:48:28'),(45,'Faucon','Falconidae',6,'faucon.jpg','2024-07-22 10:48:50'),(47,'Aigle','Aquila chrysaetos',6,'aigle.jpg','2024-07-22 10:48:51'),(48,'Toucan','Ramphastos',6,'toucan.jpg','2024-07-22 10:48:52'),(49,'Flamant Rose','Phoenicopterus',6,'flamant_rose.jpg','2024-07-22 10:48:53'),(50,'Oiseau exotique','Exotic Bird',6,'oiseau_exotique.jpg','2024-07-22 10:48:53'),(51,'Perroquet','Psittaciformes',6,'perroquet.jpg','2024-07-22 10:48:54');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feeding_logs`
--

DROP TABLE IF EXISTS `feeding_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feeding_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) DEFAULT NULL,
  `food` varchar(255) NOT NULL,
  `food_amount` int(11) NOT NULL,
  `feeding_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`),
  CONSTRAINT `feeding_logs_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeding_logs`
--

LOCK TABLES `feeding_logs` WRITE;
/*!40000 ALTER TABLE `feeding_logs` DISABLE KEYS */;
INSERT INTO `feeding_logs` VALUES (51,1,'Viande',5,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(52,2,'Viande',4,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(53,3,'Herbe',10,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(54,4,'Herbe',8,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(55,5,'Herbe',6,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(56,6,'Graines',3,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(57,7,'Fruits',2,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(58,8,'Herbe',7,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(59,9,'Viande',6,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(60,10,'Fruits',5,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(61,11,'Fruits',8,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(62,12,'Herbe',20,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(63,13,'Bambou',15,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(64,14,'Fruits',6,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(65,15,'Rongeurs',4,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(66,16,'Insectes',1,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(68,18,'Insectes',1,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(69,19,'Insectes',1,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(70,20,'Viande',6,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(71,21,'Poissons',5,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(72,22,'Viande',7,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(77,27,'Viande',4,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(78,28,'Herbe',10,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(79,29,'Herbe',8,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(80,30,'Herbe',6,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(81,31,'Graines',3,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(82,32,'Fruits',2,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(83,33,'Herbe',7,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(84,34,'Herbe',15,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(85,35,'Insectes',1,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(86,36,'Fruits',5,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(87,37,'Fruits',8,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(88,38,'Herbe',20,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(89,39,'Bambou',15,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(90,40,'Fruits',6,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(91,41,'Rongeurs',4,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(95,45,'Graines',3,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(97,47,'Graines',3,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(98,48,'Fruits',5,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(99,49,'Fruits',8,'2024-07-01 08:00:00','2024-07-22 10:54:00'),(100,50,'Fruits',6,'2024-07-01 08:00:00','2024-07-22 10:54:00');
/*!40000 ALTER TABLE `feeding_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitats`
--

DROP TABLE IF EXISTS `habitats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitats`
--

LOCK TABLES `habitats` WRITE;
/*!40000 ALTER TABLE `habitats` DISABLE KEYS */;
INSERT INTO `habitats` VALUES (1,'Jungle','Habitat des animaux de la jungle','jungle.jpg','2024-07-22 10:45:46'),(2,'Reptile','Habitat des reptiles','reptile.jpg','2024-07-22 10:45:47'),(3,'Savane','Habitat des animaux de la savane','savane.jpg','2024-07-22 10:45:51'),(4,'Aquatique','Habitat des animaux aquatiques','aquatique.jpg','2024-07-22 10:45:54'),(5,'Mammifère','Habitat des mammifères','mammifere.jpg','2024-07-22 10:45:55'),(6,'Volière','Habitat des oiseaux','voliere.jpg','2024-07-22 10:45:55');
/*!40000 ALTER TABLE `habitats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Restauration','Service de restauration pour les visiteurs','2024-07-22 10:45:09'),(2,'Visite guidée','Visite des habitats avec un guide (gratuit)','2024-07-22 10:45:09'),(3,'Petit train','Visite du zoo en petit train','2024-07-22 10:45:10');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','veterinaire','employe') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@zoo.com','admin123','admin','2024-07-22 10:43:54'),(2,'vet@zoo.com','password_hash','veterinaire','2024-07-22 10:43:54'),(3,'employe@zoo.com','password_hash','employe','2024-07-22 10:43:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vet_reports`
--

DROP TABLE IF EXISTS `vet_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vet_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) DEFAULT NULL,
  `vet_id` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  `food` varchar(255) NOT NULL,
  `food_amount` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visit_details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`),
  KEY `vet_id` (`vet_id`),
  CONSTRAINT `vet_reports_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vet_reports_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vet_reports`
--

LOCK TABLES `vet_reports` WRITE;
/*!40000 ALTER TABLE `vet_reports` DISABLE KEYS */;
INSERT INTO `vet_reports` VALUES (1,1,2,'Bonne santé','Viande',5,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(2,2,2,'Bonne santé','Viande',4,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(3,3,2,'Bonne santé','Herbe',10,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(4,4,2,'Bonne santé','Herbe',8,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(5,5,2,'Bonne santé','Herbe',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(6,6,2,'Bonne santé','Graines',3,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(7,7,2,'Bonne santé','Fruits',2,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(8,8,2,'Bonne santé','Herbe',7,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(9,9,2,'Bonne santé','Viande',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(10,10,2,'Bonne santé','Fruits',5,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(11,11,2,'Bonne santé','Fruits',8,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(12,12,2,'Bonne santé','Herbe',20,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(13,13,2,'Bonne santé','Bambou',15,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(14,14,2,'Bonne santé','Fruits',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(15,15,2,'Bonne santé','Rongeurs',4,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(16,16,2,'Bonne santé','Insectes',1,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(18,18,2,'Bonne santé','Insectes',1,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(19,19,2,'Bonne santé','Insectes',1,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(20,20,2,'Bonne santé','Viande',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(21,21,2,'Bonne santé','Poissons',5,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(22,22,2,'Bonne santé','Viande',7,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(27,27,2,'Bonne santé','Viande',4,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(28,28,2,'Bonne santé','Herbe',10,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(29,29,2,'Bonne santé','Herbe',8,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(30,30,2,'Bonne santé','Herbe',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(31,31,2,'Bonne santé','Graines',3,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(32,32,2,'Bonne santé','Fruits',2,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(33,33,2,'Bonne santé','Herbe',7,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(34,34,2,'Bonne santé','Herbe',15,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(35,35,2,'Bonne santé','Insectes',1,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(36,36,2,'Bonne santé','Fruits',5,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(37,37,2,'Bonne santé','Fruits',8,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(38,38,2,'Bonne santé','Herbe',20,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(39,39,2,'Bonne santé','Bambou',15,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(40,40,2,'Bonne santé','Fruits',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(41,41,2,'Bonne santé','Rongeurs',4,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(45,45,2,'Bonne santé','Graines',3,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(47,47,2,'Bonne santé','Graines',3,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(48,48,2,'Bonne santé','Fruits',5,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(49,49,2,'Bonne santé','Fruits',8,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28'),(50,50,2,'Bonne santé','Fruits',6,'2024-07-01','Animal en bonne santé, alimentation normale.','2024-07-22 10:53:28');
/*!40000 ALTER TABLE `vet_reports` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-23 13:34:42
