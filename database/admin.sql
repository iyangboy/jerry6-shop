-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for osx10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: jerry6-shop
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'控制台','fa-bar-chart','/',NULL,NULL,'2019-11-12 04:34:26'),(2,0,9,'系统管理','fa-tasks',NULL,NULL,NULL,'2019-12-25 09:13:56'),(3,2,10,'管理员','fa-users','auth/users',NULL,NULL,'2019-12-25 09:13:56'),(4,2,11,'角色','fa-user','auth/roles',NULL,NULL,'2019-12-25 09:13:56'),(5,2,12,'权限','fa-ban','auth/permissions',NULL,NULL,'2019-12-25 09:13:56'),(6,2,13,'菜单','fa-bars','auth/menu',NULL,NULL,'2019-12-25 09:13:56'),(7,2,14,'操作日志','fa-history','auth/logs',NULL,NULL,'2019-12-25 09:13:56'),(8,0,2,'用户管理','fa-user','/',NULL,'2019-11-12 04:48:27','2019-11-12 04:49:37'),(9,8,3,'用户列表','fa-users','/users',NULL,'2019-11-12 04:48:47','2019-11-12 04:49:37'),(10,0,5,'商品管理','fa-cubes','/',NULL,'2019-11-12 09:08:27','2019-12-25 09:13:56'),(11,10,6,'商品列表','fa-cubes','/products',NULL,'2019-11-12 09:08:52','2019-12-25 09:13:56'),(12,0,7,'订单管理','fa-rmb','/orders',NULL,'2019-12-24 06:57:34','2019-12-25 09:13:56'),(13,0,8,'优惠券管理','fa-tags','/coupon_codes',NULL,'2019-12-25 01:36:02','2019-12-25 09:13:56'),(14,0,4,'商品分类管理','fa-bars','/categories',NULL,'2019-12-25 09:13:40','2019-12-25 09:13:56');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','','/users*','2019-11-12 08:52:06','2019-11-12 08:52:06'),(7,'商品管理','products','','/products*','2019-12-25 06:26:26','2019-12-25 06:26:26'),(8,'优惠券管理','coupon_codes','','/coupon_codes*','2019-12-25 06:27:10','2019-12-25 06:27:10'),(9,'订单管理','orders','','/orders*','2019-12-25 06:27:44','2019-12-25 06:27:44');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(2,6,NULL,NULL),(3,2,NULL,NULL),(3,3,NULL,NULL),(3,4,NULL,NULL),(3,6,NULL,NULL),(3,7,NULL,NULL),(3,8,NULL,NULL),(3,9,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(3,3,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-11-12 04:22:19','2019-11-12 04:22:19'),(2,'测试','test','2019-11-12 08:52:43','2019-11-12 08:52:43'),(3,'运营','operator','2019-12-25 06:28:46','2019-12-25 06:28:46');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$z05bekBGwLjL7i0gXh68U.Q.4VqdKVP/3Gk2dtvxe4Yh8PylINJ9a','Administrator',NULL,'ZNDfWQfJirsHboYIg8hkjgYR8hTR5dwSNEnSAYmhc6pvmwOIVnIIv1v5qCBY','2019-11-12 04:22:19','2019-11-12 04:22:19'),(2,'test','$2y$10$T66es1uxdwvBkszIeSKxOezA3BB563U9mhldTsMKcF0bWQvf2KECK','测试',NULL,'UmKmmv7bzC8LNuVVJalbux5N6crUDsNyQoGJ92LICSmPCyqjHmLshSXG0ZX4','2019-11-12 08:53:08','2019-11-12 08:53:08'),(3,'operator','$2y$10$KDd697s4U/LXpMlfoS5f4u7q2WIfS67ecdTrX9N1O95Cqad/OfGIK','运营','images/92a4fe51dba5f951dacc16cb8e9883c8.png','0bZGp2WrnXmV3xfgxTEPFGxMpDdJdcLUUT2Y4ZXH7bcMeLIfxnBMVZDgjXG1','2019-12-25 06:29:24','2019-12-25 06:29:24');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-25 17:17:35
