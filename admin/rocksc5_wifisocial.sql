-- MySQL dump 10.13  Distrib 5.6.33, for Linux (x86_64)
--
-- Host: localhost    Database: rocksc5_wifisocial
-- ------------------------------------------------------
-- Server version	5.6.33-log

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
-- Table structure for table `advertisings`
--

DROP TABLE IF EXISTS `advertisings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertisings` (
  `id_advertising` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `media_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `id_device` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_advertising`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisings`
--

LOCK TABLES `advertisings` WRITE;
/*!40000 ALTER TABLE `advertisings` DISABLE KEYS */;
INSERT INTO `advertisings` (`id_advertising`, `keyword`, `type`, `media_file`, `position`, `id_device`, `id_user`, `created_at`, `updated_at`) VALUES (7,'Banner de Bienvenida','0','17162.jpg',1,2,2,'2016-11-16 05:48:14','2016-12-01 00:21:05'),(8,'first','0','75471.jpg',2,2,2,'2016-11-16 22:07:26','2016-12-01 00:25:18'),(9,'second','0','34624.jpg',2,2,2,'2016-11-16 22:07:50','2016-12-01 00:42:04'),(10,'Fondo de pagina','0','52255.jpg',3,2,2,'2016-11-17 06:31:05','2016-12-01 01:08:52'),(11,'third','0','55417.jpg',2,2,2,'2016-12-01 00:33:59','2016-12-01 00:34:13'),(12,'four','0','47831.jpg',2,2,2,'2016-12-01 00:34:30','2016-12-01 00:34:30'),(13,'five','0','71598.jpg',2,2,2,'2016-12-01 00:42:45','2016-12-01 00:42:45'),(14,'colombia coffe','1','34346.mp4',2,2,2,'2016-12-01 01:59:21','2016-12-01 01:59:21');
/*!40000 ALTER TABLE `advertisings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_devices`
--

DROP TABLE IF EXISTS `client_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_devices` (
  `id_device` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_device`),
  UNIQUE KEY `mac` (`mac`),
  KEY `client_devices_id_user_foreign` (`id_user`),
  CONSTRAINT `client_devices_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_devices`
--

