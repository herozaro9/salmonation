-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 10:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salmonation`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `calendar_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `schedule` date NOT NULL,
  `time_first` time NOT NULL,
  `time_end` time NOT NULL,
  `file` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendar_id`, `title`, `description`, `schedule`, `time_first`, `time_end`, `file`, `link`) VALUES
(2, 'Salmonation x Dex Capital', '<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>Why do we use it?</h2>\n\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n\n<p>&nbsp;</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where can I get some?</h2>\n\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\n', '2021-12-15', '20:00:00', '22:00:00', 'df31987d25e1761f777f2a52fa8824fb.jpg', 'https://t.me/salmonation');

-- --------------------------------------------------------

--
-- Table structure for table `join_team`
--

CREATE TABLE `join_team` (
  `join_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mail` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `telegram` varchar(100) NOT NULL,
  `project` varchar(50) NOT NULL,
  `time_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `publish` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `slug`, `description`, `author`, `publish`, `status`, `file`) VALUES
(3, 'Salmonation Ecosystem', 'salmonation-ecosystem', '<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>Why do we use it?</h2>\n\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n\n<p>&nbsp;</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where can I get some?</h2>\n\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\n', 'Gilang', '2021-12-11', 'Aktif', '3af2f7980b82d204dd93bdb5c11c3c78.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification` varchar(150) NOT NULL,
  `author` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `time_notification` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification`, `author`, `icon`, `time_notification`) VALUES
(1, 'Insert News', 'Gilang', 'plus', '2021-12-09 08:39:11'),
(2, 'Delete News', 'Gilang', 'trash', '2021-12-09 08:49:32'),
(3, 'Delete News', 'Gilang', 'trash', '2021-12-09 08:49:35'),
(4, 'Delete News', 'Gilang', 'trash', '2021-12-09 08:49:37'),
(5, 'Delete News', 'Gilang', 'trash', '2021-12-09 08:49:39'),
(6, 'Delete News', 'Gilang', 'trash', '2021-12-09 08:49:40'),
(7, 'Delete News', 'Gilang', 'trash', '2021-12-09 08:49:42'),
(8, 'Edit Registration', 'Gilang', 'edit', '2021-12-09 02:51:04'),
(9, 'Insert News', 'Gilang', 'plus', '2021-12-11 07:25:23'),
(10, 'Add Video', 'Gilang', 'plus', '2021-12-11 07:47:14'),
(11, 'Edit Video', 'Gilang', 'edit', '2021-12-11 07:48:56'),
(12, 'Delete Video', 'Gilang', 'trash', '2021-12-11 01:49:04'),
(13, 'Edit News', 'Gilang', 'edit', '2021-12-11 07:51:47'),
(14, 'Add Team', 'Gilang', 'plus', '2021-12-11 07:52:45'),
(15, 'Add Schedule', 'Gilang', 'plus', '2021-12-11 07:54:00'),
(16, 'Add Video', 'Gilang', 'plus', '2021-12-11 07:55:03'),
(17, 'Edit Team', 'Gilang', 'edit', '2021-12-11 09:08:52'),
(18, 'Edit Schedule', 'Gilang', 'edit', '2021-12-11 09:14:43'),
(19, 'Edit News', 'Gilang', 'edit', '2021-12-11 09:31:19'),
(20, 'Edit Team', 'Gilang', 'edit', '2021-12-11 09:58:40'),
(21, 'Delete Registration', 'Gilang', 'trash', '2021-12-11 04:17:46'),
(22, 'Edit Schedule', 'Gilang', 'edit', '2021-12-11 11:11:04'),
(23, 'Edit Request Join Team', 'Gilang', 'edit', '2021-12-14 03:08:54'),
(24, 'Delete Request Join Team', 'Gilang', 'trash', '2021-12-14 03:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mail` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `telegram` varchar(100) NOT NULL,
  `project` varchar(50) NOT NULL,
  `time_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `name`, `description`, `mail`, `phone`, `status`, `telegram`, `project`, `time_submit`) VALUES
(1, 'Gilang Permana Putra', 'want to colaboration', 'gilangpermana1407@gmail.com', '0895616848424', 'Pending', '', '', '2021-12-09 08:51:04'),
(3, 'Gilang Permana Putra', 'salmon', 'gilangpermana1407@gmail.com', '0895616848424', 'Pending', '', '', '2021-12-11 10:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job` varchar(40) NOT NULL,
  `file` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `ln` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `tw` text NOT NULL,
  `order_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `job`, `file`, `status`, `ln`, `fb`, `ig`, `tw`, `order_position`) VALUES
(2, 'Gilang Permana Putra', 'Senior Dev', '305e70959f9422bae4e152a039d9288c.JPG', 'Aktif', 'https://linkedin.com/in/gprmnp', 'https://facebook.com/gprmnp', 'https://instagram.com/gprmnp_', 'https://twitter.com/gprmnp', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `otp` int(11) NOT NULL,
  `last_otp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`, `status`, `otp`, `last_otp`) VALUES
(1, 'Gilang', 'gilangpermana1407@gmail.com', 'c37fddfb7b3f538674c6e9a77e7bf486', 'Admin', 'Aktif', 1234, '2021-12-08 19:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `title`, `link`, `description`, `status`) VALUES
(2, 'Salmonation Ecosystem', 'https://www.youtube.com/embed/ScMzIvxBSi4', 'Salmonation Ecosystem', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`calendar_id`);

--
-- Indexes for table `join_team`
--
ALTER TABLE `join_team`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `calendar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `join_team`
--
ALTER TABLE `join_team`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
