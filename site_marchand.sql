-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Avril 2016 à 18:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `site_marchand`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`idCategorie`, `nomCategorie`) VALUES
(1, 'T-Shirt'),
(2, 'Short'),
(3, 'Pantalon'),
(4, 'Vestes'),
(5, 'Chaussures'),
(6, 'Maillot');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'client',
  `email` varchar(50) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `type`, `email`, `nom`, `prenom`, `mdp`, `adresse`, `telephone`) VALUES
(23, 'admin', 'admin', 'NomAdm', 'PrenomAdm', '$2y$10$ftrzKc.OwPhFVY.J6aNPLuy0Ozd4RznDyKJfpVporunWLddfsxrDO', 'Adresse de l''admin', '0123456879'),
(24, 'client', 'client', 'Client1Nom', 'Client1', '$2y$10$AqfzuDl2BIBGukmMLCkwQuFTdWnYp9k2XCiCNlEv3oUDHZ2vSK4Za', 'Adresse du client', '0123456789'),
(25, 'client', 'client2@client.client', 'Client2', 'Client2', '$2y$10$/a3tr7PH.Z.eE6g00GvmX.NQzJ2Pl95/r0gmERwuKmdCuwY0MVfTS', 'adresse client', '0123456789'),
(26, 'client', 'a@a.aa', 'Ajax01', 'aze', '$2y$10$McmGAvMAPOdnl75s1by.nugQLXEaJ2E4roZ6Vw3ia4N3OxSU7nDFO', 'adresse client 3', '0123456789'),
(27, 'client', 'test@test.test', 'Ajax02', 'test', '$2y$10$Be7peEuldR0clKSz2/bgQuXW0zcWr7YkeBEOcq5C1/90qY3eqCGn6', 'test', 'test'),
(33, 'client', 'jean', 'Jean', 'Jean', '$2y$10$R2LFDeXFdEVOFioKlN45PuZzsyCtvzB5xBQc5KlYzml8KgtHTP8Eq', 'jean', 'jean');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `prixCommande` float DEFAULT NULL,
  `passee` tinyint(1) DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `FK_COMMANDE_idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `idCommande` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduit`,`idCommande`),
  KEY `FK_LIGNE_COMMANDE_idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
  `idMarque` int(4) NOT NULL AUTO_INCREMENT,
  `nomMarque` varchar(30) NOT NULL,
  PRIMARY KEY (`idMarque`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`idMarque`, `nomMarque`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Under armour'),
(5, 'Umbro');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idTaille` int(4) NOT NULL,
  `idCategorie` int(4) NOT NULL,
  `idSport` int(4) NOT NULL,
  `idMarque` int(4) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `FK_PRODUIT_idCategorie` (`idCategorie`),
  KEY `idSport` (`idSport`),
  KEY `idTaille` (`idTaille`),
  KEY `idMarque` (`idMarque`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libelle`, `description`, `prix`, `photo`, `idTaille`, `idCategorie`, `idSport`, `idMarque`) VALUES
(1, 'Mercurial', 'Lorem ipsum', 140, 'Football/mercurial.jpg', 8, 5, 1, 1),
(2, 'Maillot home PSG', 'Lorem ipsum', 85, 'Football/maillotHomePSG.jpg', 3, 6, 1, 1),
(3, 'Maillot home Marseille', 'Lorem ipsum', 85, 'Football/maillotHomeMarseille.jpg', 4, 6, 1, 2),
(4, 'Short Federer', 'Lorem ipsum', 35, 'Tennis/shortFederer.jpg', 2, 2, 2, 1),
(5, 'Survêtement Cleveland', 'Lorem ipsum', 70, 'Basketball/survetementCleveland.jpg', 5, 3, 3, 4),
(6, 'Pantalon survêtement', 'Lorem ipsum', 130, 'Rugby/survetementRugby.jpg', 6, 3, 6, 3),
(7, 'Short Warriors', 'Lorem ipsum', 45, 'Basketball/shortWarriors.jpg', 3, 2, 3, 1),
(8, 'Short away PSG', 'Lorem ipsum', 35, 'Football/shortAwayPSG.jpg', 1, 2, 1, 1),
(9, 'T-Shirt rugby', 'Lorem ipsum', 15, 'Rugby/t-shirtRugby.jpg', 3, 1, 6, 3),
(10, 'T-Shirt Jordan', 'Lorem ipsum', 30, 'Basketball/t-shirtJordan.jpg', 4, 1, 3, 2),
(11, 'T-Shirt Federer', 'Lorem ipsum', 35, 'Tennis/t-shirtFederer.jpg', 5, 1, 2, 1),
(12, 'Tiempo', 'Lorem ipsum', 100, 'Football/tiempo.jpg', 10, 5, 1, 1),
(13, 'Hypervenom', 'Lorem ipsum', 200, 'Football/hypervenom.jpg', 11, 5, 1, 1),
(14, 'Survêtement Bulls', 'Lorem ipsum', 90, 'Basketball/survetementBulls.jpg', 2, 3, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `idSport` int(4) NOT NULL AUTO_INCREMENT,
  `nomSport` varchar(30) NOT NULL,
  PRIMARY KEY (`idSport`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `sport`
--

INSERT INTO `sport` (`idSport`, `nomSport`) VALUES
(1, 'Football'),
(2, 'Tennis'),
(3, 'Basketball'),
(4, 'Handball'),
(5, 'Natation'),
(6, 'Rugby');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE IF NOT EXISTS `taille` (
  `idTaille` int(4) NOT NULL AUTO_INCREMENT,
  `nomTaille` varchar(10) NOT NULL,
  `idCategorie` int(4) NOT NULL,
  PRIMARY KEY (`idTaille`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `taille`
--

INSERT INTO `taille` (`idTaille`, `nomTaille`, `idCategorie`) VALUES
(1, 'XS', 1),
(2, 'S', 1),
(3, 'M', 1),
(4, 'L', 1),
(5, 'XL', 1),
(6, 'XXL', 1),
(7, '42', 5),
(8, '43', 5),
(9, '44', 5),
(10, '45', 5),
(11, '46', 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDE_idClient` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `FK_LIGNE_COMMANDE_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `FK_LIGNE_COMMANDE_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_PRODUIT_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie_produit` (`idCategorie`),
  ADD CONSTRAINT `FK_PRODUIT_idMarque` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`),
  ADD CONSTRAINT `FK_PRODUIT_idSport` FOREIGN KEY (`idSport`) REFERENCES `sport` (`idSport`),
  ADD CONSTRAINT `FK_PRODUIT_idTaille` FOREIGN KEY (`idTaille`) REFERENCES `taille` (`idTaille`);

--
-- Contraintes pour la table `taille`
--
ALTER TABLE `taille`
  ADD CONSTRAINT `FK_TAILLE_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie_produit` (`idCategorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
