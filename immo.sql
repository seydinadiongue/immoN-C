-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 déc. 2020 à 18:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `idAgent` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(50) NOT NULL,
  PRIMARY KEY (`idAgent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`idAgent`, `prenom`, `nom`, `adresse`, `telephone`) VALUES
('agent1', 'Ndeye Asto', 'Thiam', 'Nimzat', 777890765),
('agent2', 'cheikh ', 'Dieng', 'Fass Mbao', 789067654),
('agent3', 'Ibrahima', 'Bah', 'Parcelles', 768954356),
('agent4', 'Ndama', 'Gaye', 'Mamelles', 789085467),
('agent5', 'Ndiouma', 'Bame', 'Rufisque', 777904337);

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

DROP TABLE IF EXISTS `bien`;
CREATE TABLE IF NOT EXISTS `bien` (
  `idBien` int(50) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`idBien`)
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`idBien`, `adresse`, `type`, `prix`, `description`, `image`, `image1`, `image2`, `etat`) VALUES
(364, 'almadies', 'Appartement', 650000, ' L\\\'appartement comprend trois chambres meubles ,une piscine,garage,terrasse .Il est tres securise et represente en meme temps un espace familial.', '1572950859.jpg', '1572950860.jpg', '1572950861.jpg', 'indisponible'),
(366, 'dakar', 'Immeuble', 2500000, ' immeuble 5 etages ,chambres tres spacieuses ,une terrasse,un jardin ,des allees .Il a aussi des salles d\'eaux au sein de chacun de ses appartements .', '1572954345.jpg', '1572954346.jpg', '1572954347.jpg', 'disponible'),
(367, 'sicap', 'Appartement', 750000, 'appartement  de 5 etages ,chambres tres spacieuses ,une terrasse,un jardin ,des allees .Il a aussi des salles d\'eaux ,une cuisine ,un garage ....', '1572954470.jpg', '1572954471.jpg', '1572954472.jpg', 'indisponible'),
(369, 'parcelles', 'Appartement', 650980, 'appatement 2 pieces ,chambres tres spacieuses ,une terrasse,un jardin ,des allees .Il a aussi des salles d\'eaux,un espace de jeux pour enfant', '1572956117.jpg', '1572956118.jpg', '1572956119.jpg', 'disponible'),
(370, 'ouakam', 'Immeuble', 1000400, ' immeuble 3 etages ,chambres tres spacieuses ,une terrasse,un jardin ,des allees .Il a aussi des salles d\\\'eaux au sein de chacun de ses appartements .', '1572956235.jpg', '1572956236.jpg', '1572956237.jpg', 'indisponible'),
(371, 'parcelles', 'Appartement', 230000, 'appartement de  5 chambres tres spacieuses ,une terrasse,un jardin ,des allees .Il a aussi des salles d\'eaux...', '1572956694.jpg', '1572956695.jpg', '1572956696.jpg', 'disponible'),
(372, 'thie', 'Immeuble', 8000000, ' immeuble muni de 3 appartement ayant chacun 3 piÃ©ces', '1577294157.jpg', '1577294158.jpg', '1577294159.jpg', 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(50) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `prenom`, `nom`, `adresse`, `telephone`) VALUES
('client1', 'Diye', 'Ba', 'Mariste', 789076665),
('client2', 'Joseph', 'sene', 'Geule Tapee', 778906543),
('client3', 'Mame Saye', 'Kebe', 'Ouakam', 778906543),
('client4', 'cheikh', 'Senghor', 'Liberte 6', 776895433),
('client5', 'Modou', 'Gueye', 'Parcelles', 789064367);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `mdp`, `etat`) VALUES
('agent1', 'azerty', 'actif'),
('agent2', 'azerty', 'actif'),
('agent3', 'azerty', 'non actif'),
('agent4', 'azerty', 'actif'),
('agent5', 'azerty', 'actif'),
('client1', 'azerty', 'actif'),
('client2', 'azerty', 'actif'),
('client3', 'azerty', 'actif'),
('client4', 'azerty', 'actif'),
('client5', 'azerty', 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `idLoc` int(50) NOT NULL AUTO_INCREMENT,
  `dateEntree` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `arriere` float DEFAULT NULL,
  `idBien` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`idLoc`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`idLoc`, `dateEntree`, `dateSortie`, `arriere`, `idBien`, `image`) VALUES
(88, NULL, '2019-01-05', 200000, '367', '1572954470.jpg'),
(89, NULL, '2019-12-05', 100000, '370', '1572956235.jpg'),
(92, NULL, '2019-12-06', 10000, '364', '1572950859.jpg'),
(93, NULL, NULL, NULL, '370', '1572956235.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idBien` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(50) NOT NULL,
  `idClient` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `fk_mesualite_bients_louer` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `idBien`, `date`, `etat`, `idClient`, `image`) VALUES
(74, '367', '2019-11-05', 'valider', 'client1', '1572954470.jpg'),
(75, '364', '2019-11-05', 'valider', 'client1', '1572950859.jpg'),
(76, '370', '2019-11-05', 'valider', 'client2', '1572956235.jpg'),
(77, '371', '2019-11-05', 'valider', 'client2', '1572956694.jpg'),
(78, '371', '2019-11-05', 'valider', 'client1', '1572956694.jpg'),
(79, '370', '2019-11-05', 'valider', 'client1', '1572956235.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_mesualite_bients_louer` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
