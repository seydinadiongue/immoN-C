-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 26 oct. 2019 à 13:43
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `idAgent` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`idAgent`, `prenom`, `nom`, `adresse`, `telephone`) VALUES
('11', 'penda', 'diagne', 'touba', 777909090),
('2', 'aliou', 'diop', 'parcelle', 776540987),
('22', 'ndeyashu', 'thiam', 'nimzatt', 2147483647);

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `idBien` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`idBien`, `adresse`, `type`, `prix`, `description`, `image`, `etat`) VALUES
('1', 'aldiana', 'immeuble', 1000, '	ehuuher			', '\"1.jpg\"', 'disponible'),
('13', 'point E', 'immeuble', 200000, 'gghhhhhhhhhhhhhhhhh\r\nhhjhjjjjjjjjjjj\r\nhhhhhhhhh\r\nnnnnnnnn				', '\"13.jpg\"', 'disponible'),
('15', 'hlm', 'appartement', 32000, 'dgghdhhdhhd\r\ndhhdhdhhhd\r\ndjjd				', '\"im2.png\"', 'disponible'),
('17', 'ngor', 'immeuble', 30000, '	dhdhjd\r\ndhhjhd\r\nkjd			', '\"ab.jpg\"', 'disponible'),
('20', 'fann', 'appartement', 245678990, '	2 chambres 			', '\"11.jpg\"', 'disponible'),
('6', 'alamdie', 'appartement', 320000, '		ffbb \r\nfffhfgh\r\ngvgvv\r\ngvgv		', '\"6.jpg\"', 'indisponible'),
('9', '', 'appartement', 0, '', '', 'indisponible');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `prenom`, `nom`, `adresse`, `telephone`) VALUES
('1', 'astou', 'thiam', 'ucad', 773456789);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `mdp`, `etat`) VALUES
('1', 'azerty', 'actif'),
('11', 'azerty', 'non actif'),
('2', 'azerty', 'actif'),
('22', 'azerty', 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `idLoc` int(50) NOT NULL,
  `dateEntree` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateSortie` datetime DEFAULT CURRENT_TIMESTAMP,
  `arriere` float DEFAULT NULL,
  `idBien` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`idLoc`, `dateEntree`, `dateSortie`, `arriere`, `idBien`, `image`) VALUES
(32, '2019-10-25 18:03:10', '2019-10-25 18:03:10', NULL, '13', '13.jpg'),
(34, '2019-10-25 18:07:09', '2019-10-25 18:07:09', NULL, '13', '13.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(50) UNSIGNED NOT NULL,
  `idBien` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(50) NOT NULL,
  `idClient` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `idBien`, `date`, `etat`, `idClient`, `image`) VALUES
(9, '1', '2025-10-19', 'en cours', NULL, '1.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`idAgent`);

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`idBien`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idLoc`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `fk_mesualite_bients_louer` (`idClient`),
  ADD KEY `fk_mesualite_bients_loer` (`idBien`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `idLoc` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_mesualite_bients_loer` FOREIGN KEY (`idBien`) REFERENCES `bien` (`idBien`),
  ADD CONSTRAINT `fk_mesualite_bients_louer` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
