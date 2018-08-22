-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2018 at 11:05 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_photo` int(6) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_photo`, `comment`, `date`) VALUES
(1, 2, 257, 'salut', '2018-08-21 17:26:18'),
(2, 2, 257, 'C\'est trop bien\r\n', '2018-08-21 17:30:05'),
(3, 2, 257, '<p><body>', '2018-08-21 17:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_photo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id_like`, `date`, `id_photo`, `id_user`) VALUES
(11, '2018-08-21 07:18:08', 246, 2),
(15, '2018-08-21 07:22:31', 249, 2),
(16, '2018-08-21 07:28:09', 249, 2),
(17, '2018-08-21 07:28:38', 249, 2),
(18, '2018-08-21 07:54:24', 249, 2),
(19, '2018-08-21 08:06:44', 247, 2),
(20, '2018-08-21 08:08:19', 247, 2),
(21, '2018-08-21 08:08:46', 247, 2),
(22, '2018-08-21 08:09:57', 247, 2),
(23, '2018-08-21 08:10:40', 247, 2),
(24, '2018-08-21 08:11:12', 247, 2),
(25, '2018-08-21 08:11:22', 247, 2),
(26, '2018-08-21 08:22:17', 251, 2),
(27, '2018-08-21 08:23:28', 251, 2),
(28, '2018-08-21 08:30:18', 252, 2),
(30, '2018-08-21 21:02:55', 256, 2),
(31, '2018-08-21 21:02:59', 254, 2);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(3) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `link` varchar(2083) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id_photo`, `id_user`, `link`, `date`) VALUES
(243, '1', 'public/upload/20180820133925.png', '2018-08-20 11:39:26'),
(244, '2', 'public/upload/20180820134259.png', '2018-08-20 11:43:00'),
(245, '2', 'public/upload/20180820144530.png', '2018-08-20 12:45:31'),
(246, '2', 'public/upload/20180820144637.png', '2018-08-20 12:46:37'),
(247, '2', 'public/upload/20180820145827.png', '2018-08-20 12:58:27'),
(248, '2', 'public/upload/20180820164033.png', '2018-08-20 14:40:33'),
(249, '2', 'public/upload/20180821092045.png', '2018-08-21 07:20:46'),
(250, '2', 'public/upload/20180821100459.png', '2018-08-21 08:05:00'),
(251, '2', 'public/upload/20180821100507.png', '2018-08-21 08:05:07'),
(252, '2', 'public/upload/20180821100527.png', '2018-08-21 08:05:28'),
(253, '2', 'public/upload/20180821102931.png', '2018-08-21 08:29:32'),
(254, '2', 'public/upload/20180821113448.png', '2018-08-21 09:34:48'),
(255, '2', 'public/upload/20180821113505.png', '2018-08-21 09:35:06'),
(256, '2', 'public/upload/20180821165826.png', '2018-08-21 14:58:27'),
(257, '2', 'public/upload/20180821183254.png', '2018-08-21 16:32:55'),
(258, '2', 'public/upload/20180821231310.png', '2018-08-21 21:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `mail` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `active` int(2) NOT NULL,
  `code` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `mail`, `login`, `password`, `active`, `code`) VALUES
(1, 'Roger Moore', 'trestan.mervin@gmail.com', 'rmoore', '6852e42f621c64cfed477598730ddab0dcc8fd9e6647bb0e29a15b845d87125e796fa9ee718fb53845825e44be1d1d9c08cfe4ede3cf32b8c49a4711b87a8221', 1, '4e72a7a3de7e250'),
(2, 'Xavier Niel', 'trestan.mervin@gmail.com', 'xniel', 'fd9d94340dbd72c11b37ebb0d2a19b4d05e00fd78e4e2ce8923b9ea3a54e900df181cfb112a8a73228d1f3551680e2ad9701a4fcfb248fa7fa77b95180628bb2', 1, '006da0082372b73'),
(3, 'Salut', 'trestan.mervin@gmail.com', '1234', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, 'd30dbb4a98a8cd3'),
(4, 'weewq', 'trestan.mervin@gmail.com', 'Pok', 'f2541c83b369b82e8047f044dfa8a80f334549061a2b8bacffc78e19867ddeaf959cf77c7b7bba28186069525c2cffa436e671572c7e60e08e33bcc5f0beefcd', 0, 'c7703d29d191380'),
(5, 'Takeshi', 'trestan.mervin@gmail.com', 'tkitano', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 1, '892fa05482c67d9'),
(6, 'Takesh', 'trestan.mervin@gmail.com', 'tkitano', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '477230fc038bcff'),
(7, 'Denis Bouanga', 'trestan.mervin@gmail.com', 'dbouanga', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '940ca9981179031'),
(8, 'Jean Michel', 'trestan.mervin@gmail.com', 'jmichel', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '5822af80675fd76'),
(9, 'Taule Didier', 'trestan.mervin@gmail.com', 'tdidier', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, 'fcb33d12f17dcb5'),
(10, 'Salut', 'trestan.mervin@gmail.com', 'psalut', '467b25293d78a786cf9bb60ab7d61311efc023eb3cd971142ad807a5698ccb9279eb2885341ce5836dc31dbfb5a43015406c0e11705d4a543df9919516921e57', 0, '4a1d362c0c43104'),
(11, 'Hello WOrl', 'trestan.mervin@gmail.com', 'hello', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '655c840b92f5bb4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
