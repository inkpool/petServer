-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: petServer
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu1

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('4ca2a39f936926d8ef44bb6db7d3f1d0','115.159.22.52','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0',1421830956,''),('acc2556b6eadbeca4b9fef1fe1f240b2','202.120.40.70','0',1421829778,''),('f47155fe2962a8d01142653e32b9d415','202.120.40.100','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.99 Safari/537.36',1421845143,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,116.331398,39.897445),(2,116.331398,39.897445),(3,116.331398,39.897445),(4,116.331398,39.897445),(5,116.331398,39.897445),(6,116.331398,39.897445),(7,116.331398,39.897445),(8,116.331398,39.897445),(9,116.331398,39.897445),(10,116.331398,39.897445),(11,116.331398,39.897445),(12,116.331398,39.897445),(13,116.331398,39.897445),(14,116.331398,39.897445),(15,116.331398,39.897445),(16,116.331398,39.897445),(17,116.331398,39.897445),(18,116.331398,39.897445),(19,116.331398,39.897445),(20,116.331398,39.897445),(21,116.331398,39.897445),(22,116.331398,39.897445),(23,116.331398,39.897445),(24,116.331398,39.897445),(25,116.331398,39.897445),(26,116.331398,39.897445),(27,116.331398,39.897445),(28,116.331398,39.897445),(29,116.331398,39.897445),(30,116.331398,39.897445);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_comments`
--

DROP TABLE IF EXISTS `my_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_comments`
--

LOCK TABLES `my_comments` WRITE;
/*!40000 ALTER TABLE `my_comments` DISABLE KEYS */;
INSERT INTO `my_comments` VALUES (1,8,4,'这是我的键盘',1421477054);
/*!40000 ALTER TABLE `my_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_follows`
--

DROP TABLE IF EXISTS `my_follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_follows`
--

LOCK TABLES `my_follows` WRITE;
/*!40000 ALTER TABLE `my_follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_likes`
--

DROP TABLE IF EXISTS `my_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `lover_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_likes`
--

LOCK TABLES `my_likes` WRITE;
/*!40000 ALTER TABLE `my_likes` DISABLE KEYS */;
INSERT INTO `my_likes` VALUES (1,8,4);
/*!40000 ALTER TABLE `my_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_locations`
--

DROP TABLE IF EXISTS `my_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imei` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  `battery` int(11) NOT NULL,
  `location_type` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_locations`
--

LOCK TABLES `my_locations` WRITE;
/*!40000 ALTER TABLE `my_locations` DISABLE KEYS */;
INSERT INTO `my_locations` VALUES (1,'862950021595148',2014,21,0,31.170316,121.392463),(2,'862950021595148',2014,21,1,31.171316,121.392463);
/*!40000 ALTER TABLE `my_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_pets`
--

DROP TABLE IF EXISTS `my_pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `sex` int(11) NOT NULL,
  `info` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_pets`
--

LOCK TABLES `my_pets` WRITE;
/*!40000 ALTER TABLE `my_pets` DISABLE KEYS */;
INSERT INTO `my_pets` VALUES (1,4,'大黄',1,'德国牧羊犬');
/*!40000 ALTER TABLE `my_pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_posts`
--

DROP TABLE IF EXISTS `my_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_posts` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `pet_id` int(11) NOT NULL,
  `location_x` double NOT NULL,
  `location_y` double NOT NULL,
  `post_time` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_posts`
--

LOCK TABLES `my_posts` WRITE;
/*!40000 ALTER TABLE `my_posts` DISABLE KEYS */;
INSERT INTO `my_posts` VALUES (8,4,'JPEG_20150117_132703_786664578.jpg','hehehe',1,116.331398,33.4556,1421472317),(9,4,'JPEG_20150119_211322_-1073339625.jpg','嘻嘻',1,0,0,1421673092),(10,4,'JPEG_20150119_211722_-1073339625.jpg','好电脑！',1,0,0,1421673337),(11,4,'JPEG_20150119_211948_786664578.jpg','哈哈',1,0,0,1421673488),(12,4,'JPEG_20150120_165300_-1073339625.jpg','嘎嘎噶',1,0,0,1421743885);
/*!40000 ALTER TABLE `my_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_users`
--

DROP TABLE IF EXISTS `my_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_users` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `email` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `add_time` int(11) NOT NULL COMMENT '注册时间',
  `user_name` text CHARACTER SET utf8 NOT NULL,
  `user_location` text CHARACTER SET utf8 NOT NULL,
  `sex` int(11) NOT NULL,
  `avatar` text CHARACTER SET utf8 NOT NULL,
  `intro` text CHARACTER SET ucs2 NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_users`
--

LOCK TABLES `my_users` WRITE;
/*!40000 ALTER TABLE `my_users` DISABLE KEYS */;
INSERT INTO `my_users` VALUES (1,'test@qq.com','e1adc3949ba59abbe56e057f2f883e',1418111977,'','',0,'',''),(2,'test2','123',1418113650,'','',0,'',''),(3,'test1','123456',1418120644,'','',0,'',''),(4,'jaycelq@gmail.com','e1adc3949ba59abbe56e057f2f883e',1418218757,'李强','上海市 闵行区',0,'lq.jpg','蛋疼'),(5,'123@123.com','e1adc3949ba59abbe56e057f2f883e',1418219714,'','',0,'',''),(6,'1234@123.com','e1adc3949ba59abbe56e057f2f883e',1418220091,'','',0,'',''),(7,'jaycelq11@gmail.com','e1adc3949ba59abbe56e057f2f883e',1418454946,'','',0,'',''),(8,'jaycelq12@gmail.com','e1adc3949ba59abbe56e057f2f883e',1418461087,'','',0,'',''),(9,'jaycelq@gmail.con','e1adc3949ba59abbe56e057f2f883e',1420467312,'','',0,'',''),(10,'123456@123','e1adc3949ba59abbe56e057f2f883e',1420467422,'','',0,'',''),(11,'test@123','e1adc3949ba59abbe56e057f2f883e',1420522311,'','',0,'',''),(12,'12355@556','e1adc3949ba59abbe56e057f2f883e',1420543719,'','',0,'',''),(13,'1234@1246','e1adc3949ba59abbe56e057f2f883e',1420614682,'','',0,'','');
/*!40000 ALTER TABLE `my_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-21  8:11:43
