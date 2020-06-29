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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_summary` varchar(550) NOT NULL,
  `comment_lesson` int(255) NOT NULL,
  `comment_create` datetime NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `comment_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_summary`, `comment_lesson`, `comment_create`, `comment_by`, `comment_unique`) VALUES
(11, '<p>sda</p>', 6, '2020-06-27 01:29:16', '6', '9322ahphal'),
(12, 'hey', 6, '2020-06-29 21:52:44', '13', 'aepre2juf3'),
(13, 'Cool lesson.', 6, '2020-06-29 22:33:47', '13', 'pere3p3486'),
(14, 'hey', 6, '2020-06-29 22:34:13', '13', '1awj333uia'),
(15, 'hey', 6, '2020-06-29 22:34:17', '13', '6jahe3qeja'),
(16, 'Testing\r\n', 6, '2020-06-29 22:36:09', '13', 'ypj3herjj1'),
(17, 'This kid\'s a nerd lol', 7, '2020-06-29 22:37:00', '13', 'hpy1r1h1wd'),
(18, 'hey', 7, '2020-06-29 22:58:30', '13', 'j2yielsrir'),
(19, 'test', 7, '2020-06-29 23:01:59', '13', 'fr2ih2aja3'),
(20, 'test2', 7, '2020-06-29 23:02:38', '13', '1jaaj5ep18'),
(21, 'test3', 7, '2020-06-29 23:07:40', '13', '1heh8ar69r'),
(22, 'he', 7, '2020-06-29 23:11:46', '13', 'ar3ihwihfp'),
(23, 'hea', 7, '2020-06-29 23:12:23', '13', 'pwoqa39i13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_article` (`comment_lesson`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
