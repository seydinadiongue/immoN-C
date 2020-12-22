-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 nov. 2019 à 22:33
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
('10', 'mamae saya', 'kkeke', 'Ouakam', 789654321),
('11', 'najklAZNSK', 'kjhgf', 'NZAKy', 78908765),
('2', 'aliou', 'diop', 'parcelle', 776540987),
('22', 'Astou', 'Thiam', 'safhrg', 772347678),
('33', 'Ndeye', 'mbaye', 'Nimzatt', 778890987),
('bame', 'ndiouma', 'bame', 'ouakam', 772234568);

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `idBien` int(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`idBien`, `adresse`, `type`, `prix`, `description`, `image`, `image1`, `image2`, `etat`) VALUES
(346, 'guhbjnkm', 'Appartement', 67890, ' tfgyuiujnmkl,', '1572693686.jpg', '', '', 'disponible'),
(348, 'sandiara', 'Immeuble', 3456700000, ' raffet caar', '1572692594.jpg', '', '', 'indisponible'),
(349, 'dieupeul', 'Immeuble', 45000, 'chambres \r\nsalons\r\njardin', '1572609546.jpg', '', '', 'disponible'),
(350, 'nimzatt', 'Immeuble', 98, ' apps\r\npiscine', '1572609587.jpg', '', '', 'indisponible'),
(351, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'Immeuble', 12233, ' ', '1572698433.jpg', '', '', 'disponible'),
(352, 'wire', 'Immeuble', 288900, ' etudiante bou sof ', '1572877869.jpg', '1572877869.jpg', '1572877869.png', 'disponible'),
(353, 'aaA', 'Immeuble', 243143, ' ZSASASA', '1572882498.jpg', '1572882498.jpg', '1572882498.jpg', 'disponible'),
(354, 'a', 'Appartement', 7884372, ' shhshjsjsj', 'a1572883100.jpg', 'b1572883100.jpg', 'c1572883100.jpg', 'disponible'),
(355, 'a', 'Appartement', 7884372, ' shhshjsjsj', 'a1572883180.jpg', 'b1572883180.jpg', 'c1572883180.jpg', 'disponible'),
(356, 'a,z,,ZM z', 'Immeuble', 7899990, ' zsZSz', '1572883519.jpg', '1572883520.jpg', '1572883521.jpg', 'disponible'),
(357, 'sxsaaxA', 'Immeuble', 2345, ' asdddsssd', '1572884252.jpg', '1572884253.jpg', '1572884254.jpg', 'disponible'),
(358, 'riudd', 'Immeuble', 39399932, 'dcmkcmcmc', '1572887858.jpg', '1572887859.jpg', '1572887860.jpg', 'disponible');

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
('1', 'astou', 'thiam', 'ucad', 773456789),
('111', 'Ibrahima', 'Bah', 'Parcelles', 78908732),
('222', 'Cheikh', 'Dieng', 'fann', 778909890),
('44', 's', 'jqaszqas', 'zsqaszqz', 777909090),
('99', 'diye', 'ba', 'fann', 778907765),
('A', 'wsqws1qw', 'wqwqw', 'aqsqs', 777789609);

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
('10', '10', 'actif'),
('11', 'shu', 'actif'),
('111', 'azerty', 'actif'),
('2', 'azerty', 'actif'),
('22', 'azerty', 'actif'),
('222', 'azerty', 'actif'),
('33', 'bah', 'actif'),
('44', 'bn', 'actif'),
('99', '99', 'actif'),
('A', 'A', 'actif'),
('bame', 'bame', 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `idLoc` int(50) NOT NULL,
  `dateEntree` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `arriere` float DEFAULT NULL,
  `idBien` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`idLoc`, `dateEntree`, `dateSortie`, `arriere`, `idBien`, `image`) VALUES
(76, NULL, NULL, NULL, '345', '1572557416.jpg'),
(78, NULL, NULL, NULL, '344', '1572557159.jpg'),
(80, NULL, NULL, NULL, '350', '1572609587.jpg'),
(84, NULL, NULL, NULL, '348', '1572692594.jpg'),
(85, NULL, NULL, NULL, '350', '1572609587.jpg'),
(86, NULL, NULL, NULL, '350', '1572609587.jpg'),
(87, NULL, NULL, NULL, '350', '1572609587.jpg');

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
(50, '348', '2019-11-02', 'valider', '1', '1572692594.jpg'),
(51, '349', '2019-11-02', 'valider', '1', '1572609546.jpg'),
(52, '350', '2019-11-02', 'valider', '1', '1572609587.jpg'),
(53, '351', '2019-11-02', 'valider', '1', '1572698433.jpg'),
(54, '348', '2019-11-03', 'valider', '1', '1572692594.jpg'),
(55, '348', '2019-11-03', 'valider', '1', '1572692594.jpg'),
(56, '350', '2019-11-03', 'valider', '1', '1572609587.jpg'),
(57, '350', '2019-11-03', 'valider', '1', '1572609587.jpg'),
(58, '350', '2019-11-03', 'valider', '1', '1572609587.jpg'),
(59, '350', '2019-11-03', 'valider', '1', '1572609587.jpg'),
(60, '350', '2019-11-03', 'en attente', '1', '1572609587.jpg'),
(61, '350', '2019-11-03', 'valider', '1', '1572609587.jpg'),
(62, '350', '2019-11-03', 'en attente', '1', '1572609587.jpg'),
(63, '350', '2019-11-03', 'en attente', '1', '1572609587.jpg'),
(67, '350', '2019-11-04', 'en attente', '1', '1572609587.jpg'),
(68, '351', '2019-11-04', 'en attente', '1', '1572698433.jpg'),
(69, '346', '2019-11-04', 'en attente', '111', '1572693686.jpg'),
(70, '351', '2019-11-04', 'en attente', '111', '1572698433.jpg'),
(71, '349', '2019-11-04', 'en attente', '111', '1572609546.jpg'),
(72, '349', '2019-11-04', 'en attente', '111', '1572609546.jpg'),
(73, '349', '2019-11-04', 'en attente', '111', '1572609546.jpg');

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
  ADD KEY `fk_mesualite_bients_louer` (`idClient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
  MODIFY `idBien` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `idLoc` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
