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
-- Table structure for table `courses_continue`
--

CREATE TABLE `courses_continue` (
  `course_id` int(255) NOT NULL,
  `course_rating` int(11) NOT NULL,
  `course_total_time` varchar(255) NOT NULL,
  `course_reading` varchar(255) NOT NULL,
  `course_award` blob NOT NULL,
  `course_material` blob NOT NULL,
  `course_age_group` varchar(255) NOT NULL,
  `course_pre_requisite` blob NOT NULL,
  `course_unique` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_continue`
--

INSERT INTO `courses_continue` (`course_id`, `course_rating`, `course_total_time`, `course_reading`, `course_award`, `course_material`, `course_age_group`, `course_pre_requisite`, `course_unique`) VALUES
(22, 5, '12 hrs', '24 min', 0x3c756c3e3c6c693e47657420746869733c2f6c693e3c6c693e47657420746861743c2f6c693e3c2f756c3e, 0x3c756c3e3c6c693e686173207468697320616e6420746861743c2f6c693e3c6c693e736f6d657468696e673c2f6c693e3c2f756c3e, '18 and above', 0x3c756c3e3c6c693e54686973206e65656465643c2f6c693e3c2f756c3e, '9a31ysd93e'),
(23, 4, '12 hrs', '24 min', 0x3c756c3e3c6c693e47657420746869733c2f6c693e3c6c693e47657420746861743c2f6c693e3c6c693e416e6420746861743c2f6c693e3c6c693e436f6f6c3c2f6c693e3c2f756c3e, 0x3c756c3e3c6c693e4e65656420746869733c2f6c693e3c6c693e4e65656420746861743c2f6c693e3c6c693e266e6273703b3c2f6c693e3c2f756c3e, '12 and above', 0x3c756c3e3c6c693e546861743c2f6c693e3c6c693e266e6273703b3c2f6c693e3c2f756c3e, 'akjiwyau12'),
(24, 5, '12 hrs', '242 min', 0x3c756c3e3c6c693e736f3c2f6c693e3c6c693e733c2f6c693e3c6c693e733c2f6c693e3c6c693e733c2f6c693e3c6c693e266e6273703b3c2f6c693e3c2f756c3e, 0x3c756c3e3c6c693e64733c2f6c693e3c6c693e643c2f6c693e3c6c693e643c2f6c693e3c6c693e643c2f6c693e3c2f756c3e, '12 and above', 0x3c756c3e3c6c693e536f6d657468696e673c2f6c693e3c6c693e733c2f6c693e3c6c693e613c2f6c693e3c6c693e663c2f6c693e3c6c693e266e6273703b3c2f6c693e3c2f756c3e, 'lsjld122p3');

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
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
