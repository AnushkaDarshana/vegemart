-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 08:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegemart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactNum` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `profilePic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `adID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `avdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `bidID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `quantityID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `bidQuantity` int(4) NOT NULL,
  `bidPrice` int(4) NOT NULL,
  `startTime` datetime(6) NOT NULL,
  `endTime` datetime(6) NOT NULL,
  `bidStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bidID`, `sellerID`, `productID`, `quantityID`, `userID`, `bidQuantity`, `bidPrice`, `startTime`, `endTime`, `bidStatus`) VALUES
(110, 22, 887607558, 64, 17, 15, 300, '2021-03-26 00:22:54.000000', '2021-03-26 02:22:54.000000', 0),
(112, 22, 887607558, 64, 18, 15, 250, '2021-03-26 00:22:54.000000', '2021-03-26 02:22:54.000000', 0),
(113, 22, 887607558, 63, 18, 10, 100, '2021-03-26 00:33:30.000000', '2021-03-26 02:33:30.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartItemID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `bidID` int(10) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `phoneNum` varchar(12) NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `profilePic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `fName`, `lName`, `phoneNum`, `address1`, `address2`, `city`, `profilePic`) VALUES
(6, 17, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(7, 18, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(8, 19, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(10, 21, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(11, 22, 'Anushka', 'Vithanage', '+10715279016', 'Pan-Philippine Hwy c', 'Bandarawella road', 'Badulla', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `id` int(11) NOT NULL,
  `delivererID` int(10) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `phoneNum` varchar(10) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `vehicleNo` varchar(10) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `profilePic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverer`
--

INSERT INTO `deliverer` (`id`, `delivererID`, `fName`, `lName`, `phoneNum`, `vehicle`, `vehicleNo`, `address1`, `address2`, `city`, `profilePic`) VALUES
(1, 1477694803, 'Imashi', 'Dissanayake', '+947153296', 'bike', 'WP KC5123', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(2, 1477694803, 'Anushka', 'Darshana', '0564612', 'Bike', 'KC 5176', '75', '32', 'Badulla', '');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `deliveryID` int(10) NOT NULL,
  `buyerID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `acceptStatus` tinyint(1) NOT NULL,
  `pickupStatus` tinyint(1) NOT NULL,
  `deliveryStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`deliveryID`, `buyerID`, `sellerID`, `acceptStatus`, `pickupStatus`, `deliveryStatus`) VALUES
(1, 18, 22, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_create_time` datetime(6) NOT NULL,
  `post_owner` int(10) NOT NULL,
  `review_status` tinyint(1) NOT NULL,
  `post_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`, `review_status`, `post_status`) VALUES
(3, 2, 'Vegetable prices usually ease as supplies with the Maha and Yala season harvest come in. In Sri Lanka vegetables are not freely imported and exported, except for potatoes and onions, which may lead to unusual price spikes, until supplies improve analysts say.', '2021-03-18 21:44:04.000000', 22, 1, 1),
(40, 25, 'rgdfgdf', '2021-03-24 04:35:50.000000', 17, 1, 1),
(41, 26, 'you are working', '2021-03-24 04:39:29.000000', 17, 1, 1),
(42, 2, 'alerts work or?', '2021-03-24 15:59:06.000000', 22, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_create_time` datetime(6) NOT NULL,
  `topic_owner` int(10) NOT NULL,
  `topic_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`, `topic_status`) VALUES
(2, 'Middleman traders', '2021-03-05 21:42:46.000000', 17, 1),
(25, 'fgfdg', '2021-03-24 04:35:50.000000', 17, 1),
(26, 'Farming in Sri Lanka', '2021-03-24 04:39:29.000000', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `active_status` int(2) NOT NULL,
  `login_status` int(2) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `userID`, `userType`, `active_status`, `login_status`, `date_time`) VALUES
(62, 22, 'seller', 1, 1, '2021-03-19 17:11:33'),
(63, 22, 'seller', 1, 1, '2021-03-21 09:46:07'),
(64, 17, 'user', 1, 1, '2021-03-21 09:47:17'),
(65, 17, 'user', 1, 1, '2021-03-21 12:05:58'),
(66, 17, 'user', 1, 1, '2021-03-21 12:08:34'),
(67, 17, 'user', 1, 1, '2021-03-21 12:21:11'),
(68, 17, 'user', 1, 1, '2021-03-21 12:28:52'),
(69, 17, 'user', 1, 1, '2021-03-21 18:02:45'),
(70, 17, 'user', 1, 1, '2021-03-22 14:14:42'),
(71, 17, 'user', 1, 1, '2021-03-22 14:15:15'),
(72, 17, 'user', 1, 1, '2021-03-22 14:16:44'),
(73, 17, 'user', 1, 1, '2021-03-22 16:42:00'),
(74, 17, 'user', 1, 1, '2021-03-22 18:23:55'),
(75, 17, 'user', 1, 1, '2021-03-22 18:51:47'),
(76, 22, 'seller', 1, 1, '2021-03-22 20:40:59'),
(77, 22, 'seller', 1, 1, '2021-03-22 20:41:24'),
(78, 22, 'seller', 1, 1, '2021-03-22 20:42:24'),
(79, 22, 'seller', 1, 1, '2021-03-23 10:54:16'),
(80, 1477694802, 'deliverer', 1, 1, '2021-03-23 12:56:37'),
(81, 1477694803, 'deliverer', 1, 1, '2021-03-23 13:07:03'),
(82, 1477694803, 'deliverer', 1, 1, '2021-03-23 17:56:43'),
(83, 17, 'user', 1, 1, '2021-03-23 23:17:56'),
(84, 1477694803, 'deliverer', 1, 1, '2021-03-23 23:30:40'),
(85, 22, 'seller', 1, 1, '2021-03-23 23:36:01'),
(86, 17, 'user', 1, 1, '2021-03-24 19:48:37'),
(87, 2, 'admin', 1, 1, '2021-03-24 21:49:10'),
(88, 18, 'user', 1, 1, '2021-03-25 15:10:23'),
(89, 17, 'user', 1, 1, '2021-03-25 15:19:30'),
(90, 18, 'user', 1, 1, '2021-03-25 15:20:58'),
(91, 17, 'user', 1, 1, '2021-03-25 19:00:05'),
(92, 18, 'user', 1, 1, '2021-03-25 19:07:19'),
(93, 17, 'user', 1, 1, '2021-03-26 00:17:42'),
(94, 18, 'user', 1, 1, '2021-03-26 00:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `buyerID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `paymentStatus` tinyint(1) NOT NULL,
  `delivery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `buyerID`, `sellerID`, `paymentStatus`, `delivery`) VALUES
(4, 17, 22, 1, 1),
(5, 17, 22, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(10) NOT NULL,
  `sellerID` int(20) NOT NULL,
  `name` text NOT NULL,
  `imageName` text NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `exdate` date NOT NULL,
  `time` time NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `sellerID`, `name`, `imageName`, `address1`, `address2`, `city`, `description`, `exdate`, `time`, `datetime`, `availability`) VALUES
(887607554, 22, 'Beans', 'KzyH8w_WANaUXwcympIyDGKuvfhg6RzOxwhhar3k2Ug.png', '75/2', 'Bandarawella road', 'Badulla', '', '0000-00-00', '00:00:00', '2021-03-24 14:08:44.000000', 0),
(887607555, 22, 'Beans', 'Registration.jpeg', '101/3', 'Kandy road', 'Kandy', '', '0000-00-00', '00:00:00', '2021-03-24 14:17:57.000000', 0),
(887607556, 22, 'Beans', 'game-of-thrones-dragon-eyes-season-8-uhdpaper.com-4K-64.jpg', '35/2', 'galle road', 'Galle', '', '0000-00-00', '00:00:00', '2021-03-24 14:21:33.000000', 0),
(887607557, 22, 'Beans', 'cq5dam.web_.1200.675-1200x640.jpeg', 'Pan-Philippine Hwy c', 'Bandarawella road', 'Badulla', '', '0000-00-00', '00:00:00', '2021-03-24 19:07:35.000000', 1),
(887607558, 22, 'Beans', 'game-of-thrones-dragon-eyes-season-8-uhdpaper.com-4K-64.jpg', 'Pan-Philippine Hwy c', 'Bandarawella road', 'Badulla', '', '0000-00-00', '00:00:00', '2021-03-24 19:21:56.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quantitysets`
--

CREATE TABLE `quantitysets` (
  `quantityID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `minPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantitysets`
--

INSERT INTO `quantitysets` (`quantityID`, `productID`, `quantity`, `minPrice`) VALUES
(54, 887607554, 10, 30),
(55, 887607554, 10, 30),
(56, 887607554, 10, 30),
(61, 887607557, 20, 30),
(62, 887607557, 20, 30),
(63, 887607558, 10, 30),
(64, 887607558, 15, 210);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `review` text NOT NULL,
  `dateTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `email`, `token`) VALUES
(37, 'anushka.darshana01@gmail.com', '1c3f7c7bb26a607e0c0bb052589941ee6051a3397690f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `userType`, `active_status`) VALUES
(2, 'admin@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'admin', 1),
(17, 'imashi@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'user', 1),
(18, 'imashi1@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'user', 1),
(19, 'imashi921a@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'user', 1),
(21, 'vegemartucsc@gmail.com', '80dcbd58da1875244cc5cb8648c96008', 'user', 1),
(22, 'anushka.darshana01@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'seller', 1),
(1477694802, 'deliverer@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'deliverer', 1),
(1477694803, 'del@gmail.com', '2d44afcd2d9f0c2985ab86ec9b870b16', 'deliverer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`adID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`bidID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `bidding_ibfk_3` (`sellerID`),
  ADD KEY `quantityID` (`quantityID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartItemID`),
  ADD KEY `bidID` (`bidID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivererID` (`delivererID`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `deliveries_ibfk_1` (`buyerID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `post_owner` (`post_owner`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_owner` (`topic_owner`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orders_ibfk_1` (`buyerID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `quantitysets`
--
ALTER TABLE `quantitysets`
  ADD PRIMARY KEY (`quantityID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `sellerID` (`sellerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bidID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `deliveryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=887607559;

--
-- AUTO_INCREMENT for table `quantitysets`
--
ALTER TABLE `quantitysets`
  MODIFY `quantityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6546557;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1477694804;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_3` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bidding_ibfk_4` FOREIGN KEY (`quantityID`) REFERENCES `quantitysets` (`quantityID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`bidID`) REFERENCES `bidding` (`bidID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD CONSTRAINT `deliverer_ibfk_1` FOREIGN KEY (`delivererID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`post_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_posts_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `forum_topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD CONSTRAINT `forum_topics_ibfk_1` FOREIGN KEY (`topic_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quantitysets`
--
ALTER TABLE `quantitysets`
  ADD CONSTRAINT `quantitysets_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
