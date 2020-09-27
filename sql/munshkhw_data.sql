-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2020 at 06:33 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `munshkhw_data`
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
  `blog_unique` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `tags`, `content`, `dates`, `image`, `blog_unique`) VALUES
(1, 'Effort is important, but knowing where to make an effort makes all the difference!', 'Munshi Brij Mohan Sharma', 'Munshiji, Brij Mohan Sharma, ship, effort, aim , target, motivation', 0x3c703e41206769616e74207368697020656e67696e65206661696c65642e205468652073686970262333393b73206f776e657273207472696564206f6e652065787065727420616674657220616e6f746865722c20627574206e6f6e653c6272202f3e6f66207468656d20636f756c64206669677572652062757420686f7720746f206669782074686520656e67696e652e3c6272202f3e5468656e20746865792062726f7567687420696e20616e206f6c64206d616e2077686f20686164206265656e20666978696e672073686970732073696e636520686520776173206120796f756e672e2048653c6272202f3e636172726965642061206c6172676520626167206f6620746f6f6c7320776974682068696d2c20616e64207768656e20686520617272697665642c20686520696d6d6564696174656c792077656e7420746f3c6272202f3e776f726b2e20486520696e737065637465642074686520656e67696e652076657279206361726566756c6c792c20746f7020746f20626f74746f6d2e3c6272202f3e54776f206f66207468652073686970262333393b73206f776e65727320776572652074686572652c207761746368696e672074686973206d616e2c20686f70696e6720686520776f756c64206b6e6f7720776861743c6272202f3e746f20646f2e204166746572206c6f6f6b696e67207468696e6773206f7665722c20746865206f6c64206d616e207265616368656420696e746f206869732062616720616e642070756c6c6564206f757420613c6272202f3e736d616c6c2068616d6d65722e2048652067656e746c792074617070656420736f6d657468696e672e20496e7374616e746c792c2074686520656e67696e65206c75726368656420696e746f206c6966652e2048653c6272202f3e6361726566756c6c7920707574206869732068616d6d657220617761792e2054686520656e67696e6520776173206669786564213c6272202f3e41207765656b206c617465722c20746865206f776e65727320726563656976656420612062696c6c2066726f6d20746865206f6c64206d616e20666f722052732e2074656e2074686f7573616e642e3c6272202f3e2671756f743b576861743f212671756f743b20746865206f776e657273206578636c61696d65642e202671756f743b486520686172646c792064696420616e797468696e67212671756f743b3c6272202f3e536f20746865792077726f746520746865206f6c64206d616e2061206e6f746520736179696e672c202671756f743b506c656173652073656e6420757320616e206974656d697a65642062696c6c2e2671756f743b3c6272202f3e546865206d616e2073656e7420612062696c6c207468617420726561643a3c2f703e3c703e54617070696e67207769746820612068616d6d65722e2e2e2e2e2e202e2e2e2e2e2e2e2e2e202e2e2e2e2e2e2e2e20527320322e30303c6272202f3e4b6e6f77696e6720776865726520746f207461702e2e2e2e2e2e2e2e2e202e2e2e2e2e2e2e2e202e2e2e2e2e2e2e2e20527320392c3939382e30303c2f703e3c703e3c7374726f6e673e4566666f727420697320696d706f7274616e742c20627574206b6e6f77696e6720776865726520746f206d616b6520616e206566666f7274206d616b657320616c6c2074686520646966666572656e63652e3c2f7374726f6e673e3c2f703e, '2020-08-17 09:35:07', '.png', 'ywrjkdi39p');

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
(2, 'Career Counselling And Personal Development', 'CCPD', 'This course is specialized in Student Counseling & Personal development which are most essential components for a successful career.', 'CCPD,Career Counselling And Personal Development,Vaishali', 'Vaishali', 'English,Hindi', '.jpg', '2500', '3asyjejje9'),
(3, 'Basic Management Studies', 'BMS', 'The focus of this course is to explore the principles of leading and managing people efficiently in today\'s global enterprises.', 'BMS,Basic Management Studies,Vaishali', 'Vaishali', 'English,Hindi', '.jpg', '4000', '6r3wrr3aho'),
(4, 'Employability Skills Programme', 'ESP', 'The course enables the students to develop job skills required to grow in their professional career.', 'Employability Skills Programme,ESP,Vaishali', 'Vaishali', 'English,Hindi', '.png', '4000', '2le1u0k3r6'),
(5, 'Start-Up Foundation Course', 'SFC', 'Students will explore different business opportunities, feasibility, financing sources, marketing of their products/services, people management and administration of their start-ups.', 'Start-Up Foundation Course,SFC,Vaishali', 'Vaishali', 'English,Hindi', '.png', '4000', 'ewjhy3ar1w');

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
(2, 5, '2 Hours', '3 Weeks', 0x3c6f6c3e3c6c693e3c703e3c7374726f6e673e5468652073747564656e742077696c6c20646576656c6f7020616e6420756e6465727374616e64207468652062617369632070726f6365647572657320666f722061207375636365737366756c206361726565722e3c2f7374726f6e673e3c2f703e3c2f6c693e3c6c693e3c703e3c7374726f6e673e5468652073747564656e742077696c6c206765742070726f626c656d20736f6c76696e6720736f6c7574696f6e7320696e207468652063617265657220676f616c733c2f7374726f6e673e3c2f703e3c2f6c693e3c6c693e3c703e3c7374726f6e673e5468652073747564656e742077696c6c206265206177617265206f66206f766572616c6c206c696665206e656365737369747920636f6e73747261696e747320737563682061732043617265657220536b696c6c732c2057656c6c6e6573732c20536f63696574616c20526573706f6e736962696c6974792c266e6273703b206574632668656c6c69703b3c2f7374726f6e673e3c2f703e3c2f6c693e3c2f6f6c3e, 0x3c6f6c3e3c6c693e3c7374726f6e673e53574f5420416e616c797369732e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e43617265657220706c616e2026616d703b20446576656c6f706d656e742e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e53656c66206d616e6167656d656e742e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4865616c74682026616d703b2057656c6c206265696e676e6573732e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e53656c662f20536f63696574792f4e617475726520436f6e6e65637469766974792e3c2f7374726f6e673e3c2f6c693e3c2f6f6c3e, '18 and above', 0x3c703e3c7374726f6e673e4e6f205072652d726571756973697465733c2f7374726f6e673e3c2f703e, '3asyjejje9'),
(3, 5, 'Calculating', 'Calculating', 0x3c703e496e2050726f67726573733c2f703e, 0x3c6f6c3e3c6c693e5072696e6369706c6573206f6620427573696e657373204d616e6167656d656e743c2f6c693e3c6c693e4261736963204163636f756e74696e6720616e642046696e616e6369616c204d616e6167656d656e743c2f6c693e3c6c693e4261736963204d61726b6574696e67204d616e6167656d656e743c2f6c693e3c6c693e42617369632048756d616e205265736f75726365204d616e6167656d656e743c2f6c693e3c6c693e427573696e65737320436f6d6d756e69636174696f6e3c2f6c693e3c6c693e426173696320436f6d707574657220536b696c6c733c2f6c693e3c2f6f6c3e, '12 and above', 0x3c703e4e6f205072652d526571756973697465733c2f703e, '6r3wrr3aho'),
(4, 5, 'Calculating', 'Calculating', 0x3c6f6c3e3c6c693e3c7374726f6e673e5468652073747564656e742077696c6c20756e6465727374616e642074686520626173696320736b696c6c73206f662061646d696e697374726174696f6e20616e6420746563686e6963616c20736b696c6c7320696e20646966666572656e7420646f6d61696e732e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e5468652073747564656e742077696c6c20656e68616e6365207468656972206b6e6f776c65646765206f6620626173696320636f6d6d756e69636174696f6e20616e64206d616e6167657269616c20736b696c6c7320726571756972656420746f2067726f7720696e207468656972206361726565722e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e266e6273703b5468652073747564656e742077696c6c2062652061626c6520746f20616368696576652063617265657220676f616c7320616e6420616c736f20756e6465727374616e6420686f7720746f206f766572636f6d6520687572646c657320696e2070726f66657373696f6e616c206c6966652e3c2f7374726f6e673e3c2f6c693e3c2f6f6c3e, 0x3c6f6c3e3c6c693e3c7374726f6e673e53656c662061776172656e6573733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e547261696e696e6720696e206261736963206d616e6167656d656e7420736b696c6c733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e547261696e696e6720696e206a6f6220736b696c6c733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e526573756d65206275696c64696e673c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e5469707320666f7220496e74657276696577207072657061726174696f6e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4964656e74696679696e67206f6e636520656e647572696e67207175616c697469657320616e6420706f74656e7469616c20736b696c6c733c2f7374726f6e673e3c2f6c693e3c2f6f6c3e, '12 and above', 0x3c703e3c7374726f6e673e4e6f205072652d526571756973697465733c2f7374726f6e673e3c2f703e, '2le1u0k3r6'),
(5, 5, '2 Hours', '4 Weeks', 0x3c6f6c3e3c6c693e3c7374726f6e673e42792074686520656e64206f66207468697320636f757273652c2073747564656e7473206b6e6f7720686f7720746f20746573742c2076616c696461746520616e642070726f746f7479706520746865697220627573696e65737320696465612c20616e6420616c736f2077686574686572206f72206e6f74207468657920666974207468652070726f66696c65206f6620616e20656e7472657072656e657572213c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e576520657870656374207468617420746865792077696c6c20626520726561647920746f206c61756e63682074686569722073746172742d75703a206d6963726f206f7220736d616c6c20696e206e61747572653c2f7374726f6e673e3c2f6c693e3c2f6f6c3e, 0x3c6f6c3e3c6c693e3c7374726f6e673e466163746f727320496e666c75656e63696e6720456e7472657072656e6575727368697020616e6420726571756972656420656e7472657072656e6575727368697020736b696c6c733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e496e6e6f766174696f6e20616e6420496e76656e74696f6e73207573696e67206c65667420627261696e20736b696c6c7320746f206861727665737420726967687420627261696e2069646561733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4e65772047656e65726174696f6e73206f6620456e7472657072656e657572736869703a2053746172742d7570733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e486f7720746f20737461727420796f75722073746172742d7570733a20537461676573206f662053746172742d7570733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4c6567616c2061737065637473206f66206d6963726f2f736d616c6c20656e7465727072697365732e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e46696e616e63696e67206f7074696f6e733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4163636f756e74696e6720616e6420626f6f6b206b656570696e6720666f722073746172742d7570733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e536f6369616c20616e64206469676974616c206d61726b6574696e673c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e427573696e65737320636f6d6d756e69636174696f6e3c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4c65616465727368697020616e642070656f706c65206d616e6167656d656e743c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e4574686963616c2070726163746963657320696e2072756e6e696e67206120627573696e6573733c2f7374726f6e673e3c2f6c693e3c6c693e3c7374726f6e673e50726f6a656374206d616e6167656d656e7420616e6420627573696e6573732070726f706f73616c2077726974696e6720666f72206d6963726f2f736d616c6c2073746172742d7570733c2f7374726f6e673e3c2f6c693e3c2f6f6c3e, '12 and above', 0x3c703e3c7374726f6e673e4e6f205072652d526571756973697465733c2f7374726f6e673e3c2f703e, 'ewjhy3ar1w');

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
  `lesson_vid_url` blob NOT NULL,
  `lesson_status` int(11) NOT NULL,
  `lesson_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `lessons_rating`
--

INSERT INTO `lessons_rating` (`ids`, `lesson`, `lesson_rating`, `lesson_rating_by`, `lesson_rating_unique`) VALUES
(1, 4, 5, 1, 'qh3aesa911');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_email_address` varchar(150) NOT NULL,
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
(1, 'Zee', '1234566786', 'resheil@gmail.com', '$2y$10$5qZeNAHEc0NOkd9BXFl9Betk/sumcmKULCUPu4o7T.2ptsfy6SQ8u', '', '', 'heyys', '', 1, '0000-00-00 00:00:00', 0, 'wiek3rjjps'),
(2, 'BrijMonhan', '0123456789', 'bms4munshiji@gmail.com', '$2y$10$zQcBSWroaWmNZhrEksHV4OWWIzSFZAbyqYyKuebz5fdnObtafuIwa', '', '', '', '', 1, '2020-07-31 16:33:35', 0, 'rjpraaiyi2'),
(3, 'resheil', '7021980307', 'resheil@resheil.com', '$2y$10$77ACBcQWmWpGtR6fHpGajuOs7SCGMFTf2J3n4LKrYNimWSEi2FC7u', '', '', '', '', 0, '2020-08-13 05:56:32', 0, '9wafip3pai'),
(4, 'resheil', '7021980307', 'resheil@resheil.com', '$2y$10$77ACBcQWmWpGtR6fHpGajuOs7SCGMFTf2J3n4LKrYNimWSEi2FC7u', '', '', '', '', 0, '2020-08-13 05:56:32', 0, '9wafip3pai');

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcourses_test`
--
ALTER TABLE `addcourses_test`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses_continue`
--
ALTER TABLE `courses_continue`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons_rating`
--
ALTER TABLE `lessons_rating`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
