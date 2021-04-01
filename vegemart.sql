-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 09:44 PM
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
(1, 1, 'admin', '+94715642973', '75/2', 'Bandarawella road', 'Badulla', 'admin.jpg'),
(8, 28, 'Imashi Dissanayake', '+94715329635', '21', 'Anuradhapura road', 'Trincomalee', 'buyer2.jpg');

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
  `result` tinyint(1) NOT NULL,
  `bidRemoveStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bidID`, `sellerID`, `productID`, `quantityID`, `userID`, `bidQuantity`, `bidPrice`, `startTime`, `endTime`, `bidStatus`, `result`, `bidRemoveStatus`) VALUES
(46, 27, 23, 22, 25, 10, 170, '2021-03-31 16:02:13.000000', '2021-03-31 16:03:13.000000', 1, 1, 0),
(47, 31, 30, 58, 25, 10, 1250, '2021-03-31 21:19:52.000000', '2021-03-31 21:20:52.000000', 1, 1, 0),
(48, 31, 30, 57, 25, 15, 1400, '2021-03-31 21:20:03.000000', '2021-03-31 21:21:03.000000', 1, 1, 0),
(50, 30, 27, 43, 33, 25, 2000, '2021-03-31 21:20:33.000000', '2021-03-31 21:21:33.000000', 1, 1, 0),
(51, 27, 23, 45, 33, 10, 1000, '2021-03-31 21:25:16.000000', '2021-03-31 21:26:16.000000', 1, 1, 0);

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
(15, 25, 'Anushka', 'Vithanage', '+94715548637', '81', 'Bandarawella road', 'Badulla', 'default.png'),
(16, 27, 'Imashi', 'Dissanayake', '+94715329635', '75/2', 'Ampitiya road', 'Kandy', 'anne.jpg'),
(18, 30, 'Dinishiya', 'Sutharshan', '+94716538649', '35/2', 'Kandy road', 'Nuwara eliya', 'default.png'),
(19, 31, 'Anuradha', 'Wickramasinghe', '+94726438915', '25/2', 'Badulla road', 'Haliela', 'default.png'),
(20, 33, 'Uvini', 'DeSilva', '+94789461354', '25/3', 'Colombo road', 'Kandy', 'buyer6.jpg');

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
(5, 32, 'Chanaka', 'Wickramasinghe', '+947154356', 'lorry', 'CP LN 8516', '35/2', 'Colombo road', 'Kandy', 'default.png');

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

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`deliveryID`, `delivererID`, `orderID`, `buyerID`, `sellerID`, `pickupStatus`, `deliveryStatus`) VALUES
(39, 32, 90, 25, 27, 1, 1),
(40, 32, 91, 25, 31, 1, 0);

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
(32, 50, 'Beets grow best in loamy, compost-rich soil (pH 6.0 to 7.5). Sow seed 1 inch deep and 3 to 4 inches apart; if you sow closer use the thinnings in salads. Feed beets with seaweed extract during the growing season; beets grow best with a bit of extra potassium.', '2021-03-31 23:48:04.000000', 25, 1, 1),
(33, 51, 'Sow small batches at fortnightly intervals from March or April to July for a succession of tender, tasty roots. Choose bolt-resistant varieties for early sowings under cloches or fleece in late February or early March. You can sow without protection from late March onwards.', '2021-03-31 23:49:14.000000', 25, 1, 1);

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
(50, 'How can I grow beetroot at home?', '2021-03-31 23:48:04.000000', 25, 1),
(51, 'What month do you plant beetroot?', '2021-03-31 23:49:14.000000', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `help_desk`
--

CREATE TABLE `help_desk` (
  `complaint_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phoneNum` text NOT NULL,
  `date_time` datetime NOT NULL,
  `issue` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `solution` text NOT NULL,
  `complaint_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help_desk`
--

INSERT INTO `help_desk` (`complaint_id`, `name`, `email`, `phoneNum`, `date_time`, `issue`, `description`, `solution`, `complaint_status`) VALUES
(2, 'Anushka Vithanage', 'anushka@gmail.com', '0703674900', '2021-03-30 18:36:33', 'My account is suspended', 'I could not pay for a product and my account got suspended. What do i do?', 'I will look in to it', 1),
(3, 'Imashi Dissanayake', 'imashi@gmail.com', '07030456280', '2021-03-31 10:21:15', 'fdvd', 'rdgrd', 'aaa', 1),
(4, 'Imashi Dissanayake', 'imashi@gmail.com', '+94715329635', '2021-03-31 20:36:55', 'Account has been suspended', 'How can make it active?', '', 0),
(5, 'Dinishiya Sutharshan', 'dinishiya@gmail.com', '+94716538649', '2021-03-31 22:02:58', 'Forum post is not displayed', 'Why is my forum post is not displayed?', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(10) NOT NULL,
  `type` int(25) NOT NULL,
  `forUser` int(10) NOT NULL,
  `entityID` int(10) NOT NULL,
  `notif_read` tinyint(1) NOT NULL,
  `notif_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationID`, `type`, `forUser`, `entityID`, `notif_read`, `notif_time`) VALUES
(71, 2, 25, 46, 0, '2021-03-31 16:03:33'),
(72, 10, 27, 8, 0, '2021-03-31 18:54:47'),
(73, 10, 27, 10, 0, '2021-03-31 18:56:46'),
(76, 2, 25, 47, 0, '2021-03-31 21:21:01'),
(77, 2, 25, 48, 0, '2021-03-31 21:21:12'),
(78, 1, 31, 30, 0, '2021-03-31 21:21:13'),
(79, 2, 33, 51, 0, '2021-03-31 21:25:46'),
(80, 2, 33, 50, 0, '2021-03-31 21:25:59'),
(81, 10, 25, 18, 0, '2021-03-31 22:00:15'),
(82, 10, 25, 19, 0, '2021-03-31 22:00:40'),
(83, 10, 25, 20, 0, '2021-03-31 22:01:10'),
(84, 10, 25, 21, 0, '2021-03-31 22:02:29'),
(86, 10, 25, 31, 0, '2021-03-31 23:20:55'),
(87, 10, 25, 32, 0, '2021-03-31 23:21:30'),
(90, 10, 25, 33, 0, '2021-03-31 23:22:40'),
(91, 11, 25, 47, 0, '2021-03-31 23:44:57'),
(92, 11, 25, 49, 0, '2021-03-31 23:45:48'),
(93, 11, 25, 50, 0, '2021-03-31 23:48:04'),
(95, 11, 25, 51, 0, '2021-03-31 23:49:14');

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
(90, 25, 27, 46, 23, 22, 1, 1, 1, 0, '2021-04-02 16:03:14', 0, '0000-00-00 00:00:00'),
(91, 25, 31, 47, 30, 58, 1, 1, 1, 0, '2021-04-02 21:20:55', 0, '0000-00-00 00:00:00'),
(92, 25, 31, 48, 30, 57, 0, 0, 0, 0, '2021-04-02 21:21:05', 0, '0000-00-00 00:00:00'),
(93, 33, 27, 51, 23, 45, 1, 1, 0, 0, '2021-04-02 21:25:41', 0, '0000-00-00 00:00:00'),
(94, 33, 30, 50, 27, 43, 0, 0, 0, 0, '2021-04-02 21:25:54', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `paid_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `orderID`, `paid_amount`) VALUES
(43, 90, 220),
(44, 93, 1250),
(45, 91, 1500);

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
(23, 27, 'Broccoli', 'broccoli.jpg', '75/2', 'Ampitiya road', 'Kandy', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 16:01:26.000000', 1),
(24, 27, 'Tomato', 'tomato.jpg', '75/2', 'Ampitiya road', 'Kandy', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 18:14:33.000000', 1),
(25, 27, 'Carrot', 'carrot.jpg', '75/2', 'Ampitiya road', 'Kandy', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 18:15:06.000000', 1),
(26, 27, 'Cucumber', 'cucumber.jfif', '75/2', 'Ampitiya road', 'Kandy', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 19:36:21.000000', 1),
(27, 30, 'Onion', 'onion.png', '35/2', 'Haliela road', 'Nuwara Eliya', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 20:49:55.000000', 1),
(28, 30, 'Carrot', 'carrot.jpg', '35/2', 'Haliela road', 'Nuwara Eliya', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 20:58:17.000000', 1),
(29, 31, 'Pumpkin', 'Pumpkin.jpg', '25/2', 'Haliela road', 'Welimada', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 21:16:55.000000', 1),
(30, 31, 'Beans', 'beans.png', '25/2', 'Haliela road', 'Badulla', 'Large fresh fruit and vegetable packers may contract with growers in several different production regions to ensure that fresh fruits and vegetables are available every week of the year.\r\n', '2021-04-05 21:17:40.000000', 0);

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
(22, 23, 10, 150, 1),
(38, 28, 10, 520, 0),
(39, 28, 20, 1000, 0),
(40, 28, 15, 800, 0),
(41, 27, 10, 1000, 0),
(42, 27, 15, 1400, 0),
(43, 27, 25, 2000, 1),
(44, 23, 15, 1200, 0),
(45, 23, 10, 800, 1),
(46, 24, 25, 1500, 0),
(47, 24, 10, 800, 0),
(50, 25, 10, 1000, 0),
(51, 25, 15, 1400, 0),
(53, 26, 10, 750, 0),
(54, 26, 15, 1000, 0),
(55, 29, 10, 1500, 0),
(56, 29, 15, 1800, 0),
(57, 30, 15, 1300, 1),
(58, 30, 10, 1200, 1);

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
(38, 'anushka.darshana01@gmail.com', 'ef2fdd028a8b5aedb67873143f53ec3e606469ab426c3');

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
(1, 'admin@gmail.com', 'c5cc5fa84e85ec0076a03e08c13cb1c5', 'a845c0ecdc90f85954b9243098b7e1ab', 'admin', 1),
(25, 'anushka.darshana01@gmail.com', '2bc0ffa62492ddd47c99669a50927561', '1b41cc1cef071a7cc53a89651cfbe953', 'user', 1),
(27, 'imashi@gmail.com', '9961d2aaaa70686523c12b7db81a5ff4', 'e1fae82e652999d25d4e55d7a956ae29', 'seller', 1),
(28, 'anushka@gmail.com', '4618b23482549a7d8913d2437165a042', '832ad41ef72aa674713737b9fa6346c0', 'coadmin', 1),
(30, 'vegemartucsc@gmail.com', 'f211c9e618fb0f660c1a19c48e13e211', 'f3cc10b2b761909dab8b419b3a0b9621', 'seller', 1),
(31, 'anuradha@gmail.com', '8a9f06aee71aee467ac0eebf01e8acb4', '57318a2cc644d56323832c66c23e9dc1', 'seller', 1),
(32, 'cmwickramasinghe703@gmail.com', '68934a65c6591bbaa5ce770697d46c23', '52ef2809cb3ed6007f401807dcaca508', 'deliverer', 1),
(33, 'uvinidesilva@gmail.com', 'bf736717bb08fef572a53e2b133715ab', '1ac5379fe3980f064e7970a51d467c5e', 'user', 1);

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
  ADD KEY `orderID` (`orderID`),
  ADD KEY `deliveries_ibfk_3` (`delivererID`);

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
-- Indexes for table `help_desk`
--
ALTER TABLE `help_desk`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `forUser` (`forUser`),
  ADD KEY `entityID` (`entityID`);

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
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bidID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `deliveryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `help_desk`
--
ALTER TABLE `help_desk`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quantitysets`
--
ALTER TABLE `quantitysets`
  MODIFY `quantityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  ADD CONSTRAINT `deliveries_ibfk_3` FOREIGN KEY (`delivererID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`forUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
