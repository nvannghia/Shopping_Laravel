-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shopping
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'SPORTSWEAR',0,'sportswear','2023-09-28 21:35:13','2023-09-28 21:35:13',NULL),(2,'MENS',0,'mens','2023-09-28 21:35:21','2023-09-28 21:35:21',NULL),(3,'WOMENS',0,'womens','2023-09-28 21:35:31','2023-09-28 21:35:31',NULL),(4,'KIDS',0,'kids','2023-09-28 21:35:41','2023-09-28 21:35:41',NULL),(5,'NIKE',1,'nike','2023-09-28 21:35:51','2023-09-28 21:35:51',NULL),(6,'ADIDAS',1,'adidas','2023-09-28 21:36:03','2023-09-28 21:36:11',NULL),(7,'PUMA',1,'puma','2023-09-28 21:36:31','2023-09-28 21:36:31',NULL),(8,'Nike',2,'nike','2023-09-28 22:05:28','2023-09-28 22:05:28',NULL),(9,'a',0,'a','2023-10-31 01:18:22','2023-10-31 01:18:27','2023-10-31 01:18:27'),(10,'a',6,'a','2023-11-23 08:34:00','2023-11-23 08:50:37','2023-11-23 08:50:37'),(11,'b',10,'b','2023-11-23 08:34:08','2023-11-23 08:50:31','2023-11-23 08:50:31'),(12,'test1',5,'test1','2023-11-23 08:44:36','2023-11-23 08:50:28','2023-11-23 08:50:28'),(13,'test1.1',12,'test11','2023-11-23 08:45:02','2023-11-23 08:50:25','2023-11-23 08:50:25'),(14,'test 1',1,'test-1','2023-11-23 08:53:18','2023-11-23 09:36:01','2023-11-23 09:36:01'),(15,'test 1.1',14,'test-11','2023-11-23 08:53:42','2023-11-23 09:36:01','2023-11-23 09:36:01'),(16,'test 1.1.1',15,'test-111','2023-11-23 08:53:52','2023-11-23 09:36:01','2023-11-23 09:36:01'),(17,'test 1',1,'test-1','2023-11-23 09:49:14','2023-11-23 09:49:14',NULL),(18,'test 1.1',17,'test-11','2023-11-23 09:54:48','2023-11-23 09:54:48',NULL),(19,'test 1.1.1',18,'test-111','2023-11-23 09:58:26','2023-11-23 09:58:26',NULL),(20,'1',3,'1','2024-03-11 20:43:10','2024-03-11 21:13:18','2024-03-11 21:13:18');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'some thing',0,'2023-10-11 23:49:11','2023-10-11 23:49:11','some-thing',NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (27,'2014_10_12_000000_create_users_table',1),(28,'2014_10_12_100000_create_password_reset_tokens_table',1),(29,'2019_08_19_000000_create_failed_jobs_table',1),(30,'2019_12_14_000001_create_personal_access_tokens_table',1),(31,'2023_06_18_130948_create_categories_table',1),(32,'2023_06_21_135913_add_deleted_at__into_categories_table',1),(33,'2023_06_24_134022_create_menus_table',1),(34,'2023_06_25_055845_add_attribute_slug_into_posts_table',1),(35,'2023_06_27_070455_add_attribute_deleted_at_into_posts_table',1),(36,'2023_06_28_110045_create_products_table',1),(37,'2023_06_28_110349_create_product_images_table',1),(38,'2023_06_28_110850_create_tags_table',1),(39,'2023_06_28_110955_create_product_tags_table',1),(40,'2023_07_12_115501_add_attribute_feature_image_name_into_products_table',2),(41,'2023_07_12_132050_add_atrribute_image_name_into_product_images_table',3),(42,'2023_09_16_051803_addadd_column_deleted_at_to_products_table',4),(43,'2023_09_17_053345_create_sliders_table',5),(44,'2023_09_18_081458_add_column_deleted_at_to_sliders_',6),(45,'2023_09_18_085021_create_settings_table',7),(46,'2023_09_20_034628_add_column_type_settings_table',8),(58,'2023_09_23_052133_create_roles_table',9),(59,'2023_09_23_052211_create_permissions_table',9),(60,'2023_09_23_052633_create_table_user_role',9),(61,'2023_09_23_052705_create_table_perrmision_role',9),(62,'2023_09_25_092015_add_column_parent_id_to_permissions',9),(63,'2023_09_26_051338_add_column_key_code_to_permissions',10),(64,'2023_09_26_080804_add_column_deleted_at_to_roles',11),(65,'2023_09_29_101142_add_column_views_to_products_table',12),(66,'2023_10_07_051930_create_orders_table',13),(67,'2023_10_07_054108_create_order_detail_table',14),(68,'2023_10_07_054804_add_column_amount_to_order_table',15),(69,'2023_10_08_065501_create_reivew_table',16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `unit_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_detail_order_id_foreign` (`order_id`),
  KEY `order_detail_product_id_foreign` (`product_id`),
  CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (7,24,5,2400000,5,NULL,NULL),(8,24,8,1495000,1,NULL,NULL),(9,24,6,7020000,1,NULL,NULL),(10,25,8,1495000,2,NULL,NULL),(11,25,7,1200000,1,NULL,NULL),(12,26,8,1495000,1,NULL,NULL),(13,27,7,1200000,1,NULL,NULL),(14,28,7,1200000,1,NULL,NULL),(15,29,8,1495000,4,NULL,NULL),(16,29,7,1200000,4,NULL,NULL),(17,30,7,1200000,13,NULL,NULL),(18,31,6,7020000,1,NULL,NULL),(19,31,7,1200000,1,NULL,NULL),(20,32,8,1495000,5,NULL,NULL),(21,32,7,1200000,1,NULL,NULL),(22,33,8,1495000,2,NULL,NULL);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ward` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `delivery_note` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (24,7020000,'Thành phố Hà Nội','Quận Ba Đình','Phường Phúc Xá','scdascascas','câcscsacsac',4,'2023-10-07 01:07:27','2023-10-07 01:07:27'),(25,1200000,'Tỉnh Hà Giang','Huyện Xín Mần','Xã Khuôn Lùng','0372337713','khong co gi het',4,'2023-10-07 01:43:43','2023-10-07 01:43:43'),(26,1495000,'Tỉnh Bắc Ninh','Huyện Yên Phong','Thị trấn Chờ','sacxascas','cacsacascasc',4,'2023-10-07 01:45:30','2023-10-07 01:45:30'),(27,1200000,'Thành phố Hà Nội','Quận Ba Đình','Phường Trúc Bạch','sáa','xsaxsaxsax',4,'2023-10-07 01:48:08','2023-10-07 01:48:08'),(28,1200000,'Tỉnh Hà Giang','Huyện Đồng Văn','Xã Má Lé','sáa','xsaxsaxsax',4,'2023-10-07 01:49:05','2023-10-07 01:49:05'),(29,4800000,'Tỉnh Lạng Sơn','Huyện Tràng Định','Xã Đại Đồng','sadsadsad','sadasdsad',4,'2023-10-07 01:49:52','2023-10-07 01:49:52'),(30,15600000,'Thành phố Hà Nội','Quận Ba Đình','Phường Phúc Xá','0372337713','nnnnnnnnnnnnnnn',4,'2023-10-07 01:51:25','2023-10-07 01:51:25'),(31,1200000,'Thành phố Hà Nội','Quận Hoàn Kiếm','Phường Đồng Xuân','0372337713','bbb',4,'2023-10-07 01:52:00','2023-10-07 01:52:00'),(32,8675000,'Thành phố Hà Nội','Huyện Mê Linh','Xã Hoàng Kim','0372337713','nk',4,'2023-10-07 01:55:38','2023-10-07 01:55:38'),(33,2990000,'Tỉnh Điện Biên','Thị Xã Mường Lay','Phường Sông Đà','0372337713','kh nco',4,'2023-10-09 01:16:07','2023-10-09 01:16:07');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (29,2,2,NULL,NULL),(30,2,3,NULL,NULL),(31,2,4,NULL,NULL),(32,2,5,NULL,NULL),(33,2,17,NULL,NULL),(34,2,18,NULL,NULL),(35,2,19,NULL,NULL),(36,2,20,NULL,NULL),(37,3,7,NULL,NULL),(38,3,8,NULL,NULL),(39,3,9,NULL,NULL),(40,3,10,NULL,NULL),(41,3,12,NULL,NULL),(42,3,13,NULL,NULL),(43,3,14,NULL,NULL),(44,3,15,NULL,NULL),(45,3,22,NULL,NULL),(46,3,23,NULL,NULL),(47,3,24,NULL,NULL),(48,3,25,NULL,NULL),(49,1,2,NULL,NULL),(50,1,3,NULL,NULL),(51,1,4,NULL,NULL),(52,1,5,NULL,NULL),(53,1,7,NULL,NULL),(54,1,8,NULL,NULL),(55,1,9,NULL,NULL),(56,1,10,NULL,NULL),(57,1,12,NULL,NULL),(58,1,13,NULL,NULL),(59,1,14,NULL,NULL),(60,1,15,NULL,NULL),(65,1,22,NULL,NULL),(66,1,23,NULL,NULL),(67,1,24,NULL,NULL),(68,1,25,NULL,NULL),(69,1,27,NULL,NULL),(70,1,28,NULL,NULL),(71,1,29,NULL,NULL),(72,1,30,NULL,NULL),(73,1,32,NULL,NULL),(74,1,33,NULL,NULL),(75,1,34,NULL,NULL),(76,1,35,NULL,NULL),(77,1,37,NULL,NULL),(78,1,17,NULL,NULL),(79,1,18,NULL,NULL),(80,1,19,NULL,NULL),(81,1,20,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key_code` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'category','category',0,'2023-09-28 02:16:14','2023-09-28 02:16:14',NULL),(2,'list','list-category',1,'2023-09-28 02:16:14','2023-09-28 02:16:14','category-list'),(3,'add','add-category',1,'2023-09-28 02:16:14','2023-09-28 02:16:14','category-add'),(4,'edit','edit-category',1,'2023-09-28 02:16:14','2023-09-28 02:16:14','category-edit'),(5,'delete','delete-category',1,'2023-09-28 02:16:14','2023-09-28 02:16:14','category-delete'),(6,'slider','slider',0,'2023-09-28 02:16:20','2023-09-28 02:16:20',NULL),(7,'list','list-slider',6,'2023-09-28 02:16:20','2023-09-28 02:16:20','slider-list'),(8,'add','add-slider',6,'2023-09-28 02:16:20','2023-09-28 02:16:20','slider-add'),(9,'edit','edit-slider',6,'2023-09-28 02:16:20','2023-09-28 02:16:20','slider-edit'),(10,'delete','delete-slider',6,'2023-09-28 02:16:20','2023-09-28 02:16:20','slider-delete'),(11,'menu','menu',0,'2023-09-28 02:16:25','2023-09-28 02:16:25',NULL),(12,'list','list-menu',11,'2023-09-28 02:16:25','2023-09-28 02:16:25','menu-list'),(13,'add','add-menu',11,'2023-09-28 02:16:25','2023-09-28 02:16:25','menu-add'),(14,'edit','edit-menu',11,'2023-09-28 02:16:25','2023-09-28 02:16:25','menu-edit'),(15,'delete','delete-menu',11,'2023-09-28 02:16:25','2023-09-28 02:16:25','menu-delete'),(16,'product','product',0,'2023-09-28 02:18:36','2023-09-28 02:18:36',NULL),(17,'list','list-product',16,'2023-09-28 02:18:36','2023-09-28 02:18:36','product-list'),(18,'add','add-product',16,'2023-09-28 02:18:36','2023-09-28 02:18:36','product-add'),(19,'edit','edit-product',16,'2023-09-28 02:18:36','2023-09-28 02:18:36','product-edit'),(20,'delete','delete-product',16,'2023-09-28 02:18:36','2023-09-28 02:18:36','product-delete'),(21,'setting','setting',0,'2023-09-28 02:18:52','2023-09-28 02:18:52',NULL),(22,'list','list-setting',21,'2023-09-28 02:18:52','2023-09-28 02:18:52','setting-list'),(23,'add','add-setting',21,'2023-09-28 02:18:52','2023-09-28 02:18:52','setting-add'),(24,'edit','edit-setting',21,'2023-09-28 02:18:52','2023-09-28 02:18:52','setting-edit'),(25,'delete','delete-setting',21,'2023-09-28 02:18:52','2023-09-28 02:18:52','setting-delete'),(26,'user','user',0,'2023-09-28 02:19:07','2023-09-28 02:19:07',NULL),(27,'list','list-user',26,'2023-09-28 02:19:07','2023-09-28 02:19:07','user-list'),(28,'add','add-user',26,'2023-09-28 02:19:07','2023-09-28 02:19:07','user-add'),(29,'edit','edit-user',26,'2023-09-28 02:19:07','2023-09-28 02:19:07','user-edit'),(30,'delete','delete-user',26,'2023-09-28 02:19:07','2023-09-28 02:19:07','user-delete'),(31,'role','role',0,'2023-09-28 02:19:12','2023-09-28 02:19:12',NULL),(32,'list','list-role',31,'2023-09-28 02:19:12','2023-09-28 02:19:12','role-list'),(33,'add','add-role',31,'2023-09-28 02:19:12','2023-09-28 02:19:12','role-add'),(34,'edit','edit-role',31,'2023-09-28 02:19:12','2023-09-28 02:19:12','role-edit'),(35,'delete','delete-role',31,'2023-09-28 02:19:12','2023-09-28 02:19:12','role-delete'),(36,'permission','permission',0,'2023-09-28 07:33:04','2023-09-28 07:33:04',NULL),(37,'add','add-permission',36,'2023-09-28 07:33:04','2023-09-28 07:33:04','permission-add');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(191) DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'/storage/product/2/COXnVUKxeTWUikQwiw7r.jpg',1,'2023-09-28 22:52:12','2023-09-28 22:52:12','sportswear-tech-fleece-de2.jpg'),(2,'/storage/product/2/nlklAG6zvKAfSvD3lZS5.jpg',1,'2023-09-28 22:52:12','2023-09-28 22:52:12','sportswear-tech-fleece-de1.jpg'),(3,'/storage/product/2/AbU4lnql65J5UHxNRLom.jpg',2,'2023-09-28 23:02:23','2023-09-28 23:02:23','chelsea-fc-de.jpg'),(4,'/storage/product/2/r0qwZVp3DrxUhBIxAOVx.jpg',3,'2023-09-28 23:03:35','2023-09-28 23:03:35','lebron-de1.jpg'),(5,'/storage/product/2/2w7d4Pi034lEIM00Thld.jpg',4,'2023-09-28 23:04:18','2023-09-28 23:04:18','jordan-dri-fit-sport-de.jpg'),(6,'/storage/product/2/faTnDPRY1Ej9iLESYcoC.webp',5,'2023-09-28 23:05:15','2023-09-28 23:05:15','puma-de1.webp'),(7,'/storage/product/2/asQdCcNaAqvFSFSu4ngv.jpg',6,'2023-09-28 23:06:28','2023-09-28 23:06:28','sportswear-sport-essentials-de2.jpg'),(8,'/storage/product/2/VkaRXqZSNzgcxxtjuqfM.jpg',6,'2023-09-28 23:06:28','2023-09-28 23:06:28','sportswear-sport-essentials-de1.jpg'),(9,'/storage/product/1/jgNIY8Rkw7y5WG6ALQHr.jpg',7,'2023-10-01 02:08:00','2023-10-01 02:08:00','Nike Sportswear Club Fleece_3.jpg'),(10,'/storage/product/1/cGoP4qgw55w3hyaelHvE.jpg',7,'2023-10-01 02:08:00','2023-10-01 02:08:00','Nike Sportswear Club Fleece_2.jpg'),(11,'/storage/product/1/nLTlEhYizQpqo6qBxE94.webp',7,'2023-10-01 02:08:00','2023-10-01 02:08:00','Nike Sportswear Club Fleece_1.webp'),(12,'/storage/product/1/RWYWQR4l379hZR2sqxRP.webp',8,'2023-10-01 02:11:20','2023-10-01 02:11:20','Nike Sportswear Club Fleece_3.webp'),(13,'/storage/product/1/SC20CF77TrW20Asx6yGF.jpg',8,'2023-10-01 02:11:20','2023-10-01 02:11:20','Nike Sportswear Club Fleece_2 (2).jpg'),(14,'/storage/product/1/3l57VEbxPtsezkXn7PBX.jpg',8,'2023-10-01 02:11:20','2023-10-01 02:11:20','Nike Sportswear Club Fleece_1.jpg'),(15,'/storage/product/1/ueTUd5RXwQBa1Xxr0X9H.png',9,'2023-10-31 01:24:09','2023-10-31 01:24:09','Screenshot 2023-10-10 130050.png'),(21,'/storage/product/5/NgSuIUF96NGQFATuaaS3.png',15,'2023-11-23 08:57:09','2023-11-23 08:57:09','err-2.png');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tags`
--

DROP TABLE IF EXISTS `product_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_tags_product_id_foreign` (`product_id`),
  KEY `product_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tags`
--

LOCK TABLES `product_tags` WRITE;
/*!40000 ALTER TABLE `product_tags` DISABLE KEYS */;
INSERT INTO `product_tags` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,2,4,NULL,NULL),(5,2,2,NULL,NULL),(6,3,5,NULL,NULL),(7,4,4,NULL,NULL),(8,5,6,NULL,NULL),(9,5,7,NULL,NULL),(11,6,4,NULL,NULL),(12,7,9,NULL,NULL),(13,9,10,NULL,NULL),(15,15,12,NULL,NULL),(16,15,13,NULL,NULL);
/*!40000 ALTER TABLE `product_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `feature_image_path` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Nike Sportswear Tech Fleece Windrunner','3419000','/storage/product/2/iGAci60uu8muiev4j4Sj.jpg','<p>Nike Sport Clothing</p>',5,2,'2023-09-28 22:52:12','2023-10-09 04:59:44','sportswear-tech-fleece.jpg',NULL,11),(2,'Chelsea F.C. 2023/24 Stadium Home','2399000','/storage/product/2/8JWJqvl80Hcofb9oNa5l.jpg','<p>Nike</p>',5,2,'2023-09-28 23:02:23','2023-10-09 04:59:47','chelsea-fc.jpg',NULL,4),(3,'LeBron','3450000','/storage/product/2/ReLNQ3RjGYIQJVVA2ji4.jpg','<p>Nike</p>',5,2,'2023-09-28 23:03:35','2023-10-09 04:59:49','lebron.jpg',NULL,8),(4,'Jordan dri','4567000','/storage/product/2/wwYG9sYAsBsPYd9Rn9MX.jpg','<p>Nike</p>\r\n<div class=\"ddict_btn\" style=\"top: 27px; left: 50.875px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>',5,2,'2023-09-28 23:04:18','2023-10-08 00:30:26','jordan-dri-fit-sport.jpg',NULL,16),(5,'Puma T-Shirt','2400000','/storage/product/2/KFqcwJxaY6MN0OSNRLdI.webp','<p>Puma clothing</p>',8,2,'2023-09-28 23:05:15','2023-10-12 05:30:23','puma.webp',NULL,60),(6,'Nike Essitial','7020000','/storage/product/2/Iwv2zo1czPGQ0qi6VnAt.jpg','<p>Nike</p>',5,1,'2023-09-28 23:06:28','2023-11-01 01:21:33','sportswear-sport-essentials.jpg',NULL,88),(7,'Nike Sportswear Club Fleece','1200000','/storage/product/1/guLxkKlnMXqxUVuIz5j1.webp','<p>Nike Fashion clothing</p>',5,1,'2023-10-01 02:08:00','2024-01-03 01:31:44','Nike Sportswear Club Fleece.webp',NULL,38),(8,'Men\'s Graphic Pullover Hoodie','1495000','/storage/product/1/EOOmwY1kBTvGP8Yf36TP.jpg','<p>Nike hoodie</p>\r\n<p>&nbsp;</p>\r\n<div class=\"ddict_btn\" style=\"top: 21px; left: 128.236px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>',5,1,'2023-10-01 02:11:20','2023-11-23 08:28:37','Nike Sportswear Club Fleece.jpg',NULL,33),(9,'product test 1aaa','18000000','/storage/product/1/hC92OesVDdbe47JzqO9U.png','<p>test product&nbsp;</p>',7,1,'2023-10-31 01:24:09','2023-10-31 22:10:16','duoi.png','2023-10-31 22:10:16',0),(15,'test product','34234234234','/storage/product/5/0ShyTmnDTXuXF1V2DYuZ.png','<p>product test&nbsp;</p>',1,5,'2023-11-23 08:57:09','2023-11-23 08:57:21','err_1.png','2023-11-23 08:57:21',0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number_star` int(11) NOT NULL,
  `content` text NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,5,'Nice item with high quality',6,4,'2023-10-08 00:30:07','2023-10-08 00:30:07'),(2,3,'not bad',6,4,'2023-10-08 00:51:04','2023-10-08 00:51:04'),(3,3,'yesssssss',6,4,'2023-10-08 01:01:25','2023-10-08 01:01:25'),(4,3,'Nothing bad',7,4,'2023-10-09 05:01:08','2023-10-09 05:01:08'),(5,5,'Nice clothes !!!!',5,4,'2023-10-12 05:30:22','2023-10-12 05:30:22');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','Quản trị webiste','2023-09-28 02:20:20','2023-09-28 02:20:20',NULL),(2,'Sale','Nhân viên bán hàng','2023-09-28 02:23:11','2023-09-28 02:23:11',NULL),(3,'Setting','Nhân viên chỉnh sửa các cài đặt liên quan trong hệ','2023-09-28 02:26:28','2023-09-28 02:26:28',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_key` varchar(191) NOT NULL,
  `config_value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'phone_contact','+84 37 233 7713','2023-09-30 23:22:16','2023-09-30 23:22:16','text'),(2,'email_address','vannghianguyen.work@gmail.com','2023-09-30 23:22:55','2023-09-30 23:25:16','text'),(3,'facebook_link','https://www.facebook.com/profile.php?id=100032933722900&mibextid=LQQJ4d','2023-09-30 23:27:52','2023-09-30 23:27:52','text');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Mua sắm thả không lo về giá','Giá đã rẻ ngại gì không mua, cam kết sản phẩm chất lượng, 1 đổi 1 nếu sản phẩm lỗi trong vòng 1 năm','/storage/slider/1/VdOR7dG544OclzOIri2m.png','slider1.png','2023-09-28 01:36:56','2023-09-28 01:36:56',NULL),(2,'Cuộc sống quá ngắn để mua sắm những thứ cũ','Hãy mua sắm vì cuộc sống, vì gia đình bạn xứng đáng nhiều và nhiều hơn thế nữa','/storage/slider/1/5CWTXgSdpwNYlceYLH5X.png','slider2.png','2023-09-28 01:39:19','2023-09-28 01:39:19',NULL),(3,'Shopping thông minh, không linh tinh giá','Cam kết các sản phẩm trên sàn rẻ nhất thị trường, không lo về giá, chất lượng, phục vụ, hỗ trợ và hậu mãi khách hàng 100%.','/storage/slider/1/bwGqF52dvFX98BSB7ARY.jpg','slider3.jpg','2023-09-28 01:40:48','2023-09-28 01:40:48',NULL);
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Sportswear','2023-09-28 22:52:12','2023-09-28 22:52:12'),(2,'sport','2023-09-28 22:52:12','2023-09-28 22:52:12'),(3,'running','2023-09-28 22:52:12','2023-09-28 22:52:12'),(4,'Nike','2023-09-28 23:02:23','2023-09-28 23:02:23'),(5,'lebron','2023-09-28 23:03:35','2023-09-28 23:03:35'),(6,'Puma','2023-09-28 23:05:15','2023-09-28 23:05:15'),(7,'Fashion','2023-09-28 23:05:15','2023-09-28 23:05:15'),(8,'Essentials Nike','2023-09-28 23:06:28','2023-09-28 23:06:28'),(9,'Nike Fashion','2023-10-01 02:08:00','2023-10-01 02:08:00'),(10,'test','2023-10-31 01:24:09','2023-10-31 01:24:09'),(11,'sqacdascsac','2023-10-31 23:55:50','2023-10-31 23:55:50'),(12,'product test','2023-11-23 08:57:09','2023-11-23 08:57:09'),(13,'test1','2023-11-23 08:57:09','2023-11-23 08:57:09');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(5,5,1,NULL,NULL);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Văn Nghĩa','vannghianguyen.work@gmail.com',NULL,'$2y$10$tH5LE7ZMORI0RJU0UM4Ee.LCHj.C6dfxdVWR4iYLWDR9uOxslhUw2',NULL,NULL,'2023-09-28 02:31:12',NULL),(2,'Sale Staff','sale@gmail.com',NULL,'$2y$10$z8K8D6XDFLhicguiaVlRDubwtNXcvMi.Tzah16G5.0Zg3OcZkfXfi',NULL,'2023-09-28 02:24:10','2023-09-28 07:08:35',NULL),(3,'Setting Staff','setting@gmail.com',NULL,'$2y$10$9Q78mNpe0I0sWdApPjb/KegZZXJy0dGcBp28Uq8VbKtVCWswkRVe.',NULL,'2023-09-28 02:27:00','2023-09-28 02:27:00',NULL),(4,'abc','abc@gmail.com',NULL,'$2y$10$c3kUBv4aRXoFWkn1MUTsfu6JI7E1GQbY8.6TAsVG/EaPjLDz2Jt3K',NULL,'2023-10-06 07:41:32','2023-10-06 07:41:32',NULL),(5,'admin','admin@gmail.com',NULL,'$2y$10$iC2no5sVXURu3H2gmpBcuuljlbTAyGRKVmK5gseI1L.Gpqz719q.6',NULL,'2023-11-02 06:36:05','2023-11-02 06:36:05',NULL);
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

-- Dump completed on 2024-03-16 13:33:32
