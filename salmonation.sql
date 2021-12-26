-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2021 at 04:45 AM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `calendar_id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `schedule` date NOT NULL,
  `time_first` time NOT NULL,
  `time_end` time NOT NULL,
  `file` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendar_id`, `title`, `description`, `schedule`, `time_first`, `time_end`, `file`, `link`) VALUES
(3, 'AMA Salmonation at PCID', '', '2021-12-18', '20:00:00', '22:00:00', '960327667a2f73b643be5601ce258e66.png', 'https://t.me/PejuangCryptoID');

-- --------------------------------------------------------

--
-- Table structure for table `join_team`
--

CREATE TABLE `join_team` (
  `join_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mail` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `telegram` varchar(100) NOT NULL,
  `project` varchar(50) NOT NULL,
  `time_submit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_team`
--

INSERT INTO `join_team` (`join_id`, `name`, `description`, `mail`, `phone`, `status`, `telegram`, `project`) VALUES
(5, 'Salmon', 'Belajar dari om salmon, mau bawa teknologi blockchain ke dalam ekosistem BUMN. Dimulai dari tempat saya bekerja saat ini.', 'febby.warrior@gmail.com', '081367614739', 'Follow Up', '@utomo_febby', 'DAO'),
(9, 'Hotden', 'Pelayanan keuangan yang terbuka dan transparan berbasis blockchain', 'hotden@rocketmail.com', '082257049027', 'Follow Up', 'HOTDEN PARULIAN SIMAMORA', 'DEFI'),
(10, '', '', '', '', 'Pending', '', ''),
(11, 'Eko Joko Saksono', 'Tim kreator NFT 2D, 3D, NFT effect &amp; pengembangan NFT Avatar 3D.\nTidak ada detail projek, just suggest idea for Gacha NFT &amp; minting NFT, create market di opensea.io FREE for all member &amp; holder Salmonation', 'ekojoko.vivo2@gmail.com', '08811680406', 'Follow Up', '@ekojokosaksono', 'MEME'),
(12, 'fian', 'Wallet basis web, bisa buat create unlimited wallet.\ndi dalemnya memungkinkan Swap, track, NFT trade dan lainnya ', 'herozaro9@gmail.com', '087873398838', 'Pending', '@TukangRiset', 'Lainnya'),
(13, 'bayu', 'Wadah yang menghubungkan berbagai unsur industri kreatif enertainment', 'bayu.fatullah@gmail.com', '0816750205', 'Pending', 'Bayu_Tanjung', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `publish` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `slug`, `description`, `author`, `publish`, `status`, `file`) VALUES
(4, 'Pertemuan dengan CoreTeam Travplay', 'pertemuan-dengan-coreteam-travplay', '<p>Om Salmon selaku founder salmonation bertemu dengan core team Travplay untuk membahas ekosistem Games.&nbsp;</p>\n\n<p>Dengan adanya pertemuan ini kita sepakat membangun dan mengembangkan ekosistem dan SDM yang berkualitas</p>\n\n<p>Tidak sampai disini, kita juga membahas banyak hal termasuk Ingin mengembangan Metaverse di dalam ekosistem Salmonation&nbsp;</p>\n', 'Gilang', '2021-12-25', 'Aktif', 'e56c734d173bf99202f8657db34dcaf3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int NOT NULL,
  `notification` varchar(150) NOT NULL,
  `author` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `time_notification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification`, `author`, `icon`) VALUES
(1, 'Insert News', 'Gilang', 'plus'),
(2, 'Delete News', 'Gilang', 'trash'),
(3, 'Delete News', 'Gilang', 'trash'),
(4, 'Delete News', 'Gilang', 'trash'),
(5, 'Delete News', 'Gilang', 'trash'),
(6, 'Delete News', 'Gilang', 'trash'),
(7, 'Delete News', 'Gilang', 'trash'),
(8, 'Edit Registration', 'Gilang', 'edit'),
(9, 'Insert News', 'Gilang', 'plus'),
(10, 'Add Video', 'Gilang', 'plus'),
(11, 'Edit Video', 'Gilang', 'edit'),
(12, 'Delete Video', 'Gilang', 'trash'),
(13, 'Edit News', 'Gilang', 'edit'),
(14, 'Add Team', 'Gilang', 'plus'),
(15, 'Add Schedule', 'Gilang', 'plus'),
(16, 'Add Video', 'Gilang', 'plus'),
(17, 'Edit Team', 'Gilang', 'edit'),
(18, 'Edit Schedule', 'Gilang', 'edit'),
(19, 'Edit News', 'Gilang', 'edit'),
(20, 'Edit Team', 'Gilang', 'edit'),
(21, 'Delete Registration', 'Gilang', 'trash'),
(22, 'Edit Schedule', 'Gilang', 'edit'),
(23, 'Edit Request Join Team', 'Gilang', 'edit'),
(24, 'Delete Request Join Team', 'Gilang', 'trash'),
(25, 'Edit Team', 'Gilang', 'edit'),
(26, 'Delete News', 'Gilang', 'trash'),
(27, 'Delete Video', 'Gilang', 'trash'),
(28, 'Delete Schedule', 'Gilang', 'trash'),
(29, 'Add Schedule', 'Gilang', 'plus'),
(30, 'Edit Schedule', 'Gilang', 'edit'),
(31, 'Add Team', 'Gilang', 'plus'),
(32, 'Edit Team', 'Gilang', 'edit'),
(33, 'Delete Team', 'Gilang', 'trash'),
(34, 'Edit Team', 'Gilang', 'edit'),
(35, 'Add Team', 'Gilang', 'plus'),
(36, 'Edit Team', 'Gilang', 'edit'),
(37, 'Edit Team', 'Gilang', 'edit'),
(38, 'Add Team', 'Gilang', 'plus'),
(39, 'Edit Team', 'Gilang', 'edit'),
(40, 'Edit Team', 'Gilang', 'edit'),
(41, 'Add User', 'Gilang', 'plus'),
(42, 'Edit Team', 'Gilang', 'edit'),
(43, 'Add Video', 'delscla', 'plus'),
(44, 'Edit Video', 'delscla', 'edit'),
(45, 'Edit Video', 'delscla', 'edit'),
(46, 'Edit Registration', 'delscla', 'edit'),
(47, 'Edit Request Join Team', 'delscla', 'edit'),
(48, 'Delete Request Join Team', 'delscla', 'trash'),
(49, 'Edit Request Join Team', 'delscla', 'edit'),
(50, 'Delete Request Join Team', 'delscla', 'trash'),
(51, 'Delete Request Join Team', 'delscla', 'trash'),
(52, 'Delete Registration', 'delscla', 'trash'),
(53, 'Delete Registration', 'delscla', 'trash'),
(54, 'Delete Registration', 'delscla', 'trash'),
(55, 'Delete Registration', 'delscla', 'trash'),
(56, 'Delete Registration', 'delscla', 'trash'),
(57, 'Delete Whitelist', 'Gilang', 'trash'),
(58, 'Delete Whitelist', 'Gilang', 'trash'),
(59, 'Delete Whitelist', 'Gilang', 'trash'),
(60, 'Edit Request Join Team', 'Gilang', 'edit'),
(61, 'Edit Team', 'Gilang', 'edit'),
(62, 'Insert News', 'Gilang', 'plus'),
(63, 'Edit News', 'Gilang', 'edit'),
(64, 'Delete Whitelist', 'Gilang', 'trash'),
(65, 'Delete Whitelist', 'Gilang', 'trash'),
(66, 'Delete Whitelist', 'Gilang', 'trash'),
(67, 'Delete Whitelist', 'Gilang', 'trash');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mail` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `telegram` varchar(100) NOT NULL,
  `project` varchar(50) NOT NULL,
  `time_submit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `name`, `description`, `mail`, `phone`, `status`, `telegram`, `project`) VALUES
