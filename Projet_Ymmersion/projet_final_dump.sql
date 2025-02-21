-- MySQL dump 10.13  Distrib 5.7.24, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: projet_final
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20250218080219','2025-02-19 10:36:55',2),('DoctrineMigrations\\Version20250218092829','2025-02-19 10:36:55',2),('DoctrineMigrations\\Version20250219104403','2025-02-19 10:44:14',33),('DoctrineMigrations\\Version20250219132540','2025-02-19 13:25:43',301),('DoctrineMigrations\\Version20250219134105','2025-02-19 13:41:08',81),('DoctrineMigrations\\Version20250219144642','2025-02-19 14:46:43',62),('DoctrineMigrations\\Version20250219180800','2025-02-19 18:08:01',107),('DoctrineMigrations\\Version20250219190412','2025-02-19 19:04:14',9),('DoctrineMigrations\\Version20250219191706','2025-02-19 19:17:07',17),('DoctrineMigrations\\Version20250219201057','2025-02-19 20:10:58',15),('DoctrineMigrations\\Version20250219201612','2025-02-19 20:16:12',28),('DoctrineMigrations\\Version20250220092518','2025-02-20 09:25:20',16),('DoctrineMigrations\\Version20250220114557','2025-02-20 11:46:03',23),('DoctrineMigrations\\Version20250220142033','2025-02-20 14:20:39',124),('DoctrineMigrations\\Version20250221092910','2025-02-21 09:29:18',116);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6DC044C561220EA6` (`creator_id`),
  CONSTRAINT `FK_6DC044C561220EA6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,1,0,'cc'),(2,1,0,',,'),(3,2,0,'oo'),(4,3,0,'oui'),(5,3,0,'oui'),(6,4,0,'loulou\'s team'),(7,5,0,'mixandtwist'),(8,6,0,'DDEDE'),(9,7,0,',,,'),(10,1,0,'ceno'),(11,10,0,'zszs'),(12,10,0,'fff'),(13,10,0,'ddddd'),(14,13,0,'nn'),(15,14,0,'Edgar\' Team'),(16,15,0,'oooo'),(17,16,0,'Edgar5 team'),(18,17,0,'Louka team'),(19,18,0,'john team'),(20,19,0,'OMAR TEAMS'),(21,17,2,'oui'),(22,16,0,'Edgarteam'),(23,20,10,'team');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habit`
--

DROP TABLE IF EXISTS `habit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `completed` tinyint(1) NOT NULL,
  `category` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT 'color1',
  `periodicity` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_44FE2172FE54D947` (`group_id`),
  KEY `IDX_44FE2172A76ED395` (`user_id`),
  CONSTRAINT `FK_44FE2172A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_44FE2172FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habit`
--

