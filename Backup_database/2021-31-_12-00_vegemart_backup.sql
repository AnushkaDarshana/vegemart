-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: vegemart
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactNum` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `profilePic` text NOT NULL,
  PRIMARY KEY (`adminID`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,1,'admin','+94715642973','75/2','Bandarawella road','Badulla','admin.jpg');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidding`
--

DROP TABLE IF EXISTS `bidding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bidding` (
  `bidID` int(10) NOT NULL AUTO_INCREMENT,
  `sellerID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `quantityID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `bidQuantity` int(4) NOT NULL,
  `bidPrice` int(4) NOT NULL,
  `startTime` datetime(6) NOT NULL,
  `endTime` datetime(6) NOT NULL,
  `bidStatus` tinyint(1) NOT NULL,
  `result` tinyint(1) NOT NULL,
  `bidRemoveStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`bidID`),
  KEY `userID` (`userID`),
  KEY `productID` (`productID`),
  KEY `bidding_ibfk_3` (`sellerID`),
  KEY `quantityID` (`quantityID`),
  CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bidding_ibfk_3` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`),
  CONSTRAINT `bidding_ibfk_4` FOREIGN KEY (`quantityID`) REFERENCES `quantitysets` (`quantityID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidding`
--

LOCK TABLES `bidding` WRITE;
/*!40000 ALTER TABLE `bidding` DISABLE KEYS */;
INSERT INTO `bidding` VALUES (44,13,20,14,17,20,110,'2021-03-30 21:10:20.000000','2021-03-30 21:11:20.000000',1,1,0),(45,13,20,13,12,15,100,'2021-03-30 21:11:45.000000','2021-03-30 21:12:45.000000',1,1,0);
/*!40000 ALTER TABLE `bidding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `phoneNum` varchar(12) NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `profilePic` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (9,12,'Uvini','DeSilva','+94789461354','25/3','Horana road','Piliyandala','anne.jpg'),(10,13,'Imashi','Dissanayake','+94715329635','81/2','Ampitiya road','Kandy','default.png'),(11,14,'Anuradha','Wickramasinghe','+94726438915','35/2','kurunegala road','Kurunegala','buyer2.jpg'),(12,17,'Anushka','Vithanage','+10715279016','Pan-Philippine Hwy c','Bandarawella road','Badulla','default.png');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliverer`
--

DROP TABLE IF EXISTS `deliverer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliverer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `phoneNum` varchar(10) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `vehicleNo` varchar(10) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `profilePic` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `delivererID` (`user_id`),
  CONSTRAINT `deliverer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverer`
--

LOCK TABLES `deliverer` WRITE;
/*!40000 ALTER TABLE `deliverer` DISABLE KEYS */;
INSERT INTO `deliverer` VALUES (3,15,'Chanaka','Wickramasinghe','+947154356','bike','CP BAC 745','35/2','Colombo road','Kandy','deliverer2.jpg');
/*!40000 ALTER TABLE `deliverer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliveries` (
  `deliveryID` int(10) NOT NULL AUTO_INCREMENT,
  `delivererID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `buyerID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `pickupStatus` tinyint(1) NOT NULL,
  `deliveryStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`deliveryID`),
  KEY `deliveries_ibfk_1` (`buyerID`),
  KEY `sellerID` (`sellerID`),
  KEY `orderID` (`orderID`),
  KEY `deliveries_ibfk_3` (`delivererID`),
  CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `deliveries_ibfk_3` FOREIGN KEY (`delivererID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `deliveries_ibfk_4` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveries`
--

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_create_time` datetime(6) NOT NULL,
  `post_owner` int(10) NOT NULL,
  `review_status` tinyint(1) NOT NULL,
  `post_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `topic_id` (`topic_id`),
  KEY `post_owner` (`post_owner`),
  CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`post_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_posts_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `forum_topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_posts`
--

LOCK TABLES `forum_posts` WRITE;
/*!40000 ALTER TABLE `forum_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(150) NOT NULL,
  `topic_create_time` datetime(6) NOT NULL,
  `topic_owner` int(10) NOT NULL,
  `topic_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_owner` (`topic_owner`),
  CONSTRAINT `forum_topics_ibfk_1` FOREIGN KEY (`topic_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_topics`
--

LOCK TABLES `forum_topics` WRITE;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
INSERT INTO `forum_topics` VALUES (1,'Yellow raspberries barely surviving. Reds flourishing','2021-03-30 19:58:02.000000',17,0);
/*!40000 ALTER TABLE `forum_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_desk`
--

DROP TABLE IF EXISTS `help_desk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help_desk` (
  `complaint_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `date_time` datetime NOT NULL,
  `issue` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `complaint_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_desk`
--

LOCK TABLES `help_desk` WRITE;
/*!40000 ALTER TABLE `help_desk` DISABLE KEYS */;
INSERT INTO `help_desk` VALUES (1,'Imashi Dissanayake','imashi@gmail.com','2021-03-17 18:07:26','Forum post not visible','The post i pulbished in the forum is not visible',0);
/*!40000 ALTER TABLE `help_desk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `notificationID` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(25) NOT NULL,
  `forUser` int(10) NOT NULL,
  `entityID` int(10) NOT NULL,
  `notif_read` tinyint(1) NOT NULL,
  `notif_time` datetime NOT NULL,
  PRIMARY KEY (`notificationID`),
  KEY `forUser` (`forUser`),
  KEY `entityID` (`entityID`),
  CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`forUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (16,2,17,39,0,'2021-03-30 19:50:55'),(17,1,13,22,0,'2021-03-30 19:50:55'),(18,2,17,40,0,'2021-03-30 20:40:18'),(19,2,12,43,0,'2021-03-30 21:05:37'),(20,2,17,42,0,'2021-03-30 21:05:43'),(21,1,13,22,0,'2021-03-30 21:05:44'),(22,2,17,42,0,'2021-03-30 21:05:50'),(23,1,13,22,0,'2021-03-30 21:05:50'),(24,2,17,42,0,'2021-03-30 21:05:56'),(25,1,13,22,0,'2021-03-30 21:05:56'),(26,2,17,42,0,'2021-03-30 21:06:02'),(27,1,13,22,0,'2021-03-30 21:06:03'),(28,2,17,42,0,'2021-03-30 21:06:08'),(29,1,13,22,0,'2021-03-30 21:06:08'),(30,2,17,42,0,'2021-03-30 21:06:14'),(31,1,13,22,0,'2021-03-30 21:06:14'),(32,2,17,42,0,'2021-03-30 21:06:20'),(33,1,13,22,0,'2021-03-30 21:06:20'),(34,2,17,42,0,'2021-03-30 21:06:25'),(35,1,13,22,0,'2021-03-30 21:06:25'),(36,2,17,42,0,'2021-03-30 21:06:31'),(37,1,13,22,0,'2021-03-30 21:06:31'),(38,2,17,42,0,'2021-03-30 21:06:37'),(39,1,13,22,0,'2021-03-30 21:06:37'),(40,2,17,42,0,'2021-03-30 21:06:43'),(41,1,13,22,0,'2021-03-30 21:06:43'),(42,2,17,42,0,'2021-03-30 21:06:48'),(43,1,13,22,0,'2021-03-30 21:06:48'),(44,2,17,42,0,'2021-03-30 21:06:54'),(45,1,13,22,0,'2021-03-30 21:06:54'),(46,2,17,42,0,'2021-03-30 21:07:01'),(47,1,13,22,0,'2021-03-30 21:07:01'),(48,2,17,42,0,'2021-03-30 21:07:07'),(49,1,13,22,0,'2021-03-30 21:07:07'),(50,2,17,42,0,'2021-03-30 21:07:13'),(51,1,13,22,0,'2021-03-30 21:07:13'),(52,2,17,42,0,'2021-03-30 21:07:18'),(53,1,13,22,0,'2021-03-30 21:07:18'),(54,2,17,42,0,'2021-03-30 21:07:24'),(55,1,13,22,0,'2021-03-30 21:07:24'),(56,2,17,42,0,'2021-03-30 21:07:29'),(57,1,13,22,0,'2021-03-30 21:07:30'),(58,2,17,42,0,'2021-03-30 21:07:35'),(59,1,13,22,0,'2021-03-30 21:07:35'),(60,2,17,42,0,'2021-03-30 21:07:41'),(61,1,13,22,0,'2021-03-30 21:07:41'),(62,2,17,42,0,'2021-03-30 21:07:47'),(63,1,13,22,0,'2021-03-30 21:07:47'),(64,2,17,42,0,'2021-03-30 21:07:52'),(65,1,13,22,0,'2021-03-30 21:07:52'),(66,2,17,42,0,'2021-03-30 21:07:58'),(67,1,13,22,0,'2021-03-30 21:07:58'),(68,2,17,44,0,'2021-03-30 21:11:27'),(69,2,12,45,0,'2021-03-30 21:12:51'),(70,1,13,20,0,'2021-03-30 21:12:52');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `bidID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `quantityID` int(10) NOT NULL,
  `paymentStatus` tinyint(1) NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  `acceptDelivery` tinyint(1) NOT NULL,
  `notifyStatus` tinyint(1) NOT NULL,
  `notifyDate` datetime NOT NULL,
  `canceled_orders` tinyint(1) NOT NULL,
  `orderCancelDate` datetime NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `orders_ibfk_1` (`userID`),
  KEY `sellerID` (`sellerID`),
  KEY `orders_ibfk_4` (`bidID`),
  KEY `productID` (`productID`),
  KEY `quantityID` (`quantityID`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`bidID`) REFERENCES `bidding` (`bidID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`quantityID`) REFERENCES `quantitysets` (`quantityID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (87,17,13,44,20,14,1,1,0,0,'2021-04-01 21:11:21',0,'0000-00-00 00:00:00'),(88,12,13,45,22,19,1,1,0,0,'2021-04-01 21:12:45',0,'0000-00-00 00:00:00'),(89,12,13,45,20,13,1,1,0,0,'2021-04-01 21:12:45',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `paymentID` int(10) NOT NULL AUTO_INCREMENT,
  `orderID` int(10) NOT NULL,
  `paid_amount` int(10) NOT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `orderID` (`orderID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (41,88,100),(42,87,160);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productID` int(10) NOT NULL AUTO_INCREMENT,
  `sellerID` int(20) NOT NULL,
  `name` text NOT NULL,
  `imageName` text NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `expireDate` datetime(6) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `sellerID` (`sellerID`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (20,13,'Beans','beans.png','81/2','Ampitiya road','Badulla','Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.','2021-04-04 17:13:16.000000',1),(21,13,'Beetroot','beetroot.png','81/2','Ampitiya road','Kandy','Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n','2021-04-04 19:45:56.000000',1),(22,13,'Beans','beans.png','81/2','Ampitiya road','Kandy','arge fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n','2021-04-04 19:47:39.000000',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantitysets`
--

DROP TABLE IF EXISTS `quantitysets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantitysets` (
  `quantityID` int(10) NOT NULL AUTO_INCREMENT,
  `productID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `minPrice` int(10) NOT NULL,
  `quantitySetStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`quantityID`),
  KEY `productID` (`productID`),
  CONSTRAINT `quantitysets_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantitysets`
--

LOCK TABLES `quantitysets` WRITE;
/*!40000 ALTER TABLE `quantitysets` DISABLE KEYS */;
INSERT INTO `quantitysets` VALUES (13,20,15,100,1),(14,20,20,110,1),(17,21,20,170,0),(18,22,15,200,0),(19,22,10,100,1);
/*!40000 ALTER TABLE `quantitysets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `reviewID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `review` text NOT NULL,
  `dateTime` datetime(6) NOT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `sellerID` (`sellerID`),
  KEY `userID` (`userID`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokens` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokens`
--

LOCK TABLES `tokens` WRITE;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salt` varchar(60) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@gmail.com','c5cc5fa84e85ec0076a03e08c13cb1c5','a845c0ecdc90f85954b9243098b7e1ab','admin',1),(12,'uvinidesilva17@gmail.com','a05000f2ddb827414ca5bc706db73051','8de328c4fcb31a7421e6f21ef8d0bf1a','user',1),(13,'vegemartucsc@gmail.com','e5fc73882a61f85493218180e3b4f96e','2945b2f5d8acaa0fe128c761e2477ef5','seller',1),(14,'anuradhadevans15@gmail.com','5093706cadf61915074b9467234b62fa','a7a0863e388af0e364f85d49ead1bf37','seller',1),(15,'cmwickramasinghe703@gmail.com','9e33b57b3931c42ca854528ab7334fe4','09ed93647803cf791b1af26a869ae0f3','deliverer',1),(17,'anushka.darshana01@gmail.com','a676f8f7543ee329284bad639ffb015a','085de8d0994ca7cec2bfcb92478c17b4','user',1);
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

-- Dump completed on 2021-03-31  0:00:03
