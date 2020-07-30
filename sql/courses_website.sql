-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 12:24 AM
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
-- Table structure for table `addcourses_test`
--

CREATE TABLE `addcourses_test` (
  `courses_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `courses_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `content` blob NOT NULL,
  `dates` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `blog_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `tags`, `content`, `dates`, `image`, `blog_unique`) VALUES
(1, 'Subham Prakatam ', 'Munshiji', 'eggs,bacon', 0x3c703e48656c6c6f2c4661746568206b692062616174206b617265206d756e7368696a693c2f703e, '2020-07-30 14:34:15', '', 'eehoadfya9'),
(3, 'something', 'Munshiji', 'eggs,bacon', 0x3c703e4865793c2f703e, '2020-07-30 15:29:57', '', 'kilj2yawj8'),
(5, 'something', 'Munshiji', 'eggs,bacon,spaghetti', 0x3c703e3c7374726f6e673e49262333393b7665206265656e206275726e696e67206d79206865617274206f75747474742c676f7420746f2066616365206e6520746f2073616c756565656565656520686f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f6f3c2f7374726f6e673e3c2f703e, '2020-07-30 18:24:19', '.jpg', 'h2aaewi42e');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_summary` varchar(550) NOT NULL,
  `comment_lesson` int(255) NOT NULL,
  `comment_blog` varchar(255) NOT NULL,
  `comment_create` datetime NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `comment_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_summary`, `comment_lesson`, `comment_blog`, `comment_create`, `comment_by`, `comment_unique`) VALUES
(29, 'hey', 17, '', '2020-07-30 18:50:27', '20', 'efi9ajs9e2'),
(30, 'hey', 0, '5', '2020-07-31 01:25:19', '20', 'p2iifw9ijs');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_summary` varchar(255) NOT NULL,
  `course_tags` varchar(255) NOT NULL,
  `course_by` varchar(255) NOT NULL,
  `course_language` varchar(255) NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `course_price` varchar(20) NOT NULL,
  `course_unique` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_code`, `course_summary`, `course_tags`, `course_by`, `course_language`, `course_image`, `course_price`, `course_unique`) VALUES
(42, 'Bachelors of commerce', 'Bcom', 'Something huge like that one day when that happened that it might happen that something might happen thatsssss', 'bcom,bachelors of commerce', 'Someone', 'Hindi', '.jpg', '', '1hrj2r613y'),
(43, 'Machine Learning', 'M.L 241', 'Something not that big', 'something,someone', 'Me', 'English', '.png', '400', 'irrjisralu'),
(44, 'Test', 'te', 'SSds sew ssssssssds wsssssssssssssd ssssssssssssssssss dsdsww sdsssw dsssw sdsss dsswwwwwwwwwwwwwsds', 'bcom,bsm', 'Me', 'English', '.jpg', '21', 'lae3u8wa0w');

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
(42, 5, '12 hrs', '24 hrs', 0x3c756c3e3c6c693e546869733c2f6c693e3c6c693e746861743c2f6c693e3c2f756c3e, 0x3c756c3e3c6c693e546869733c2f6c693e3c6c693e746861743c2f6c693e3c2f756c3e, '18 and above', 0x3c756c3e3c6c693e546869733c2f6c693e3c6c693e546861743c2f6c693e3c2f756c3e, '1hrj2r613y'),
(43, 4, '12 hrs', '24 hrs', 0x3c756c3e3c6c693e546869733c2f6c693e3c2f756c3e, 0x3c756c3e3c6c693e54686174793c2f6c693e3c2f756c3e, '12 and above', 0x3c756c3e3c6c693e4f6b3c2f6c693e3c2f756c3e, 'irrjisralu'),
(44, 1, '24 min', '12 hrs ', 0x3c703e546573743c2f703e3c703e506c656173653c2f703e, 0x3c756c3e3c6c693e546869733c2f6c693e3c6c693e746861743c2f6c693e3c2f756c3e, '3 and above', 0x3c756c3e3c6c693e546861743c2f6c693e3c6c693e546869733c2f6c693e3c2f756c3e, 'lae3u8wa0w');

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
(17, 'Test', 1, 42, 0x3c756c3e3c6c693e546573743c2f6c693e3c6c693e41626f75743c2f6c693e3c2f756c3e, 'Me', 'https://www.youtube.com/embed/PzmNssVLcLQ', 0, '2ui2ie3ejo');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_rating`
--

CREATE TABLE `lessons_rating` (
  `ids` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `lesson_rating` int(11) NOT NULL,
  `lesson_rating_by` int(11) NOT NULL,
  `lesson_rating_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_type` varchar(255) NOT NULL,
  `purchase_for` int(11) NOT NULL,
  `purchase_amount` varchar(255) NOT NULL,
  `purchase_at` datetime NOT NULL,
  `purchase_status` varchar(255) NOT NULL,
  `t_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `purchase_type`, `purchase_for`, `purchase_amount`, `purchase_at`, `purchase_status`, `t_id`) VALUES
(23, 28, '', 43, '400.00', '2020-07-20 18:59:37', 'success', '857aab0a95d6205d461a'),
(24, 28, '', 42, 'Free', '2020-07-20 19:00:19', 'success', '10cec8d85a2b1e60a9ed');

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
-- Indexes for table `addcourses_test`
--
ALTER TABLE `addcourses_test`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_unique` (`blog_unique`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_article` (`comment_lesson`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courses_continue`
--
ALTER TABLE `courses_continue`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `lesson_for` (`lesson_for`);

--
-- Indexes for table `lessons_rating`
--
ALTER TABLE `lessons_rating`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support_id`);

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
-- AUTO_INCREMENT for table `addcourses_test`
--
ALTER TABLE `addcourses_test`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `courses_continue`
--
ALTER TABLE `courses_continue`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lessons_rating`
--
ALTER TABLE `lessons_rating`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
