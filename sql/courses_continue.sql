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
-- Table structure for table `courses_continue`
--

CREATE TABLE `courses_continue` (
  `course_id` int(255) NOT NULL,
  `course_rating` varchar(255) NOT NULL,
  `course_total_time` varchar(255) NOT NULL,
  `course_reading` varchar(255) NOT NULL,
  `course_award` blob NOT NULL,
  `course_material` blob NOT NULL,
  `course_age_group` blob NOT NULL,
  `course_pre_requisite` blob NOT NULL,
  `course_unique` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_continue`
--

INSERT INTO `courses_continue` (`course_id`, `course_rating`, `course_total_time`, `course_reading`, `course_award`, `course_material`, `course_age_group`, `course_pre_requisite`, `course_unique`) VALUES
(16, 'ehh', 'gee', 'efe', 0x3c756c3e3c6c693e6461736473613c2f6c693e3c6c693e6473613c2f6c693e3c2f756c3e, 0x3c703e64736164733c2f703e3c756c3e3c2f756c3e, 0x3c756c3e3c6c693e7364613c2f6c693e3c6c693e643c2f6c693e3c2f756c3e, 0x3c756c3e3c6c693e647361643c2f6c693e3c6c693e647361643c2f6c693e3c2f756c3e, 'hi62jwuj1y'),
(17, 'ds', 'ds', 'ds', 0x3c703e647364733c2f703e3c703e266e6273703b3c2f703e, 0x3c703e64733c2f703e, 0x3c703e64733c2f703e, 0x3c703e61613c2f703e, 'q68a43iy3j'),
(18, 'das', 'dsa', 'das', 0x3c703e6473613c2f703e3c703e6473613c2f703e, 0x3c703e647361643c2f703e, 0x3c703e647361643c2f703e, 0x3c703e647361643c2f703e, 'dwa0s3wwpe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_continue`
--
ALTER TABLE `courses_continue`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_continue`
--
ALTER TABLE `courses_continue`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
