-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 03:49 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_email_address` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_courses` varchar(550) NOT NULL,
  `user_certificates` varchar(255) NOT NULL,
  `user_about` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_lvl` int(11) NOT NULL,
  `user_joined` datetime NOT NULL,
  `user_ban` int(11) NOT NULL,
  `user_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_contact`, `user_email_address`, `user_password`, `user_courses`, `user_certificates`, `user_about`, `user_image`, `user_lvl`, `user_joined`, `user_ban`, `user_unique`) VALUES
(20, 'Zee', '1234566786', 'resheil@gmail.com', '$2y$10$5qZeNAHEc0NOkd9BXFl9Betk/sumcmKULCUPu4o7T.2ptsfy6SQ8u', '', '', 'heyys', '.jpg', 1, '0000-00-00 00:00:00', 0, 'wiek3rjjps'),
(28, 'Zee', '9524321232', 'coolzama36@gmail.com', '$2y$10$MqjIg9oYC73crMqPhhNpOu7ip42nm0TtAPhrFLNFJ0/pMM6xLPkV6', '', '', 'hey', '.jpg', 0, '2020-07-10 16:32:47', 0, 'uprw3j3oha'),
(29, 'Zama', '1234566786', 'coolzama36@gmail.comss', '$2y$10$IxCaDUo1NUdBguJg9JWkfO6XpoBT9EwdiG1fKujt/.JazPhOpYyzG', '', '', '', '', 0, '2020-07-15 15:08:49', 0, 'hujes314s1'),
(30, 'Hey', '1234566786', 'coolzama36@gmail.comsss', '$2y$10$.zOGK0t9hGqT0bdaV3AfPuFwFOa5ok3bN5hsA1gq/WUat4Rmv0xDC', '', '', '', '', 0, '2020-07-17 21:21:36', 0, '2ypipwkw89'),
(38, 'Zama', '1234566786', 'coolzama36@gmail.comssss', '$2y$10$/s3cGUANMf7NTqz26uJ82e3PL7hUd.HAPh1TZ3C9gR2IVR0YqxRA6', '', '', '', '', 0, '2020-07-18 13:44:38', 0, 'op13je3h3e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_address` (`user_email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
