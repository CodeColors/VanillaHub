-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 30 oct. 2019 à 15:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vanilla`
--

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

DROP TABLE IF EXISTS `dossiers`;
CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `patient` varchar(255) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `cause` varchar(255) NOT NULL,
  `itt` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`id`, `date`, `patient`, `tel`, `cause`, `itt`, `charge`) VALUES
(1, '2019-09-01', 'James HENRI', 'f', 'f', 'f', 'f'),
(2, '2019-09-01', 'f', 'f', 'f', 'f', 'f'),
(3, '2019-09-01', 'f', 'f', 'f', 'f', 'f'),
(4, '2019-09-01', 'f', 'f', 'f', 'ff', 'f'),
(5, '2019-09-01', 'f', 'f', 'f', 'f', 'f'),
(6, '2019-09-01', 'f', 'f', 'f', 'fff', 'f'),
(7, '2019-09-01', 'f', 'f', 'f', 'f', 'f'),
(8, '2019-09-01', 'f', 'f', 'f', 'ff', 'f'),
(9, '2019-09-01', 'f', 'f', 'f', 'ff', 'f'),
(10, '2019-09-01', 'f', 'f', 'f', 'f', 'f'),
(11, '2019-09-01', 'f', 'f', 'f', 'fff', 'f'),
(12, '2019-09-01', 'f', 'f', 'f', 'fff', 'f');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rank` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `rank`) VALUES
(8, 'James', '$2y$10$0kLyINfxbC7iR2LUVeo4keJIzz6ry5NoWf9j0v6zOT6zSKOEqxJ/.', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
