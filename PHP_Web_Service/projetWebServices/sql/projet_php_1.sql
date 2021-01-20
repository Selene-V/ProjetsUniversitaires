-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 déc. 2020 à 15:00
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_php_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `registerAt` datetime NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `firstName`, `lastName`, `email`, `registerAt`, `password`) VALUES
(14, 'utilisateur labmodifsf', 'utmosssff', 'labmodsfqsf', 'utlab@gmail.com lifssgdfhsgjsrhs', '2020-11-17 16:29:05', '$2y$10$EPD8l6Zf7S1oqwNf9T7sKeBn.l5BjCJOi1ArFCQkAQhE3A2dwL5F6'),
(15, 'jean', 'etzeqsdfghjk', 'hhgf', 'fdg', '2020-11-17 16:47:06', '$2y$10$44GN4gsXR3mXUDx8ZbsqxueJL.UTahvMTxx2hAYEMayJvf1SashzK'),
(16, 'admin', 'admin', 'admin', 'admin@admin.fr', '2020-11-25 11:38:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(19, 'username1', 'prenom1', 'nom1', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(20, 'username2', 'prenom2', 'nom2', 'email2@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(21, 'username3', 'prenom3', 'nom3', 'email3@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(22, 'username4', 'prenom4', 'nom4', 'email4@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(23, 'username5', 'prenom5', 'nom5', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(24, 'username6', 'prenom6', 'nom6', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(25, 'username7', 'prenom7', 'nom7', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(26, 'username8', 'prenom8', 'nom8', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(27, 'username9', 'prenom9', 'nom9', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(28, 'username10', 'prenom10', 'nom10', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(29, 'username11', 'prenom11', 'nom11', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(30, 'username12', 'prenom12', 'nom12', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(31, 'username13', 'prenom13', 'nom13', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(32, 'username14', 'prenom14', 'nom14', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(33, 'username15', 'prenom15', 'nom15', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(34, 'username16', 'prenom16', 'nom16', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(35, 'username17', 'prenom17', 'nom17', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(36, 'username18', 'prenom18', 'nom18', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(37, 'username19', 'prenom19', 'nom19', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte'),
(38, 'username20', 'prenom20', 'nom20', 'email1@gmail.com', '2020-11-27 16:00:00', 'mdpNonCrypte');

-- --------------------------------------------------------

--
-- Structure de la table `possibleanswer`
--

CREATE TABLE `possibleanswer` (
  `id` int(4) NOT NULL,
  `question` int(4) NOT NULL,
  `label` varchar(100) NOT NULL,
  `isRight` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `possibleanswer`
--

INSERT INTO `possibleanswer` (`id`, `question`, `label`, `isRight`) VALUES
(1, 40, 'a', 0),
(2, 40, 'b', 0),
(3, 40, 'c', 1),
(4, 40, 'd', 0),
(5, 41, 'sds', 0),
(6, 41, 'sds', 0),
(7, 41, 'ss', 1),
(8, 41, 's', 0),
(9, 42, 'ae', 1),
(10, 42, 'zr', 0),
(11, 42, 'et', 0),
(12, 42, 'ry', 0),
(13, 43, 'd', 1),
(14, 43, 'z', 0),
(15, 43, 'r', 0),
(16, 43, 'i', 0),
(17, 44, '^sxw<dqsf', 1),
(18, 44, 'dqfds', 0),
(19, 44, 'qs', 0),
(20, 44, 'pol', 0);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(4) NOT NULL,
  `label` varchar(100) NOT NULL,
  `theme` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `label`, `theme`) VALUES
(40, 'test', 16),
(41, 'azerty ?', 16),
(42, 'aaaa', 17),
(43, 'questiooooooooooooooooonn ?', 16),
(44, 'azertyuiop', 16),
(45, 'fait il bon ?', 16),
(46, 'allo ?', 16);

-- --------------------------------------------------------

--
-- Structure de la table `question_quizz`
--

CREATE TABLE `question_quizz` (
  `id` int(4) NOT NULL,
  `id_quizz` int(4) NOT NULL,
  `id_question` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question_quizz`
--

INSERT INTO `question_quizz` (`id`, `id_quizz`, `id_question`) VALUES
(1, 1, 40),
(2, 1, 41),
(3, 1, 43),
(4, 1, 44),
(5, 10, 46),
(6, 10, 43),
(7, 10, 45),
(8, 10, 40),
(9, 11, 41),
(10, 11, 40),
(11, 11, 43),
(12, 11, 46),
(13, 12, 45),
(14, 12, 40),
(15, 12, 46),
(16, 12, 44),
(17, 13, 44),
(18, 13, 41),
(19, 13, 46),
(20, 13, 43),
(21, 14, 44),
(22, 14, 41),
(23, 14, 45),
(24, 14, 43),
(25, 15, 43),
(26, 15, 44),
(27, 15, 46),
(28, 15, 45);

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

CREATE TABLE `quizz` (
  `id` int(11) NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `user1` int(4) NOT NULL,
  `user2` int(4) DEFAULT NULL,
  `startAt` datetime NOT NULL,
  `winner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`id`, `mode`, `user1`, `user2`, `startAt`, `winner`) VALUES
(1, 0, 1, NULL, '2020-12-01 18:54:00', 1),
(2, 1, 2, 3, '2020-12-01 18:55:00', 3),
(3, 0, 1, NULL, '2020-12-29 16:30:52', NULL),
(4, 0, 1, NULL, '2020-12-29 16:31:38', NULL),
(5, 0, 1, NULL, '2020-12-29 16:32:25', NULL),
(6, 0, 1, NULL, '2020-12-29 16:33:16', NULL),
(7, 0, 1, NULL, '2020-12-29 16:34:21', NULL),
(8, 0, 1, NULL, '2020-12-29 16:34:52', NULL),
(9, 0, 1, NULL, '2020-12-29 16:35:48', NULL),
(10, 0, 1, NULL, '2020-12-29 16:37:04', NULL),
(11, 0, 1, NULL, '2020-12-29 16:40:09', NULL),
(12, 0, 1, NULL, '2020-12-29 17:09:18', NULL),
(13, 0, 2, NULL, '2020-12-29 17:17:19', NULL),
(14, 0, 2, NULL, '2020-12-29 17:20:13', NULL),
(15, 0, 5, NULL, '2020-12-30 14:30:28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `quizz_answers`
--

CREATE TABLE `quizz_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `isRight` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(4) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `nom`) VALUES
(16, 'theme2'),
(17, 'theme3');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `registerAt` datetime NOT NULL,
  `point` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `registerAt`, `point`, `password`) VALUES
(1, 'test01', 'jean', 'dupont', 'jeandupont@gmail.com', '2020-11-19 10:00:00', 0, 'passwordcrypté'),
(2, 'test02', 'mathieu', 'deslilas', 'mathieudeslilas@gmail.com', '2020-12-01 18:52:00', 0, 'passwordcrypté'),
(3, 'test03', 'micheline', 'rose', 'michelinerose@gmail.com', '2020-12-01 18:52:00', 0, 'passwordcrypté'),
(4, 'test04', 'sophie', 'pain', 'sophiepain@gmail.com', '2020-12-01 18:53:00', 0, 'passwordcrypté'),
(5, 'test05', 'george', 'rouge', 'azerty@gmail.com', '2020-12-21 18:49:51', 0, '$2y$10$x2bE3DumAdd2H6gBXZ0XW.AFJozylZ40WVAijiYpeE8KwnxCA9jXG'),
(6, 'test05', 'george', 'rouge', 'azerty@gmail.com', '2020-12-21 18:53:21', 0, '$2y$10$APKt7DLY5t1fDOEVB3P2k.K2agWhPjVEn7840JFQtXlVYoENo.9Om'),
(7, 'test07', 'georgette', 'blue', 'gb@gmail.com', '2020-12-21 19:48:52', 0, '$2y$10$VsjLv3NRpzdI04VxJi77DOAdkv9vO2pcX9Y4KI2mR5hGwlp2UT/96'),
(8, 'test07', 'georgette', 'blue', 'gb@gmail.com', '2020-12-21 20:22:19', 0, '$2y$10$5PBfrw2o5X7cP9s14hr.xepNigwszwpAWR.9tD.fOTICxhPJLoo3m'),
(9, 'test07', 'georgette', 'blue', 'gb@gmail.com', '2020-12-21 20:43:34', 0, '$2y$10$UEnfF6RuSWFH6ATsb5ks7eMRW6cOkD1G6gAPROrPthFyFpCcKqwOO'),
(10, 'test07', 'georgette', 'blue', 'gb@gmail.com', '2020-12-21 20:47:40', 0, '$2y$10$wRv59qWBIrtQaMJGuWa8tuXmE.Ya4f5RN8kYBw8Fp5aT6xqJh25wW'),
(11, 'testmail1', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:01:24', 0, '$2y$10$rKqUZgxt00kjn82/gg5VZer0bmRm9SIHXvBPOb6dQ.mSDX5djzPaq'),
(12, 'testmail2', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:06:31', 0, '$2y$10$rG5CjVIP73gbgbxMHCNTCef58GysaN/6V68x5jYPTMHQeFdGf8tom'),
(13, 'testmail3', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:09:21', 0, '$2y$10$AVQsrC./ZI.HPo6bEpsrI.Zv/ctgN8YFpgA03BHcVIDH//165NIxi'),
(14, 'testmail4', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:13:52', 0, '$2y$10$NaNBGKEfF10EbYw9ASyosuk9Tj8gl2jpoDrRdBgEDeyLlLpLF/QJS'),
(15, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:16:41', 0, '$2y$10$ZyT7JBb0h.MQW9jF0trs7eGXID6S601ZSdWGhodTt83oxeyBW43KS'),
(16, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:20:36', 0, '$2y$10$FXcCoEmKeX32V7iX/CAX1eFqb5HrN2NJ49JI1VvUCt8d/G3jRfVcq'),
(17, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:21:16', 0, '$2y$10$MPrYY0Wx4vfY73cstfWOoeAgcHFAxv10eU7OmCx8jX.ZxJMpSxJg2'),
(18, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:25:37', 0, '$2y$10$NG73V8ZmaAZn5A.0.1lpoevrNaGRyxer0YocKgxTdRvAbqW44Szam'),
(19, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:27:00', 0, '$2y$10$3xKFF5LAidrl/jtCEsVAxupBi3n/iYyZsjy6qmFHY21G9sQ2Nl32i'),
(20, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:29:34', 0, '$2y$10$ZvyMOSPjKurhCWkqyZRKTeoYda.s.pw0i3fICB4LvnWXPP4H2.Z96'),
(21, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:41:46', 0, '$2y$10$PiT1lwdqoLZ899/QynalS.jsPhQ7QTqnd27SALf0cBs/AABWYDDri'),
(22, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:43:49', 0, '$2y$10$xRayie7MWAj4J2VgFCoCWugiFyNmtUwQA2p77uD5J/K3hR8bfOCTC'),
(23, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:45:37', 0, '$2y$10$8g2EPqOnLujkCY3BQSRB0esFWXuCfB94iNBi6C9xAJgJ.Tx76cdQG'),
(24, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:51:04', 0, '$2y$10$rEjZXrvDw8Cr9UZsM0d8GeDobNOsGNdk3NCevACRufQlQFUQoPsoO'),
(25, 'testmail5', 'heloise', 'north', 'selenviola@gmail.com', '2020-12-21 21:52:10', 0, '$2y$10$f8dUPm4gtlbLxhhCr0NUS.KyobUWWhgw/AM22cFlWEfev81uiFkYy'),
(26, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 21:52:26', 0, '$2y$10$oxAydTJO7zj9vL5IO0K1pOzYOMzd0c7AUh890420lFWmJt4QRGFLG'),
(27, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 21:53:42', 0, '$2y$10$/5hS5otVVanHO45m5mF0q.x/dMGQknyGkokvmldNeRe2i8WNoL1D.'),
(28, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 21:54:25', 0, '$2y$10$W.EgoU5aeDGIdQh5Th6EYeg7rukwqxsosh5t/J7.wEgC3ZENBNdpe'),
(29, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 21:55:15', 0, '$2y$10$K0xOy8vj5WmAavxYFhKuY.cJRAkyt.Z1QN3/RcskifN8YmuG953qq'),
(30, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 21:56:27', 0, '$2y$10$b0GfuJTy1uQFqoTgq6GbZeIr8M0CI3MN706NJvCALTJLu7OwQiaZK'),
(31, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 21:57:10', 0, '$2y$10$2xElpbrJUaYKdj5JUTNP.OKqTqGE0Ol9zOPUUO1tjRgSf5yTn8swy'),
(32, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 22:00:20', 0, '$2y$10$5K4HswgaquTwxcg1ipTwFuEkgh6rPtZ1WbUbY7sLaf6tkehbZvH/i'),
(33, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 22:05:06', 0, '$2y$10$scHzgsuC3f5lIx2ARpKjFeRvWkyXSny.LJfYVPeo5J3VAaxoJ4ZrK'),
(34, 'testmail5', 'heloise', 'north', 'test@gmail.com', '2020-12-21 22:05:30', 0, '$2y$10$9daMc4OK3Kl3KZsjatVFZ.hWazWXL5QkUs9LV1905byih3HXvel1q'),
(35, 'testmailOK', 'selene', 'north', 'selene.viola@etu.univ-lorraine.fr', '2020-12-21 22:13:26', 0, '$2y$10$/or0EpAsifM/GKltQ225TeBa/24uMWYjLymHeXr8bxi48aSA1HWyO'),
(36, 'testmailOK', 'selene', 'north', 'selene.viola@etu.univ-lorraine.fr', '2020-12-21 22:15:13', 0, '$2y$10$fISYSC78837dfvZ6bViNEOdFHw8seEyTBXv8ogRN62nJT4OcYF5se'),
(37, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:15:49', 0, '$2y$10$QMjYH4I9dauOXPevxNweLePyt2beNNqNPylS/Tangjwgf4wFYbFWC'),
(38, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:27:30', 0, '$2y$10$wx/c9.PUNJnic2RFsGrBDu6xuXBah4QebhHuXlgh3sMk/0xDFXagW'),
(39, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:30:29', 0, '$2y$10$U.Yb1LHNxqQcKK6rPyD1GeTodfYGGqFhoyi17yy4NkWhSHthYgPbe'),
(40, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:30:43', 0, '$2y$10$FUJjueF/5yGSmJNCkLq2/uH.osupGXN0E2r48cRn4CXcub4boEiTK'),
(41, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:31:00', 0, '$2y$10$Xbt1th9VXXKFPKZHgNkQMuegEwGovKvgd/zCJ3b1Dib7ejIUIx.1y'),
(42, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:31:20', 0, '$2y$10$gZCRt2YPBflrLJusUXW2kO6gckIOQp0HdA60YDXtK8GJ0V4uBqA.u'),
(43, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:31:31', 0, '$2y$10$9aoXDDx5d1ZBUpBHONOlF.ZzSpusBsw9GZ/NTBIlZ79sHo2JyXjCa'),
(44, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:32:50', 0, '$2y$10$O0e6Pc000aVIx79PufQJiuODfzzERVWa7N9WVcFFd4xFdeCr7hgui'),
(45, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:42:11', 0, '$2y$10$v9Gjw5fiepEIbzGswHXGA.EE6lojAP0xB7zyvR5LQGHe3w3tlm4Lu'),
(46, 'testmailOK', 'selene', 'north', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-21 22:43:30', 0, '$2y$10$lAm8DT1TaYiWf6SQFMR9SOm6AnTFxGIj2CUMHbrRwKBrYbxiyxpmS'),
(47, 'testmailOKOK', 'selenetest', 'northtest', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-27 13:14:45', 0, '$2y$10$9b9PYrDW9ASJ3iIHhJ4IKuUP/oSnl9RbGXSsKYZkI5JyRv9KAnw1K'),
(48, 'testmailOKOK', 'selenetest', 'northtest', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-27 14:53:44', 0, '$2y$10$Zlc/ztAX9Wf6BWqOopjA3.RE0Ba8WOfi8sc0Fl/RVcAuT1Wo6gL96'),
(49, 'testmailOKOK', 'selenetest', 'northtest', 'selene.viola9@etu.univ-lorraine.fr', '2020-12-29 14:44:04', 0, '$2y$10$la.NmxwssRPTTQ9fqw9RhOLjBLEVw5F4g7KGT4jfh8nI41delAw2m');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `possibleanswer`
--
ALTER TABLE `possibleanswer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `possibleanswer_question_fkey` (`question`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_theme_fkey` (`theme`);

--
-- Index pour la table `question_quizz`
--
ALTER TABLE `question_quizz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_quizz_id_quizz_fkey` (`id_quizz`),
  ADD KEY `question_quizz_id_question_fkey` (`id_question`);

--
-- Index pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizz_user1_fkey` (`user1`),
  ADD KEY `quizz_user2_fkey` (`user2`),
  ADD KEY `quizz_winner_fkey` (`winner`);

--
-- Index pour la table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `possibleanswer`
--
ALTER TABLE `possibleanswer`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `question_quizz`
--
ALTER TABLE `question_quizz`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `possibleanswer`
--
ALTER TABLE `possibleanswer`
  ADD CONSTRAINT `possibleanswer_question_fkey` FOREIGN KEY (`question`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `question_theme_fkey` FOREIGN KEY (`theme`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question_quizz`
--
ALTER TABLE `question_quizz`
  ADD CONSTRAINT `question_quizz_id_question_fkey` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_quizz_id_quizz_fkey` FOREIGN KEY (`id_quizz`) REFERENCES `quizz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `quizz_user1_fkey` FOREIGN KEY (`user1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quizz_user2_fkey` FOREIGN KEY (`user2`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quizz_winner_fkey` FOREIGN KEY (`winner`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
