-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 09:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buorso`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `icon` varchar(32) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(16) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `user` int(8) NOT NULL,
  `product` int(12) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(12) NOT NULL,
  `product` int(12) NOT NULL,
  `user` int(8) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(12) NOT NULL,
  `user` int(8) NOT NULL,
  `subject` tinyint(1) NOT NULL,
  `feedback` varchar(2048) NOT NULL,
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(16) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `sender` int(8) NOT NULL,
  `reciever` int(8) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(12) NOT NULL,
  `user` int(8) NOT NULL,
  `title` varchar(256) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `category` int(3) NOT NULL,
  `images` varchar(80) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `product_condition` tinyint(1) NOT NULL,
  `views` int(10) NOT NULL,
  `upload_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `location` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(16) NOT NULL,
  `report_type` tinyint(2) NOT NULL,
  `object_id` int(16) NOT NULL,
  `object_type` tinyint(1) NOT NULL,
  `user` int(8) NOT NULL,
  `report_date` datetime NOT NULL,
  `message` varchar(2048) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(8) NOT NULL,
  `token` varchar(64) NOT NULL,
  `user` int(8) NOT NULL,
  `session_date` datetime NOT NULL,
  `session_ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` int(10) NOT NULL,
  `street` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `joined` datetime NOT NULL,
  `profession` varchar(32) NOT NULL,
  `image` varchar(16) NOT NULL,
  `bio` varchar(2048) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `favorite_id` (`favorite_id`),
  ADD KEY `product` (`product`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `reciever` (`reciever`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user` (`user`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_cmt_products` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cmt_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_fav_products` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fav_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedb_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_msg1_users` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_msg2_users` FOREIGN KEY (`reciever`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_prod_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_prod_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_rep_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sess_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
