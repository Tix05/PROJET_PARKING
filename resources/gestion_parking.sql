-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mars 2024 à 08:10
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `ID_HISTORY` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_LOCATION` bigint(20) NOT NULL,
  `PROPRIETAIRE` text,
  `MARQUE_VOITURE` text,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`ID_HISTORY`),
  KEY `IDX_FK_HISTORIQUE_LOCATION` (`ID_LOCATION`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`ID_HISTORY`, `ID_LOCATION`, `PROPRIETAIRE`, `MARQUE_VOITURE`, `date_debut`, `date_fin`) VALUES
(1, 1, 'Tix', '2CV', '2024-03-04', '2024-03-20'),
(2, 2, 'rasoa', 'lambo', '2024-03-11', '2024-03-21'),
(3, 3, 'bienvenue', 'bmw', '2024-03-07', '2024-03-14'),
(4, 4, 'bienvenue', 'bmw', '2024-03-18', '2024-03-21'),
(5, 5, 'bienvenue', 'bmw', '2024-03-04', '2024-03-06'),
(6, 7, 'Tahina', 'jog', '2024-03-01', '2024-03-07'),
(7, 6, 'Aurnela', 'bmw', '2024-03-08', '2024-03-21'),
(8, 8, 'Tix', 'bmw', '2024-03-09', '2024-03-22'),
(9, 9, 'Tix', 'lambo', '2024-03-01', '2024-03-08'),
(10, 10, 'rasoa', 'bmw', '2024-03-09', '2024-03-13'),
(11, 11, 'Aurnela', '2CV', '2024-03-01', '2024-03-09');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `ID_LIEU` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_LIEU` text,
  `ADRESSE_LIEU` text,
  PRIMARY KEY (`ID_LIEU`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`ID_LIEU`, `NOM_LIEU`, `ADRESSE_LIEU`) VALUES
(1, 'mahamasina', 'mahamasina'),
(2, '67ha', '67ha');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `ID_LOCATION` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_PLACE` bigint(20) NOT NULL,
  `marque_voiture` varchar(255) NOT NULL,
  `immatriculation_voiture` varchar(255) NOT NULL,
  `nom_proprietaire` varchar(255) NOT NULL,
  `contact_proprietaire` varchar(255) NOT NULL,
  `type_vehicule` varchar(255) NOT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL,
  `COUT_LOCATION` text,
  PRIMARY KEY (`ID_LOCATION`),
  KEY `IDX_FK_LOCATION_PARKING` (`ID_PLACE`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `ID_PLACE` int(3) NOT NULL AUTO_INCREMENT,
  `ID_QUARTIER` int(3) NOT NULL,
  `NUM_PLACE` int(3) DEFAULT NULL,
  `TYPE_PLACE` text,
  `DISPONIBILITE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_PLACE`),
  KEY `IDX_FK_PARKING_QUARTIER` (`ID_QUARTIER`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parking`
--

INSERT INTO `parking` (`ID_PLACE`, `ID_QUARTIER`, `NUM_PLACE`, `TYPE_PLACE`, `DISPONIBILITE`) VALUES
(1, 1, 1, 'normale', 1),
(2, 1, 2, 'normale', 1),
(3, 1, 3, 'normale', 1),
(4, 1, 4, 'normale', 1),
(5, 1, 5, 'normale', 1),
(6, 1, 6, 'normale', 1),
(7, 1, 10, 'handicapÃ©', 1),
(8, 1, 11, 'normale', 1),
(9, 1, 12, 'normale', 1),
(10, 1, 13, 'handicapÃ©', 1),
(11, 1, 14, 'handicapÃ©', 1),
(12, 2, 15, 'normale', 1),
(13, 2, 16, 'handicapÃ©', 1),
(14, 2, 17, 'normale', 1),
(15, 2, 18, 'normale', 1),
(16, 2, 19, 'normale', 1),
(17, 1, 20, 'normale', 1),
(18, 1, 20, 'normale', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

DROP TABLE IF EXISTS `quartier`;
CREATE TABLE IF NOT EXISTS `quartier` (
  `ID_QUARTIER` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_LIEU` bigint(20) NOT NULL,
  `NOM_QUARTIER` text,
  `CAPACITE` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_QUARTIER`),
  KEY `IDX_FK_QUARTIER_LIEU` (`ID_LIEU`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quartier`
--

INSERT INTO `quartier` (`ID_QUARTIER`, `ID_LIEU`, `NOM_QUARTIER`, `CAPACITE`) VALUES
(1, 1, 'gerbor', 20);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_QUARTIER` bigint(20) NOT NULL,
  `NOM_USER` text,
  `LOGIN_USER` text,
  `MDP_USER` text,
  PRIMARY KEY (`ID_UTILISATEUR`),
  KEY `IDX_FK_UTILISATEUR_QUARTIER` (`ID_QUARTIER`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `ID_QUARTIER`, `NOM_USER`, `LOGIN_USER`, `MDP_USER`) VALUES
(1, 1, 'Tiavina', 'user', 'user123'),
(2, 1, 'Bienvenue', 'bienvenue@gmail.com', 'bienvenue1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