LOCK TABLES `habit` WRITE;
/*!40000 ALTER TABLE `habit` DISABLE KEYS */;
INSERT INTO `habit` VALUES (9,0,'fitness','test1','very easy','#000000','weekly','2025-02-19 18:16:45',8,6,''),(10,0,'school_work','zdzad','medium','#000000','weekly','2025-02-19 18:16:54',8,6,''),(12,0,'fitness','nn','very easy','#000000','daily','2025-02-19 18:21:59',9,7,''),(16,0,'chores','dddd','very easy','#000000','daily','2025-02-19 18:27:05',9,7,''),(17,0,'chores','dddd','very easy','#000000','daily','2025-02-19 18:27:18',9,7,''),(18,0,'chores','jjj','very easy','#000000','daily','2025-02-19 18:31:49',10,1,''),(22,0,'chores','hhh','very easy','#000000','daily','2025-02-19 18:42:49',10,1,''),(23,0,'chores','uhh','very easy','#000000','daily','2025-02-19 18:58:11',10,1,''),(27,0,'chores','jj','very easy','#000000','daily','2025-02-19 19:15:59',10,1,''),(28,0,'chores','vvv','very easy','#000000','daily','2025-02-19 19:16:04',10,1,''),(31,0,'chores','szszszs','very easy','#000000','daily','2025-02-19 20:17:12',11,10,'group'),(32,1,'chores',',,','very easy','#000000','daily','2025-02-19 20:19:12',NULL,10,'personal'),(33,1,'chores',',,,,','very easy','#000000','daily','2025-02-19 20:19:52',NULL,10,'personal'),(34,0,'chores','ff','very easy','#000000','daily','2025-02-19 20:40:40',12,10,'group'),(36,0,'chores',',,,','very easy','#000000','daily','2025-02-19 20:42:44',NULL,10,'personal'),(38,0,'chores','dfff','very easy','#000000','daily','2025-02-20 07:16:47',13,10,'group'),(39,0,'school_work','bootstrap','hard','#000000','daily','2025-02-20 08:04:45',NULL,11,'personal'),(40,1,'fitness','sport','medium','#000000','daily','2025-02-20 08:05:18',10,1,'group'),(44,0,'chores','hhh','very easy','color1','daily','2025-02-20 09:26:42',14,13,'group'),(45,0,'chores','ceded','very easy','color1','daily','2025-02-20 09:28:27',14,13,'group'),(46,0,'chores','dddd','easy','color1','weekly','2025-02-20 09:32:02',NULL,13,'personal'),(47,0,'chores','nnn','very easy','color1','daily','2025-02-20 09:32:09',14,13,'group'),(48,1,'fitness','sport','very easy','color1','daily','2025-02-20 18:25:02',NULL,18,'personal'),(49,1,'fitness','john team sport','very easy','color1','daily','2025-02-20 18:25:27',19,18,'group'),(50,1,'chores','nn','very easy','color1','daily','2025-02-21 07:12:32',NULL,19,'personal'),(51,1,'chores','5 stack','very easy','color1','daily','2025-02-21 07:13:05',20,19,'group'),(52,1,'chores','hyyh','very easy','color1','daily','2025-02-21 07:17:26',NULL,17,'personal'),(53,1,'chores','hh','very easy','color1','daily','2025-02-21 07:17:46',21,17,'group'),(54,1,'chores','test2','very easy','color1','daily','2025-02-21 07:19:01',21,17,'group'),(55,0,'chores','ddd','very easy','color1','daily','2025-02-21 07:27:49',22,16,'group'),(57,1,'chores','hhh','hard','color1','daily','2025-02-21 09:35:29',23,20,'group'),(58,0,'chores','ddd','easy','color1','daily','2025-02-21 09:35:49',23,20,'group'),(59,0,'chores','n','medium','color1','daily','2025-02-21 09:40:21',23,20,'group');
/*!40000 ALTER TABLE `habit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitation`
--

DROP TABLE IF EXISTS `invitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `user_invited_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F11D61A261220EA6` (`creator_id`),
  KEY `IDX_F11D61A2658A81AB` (`user_invited_id`),
  CONSTRAINT `FK_F11D61A261220EA6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_F11D61A2658A81AB` FOREIGN KEY (`user_invited_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitation`
--

LOCK TABLES `invitation` WRITE;
/*!40000 ALTER TABLE `invitation` DISABLE KEYS */;
INSERT INTO `invitation` VALUES (1,14,2,0),(2,15,15,0),(3,15,15,0),(4,15,15,0),(5,15,15,0),(6,15,14,0),(7,16,2,0),(10,16,16,1);
/*!40000 ALTER TABLE `invitation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_32993751A76ED395` (`user_id`),
  KEY `IDX_32993751FE54D947` (`group_id`),
  CONSTRAINT `FK_32993751A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_32993751FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
INSERT INTO `score` VALUES (1,20,NULL,1),(2,17,NULL,1);
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`),
  KEY `IDX_8D93D649FE54D947` (`group_id`),
  CONSTRAINT `FK_8D93D649FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'cenomeutil@gmail.com','[]','$2y$13$3zGm.oTTnVjyAaLLsm.q9edw6dDJhgO7nzIU.wZ8TrODJLzicrnv2',0,'Edgar',NULL,16),(2,'test1@gmail.com','[]','$2y$13$u5fS2dTRW4Zum9lKJkB11uGHOjIdckDKfUfc.AZMfn4AlMLX0PSny',0,'guillaume',NULL,NULL),(3,'cenutil@gmail.com','[]','$2y$13$0uwWEwaMIlDnY.XXyTrYauhTo7uJAb11ShLbLQOl1vu8hPZNCr39q',0,'papou',NULL,5),(4,'ceeutil@gmail.com','[]','$2y$13$rxSPq8khzehNi80bB6XWNuvXA1iQcauzunsuWjvdlxC94b/8M3J.q',0,'loulou',NULL,6),(5,'testddd2@gmail.com','[]','$2y$13$z7GPxkPccnAKWRGXqZUQzuRO0yj9juM68UMwX0m08v47WsBAQJIPG',0,'mix',NULL,7),(6,'cenddddomeutil@gmail.com','[]','$2y$13$anZlwID56vZBzutAiWVPpu7a4syyjWW0wrA3WluE7PY8WLCbcXXy.',0,'ezfzdezd',NULL,8),(7,'cenomeuthfhhil@gmail.com','[]','$2y$13$iqxfC7hRew4eUv.Y3MNkV.Iwba8cAvEKnvEzUF8XhHB2TStPLwws6',0,'hthtrhthhd',NULL,9),(8,'rrrrrr@gmail.com','[]','$2y$13$IDUt/WzmfvvirqnF9.ImIe36lTeh59X5Zn3fcIuSaAQCxUvpEdKxW',0,'rrrr',NULL,1),(9,'eeeee@gmail.com','[]','$2y$13$tJx.sx5x.yxYjizUOR03au5w2HMzylQUxrzSg7C21XEpxVU3/.qv6',0,'eeeee',NULL,10),(10,'cenomesssssutil@gmail.com','[]','$2y$13$EBXmVjPOcuHrCElYjZB0o.ez5OjlIkKdYLKLt1ol7IR/2Sgx7fo3i',0,'szszszs',NULL,13),(11,'cenomeddddddutil@gmail.com','[]','$2y$13$YmAtMUHUiey.Xlc3YCku3es3YJkfB96o0xcDZ.fsmQM1oN/AGnJvW',0,'quentin2',NULL,6),(12,'testjbb2@gmail.com','[]','$2y$13$zBvl8847gij3xmaPqxTqW.mCiimaV2rhU9dWYG8J8mxvrG.AMpx36',0,'guyioj',NULL,10),(13,'test2kk@gmail.com','[]','$2y$13$rebSxie0Jj0/uqU3lnNkd.gOzoOfkNxIed/ttqsbt4OtH8kg8Dz4m',0,'test',NULL,14),(14,'cenomtil@gmail.com','[]','$2y$13$3ceRzupHn9vbJ.o3rIL8iOLLEqBKqn1zmypKKgZUWfA4Wt.yQGXtW',0,'Edgar2',NULL,15),(15,'cenomeutdddil@gmail.com','[]','$2y$13$Rjit/J6tuP.wAGN5ElvKBO/vKFrRm6u7kJsUcrQ8RKi3eUXXQGtx.',0,'Edgar3',NULL,NULL),(16,'cenomeutil5@gmail.com','[]','$2y$13$QjKAEpdotowRHg.PNFmiGuuQ9brK4T3dOdKdVDxqN64yRTohwPoSm',0,'Edgar5',NULL,NULL),(17,'louka@gmail.com','[]','$2y$13$vw0MR2ES5kODi5QLZXXse.bumSMckEZyuR/nYuPJhiAPRcoDllm7K',0,'Louka',NULL,NULL),(18,'John@gmail.com','[]','$2y$13$t3D7pkdXzMlM7etsfFtE0OTSOYEoDepAvoxQYsaeM5Ym4S7Npj5cu',0,'John',NULL,19),(19,'OMAR@gmail.com','[]','$2y$13$3q2tR0TIavWaJjPCCr9kr.i6YHXoI9E7/NZUdkjCm.n6dj7lKEo8a',0,'OMAR',NULL,20),(20,'cenomeutil2@gmail.com','[\"ROLE_USER\"]','$2y$13$GjuOGk2CRME3zmlJuq7d/.5IfkBdB.hmX92H7kiQ50Wc8OuNYug0C',0,'Louks',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-21 13:24:03