(4, 'Lulung suprihatin', 'Terus berkembang', 'lukya593@gmail.com', '082322344264', 'Follow Up', '@lulung penjaga hati', 'GAMEFI'),
(8, '', '', '', '', 'Pending', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `job` varchar(40) NOT NULL,
  `file` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `ln` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `tw` text NOT NULL,
  `order_position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `job`, `file`, `status`, `ln`, `fb`, `ig`, `tw`, `order_position`) VALUES
(2, 'Salmon', 'Founder & CEO', '6413fbb3ea96c13b9906fd14d3d4d72a.png', 'Aktif', 'https://linkedin.com/in/', 'https://facebook.com/', 'https://instagram.com/', 'https://twitter.com/', 3),
(4, 'Galuh Aditia Putra', 'Community Development', '18a459627fe055e1b943f38b3df2ba19.png', 'Aktif', '', '', '', '', 2),
(5, 'Sri', 'Marketing Communication', '0e2cb9284987ecc37a705d9e1e97e9cf.png', 'Aktif', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `otp` int NOT NULL,
  `last_otp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`, `status`, `otp`, `last_otp`) VALUES
(1, 'Gilang', 'gilangpermana1407@gmail.com', 'c37fddfb7b3f538674c6e9a77e7bf486', 'Admin', 'Aktif', 1234, '2021-12-08 19:21:38'),
(3, 'delscla', 'delscla10@gmail.com', '1a4579e717808a98aef134c49bf8126a', 'Admin', 'Aktif', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `title`, `link`, `description`, `status`) VALUES
(3, 'Apresiasi dari Ketua DPRD KOTA BATAM , Untuk lahirnya Blockchain Indonesia.', 'https://www.youtube-nocookie.com/embed/5mfJu0WnyaI', 'Ucapan Apresiasi dr Dprd Kota Batam. untuk mahakarya anak bangsa, blockchain untuk ekosistem project di Indonesia. \n\nYang akan diKembangkan untuk memberikan manfaat bagi aktivitas , kreasi , dan sosial budaya . bagi masyarakat , bangsa dan Negara. \n\ndi prakasai oleh salmonation.\nyg berperan sebagai konsultan dan penasehat crypto. terkhusus tokenomic project crypto.  \n\ndan juga pengembangan akademi kompetensi untuk para pelaku pelaksana project dalam ekosistem di Indonesia.\n\nwww.salmonation.io\nwww.salmonchain.com', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `whitelist`
--

CREATE TABLE `whitelist` (
  `whitelist_id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `telegram` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bscaddress` varchar(100) NOT NULL,
  `join_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whitelist`
--

INSERT INTO `whitelist` (`whitelist_id`, `fullname`, `twitter`, `telegram`, `email`, `bscaddress`) VALUES
(3, 'Fitra dekan arfiandi', '@fitra1597', 'We lose', 'fitradekanarfiandi15@gmail.com', '0x58850dd47363B2B6d5056aE483c8253E5654911A'),
(4, 'Fadel reza ramadhan', '@farelTolemba', '@fareltolemba', 'farelrasya19@gmail.com', '0x49881D1E7f89F3163bF5254245F1d99A0e8E5828'),
(7, 'Nanang Dinar ', '@NaDiTOzzZ ', '@naditoz', 'dinarnanang91@gmail.com', '0x732Df4C18cF7b5Cbd715B3CF07801472033DE3Cc'),
(8, 'Aryo Susilo Jati', '@jatiaryo23', '@aryo', 'jatiaryo23@gmail.com', '0xa71454d25b0306c3396f6F96F4E2D8233f775824'),
(9, 'Febby Perwiro Utomo', '@fby_lim', '@utomo_febby', 'febby.warrior@gmail.com', '0x121E1573B7C6c15Aa4C036d54BFd2974Cf38a163'),
(10, 'pipinmoore', '@Nighmoore', '@Nighmoore', 'pipin.moore198@gmail.com', '0xfDf298E4745680146cEe97d77C5e6A9d70DE3F69'),
(12, 'Sapri', '@sapriplek', '@Holder', 'pleksapri@gmail.com', '0x3CA767566cF4330a4926293c9b6EeAd214a2C109'),
(13, 'Danu Darmanto', '@DarmantoDanu', '@DanuDm', 'danudarmanto13@gmail.com', '0xb9089480D94038d70a85248a21C50a84C2105D5D'),
(14, 'Ibnu mulyono saputro', 'ibnums7', 'Ibnums7', 'ibnumulyonoims@gmail.com', '0x8787ea8f958492C0f35e1b4FD789A28C51472d77'),
(18, 'Fikrin Gazali', 'Fikrin', 'Fiqras', 'fiqtrader17@gmail.com', '0x40f1533c8483bc979d747a88c19af11B18b4bd9b'),
(19, 'Dwi koko', '@Dwikoko13', '@Aeroxcy', 'kokonthol@gmail.com', '0x848537352015ecB526B302E382671D08247d01Ee');

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
-- Indexes for table `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`whitelist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `calendar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `join_team`
--
ALTER TABLE `join_team`
  MODIFY `join_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `whitelist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
