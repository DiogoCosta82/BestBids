-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 juin 2023 à 16:25
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `best_bids`
--

-- --------------------------------------------------------

--
-- Structure de la table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
CREATE TABLE IF NOT EXISTS `auctions` (
  `id_auction` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `image_href` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `reserve_price` int NOT NULL,
  `brand` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `model` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `hp` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb3 NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id_auction`),
  KEY `id_user` (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `auctions`
--

INSERT INTO `auctions` (`id_auction`, `id_user`, `title`, `image_href`, `reserve_price`, `brand`, `model`, `hp`, `description`, `created_date`, `updated_date`, `end_date`) VALUES
(30, 1, 'test', 'https://cdn.vpauto.fr/jXQObnh_01-1200.jpg', 2920, 'RENAULT', 'Mégane IV', '160', 'test', '2023-06-20', '2023-06-22', '2023-07-08'),
(31, 1, 'Test1', 'https://cdn.vpauto.fr/jXQObnh_01-1200.jpg', 21600, 'RENAULT', 'Mégane IV', '160', 'test1', '2023-06-21', '2023-06-22', '2023-07-09'),
(32, 1, 'test2', 'https://cdn.vpauto.fr/jXQObnh_01-1200.jpg', 21400, 'RENAULT', 'Mégane IV', '160', 'test3', '2023-06-21', '0000-00-00', '2023-06-30'),
(33, 1, 'test4', 'https://cdn.vpauto.fr/jXQObnh_01-1200.jpg', 21400, 'RENAULT', 'Mégane IV', '160', 'test4', '2023-06-21', '0000-00-00', '2023-07-07'),
(34, 1, 'NISSAN Qashqai 1.7 dCi 150 Tekna', 'https://cdn.vpauto.fr/pVbEyei_01-1200.jpg', 19200, 'NISSAN', 'Qashqai ', '150', 'Carnet d\'entretien - Garantie 3 mois Prémium', '2023-06-22', '2023-06-22', '2023-06-21');

-- --------------------------------------------------------

--
-- Structure de la table `bids`
--

DROP TABLE IF EXISTS `bids`;
CREATE TABLE IF NOT EXISTS `bids` (
  `id_bid` int NOT NULL AUTO_INCREMENT,
  `id_auction` int NOT NULL,
  `id_user` int NOT NULL,
  `amount` int NOT NULL,
  `bid_date` date NOT NULL,
  `winner_bid` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  PRIMARY KEY (`id_bid`),
  KEY `bids_ibfk_1` (`id_auction`) USING BTREE,
  KEY `bids_ibfk_2` (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `bids`
--

INSERT INTO `bids` (`id_bid`, `id_auction`, `id_user`, `amount`, `bid_date`, `winner_bid`) VALUES
(49, 30, 1, 21500, '2023-06-22', '1'),
(50, 30, 1, 21600, '2023-06-22', '1'),
(51, 30, 1, 21600, '2023-06-22', '1'),
(52, 30, 1, 21600, '2023-06-22', '1'),
(66, 34, 1, 17900, '2023-06-22', '1'),
(67, 34, 1, 18000, '2023-06-22', '1'),
(68, 34, 1, 18000, '2023-06-22', '1'),
(69, 34, 1, 18100, '2023-06-22', '1'),
(70, 34, 1, 18100, '2023-06-22', '1'),
(71, 34, 1, 18200, '2023-06-22', '1'),
(72, 34, 1, 18200, '2023-06-22', '1'),
(87, 34, 1, 19100, '2023-06-22', '1'),
(88, 34, 1, 19100, '2023-06-22', '1'),
(89, 34, 1, 19200, '2023-06-22', '1'),
(90, 30, 1, 21900, '2023-06-22', '1'),
(91, 30, 1, 21910, '2023-06-22', '1'),
(92, 30, 1, 10, '2023-06-22', '1'),
(93, 30, 1, 2910, '2023-06-22', '1'),
(94, 30, 1, 2920, '2023-06-22', '1'),
(95, 31, 1, 21500, '2023-06-22', '1'),
(96, 31, 1, 21500, '2023-06-22', '1'),
(97, 31, 1, 21500, '2023-06-22', '1'),
(98, 31, 1, 21500, '2023-06-22', '1'),
(99, 31, 1, 21500, '2023-06-22', '1'),
(100, 31, 1, 21500, '2023-06-22', '1'),
(101, 31, 1, 21500, '2023-06-22', '1'),
(102, 31, 1, 21500, '2023-06-22', '1'),
(103, 31, 1, 21500, '2023-06-22', '1'),
(104, 31, 1, 21500, '2023-06-22', '1'),
(105, 31, 1, 21500, '2023-06-22', '1'),
(106, 31, 1, 21500, '2023-06-22', '1'),
(107, 31, 1, 21500, '2023-06-22', '1'),
(108, 31, 1, 21500, '2023-06-22', '1'),
(109, 31, 1, 21500, '2023-06-22', '1'),
(110, 31, 1, 21500, '2023-06-22', '1'),
(111, 31, 1, 21600, '2023-06-22', '1'),
(112, 31, 1, 21600, '2023-06-22', '1'),
(113, 31, 1, 21600, '2023-06-22', '1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `created_date`, `updated_date`) VALUES
(1, 'Diogo', 'Costa', 'diocatus@gmail.com', '1234', '2023-06-16', '0000-00-00'),
(2, 'Gérald', 'Montigny', 'gg@gmail.com', '1234', '2023-06-16', '0000-00-00'),
(3, 'test', 'test1', 'test1@test1.fr', '1234', '2023-06-18', '0000-00-00'),
(4, 'test', 'test2', 'test2@test1.fr', '1234', '2023-06-18', '0000-00-00'),
(5, 'test3', 'test3', 'test3@gmail.com', '1234', '2023-06-19', '0000-00-00'),
(6, 'test5', 'test5', 'test5@gmail.com', '1234', '2023-06-19', '0000-00-00'),
(7, 'test6', 'test6', 'test6@test6.fr', '1234', '2023-06-21', '0000-00-00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`id_auction`) REFERENCES `auctions` (`id_auction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
