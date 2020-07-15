-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 03:17 PM
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
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `support_id` int(11) NOT NULL,
  `support_name` varchar(255) NOT NULL,
  `support_email` varchar(255) NOT NULL,
  `support_course` varchar(255) NOT NULL,
  `support_lesson` varchar(255) NOT NULL,
  `support_query` varchar(550) NOT NULL,
  `support_for` int(11) NOT NULL,
  `support_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`support_id`, `support_name`, `support_email`, `support_course`, `support_lesson`, `support_query`, `support_for`, `support_unique`) VALUES
(1, 'Zee', 'coolzama36@gmail.com', '', '', 'Hey', 28, 'pfa123ja3w'),
(2, 'sd', 'coolzama36@gmail.com', '', '', '', 28, '3apfke9112'),
(3, 'hey', '', '', '', '', 28, '2esjay81pe'),
(4, 'hey', '', '', '', '', 28, '23aqr1hird'),
(5, 'hey', '', '', '', '', 28, '1yijldp3hy'),
(6, 'coolzama36@gmail.com', 'coolzama36@gmail.com', '', '', '', 28, 'p9eeiqa9pr'),
(7, 'hey', '', '', '', '', 28, 'fsjpa9hadj'),
(10, 'Zama', 'coolzama36@gmail.com', 'Something', '1', 'Hey', 28, '11kea4y02o'),
(11, 'Resheil', 'resheil@webportal.in', '', '', 'I need help', 28, 'hw1jy2ewri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
