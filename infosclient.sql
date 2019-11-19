-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 18:48
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ece_amazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `infosclient`
--

DROP TABLE IF EXISTS `infosclient`;
CREATE TABLE IF NOT EXISTS `infosclient` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Prenom` varchar(255) NOT NULL,
  `Adresse_1` varchar(255) NOT NULL,
  `Adresse_2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Code` int(5) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Tel` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infosclient`
--

INSERT INTO `infosclient` (`Id`, `Nom_Prenom`, `Adresse_1`, `Adresse_2`, `Ville`, `Code`, `Pays`, `Tel`) VALUES
(10, 'Sofiane Rahli', '21,23 Rue de la Marche', 'et du Pantin', 'Paris', 75000, 'France', 625352531);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
