-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 jan. 2021 à 14:56
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
-- Base de données : `projet_tutore_1`
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
(1, 'admin', 'admin', 'admin', 'admin@admin.fr', '2020-11-25 11:38:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(2, 'username1', 'prenom1', 'nom1', 'email1@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(3, 'username2', 'prenom2', 'nom2', 'email2@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(4, 'username3', 'prenom3', 'nom3', 'email3@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(5, 'username4', 'prenom4', 'nom4', 'email4@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(6, 'username5', 'prenom5', 'nom5', 'email5@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(7, 'username6', 'prenom6', 'nom6', 'email6@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(8, 'username7', 'prenom7', 'nom7', 'email7@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(9, 'username8', 'prenom8', 'nom8', 'email8@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(10, 'username9', 'prenom9', 'nom9', 'email9@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(11, 'username10', 'prenom10', 'nom10', 'email10@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(12, 'username11', 'prenom11', 'nom11', 'email11@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(13, 'username12', 'prenom12', 'nom12', 'email12@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(14, 'username13', 'prenom13', 'nom13', 'email13@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(15, 'username14', 'prenom14', 'nom14', 'email14@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(16, 'username15', 'prenom15', 'nom15', 'email15@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(17, 'username16', 'prenom16', 'nom16', 'email16@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(18, 'username17', 'prenom17', 'nom17', 'email17@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(19, 'username18', 'prenom18', 'nom18', 'email18@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(20, 'username19', 'prenom19', 'nom19', 'email19@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(21, 'username20', 'prenom20', 'nom20', 'email20@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(22, 'username21', 'prenom21', 'nom21', 'email21@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(23, 'username22', 'prenom22', 'nom22', 'email22@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(24, 'username23', 'prenom23', 'nom23', 'email23@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(25, 'username24', 'prenom24', 'nom24', 'email24@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi'),
(26, 'username25', 'prenom25', 'nom25', 'email25@gmail.com', '2020-11-27 16:00:00', '$2y$10$65xzj5CxE3A0Oti2TM/2xOABem6hgf/5hsBtSCmeEZu7Vq5ZTEbOi');

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
(1, 1, 'La nuit', 0),
(2, 1, 'Le jour', 0),
(3, 1, 'Toute l\'année', 0),
(4, 1, 'L\'hiver', 1),
(5, 2, 'Troupes de cerfs sauvages au monde', 0),
(6, 2, 'Troupes de chevaux sauvages au monde', 1),
(7, 2, 'Troupes d\'éléphants sauvages au monde', 0),
(8, 2, 'Troupes de chèvres sauvages au monde', 0),
(9, 3, 'Un guide', 0),
(10, 3, 'Des vivres', 0),
(11, 3, 'Un chauffeur', 0),
(12, 3, 'Un permis', 1),
(13, 4, 'En Chine', 0),
(14, 4, 'En Afrique', 0),
(15, 4, 'Au Canada', 1),
(16, 4, 'En écosse', 0),
(17, 5, 'Le désert du Sahara', 0),
(18, 5, 'Le désert des Mojaves', 0),
(19, 5, 'Le désert du Namib', 1),
(20, 5, 'Le désert d\'Atacama', 0),
(21, 6, 'Par train ou à pied', 0),
(22, 6, 'Par avion ou à pied', 0),
(23, 6, 'Par voiture ou à pied', 0),
(24, 6, 'Par bateau ou à pied', 1),
(25, 7, 'Les Sentinelles', 1),
(26, 7, 'Les Guetteurs', 0),
(27, 7, 'Les Défenseurs', 0),
(28, 7, 'Les Massacreurs', 0),
(29, 8, 'La forêt pluviale de Tarkine, en Tasmanie', 0),
(30, 8, 'La forêt pluviale de la côte ouest de l\'Amérique du Nord', 1),
(31, 8, 'La forêt pluviale de Haye', 0),
(32, 8, 'La forêt pluviale de Gondwana, en Australie', 0),
(33, 9, 'Se laver derrière les oreilles', 0),
(34, 9, 'Vomir', 1),
(35, 9, 'Courir après avoir mangé', 0),
(36, 9, 'Bailler', 0),
(37, 10, 'En poussant de petits cris', 0),
(38, 10, 'En mordant leurs congénères', 0),
(39, 10, 'En offrant des cadeaux à leurs congénères', 0),
(40, 10, 'En émettant des vibrassions', 1),
(41, 11, '1 an', 0),
(42, 11, '2 ans', 1),
(43, 11, '3 ans', 0),
(44, 11, '5 ans', 0),
(45, 12, 'Le cochon d\'Inde', 0),
(46, 12, 'Le hérisson africain à ventre blanc', 0),
(47, 12, 'Le rat', 0),
(48, 12, 'Le capybara', 1),
(49, 13, 'Leur odeur', 1),
(50, 13, 'Leurs poils', 0),
(51, 13, 'Leurs oreilles', 0),
(52, 13, 'Leur caractère', 0),
(53, 14, 'La vue et le touché', 0),
(54, 14, 'L\'ouïe et la vue', 0),
(55, 14, 'La vue et l\'odorat', 0),
(56, 14, 'L\'ouïe et l\'odorat', 1),
(57, 15, 'Les gros', 0),
(58, 15, 'Tous', 0),
(59, 15, 'Les petits', 1),
(60, 15, 'Aucun', 0),
(61, 16, '3 à 5 petits', 1),
(62, 16, 'de 2 à 4 petits', 0),
(63, 16, 'de 1 à 3 petits', 0),
(64, 16, 'seulement 1 petit', 0),
(65, 17, 'Déshonorer quelqu\'un', 0),
(66, 17, 'Insulter quelqu\'un violemment', 0),
(67, 17, 'Battre quelqu’un à coups de bâton ou de fouet', 1),
(68, 17, 'Fuir un combat', 0),
(69, 18, 'Couvrir d’éloges une personne que l’on admire', 0),
(70, 18, 'Regarder alentour', 0),
(71, 18, 'Voler un bien de valeur', 0),
(72, 18, 'Naviguer en zigzag pour éviter un vent indésirable', 1),
(73, 19, 'Faire la fête', 1),
(74, 19, 'Aller en prison', 0),
(75, 19, 'Aller loin', 0),
(76, 19, 'Aller cueillir des champignons', 0),
(77, 20, 'Changer de ligne', 0),
(78, 20, 'Changer de suiveur', 0),
(79, 20, 'Changer de route', 0),
(80, 20, 'Changer de piste', 1),
(81, 21, 'Être un nom de la langue courante', 1),
(82, 21, 'Être un nom scientifique', 0),
(83, 21, 'Être un nom de polymère', 0),
(84, 21, 'Être un nom de plantes dangereuses', 0),
(85, 22, 'Des onomatopées', 0),
(86, 22, 'Des coquillages', 0),
(87, 22, 'Des gargouillements produits dans l\'intestin', 1),
(88, 22, 'Une civilisation disparue', 0),
(89, 23, 'Être naïf', 0),
(90, 23, 'Être bête', 0),
(91, 23, 'Être chanceux', 0),
(92, 23, 'Être doué dans un domaine', 1),
(93, 24, 'Ces serpents sont vénéneux.', 0),
(94, 24, 'Ces serpents sont venimeux.', 1),
(95, 24, 'Ces serpents sont venéneux.', 0),
(96, 24, 'Ces serpents sont venineux.', 0),
(97, 25, 'Dans une classe de collège', 0),
(98, 25, 'Dans une classe de primaire', 0),
(99, 25, 'Dans une classe de maternelle', 1),
(100, 25, 'Dans une classe de lycée', 0),
(101, 26, 'Aux États-Unis', 1),
(102, 26, 'En Angleterre', 0),
(103, 26, 'En Belgique', 0),
(104, 26, 'En Allemagne', 0),
(109, 27, '10 ans', 0),
(110, 27, '8 ans', 0),
(111, 27, '9 ans', 0),
(112, 27, '12 ans', 1),
(113, 28, 'Le SIDA et le VIH', 1),
(114, 28, 'Le SIDA et le cancers du sein', 0),
(115, 28, 'Le VIH et cancers du sein', 0),
(116, 28, 'Le SIDA et le COVID-19', 0),
(117, 29, 'D\'Egypte', 0),
(118, 29, 'D\'Arabie Saoudite', 0),
(119, 29, 'D\'Irak', 0),
(120, 29, 'D’Iran', 1),
(121, 30, 'Au 15e siècle', 1),
(122, 30, 'Au 14e siècle', 0),
(123, 30, 'Au 13e siècle', 0),
(124, 30, 'Au 12e siècle', 0),
(125, 31, 'Personne', 0),
(126, 31, '2 autres hommes', 1),
(127, 31, '1 autre homme et 1 femme', 0),
(128, 31, '2 autres femmes', 0),
(129, 32, 'Le prince Hussein', 1),
(130, 32, 'Le prince de Bel-Air', 0),
(131, 32, 'Le prince Harry', 0),
(132, 32, 'Le prince Royce', 0),
(133, 33, 'Volcans', 0),
(134, 33, 'Forêts', 0),
(135, 33, 'Montagnes', 0),
(136, 33, 'Plans d’eau', 1),
(137, 34, 'Ils ne se fossilisent pas', 0),
(138, 34, 'En 3 dimensions', 1),
(139, 34, 'En 2 dimensions', 0),
(140, 34, 'Avec 60% de bois et 40% de roche', 0),
(141, 35, '2 milliards d’années', 0),
(142, 35, '3.5 milliards d\'années', 1),
(143, 35, '2.5 milliards d’années', 0),
(144, 35, '4 milliards d’années', 0),
(145, 36, 'Environ 55 espèces de dinosaures', 0),
(146, 36, 'Environ 247 espèces de dinosaures', 0),
(147, 36, 'Environ 580 espèces de dinosaures', 0),
(148, 36, 'Environ 600 espèces de dinosaures', 1),
(149, 37, 'Les fossiles de végétaux', 0),
(150, 37, 'Les fossiles de dinosaures', 0),
(151, 37, 'Les fossiles marins', 0),
(152, 37, 'Les fossiles de mammifères', 1),
(153, 38, 'Ceux d\'animaux marins', 1),
(154, 38, 'Ceux de dinosaures', 0),
(155, 38, 'Ceux de végétaux', 0),
(156, 38, 'Ceux de mammifères', 0),
(157, 39, 'Edward Reid', 0),
(158, 39, 'Jace Lambton', 0),
(159, 39, 'Shawn Funk', 1),
(160, 39, 'Mia Shirley', 0),
(161, 40, 'Tyrannosaurus rex', 0),
(162, 40, 'Argentinosaurus', 1),
(163, 40, 'Mosasaures', 0),
(164, 40, 'Iguanodon', 0);

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
(1, 'Le territoire sauvage de la Sibérie est glacial :', 1),
(2, 'La cordillère Darwin, abrite une des dernières et des plus grandes ...', 1),
(3, 'De quoi aurez vous besoin pour vous rendre à Changtang, au Tibet, le « Toit du monde »?', 1),
(4, 'La forêt pluviale Great Bear est une région sauvage isolée et parfaitement vierge :', 1),
(5, 'Un des endroits les plus chaud et sec sur Terre est :', 1),
(6, 'La péninsule de Knoydart, en Écosse, étant le dernier refuge sauvage du pays, on y accède :', 1),
(7, 'L’île de North Sentinel, dans le golfe du Bengale, abrite un peuple indigène isolé appelé :', 1),
(8, 'Quelle est la plus grande forêt pluviale tempérée au monde?', 1),
(9, 'Qu\'est ce qu\'un rongeur ne peut pas faire ?', 2),
(10, 'Les rongeurs communiquent souvent de quelle manière ?', 2),
(11, 'Au Canada, à quel âge les jeunes castors quittent la hutte de leurs parents?', 2),
(12, 'Quel est le plus gros rongeur au monde ?', 2),
(13, 'Les rongeurs peuvent reconnaître leurs proches par :', 2),
(14, 'Quels sont les sens les plus développés chez les rongeurs ?', 2),
(15, 'Quelle genre de rongeur change de partenaire très souvent ?', 2),
(16, 'Les bébés écureuils naissent par portée de :', 2),
(17, 'À l’origine, le terme « fustiger » signifiait :', 3),
(18, 'À l’origine, le terme « louvoyer » signifiait :', 3),
(19, 'En Belgique, «aller à guindaille» signifie :', 3),
(20, 'Au Luxembourg, sur l’autoroute, «changer de voie» se dit :', 3),
(21, '« Un nom vernaculaire » signifie :', 3),
(22, 'Les borborygmes sont :', 3),
(23, 'Être « une grosse bolle », signifie en québécois :', 3),
(24, 'Laquelle de ces phrases est correcte ?', 3),
(25, 'Avant d’épouser le prince Charles, Lady Diana Spencer travaillait :', 4),
(26, 'La princesse de Caraman-Chimay, membre de la noblesse belge, est née :', 4),
(27, 'Le prince Édouard V est devenu roi d’Angleterre en 1483 à l\'âge de :', 4),
(28, 'La princesse Stéphanie de Monaco, est réputée pour ses efforts contre contre quelles maladies ?', 4),
(29, 'En tant que femme du shah d’Iran, la princesse Fawzia d’Égypte est devenue reine :', 4),
(30, 'Mira Bai, poétesse hindoue, et princesse rajpute est née :', 4),
(31, 'Le prince Félix Youssoupov, parent du tsar Nicolas II, a assassiné Grigori Raspoutine avec :', 4),
(32, 'Qui est la personne la plus jeune à avoir présidée le Conseil de sécurité de l\'ONU ?', 4),
(33, 'La plupart des fossiles de dinosaures sont trouvés près de :', 5),
(34, 'Comment les arbres se fossilisent-il ?', 5),
(35, 'Les plus vieux fossiles trouvés sont ceux de formes de vie datant de :', 5),
(36, 'Combien d\'espèces de fossiles ont identifiés les paléontologues ?', 5),
(37, 'Pour quel genre de fossiles le site fossilifère de Messel est reconnu ?', 5),
(38, 'Les chercheurs trouvent le plus souvent des fossiles de quel type ?', 5),
(39, 'Qui a découvert le fossile le mieux préservé du monde ?', 5),
(40, 'Le plus grand fossile jamais trouvé était le squelette d’un :', 5);

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
(1, 1, 3),
(2, 1, 5),
(3, 1, 6),
(4, 1, 7),
(5, 2, 37),
(6, 2, 33),
(7, 2, 38),
(8, 2, 35),
(9, 3, 10),
(10, 3, 16),
(11, 3, 13),
(12, 3, 15),
(13, 4, 30),
(14, 4, 28),
(15, 4, 32),
(16, 4, 25),
(17, 5, 24),
(18, 5, 21),
(19, 5, 18),
(20, 5, 23);

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
(1, 0, 2, NULL, '2021-01-07 22:40:48', NULL),
(2, 0, 3, NULL, '2021-01-07 22:42:49', NULL),
(3, 0, 6, NULL, '2021-01-07 22:44:43', NULL),
(4, 0, 10, NULL, '2021-01-07 22:45:47', NULL),
(5, 0, 8, NULL, '2021-01-07 22:46:44', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `quizz_answers`
--

INSERT INTO `quizz_answers` (`id`, `question_id`, `user_id`, `quizz_id`, `isRight`) VALUES
(1, 3, 2, 1, 1),
(2, 5, 2, 1, 1),
(3, 6, 2, 1, 0),
(4, 7, 2, 1, 0),
(5, 37, 3, 2, 0),
(6, 33, 3, 2, 1),
(7, 38, 3, 2, 1),
(8, 35, 3, 2, 1),
(9, 10, 6, 3, 1),
(10, 16, 6, 3, 1),
(11, 13, 6, 3, 1),
(12, 15, 6, 3, 1),
(13, 30, 10, 4, 0),
(14, 28, 10, 4, 0),
(15, 32, 10, 4, 0),
(16, 25, 10, 4, 0),
(17, 24, 8, 5, 1),
(18, 21, 8, 5, 0),
(19, 18, 8, 5, 0),
(20, 23, 8, 5, 1);

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
(1, 'Les régions sauvages'),
(2, 'Les rongeurs'),
(3, 'La langue française'),
(4, 'Les princes et les princesses'),
(5, 'Les fossiles');

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
(1, 'Jean01', 'Jean - Jacques', 'Dupont', 'jeanjacquesdupont@gmail.com', '2021-01-07 17:55:22', 0, '$2y$10$anlU4h5F7tobAM1ohP5hIufKO32iR8WZxayEfEZA7hh0LcIjZcm/O'),
(2, 'selene54', 'Sélène', 'Viola', 'selene.viola9@etu.univ-lorraine.fr', '2021-01-07 17:56:39', 0, '$2y$10$jhqo7UUuIe/27DwMzHOtZeIbfHXimf9XxE06NS00UvNSjSVW/j/3i'),
(3, 'Martine10chantale', 'Martine - Chantale', 'O\'Conor', 'martinec.oconor@yahoo.fr', '2021-01-07 17:58:44', 0, '$2y$10$WuO4KRPN.RRLV4yhlGpxE.iZ132xPywjB5ULDuP8G9n5sEVV3Yxhe'),
(4, 'PierreD', 'Pierre', 'Dufour', 'pierredufour784@orange.fr', '2021-01-07 18:00:37', 0, '$2y$10$qo/E7khTPwatcUVVvfOiyeioSnEjp/.XrUf.p9SDuRMhtRLqejAre'),
(5, 'Louise', 'Louise', 'Brock', 'louisebrock@sfr.fr', '2021-01-07 18:02:00', 0, '$2y$10$4lGfXvar4k96agDMX3p1HubTKAmXLfcZR71WWUbkfAkANTlSgj2gO'),
(6, 'CharlesIII', 'Charles troisième du nom', 'Henry', 'charles@hotmail.fr', '2021-01-07 18:05:02', 0, '$2y$10$MIgZj81Fc1PgeuYm8/O20Ole7a1zVgKfNaPbE7dZXMufUFGuAgq6i'),
(7, 'Patricia7532', 'Patricia', 'Karon', 'patriciakaron@gmail.com', '2021-01-07 18:06:19', 0, '$2y$10$2OV6MhQ6gkBGfI5NDn8kn.MsUD4S93A6bkY05Js53JUMRqv033J1u'),
(8, 'Joliejulie', 'Julie', 'Jordie', 'juliejordie@gmail.com', '2021-01-07 18:07:22', 0, '$2y$10$5hLkaYY7zHyAQed21b/F5eiX9/kIaH5aeWVfPiX4oQaUcHvSjMt9y'),
(9, 'Virginiemajor85', 'Virginie', 'Major', 'virginiemajor@outlook.fr', '2021-01-07 18:08:31', 0, '$2y$10$Cpwstu./wNzudeaRCXRyHOW.8sgisLMc0xcghrodwR9ybVAhSfKA2'),
(10, 'Aaron785M', 'Aaron', 'Martel', 'aaronmartel@gmail.com', '2021-01-07 18:09:22', 0, '$2y$10$fYSi8iYRl9s6UfurnnehA.mFNJkPufcdRozJdw4q8CtC5jGQN4aSC');

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `possibleanswer`
--
ALTER TABLE `possibleanswer`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `question_quizz`
--
ALTER TABLE `question_quizz`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
