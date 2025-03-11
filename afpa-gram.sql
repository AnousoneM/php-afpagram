-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 11 mars 2025 à 22:32
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa-gram`
--
CREATE DATABASE IF NOT EXISTS `afpa-gram` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `afpa-gram`;

-- --------------------------------------------------------

--
-- Structure de la table `76_comments`
--

DROP TABLE IF EXISTS `76_comments`;
CREATE TABLE IF NOT EXISTS `76_comments` (
  `com_id` int NOT NULL,
  `com_text` varchar(50) NOT NULL,
  `com_timestamp` varchar(25) NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `76_comments_ibfk_1` (`post_id`),
  KEY `76_comments_ibfk_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_favorites`
--

DROP TABLE IF EXISTS `76_favorites`;
CREATE TABLE IF NOT EXISTS `76_favorites` (
  `user_id` int NOT NULL,
  `fav_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`fav_id`),
  KEY `fav_id` (`fav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `76_favorites`
--

INSERT INTO `76_favorites` (`user_id`, `fav_id`) VALUES
(1, 2),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `76_likes`
--

DROP TABLE IF EXISTS `76_likes`;
CREATE TABLE IF NOT EXISTS `76_likes` (
  `like_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `76_likes_ibfk_1` (`user_id`),
  KEY `76_likes_ibfk_2` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_pictures`
--

DROP TABLE IF EXISTS `76_pictures`;
CREATE TABLE IF NOT EXISTS `76_pictures` (
  `pic_id` int NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`pic_id`),
  KEY `76_pictures_ibfk_1` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `76_pictures`
--

INSERT INTO `76_pictures` (`pic_id`, `pic_name`, `post_id`) VALUES
(3, 'plage.png', 3),
(4, 'mer.png', 4),
(5, 'sushi.png', 5),
(6, 'sport.png', 6),
(7, 'glace.png', 7),
(8, 'coucher_soleil.png', 8),
(9, 'chiot.png', 9),
(10, '67cfff9842456_afpa_qrCode.png', 11),
(11, '67d018d2c0e18_pexels-maltelu-2244746.jpg', 12),
(12, '67d0196793d36_pexels-cottonbro-7568430.jpg', 13),
(13, '67d0316fccb82_isaac.png', 15);

-- --------------------------------------------------------

--
-- Structure de la table `76_posts`
--

DROP TABLE IF EXISTS `76_posts`;
CREATE TABLE IF NOT EXISTS `76_posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_timestamp` varchar(25) NOT NULL,
  `post_description` varchar(50) NOT NULL,
  `post_private` tinyint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `76_posts`
--

INSERT INTO `76_posts` (`post_id`, `post_timestamp`, `post_description`, `post_private`, `user_id`) VALUES
(3, '1740818059', 'Vacance à la plage', 0, 1),
(4, '1738398859', 'Super vue sur la mer', 0, 1),
(5, '1738398200', 'J\'adore les sushis !!!!!', 0, 1),
(6, '1738334561', 'Graou! Let\'s WorkOut !', 0, 1),
(7, '1738511902', 'Miam !', 0, 1),
(8, '1731211902', 'C\'est trop beau', 0, 2),
(9, '1730011902', 'Trop Cute :)', 0, 2),
(10, '567876543', 'azeazeaeae', 0, 5),
(11, '1741684632', 'YEAH', 0, 2),
(12, '1741691090', 'Je répare ma voiture :)', 0, 1),
(13, '1741691239', 'OMG je dois trier tout ça :&#039;(', 0, 2),
(14, '1741697286', 'Super Kahoot avec Beatrice', 0, 1),
(15, '1741697391', 'Design by Isaac', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `76_users`
--

DROP TABLE IF EXISTS `76_users`;
CREATE TABLE IF NOT EXISTS `76_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_gender` varchar(25) NOT NULL,
  `user_lastname` varchar(25) NOT NULL,
  `user_firstname` varchar(25) NOT NULL,
  `user_pseudo` varchar(25) NOT NULL,
  `user_avatar` varchar(25) DEFAULT 'avatar.png' COMMENT 'Photo de profil',
  `user_birthdate` date NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_activated` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `76_users`
--

INSERT INTO `76_users` (`user_id`, `user_gender`, `user_lastname`, `user_firstname`, `user_pseudo`, `user_avatar`, `user_birthdate`, `user_mail`, `user_password`, `user_activated`) VALUES
(1, 'homme', 'DOE', 'John', 'Johnny', 'avatar.png', '2025-03-03', 'john.doe@mail.fr', '$2y$10$cADiQgpwbNoaNAlauXJwEudGEDLu5Y6CLnmRJS4BJcjq37ePVDUXy', 1),
(2, 'femme', 'DOE', 'Jane', 'Janny', 'avatar.png', '2025-03-03', 'jane.doe@mail.fr', '$2y$10$53VqPUe42kgUVDqt/3lDfeHX/nVchq8OE.NH5GAuGjpGZ/9LhebUi', 1),
(4, 'homme', 'PARKER', 'Peter', 'Spiderman', 'avatar.png', '2025-03-03', 'peter.parker@mail.fr', '$2y$10$giZgwqSRv2LUZEFY2GBCB.0PwuTq2.XgHrClT8RA8n.wHhvu2nXXa', 1),
(5, 'homme', 'BAUER', 'Jack', 'jacko', 'avatar.png', '2025-02-24', 'jack.bauer@mail.fr', '$2y$10$zMWX477AciQTtDOWCJNQAe4uoE04ifrCOJ2t7k2CRCKu7A/rJijlO', 1),
(6, 'homme', 'MOON', 'Knight', 'moonknight', 'avatar.png', '2025-03-06', 'moon.knight@mail.fr', '$2y$10$Fauefytyvhv7UwNi6LFOPeXJMfylIQV3N8PVNy9SCy04/jgRw3.ZW', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD CONSTRAINT `76_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `76_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD CONSTRAINT `76_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `76_favorites_ibfk_2` FOREIGN KEY (`fav_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD CONSTRAINT `76_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `76_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD CONSTRAINT `76_pictures_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD CONSTRAINT `76_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
