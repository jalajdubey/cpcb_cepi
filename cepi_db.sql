-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cepi_db
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `action_plans`
--

DROP TABLE IF EXISTS `action_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `action_plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(100) DEFAULT NULL,
  `user_id` int NOT NULL,
  `financial_year` varchar(100) DEFAULT NULL,
  `catagries` varchar(100) DEFAULT NULL,
  `action_point` text,
  `responsible_ageancy` varchar(100) DEFAULT NULL,
  `timeline` date DEFAULT NULL,
  `financial_requirement` varchar(100) DEFAULT NULL,
  `present_status` varchar(50) DEFAULT NULL,
  `other_des` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_plans`
--

LOCK TABLES `action_plans` WRITE;
/*!40000 ALTER TABLE `action_plans` DISABLE KEYS */;
INSERT INTO `action_plans` VALUES (1,'11',27,'2010','5','s','ss','2023-07-10','asas','0',NULL,'2023-07-10 00:07:06','2023-07-10'),(2,'11',27,'2015','2','sas','asas','2023-07-18','asas','0',NULL,'2023-07-10 00:09:44','2023-07-10'),(3,'11',27,'2012','1','sas','asasa','2023-07-10','sas','0',NULL,'2023-07-10 00:10:49','2023-07-10'),(4,'5',34,'2016','4','434','erww','2023-07-10','we','0',NULL,'2023-07-10 02:07:29','2023-07-10'),(5,'5',34,'2016','3','34','edwe','2023-07-10','we','0',NULL,'2023-07-10 02:07:45','2023-07-10'),(6,'34',38,'2015','4','air action points new','state level commity','2023-07-12','2020','20',NULL,'2023-07-12 02:08:15','2023-07-12'),(7,'21',40,'2023','2','Switching over to CNG','Local Authority','2023-08-30','0','40',NULL,'2023-07-14 05:06:59','2023-07-14'),(8,'34',42,'2010','1','new action point for air','new tech','2024-07-18','1000','0',NULL,'2023-07-18 01:18:18','2023-07-18'),(9,'34',42,'2014','5','other infrastructure','infratech','2023-07-19','5000','0',NULL,'2023-07-18 01:55:08','2023-07-18'),(10,'34',46,'2020','5','other action points','other agency','2023-07-31','1002','20',NULL,'2023-07-31 06:04:35','2023-07-31'),(11,'34',46,'2020','4','water environment category','water agency','2023-07-31','1001','0',NULL,'2023-07-31 06:05:28','2023-07-31'),(12,'11',30,'2020','2','air action points created by pia4','pia4','2023-07-31','100','0',NULL,'2023-07-31 06:13:15','2023-07-31'),(13,'11',30,'2020','3','water action point pia4','watetech','2023-07-31','12','0',NULL,'2023-07-31 06:14:28','2023-07-31'),(14,'11',30,'2020','4','land action points','landtech','2023-07-31','20','0',NULL,'2023-07-31 06:15:06','2023-07-31'),(15,'11',30,'2020','1','infrastructure action point','infratech','2023-07-31','25','0',NULL,'2023-07-31 06:15:52','2023-07-31'),(16,'11',30,'2020','5','other action point1','other tech','2023-07-31','250','0',NULL,'2023-07-31 06:16:30','2023-07-31'),(17,'34',38,'2023','4','land action point','new tech','2024-02-22','200','30',NULL,'2023-08-01 05:37:32','2023-08-01'),(18,'21',40,'2023','3','new communi',NULL,NULL,NULL,'0',NULL,'2023-08-10 04:15:49','2023-08-10'),(19,'21',40,'2020','4',NULL,NULL,NULL,NULL,'0',NULL,'2023-08-10 04:16:35','2023-08-10'),(20,'21',40,'2020','5','new action point','subtech','2023-08-10','20000','0',NULL,'2023-08-10 07:38:37','2023-08-10'),(21,'21',40,'2020','5','wow working action points','5000','2023-08-10','100','0','other category','2023-08-10 07:41:20','2023-08-10'),(22,'21',40,'2021','2','ghbvnbn','vbnvbn','2023-08-10','1212','0',NULL,'2023-08-10 07:51:51','2023-08-10'),(23,'21',40,'2020','1','new actionpoint','sdf','2023-09-07','1000','0',NULL,'2023-09-05 07:31:22','2023-09-05'),(24,'21',40,'2021','5','actoion point','jljala','2023-09-05','1000','0','new other','2023-09-05 07:32:10','2023-09-05');
/*!40000 ALTER TABLE `action_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action_reports`
--

DROP TABLE IF EXISTS `action_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `action_reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pia_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `financial_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `months` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `monsoon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_of_PIA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_reports`
--

