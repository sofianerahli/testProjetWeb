-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 20:37
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
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`Id`, `Email`, `Mdp`) VALUES
(7, 'zakaria@hotmail.com', 'zak1996'),
(6, 'sofiane@hotmail.com', 'Soso1997');

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

-- --------------------------------------------------------

--
-- Structure de la table `infospaiement`
--

DROP TABLE IF EXISTS `infospaiement`;
CREATE TABLE IF NOT EXISTS `infospaiement` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) NOT NULL,
  `num` double NOT NULL,
  `Nom_Prenom` varchar(255) NOT NULL,
  `Date_exp` date NOT NULL,
  `Codesec` int(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infospaiement`
--

INSERT INTO `infospaiement` (`Id`, `Type`, `num`, `Nom_Prenom`, `Date_exp`, `Codesec`) VALUES
(1, 'Visa', 1.111111111111111e15, 'MOUTAI', '2019-05-06', 111);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Stock` int(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`Id`, `Nom`, `Description`, `Prix`, `Categorie`, `Photo`, `Stock`) VALUES
(59, 'Ballon Basket Ball', 'Ballon idÃ©al pour vos parties de Basket Ball', 20, 'Sport&Loisirs', 'basketball.png', 2),
(58, 'Ballon', 'Ballon en bon Ã©tat qui vous permettra de jouer au foot avec vos amis.', 40, 'Sport&Loisirs', 'ballon.jpg', 5),
(57, 'ComÃ©die', 'Livre qui vous fera mourir de rire.', 5, 'Livres', 'Comedie.png', 1),
(3, 'Horreur', 'Livre Bon etat: Genre horreur qui vous glacera le sang.', 15, 'Livres', 'Horreur.jpg', 0),
(1, 'Livre1', 'Bon Ã©tat, Livre de poche fantastique qui vous fera transporter dans des endroits magiques.', 10, 'Livres', 'fantastique.jpg', 1),
(2, 'Roman', 'Roman en bon Ã©tat qui vous racontera une histoire romantique entre deux personnes complÃ¨tement opposÃ©s .', 10, 'Livres', 'Roman.jpg', 3),
(60, 'Trompette', 'Trompette de type professionnel. TrÃ¨s rare.', 100, 'Musique', 'trompette.jpg', 1),
(61, 'Pantalon', 'Jean en bon etat de haute couture avec une ceinture offerte !!! ', 70, 'Vetements', 'jean.jpg', 0),
(62, 'Tambour', 'Tambour avec peau spÃ©ciale en trÃ¨s bon Ã©tat.', 40, 'Musique', 'tambour.png', 10),
(63, 'Flute', 'Aucune description', 15, 'Musique', 'flute.jpg', 0),
(64, 'Raquette', 'Raquette trÃ¨s maniable avec laquelle vous pouvez gagner de nombreuses compÃ©titions.', 25, 'Sport&Loisirs', 'Raquette.jpg', 20),
(65, 'Chapeau', 'Chapeau en bon Ã©tat qui vous couvrira du soleil.', 25, 'Vetements', 'chapeau.jpg', 2),
(66, 'Album', 'Album trÃ¨s rare de Johnny Hallyday', 300, 'Musique', 'johnny.jpg', 1),
(67, 'Crampons', 'Crampons de Football', 90, 'Sport&Loisirs', 'crampon.jpg', 10),
(68, 'Roman Victor hugo', 'Aucune description', 20, 'Livres', 'victor.jpg', 10),
(69, 'Billet Parc AstÃ©rix', 'Billet pour passer une bonne journÃ©e en famille dans votre cÃ©lÃ¨bre parc', 60, 'Sport&Loisirs', 'parc.jpg', 5),
(70, 'Baskets ', 'Baskets Nike en bon etat.', 50, 'Vetements', 'Nike.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`Id`, `email`, `pseudo`, `nom`) VALUES
(16, 'sofiane@hotmail.com', 'Sofiane', 'Rahli'),
(18, 'zakaria@hotmail.com', 'Zak', 'Zakaria');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
