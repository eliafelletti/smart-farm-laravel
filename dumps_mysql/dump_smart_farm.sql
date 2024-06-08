-- MySQL dump 10.13  Distrib 8.0.33, for macos13 (x86_64)
--
-- Host: 127.0.0.1    Database: smart_farm
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `cultivations`
--

DROP TABLE IF EXISTS `cultivations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cultivations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipologia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cultivations`
--

LOCK TABLES `cultivations` WRITE;
/*!40000 ALTER TABLE `cultivations` DISABLE KEYS */;
INSERT INTO `cultivations` VALUES (58,'Pomodoro San Marzano','2024-04-25 07:48:45','2024-06-04 15:42:18'),(59,'Patata a pasta bianca','2024-04-25 07:48:59','2024-06-04 15:40:52'),(60,'Cipolla rossa','2024-04-25 07:49:04','2024-06-04 15:28:38'),(61,'Carota arancione','2024-04-25 07:49:08','2024-06-04 15:38:11'),(62,'Cipolla gialla','2024-06-04 15:28:55','2024-06-04 15:28:55'),(63,'Cipolla bianca','2024-06-04 15:29:40','2024-06-04 15:29:40'),(64,'Cipollotto','2024-06-04 15:29:45','2024-06-04 15:29:45'),(65,'Erba cipollina','2024-06-04 15:29:49','2024-06-04 15:29:49'),(66,'Porro','2024-06-04 15:29:51','2024-06-04 15:29:57'),(68,'Scalogno grigio','2024-06-04 15:31:18','2024-06-04 15:31:18'),(71,'Scalogno rosa','2024-06-04 15:32:54','2024-06-04 15:33:07'),(72,'Scalogno giallo','2024-06-04 15:33:00','2024-06-04 15:33:00'),(73,'Scalogno brunorossastro','2024-06-04 15:33:22','2024-06-04 15:33:22'),(74,'Carota rossa','2024-06-04 15:38:17','2024-06-04 15:38:17'),(75,'Carota bianca','2024-06-04 15:38:21','2024-06-04 15:38:21'),(76,'Carota viola','2024-06-04 15:38:24','2024-06-04 15:38:24'),(77,'Carota nera','2024-06-04 15:38:33','2024-06-04 15:38:33'),(78,'Carota gialla di Polignano','2024-06-04 15:39:00','2024-06-04 15:39:00'),(79,'Carota novella di Ispica','2024-06-04 15:39:21','2024-06-04 15:39:21'),(80,'Patata a pasta gialla','2024-06-04 15:41:01','2024-06-04 15:41:01'),(81,'Patata rossa','2024-06-04 15:41:07','2024-06-04 15:41:07'),(82,'Patata viola','2024-06-04 15:41:16','2024-06-04 15:41:16'),(83,'Patata novella','2024-06-04 15:41:20','2024-06-04 15:41:20'),(84,'Patata dolce americana','2024-06-04 15:41:33','2024-06-04 15:41:33'),(85,'Pomodoro datterino','2024-06-04 15:42:24','2024-06-04 15:42:24'),(86,'Pomodoro ciliegino','2024-06-04 15:42:31','2024-06-04 15:42:31'),(87,'Pomodoro del Piennolo del Vesuvio','2024-06-04 15:42:46','2024-06-04 15:42:46'),(88,'Pomodoro costoluto','2024-06-04 15:42:53','2024-06-04 15:42:53'),(89,'Pomodoro a grappolo','2024-06-04 15:43:02','2024-06-04 15:43:02'),(90,'Pomodoro cuore di bue','2024-06-04 15:43:10','2024-06-04 15:43:10'),(91,'Pomodoro regina di Torre Canne','2024-06-04 15:43:27','2024-06-04 15:43:27'),(92,'Pomodoro canestrino di Lucca','2024-06-04 15:43:42','2024-06-04 15:43:42'),(93,'Pomodoro giallorosso di Crispiano','2024-06-04 15:43:54','2024-06-04 15:43:54'),(94,'Pomodoro fiaschetto di Torre Guaceto','2024-06-04 15:44:16','2024-06-04 15:44:16'),(95,'Pomodoro di Belmonte','2024-06-04 15:44:26','2024-06-04 15:44:26'),(96,'Pomodoro camone di Sardegna','2024-06-04 15:44:35','2024-06-04 15:44:35'),(97,'Pomodoro sannita','2024-06-04 15:44:42','2024-06-04 15:44:42'),(98,'Pomodoro di Manduria','2024-06-04 15:44:49','2024-06-04 15:44:49'),(99,'Peperone rosso','2024-06-04 15:45:03','2024-06-04 15:45:03'),(100,'Peperone giallo','2024-06-04 15:45:11','2024-06-04 15:45:11'),(101,'Peperone verde','2024-06-04 15:45:17','2024-06-04 15:45:17'),(102,'Lattuga romana','2024-06-04 15:46:44','2024-06-04 15:46:44'),(103,'Insalata iceberg','2024-06-04 15:47:02','2024-06-04 15:47:02'),(104,'Lattuga canasta','2024-06-04 15:47:35','2024-06-04 15:47:35'),(105,'Insalata lollo','2024-06-04 15:47:46','2024-06-04 15:47:46'),(106,'Insalata gentilina','2024-06-04 15:47:51','2024-06-04 15:47:51'),(107,'Lattuga Catalogna','2024-06-04 15:48:02','2024-06-04 15:48:02'),(108,'Insalata cappuccio','2024-06-04 15:48:16','2024-06-04 15:48:16'),(109,'Insalata crescione','2024-06-04 15:49:08','2024-06-04 15:49:08'),(110,'Insalata belga','2024-06-04 15:49:20','2024-06-04 15:49:20'),(111,'Insalata riccia','2024-06-04 15:49:32','2024-06-04 15:49:32'),(112,'Rucola','2024-06-04 15:49:54','2024-06-04 15:49:54'),(113,'Insalata valeriana','2024-06-04 15:50:09','2024-06-04 15:50:09'),(114,'Radicchio rosso di Treviso','2024-06-04 15:57:34','2024-06-04 15:57:54'),(115,'Radicchio di Chioggia','2024-06-04 15:58:01','2024-06-04 15:58:01'),(116,'Radicchio variegato di Castelfranco','2024-06-04 15:58:32','2024-06-04 15:58:32'),(117,'Radicchio di Verona','2024-06-04 15:58:39','2024-06-04 15:58:39'),(118,'Radicchio di Lusia','2024-06-04 15:58:46','2024-06-04 15:58:46'),(119,'Radicchio rosa di Gorizia','2024-06-04 15:58:52','2024-06-04 15:58:52'),(120,'Radicchio canarino','2024-06-04 15:59:04','2024-06-04 15:59:04'),(121,'Radicchio Milano','2024-06-04 15:59:10','2024-06-04 15:59:10'),(122,'Ravanello rosso','2024-06-04 16:01:23','2024-06-04 16:01:23'),(123,'Ravanello rosa','2024-06-04 16:01:26','2024-06-04 16:01:26'),(124,'Ravanello giallo','2024-06-04 16:01:29','2024-06-04 16:01:29'),(125,'Ravanello nero','2024-06-04 16:01:33','2024-06-04 16:01:33'),(126,'Ravanello bianco','2024-06-04 16:01:42','2024-06-04 16:01:42'),(127,'Rapa rossa','2024-06-04 16:03:42','2024-06-04 16:03:42'),(128,'Rapa bianca','2024-06-04 16:03:45','2024-06-04 16:03:45'),(129,'Cime di rapa','2024-06-04 16:03:50','2024-06-04 16:03:50'),(130,'Sedano rapa','2024-06-04 16:03:54','2024-06-04 16:03:54'),(131,'Cavolo rapa','2024-06-04 16:03:57','2024-06-04 16:03:57'),(132,'Cardo con spine','2024-06-04 16:04:38','2024-06-04 16:04:38'),(133,'Cardo senza spine','2024-06-04 16:04:42','2024-06-04 16:04:42'),(134,'Piselli rampicanti','2024-06-04 16:05:59','2024-06-04 16:08:23'),(135,'Piselli nani','2024-06-04 16:07:37','2024-06-04 16:07:37'),(136,'Piselli mezzarama','2024-06-04 16:07:52','2024-06-04 16:07:52'),(137,'Fava larga di Leonforte','2024-06-04 16:09:03','2024-06-04 16:09:03'),(138,'Fava di Carpino','2024-06-04 16:09:10','2024-06-04 16:09:10'),(139,'Fava cottora dell\'Amerino','2024-06-04 16:09:19','2024-06-04 16:09:19'),(140,'Fava di Ustica','2024-06-04 16:09:24','2024-06-04 16:09:24'),(141,'Fava di Fratte Rosa','2024-06-04 16:09:32','2024-06-04 16:09:32'),(142,'Melanzana nera','2024-06-04 16:10:02','2024-06-04 16:10:02'),(143,'Melanzana siciliana','2024-06-04 16:10:08','2024-06-04 16:10:08'),(144,'Melanzana zerbina viola','2024-06-04 16:10:17','2024-06-04 16:10:17'),(145,'Melanzana bianca','2024-06-04 16:10:22','2024-06-04 16:10:22'),(146,'Melanzana graffiti','2024-06-04 16:10:51','2024-06-04 16:10:51'),(147,'Zucca mantovana','2024-06-04 16:11:47','2024-06-04 16:11:47'),(148,'Zucca Marina di Chioggia','2024-06-04 16:11:58','2024-06-04 16:11:58'),(149,'Zucca americana','2024-06-04 16:12:01','2024-06-04 16:12:01'),(150,'Zucca Berrettina Piacentina','2024-06-04 16:12:15','2024-06-04 16:12:15'),(151,'Zucca Butternut','2024-06-04 16:12:22','2024-06-04 16:12:22'),(152,'Zucca lunga di Napoli','2024-06-04 16:12:28','2024-06-04 16:12:28'),(153,'Zucca trombetta d\'Albenga','2024-06-04 16:13:07','2024-06-04 16:13:07'),(154,'Zucca delica','2024-06-04 16:13:18','2024-06-04 16:13:18'),(155,'Zucchina nera','2024-06-04 16:14:03','2024-06-04 16:14:03'),(156,'Zucchino romanesco','2024-06-04 16:14:12','2024-06-04 16:14:12'),(157,'Zucchino fiorentino','2024-06-04 16:14:21','2024-06-04 16:14:21'),(158,'Zucchina napoletana','2024-06-04 16:14:27','2024-06-04 16:14:27'),(159,'Zucchina tonda','2024-06-04 16:14:31','2024-06-04 16:14:31'),(160,'Zucchina trombetta','2024-06-04 16:14:42','2024-06-04 16:14:42'),(161,'Zucchina gialla','2024-06-04 16:14:46','2024-06-04 16:14:46'),(162,'Fagioli borlotti','2024-06-04 16:15:53','2024-06-04 16:15:53'),(163,'Fagioli cannellini','2024-06-04 16:16:00','2024-06-04 16:16:00'),(164,'Fagioli bianchi di Spagna','2024-06-04 16:16:06','2024-06-04 16:16:06'),(165,'Fagioli rossi','2024-06-04 16:16:09','2024-06-04 16:16:09'),(166,'Fagiolini (cornetti)','2024-06-04 16:16:14','2024-06-04 16:16:26'),(167,'Fagioli neri','2024-06-04 16:16:33','2024-06-04 16:16:33'),(168,'Fagioli pinto','2024-06-04 16:16:37','2024-06-04 16:16:37'),(170,'Cetriolo tondo di Fasano','2024-06-04 16:19:06','2024-06-04 16:19:06'),(171,'Cetriolo carosello tondo di Manduria','2024-06-04 16:19:20','2024-06-04 16:19:20'),(172,'Cetriolo piccolo verde','2024-06-04 16:19:25','2024-06-04 16:19:25'),(173,'Cetriolo lungo degli ortolani','2024-06-04 16:19:38','2024-06-04 16:19:38'),(174,'Cetriolo bianco','2024-06-04 16:19:42','2024-06-04 16:19:42'),(175,'Cetriolo barese verde','2024-06-04 16:20:01','2024-06-04 16:20:01'),(177,'Melone retato','2024-06-04 16:23:02','2024-06-04 16:23:02'),(178,'Melone giallo','2024-06-04 16:23:11','2024-06-04 16:23:11'),(179,'Melone sardo','2024-06-04 16:23:21','2024-06-04 16:23:21'),(180,'Melone verde','2024-06-04 16:23:27','2024-06-04 16:23:27'),(181,'Melone porceddu di Alcamo','2024-06-04 16:23:36','2024-06-04 16:23:36'),(182,'Melone di Calvenzano','2024-06-04 16:23:54','2024-06-04 16:23:54'),(183,'Melone pugliese','2024-06-04 16:24:03','2024-06-04 16:24:03'),(184,'Melone serpente','2024-06-04 16:24:11','2024-06-04 16:24:11'),(185,'Melone amaro','2024-06-04 16:24:22','2024-06-04 16:24:22'),(186,'Melone liscio','2024-06-04 16:24:32','2024-06-04 16:24:32'),(187,'Cocomero crimson','2024-06-04 16:25:09','2024-06-04 16:25:09'),(188,'Cocomero lungo','2024-06-04 16:25:14','2024-06-04 16:25:14'),(189,'Cocomero giallo','2024-06-04 16:25:19','2024-06-04 16:25:19'),(190,'Cocomero mini','2024-06-04 16:25:23','2024-06-04 16:25:23'),(191,'Cocomero miyako','2024-06-04 16:25:35','2024-06-04 16:25:35'),(192,'Cocomero sugar baby','2024-06-04 16:25:42','2024-06-04 16:25:42'),(193,'Cocomero lungo chiaro Charleston','2024-06-04 16:26:26','2024-06-04 16:26:26'),(194,'Spinacio gigante d\'inverno','2024-06-04 16:29:22','2024-06-04 16:29:22'),(195,'Spinacio merlo nero','2024-06-04 16:29:26','2024-06-04 16:29:26'),(196,'Spinacio viking','2024-06-04 16:29:32','2024-06-04 16:29:32'),(197,'Spinacio america','2024-06-04 16:29:46','2024-06-04 16:29:46'),(198,'Spinacio matador','2024-06-04 16:30:11','2024-06-04 16:30:11'),(199,'Fragola alba','2024-06-04 16:31:45','2024-06-04 16:31:45'),(200,'Fragola gemma','2024-06-04 16:31:49','2024-06-04 16:31:49'),(201,'Fragola maya','2024-06-04 16:31:56','2024-06-04 16:31:56'),(202,'Fragola roxana','2024-06-04 16:32:02','2024-06-04 16:32:02'),(203,'Fragola belrubi','2024-06-04 16:32:59','2024-06-04 16:32:59'),(204,'Fragola sengana','2024-06-04 16:33:07','2024-06-04 16:33:07'),(205,'Fragola Madeleine','2024-06-04 16:33:23','2024-06-04 16:33:23'),(206,'Sedano da coste','2024-06-04 16:34:11','2024-06-04 16:34:11'),(207,'Sedano da foglia','2024-06-04 16:34:27','2024-06-04 16:34:27'),(208,'Cavolfiore bianco','2024-06-04 16:35:10','2024-06-04 16:35:10'),(209,'Cavolfiore viola','2024-06-04 16:35:14','2024-06-04 16:35:14'),(210,'Cavolo verde','2024-06-04 16:35:20','2024-06-04 16:35:32'),(211,'Cavolo cappuccio verde','2024-06-04 16:35:40','2024-06-04 16:35:40'),(212,'Cavolo cappuccio rosso','2024-06-04 16:35:45','2024-06-04 16:35:45'),(213,'Cavolo verza','2024-06-04 16:35:50','2024-06-04 16:35:50'),(214,'Cavolo nero','2024-06-04 16:35:53','2024-06-04 16:35:53'),(215,'Cavoletti di Bruxelles','2024-06-04 16:36:03','2024-06-04 16:36:03'),(216,'Bietola verde a costa bianca','2024-06-04 16:44:38','2024-06-04 16:44:38'),(217,'Bietola bionda a costa argentata','2024-06-04 16:44:45','2024-06-04 16:44:45'),(218,'Cicoria bianca di Lusia','2024-06-04 16:45:27','2024-06-04 16:45:27'),(219,'Cicoria Catalogna','2024-06-04 16:45:32','2024-06-04 16:45:32'),(220,'Cicoria mantovana','2024-06-04 16:45:37','2024-06-04 16:45:37'),(221,'Cicoria orchidea rossa','2024-06-04 16:45:46','2024-06-04 16:45:46');
/*!40000 ALTER TABLE `cultivations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `green_houses`
--

DROP TABLE IF EXISTS `green_houses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `green_houses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero_piante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_smart_farm` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `green_houses_id_smart_farm_foreign` (`id_smart_farm`),
  CONSTRAINT `green_houses_id_smart_farm_foreign` FOREIGN KEY (`id_smart_farm`) REFERENCES `smart_farms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `green_houses`
--

LOCK TABLES `green_houses` WRITE;
/*!40000 ALTER TABLE `green_houses` DISABLE KEYS */;
INSERT INTO `green_houses` VALUES (25,'45',8,'2024-04-25 07:48:12','2024-04-25 07:48:12'),(26,'35',9,'2024-04-25 07:48:17','2024-05-02 09:55:01'),(27,'15',8,'2024-04-25 07:48:21','2024-04-25 07:48:21'),(45,'35',9,'2024-04-25 15:50:01','2024-05-02 16:14:05'),(81,'24',8,'2024-05-29 14:26:55','2024-05-29 14:26:55');
/*!40000 ALTER TABLE `green_houses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `measures`
--

DROP TABLE IF EXISTS `measures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `measures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL,
  `temperatura` double NOT NULL,
  `umidita` double NOT NULL,
  `co2` double NOT NULL,
  `irrigazione` double NOT NULL,
  `luminosita` double NOT NULL,
  `id_serra` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `measures_id_serra_foreign` (`id_serra`),
  CONSTRAINT `measures_id_serra_foreign` FOREIGN KEY (`id_serra`) REFERENCES `green_houses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measures`
--

LOCK TABLES `measures` WRITE;
/*!40000 ALTER TABLE `measures` DISABLE KEYS */;
INSERT INTO `measures` VALUES (261,'2024-06-08 16:48:01',21.21,68.42,994,177,23113,26,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(262,'2024-06-09 02:16:31',19.25,56.74,849,212,27341,27,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(263,'2024-06-08 08:11:35',22.44,66.99,991,195,28559,45,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(264,'2024-06-08 17:47:15',18.1,52.01,1129,165,23115,45,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(265,'2024-06-08 17:04:27',22.41,61.07,1111,230,46364,45,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(266,'2024-06-09 07:41:54',15.46,50.18,993,165,26275,27,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(267,'2024-06-08 22:39:29',21.2,61.53,1010,175,29591,26,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(268,'2024-06-08 10:18:15',15.35,50.22,1158,181,37361,27,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(269,'2024-06-08 12:06:42',23.92,68.8,1015,188,43835,26,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(270,'2024-06-08 19:42:32',19.8,65.45,1121,190,48035,45,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(271,'2024-06-08 10:04:04',16.25,51.81,845,229,25055,81,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(272,'2024-06-08 11:17:17',19.55,50.95,972,226,35949,26,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(273,'2024-06-08 16:26:44',16.18,61.88,1099,207,43449,26,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(274,'2024-06-08 16:01:43',21.15,62.93,1091,153,37684,27,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(275,'2024-06-08 10:03:12',18.89,52.22,1129,245,21532,27,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(276,'2024-06-08 21:44:00',15.64,56.58,937,211,49753,27,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(277,'2024-06-09 02:49:43',17.25,66.29,1072,212,43474,45,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(278,'2024-06-08 09:24:14',21.18,61.53,980,205,40102,25,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(279,'2024-06-09 05:00:24',20.48,51.64,1185,242,28227,81,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(280,'2024-06-08 15:50:15',15.38,69,958,193,46982,45,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(281,'2024-06-09 00:27:43',21.12,66.9,1073,202,45961,45,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(282,'2024-06-09 05:41:17',16.9,66.37,881,174,30800,45,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(283,'2024-06-09 01:01:33',20.6,54.7,1011,236,46314,27,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(284,'2024-06-09 01:50:18',20.51,52.82,1153,217,40089,26,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(285,'2024-06-09 07:41:36',17.3,66.38,1157,186,22922,45,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(286,'2024-06-09 04:56:08',20.57,54.14,1133,159,34944,27,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(287,'2024-06-08 09:52:22',20.75,52.31,1060,247,38799,45,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(288,'2024-06-08 22:07:11',17.52,69.65,908,238,41853,27,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(289,'2024-06-08 14:35:57',16.35,62.25,938,152,46710,45,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(290,'2024-06-08 22:45:27',23.39,68.31,1172,209,33192,27,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(291,'2024-06-08 23:48:57',20.13,63.27,902,196,25384,25,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(292,'2024-06-08 18:34:09',19.31,57.12,1189,201,34184,25,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(293,'2024-06-08 20:24:54',19.74,52.49,997,200,37773,45,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(294,'2024-06-08 10:48:42',21.44,61.11,1129,178,40106,81,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(295,'2024-06-08 12:35:30',19.77,66.14,1082,188,30184,27,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(296,'2024-06-08 20:53:32',20.39,66.27,1054,166,32049,45,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(297,'2024-06-08 23:39:20',16.13,69.68,911,205,45068,45,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(298,'2024-06-09 03:19:46',15.62,50.2,804,226,32993,45,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(299,'2024-06-09 06:33:53',17.91,64.73,1138,186,33667,26,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(300,'2024-06-09 03:30:48',18.04,66.81,910,247,25079,25,'2024-06-08 08:03:00','2024-06-08 08:03:00');
/*!40000 ALTER TABLE `measures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_04_11_073727_create_smart_farms_table',2),(21,'2024_04_11_075127_create_cultivations_table',3),(22,'2024_04_11_075433_create_green_houses_table',3),(23,'2024_04_11_075950_create_owners_table',3),(24,'2024_04_11_083021_create_technologies_table',3),(25,'2024_04_11_083204_create_supplier_companies_table',3),(26,'2024_04_11_083617_create_measures_table',3),(27,'2024_04_11_090139_add_level_column_to_users_table',3),(37,'2024_04_25_150605_add_owner_id_to_smart_farms_table',4),(38,'2024_04_25_155511_add_smart_farm_id_to_green_houses_table',4),(39,'2024_04_25_170853_add_supplier_company_id_to_technologies_table',4),(40,'2024_04_25_174751_add_green_house_id_to_measures_table',4),(41,'2024_04_26_101931_create_realized_measures_table',4),(42,'2024_04_30_122633_create_used_technologies_table',4),(43,'2024_04_30_145822_create_realized_crops_table',4),(46,'2024_05_23_102214_create_user_requests_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `owners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascita` date NOT NULL,
  `luogo_nascita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `via` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `civico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `citta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (3,'FLLLEI02R17E410W','Elia','Felletti','2002-10-17','Lagosanto','3383971765','elia.felletti@mail.com','Via Zappaterra','345','Ferrara','44122','2024-04-25 07:58:35','2024-06-08 07:56:37'),(4,'MCCDRA02T31D548R','Dario','Macchi','2002-12-31','Ferrara','3772158909','dario.macchi@mail.com','Via Rimini','6','Copparo','44034','2024-04-25 13:13:18','2024-06-08 07:57:34');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realized_crops`
--

DROP TABLE IF EXISTS `realized_crops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `realized_crops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_proprietario` bigint unsigned DEFAULT NULL,
  `id_serra` bigint unsigned DEFAULT NULL,
  `id_coltura` bigint unsigned DEFAULT NULL,
  `data_semina` date NOT NULL,
  `data_raccolta_teorica` date NOT NULL,
  `data_raccolta_effettiva` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `realized_crops_id_proprietario_foreign` (`id_proprietario`),
  KEY `realized_crops_id_serra_foreign` (`id_serra`),
  KEY `realized_crops_id_coltura_foreign` (`id_coltura`),
  CONSTRAINT `realized_crops_id_coltura_foreign` FOREIGN KEY (`id_coltura`) REFERENCES `cultivations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `realized_crops_id_proprietario_foreign` FOREIGN KEY (`id_proprietario`) REFERENCES `owners` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `realized_crops_id_serra_foreign` FOREIGN KEY (`id_serra`) REFERENCES `green_houses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realized_crops`
--

LOCK TABLES `realized_crops` WRITE;
/*!40000 ALTER TABLE `realized_crops` DISABLE KEYS */;
INSERT INTO `realized_crops` VALUES (1,3,25,58,'2024-04-30','2024-06-30',NULL,'2024-05-07 16:08:03','2024-05-07 16:08:03'),(2,4,26,59,'2024-04-30','2024-07-30',NULL,'2024-05-07 16:08:25','2024-05-07 16:08:25'),(3,4,45,58,'2024-05-02','2024-07-02','2024-07-05','2024-05-07 16:08:48','2024-05-15 13:53:27'),(8,4,26,60,'2024-06-04','2024-08-04',NULL,'2024-06-04 15:13:26','2024-06-04 15:13:26');
/*!40000 ALTER TABLE `realized_crops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realized_measures`
--

DROP TABLE IF EXISTS `realized_measures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `realized_measures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tecnologia` bigint unsigned DEFAULT NULL,
  `id_misura` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `realized_measures_id_tecnologia_foreign` (`id_tecnologia`),
  KEY `realized_measures_id_misura_foreign` (`id_misura`),
  CONSTRAINT `realized_measures_id_misura_foreign` FOREIGN KEY (`id_misura`) REFERENCES `measures` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `realized_measures_id_tecnologia_foreign` FOREIGN KEY (`id_tecnologia`) REFERENCES `technologies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1056 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realized_measures`
--

LOCK TABLES `realized_measures` WRITE;
/*!40000 ALTER TABLE `realized_measures` DISABLE KEYS */;
INSERT INTO `realized_measures` VALUES (856,14,261,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(857,3,261,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(858,16,261,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(859,15,261,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(860,6,261,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(861,2,262,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(862,3,262,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(863,4,262,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(864,5,262,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(865,6,262,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(866,14,263,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(867,3,263,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(868,16,263,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(869,15,263,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(870,6,263,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(871,14,264,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(872,3,264,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(873,16,264,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(874,15,264,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(875,6,264,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(876,14,265,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(877,3,265,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(878,16,265,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(879,15,265,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(880,6,265,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(881,2,266,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(882,3,266,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(883,4,266,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(884,5,266,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(885,6,266,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(886,14,267,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(887,3,267,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(888,16,267,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(889,15,267,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(890,6,267,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(891,2,268,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(892,3,268,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(893,4,268,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(894,5,268,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(895,6,268,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(896,14,269,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(897,3,269,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(898,16,269,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(899,15,269,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(900,6,269,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(901,14,270,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(902,3,270,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(903,16,270,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(904,15,270,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(905,6,270,'2024-06-08 07:46:00','2024-06-08 07:46:00'),(906,2,271,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(907,3,271,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(908,4,271,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(909,5,271,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(910,6,271,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(911,14,272,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(912,3,272,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(913,16,272,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(914,15,272,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(915,6,272,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(916,14,273,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(917,3,273,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(918,16,273,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(919,15,273,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(920,6,273,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(921,2,274,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(922,3,274,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(923,4,274,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(924,5,274,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(925,6,274,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(926,2,275,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(927,3,275,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(928,4,275,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(929,5,275,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(930,6,275,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(931,2,276,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(932,3,276,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(933,4,276,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(934,5,276,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(935,6,276,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(936,14,277,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(937,3,277,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(938,16,277,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(939,15,277,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(940,6,277,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(941,2,278,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(942,3,278,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(943,4,278,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(944,5,278,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(945,6,278,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(946,2,279,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(947,3,279,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(948,4,279,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(949,5,279,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(950,6,279,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(951,14,280,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(952,3,280,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(953,16,280,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(954,15,280,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(955,6,280,'2024-06-08 07:47:00','2024-06-08 07:47:00'),(956,14,281,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(957,3,281,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(958,16,281,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(959,15,281,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(960,6,281,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(961,14,282,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(962,3,282,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(963,16,282,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(964,15,282,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(965,6,282,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(966,2,283,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(967,3,283,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(968,4,283,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(969,5,283,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(970,6,283,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(971,14,284,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(972,3,284,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(973,16,284,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(974,15,284,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(975,6,284,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(976,14,285,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(977,3,285,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(978,16,285,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(979,15,285,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(980,6,285,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(981,2,286,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(982,3,286,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(983,4,286,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(984,5,286,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(985,6,286,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(986,14,287,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(987,3,287,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(988,16,287,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(989,15,287,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(990,6,287,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(991,2,288,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(992,3,288,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(993,4,288,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(994,5,288,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(995,6,288,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(996,14,289,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(997,3,289,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(998,16,289,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(999,15,289,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1000,6,289,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1001,2,290,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1002,3,290,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1003,4,290,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1004,5,290,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1005,6,290,'2024-06-08 08:02:00','2024-06-08 08:02:00'),(1006,2,291,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1007,3,291,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1008,4,291,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1009,5,291,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1010,6,291,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1011,2,292,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1012,3,292,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1013,4,292,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1014,5,292,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1015,6,292,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1016,14,293,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1017,3,293,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1018,16,293,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1019,15,293,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1020,6,293,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1021,2,294,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1022,3,294,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1023,4,294,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1024,5,294,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1025,6,294,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1026,2,295,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1027,3,295,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1028,4,295,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1029,5,295,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1030,6,295,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1031,14,296,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1032,3,296,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1033,16,296,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1034,15,296,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1035,6,296,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1036,14,297,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1037,3,297,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1038,16,297,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1039,15,297,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1040,6,297,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1041,14,298,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1042,3,298,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1043,16,298,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1044,15,298,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1045,6,298,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1046,14,299,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1047,3,299,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1048,16,299,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1049,15,299,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1050,6,299,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1051,2,300,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1052,3,300,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1053,4,300,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1054,5,300,'2024-06-08 08:03:00','2024-06-08 08:03:00'),(1055,6,300,'2024-06-08 08:03:00','2024-06-08 08:03:00');
/*!40000 ALTER TABLE `realized_measures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smart_farms`
--

DROP TABLE IF EXISTS `smart_farms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smart_farms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensione` double(8,2) NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `via` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `civico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `citta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proprietario` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `smart_farms_id_proprietario_foreign` (`id_proprietario`),
  CONSTRAINT `smart_farms_id_proprietario_foreign` FOREIGN KEY (`id_proprietario`) REFERENCES `owners` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smart_farms`
--

LOCK TABLES `smart_farms` WRITE;
/*!40000 ALTER TABLE `smart_farms` DISABLE KEYS */;
INSERT INTO `smart_farms` VALUES (8,'Smart-Farm_1',200.10,'3496574359','smartfarm.1@mail.com','Via Garibaldi','10','Bologna','40121',3,'2024-04-25 07:46:15','2024-06-08 07:59:44'),(9,'Smart-Farm_2',150.50,'3492307654','smartfarm.2@mail.com','Via Spina','6','Rimini','47922',4,'2024-04-25 07:47:09','2024-06-08 08:00:29');
/*!40000 ALTER TABLE `smart_farms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_companies`
--

DROP TABLE IF EXISTS `supplier_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier_companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `via` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `civico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `citta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_companies`
--

LOCK TABLES `supplier_companies` WRITE;
/*!40000 ALTER TABLE `supplier_companies` DISABLE KEYS */;
INSERT INTO `supplier_companies` VALUES (2,'Azienda_1','azienda1@mail.com','3491237659','023491237659','Via Roma','10','Roma','00100','2024-04-25 07:50:14','2024-06-08 07:54:36'),(3,'Azienda_2','azienda2@mail.com','3774567890',NULL,'Via Firenze','9','Firenze','50141','2024-04-25 07:51:14','2024-06-08 07:54:58'),(9,'Azienda_3','azienda3@mail.com','3494567321',NULL,'Via Matteotti','58','Torino','10121','2024-05-10 14:08:32','2024-06-08 07:55:35');
/*!40000 ALTER TABLE `supplier_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technologies`
--

DROP TABLE IF EXISTS `technologies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technologies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipologia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_azienda_fornitrice` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `technologies_id_azienda_fornitrice_foreign` (`id_azienda_fornitrice`),
  CONSTRAINT `technologies_id_azienda_fornitrice_foreign` FOREIGN KEY (`id_azienda_fornitrice`) REFERENCES `supplier_companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technologies`
--

LOCK TABLES `technologies` WRITE;
/*!40000 ALTER TABLE `technologies` DISABLE KEYS */;
INSERT INTO `technologies` VALUES (2,'Termometro 2.0','Temperatura',2,'2024-04-25 07:51:48','2024-04-25 07:51:48'),(3,'Sonda umidità 1.0','Umidità',2,'2024-04-25 07:52:25','2024-04-25 07:52:25'),(4,'Light sensor 1.0','Luminosità',2,'2024-04-25 07:52:54','2024-04-25 07:52:54'),(5,'Misuratore CO2 1.0','CO2',3,'2024-04-25 07:53:53','2024-04-25 07:53:53'),(6,'Misuratore irrigazione 2.0','Irrigazione',3,'2024-04-25 07:54:41','2024-04-25 07:54:41'),(12,'Termometro 3.0','Temperatura',3,'2024-04-25 15:31:53','2024-04-25 15:45:08'),(14,'Termometro 4.0','Temperatura',2,'2024-05-02 15:48:00','2024-05-02 16:37:09'),(15,'Misuratore CO2 2.0','CO2',9,'2024-05-10 14:11:52','2024-05-10 14:11:52'),(16,'Light sensor 2.0','Luminosità',9,'2024-05-10 14:12:36','2024-05-10 14:12:36');
/*!40000 ALTER TABLE `technologies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `used_technologies`
--

DROP TABLE IF EXISTS `used_technologies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `used_technologies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tecnologia` bigint unsigned DEFAULT NULL,
  `id_smart_farm` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `used_technologies_id_tecnologia_foreign` (`id_tecnologia`),
  KEY `used_technologies_id_smart_farm_foreign` (`id_smart_farm`),
  CONSTRAINT `used_technologies_id_smart_farm_foreign` FOREIGN KEY (`id_smart_farm`) REFERENCES `smart_farms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `used_technologies_id_tecnologia_foreign` FOREIGN KEY (`id_tecnologia`) REFERENCES `technologies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_technologies`
--

LOCK TABLES `used_technologies` WRITE;
/*!40000 ALTER TABLE `used_technologies` DISABLE KEYS */;
INSERT INTO `used_technologies` VALUES (1,2,8,'2024-05-07 16:13:39','2024-05-07 16:13:39'),(2,3,8,'2024-05-07 16:13:43','2024-05-07 16:13:43'),(3,4,8,'2024-05-07 16:13:48','2024-05-07 16:13:48'),(4,5,8,'2024-05-07 16:13:52','2024-05-07 16:13:52'),(5,6,8,'2024-05-07 16:13:57','2024-05-07 16:13:57'),(6,14,9,'2024-05-07 16:14:04','2024-05-23 14:33:40'),(7,3,9,'2024-05-07 16:14:08','2024-05-07 16:14:08'),(8,16,9,'2024-05-07 16:14:11','2024-05-23 15:24:58'),(9,15,9,'2024-05-07 16:14:14','2024-05-23 15:46:00'),(10,6,9,'2024-05-07 16:14:18','2024-05-07 16:14:18');
/*!40000 ALTER TABLE `used_technologies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_requests`
--

DROP TABLE IF EXISTS `user_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipologia_mittente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `completata` tinyint(1) NOT NULL,
  `id_proprietario` bigint unsigned DEFAULT NULL,
  `id_azienda_fornitrice` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_requests_id_proprietario_foreign` (`id_proprietario`),
  KEY `user_requests_id_azienda_fornitrice_foreign` (`id_azienda_fornitrice`),
  CONSTRAINT `user_requests_id_azienda_fornitrice_foreign` FOREIGN KEY (`id_azienda_fornitrice`) REFERENCES `supplier_companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `user_requests_id_proprietario_foreign` FOREIGN KEY (`id_proprietario`) REFERENCES `owners` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_requests`
--

LOCK TABLES `user_requests` WRITE;
/*!40000 ALTER TABLE `user_requests` DISABLE KEYS */;
INSERT INTO `user_requests` VALUES (3,'1','Upgrade Termometro -> Termometro 4.0\r\nUpgrade Light sensor -> Light sensor 2.0','2024-05-23',1,4,NULL,'2024-05-23 14:30:23','2024-05-23 14:30:50'),(4,'1','Upgrade Misuratore CO2 -> Misuratore CO2 2.0','2024-05-23',1,4,NULL,'2024-05-23 15:23:33','2024-05-23 16:45:02'),(5,'2','Proposta Termometro -> Termometro 5.0','2024-05-23',0,NULL,2,'2024-05-23 16:04:45','2024-06-05 12:17:11');
/*!40000 ALTER TABLE `user_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Elia','elia.felletti@mail.com',NULL,'$2y$10$wOoE0RrEsY/5B5lJY0sLSOFY1V6B80QUnZM2i9nPcV77Hjkm4JcaO',1,NULL,'2024-04-17 05:56:31','2024-04-17 05:56:31'),(2,'admin1','admin1@mail.com',NULL,'$2y$10$N/7pT4pPhsjf//CexOWSn.bBb1X3Pia1Nwg31nN4dDGUzC5auYT0.',0,NULL,'2024-04-17 06:02:39','2024-04-17 06:02:39'),(3,'admin2','admin2@mail.com',NULL,'$2y$10$Qs3XtS5CX.lgFSf2jhtyAOiHoKfQanyAhMKQPZ9t.dHQQ2KiJQTty',0,NULL,'2024-04-17 06:25:46','2024-04-17 06:25:46'),(4,'azienda1','azienda1@mail.com',NULL,'$2y$10$CLCDeQlRj9npqwC2DU8/TuBHEwjDaHP2qvZnMvdratRj122mJuTGe',2,NULL,'2024-04-17 07:42:54','2024-04-17 07:42:54'),(5,'Dario','dario.macchi@mail.com',NULL,'$2y$10$PRsSLJiXHV0k6yd2rHnq9.uKmJX1pW2zIhTZz.lRgh96hAfZcxfeC',1,NULL,'2024-05-02 08:26:52','2024-05-02 08:26:52'),(6,'azienda2','azienda2@mail.com',NULL,'$2y$10$tjp5BM5OwpcmUI4A36s72OhJ3jef9j3sisHyf.1QCBAi6QQNI8/f2',2,NULL,'2024-05-02 14:43:22','2024-05-02 14:43:22'),(16,'azienda3','azienda3@mail.com',NULL,'$2y$10$/lG5x6YTzy7ul5VSWoVIVulH5jbguCCxa6K8FJgYVYjHOA1oCljrC',2,NULL,'2024-05-10 14:08:03','2024-05-10 14:08:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-08 10:04:14
