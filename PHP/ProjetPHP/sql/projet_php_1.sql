-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 déc. 2020 à 18:28
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


-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(4) NOT NULL,
  `label` varchar(100) NOT NULL,
  `theme` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `question_quizz`
--

CREATE TABLE `question_quizz` (
  `id` int(4) NOT NULL,
  `id_quizz` int(4) NOT NULL,
  `id_question` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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


-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(4) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `label`, `theme`) VALUES
(40, 'test', 16),
(41, 'azerty ?', 16),
(42, 'aaaa', 17),
(43, 'questiooooooooooooooooonn ?', 16),
(44, 'azertyuiop', 16);

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`id`, `mode`, `user1`, `user2`, `startAt`, `winner`) VALUES
(1, 0, 1, NULL, '2020-12-01 18:54:00', 1),
(2, 1, 2, 3, '2020-12-01 18:55:00', 3);

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `nom`) VALUES
(16, 'theme2'),
(17, 'theme3');

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `registerAt`, `point`, `password`) VALUES
(1, 'test01', 'jean', 'dupont', 'jeandupont@gmail.com', '2020-11-19 10:00:00', 0, 'passwordcrypté'),
(2, 'test02', 'mathieu', 'deslilas', 'mathieudeslilas@gmail.com', '2020-12-01 18:52:00', 0, 'passwordcrypté'),
(3, 'test03', 'micheline', 'rose', 'michelinerose@gmail.com', '2020-12-01 18:52:00', 0, 'passwordcrypté'),
(4, 'test04', 'sophie', 'pain', 'sophiepain@gmail.com', '2020-12-01 18:53:00', 0, 'passwordcrypté');

--
-- Déchargement des données de la table `question_quizz`
--

INSERT INTO `question_quizz` (`id`, `id_quizz`, `id_question`) VALUES
(1, 1, 40),
(2, 1, 41),
(3, 1, 43),
(4, 1, 44);
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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `question_quizz`
--
ALTER TABLE `question_quizz`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
