-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2022 at 08:21 AM
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
(3, 'AMA Salmonation at PCID', '', '2021-12-18', '20:00:00', '22:00:00', '960327667a2f73b643be5601ce258e66.png', 'https://t.me/PejuangCryptoID'),
(4, 'Happy New Year 2022', '<p><img alt=\"heart\" src=\"https://cdn.ckeditor.com/4.13.1/full/plugins/smiley/images/heart.png\" style=\"height:23px; width:23px\" title=\"heart\" />&nbsp;Selamat Tahun Baru 2022&nbsp;<img alt=\"heart\" src=\"https://cdn.ckeditor.com/4.13.1/full/plugins/smiley/images/heart.png\" style=\"height:23px; width:23px\" title=\"heart\" /></p>\n\n<p>Segenap keluarga besar Salmonation mendoakan, Semoga diberikan kelimpahan kesehatan , rejeki , dan juga kemakmuran di tahun 2022 ini.&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Salam Salmonesia&nbsp;</p>\n\n<p>Jaya Jaya Jaya</p>\n\n<p>&nbsp;</p>\n', '2022-01-01', '00:01:00', '00:05:00', 'f94b1f2fce4c040f2bbd0f0d9c992a3c.jpg', 'https://salmonation.io/');

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
(13, 'bayu', 'Wadah yang menghubungkan berbagai unsur industri kreatif enertainment', 'bayu.fatullah@gmail.com', '0816750205', 'Pending', 'Bayu_Tanjung', 'Lainnya'),
(14, 'Team Leader', 'siap support Surabaya dan Jawa Timur om Salmon ', 'imron.mashoed@gmail.com', '083856951800', 'Pending', 'imron mashoed', 'Lainnya'),
(15, 'Esi Susanti', 'pasien English\nSosialita\nadmin\n\n', 'esi.susanty@gmail.com', '081221338926', 'Pending', 'Esi Susanti', 'Lainnya');

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
(4, 'Pertemuan dengan CoreTeam Travplay', 'pertemuan-dengan-coreteam-travplay', '<p>Om Salmon selaku founder salmonation bertemu dengan core team Travplay untuk membahas ekosistem Games.&nbsp;</p>\n\n<p>Dengan adanya pertemuan ini kita sepakat membangun dan mengembangkan ekosistem dan SDM yang berkualitas</p>\n\n<p>Tidak sampai disini, kita juga membahas banyak hal termasuk Ingin mengembangan Metaverse di dalam ekosistem Salmonation&nbsp;</p>\n', 'Gilang', '2021-12-25', 'Aktif', '9bbcf9035657aa5771c481a7be1edc06.png'),
(5, 'Terbentuknya PT. SALMONATION UNTUK INDONESIA (SUI)', 'terbentuknya-pt-salmonation-untuk-indonesia-sui', '<p>Telah resmi berdirinya PT. Salmonation Untuk Indonesia (SUI), sebagai dari bentuk keseriusan SALMONATION memajukan teknologi Blockchain yang ada di Indonesia.</p>\n\n<p>Dengan resminya SALMONATION menjadi PT juga, menjadi suatu tanda bahwa SALMONATION berupaya untuk terus bergerak mengikuti aturan hukum yang ada, karena dengan ini semua SALMONATION telah resmi berbentuk&nbsp;LBH hukum.</p>\n', 'Gilang', '2021-12-30', 'Aktif', '3851017e27c1341f8c6786220a360885.jpeg');

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
(67, 'Delete Whitelist', 'Gilang', 'trash'),
(68, 'Edit News', 'Gilang', 'edit'),
(69, 'Delete Whitelist', 'Gilang', 'trash'),
(70, 'Delete Whitelist', 'Gilang', 'trash'),
(71, 'Delete Whitelist', 'Gilang', 'trash'),
(72, 'Delete Whitelist', 'Gilang', 'trash'),
(73, 'Edit Team', 'Gilang', 'edit'),
(74, 'Edit Team', 'Gilang', 'edit'),
(75, 'Edit Team', 'Gilang', 'edit'),
(76, 'Edit Team', 'Gilang', 'edit'),
(77, 'Edit Team', 'Gilang', 'edit'),
(78, 'Edit Team', 'Gilang', 'edit'),
(79, 'Edit Team', 'Gilang', 'edit'),
(80, 'Add Team', 'Gilang', 'plus'),
(81, 'Add Team', 'Gilang', 'plus'),
(82, 'Insert News', 'Gilang', 'plus'),
(83, 'Edit News', 'Gilang', 'edit'),
(84, 'Add Video', 'Gilang', 'plus'),
(85, 'Edit Video', 'Gilang', 'edit'),
(86, 'Edit Video', 'Gilang', 'edit'),
(87, 'Edit Video', 'Gilang', 'edit'),
(88, 'Edit Video', 'Gilang', 'edit'),
(89, 'Edit Team', 'Gilang', 'edit'),
(90, 'Edit Team', 'Gilang', 'edit'),
(91, 'Edit Team', 'Gilang', 'edit'),
(92, 'Add Team', 'Gilang', 'plus'),
(93, 'Add Team', 'Gilang', 'plus'),
(94, 'Add Schedule', 'Gilang', 'plus'),
(95, 'Add User', 'Gilang', 'plus');

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
(2, 'Salmon', 'Founder & CEO', '64d2b403f50a9b920c53f659b574e0fa.png', 'Aktif', 'https://linkedin.com/in/', 'https://facebook.com/', 'https://instagram.com/', 'https://twitter.com/', 3),
(4, 'Fahmi', 'Business Development', '4d2ed6750d1cfc6a2dfb7fc3ff286426.png', 'Aktif', '', '', '', '', 2),
(5, 'Sri', 'Marketing Communication', 'a080a1eb40fce22d7567f296e84dc958.png', 'Aktif', '', '', '', '', 2),
(6, 'Rambu', 'Graphic Designer', 'b22628b4f227cbb21d467a8b7ccbcaa1.png', 'Aktif', '', '', '', '', 2),
(7, 'Gilang', 'SR Programmer', '05a7848ec47b165a0503109ebef5ac2c.png', 'Aktif', '', '', '', '', 2),
(8, 'Cahya', 'Junior Development', '55d0d5f23add95c0ef08a885991275f2.png', 'Aktif', '', '', '', '', 2),
(9, 'Galuh', 'Community Development', '3c359438eb2a3942e98d63d9aaa62825.png', 'Aktif', '', '', '', '', 2);

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
(3, 'delscla', 'delscla10@gmail.com', '1a4579e717808a98aef134c49bf8126a', 'Admin', 'Aktif', 0, '0000-00-00 00:00:00'),
(4, 'salmon', 'salmonmeidy@gmail.com', 'bd146e10561f25925dabb877361d2e8d', 'Admin', 'Aktif', 0, '0000-00-00 00:00:00');

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
(3, 'Apresiasi dari Ketua DPRD KOTA BATAM , Untuk lahirnya Blockchain Indonesia.', 'https://www.youtube-nocookie.com/embed/5mfJu0WnyaI', 'Ucapan Apresiasi dr Dprd Kota Batam. untuk mahakarya anak bangsa, blockchain untuk ekosistem project di Indonesia. \n\nYang akan diKembangkan untuk memberikan manfaat bagi aktivitas , kreasi , dan sosial budaya . bagi masyarakat , bangsa dan Negara. \n\ndi prakasai oleh salmonation.\nyg berperan sebagai konsultan dan penasehat crypto. terkhusus tokenomic project crypto.  \n\ndan juga pengembangan akademi kompetensi untuk para pelaku pelaksana project dalam ekosistem di Indonesia.\n\nwww.salmonation.io\nwww.salmonchain.com', 'Aktif'),
(4, 'Apresiasi dari Ketua DPW partai Perindo Sulawesi Barat, Bpk. Muhamad Yasin Hakim', 'https://www.youtube.com/embed/C_Yg0GzpncI', 'Terima kasih atas dukungan dari Ketua Dpw Perindo Provinsi Sulawesi Barat. Bapak Muhamad Yasin Hakim. \n\nUntuk terbentuknya Blockchain Indonesia , oleh Salmonation. semoga ekosistem yg akan kami bangun bisa bermanfaat bagi warga Sulawesi Barat dan Bangsa Indonesia. \n', 'Aktif');

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
(19, 'Dwi koko', '@Dwikoko13', '@Aeroxcy', 'kokonthol@gmail.com', '0x848537352015ecB526B302E382671D08247d01Ee'),
(22, 'Kunto aji', '@kuntoaji22', '@Kuntoaji1', 'ajikunto239@gmail.com', '0xbE2Efb30E4CCdACEbbf368BF970b773C96949526'),
(25, 'Arif Romadhon', '@naila_silviatun', '@liaputriam', 'arifromansa02@gmail.com', '0xe0413C27c22f57DFdD964FB10ED2b2e7f51F99e3'),
(26, 'Febby Perwiro Utomo', '@fby_lim', '@utomo_febby', 'febby.warrior@gmail.com', '0x121E1573B7C6c15Aa4C036d54BFd2974Cf38a163'),
(27, 'Brian Timothy', '@Beatimothyyy', '@Btimothy', 'briantimothy001@gmail.com', '0xEf562c53DCa83CF22d8F3193E7DB68e54Dfc7df9'),
(28, 'Celia widjaya', 'Celia_Widjaya89', 'Celia widjaya', 'fennyyuliana.fy89@gmail.com', '0x4e02b7c3ccf50D31CC2bc2367Aa5E743150d5395'),
(29, 'NANANG DINAR ARIYANTO', '@NaDiTOzzZ ', '@naditoz', 'dinarnanang91@gmail.com', '0x732Df4C18cF7b5Cbd715B3CF07801472033DE3Cc'),
(30, 'Dicki pramana', 'rere_rara15', 'dikipp', 'zzdickizz@gmail.com', '0xB1550D9adC25bb9822A9f04E54A9F31A57f01c9D'),
(31, 'Dimas Panca Irawan', '@dimazpanca', '@rodheemz', 'dimaz.panca@gmail.com', 'Lorong 19v No.7, Rt.001, Rw.006, Kel.Koja,Kec.Koja'),
(32, 'Sutejo', '@JawirJoe', '@joe', 'jamesjois0@gmail.com', '0x4DfC0F4A321651366432377F543740807fAc7c42'),
(33, 'Lim Teddy', '@lim_tdy', 'SoldierS', 'lim.tdy2@gmail.com', '0x3C9bBDDC65993Bb70A01c21FCC39B5a7a889FAAe'),
(34, 'Sutejo', '@jawirJoe', '@joe', 'jamesjois0@gmail.com', '0x4DfC0F4A321651366432377F543740807fAc7c42'),
(35, 'ANDRY JULIAN', '@Andriaanjulian_', 'Andry julian', 'aanjuli221@gmail.com', '0x91bA03561271445b0827f9580eeEA0873995fDDC'),
(36, 'Celia widjaya', 'Celia_Widjaya89', 'Celia widjaya', 'fennyyuliana.fy89@gmail.com', '0x4e02b7c3ccf50D31CC2bc2367Aa5E743150d5395'),
(37, 'kiki zaenal mutaqin', '@KIKIZAENALMTQN1', '@DXTHEWR', 'kikithepublic16@gmail.com', '0x26434901A73aAb5835B577635aFBaCa8Eb4EB541'),
(38, 'Dimas Panca Irawan', '@dimazpanca', '@rodheemz', 'dimaz.panca@gmail.com', 'Lorong 19v No.7, Rt.001, Rw.006, Kel.Koja,Kec.Koja'),
(39, 'iyang dimas januar', '@yangssz', '@iyangdj', 'iyangdimas9i21@gmail.com', '0x24590b2142390d7145fEE4Aa01c71194EBB25dec'),
(40, 'army yanuar mauludi', 'army72239333', 'yanuar090182', 'army.ym@gmail.com', '0x062a6976A2e4719E3Ce74cE11805Fd66C304e39C'),
(41, 'hayabusa', 'hayabusa_prp', 'hayabusa', 'hayabusa.pro989@gmail.com', '0xA4B808a9a957eFeDfc3b690F50F8FC65C970AA4a'),
(42, 'fadli fatahillah', 'fadli_fe', 'fdlfatahillah', 'membertraderjks@gmail.com', '0x46274E35b360CC0a29c21dfE35EebAC79d38cBaa'),
(43, 'M ABDUL ASRORI', '@MAASRORI1', '@ABDULASRORI1', 'muhamadabdulasrori@gmail.com', '0x6C0b67474Eb3Eb138621CA38feA493b5675460eE'),
(44, 'Angga indrawan', '@Anggain56624591', '@Anggaindrwn', 'anggaesa2@gmail.com', '0x5F4d8EaAA2446819ABE783B33a70FCd1fD8084FB'),
(45, 'Imamsafaat', '@ImamSafaat17', '@bonjol19', 'misterbonjol11@gmail.com', '0xA333B6655C16E73F001e01481219720a6F2D3696'),
(46, 'Rizky Hidayat Mawardi', '@r_mawardi_', '@rhm3095', 'rizkyhmawardi@gmail.com', '0x31508e05eFB0114104d2a3F5C9Cb74755CdABc45'),
(47, 'Gandi Suparlan', '@GandiSuparlan', '@bisdock', 'adi.meires@gmail.com', '0x0fA074cbd0c13f6449F6093552c868dE1F76B294'),
(48, 'Jimmy tangeleng', '@jimmytancrypto', '@bumnXTRAesharkEKTAjagokuNANOBYTE', 'jimbatam@gmail.com', '0x847DE2bF48Bd5A12c1C77Cc36649454d16DEBda3'),
(49, 'M iqbal', '@bale_135', '@Zinxcx', 'iqbal.pariansya@gmail.com', '0xB3F5fBcF88192ACC8d013a26e54c574865450C06'),
(50, 'Leonardo Adhitya Irawan', '@leonardoadhitya', 'Leonardo Adhitya', 'leonardoadhitya@yahoo.com', '0xEe08dD970be3a6E843172572D927b84919BE74bB'),
(51, 'Julian Aditya Saputra', 'Julianadityas', 'Julianadityas', 'julianaditya24@gmail.com', '0xA460196AE9132355A50fD6369f1100e17297b070'),
(52, 'HARDI WIJAYA SUSILO', 'hardilo93', 'hardilo', 'hardyzlo1@gmail.com', '0xE996e4cF4Ff5B246C4BEf05DfD6ED39b7d42D12a'),
(53, 'Vinson', '@Kuronae26', '@sandwich2666', 'vinsonchangg@gmail.com', '0x821c7Df87dda8f52D306851543383146E181Ac69'),
(54, 'Azam', '@Azam56295976', '@culuknah', 'azam.habrahab@gmail.com', '0x4EBF71fB6ab5fF33c435c31F8132F8B4A05cfceB'),
(55, 'Muhammad Abdul Wahab', '@Wahab98296254', '@Wahabbahaw98', 'wahabbahaw10@gmail.com', '0xcf9B080Fb8a75C7978343726c952B6836E3e98eD'),
(56, 'Mohamad Aflah Ash Shiddiqy', 'saddae30', 'aflah_30', 'diqy300101@gmail.com', '0xcc669Fff460391eCb07a3c09C44831F5581c4349'),
(57, 'Muhamad Dio', '@diofateeh', '@dio_cass', 'dioaf2@gmail.com', '0x8e457a1640fBCBE8f612C055B29523c8e2Ab9164'),
(58, 'Ahmad supriyadi', 'Ahmad supriyadi', 'Ahmad supriyadi', 'amad.ajah10@gmail.com', '0x003cf4FdF732B21fa17d67C701f28b2cA286d188'),
(59, 'Petrus setiadi nugroho', '@petrussetiadi', '@InitialPsn', 'adipetrus93@gmail.com', '0x058F6AadfF25dB877D608D78eD9FD11A20D5dD5F'),
(60, 'Hasdi', '@Lil_cloud13', '@lilcloud13', 'hasdy.dm@gmail.com', '0xCEfe7a632f3aeAcc7e8409422CcB306c6494cCf5'),
(61, 'Bob paryanto', 'Robbba', 'Bos bob', 'paryanyo17bob@gmail.com', '0x975984C70E535d9F35718d2D403a5e90D2f859d3');

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
  MODIFY `calendar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `join_team`
--
ALTER TABLE `join_team`
  MODIFY `join_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `whitelist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
