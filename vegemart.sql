-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 11:33 AM
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
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactNum` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `profilePic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `user_id`, `name`, `contactNum`, `address1`, `address2`, `city`, `profilePic`) VALUES
(1, 1, 'admin', '0715642973', '', '', '', '');

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
  `bidStatus` tinyint(1) NOT NULL,
  `result` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bidID`, `sellerID`, `productID`, `quantityID`, `userID`, `bidQuantity`, `bidPrice`, `startTime`, `endTime`, `bidStatus`, `result`) VALUES
(30, 8, 19, 12, 7, 15, 110, '2021-03-29 13:24:53.000000', '2021-03-29 13:25:53.000000', 1, 1);

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
(1, 2, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(3, 5, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(4, 6, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png'),
(5, 7, 'Anushka', 'Vithanage', '+10715279016', 'Pan-Philippine Hwy c', 'Bandarawella road', 'Badulla', 'default.png'),
(6, 8, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Bandarawella road', 'Badulla', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
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

INSERT INTO `deliverer` (`id`, `user_id`, `fName`, `lName`, `phoneNum`, `vehicle`, `vehicleNo`, `address1`, `address2`, `city`, `profilePic`) VALUES
(1, 4, 'Anushka', 'Vithanage', '+107152790', 'bike', 'WP KC-7561', 'Pan-Philippine Hwy cor. Brgy. San Bartolome Rd', 'Bandarawella road', 'Colombo', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `deliveryID` int(10) NOT NULL,
  `delivererID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `buyerID` int(10) NOT NULL,
  `sellerID` int(10) NOT NULL,
  `pickupStatus` tinyint(1) NOT NULL,
  `deliveryStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
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
  `orderCancelDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `sellerID`, `bidID`, `productID`, `quantityID`, `paymentStatus`, `delivery`, `acceptDelivery`, `notifyStatus`, `notifyDate`, `canceled_orders`, `orderCancelDate`) VALUES
(35, 7, 8, 30, 19, 12, 0, 0, 0, 1, '2021-03-29 13:26:53', 1, '2021-03-29 13:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `paid_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `expireDate` datetime(6) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `sellerID`, `name`, `imageName`, `address1`, `address2`, `city`, `description`, `expireDate`, `availability`) VALUES
(17, 2, 'Beans', 'beans.png', '35/2', 'galle road', 'Galle', '', '2021-04-01 20:53:26.000000', 0),
(18, 2, 'Beans', 'beans.png', '35/2', 'galle road', 'Galle', '', '2021-04-01 20:53:26.000000', 0),
(19, 8, 'Beetroot', 'KzyH8w_WANaUXwcympIyDGKuvfhg6RzOxwhhar3k2Ug.png', '75/2', 'Bandarawella road', 'Badulla', '', '2021-04-03 12:00:35.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quantitysets`
--

CREATE TABLE `quantitysets` (
  `quantityID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `minPrice` int(10) NOT NULL,
  `quantitySetStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantitysets`
--

INSERT INTO `quantitysets` (`quantityID`, `productID`, `quantity`, `minPrice`, `quantitySetStatus`) VALUES
(9, 17, 10, 100, 1),
(10, 18, 20, 110, 1),
(12, 19, 15, 110, 1);

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
  `salt` varchar(60) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `userType`, `active_status`) VALUES
(1, 'admin@gmail.com', 'd54e415b15556397fecb74004d8ea400', 'bf81f24d984460137f248c0dbc46ef5c', 'admin', 1),
(2, 'imashi122@gmail.com', 'd32f8446fec6dd4508fc4f77859ca011', 'a4c1ad2509c2a4e0c52a1fbaa0368b82', 'seller', 1),
(3, 'buyer@gmail.com', '7b05b9f8cc2b344918ad19b791755a44', 'e68c55e39a6d3fb08c338304fa9a15b7', 'user', 1),
(4, 'anushka@gmail.com', 'df0d9f656e7a83251b1104c3151cc05c', '096127c727bf82cf7ca25ca820f7be38', 'deliverer', 1),
(5, 'buyer@gmail.com', 'c09dadd1c979293b2c006e6db2a51c1a', '5762ac887b7d8467947104b2d7434986', 'user', 1),
(6, 'imashi921a@gmail.com', 'd4a085b820fedeaea0970316007224d7', '2df96916976d98aad67e0b067ea18cb5', 'user', 1),
(7, 'anushka.darshana01@gmail.com', '3a8acea921b27e158ff25d1ca8dfb5e6', 'b7b9f2404b3e4d16c81db9a473c25e7f', 'user', 1),
(8, 'imashi@gmail.com', '239f86dd6ac33c0f6d075179f3652a2a', '808fc610c1370ea247cdc9610a60e218', 'seller', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `delivererID` (`user_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `deliveries_ibfk_1` (`buyerID`),
  ADD KEY `sellerID` (`sellerID`),
  ADD KEY `delivererID` (`delivererID`),
  ADD KEY `orderID` (`orderID`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orders_ibfk_1` (`userID`),
  ADD KEY `sellerID` (`sellerID`),
  ADD KEY `orders_ibfk_4` (`bidID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `quantityID` (`quantityID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `orderID` (`orderID`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bidID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `deliveryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quantitysets`
--
ALTER TABLE `quantitysets`
  MODIFY `quantityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_3` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bidding_ibfk_4` FOREIGN KEY (`quantityID`) REFERENCES `quantitysets` (`quantityID`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD CONSTRAINT `deliverer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_3` FOREIGN KEY (`delivererID`) REFERENCES `deliverer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_4` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`bidID`) REFERENCES `bidding` (`bidID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`quantityID`) REFERENCES `quantitysets` (`quantityID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
