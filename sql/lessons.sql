-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 07:57 PM
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
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(255) NOT NULL,
  `lesson_no` int(11) NOT NULL,
  `lesson_for` int(255) NOT NULL,
  `lesson_content` blob NOT NULL,
  `lesson_by` varchar(255) NOT NULL,
  `lesson_vid_url` varchar(255) NOT NULL,
  `lesson_status` int(11) NOT NULL,
  `lesson_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_name`, `lesson_no`, `lesson_for`, `lesson_content`, `lesson_by`, `lesson_vid_url`, `lesson_status`, `lesson_unique`) VALUES
(6, 'Something', 1, 22, 0x3c756c3e3c6c693e6473616473616473616473613c2f6c693e3c2f756c3e, 'Someone', 'https://www.youtube.com/embed/UB1O30fR-EE', 0, 'akajlaq8ea'),
(7, 'Data', 1, 23, 0x3c703e536f6d657468696e6720536f6d657468696e673c2f703e, 'This one guy', 'https://www.youtube.com/embed/DBXZWB_dNsw', 0, 'jiaa5eyiaw'),
(8, 'Something Again', 2, 23, 0x3c703e4865793c2f703e, 'Someone', 'https://www.youtube.com/embed/_8-ht2AKyH4', 0, 'pf38e3ril3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `lesson_for` (`lesson_for`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