LOCK TABLES `action_reports` WRITE;
/*!40000 ALTER TABLE `action_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Air Environment',NULL,NULL),(2,'Water Environment',NULL,NULL),(3,'Land Environment',NULL,NULL),(4,'Infrastructure/renewal measures',NULL,NULL),(5,'Other',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpcbactionremark`
--

DROP TABLE IF EXISTS `cpcbactionremark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cpcbactionremark` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `state_id` bigint NOT NULL,
  `pia_id` bigint NOT NULL,
  `letter` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpcbactionremark`
--

LOCK TABLES `cpcbactionremark` WRITE;
/*!40000 ALTER TABLE `cpcbactionremark` DISABLE KEYS */;
INSERT INTO `cpcbactionremark` VALUES (1,5,34,'','ghjgjhgjhgj','2023-08-02 04:10:23','2023-08-02 04:10:23'),(2,5,34,'20230802100043.pdf','no remark','2023-08-02 04:30:43','2023-08-02 04:30:43');
/*!40000 ALTER TABLE `cpcbactionremark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iaera_users`
--

DROP TABLE IF EXISTS `iaera_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `iaera_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagrie_iarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kmlfile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iaera_users`
--

LOCK TABLES `iaera_users` WRITE;
/*!40000 ALTER TABLE `iaera_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `iaera_users` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023_07_05_093752_create_monitoring_reports_table',1),(2,'2023_07_06_083711_create_p_i_a_user_lists_table',2),(3,'2023_07_06_182530_create_action_reports_table',3),(5,'2023_07_26_113822_create_iaera_users_table',4),(6,'2023_08_02_071418_create_cpcbactionremark_table',5),(7,'2023_08_10_095849_create_categories_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitoringreports`
--

DROP TABLE IF EXISTS `monitoringreports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monitoringreports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Role_User` int NOT NULL,
  `state_id` int NOT NULL,
  `pia_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `epi_air` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epi_water` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epi_land` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitoringreports`
--

LOCK TABLES `monitoringreports` WRITE;
/*!40000 ALTER TABLE `monitoringreports` DISABLE KEYS */;
INSERT INTO `monitoringreports` VALUES (1,1,9,'',NULL,NULL,NULL,'20230706072735.pdf','CPCB-2018',NULL,NULL,'hii','2023-07-06 14:27:35','2023-07-06 14:27:35'),(2,1,5,'34',NULL,NULL,NULL,'20230707090344.pdf','CPCB-2018',NULL,NULL,'Bihar Report','2023-07-07 03:33:44','2023-07-07 03:33:44'),(3,3,9,'',NULL,NULL,NULL,'20230712072253.pdf','Pre-Monsoon',NULL,NULL,'monitoring report','2023-07-12 01:52:53','2023-07-12 01:52:53'),(4,1,5,'34','36','25','65','20230725093417.pdf','CPCB-2018',NULL,NULL,'jdr new upload','2023-07-25 04:04:17','2023-07-25 04:04:17'),(5,1,1,'0','12','12','12','20230725103811.pdf','CPCB-2018',NULL,NULL,'fdgfdgdfgdfg','2023-07-25 05:08:11','2023-07-25 05:08:11'),(6,1,1,'select PIA','12','12','12','20230725103922.pdf','CPCB-2018',NULL,NULL,'45','2023-07-25 05:09:22','2023-07-25 05:09:22'),(7,1,34,'38','54','654','564',NULL,'CPCB-2018',NULL,NULL,'654654','2023-07-25 05:25:56','2023-07-25 05:25:56'),(8,1,34,'46','56','54','45','20230801102717.pdf','CPCB-2018',NULL,NULL,'cpcb report year2018','2023-08-01 04:57:17','2023-08-01 04:57:17');
/*!40000 ALTER TABLE `monitoringreports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state_name` text NOT NULL,
  `country_id` int NOT NULL,
  `zone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'ANDAMAN AND NICOBAR ISLANDS',1,'East'),(2,'ANDHRA PRADESH',1,'South'),(3,'ARUNACHAL PRADESH',1,'East'),(4,'ASSAM',1,'East'),(5,'BIHAR',1,'East'),(6,'CHHATTISGARH',1,'Central'),(7,'CHANDIGARH',1,'North'),(9,'DELHI',1,'North'),(10,'DADRA AND NAGAR HAVELI AND DAMAN AND DIU',1,'West'),(11,'GOA',1,'South'),(12,'GUJARAT',1,'West'),(13,'HIMACHAL PRADESH',1,'North'),(14,'HARYANA',1,'North'),(15,'JAMMU AND KASHMIR',1,'North'),(16,'JHARKHAND',1,'East'),(17,'KERALA',1,'South'),(18,'KARNATAKA',1,'South'),(19,'LAKSHADWEEP',1,'South'),(20,'MEGHALAYA',1,'East'),(21,'MAHARASHTRA',1,'West'),(22,'MANIPUR',1,'East'),(23,'MADHYA PRADESH',1,'Central'),(24,'MIZORAM',1,'East'),(25,'NAGALAND',1,'East'),(26,'ODISHA',1,'East'),(27,'PUNJAB',1,'North'),(28,'PONDICHERRY',1,'South'),(29,'RAJASTHAN',1,'Central'),(30,'SIKKIM',1,'East'),(31,'TAMIL NADU',1,'South'),(32,'TRIPURA',1,'East'),(33,'UTTARAKHAND',1,'North'),(34,'UTTAR PRADESH',1,'North'),(35,'WEST BENGAL',1,'East'),(36,'TELANGANA',1,'South'),(37,'LADAKH',1,'North');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userType` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `firstname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lastname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `mobile` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `PIAName` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Role_User` int NOT NULL DEFAULT '0',
  `catagries_of_PIA` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lat` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `long` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `kmlfile` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cepi.cpcb@nic.in','$2y$10$H4CEMv96GyteDncolgBOLuTmh1Vf3Sp.goTwIGlN4P6L4eW3hueAK',NULL,'2023-06-26 11:54:10','2023-06-26 11:54:10','ADMIN','Divya','Sinha','Delhi','8130252475',NULL,NULL,1,NULL,NULL,NULL,NULL),(19,'aruncpcb@gmail.com','$2y$10$BlzQZ9RoBumoRDRZievMqOJqJTbyfkCFaoD/jtcITLj0vbU/vP2hS',NULL,'2023-07-06 14:36:23','2023-07-06 14:36:23','State','Arun','Yadav','haziabad','8130252475',11,NULL,2,NULL,NULL,NULL,NULL),(27,'aruncpcuib@gmail.com','$2y$10$USEGFFwoykjBE2onqduZ8uFOELH9lTSV1yKtSeB8SPm0Ltn4bLw9O',NULL,'2023-07-07 01:51:58','2023-07-07 03:29:18','PIA','Arun','yadav','Ghaziabad','8130252475',11,'pia-1',3,'CPA','-34.28814582106447','4.28814582106447','20230707072158.pdf'),(28,'aruncpcb222@gmail.com','$2y$10$foC9Z7G3CtTk1uQZJjt9xuA7NtqrSFVKHJZQ9ZsLbX063j52uvS56',NULL,'2023-07-07 03:29:02','2023-07-07 03:29:02','PIA','Arun12','yadav2','Ghaziabad','8130252475',11,'pia-2',3,'SPA','-34.28814582106447','324132121321321321','20230707085902.pdf'),(29,'aruncpc3b@gmail.com','$2y$10$E3dBr/20tKC/1jyHnDzc7.rn25/qy3QM4sifNl7shHjf9WVk6jIHa',NULL,'2023-07-07 03:29:52','2023-07-07 03:29:52','PIA','Arun13','yadav3','Ghaziabad','8130252475',11,'pia-3',3,'OPA','-34.28814582106447','4.28814582106447','20230707085952.pdf'),(30,'aruncpcb323@gmail.com','$2y$10$H4CEMv96GyteDncolgBOLuTmh1Vf3Sp.goTwIGlN4P6L4eW3hueAK',NULL,'2023-07-07 03:30:44','2023-07-07 03:30:44','PIA','Arun yadav3','Testcpi','Ghaziabad','8130252475',11,'pia-4',3,'CPA','-34.27452911659509','4.28814582106447','20230707090044.pdf'),(31,'tarundarbar3i@gmail.com','$2y$10$.rWXUfftPlNW2NHj0kIj4u4VR6evctaVNnlCYlOWkK1J8t.MtqLAS',NULL,'2023-07-07 03:31:17','2023-07-07 03:31:28','PIA','Arun yadav','Testcpi','Ghaziabad','8130252475',11,'pia-5',3,'CPA','-34.28814582106447','4.28814582106447','20230707090117.pdf'),(33,'aruncpcb23@gmail.com','$2y$10$Yzd3B9mp66h2FeQyJ2DI5.LkM0f8UEj4UGA75FQ2XlMls6GJcdel.',NULL,'2023-07-07 03:33:16','2023-07-07 03:33:16','State','pooja','singh','delhi','8130252475',5,NULL,2,NULL,NULL,NULL,NULL),(34,'bihar1@gmail.com','$2y$10$jQif2IFqSXQM82M/ItFpouaHpP8au3qMAFvkCZcmqGWOszd0x4Ra6',NULL,'2023-07-07 03:35:55','2023-07-07 03:35:55','PIA','Arun yadav','Testcpi','Ghaziabad','8130252475',5,'pia-1',3,'CPA','-34.28814582106447','4.28814582106447','20230707090555.pdf'),(35,'bihar2@gmail.com','$2y$10$PIFeRW8y56yJKuTMdQubBOnkL1o./0ijnUepMs8duAgPJGrenm/jK',NULL,'2023-07-07 03:36:29','2023-07-07 03:36:29','PIA','Arun yadav','yadav','Ghaziabad','8130252475',5,'pia-2',3,'SPA','-34.36526546210242','4.28814582106447','20230707090629.pdf'),(36,'bihar3@gmail.com','$2y$10$a2kUSArDnLyBkNbpxq4R4Ofh.kJcZNMeCgxCw/6vjMgQQ99HmhXPO',NULL,'2023-07-07 03:37:00','2023-07-07 03:37:00','PIA','Arun3','yadav3','Ghaziabad','8130252475',5,'pia-3',3,'OPA','-34.31990955120707','4.28814582106447','20230707090700.pdf'),(37,'jalaj@gmail.com','$2y$10$8G9qy9sYUFoVutl1pZlk5Oi.v1FmxtsAYGOxqXDZtfBL3U6qmylMO',NULL,'2023-07-12 01:47:28','2023-07-12 01:47:28','State','JDR','DBY','New Dalhi','8318054634',34,NULL,2,NULL,NULL,NULL,NULL),(38,'moradabad@gmail.com','$2y$10$H4CEMv96GyteDncolgBOLuTmh1Vf3Sp.goTwIGlN4P6L4eW3hueAK',NULL,'2023-07-12 02:01:26','2023-07-28 07:41:01','PIA','Regional','officer','moradabad up new lko','8318054638',34,'Moradabad',3,'CPA','20','80','20230712073126.pdf'),(39,'maharastra@gmail.com','$2y$10$3L.a8bmxnizMR.6cOWFJNurLy0yZA3EIM/ZukdehD9SA.zg0ICEB2',NULL,'2023-07-14 04:10:35','2023-07-14 04:10:35','State','Maharashtra','MPCB','Navi Mumbai','8745073839',21,NULL,2,NULL,NULL,NULL,NULL),(40,'tarapur@gmail.com','$2y$10$7ek93hE9kFDKUeV5ODJ8Tej/HO583MwPHbCdtV96dBbf83GR44BGS',NULL,'2023-07-14 04:19:47','2023-07-18 05:09:57','PIA','Regional','officer','Address of concerned concerned RO','9918413080',21,'Tarapur12',3,'OPA','28.225','77.371','20230718100734.pdf'),(41,'jdrnw@gmail.com','$2y$10$wetARUktOTpNuWD7wBftzOOWmU8wm7fhsIBWLPQSMBGR2CIcIx6WK',NULL,'2023-07-18 01:06:58','2023-07-18 01:06:58','State','jdr new','drnw','moradabad','8318054635',34,NULL,2,NULL,NULL,NULL,NULL),(42,'pialst@gmail.com','$2y$10$SOrpn.zBu97y7dMZrPrcget9bWkyng3xiJ4KFk3ETBg5OG.avOBtG',NULL,'2023-07-18 01:17:09','2023-07-25 06:29:44','PIA','new 34','officer','moradabad','8318064634',34,'new piafor state id 34',3,'OPA','28.22','78','20230718064709.pdf'),(43,'jdrgo@gmail.com','$2y$10$ogdBmq7VhSF4O6sJUivOfeYLPnjFMJRJPqEXbBLnDPCh6dtxc6.Xa',NULL,'2023-07-27 06:34:16','2023-07-27 06:34:16','PIA','jkljkljkl','kjljkljkl','gfhfhgfhfg','8318054638',21,'kkjjkljkljkjk',3,'CPA','34','78','20230727120416.pdf'),(44,'yyy@gmail.com','$2y$10$AX.uQfUbdGMzhKRyNcTC7.RgwNSthuO7cBAg6Gk/CoC16P2eReXXC',NULL,'2023-07-27 07:23:28','2023-07-27 07:23:28','PIA','fdgdfg','fdgdfgdfg','gcvbvcbcvb','8318054638',34,'fdgfdgdfg',3,'CPA','34','78','20230727125328.pdf'),(45,'fdgfdgfdg@gmail.com','$2y$10$hx4V/8r5GXbrcUerHPUbkOK3XNP6LZrpSkcIQEOg4lxP/JbhQhW9W',NULL,'2023-07-27 07:27:20','2023-07-27 07:27:56','PIA','jalaj','dubey','dsfdsfsd','8318054637',34,'NEW Industrial Area',3,'CPA','23','65','20230727125720.pdf'),(46,'dsfdsfdsf@gmail.com','$2y$10$dbu9nW6MCZSq1vAiCT6nDeXytoFJmHXVVJ8cgppTlE9LbHelDhZPC',NULL,'2023-07-27 07:29:17','2023-07-27 07:29:51','PIA','Mukesh','Tiwari','dsfdsfds','8318054637',34,'New Developmenbt area',3,'SPA','54','89','20230727125917.pdf'),(47,'fgh@gmail.com','$2y$10$f4lPzijKeF55ofeDLyzJd.vOm3VMZMahsv7FtP3vutq67PxrQ622i',NULL,'2023-08-25 05:07:43','2023-08-25 05:07:43','PIA','gfhf','fgh','gfh','9918419026',21,'hgfh',3,'CPA','gfh','fgh','20230825103743.pdf');
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

-- Dump completed on 2023-09-06 10:05:35