LOCK TABLES `client_devices` WRITE;
/*!40000 ALTER TABLE `client_devices` DISABLE KEYS */;
INSERT INTO `client_devices` (`id_device`, `id_user`, `mac`, `name`, `ip`, `device_username`, `device_password`, `created_at`, `updated_at`) VALUES (2,2,'F4F26DF4ADA6','TP LINK 740N','192.168.50.2','root','Rock123','2016-11-11 08:12:55','2016-11-11 08:12:55'),(3,2,'30B5C20B390A','TP LINK 841ND','192.168.50.3','2','','2016-12-10 07:59:21','2016-12-10 07:59:21');
/*!40000 ALTER TABLE `client_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facebook_consumers`
--

DROP TABLE IF EXISTS `facebook_consumers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facebook_consumers` (
  `id_consumer` int(11) NOT NULL AUTO_INCREMENT,
  `id_fb_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age_range` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `political` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lacation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hometown` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_consumer`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebook_consumers`
--

LOCK TABLES `facebook_consumers` WRITE;
/*!40000 ALTER TABLE `facebook_consumers` DISABLE KEYS */;
INSERT INTO `facebook_consumers` (`id_consumer`, `id_fb_user`, `first_name`, `last_name`, `email`, `gender`, `birthday`, `age_range`, `religion`, `political`, `profile_link`, `website`, `locale`, `lacation`, `hometown`, `post_id`, `access_token`, `mac`, `created_at`, `updated_at`) VALUES (13,'10153976925166776','Anfe','Van','felipefuentes13@hotmail.com','male',NULL,'{\"min\":21}',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/10153976925166776/',NULL,'es_LA',NULL,NULL,NULL,'EAAZA5X2sGnLgBADRsN8SQd1eEq6a9pQ5SpDTaj80jM5tOLtylcKOZCjmEZBSAXPL6ew8mZAsuPqKGDh7ZAIKV9L7ZAAJ7mAV8Urbe1rR4vnfyp2pl1yyGRT8rWr6VPtZB7rsFsZCh5z9ww6N2Wf1fWMZBDehOyZAxdp14ZD','F4F26DF4ADA6','2016-11-29 00:49:57','2016-11-29 00:49:57'),(14,'1352640994788082','Julian','De La Torre','estebandelatorrec@hotmail.com','male',NULL,'{\"max\":17,\"',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/1352640994788082/',NULL,'es_ES',NULL,NULL,NULL,'EAAZA5X2sGnLgBABVp4I6THyyu5D15RJs2WxmrhNwnjEEfAiQKdRXjCroRGMlBN2kCQ46ZC5bB50668RKs3VOZAGpywAwcb2QEdwSFZAauykgrorIJghNBQtAWhn50SVPvV2NkLpNiHINJsdQMJqElsxt8RZCeSQC5ygr5CilHcQZDZD','F4F26DF4ADA6','2016-11-29 20:04:38','2016-11-29 20:04:38'),(15,'10211052723853285','Alex','Rivera','alex.rivera.ws@gmail.com','male',NULL,'',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/10211052723853285/',NULL,'en_GB',NULL,NULL,NULL,'EAAZA5X2sGnLgBAAczaOigMBEjC8fcV4DqoEmFON3B0OmTrW5vuiUoKRU5rLuLqv6RiZC4DMZAoxBDP3OXirl2bjnCGG2HxX7lSLvZAJmIO4mEZCTbqsydVX8gHykacm2TsSbxbj5CR0EgS4E0K5GSRwvdnZBf47C4ZD','F4F26DF4ADA6','2016-12-02 13:30:39','2016-12-02 13:30:39'),(17,'672754116262060','Juan','Alvarez','segnet@outlook.com','male',NULL,'',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/672754116262060/',NULL,'es_ES',NULL,NULL,NULL,'EAAZA5X2sGnLgBAG02GZCySUke8kkHa4pGvxMOsPWg5YpMZA1Dmi7vzxt9VsREmP3kYs7bekRnMxPeyNBrk9tZCiMikFOvZBnFB34cctAn2qZCncwWsK39gIob6qh57EKR7IvuzN0CivlQ17XjCpd20zXbkeFoSJe8ZD','F4F26DF4ADA6','2016-12-04 05:59:03','2016-12-04 05:59:03'),(18,'1798681253753697','Ale','Rivera','wsalexws@gmail.com','male',NULL,'',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/1798681253753697/',NULL,'es_LA',NULL,NULL,NULL,'EAAZA5X2sGnLgBAF5KOcZAstn5zd7loChCwphfjINfpHZBNtWaIYuvcxnsnGbkYAkjhug1v5QVQU7CrhtnZA6gvQwkZBrzEyo1dQKbYs2oqZAx0ZCrxZCPTTiZBpjrKTGMP0caCFcO9ot3yMGmVtZAuE6QupbFzF6g5M9xhu6GfZAeCFZBgZDZD','F4F26DF4ADA6','2016-12-04 06:23:22','2016-12-04 06:23:22'),(19,'381358448878489','Alvaro','Novoa','fallujahprisonofmind@gmail.com','male',NULL,'{\"min\":21}',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/381358448878489/',NULL,'es_LA',NULL,NULL,NULL,'EAAZA5X2sGnLgBAAJUrGq8IfRYPzTAFzh8dfZCZBcYDR0H19TEWwxQk3rKwfA7icPam8IOZARBEgssSGRVZAF3KrlZBET3Jm05BpZCgwJzZBFC4asxoNUZAKBF6vYzyh5uO1BrhRd6KIzOsuCmEXy2ciZBizUn9UhgEX38ZD','F4F26DF4ADA6','2016-12-09 19:23:58','2016-12-09 19:23:58'),(20,'10154208364573131','Jesus','Mon Petit Chiot','do.nabor@hotmail.com','male',NULL,'{\"min\":21}',NULL,NULL,'https://www.facebook.com/app_scoped_user_id/10154208364573131/',NULL,'es_LA',NULL,NULL,NULL,'EAAZA5X2sGnLgBAFHgjn6aKutLTuZAXnipFZCkMwJVOYAH6wAS7YXl4KW46a0bRIAL4Nh2FgHmZBvMNZA49QpQV8PxeoKFzIjUgwuZBekpnBiPsSbXoRrGjuZA292B96GtGP4oam78o5pUQkljQgNhsTjAstrGrZAyPkZD','F4F26DF4ADA6','2016-12-10 18:35:42','2016-12-10 18:35:42');
/*!40000 ALTER TABLE `facebook_consumers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `permissions`, `protected`, `created_at`, `updated_at`) VALUES (1,'superadmin','{\"_superadmin\":1}',0,'2016-11-06 19:32:48','2016-11-08 07:53:21'),(4,'Member','{\"_member\":1}',0,'2016-11-06 19:40:20','2016-11-08 07:52:15');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instagram_consumers`
--

DROP TABLE IF EXISTS `instagram_consumers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instagram_consumers` (
  `id_consumer` int(200) NOT NULL AUTO_INCREMENT,
  `id_ig_user` varchar(250) CHARACTER SET latin1 NOT NULL,
  `full_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `profile_picture` varchar(250) CHARACTER SET latin1 NOT NULL,
  `website` varchar(250) CHARACTER SET latin1 NOT NULL,
  `bio` text CHARACTER SET latin1 NOT NULL,
  `username` varchar(250) CHARACTER SET latin1 NOT NULL,
  `access_token` text CHARACTER SET latin1 NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_consumer`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instagram_consumers`
--

LOCK TABLES `instagram_consumers` WRITE;
/*!40000 ALTER TABLE `instagram_consumers` DISABLE KEYS */;
INSERT INTO `instagram_consumers` (`id_consumer`, `id_ig_user`, `full_name`, `profile_picture`, `website`, `bio`, `username`, `access_token`, `mac`, `date`) VALUES (9,'3408706955','disfraces sensuales y eroticos','https://scontent.cdninstagram.com/t51.2885-19/s150x150/13388652_495216424010092_745885557_a.jpg','http://mercado-directo.com/espana/categoria-producto/ropa-calzado-y-complementos/disfraces-y-ropa-de-epoca/?lang=es','Disfraces sensuales/sexi, provocativos y para hallowen','disfraces_sensuales_eroticos','3408706955.704275f.64b947f6898a4215ad1f8ca1f8850c27','F4F26DF4ADA6','2016-11-24 17:11:54'),(10,'3167836254','Emoji cojines de whatsapp','https://scontent.cdninstagram.com/t51.2885-19/s150x150/13422792_1798952360333903_423692369_a.jpg','http://mercado-directo.com/espana/?s=emoji&post_type=product&lang=es','Cojines y tazas con diseÃ±os de emoticonos de whatsapp','emoji_cojines_tazas_whatsapp','3167836254.704275f.337e076dcfc5451882f47f0476daf840','F4F26DF4ADA6','2016-11-29 05:27:21'),(13,'3412492687','Semillas','https://scontent.cdninstagram.com/t51.2885-19/s150x150/13392868_1759673007607628_1855749884_a.jpg','http://mercado-directo.com/espana/categoria-producto/casa-jardin-y-bricolaje/terraza-y-jardin/plantas-y-semillas/?lang=es','Semillas listas para sembrar | Seeds','semillas_seeds','3412492687.704275f.f02f3fc587764028ba8f1036a99180ac','F4F26DF4ADA6','2016-11-29 06:04:08');
/*!40000 ALTER TABLE `instagram_consumers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1),(2,'2014_02_19_095545_create_users_table',1),(3,'2014_02_19_095623_create_user_groups_table',1),(4,'2014_02_19_095637_create_groups_table',1),(5,'2014_02_19_160516_create_permission_table',1),(6,'2014_02_26_165011_create_user_profile_table',1),(7,'2014_05_06_122145_create_profile_field_types',1),(8,'2014_05_06_122155_create_profile_field',1),(9,'2014_10_12_100000_create_password_resets_table',1),(10,'2016_11_06_171457_create_client_devices_table',2),(11,'2016_11_07_134509_create_facebook_consumers_table',3),(12,'2016_11_08_120137_create_advertisings_table',4),(13,'2016_11_08_121000_create_advertisings_table',5),(14,'2016_11_08_153445_create_advertisings_table',6),(15,'2016_11_08_154207_create_advertisings_table',7),(16,'2016_11_09_112205_create_portals_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`id`, `description`, `permission`, `protected`, `created_at`, `updated_at`) VALUES (1,'superadmin','_superadmin',0,'2016-11-06 19:32:48','2016-11-06 19:32:48'),(6,'member','_member',0,'2016-11-08 05:23:09','2016-11-08 05:23:09');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portals`
--

DROP TABLE IF EXISTS `portals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portals` (
  `id_portal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_popup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `close_popup_time` int(11) NOT NULL,
  `close_popup_time_seconds` int(11) NOT NULL,
  `redirect_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fb_page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_message` text COLLATE utf8_unicode_ci NOT NULL,
  `like_us_popup` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `close_popup_like_time` int(11) NOT NULL,
  `close_popup_like_time_seconds` int(11) NOT NULL,
  `id_device` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `connect_fb` int(20) NOT NULL DEFAULT '0',
  `connect_ig` int(20) NOT NULL DEFAULT '0',
  `connect_wa` int(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_portal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portals`
--

LOCK TABLES `portals` WRITE;
/*!40000 ALTER TABLE `portals` DISABLE KEYS */;
INSERT INTO `portals` (`id_portal`, `title`, `display_popup`, `close_popup_time`, `close_popup_time_seconds`, `redirect_url`, `access_code`, `fb_page_id`, `fb_page_name`, `share_action`, `share_message`, `like_us_popup`, `close_popup_like_time`, `close_popup_like_time_seconds`, `id_device`, `id_user`, `connect_fb`, `connect_ig`, `connect_wa`, `created_at`, `updated_at`) VALUES (2,'Café Sorrento','1',0,2,'https://www.facebook.com/cafesorrentoarmenia','5555','1374285526139276','Café Sorrento','1','share our site','0',0,5,2,2,1,1,0,'2016-11-17 07:27:57','2016-12-02 21:36:38');
/*!40000 ALTER TABLE `portals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portals_users_instagram`
--

DROP TABLE IF EXISTS `portals_users_instagram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portals_users_instagram` (
  `id_ig_user` int(11) unsigned NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_portal` int(10) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `access_token` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_ig_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portals_users_instagram`
--

LOCK TABLES `portals_users_instagram` WRITE;
/*!40000 ALTER TABLE `portals_users_instagram` DISABLE KEYS */;
INSERT INTO `portals_users_instagram` (`id_ig_user`, `id_user`, `id_portal`, `full_name`, `profile_picture`, `website`, `bio`, `username`, `access_token`, `date`) VALUES (3167836254,2,2,'Emoji cojines de whatsapp','https://scontent.cdninstagram.com/t51.2885-19/s150x150/13422792_1798952360333903_423692369_a.jpg','http://mercado-directo.com/espana/?s=emoji&post_type=product&lang=es','Cojines y tazas con diseños de emoticonos de whatsapp','emoji_cojines_tazas_whatsapp','3167836254.704275f.337e076dcfc5451882f47f0476daf840','2016-11-23 21:56:11');
/*!40000 ALTER TABLE `portals_users_instagram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_field`
--

DROP TABLE IF EXISTS `profile_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `profile_field_type_id` int(10) unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_field_profile_id_profile_field_type_id_unique` (`profile_id`,`profile_field_type_id`),
  KEY `profile_field_profile_field_type_id_foreign` (`profile_field_type_id`),
  CONSTRAINT `profile_field_profile_field_type_id_foreign` FOREIGN KEY (`profile_field_type_id`) REFERENCES `profile_field_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_field_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_field`
--

LOCK TABLES `profile_field` WRITE;
/*!40000 ALTER TABLE `profile_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_field_type`
--

DROP TABLE IF EXISTS `profile_field_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_field_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_field_type`
--

LOCK TABLES `profile_field_type` WRITE;
/*!40000 ALTER TABLE `profile_field_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_field_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES (3,1,'::1',0,0,0,NULL,NULL,NULL),(4,2,'::1',0,0,0,NULL,NULL,NULL),(5,3,'::1',0,0,0,NULL,NULL,NULL),(6,1,'181.60.34.243',0,0,0,NULL,NULL,NULL),(7,3,'181.60.34.243',5,1,0,'2016-11-16 04:19:46','2016-11-16 04:19:46',NULL),(8,2,'181.60.34.243',0,0,0,NULL,NULL,NULL),(9,1,'190.9.208.186',0,0,0,NULL,NULL,NULL),(10,2,'181.51.186.112',0,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokens` (
  `token` char(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `platform` varchar(100) DEFAULT NULL,
  `id_fb_user` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`token`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokens`
--

LOCK TABLES `tokens` WRITE;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
INSERT INTO `tokens` (`token`, `date`, `platform`, `id_fb_user`) VALUES ('1822783a5ceb082823786e098cadacdb4b4ebb7f','2016-12-10 18:35:42','facebook','10154208364573131');
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_profile_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES (1,1,'1112768143',NULL,'Jhon Alexander','Grisales Rivera','3165053657','Quindio','Armenia','Colombia','630001','cra 14 18n119 304A','����\0JFIF\0\0\0\0\0\0��\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v90), quality = 90\n��\0C\0\n\n\n\r\r��\0C		\r\r��\0\0�\0�\"\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0�R��P�I�Q@E%\0�R~TP�IE\0-�P�IU�5M=w]]Al�����4T����y���q�8�0��M@E%\0�RQ@F)(���i9��h�G4���G5��F����\0��w��S�Z�a��v�������Y��Z\0쫏���o�_\n4϶��Z��T��;�����x�0;�_|^�\0��j:��O�\r��m��ֿU��>VH�T�w�|��?_x�S�Rկ�uK��yf���#���ۨ�r�RG�?�z���xD�N��TY��m��q�%��n�\0k��77&G��r@�qĉ���P6��ׄ\rL�����nu���_DF[�`�잫�I�EN�����l_�.�_]�����v��s�!��Q�kO���s�{���D�F���@�X~G�x.��-�!��c�G�,���}j�\0��x�����ݤ�w��34i�R7~�3�0�����=)�Ն����E|W��}&��c�\Z��BX���A�v䁃��\'�xW���GW�|E-������0��!�����Go�J]?�\r�n0�3��ޑ������g�����ŕ���(��5ke�9�U��=�T���{\n�>��xTMG��֣�_FA[�>���H�����\0e��*n�c{g��\0��u>B#O��x;<j0���G5���O����_Ϡk1�Z܅!.!o���v ��Vg�������T��{iV���y\r��w�oum x�FVVGz�_���M�����ϊ,�x����-fa�<�Ɲvǅ�����n2���\n���I��h�NhqF)(���%x���o���^��i�]�qa���$pI�\n�~�P#�\\~�t����٭/<W+�7w�:���<�)\'\0`���8�������:������^j\r�[�۹$��ԱS�μ�2�<G�O{��7W�ww���rkIٹ,���Sf;��_H��\"���\\+���q��U�|?fo��9��Jy�\0��xu����V~cPݘ�yDGta��{��Xw=�m[��p�&��1����\Z�/��I[�ى��\0ϯ���bx��Fs׵+y��_oE�$�zM亊FAd���Au��<-�Fx/|3�6��Y�\r��o��FF7���U�R0���ρ~!}3��v͖�i\r�!�U��`���\0> \\�$����z�F�8onN���\"b���ڛ���\\�O���~\'�ԍ:���4X�����b1_;]^L�v�G<����<����W����\\�3,c��*����_����:�0q�Vi4�c�S�5��j��~\Z�?�^�b3u�ܓ��D\Z{�~�Y�k�w��Z7ݽI��Ҿ���|�Kj�����dbO�?\Z��\0k_��a��\0ѼO\0��*0�+�_̇�m��Z��BY�z-��|�0�����޿�{�|z��j��i�ҵV\',�F���(�����Qn��F\'�~�w>����G�����O�3ϋ?�l���n�>���V�b?[袊���\0Z?\Z(��=?�W�~��}F���4��оk�� �x?��?�oO�9&壂�Q�$j�p���q�;U�r;�T�9����#1#�VC��Fے�9��%�qI��|!��\0_��\0J�]k�Y��l�μo����=/����\n�]Pn���w_�T=�[�?�ǃG�>�^Z�Ӣk�qԄS�/�c.1����E�\\Dv;.~���֒5�6GP���+�;�_���/���_�C��ykiw$q�\0�\'a?T�\Z�J<���\n�ں�¾?���KWMO�wiwn���N��.O��\\C�\'9=+��<S��]\n�׬g��V�|�Xz���T�5�m��5��p~�k��cs\Zi������ �J���yֱa>���i�\nV{I�	���O�*ki#��`��}?�kbO�]]C+eH� �E.G�y�����㟀���2k���l�2��d�\0ǃW�T\0�Q�E\0Q�?\nO�8�\0ಒ���E�����\0�C_���~n�\0�eO�S��?����\0A�����ϸ{�dc$�7�z�l��qL�>���ZR2(�sQ�2���*9:c֥�k�es�]0���\0�5�ɟ�:z��?��^7�T��N4��\0.�$�\0�^�?����tz�P9ѭnP����Tzq��z���-l~���̟�(ׇ��+���Cp�:���#��}\\��>�a��w�_@��G��*#_�O�U)��H��&od(@�\0Ȧ�����r1\0�\n��A&��]Q\'j���3���5�\"B�5�w?�<*W��4_�F�;x��T*Iy����˟�~���BD��n\\ױ~�d��3M���ڦ�gx�ԕ+�\0�׌؝�����\0*�;	���M�w�F�nۤӦ��c�.$u�˨���\0\Z���	)������9�Zx�p����=��� �?\nJ\0^�QI@_�?�YW�\0�?�5�����E_�����\0��m��E�\0������H�����y\"�����*q�ҔO^)g���0�p��8v�3�C;d\n��w��\'��C�o��;I\Z��I��k�է]Z���w��I\'�\0�.��SO�Z�>���M��I�\0�f��8����?��F��Km��ⱒ�-l~�~�����>x\'I�#x5l�����;��� �e����\0�1��w��8+=����\Z�\0���^���$??�T���V�\"O�{�D���O�ot;�f/2�!#4��6�(��H_13�_c�������n�k�n��iP��{��nKc��\'�� O�X�����#�>��}y^\'dҁ��½���u���H��x_O��рs��W�X���?*��#����\0xd�]��l����\0z���~x�\0�ǂ~#�a����������l��RsFh���~f�\0�e�a�l@n�����*���\0��6_���vT���Ϗ��N#9\Z|��O�:�5h���\\s��&�sM.\0��)�5�Ɨ�\\���\\:��I�\0�����L�\0���\0�U�R�����]B�+�>s�7��$�\0�5���2�tuΣn?�\"�Or�������\0����_�D���\r��0�{J���\0|4�~���_�c�h�g�/Z�#�I�ܲ�ޱ.\"���C�ս�>w�9\'�jm�����A���a��T��]����`��(�I����>Mk����86����Gʋ��\0���ơ�3��\0k�ZK����2<�1��˅���uy6��I���T���<{���\0��䍖�o���B�~\0�m�2�?�?<��a��5-b���4@��5j�h&~��4~\\|4������h/�Mv��Ge���9�(�Ǵ��~j;{x�-��bP�k�U@�\0�zT��\\�g�KI@��P�_�_�YH��q6���\\��S�k�Ҿi��?g)�\0ho����Z,���\0ɔcF=�\0�]��I��,?�4��u��Q�s�M:�He�o! ��,?1Y�x7\\Q��ތ�ۿ�Qt1�������w�V�:闟O!�£j��O�X[�)hg��J	��j�����+�����=B�QV7;����\n�O�s���^����\0�/���m����y�����qu���-�[��C��s��o�(�ϵ}U��$���\0�X|bas�܋�.Y.�5\'�ݵ��^z��K�\'��Ɵ�|8ծ�Gq��pD�|������!���z����y%�_�����#b|��g񯻿m�����P`�i�r���=|�!A��k��Sh����b�d.�9x�rU=8�`������\0�,�48|?=Ɵ�l�L^[�_&yو�ĀV;W��2�Q�g&����L\"M4��,�xP̼�����L���Ec�k\Z�-�]/�0��i��A��$��� �õN�g�^J�	>����\0�P�9m��}vH�[xsL��94؁�U�?�\Z��4���zW����Kx/�5ߊ���Wzf��`�Hs_�y��aZ�}�ړ4~TRi8�\0\"�(h�����c�\0������|I�/��~ 7�ŷU��B�*	\"x�o�\'8e�\0��s��?�<M��_��IVV��{�\0\r~�\0b�~��?b�|s\Z��<9�?��1�L���>�^��qR�I��)�/�&>�k�\0R�����\0-���\'�W�|s��|i�S�|C�y�l�V�W�����+���漑��JȳA|u�G�,d����7�\rrH��M8��[�\0�� �T���)Y�V�|ڟ�4��=�ɥ�y�\0>Z��}��H\\��������\Z�$VP5��=-�<QDFMԏ��s�q\'y��n��/��R�;��U>���1��|>Ӥ�n�z���P�|��u�S��sW�B\Z=�����+�]m��N��V�\'ޓ����Ē~��^W{n\"Rv�Ǡ���|_\"O�bpyV�A�+��>\Zh�	ѥ��	SN�l���%��-�+���e�~��1Z��ӿg?�W��C�Y�v�>�t?h�WR��O\0|��w-|	�jS��V��5�wy3�O4���F%���$׫���O��0:���M&�L\Zn�䶋?�v�,~���$�b���Z����O��į�GHR/5�����}d���1����	�cO�W�4��P�}3K����!�1ơT{���G��X��τ����[3��ۈ��y�浱8;����e��W݃�T�/j)1�G�H����������b���\0���Pw@�|O�]iz�����]!�k[���\"�k�����\0�r_���k���ر2?��$����21Ï�X��c_�R�ӱ�/�xOS��>��X\\���6�m��h�C�U�\"�}��_�>5�e�?���o�i��(�5�\n������\"���\0a��H��\0nܜ�]J��\0�iY�̏ǿ)����;�2=F١�7!��}G�~�M�\n��H�3ꚕ����M�����Ę��N�?��Pc���\Z,�����=�@����g���&�[&ѧ;d�|l|�q��<g�?�Z��=]o���6�g�t\nR���y>�rO��W����\0	.�x�]h��M���p���_����u���㻷u�7C�֝���	=̷��T���u5�\r��=.�Ky�|A������[�7@�LI|Õ�e?v.�O/�m��b|���|� ��45�f\Z-C_�\\�L:2 U�H<�	����UW$(U\0\00\0�K�Jj@-��E\0-���Q��v��z�(\0��߅�\0��\0Q@�@Q�4\0\Z)\r�h�4w�����@E\'j;P�E74��','2016-11-06 19:32:48','2016-11-06 19:39:21'),(2,2,'11127681432',NULL,'Monica','Rivera','675303127','BU','Araña De Duero','España','09400','Calle Pisuerga 3 3 Izq','����\0JFIF\0\0\0\0\0\0��\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v90), quality = 90\n��\0C\0\n\n\n\r\r��\0C		\r\r��\0\0�\0�\"\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0�R��P�I�Q@E%\0�R~TP�IHHQ�@�4\0�+�־#�Wá���E�ٰ�� ��9�+ϵ����Ƌ�b�g�d�cj��m���9�;���\Z�gjpo�3�(���[�\0�������N��7!\0��\r�5y.��\0��srZ��A�����I�K�\0A\\3�0�v濦��ax3:�G��(/�4�\r_�~��_|<�\0���5�Px�ö�[1�^hl���a��߃�}��h4u�jp�z|�o�ᑻ���Xz\rtQ�ү�6xٞE�e\r}n��٭c����CE%�x\"�IE\0-����9����P�W��d��|;𔵁�\0���W\"���#�#��\0s_(����\0�O��$h��X�����P�BW,��\"k��xSѽOk��11S~�_W�#�_|g�o�7���ۭ��\0˥��ϡU��+�|a�m����<�s��?�\Z���m���V��|/~���ҋ��&_6��TC��w����\Z�2�;�,�CZ�R~���\03sğ�ߏu�m�!��BN#��G�W�&��X����9�v�yw�����O��w.>hZa?�|7�c�$s������|\'x���-�j��0m�9�*r}�5�<D�}_�zT�eԚI��:�]KU!2�衰MeA���V�����%�\0y�_�g5͗�Y���Z�m�z|�}+�~��)��mk;��%�,2O�Q�����>�e���VV]���g�˰*�UMT��O�����ݒ�*���(�l��1��;��V9[ʅԌ��;���K�٣�z����e���\"�C���Rq�r���+��5(����O~�Ͷ�,/��u��s�3���W�\ZT!E�*c�LEo�T�\'.�g�>j���?kw\ZV�d�\Z��m�\'�����]����:��?G���+an��c���?�ǯ�u_�A�o�6V��0/���l+��$vb{�<Nc��[����	a򦍊29�R�y��:S���W��i�xldo�Qz��N���߉�7ſZ��,��O�kw#̶��7�#��G�������=��!���J�C�+o�@	#f~Y@��O��;��Q��;�\"�XdP�\"6U�����{	�X�]�?�<�Y&/�:Ӗ�~]���U�%���v�&-�I�\0.(�%\0�����i=�.��Z�X��g\0����?C�ګ�7���mߊ>>x��2���a\\�*Dv���\Z���\Z|�������t�h6�;H�ܣ�+19,[+��k��m/�����U��T�����ŕ�x��|�ޕBW�f��W�4�&���=Y���^Ӥ���a-����?�By���GUr���7o���g?��ou �������5Y�z�S�vHϞOv���I�wP��yA�}*���1#�a+1��ph���WT���f#�O\nO�U ��&������_��嶱exbp$���h����d{u��_�\'U�o�^��ޠO��{�+�oڶ��R�\0<��ci(7^\Z4Ϣ�V�2��h�xk�k�EWy�}J�/������`�������?ԯ㶐��ǰ�}Wi�q�\'�U��F�a�G=���V�q�>���L����.�1d�|�+��:�zsVJ]��Ymo�A��g�3\"�Œi7��+v,�\r��E?yz\\g���4�h����*���;��27�g�����>N1��e�!�W�6����8]�����$��Z�sNw���V��X��������z!�\\C2�n� �+�?����6�f���f��2ą�-l�1�\0�$2�Z���/Ø���`\r���O����N�8l~]?*�/�kƷ����]�7���is���/��?3\\8:Νu~�?���+���YD�5�=��������QE}y��-�%\0�~4Q@~3~����<u\'��t�+W��5���D65>�����jkq=�0�3���,c8�~l\0j���kk\"J��SMd�j�ۊV)0�B�c+�N*8���>��\0�q��\0����,4���=!��\0�_l��_�,��Oj��	���W��_��Ԇ}�2W�?�X�\0�fbr~S��|�;�S�\0�����;��q��\0g?؆��֒��ݸg���4IZM ��֬m.ca���?1������y|�������\04�Dho\Z�H�!�S�^���kcӬ��W}e��Iv���W��I���v����n�29�C�O��j�T�8��U�0z�9��2?\Z��C�\'��<�k��%`�J��y�M;���#%g�������� �)�Z��w�Ƚ7��	�\0�W̶>0���>So#b}���He#�\"��Q?��\0f�.�[u��F�v#%a���c�$Ӎ��Ae ���#b:�y��T9*�.�����U�#/Tg��x;�Z/���K�z�^#����@sk�`�\0�a��G#ּ��Y�[Z��v̶��h����tQ�\0|��V���.x)wG�V.�ձ5(,����\0�/dQEY�b����_�ϻ�����U��\0ѭ_�_�~&�sr�\0<Z޺���\0ȍN?�Ǟ�:�/֭�ҩJz�C$�!5]�\\T�T[}jJ\"�Q��~1QLeɬ�Ϫ?��\07�O	�ƨs�����j�<7)=\n���w�	�2[|^�ܳH\"�\'�$wv\0(9$�N+�h��U�N�q�h�Y�H�F�P�{de[<*�;>bm<��+B0t���ݗ����a ��N�j�n}�\r�\Z?���5���c��Wᗉ2.]����5u��D�^��4����_�-5���-�Y\\F�z)�]O������\0�P{%_�>�1��MaQO����\08�{s��&�\'�\Zd�i�\03�~�%�G�>(�������!�v��B+��Q�yh�v\'kg�=k��,\0<I<��	p�u��>b���^�K�;)�4l�9ڮy>�ּy+I��P�=(T�Kc�~L� �q�[@8,t����X��uk�|7wv������	^s^��\"L��5,��Q�.���_��y/��i��[M	_���)��q\\حc	z���	����b���\0��g�\0������&����˖M��?���j�?��\0����!\0�֮A�1��3_XW��5?#��#��ͱ����b�4qG�I]��Ҋ)(k�/�a����N��\0F5~���W���\0Gţ�T����q=�a��2��j��*�����ri���K!��ٽ�Jx�P�`��O-��+`����?�F��]񞟧Z\r�W��q����m U>��?\Z�ǖ���U�jv>]����wSĨ����>Z���nln9�r[��\0�i�#|k�?�ݩ���d���l/�����������; v�e��8�+�s,*�O�_�Z�vzy��G��g�a�U�~G[���g��oQ�c�MSVy�s�]U�ز��\0�+O��K�����!�m�����\0f�X�;C��H�#Q���@��J��\0ۘ#~Ϻ���7v�߯�T�<\'\'h�e��\0i��_����#\\��,�<�=����n��\0:�_���6�k{����ȱ�Xܜp@���-��a��Z-�l�t�	^9�x��\0I����X���o1^8�y��n��@��%��͟�R�U������Z�����#_�A�s�����\0ߦ?Ҹ!����q�\0O,q��,z?�ol�~�:��b����yL?��5Ҡ��>!���y���:(�A$W.#�P���yU�a���C������\0�<^��6�\0J�+��\'��g��1�a��G��A����}��?�S�\'�\0��U�!h�%�|���4RP�~6��^.#���_�5����4�O�a��.��kUGq=�n�U�j�쾢����t�*\0j��U�(�HEACs�A/S�qϭC7S�j�[�G�<�]~?��\0?��/�5���q M\r��ξ)�\0�f�|2XaJj[z�|��}��^1��\'�<�����\0\n_�=�\'��{��e�����Y����㟷��g�k;q%��mn��;do�����X���\0M��\0D%x\'�|�������5	uk�# $!H$w�?*�j�B�K�Sl��o�R�x���]��.�b��=(_�^M����M�����������4#������2��Ev�\'��P���|o���ry�漿�ZT�7�w梢�^wqҼ>v��v?Q�\Z\nS�5��u=/�;�?5�]�NЮ�-�~���;��{��s\\��Z��$��V;M{��o|\"���0ϧ.��i2��\0F/�^?�B�����@Q/��(9.�Ȩ�Xbojp_���d��\\n%�*�\0�b�����/��:��֯#h��.<蕆��]�H�a!�k�L�};O��t�k8R���5�b]�\Z(¨�\0\n�_SJ����0�������;oӲ�+�L�ii+S�^(�����L��o��N�ha��n�?�W�~I�ٿu�\Zu�d�ƛ�\\=����]d;�A�V$~ӳ��}��\'�$�OV���c��0$�ҨC^�֪��O4�*&�0�Gz�F�\'4��FM��w�2R�\0�2��SR8�����hΘ\' �+��\0�&u�C��n� [mBBުQ���_W~��+���6���w���r8�^c����T���~�3���-?�JW�?u����ױɾ�B������|���\r\"�¾�]j�?m�O�EѢiQ�%��Fϩ`{��\Z��M��������̺������`c��z��r�1��=n��ի�kE�����/���I&�T�2k�֭lSM��973|��\0��R�y2E1�7�O�|\n�O/�<Ee�ik(��u�?1�:�<�Ǡ��+ˊn����%��t�w���kx����2hZZ�Gw�MI��ա@q����/���s����b�#�k{�ԛ��,���l�s�\0�7���>!���t��=:A�/�ą�\0��ҿ�OO�!�L�l�J���G�?�MB^�����:����ᚸ�i*�9�/�\'��3G�E}I����E\0�Rb�P�/��\0�����;�\Zm��\0�ч�}FEt���iIY�6�����g���\0���B�?�5=\Z�	h�4��hn\"\'�760}1��<�󫿄�5r~��]Fs�-ݸ�G�ֿR>!�1���-�~#�R��|���e����9S������\0b_�5.u	��%�\0v6��\"��Āz�?�ן:Ua�&�}\ZXJQ�Y~�������mI��7�&F?v+�|���G�V=��a�-�M/T�5��\0���`���@�jk�V���U*�䲺�\n�0j���b�*(x�S����Y*��ҿ�;���{\\�5�s�v�K�k��w��9��#\\���c�1Z\\<��4�c�synѬc��e��5��~/��CY�ڜ\n6Żr�:���O�Z�����2]�TI�Brz�r�^�%���\'���9�*���:��mh�d���F�!���L�?��_V�������#���9�BФ���d�ɒc�{����z�\'R�C�$��a�v��0+���?xW�T2hVv���\r&�if`H�G\\`�s�\'���0���:������(�U���9U�I|+o-[�V}��\'�F�&��K)sx��P����!?V��E=����FWv�Չ�{�Խ7���{��R�Υ+O<���n��\0v\0\n˼��B���^�^j�r:p���F�鿛��vG==���Y�.ӌy\"&G��_�t����&��x�P@V��ⱍ��%?/V*�Bޕ�k�ө�)gl��G9\"5y���@�3�����<�G��g�:�!����A9�\0i�����9��S��	fUㆍ�\'yyEt���<�\rR]]{ے��#��JG�bI\'�5���:�?o��|?�O��<?k�a�����r�+��\0�8�H~&|P��;�\'K#P�,2���3����ҿRү*���>�/�����.T��OH{���+���{QI�j?\n���E����������b���\0���P��n���+�	�%�<F�v�v�?x�p{�����O�_<Q�Wk_��٠�����������;��a�\Z惧x�J�Mլ`�l\']��\\�{�XN���Fz�LƦܗ����j���m^xX�\0��*�HCu�ɐ��p�����+���ė>��:�Y��2}�\0�X8�Xחj��O_�o�x�E�_�7�*;p�޹���C�Y�z�[���h��z��\0��9��᷌���h��R{�\\�2۶�	ӂ:תx��,����=\n=MW-���7��I\r���7��x��*���t�ɾ��D@,ۈ��^u|,���=$���3�>���O���_U�5��F�g�����e���o��<T�}3P�R�Yh�m2LG_`2I���\'�o|���H�=���I�1���?^�������_���%Hmv6�x���A<g�ȩ�.������Sȱ���\r��^Ҿ�5��_��5�~xF=6�A7���\r���w���{��MJ��.�0E-����#�w�F8\0��im��c�Z�q$7Z��{&$V�y��������$�Q����)t?f�:��F	$pe �@�I�U\Z��D��_��}J�N�Ju$�^{.���_֬��\0ٳ�?���ʨ���:�˃�1�`�TS��\0z�)(��aӊ�vG��\'WZx����Rv����RQ@�(�i;P�=h\0QGo�\0QE�\n(�v��R��4�x�ᇄ<T�\r_�\ZN��}縳���\0���ּ�R��~j7��|;5�~�6��,g�,q�b���޲�*u>8��;���/	������N3����|+����;g�H˵�U����Ĺ��v����q���U��V�J�u*��O�m���E!�Ҩ�Z);Qڀ�)����','2016-11-06 19:42:56','2016-11-06 19:44:37'),(3,3,'11127681438',NULL,'Jhon Alexander','Rivera','675303127','BU','Araña De Duero','España','09400','Calle Pisuerga 3 3 Izq','�PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0�\0\0\0�\0\0\0=vԂ\0\0 \0IDATx��}{�]Gq�νw^\Z�F#?��[c<��\0���$�.��X�������,��sv!_B�B�o�!�	�G���ؘ,ƞk#ۑ�-�dI��y޹���qNwW��>�ܙ�4�UҝsNwuuuuuUu�y3�0��Ճ��\Z� =���M����\n�E�7�	G��\0Ne��\0�#�1\0Š1�00LD`T�T����f	<ɠ��x\'@O����\0le�#\0v�a���aE5ШW�8��p.���0J �c0��V1��aC���=D��>f�C����6lj8!,_x�*j��`��`¥\0. `���D��pHC�4\"�ʀ�T�{��&�[�����\"9$�E��<Q#����F]�Wi�=��Ɂ�����M\Z\0�0c7��M����M�(�C^���\"�Mf\\	�2��3�0Je/2�3.�(�!�]C��L��R�b���t���R�?2�k�ǳ�)�&3~@����k�a�ޥ��r�����Ƅ@�a��D�&fyr�9�༱+dۧ/+bq^H���D�d�o�f��6l~�M�^P�ʍ�(1���\0�嬜ϠZ��U��޵R6=����˪y��r�z��	6�4�����6�\'2�\Z��`4���!���F�CN���AZ@_�n��a�c=V����V���Sz?W10\0kɷT�ID�1����A[@��������+��DL����k���e���\0�Y>�����GJ\\vph*j���x\'�!_i��Ȍ�<9[�_5�,��N����Bv8Dy�m\Z�r�I�M3������Aڰ��@�e\r���6��\0�e��0l��o��\"Ґ��;R߂�g�䂿_g��_�T0i�e��aj�nOe���`�e\0L�\0������e����D=�[t=��/�tWhBΥK\"�B���{T]뉚��ql,���B�,iD�-a;����Ca�69�t�F}����4$;�S�C����$c|kz��4���d�\Z���@�F��r�izJ��I�9ڲ�\"��F\0g|���v�GvM�g����|��:��r��kQ\'6VA�>f�\0@Cy+�p��?O!bb��T�e��w�5�tB��E�a���@LE�J�mc`�d�І���ނe��<Q_O��0��L�E�X�PZ��N�q��ޭ{zU������ǌ1�H���!�\rĬ)���ZH����b�?���-ElX^��ؘ0�=`\\p���-e�*��ZF�e)�Aj\'��B:��-��)�[��m��CK�����k�?A�R�S��0I�����>�壨�@�)0o,r�~���;��L b���+��h��e�a,��nAE,��\"���Æ���Ɨe��ܨ�C�&�OR7%-g.����-�tKh����F�\n��0\\}��(S3��	by 0���dp�Lb�*Y��I�V��\0u�o���e����\n�;��t䦿�\nP�1�����r���B^������w\'�9��Y������镡+��/��k3��v�����=B�K���_�����4�o\r��\0�����z��߰������n>]z�!�aƇ���V�zpub�\0�\0�*7{���|�O�Ĭ�[9�tG-�����m1\04_zbd}w�}6M�n���Ū��v�?O�.M��L�m��Ax7�7͖�ؒW�F}�_!����p8Dd��[��@ߨ}`�Q?���\"�y��ð���w��\r4�iǁ���M�\Z����S��\0)�̈́p��q�<D��A����WZ�l��jWQ[C�w��^�<�����k.)�ڨ�e����~�Wv0c�_G������oQ\'�G1�w�)�AZ�8��O��F���]��U�F}���\"��l���9�Fq����������O�yC�nYF�Q�hv���)b��\"?(��\\,����Bc���-\r���Ol`�DtE�e�̀{�%\"��%��*Y����h3�\0�H6��cQ�����@9a��t/F%��eep{�MDW�p&6���_��:]�P��ҺMȋ�c��^�c��r�&�E�t٢ɼ�SR�e�����*]W���a�]?76��@_\08)���[���V����s[!+��a��w�cY^Cy!7�x4U[���9<]G�.����zmK��\\y/���o�\r�o�4vA���ڨ�� }3�ax��$��%��j�\\�>`����u/\n8w�hw��Ս/Gp�\r�	��cKEzi��1�)�O�oz�G�}k\"��lP�3H\'�&�y�n����4�q}���h嗰���Ĝ,|SQ@��cApE8$�p:�O�Q_[\"�J�xczT��Q����u��ݬ5��+�Kv$��s�G���~:?M�⛼�N7�\Zbm��P���UNN�7��=�F��Wԉ�z0����[e�MC$O�kں#��x��s]g!�ܢ�L�G����&��h ���>�l�Ӊ�9жn������ڤ˗�E�0�z4��:_��Nl���d�X�\Z�V�\r<�y��:����LeĎ\'�K�n��o���~z�-�8������W�>�Kf�������:���nϻ�g�tXc��B-�H��#<��Ή0�3��/��&�ST���f�>a�~�p��0�����9��.�	\Z^��\'��.��A�g��ϒc��ʙ\0�����[�ށ\n�o���\0�6�`74m��z2R�����j����oA���E�J�_\0��B*T�<ը��\0Cr�zˁ\0B�y60��:-F�\n�$��>�2ui�]�6��O����`������>\0@�ܴ�2������濃cy_��!��^���	y�8:�L8��7=�Ci��<QO\0�/&1Ɂ�j�o�8j��~2Z\Zߞ�KcI�]}�~��Hg�.����~3�|/Y�ɰu�o��	ִ\'@������\0&��p��*�:[��ɢ���i���H�m����	��\n�៻�\"�]X`��o�e��4��?�v2ώڬE&��J&6��3R^��GͳJ&��:!q��:�~��>k�l�����;˚�\Z�Sy�\r�N�߁�g(}����S��u��#[��̹�x~��U�UT��_�/�^�F�Uk�YȈ\rcV�����[�3����l�Jf�\0�@ϻV�kw�>LDק�D����\"��L2/;2e�l����<�ψ��MYɫ=���\\���w{r\Z�a �_ƯOݝ�g�h_]�*���Y�����P�	f��-�ZQO�9��dJ�d|��$�J\'�K+�d��ׇ��+*�ocr�C��>G��:BeC8)���Y%@\0��-��3�\03��Ar̳���?��柁Y���8��?�H\0޲��8��f6=C5�c�4lI��h��~���V9 [�\\��fQ���ͧ|Y��L8���E�Л�6�kx/���x\na@�	7���{Y�/�\']��sCV�+�y��v��pԹ�W��O6��Jk�L�Ң]2���dw2���Ē�ۊ�5��6Q�\r����������e�! {�&�<+_�^O4\ZB�\"\\���k@�^L�{zު7Ee|\0��4�0\n#Zf��rK?\n\'�����ҕy�;8Ɠl;���\"�>�s���Sv�gF����4�+x��-�?Z�%`\"T���\'�������+_�mգ�	a��\0��;J^R6���O��yy����Tʞ���#Xɘ�|\0=@��T�~:�+���4�F��@q5�!�N�7�/�+��HdX�p��ee�59��Y/�{�A�P����6o��V��LZ�Վŏ΀���8�,^>�\r�hC@-	�	Xy��\\�-����x�\'\0��y�/!/���x�t)//��Njԯ����%8�e���@~f-\Z:�o����F-]V*�^m0O�ʣt�AA/��)��I\Z�N�����!���јJ�`���98�:L���k��pgo��C`r�)+�����V���g�e��N���N�m��������m�*nH���\0~?�ws�s��w��rf������=7*݌*kx]On�C�I��݁���P�&���r�<�r��X���yN��v��}k��Vw�pBk�m�c�#�x���_����Δ����n�a��i�\n+����������!ȗ���9��\"�/E��Ό�0Q?1μ�R���׀h��\'����[491�e�\0P���[�\n#��*xi��i�q�H[Y��[��}�z��0ڙ���_Ԏ��Nk>�$����X�+;38���ȉ�Ts\08叀ʊ�< ���E��4�8��r�M\0\n�!�[��\0ה!�]Q�Q����G�6Թ�K���E�<�GJ�H�hˏIX~�Z������Z��g�,�����t��³�[�q�]��`��v�e��c�r+�`����~�;B3����*���\Z�M(-O0�NB�r�J�P}���D=��E	�5��訫[���ͼk��gsB��G�WN�~YFC/���y�}ȷ��	�;�K���HgƖm#�d2h9Y��g���`W�=r�TLDyB��c^�^���e��I�G̵M��N� C2�݁��]�~e�ۻ�^���z��p�]�l��_�R]^��`h��C�\'\0E��Ҽ�@���)���j���κ	M��m,:��9pf�稆9r�۱�$8�D̔\rnB�?���k*�:r��qs�/�X��m\nщ�����(�d�\0d� \n�V��7���,ϽJ\\��x�\'28��x�<Ԏ?*?���.lwi6J��g8��LJ�ܬh�[�&�ُ�+�)Im�鄬9�)P�2�C�SeC���CZ�̯)��c��ܲt��Egw�{.�n�Iw/h۟r&�mM�s���_�N�.<�0D��6W��m[S�*6�����ӚTM�}���ZO\0SI6�6��Ӻ1��[S��>��������6�K\ZB6 x3�,��\n������Qf~��m�L0�D�N�C\"�T�b�D��l,$ȹ�\0�]k׼:ɘ:�:ǋ�gx�(��7�$�t�o�k�Bg>�8�؛¬��qÝYۈ�+����љ�n��啁־�τ1��ۘkv�}-�йh��u��QZf^�L~O��_UT\"�	�����3�c$c��c�\\�>YgN��,�ʇ��눈�1ԤV!}1��ދ\n$`�T����dwp\\k�������>���ۘ��ÂF��=�(�ӏg�,�~̪�\"о�-��\00LD�+w��+��\"�CC1�:�Ȃ1������3;F�\n�j���m\n�B������l�?WF�l2cmk�5>�������#�c���\n��X�1��W���\"mcj�M��A�c�1k��9�C�<X���>ا�t.aEm��|Y�b��KЧ�c�ȿ��CtC|���rk�P���xN]3!]vz��������n�V;\n�I��{��6�!�o; ��q�X����(�iF����/a~w�O��d�����<�m�ޟ�|I�/�^d���E����)(;�z)���.9�qeŰ��b�K�֎�y�O��&*���${=ܙ��3[.~�\n�8��SL`4wM���^���S񖴧1���`f�-~s��^�*���XJ�}\0^�+*��P�Z����wA�w(@�����������\'���}x��K�r��M݋��Ƹ`�ʋ�W30\"�߳���0��ǼP�=��[o�s?�O�y�;��M1i��������c9�^^Q�>�H���e�l9���5!�V�+C�l��|����7F7Z��@�s�	[���x��®�\\8�s[���\Z���D�ʳ�gQ�{gz\0ZTŭC��h�k�y�=s:��l�܎;0��W��=?�����<9Y�>(��R��q\Z��7Y�\r\0�8��)B��So޹=��el���\n?g�ȅr��B�98��8*�zj������sf�bu�<M����1G5����8�4y����1�=�r��x\Z�Ƌ���.f\rcX�L\\c@�1fl��yEe\\#&c��)�R��+^\'C*�_���u��d�	�e���+:.���:4Q\0����N�{DwUW��x����p������	�����f�09��l3UV#���)�\Z��7�����ƈ�7B�q�R)�o�:Cs4}o��Kw ���e�׫�z<��������~4����m�sOؒ?8w�T�b�:�Ιۆ*�\'H8e5r�\r�����,3��Ku����z��.(��D\n���,����tK���^x.;\r�u�8���؛�=�\0��Ý��ׇ/�ON_\0g��e5`�j/֩.p�W�����\0�:u��VN��^�<�0�]4���k%b��%�pc|�<nl�k{s&��׆_iK��L�m�߆*�R)����C\'�X.8˚��;8(�)�)	a�g�$���S+��m%���-�cq-�3=�\\����^�sXqy��/���E�Gm�}�\'��Qi\0x��Ӹr��.���Ixo�YF`�5���E�z!@Dބ�3�>7�� ��]�b�4B4���Ƣ�<���ճ��I���	lI��D���W�����z\0�m}nOԎ��g�-Cu09��\0}�B��\\K\n���\'�Fs�-����������Ml�~�����q�l��H�U���B,2����~��/H�ީ4OU|v�r<]qOa��ډ�f������	�Td�JJz��33)��2�**7�	�=m�6����a�D���9�]%]��������uՂ�;/�f[�Ƴߎv<N�<j�p�\0/�<�ƫ�� >5�+x.)�� @�ER7VY��5�,\\�J�zL����	1�\"`4U-�����b�%%�N,D��6���B�)Na���O���ċ��o�>1~��\0.o?d��U���^-��{�\r�&�#��z��\0ez6��G�(�c���N7�09�c�뺃j:S��l�n£�n=��@^�ˆ���$y�|~��)����0���xm�a��9��|J�������	Oy\n�~���o7�[�r�-}�׬�y��SS�\"o��صI����2f�dr�\"�7\"D[�MW�������&� i�k/���ї_����ճ[P��ƊR1�����K;S��\0ӏ]\Z��`)�y25!�yG���9�T\'x��\'�\Z@����U@�Q]z�S��a�T[�b��<͇�)�td7>rG-��pJmS�6f�TY$3*���rc8���`Y�3X%\Z�)kL�2	pp�9�~���i�QE���X��k:�����P(T>����j��b����$SF�*�T�(���r���D���0��&�V��H�&�k���%������Q����\\�Zx=P1����pު3����\r�e3��*?�c�A��zU��b?-UHZ��\\vl�t�TV��թ����%௩H�\n�Nt٤\Z�)S��$��!,�}@�`ɾ5z�� /���s�\\?�6��,�Y����pT����*���K�K/S*X|K�R)z�w���q�wL����S����_.28�\0�]��Lc��f��+O1w\Z��2�G��z�Z�=�W�P�<LS޼u�x� �`�(�S>7@������I��Jv�`QHZ���|a�y��\'�$��Rd0�q��0��2���)_Ec����fgY��oYC*�^������=Q���PH����J�:���	�g�$\r=�q8��)��#^�YXGe�r�ҡ��T�w�)ܲO��[��l���dy�(�R�W��GZV7h]\0d��S�Q�\\�X\"3�{ȍ����d������.D���`�k	�=�4��*���	���l\"�,\0g��jF���l �u�.ee��K�_nV��)��a�\09z��{s�&�d�r7�����+b�q�̚�2Z�~��?#km���də,3�5��(+gu�Gv�}�)��T��Myx�)��#K���	��uZ���k{#����?b�<��)\0�y\'U�H��V�@D�Eg�5��\\9幙9g�嵽#_���{7ư��哥�P$0ɵBYo���Χ䗮lpe�\"2m1\\)����\"�0`f�m-$���w����<��0���V訰�N�KwOFdt�0����k�<	I��1+�����xQ�\0�Nު\0P\r1�F���F��_�I�GZ!*���c��Ɩ�����z.�¹1�x�Nv��a.��ڑ���w�,y�*T��vJ�)LX~N��L�	S�	i�Q@)�Lyrma��F�\0\0 \0IDAT.ˏ��b�Ĭ�}e�A+s��!o*v�lg�3#��4N���oA?��Wt�TV2$ԐE=&�f8�9���2ʻ�ᔛ����-s�����ǋ��˳�ᬺUֹ��<g�ݹ�Pq\Z��0r�ǋ�A�j�	���v�Q2��[��99�����̸�s�B.�U�Q�۠��}KwJ�y����7\0�ہ��}����E�����\r1���HS��)N9-��n3���~:�ϥ/J�\"W<�\Zj���� Y��B8=�Ĺ�[��}<�U.뷖�~݅�I��S��jJO�s��`Z�\r7_	�~����\"���H�n��?��ң֍�y&�;����Z��%��io�&���yp���O�\"5;#7�X�\'�ҕ��+��Գ��ё��&y�O��c˘0D83�%��[�6[~�ņ�\\��z�m~@Kԝ5�MZ��\nfHI0�cC���L�x�ɳ�$�^�\Z+!7�l�)�oU͸!H��<�,��a�/ۧ��s����!۪���\0��%�R��#��P=<1�e���_V�G�/+��f\r	Y��J��<S�y�k�2|Z�=��iƬ�hҜ��XW��<�6�^^���J��,���o�\\��K�(B�v����*���u���$�\\s�O�y���g��`d!��%�+��nu­�z1��wA\ndk�����k�g4]��cA[�/O�c�n:J*k�<%�̚���:��`R;˔m��J�C__p\07�= o\0x\n-\Z˜/빟�V�A�4$`Y��	U��)w����\n�J��,k�ȦQ�n�eic��}��ꯑ�3�Rt�>�4v���!���Y���L7�m~���c��?SH\\��FEC�����׀�z��R$zh=�	A�%jp\\�l��#bX�XBABJ$y�NF�g!���v�&K87�3�o�\n\Z�YraF:\"� ����va��j�ve�ƭ�V]4��w�?l�U~>3����ŨĻ�(w�a��e1w@��]�)�ri��R\r�՗E6ts_�1��3���KJ��9��$����	�oR%��T{m�CY�\r�v�����VT�i��4����N*]Zr�b��>ڐ��#�usc��.X��\Z��nCU�=E;8��qIdM�s�{\na�%3��aC��Ic#�>���ط��r�����gW�ܦ#��L\\i�LTj;!��xM�KnyB�m���qy��vOR����8<w)c�p5PfY	��DR���xłȴ��\'��D�.������Ajw�r�-���W��bF>���0-�gcBInYKeL[��L��q{���� 7������p���}��\\���\0t�i�t�l,)���2=B�7�����/H��Й@RX�*�:�ՠU�e���݇��v�!�K�YR�t��J��\0���Fa|e}ڔ���<a���o�H��[�����G��)�Ӭb�SP�3�笲Sco|\"�I��ύ��1������S@���Ӭ[K���\'%��TK.\'_��~�����Ź���iMa��O�f�\n<⢀L𳜦Ͳ����k�U�=���\nD]�Ƭ��i� ��u����	���bY{~�[�˞nd�S\0i�!|V�X8�]�r���怼z�>�4$���֛�mPǺ�y3ۤ��Yxd�5�V��w�⨡=����0ZSە��7���r�$���h��*O�a��D��b`�ɿ�+*��M�Dcl����,vRDe�R~#C;�tS8(ӹ�E)G�^6���ԺƦ}ƚ)>ºk�����3�r�Й��6p�\0J��P�A{�i�={\'f���I�?!�ɳ�V>j�ė�A��mykF]��;��u�[�$խ��**3��E\'��M�����ʊgV�^9+���ͭY\n�6�t�����N�/���Vfl]O���\\�h�g%#x*+y��ŗ1ӌ5��<��6&vJ3^i��,��2���p��t͔{�b�{9��^ŀH��7��ɳ�J���C���f�pOY	R�|�i�(B�z#�\Z\"9/��e,��o�ԁ�h�ZF�Æ�g�k-p�����p��&毌zYe0�ͳ�3�u����\Z|�c�W�8�]������@�I��E��!�Y���~�^3�۫V女w㇜�|�|�ty�RH߄BY���a���N�ڢI�ۅϡ�\n��B����%�!�&Y����K��s��2�sJ:���y��z�my�g�n�~��}>&63��\\���e����އZ|t���K7���r�T�K\Z�s!� Ⱥa�ᬭޫhr璾��5��u�X���gں]!e���\Z�\"rM��SV��\'��<]���tO��k)h9�ٹ8�����8\n��oU!+GTǀ�끾c�u��Q]?0����{�@����S��_�i�V��\'/	�4uX�4D�@�=����}\'�g\\��U&a��\0��X�g�m$ʧ�6T�A]���ڷ�.\0�����JB��Я���T���6�;����sh�<c���A\'r� O�#��u��w�L�\\?3�Gv#@>�N��ߡ����ڎ�]�0yi(�etq,Y]&0rp�_�Z%�.���tK�	�F3�4�ZB�J�?XVD�>.�*�;�b���1��}�ɧ��q3ו�7/H&�}+�ٞ�҆M-��&0&M��{	�<�#ǎI!YV�X�*�p�o�Ȩ�88�Z�2�5�\rs]ViC�Q&M+]w��c%�E�m�\r�������\n���~�F�L�M�\"���Q��ο�w\r���5���������+S�T�f�u�`�[g��3��\Zp��ԗSPG\'��_�(xh7����׋7�)��OP~`��DD@҇�^��\'�7��N	�K�k\r�?k윢ѭŻ��42�Jm����,]�\'��\0�^�M�a�&�ux�2�,tY�� \r)��@�ŔۜW��C�Q���Ҽ��΋򴺇V4��I��-�����\'\0w`���n`5S7,�]9���a\0�/��F��.q\\n,�(D�)Nh�#�����A�mUf@8Ee��!\Z+x�is.\r�����ўZ��]����m�����[	xK�|�6?�;�����Sl\r{u�KE�\Z��-��R�������H:��g6@�>w|&?��ƦN}]\Z�f�{��˸p�P�y���*��)�\r������T<I�ʏ��@@_n��)�N��\0;ݷ��<\rO=�,��Owb���\n��?N8�X��e�`�������V?zvۧ[��#�q�@xm��o�7М�tp�y�J����?�6O\r\n��,dś�������\'��!¯.��E�9� ����C[��$fg�Л�b�Ze����裎�_\\�>�ݿ^`�d����X6��k���G�������_�۞S�D��\n\ZZ鷆��uۿ�+��W�,#F;�Nn]�K��u!��$nE]|��clAřq��7cvf.�(3���`�JD�;�\"��N��؉�_�G��o\0̴[����j���y��0�9a��\0ܹ�	���[��5oq��\n�p�)x�/���V�����9��)�m���/��e�-����	\"\0<�s�Wo�����l��q]f܇-iT�9Ve0FM���@��O�	����xx�/�+ ����[~�^����m�=���m�m�v윟��֬����N|�ɟ\0�;������^���n|�~<>�ϫ�����>#_��`�Ÿs眽��X��(���9�L�I�+�MW�W|5�W�\r���F7���:�/�@��vLB����\\�u:���l�D�����J�����<��X��������w����?\'���#V������^t�&�Er)S�(�ƪW}nO\'��)�P��\n�j5�]v��4vi�y_$?T>7�}M~��\"��G=�������$8�o(��@�*6<0p�@%j���A�*�c��`V���%Q��my�0��Z����U?��� �T?]�J�}r�|;�a]�Ƽ!���P�~i�;�y�:�ݸ߯S.�z���ʇ�Zay`�����e�O��VL�{\'G�\r�����B	����g�L�}��B�+�N}C^�S��8{������ƚ�\n.>�M��տ��v�݂��\rᙿ�k�����:�����Wʘ��|��(y��?�ۍ�x�;2Q�>^��ɡ�.���Rp����ݸ�/>�\'��aG�\\jN�K,��Ҥ����T��u����/�����h��aO���>�����\rV𾗎�ᚇ�?�tn�`:�u�@�2�Ϳ��renc�?e��|$�ҥ[$�����z\\�f\0I��Gk.��G��]BQ7���(@���+BSB�aLQU^dy\n\0�M�Ӹ���]jaA�$8鄵x��3�$�\"��fƣS-<1��X_�3Gj�&a���4����,��Ӂ���;PnyJ>r��й�~��\0���V�����n�wWT\0h��\'����_k?��5�	tD�\"�0t��[������-�D��4���V��ᥴ��&��\'�\\��k��W�0��`�z�a�U�ő��|�˞S�<�gʰw��}ܚI\'6�a�O��^F)�	�zֺ���ʤ}m�$B3�~���6lzD����Vkdf(��HH ��4[��n/��aXhO=��=5Sd7��/��e��ru�ؕ2�f����W_��me��!��?h��L����a�.4���9X���;sw�e��SL��gG]�g�>����L�.�_yE߼��j/�Ͻ(��8\'	��l�v}ܚ,��aXt��a��[3��V��W��]�ܼ�d��ezƵ�e9�g[��AT�i�%_|�,�==o��$�U�l֧��1�)p{�s�\'�������i���}t��RoQ��>�:��߁��f�E�^��ΰ�X5�0��k�R8�kT����6��^x�i=��7?	�9>5���,����Qx\0�s�OE�U�L ����\":�<E���Q�L�ٮ\"^��~s���ʹ��Y���\r�\\,��F�\r��I�V_���J5�P�Yh��0�8޵F�,ݽ�����3|.p������۳M��w)-��\'�[�:�Bg�YL=|���r��\'�\'fq�\Z|z�60��U�T�fQnA��������Ɨ+�5��E��58����Vz�\0f�̯؀��sP<��X{n�=�4�wߋ殻\0�o�� �uQZ�,�`\0U��Ú�l�|��/�8L_�w@��g�_Z�3��s��n�r���\n��Z��S���\Z���\0�W�p��\Z�����.�i�u>\\;H���������v�#�w�2b�r��f1�������.��������ky�[\n���7t�s��YT\0���uĸ�!e��?P���#��Q����fS3��-n(Ƒ\\���v���d��lGŰ\"YvwINj\"qr>���ʃݤ-���9<��T�]��[��g���7�i|� � �S��{0�đ�t�\0���a�/��Y�7�2+�`Q�>�����T���$��賭/M#A+O��σ�W^Ⱥ���n\0�k���]{Uf�$xb�F�&)oˎ�ɓ�-TI���~F�#D�[�|A� 3U��nxVUuFv��d�;@3J5�;h�9�yJC�¸��\Zl����ry*M��o(�%w���r1<.��[h�׃�c��_�b\n�ÛF��j\Z/y�rn�E�A�+�	���I3a���Y9yc����I��6[��B���p����sJ)�9�MWm��\n2e��2ȎMׄ섳P%k��P\n��5M\\�[;\\��7q\r����wOɜd:�\r�r쒛����\n��/m|�_k��;a�!�y�cv�s_��EO[we΍�8�3n	��pYʔ����^u��Ⱥ0��gT3�����)/a����{�&=\'˟�c��41�m���9�\'+;��P�{���(B��8	���a�Ė9%�?^���t��o�p9�K�����𗻀�_�_���b�(�aI���x�+�&��k�C�.\nog�U��7������Ż~�\0�1��\Z�S�SF���-Nc�7[�}S-�ɢL��n,�/ep�-4�[�q�T���:���<���{���%������^��]�cV�NQ�Q?�w\0�ū��\0�����$��BY�(��S\"����r�]��_7�[z,?4��t��3�k���E�R6�r�\0B2�T/{��Kv���>;1��^\"�D����s���pF��r}5�ȊtRE*;\']a3Ր���N�����)�;�}�}�\Zw�Y�s����p>���w����K�<xx�wC�f�����B��NeC����R*)�Ԋ\n\0�n�C9?\"�ײw����j��N2���>ټ���+%���!&,�r�\r����O�d��+\'�\'�\Z9\Z�9e���ΘI�:�,�m�0b3�OV��1?Jy�n,q_�q2u��)�W�K\'(����|��-�n�_>+B���S|U�0� ��R��{u�	J��]����\"��9g��t̱cW��7d����i�Ξg�z�ЫY~y�k�6\"�\r�G�i/���7��\rJ�_�\r��I����Q%4���&�W,5���ʺ�뾒�E�X��_L@I�Z��7������B�b���y.�Ԍ|O�z?�n�U�E�\'I�TR����rf1�wʊ��|W�J�Fi��.�RR���|�E����g��_D�\r���\0�[7l �J\"��&�1$i_��5�6-�Xk���˦�����\Z`�i�8�$��G��M��e�ٺ�&�˙�x�k���mr�PdPR�R���a*)��-����k�=\0�7��5!��\\̷:�0���b>������u�<���K̆dL\\%�RO��%��*���W_r�~\\����c��\'	�:ߟ����u׾1��v#h�jIjY�PI� \0��D��}�b����E��\'�6E�<�)_ ��Ѕ��R8 J\n(E2e����5�ͅ�D%��O)م�Y�.��6u�^c{���>��P�lW�&52ds�����[R�C���6r��Kn>`/^80�_Bc�3�BD=�������훊�+���@�w@�*�U�F~kǤ\Z�E50�y/������0G.9<72㿯�`劢�a�Oa�~;6#L��d���b�H7��/VF�f�/W�W���S����M��x����˧�%<+��Z��Cae�_�+�E61�U=��i.��u�;�g�=�P�����+G/��~Y\'���+�opy7^�^Y��;|��5;�7}���|���J��y͗�|[�\'.��\07���	��Aȗ�=s�<�Ҙkv09�Z�ezaC����Iu��^�Ń��������{~%���*qpd�e\\�ߗ`x�\Z[a��钶?�dtx�_��:9()�L\00�y7�~�W��Mv��y���>�p�R�룑٢�������Vw�u�4%���o�o^}�g��祀e��sШ��\0��zvpCI�j1�A�L$��w�]�E?�԰|,���M[�����f�f�*U\"2�u_|5�0�,%}���p9*)�\\-�\0n���$v��XI��1�*a.�)��9w�~ы\r���-���cv���\'����^����@��h|Ӄ�\n�W����}y�{	T7�0��V�)�����^\\N�\\ѹL�������m6Ħc��U�;�I���o�1�]�J\nUOԇ��Z���/�(a�\n��a�����71:�B����.W#MSR�D�7��/���W?L8���D}-\0� ,�3�l��\r(�ėJ/��@I���c����.84�@�~*���*p��ݦ��9#]~mΧ��:$��I�G��u6���w�����ʿ\r�GN\0M����������ߙ����VT�����ž0h����-��yV�\Zs���������g9��T�DR�1�����ş�V������\Zh�G��� \\M��CáE,ۓ>j���`�~?Z<��^>V�ֵ2�<BT�T�7r��?�l�/,E5Ш\'\0^��\0�f��V;q\'��Q�<���\0�h��oa.��H�p�qBQ��GӠ�?P��ӕ���^��/�����\n�#D�\0�d�ˈ�gV�ʲ�X���Y�@���c��Є��E-Pr;Q�I�꯭~է^0�3/xE��Q�z0�Ȅ+�J�O�B&ս���Bi�M�.�㚁�Y�=��(�~3�����o�٥�/xq)��F���\r����F�U�+kt!H�\0\0\0IDAT�Y����~�lLd�YyG7��]��vJ��W<�U��Us�Dp(��WQp�^%��\0]��sAtv��Y�o�5�\"�jaPA���4�6�0@�$@[\0���rU��o�y}Q*��ÊZ�dos�����3�i���9��n$ǀ�#�����N��ƕQ��\0��w��{��Ӡ�pg;��Jj[���G���_�7��r�Ê�h������܍��.�3��>�Ge`\r*}c���J�8���᐀��O�t��W�\0\0\0\0IEND�B`�','2016-11-10 04:20:59','2016-11-10 22:40:15');
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES (1,'alex.rivera.ws@gmail.com','$2y$10$tEnwYFHG3JmqXEDSfDtEKOblslP.3LTwOjZd38gB2lTY4si824Z.a',NULL,1,0,NULL,NULL,'2016-12-10 07:49:23','$2y$10$6clMEZKKcZ97ipvI9Nd4yOTjqBoFqE6/SZsiFdEp018D7YYaMl2uC',NULL,0,'2016-11-06 19:32:48','2016-12-10 07:49:23'),(2,'wsalexws@gmail.com','$2y$10$tEnwYFHG3JmqXEDSfDtEKOblslP.3LTwOjZd38gB2lTY4si824Z.a','{\"_member\":1}',1,0,NULL,NULL,'2016-12-11 06:35:34','$2y$10$jcLI2D0EzFY7BSDK8DyYRu9nwNUmNNaUvne5vfZLZi98xZJkdGDLu',NULL,0,'2016-11-06 19:42:56','2016-12-11 06:35:34'),(3,'anita@gmail.com','$2y$10$7SsDqayTLtYgMd1lioWUHeYDb08FGNpEKmIy2JYrd5WOLCH8o5p7m','{\"_member\":1}',1,0,'Uc8hhzjGBfkxAyk5DR4MfhowceUSVnA9VLbviYJ8LW',NULL,'2016-11-15 05:05:46','$2y$10$er/25pnkZU28.A72ZQAl8uOJYoJS7TlMC9yBtDATtelOuSMJNQwPe',NULL,0,'2016-11-10 04:20:59','2016-11-15 05:05:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_devices_connections`
--

DROP TABLE IF EXISTS `users_devices_connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_devices_connections` (
  `id_device` int(11) NOT NULL AUTO_INCREMENT,
  `id_fb_user` varchar(250) NOT NULL,
  `gw_address` varchar(250) NOT NULL,
  `gw_port` varchar(10) NOT NULL,
  `gw_id` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `mac` varchar(50) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_device`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_devices_connections`
--

LOCK TABLES `users_devices_connections` WRITE;
/*!40000 ALTER TABLE `users_devices_connections` DISABLE KEYS */;
INSERT INTO `users_devices_connections` (`id_device`, `id_fb_user`, `gw_address`, `gw_port`, `gw_id`, `ip`, `mac`, `platform`, `date`) VALUES (1,'3412492687','10.0.0.1','2060','F4F26DF4ADA6','10.0.0.148','58:7f:66:e2:b0:6c','instagram','2016-12-09 06:56:25'),(2,'3412492687','10.0.0.1','2060','F4F26DF4ADA6','10.0.0.148','58:7f:66:e2:b0:6c','instagram','2016-12-09 08:38:48'),(3,'381358448878489','10.0.0.1','2060','F4F26DF4ADA6','10.0.0.160','24:df:6a:d8:45:16','facebook','2016-12-09 11:23:58'),(4,'10154208364573131','10.0.0.3','2060','F4F26DF4ADA6','10.0.0.176','4c:66:41:8b:bf:a0','facebook','2016-12-10 10:35:42');
/*!40000 ALTER TABLE `users_devices_connections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES (1,1),(2,4),(3,4);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'rocksc5_wifisocial'
--

--
-- Dumping routines for database 'rocksc5_wifisocial'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-13 12:21:24
