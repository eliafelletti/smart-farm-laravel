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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cultivations`
--

LOCK TABLES `cultivations` WRITE;
/*!40000 ALTER TABLE `cultivations` DISABLE KEYS */;
INSERT INTO `cultivations` VALUES (58,'Pomodori','2024-04-25 07:48:45','2024-04-25 07:48:52'),(59,'Patate','2024-04-25 07:48:59','2024-04-25 07:48:59'),(60,'Cipolle','2024-04-25 07:49:04','2024-04-25 07:49:04'),(61,'Carote','2024-04-25 07:49:08','2024-04-25 07:49:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `green_houses`
--

LOCK TABLES `green_houses` WRITE;
/*!40000 ALTER TABLE `green_houses` DISABLE KEYS */;
INSERT INTO `green_houses` VALUES (25,'45',8,'2024-04-25 07:48:12','2024-04-25 07:48:12'),(26,'35',9,'2024-04-25 07:48:17','2024-05-02 09:55:01'),(27,'15',8,'2024-04-25 07:48:21','2024-04-25 07:48:21'),(45,'35',9,'2024-04-25 15:50:01','2024-05-02 16:14:05'),(54,'36',11,'2024-05-07 16:37:21','2024-05-07 16:37:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measures`
--

LOCK TABLES `measures` WRITE;
/*!40000 ALTER TABLE `measures` DISABLE KEYS */;
INSERT INTO `measures` VALUES (31,'2024-04-25 21:57:49',18.72,62.94,1105,225,39842,25,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(32,'2024-04-26 00:33:19',23.03,63.61,1010,250,41069,25,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(33,'2024-04-25 22:53:18',21.59,50.84,1053,177,22040,25,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(34,'2024-04-26 12:11:36',23.74,62.71,880,173,38818,26,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(35,'2024-04-26 02:54:19',15.88,52.87,921,155,49320,26,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(36,'2024-04-25 17:42:28',20.98,62.8,1107,197,25855,27,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(37,'2024-04-26 11:11:24',19.05,64.2,805,159,21212,27,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(38,'2024-04-25 14:02:18',22.56,62.04,1092,213,31905,45,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(39,'2024-04-25 20:21:12',17.33,54.76,827,214,21528,45,'2024-04-25 12:54:29','2024-04-25 12:54:29'),(40,'2024-04-26 09:30:58',22.97,50.32,1012,151,37690,45,'2024-04-25 12:54:29','2024-04-25 12:54:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_04_11_073727_create_smart_farms_table',2),(21,'2024_04_11_075127_create_cultivations_table',3),(22,'2024_04_11_075433_create_green_houses_table',3),(23,'2024_04_11_075950_create_owners_table',3),(24,'2024_04_11_083021_create_technologies_table',3),(25,'2024_04_11_083204_create_supplier_companies_table',3),(26,'2024_04_11_083617_create_measures_table',3),(27,'2024_04_11_090139_add_level_column_to_users_table',3),(37,'2024_04_25_150605_add_owner_id_to_smart_farms_table',4),(38,'2024_04_25_155511_add_smart_farm_id_to_green_houses_table',4),(39,'2024_04_25_170853_add_supplier_company_id_to_technologies_table',4),(40,'2024_04_25_174751_add_green_house_id_to_measures_table',4),(41,'2024_04_26_101931_create_realized_measures_table',4),(42,'2024_04_30_122633_create_used_technologies_table',4),(43,'2024_04_30_145822_create_realized_crops_table',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (3,'FLLLEI02R17E410W','Elia','Felletti','2002-10-17','Lagosanto','3383971808','elia.felletti@mail.com','Via Zappaterra','345','Ferrara','44122','2024-04-25 07:58:35','2024-04-25 07:58:35'),(4,'MCCDRA02T31D548R','Dario','Macchi','2002-12-31','Ferrara','3772158909','dario.macchi@mail.com','Via Tizio','6','Sempronio','12345','2024-04-25 13:13:18','2024-05-07 14:58:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realized_crops`
--

LOCK TABLES `realized_crops` WRITE;
/*!40000 ALTER TABLE `realized_crops` DISABLE KEYS */;
INSERT INTO `realized_crops` VALUES (1,3,25,58,'2024-04-30','2024-06-30',NULL,'2024-05-07 16:08:03','2024-05-07 16:08:03'),(2,4,26,59,'2024-04-30','2024-07-30',NULL,'2024-05-07 16:08:25','2024-05-07 16:08:25'),(3,4,45,58,'2024-05-02','2024-07-02',NULL,'2024-05-07 16:08:48','2024-05-07 16:08:48');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realized_measures`
--

LOCK TABLES `realized_measures` WRITE;
/*!40000 ALTER TABLE `realized_measures` DISABLE KEYS */;
INSERT INTO `realized_measures` VALUES (1,2,31,'2024-05-07 16:09:28','2024-05-07 16:09:28'),(2,3,31,'2024-05-07 16:09:40','2024-05-07 16:09:40'),(3,4,31,'2024-05-07 16:09:48','2024-05-07 16:09:48'),(4,5,31,'2024-05-07 16:09:54','2024-05-07 16:09:54'),(5,6,31,'2024-05-07 16:10:05','2024-05-07 16:10:05'),(6,2,32,'2024-05-07 16:11:02','2024-05-07 16:11:02'),(7,3,32,'2024-05-07 16:11:05','2024-05-07 16:11:05'),(8,4,32,'2024-05-07 16:11:09','2024-05-07 16:11:09'),(9,5,32,'2024-05-07 16:11:13','2024-05-07 16:11:13'),(10,6,32,'2024-05-07 16:11:17','2024-05-07 16:11:17'),(11,12,34,'2024-05-07 16:11:36','2024-05-07 16:11:36'),(12,3,34,'2024-05-07 16:11:41','2024-05-07 16:11:41'),(13,4,34,'2024-05-07 16:11:50','2024-05-07 16:11:50'),(14,5,34,'2024-05-07 16:11:54','2024-05-07 16:11:54'),(15,6,34,'2024-05-07 16:11:59','2024-05-07 16:11:59'),(16,12,35,'2024-05-07 16:12:22','2024-05-07 16:12:22'),(17,3,35,'2024-05-07 16:12:31','2024-05-07 16:12:31'),(18,4,35,'2024-05-07 16:12:35','2024-05-07 16:12:35'),(19,5,35,'2024-05-07 16:12:39','2024-05-07 16:12:39'),(20,6,35,'2024-05-07 16:12:44','2024-05-07 16:13:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smart_farms`
--

LOCK TABLES `smart_farms` WRITE;
/*!40000 ALTER TABLE `smart_farms` DISABLE KEYS */;
INSERT INTO `smart_farms` VALUES (8,'Smart-Farm_1',200.10,'3491234567','smartfarm.1@mail.com','Via Fantomatica','10','Fantasma','12345',3,'2024-04-25 07:46:15','2024-04-25 07:46:15'),(9,'Smart-Farm_2',150.50,'3491237654','smartfarm.2@mail.com','Via Tizio','6','Sempronio','12346',4,'2024-04-25 07:47:09','2024-04-25 07:47:09'),(11,'Smart-Farm_3',150.00,'3456789012','smartfarm.3@mail.com','Tunisina','67','Tunisi','34567',NULL,'2024-05-07 16:37:13','2024-05-07 16:37:13');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_companies`
--

LOCK TABLES `supplier_companies` WRITE;
/*!40000 ALTER TABLE `supplier_companies` DISABLE KEYS */;
INSERT INTO `supplier_companies` VALUES (2,'Azienda_1','azienda1@mail.com','3491237659','023491237659','Via Roma','10','Roma','12346','2024-04-25 07:50:14','2024-05-07 15:04:10'),(3,'Azienda_2','azienda2@mail.com','3774567890',NULL,'Via Firenze','9','Firenze','09876','2024-04-25 07:51:14','2024-05-02 14:45:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technologies`
--

LOCK TABLES `technologies` WRITE;
/*!40000 ALTER TABLE `technologies` DISABLE KEYS */;
INSERT INTO `technologies` VALUES (2,'Termometro 2.0','Temperatura',2,'2024-04-25 07:51:48','2024-04-25 07:51:48'),(3,'Sonda umidità 1.0','Umidità',2,'2024-04-25 07:52:25','2024-04-25 07:52:25'),(4,'Light sensor 1.0','Luminosità',2,'2024-04-25 07:52:54','2024-04-25 07:52:54'),(5,'Misuratore CO2 1.0','CO2',3,'2024-04-25 07:53:53','2024-04-25 07:53:53'),(6,'Misuratore irrigazione 2.0','Irrigazione',3,'2024-04-25 07:54:41','2024-04-25 07:54:41'),(12,'Termometro 3.0','Temperatura',3,'2024-04-25 15:31:53','2024-04-25 15:45:08'),(14,'Termometro 4.0','Temperatura',2,'2024-05-02 15:48:00','2024-05-02 16:37:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_technologies`
--

LOCK TABLES `used_technologies` WRITE;
/*!40000 ALTER TABLE `used_technologies` DISABLE KEYS */;
INSERT INTO `used_technologies` VALUES (1,2,8,'2024-05-07 16:13:39','2024-05-07 16:13:39'),(2,3,8,'2024-05-07 16:13:43','2024-05-07 16:13:43'),(3,4,8,'2024-05-07 16:13:48','2024-05-07 16:13:48'),(4,5,8,'2024-05-07 16:13:52','2024-05-07 16:13:52'),(5,6,8,'2024-05-07 16:13:57','2024-05-07 16:13:57'),(6,12,9,'2024-05-07 16:14:04','2024-05-07 16:14:04'),(7,3,9,'2024-05-07 16:14:08','2024-05-07 16:14:08'),(8,4,9,'2024-05-07 16:14:11','2024-05-07 16:14:11'),(9,5,9,'2024-05-07 16:14:14','2024-05-07 16:14:14'),(10,6,9,'2024-05-07 16:14:18','2024-05-07 16:14:18');
/*!40000 ALTER TABLE `used_technologies` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Elia','elia.felletti@mail.com',NULL,'$2y$10$wOoE0RrEsY/5B5lJY0sLSOFY1V6B80QUnZM2i9nPcV77Hjkm4JcaO',1,NULL,'2024-04-17 05:56:31','2024-04-17 05:56:31'),(2,'admin1','admin1@mail.com',NULL,'$2y$10$N/7pT4pPhsjf//CexOWSn.bBb1X3Pia1Nwg31nN4dDGUzC5auYT0.',0,NULL,'2024-04-17 06:02:39','2024-04-17 06:02:39'),(3,'admin2','admin2@mail.com',NULL,'$2y$10$Qs3XtS5CX.lgFSf2jhtyAOiHoKfQanyAhMKQPZ9t.dHQQ2KiJQTty',0,NULL,'2024-04-17 06:25:46','2024-04-17 06:25:46'),(4,'azienda1','azienda1@mail.com',NULL,'$2y$10$CLCDeQlRj9npqwC2DU8/TuBHEwjDaHP2qvZnMvdratRj122mJuTGe',2,NULL,'2024-04-17 07:42:54','2024-04-17 07:42:54'),(5,'Dario','dario.macchi@mail.com',NULL,'$2y$10$PRsSLJiXHV0k6yd2rHnq9.uKmJX1pW2zIhTZz.lRgh96hAfZcxfeC',1,NULL,'2024-05-02 08:26:52','2024-05-02 08:26:52'),(6,'azienda2','azienda2@mail.com',NULL,'$2y$10$tjp5BM5OwpcmUI4A36s72OhJ3jef9j3sisHyf.1QCBAi6QQNI8/f2',2,NULL,'2024-05-02 14:43:22','2024-05-02 14:43:22');
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

-- Dump completed on 2024-05-07 19:29:44
