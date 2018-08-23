-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 23 août 2018 à 09:46
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `camagru`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_photo` int(6) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_photo`, `comment`, `date`) VALUES
(1, 2, 257, 'salut', '2018-08-21 17:26:18'),
(2, 2, 257, 'C\'est trop bien\r\n', '2018-08-21 17:30:05'),
(3, 2, 257, '<p><body>', '2018-08-21 17:30:36'),
(4, 2, 258, 'C\'est trop de la balle gros', '2018-08-22 08:29:44'),
(5, 2, 258, 'Francehement c\'est trop la classe wesh', '2018-08-22 08:34:53'),
(6, 2, 258, 'COUCOU', '2018-08-22 08:35:30'),
(7, 2, 258, 'TROP style l\'arbre t\'as vu', '2018-08-22 08:35:45'),
(8, 2, 258, 'COUCOU', '2018-08-22 08:36:12'),
(9, 2, 258, 'Franchement je kiffe', '2018-08-22 08:36:18'),
(10, 2, 258, 'C\'est trop de la bombe sisi', '2018-08-22 08:36:26'),
(11, 2, 244, 'COUCOU', '2018-08-22 08:37:17'),
(12, 2, 256, 'ARBRE', '2018-08-22 08:40:29'),
(13, 2, 256, 'TETE DE GLAND', '2018-08-22 08:40:41'),
(14, 2, 256, 'J\'adore les arbres', '2018-08-22 08:46:06'),
(15, 2, 258, 'niel 12 MINUTES AGO C\'est trop de la bombe sisi\r\n\r\nxniel 12 MINUTES AGO Franchemen', '2018-08-22 08:48:30'),
(16, 2, 258, 'niel 12 MINUTES AGO C\'est trop de la bombe sisi\r\n\r\nxniel 12 MINUTES AGO Franchement je kiffe\r\n\r\nxniel 12 MINUTES AGO COUCOU niel 12 MINUTES AGO TROP style l\'arbre t\'as vu xniel 13 MINUTES AGO COUCOU niel 13 MINUTES AGO Francehement c\'est trop la cla niel', '2018-08-22 08:48:50'),
(17, 2, 254, 'Un palmier wesh\r\n', '2018-08-22 08:55:31'),
(18, 2, 254, 'On adore les palmiers', '2018-08-22 08:55:38'),
(19, 2, 254, 'Trop bien', '2018-08-22 08:56:05'),
(20, 2, 254, 'Trop bien', '2018-08-22 08:56:50'),
(21, 2, 254, 'Trop bien', '2018-08-22 08:56:55'),
(22, 2, 254, 'Trop bien', '2018-08-22 08:57:26'),
(23, 2, 254, 'Trop bien', '2018-08-22 08:57:38'),
(24, 2, 254, 'salut', '2018-08-22 09:07:22'),
(25, 2, 254, 'salut', '2018-08-22 09:08:31'),
(26, 2, 254, 'salut', '2018-08-22 09:08:43'),
(27, 2, 254, 'salut', '2018-08-22 09:09:12'),
(28, 2, 254, 'salut', '2018-08-22 09:09:54'),
(29, 2, 254, 'salut', '2018-08-22 09:09:59'),
(30, 2, 254, 'salut', '2018-08-22 09:10:42'),
(31, 2, 254, 'salut', '2018-08-22 09:10:52'),
(32, 2, 247, 'Coucou', '2018-08-22 09:11:35'),
(33, 2, 247, 'Comment ca va ?', '2018-08-22 09:11:45'),
(34, 2, 247, 'Comment ca va ?', '2018-08-22 09:12:38'),
(35, 2, 247, 'Comment ca va ?', '2018-08-22 09:12:46'),
(36, 2, 247, 'Comment ca va ?', '2018-08-22 09:12:48'),
(37, 2, 247, 'Comment ca va ?', '2018-08-22 09:13:08'),
(38, 2, 247, 'Comment ca va ?', '2018-08-22 09:13:18'),
(39, 2, 247, 'Comment ca va ?', '2018-08-22 09:13:35'),
(40, 2, 247, 'Comment ca va ?', '2018-08-22 09:14:00'),
(41, 2, 247, 'Comment ca va ?', '2018-08-22 09:14:16'),
(42, 2, 247, 'Comment ca va ?', '2018-08-22 09:14:34'),
(43, 2, 247, '', '2018-08-22 09:14:45'),
(44, 2, 247, '', '2018-08-22 09:14:46'),
(45, 2, 247, '', '2018-08-22 09:14:58'),
(46, 2, 247, '', '2018-08-22 09:15:27'),
(47, 2, 247, '', '2018-08-22 09:15:37'),
(48, 2, 247, '', '2018-08-22 09:15:43'),
(49, 2, 247, '', '2018-08-22 09:16:13'),
(50, 2, 247, '', '2018-08-22 09:16:38'),
(51, 2, 247, 'Il ne faut pas ', '2018-08-22 09:16:59'),
(52, 2, 247, 'On peut ajouter plein de commentaires trop coll', '2018-08-22 09:17:16'),
(53, 2, 247, 'On peut ajouter plein de commentaires trop coll', '2018-08-22 09:17:19'),
(54, 2, 247, 'coucou', '2018-08-22 09:18:54'),
(55, 2, 243, 'salut', '2018-08-22 09:20:35'),
(56, 2, 243, 'c\'est génial ', '2018-08-22 09:20:46'),
(57, 2, 243, 'CAMAGRU', '2018-08-22 09:22:51'),
(58, 2, 243, '<p><body>', '2018-08-22 09:22:58'),
(59, 2, 243, '&lt;/html&gt;&lt;p&gt;&lt;span&gt;', '2018-08-22 09:26:04'),
(60, 2, 243, 'Essaie pas de m\'avoir toi', '2018-08-22 09:26:13'),
(61, 12, 258, 'Sisi la famille', '2018-08-22 10:02:28'),
(62, 12, 260, 'salut', '2018-08-22 10:11:45'),
(63, 12, 262, 'Salut', '2018-08-22 11:17:30'),
(64, 12, 262, 'Ce site est si beau', '2018-08-22 11:20:04'),
(65, 12, 262, 'On adore', '2018-08-22 11:21:02'),
(66, 12, 262, 'On veut le meme', '2018-08-22 11:21:08'),
(67, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 euros', '2018-08-22 11:21:22'),
(68, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros', '2018-08-22 11:21:24'),
(69, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en don', '2018-08-22 11:21:27'),
(70, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros', '2018-08-22 11:21:29'),
(71, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros', '2018-08-22 11:21:32'),
(72, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros\r\n\r\nkaaris 6 MINUTES AGO Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien', '2018-08-22 11:28:10'),
(73, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros\r\n\r\nkaaris 6 MINUTES AGO Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien', '2018-08-22 11:28:12'),
(74, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros\r\n\r\nkaaris 6 MINUTES AGO Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien', '2018-08-22 11:28:13'),
(75, 12, 262, 'Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 euros\r\n\r\nkaaris 6 MINUTES AGO Combien ca coute ? Je t\'en donne 10000 eurosCombien ca coute ? Je t\'en donne 10000 eurosCombien', '2018-08-22 11:28:16'),
(76, 12, 262, 'Coucou', '2018-08-22 13:18:53'),
(77, 12, 256, 'Salut', '2018-08-22 13:27:37'),
(78, 12, 277, 'rwerewrwe', '2018-08-22 15:01:12'),
(79, 12, 279, 'Coucou', '2018-08-22 15:09:03'),
(80, 12, 279, 'Les choses se ppppppppppppp\r\n', '2018-08-22 15:09:10'),
(81, 12, 281, 'Wesh l\'effet Sepia ca bute t\'as vu', '2018-08-22 15:59:42'),
(82, 12, 281, 'Trop styl&eacute;', '2018-08-22 15:59:47'),
(83, 12, 286, '&lt;p&gt;&lt;body&gt;', '2018-08-22 17:11:03'),
(84, 14, 286, 'Coucou !', '2018-08-23 06:52:36'),
(85, 14, 305, 'salut', '2018-08-23 13:35:51'),
(86, 14, 305, 'salut', '2018-08-23 13:36:11'),
(87, 14, 305, 'rewrewrwe', '2018-08-23 13:36:13'),
(88, 14, 305, 'rewrewrew', '2018-08-23 13:36:22'),
(89, 14, 305, 'rewrewrew', '2018-08-23 13:42:34'),
(90, 14, 305, 'rwerewrwerew', '2018-08-23 13:42:36'),
(91, 14, 305, 'YOOOOO', '2018-08-23 13:43:50'),
(92, 14, 305, 'salut', '2018-08-23 13:55:56'),
(93, 14, 305, 'SALUT', '2018-08-23 13:56:18'),
(94, 14, 305, 'TEST', '2018-08-23 13:56:22'),
(95, 14, 305, 'ALORS ???', '2018-08-23 13:57:44'),
(96, 14, 305, 'rewrewrewrew', '2018-08-23 13:58:43'),
(97, 14, 305, 'rewrewrewrew', '2018-08-23 13:58:55'),
(98, 14, 305, 'trtre', '2018-08-23 13:59:17'),
(99, 14, 305, 'rrrr', '2018-08-23 13:59:25'),
(100, 14, 305, 'reere', '2018-08-23 13:59:41'),
(101, 14, 305, 're', '2018-08-23 13:59:49'),
(102, 14, 305, 're', '2018-08-23 14:00:06'),
(103, 14, 305, 'rew', '2018-08-23 14:00:46'),
(104, 14, 305, 'rewrewrew', '2018-08-23 14:01:21'),
(105, 14, 305, 'rewrewrewrew', '2018-08-23 14:02:06'),
(106, 14, 305, 'rewrew', '2018-08-23 14:02:27'),
(107, 14, 305, 'rewrew', '2018-08-23 14:02:55'),
(108, 14, 305, 'rewrew', '2018-08-23 14:03:05'),
(109, 14, 305, 'rewewrewrwe', '2018-08-23 14:03:08'),
(110, 14, 305, 'rewewrewrwe', '2018-08-23 14:03:27'),
(111, 14, 305, 'rewrewrewrew', '2018-08-23 14:03:29'),
(112, 14, 305, 'Coucou !', '2018-08-23 14:07:15'),
(113, 14, 305, 'Coucou !', '2018-08-23 14:07:22'),
(114, 14, 305, 'Coucou', '2018-08-23 14:07:24'),
(115, 14, 305, 'rewrewrew', '2018-08-23 14:07:27'),
(116, 14, 305, 'rewrewrw', '2018-08-23 14:07:29'),
(117, 14, 299, 'J\'adore faire des commentaires c\'est trop bien', '2018-08-23 14:26:15'),
(118, 14, 299, 'Mais tellement', '2018-08-23 14:26:39'),
(119, 14, 299, 'C\'est pas les memes', '2018-08-23 14:28:01'),
(120, 14, 299, 'Re-test', '2018-08-23 14:28:22'),
(121, 14, 305, 'Hello', '2018-08-23 14:29:40'),
(122, 14, 300, 'Salut', '2018-08-23 14:31:12'),
(123, 14, 300, 'On fait des test', '2018-08-23 14:31:20'),
(124, 14, 300, 'La vie est si belle', '2018-08-23 14:31:33'),
(125, 14, 285, 'B2W !!!!!!!!!', '2018-08-23 16:41:24');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_photo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
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
(31, '2018-08-21 21:02:59', 254, 2),
(32, '2018-08-22 09:26:24', 244, 2),
(34, '2018-08-22 10:02:13', 259, 12),
(35, '2018-08-22 13:18:49', 262, 12),
(36, '2018-08-23 16:41:08', 304, 14);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(3) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `link` varchar(2083) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photos`
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
(258, '2', 'public/upload/20180821231310.png', '2018-08-21 21:13:11'),
(259, '2', 'public/upload/20180822115156.png', '2018-08-22 09:51:56'),
(260, '2', 'public/upload/20180822115212.png', '2018-08-22 09:52:12'),
(261, '2', 'public/upload/20180822115221.png', '2018-08-22 09:52:21'),
(262, '2', 'public/upload/20180822115234.png', '2018-08-22 09:52:34'),
(263, '12', 'public/upload/20180822153827.png', '2018-08-22 13:38:28'),
(264, '12', 'public/upload/20180822153900.png', '2018-08-22 13:39:01'),
(265, '12', 'public/upload/20180822153905.png', '2018-08-22 13:39:06'),
(266, '12', 'public/upload/20180822153918.png', '2018-08-22 13:39:18'),
(267, '12', 'public/upload/20180822154154.png', '2018-08-22 13:41:54'),
(268, '12', 'public/upload/20180822154230.png', '2018-08-22 13:42:30'),
(269, '12', 'public/upload/20180822154248.png', '2018-08-22 13:42:48'),
(270, '12', 'public/upload/20180822154400.png', '2018-08-22 13:44:01'),
(271, '12', 'public/upload/20180822154405.png', '2018-08-22 13:44:06'),
(272, '12', 'public/upload/20180822154432.png', '2018-08-22 13:44:33'),
(273, '12', 'public/upload/20180822154442.png', '2018-08-22 13:44:43'),
(274, '12', 'public/upload/20180822154540.png', '2018-08-22 13:45:41'),
(275, '12', 'public/upload/20180822154643.png', '2018-08-22 13:46:44'),
(276, '12', 'public/upload/20180822154651.png', '2018-08-22 13:46:51'),
(277, '12', 'public/upload/20180822154939.png', '2018-08-22 13:49:40'),
(278, '12', 'public/upload/20180822170756.png', '2018-08-22 15:07:56'),
(279, '12', 'public/upload/20180822170811.png', '2018-08-22 15:08:12'),
(280, '12', 'public/upload/20180822174046.png', '2018-08-22 15:40:46'),
(281, '12', 'public/upload/20180822175928.png', '2018-08-22 15:59:29'),
(282, '12', 'public/upload/20180822180241.png', '2018-08-22 16:02:42'),
(283, '12', 'public/upload/20180822181737.png', '2018-08-22 16:17:37'),
(284, '12', 'public/upload/20180822181746.png', '2018-08-22 16:17:47'),
(285, '12', 'public/upload/20180822183953.png', '2018-08-22 16:39:54'),
(286, '12', 'public/upload/20180822184353.png', '2018-08-22 16:43:53'),
(299, '14', 'public/upload/20180823113330.png', '2018-08-23 09:33:30'),
(300, '14', 'public/upload/20180823113336.png', '2018-08-23 09:33:37'),
(302, '14', 'public/upload/20180823113348.png', '2018-08-23 09:33:48'),
(304, '14', 'public/upload/20180823131234.png', '2018-08-23 11:12:35'),
(305, '14', 'public/upload/20180823131253.png', '2018-08-23 11:12:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `mail` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `active` int(2) NOT NULL,
  `code` varchar(128) NOT NULL,
  `notification` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `mail`, `login`, `password`, `active`, `code`, `notification`) VALUES
(1, 'Roger Moore', 'trestan.mervin@gmail.com', 'rmoore', '6852e42f621c64cfed477598730ddab0dcc8fd9e6647bb0e29a15b845d87125e796fa9ee718fb53845825e44be1d1d9c08cfe4ede3cf32b8c49a4711b87a8221', 1, '4e72a7a3de7e250', 1),
(2, 'Xavier Niel', 'trestan.mervin@gmail.com', 'trndlz', 'fd9d94340dbd72c11b37ebb0d2a19b4d05e00fd78e4e2ce8923b9ea3a54e900df181cfb112a8a73228d1f3551680e2ad9701a4fcfb248fa7fa77b95180628bb2', 1, '006da0082372b73', 0),
(3, 'Salut', 'trestan.mervin@gmail.com', '1234', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, 'd30dbb4a98a8cd3', 0),
(4, 'weewq', 'trestan.mervin@gmail.com', 'Pok', 'f2541c83b369b82e8047f044dfa8a80f334549061a2b8bacffc78e19867ddeaf959cf77c7b7bba28186069525c2cffa436e671572c7e60e08e33bcc5f0beefcd', 0, 'c7703d29d191380', 0),
(5, 'Takeshi', 'trestan.mervin@gmail.com', 'tkitano', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 1, '892fa05482c67d9', 0),
(6, 'Takesh', 'trestan.mervin@gmail.com', 'tkitano', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '477230fc038bcff', 0),
(7, 'Denis Bouanga', 'trestan.mervin@gmail.com', 'dbouanga', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '940ca9981179031', 0),
(8, 'Jean Michel', 'trestan.mervin@gmail.com', 'jmichel', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '5822af80675fd76', 0),
(9, 'Taule Didier', 'trestan.mervin@gmail.com', 'tdidier', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, 'fcb33d12f17dcb5', 0),
(10, 'Salut', 'trestan.mervin@gmail.com', 'psalut', '467b25293d78a786cf9bb60ab7d61311efc023eb3cd971142ad807a5698ccb9279eb2885341ce5836dc31dbfb5a43015406c0e11705d4a543df9919516921e57', 0, '4a1d362c0c43104', 0),
(11, 'Hello WOrl', 'trestan.mervin@gmail.com', 'hello', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, '655c840b92f5bb4', 0),
(12, 'Kaaris', 'trestan.mervin@gmail.com', '<p><body>', 'fd9d94340dbd72c11b37ebb0d2a19b4d05e00fd78e4e2ce8923b9ea3a54e900df181cfb112a8a73228d1f3551680e2ad9701a4fcfb248fa7fa77b95180628bb2', 1, 'c009b3b779a58b8', 0),
(13, 'Ademo', 'trestan.mervin@gmail.com', 'ademo', '38290ade65df2416dbfcae10e1c473fa872ef55d35c0acd6594e808fedb708a59c5a1a2214712e363c98e7f13d7829446d537c6232ab37a48c00f7b6eac285b5', 1, 'e5db16ab93f027a', 0),
(14, 'Romain', 'trestan.mervin@gmail.com', 'romain', 'fd9d94340dbd72c11b37ebb0d2a19b4d05e00fd78e4e2ce8923b9ea3a54e900df181cfb112a8a73228d1f3551680e2ad9701a4fcfb248fa7fa77b95180628bb2', 1, '0fff38e001c19ad', 0),
(15, 'Salut', 'trestan.mervin@gmail.com', 'coucou', '21d5cb651222c347ea1284c0acf162000b4d3e34766f0d00312e3480f633088822809b6a54ba7edfa17e8fcb5713f8912ee3a218dd98d88c38bbf611b1b1ed2b', 0, 'e3b83983baffab3', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
