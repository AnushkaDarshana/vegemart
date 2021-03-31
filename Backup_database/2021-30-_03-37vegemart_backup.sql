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
  PRIMARY KEY (`bidID`),
  KEY `userID` (`userID`),
  KEY `productID` (`productID`),
  KEY `bidding_ibfk_3` (`sellerID`),
  KEY `quantityID` (`quantityID`),
  CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bidding_ibfk_3` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`),
  CONSTRAINT `bidding_ibfk_4` FOREIGN KEY (`quantityID`) REFERENCES `quantitysets` (`quantityID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidding`
--

LOCK TABLES `bidding` WRITE;
/*!40000 ALTER TABLE `bidding` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (8,11,'Anushka','Vithanage','+94752135994','21/2','Galle road','Kaluthara','anne13.jpg'),(9,12,'Uvini','DeSilva','+94789461354','25/3','Horana road','Piliyandala','anne.jpg'),(10,13,'Imashi','Dissanayake','+94715329635','81/2','Ampitiya road','Kandy','default.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverer`
--

LOCK TABLES `deliverer` WRITE;
/*!40000 ALTER TABLE `deliverer` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_topics`
--

LOCK TABLES `forum_topics` WRITE;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_topics` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantitysets`
--

LOCK TABLES `quantitysets` WRITE;
/*!40000 ALTER TABLE `quantitysets` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@gmail.com','c5cc5fa84e85ec0076a03e08c13cb1c5','a845c0ecdc90f85954b9243098b7e1ab','admin',1),(11,'anushka.darshana01@gmail.com','39e17cca0d9e08b28dee644595b261ff','5b7059efa05ee9a215ee690fe0662ffc','user',1),(12,'uvinidesilva17@gmail.com','a05000f2ddb827414ca5bc706db73051','8de328c4fcb31a7421e6f21ef8d0bf1a','user',1),(13,'vegemartucsc@gmail.com','e5fc73882a61f85493218180e3b4f96e','2945b2f5d8acaa0fe128c761e2477ef5','seller',1);
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

-- Dump completed on 2021-03-30 15:37:35
