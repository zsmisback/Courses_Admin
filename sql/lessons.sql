-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 07:00 PM
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
(4, 'Something', 1, 16, 0x3c756c3e3c6c693e647361643c2f6c693e3c6c693e6473613c2f6c693e3c2f756c3e, 'Someone', 'https://www.youtube.com/watch?v=j8E9WwxMAWc', 0, 'lwiq9ij3pd'),
(5, 'Something', 2, 16, 0x3c756c3e3c6c693e6865793c2f6c693e3c6c693e7965613c2f6c693e3c2f756c3e, 'This one guy', 'https://www.youtube.com/', 1, 'oup1r3djwe');

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
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
