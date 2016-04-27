-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Avril 2016 à 01:36
-- Version du serveur :  5.6.28-0ubuntu0.15.10.1
-- Version de PHP :  5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_marchand`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `idClient` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'client',
  `email` varchar(50) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `type`, `email`, `nom`, `prenom`, `mdp`, `adresse`, `telephone`) VALUES
(23, 'admin', 'admin', 'NomAdm', 'PrenomAdm', '$2y$10$ftrzKc.OwPhFVY.J6aNPLuy0Ozd4RznDyKJfpVporunWLddfsxrDO', 'Adresse de l''admin', '0123456879'),
(24, 'client', 'client', 'Client1Nom1', 'Client1', '$2y$10$AqfzuDl2BIBGukmMLCkwQuFTdWnYp9k2XCiCNlEv3oUDHZ2vSK4Za', 'Adresse du client', '0123456789'),
(25, 'client', 'client2@client.client', 'Client2', 'Client2', '$2y$10$/a3tr7PH.Z.eE6g00GvmX.NQzJ2Pl95/r0gmERwuKmdCuwY0MVfTS', 'adresse client', '0123456789'),
(26, 'client', 'a@a.aa', 'Ajax01', 'aze', '$2y$10$McmGAvMAPOdnl75s1by.nugQLXEaJ2E4roZ6Vw3ia4N3OxSU7nDFO', 'adresse client 3', '0123456789'),
(27, 'client', 'test@test.test', 'Ajax02', 'test', '$2y$10$Be7peEuldR0clKSz2/bgQuXW0zcWr7YkeBEOcq5C1/90qY3eqCGn6', 'test', 'test'),
(33, 'client', 'jean', 'Jean1', 'Jean', '$2y$10$R2LFDeXFdEVOFioKlN45PuZzsyCtvzB5xBQc5KlYzml8KgtHTP8Eq', 'jean1', 'jean'),
(34, 'client', 'aze@aze.aze', 'Nomtest', 'Test', '$2y$10$S12OCkTsAZXunuPZ./bzYOk9TMm/vcYwSEi9PhTTdTEq.w7.Lwutu', 'aze', 'aze');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prixCommande` float NOT NULL DEFAULT '0',
  `idEtat` int(11) NOT NULL DEFAULT '1',
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `prixCommande`, `idEtat`, `idClient`) VALUES
(72, '2016-04-27 22:14:33', 140, 3, 23);

-- --------------------------------------------------------

--
-- Structure de la table `commande_etat`
--

CREATE TABLE IF NOT EXISTS `commande_etat` (
  `idEtat` int(11) NOT NULL,
  `nomEtat` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_etat`
--

INSERT INTO `commande_etat` (`idEtat`, `nomEtat`) VALUES
(1, 'Paiement'),
(2, 'Livraison'),
(3, 'Terminée');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `idTaille` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`idCommande`, `idProduit`, `quantite`, `idTaille`) VALUES
(72, 1, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
  `idMarque` int(4) NOT NULL,
  `nomMarque` varchar(30) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`idMarque`, `nomMarque`, `logo`) VALUES
(1, 'Nike', 'images/Logos/just-do-it.jpg'),
(2, 'Adidas', 'images/Logos/Adidas-Logo.png'),
(3, 'Puma', 'images/Logos/puma.jpg'),
(4, 'Under armour', 'images/Logos/underarmour.jpg'),
(5, 'Umbro', 'images/Logos/umbro.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idCategorie` int(4) NOT NULL,
  `idSport` int(4) NOT NULL,
  `idMarque` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libelle`, `description`, `prix`, `photo`, `idCategorie`, `idSport`, `idMarque`) VALUES
(1, 'Mercurial', 'Lorem ipsum', 140, 'Football/mercurial.jpg', 5, 1, 1),
(2, 'Maillot home PSG', 'Lorem ipsum', 85, 'Football/maillotHomePSG.jpg', 6, 1, 1),
(3, 'Maillot home Marseille', 'Lorem ipsum', 85, 'Football/maillotHomeMarseille.jpg', 6, 1, 2),
(4, 'Short Federer', 'Lorem ipsum', 35, 'Tennis/shortFederer.jpg', 2, 2, 1),
(5, 'Survêtement Cleveland', 'Lorem ipsum', 70, 'Basketball/survetementCleveland.jpg', 3, 3, 4),
(6, 'Pantalon survêtement', 'Lorem ipsum', 130, 'Rugby/survetementRugby.jpg', 3, 6, 3),
(7, 'Short Warriors', 'Lorem ipsum', 45, 'Basketball/shortWarriors.jpg', 2, 3, 1),
(8, 'Short away PSG', 'Lorem ipsum', 35, 'Football/shortAwayPSG.jpg', 2, 1, 1),
(9, 'T-Shirt rugby', 'Lorem ipsum', 15, 'Rugby/t-shirtRugby.jpg', 1, 6, 3),
(10, 'T-Shirt Jordan', 'Lorem ipsum', 30, 'Basketball/t-shirtJordan.jpg', 1, 3, 2),
(11, 'T-Shirt Federer', 'Lorem ipsum', 35, 'Tennis/t-shirtFederer.jpg', 1, 2, 1),
(12, 'Tiempo', 'Lorem ipsum', 100, 'Football/tiempo.jpg', 5, 1, 1),
(13, 'Hypervenom', 'Lorem ipsum', 200, 'Football/hypervenom.jpg', 5, 1, 1),
(14, 'Survêtement Bulls', 'Lorem ipsum', 90, 'Basketball/survetementBulls.jpg', 3, 3, 2),
(16, 'Maillot NBA Kobe Bryant', 'Los Angeles Lakers', 60, './images/Basketball/kobe.jpg', 1, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `idSport` int(4) NOT NULL,
  `nomSport` varchar(30) NOT NULL,
  `icone` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sport`
--

INSERT INTO `sport` (`idSport`, `nomSport`, `icone`) VALUES
(1, 'Football', 'images/Sports/soccer-128.png'),
(2, 'Tennis', 'images/Sports/tennis-128.png'),
(3, 'Basketball', 'images/Sports/basketball-128.png'),
(4, 'Handball', 'images/Sports/soccer-128.png'),
(5, 'Natation', 'images/Sports/soccer-128.png'),
(6, 'Rugby', 'images/Sports/rugbyball-128.png');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `idProduit` int(11) NOT NULL,
  `idTaille` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`idProduit`, `idTaille`, `quantite`) VALUES
(1, 9, 4),
(2, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE IF NOT EXISTS `taille` (
  `idTaille` int(4) NOT NULL,
  `nomTaille` varchar(10) NOT NULL,
  `idCategorie` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `FK_COMMANDE_idClient` (`idClient`),
  ADD KEY `idEtat` (`idEtat`);

--
-- Index pour la table `commande_etat`
--
ALTER TABLE `commande_etat`
  ADD PRIMARY KEY (`idEtat`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`idProduit`,`idCommande`),
  ADD KEY `FK_LIGNE_COMMANDE_idCommande` (`idCommande`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`idMarque`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `FK_PRODUIT_idCategorie` (`idCategorie`),
  ADD KEY `idSport` (`idSport`),
  ADD KEY `idMarque` (`idMarque`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`idSport`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idProduit`,`idTaille`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idTaille` (`idTaille`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`idTaille`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `commande_etat`
--
ALTER TABLE `commande_etat`
  MODIFY `idEtat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `idMarque` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `idSport` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `taille`
--
ALTER TABLE `taille`
  MODIFY `idTaille` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
  ADD CONSTRAINT `FK_PRODUIT_idSport` FOREIGN KEY (`idSport`) REFERENCES `sport` (`idSport`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `FK_STOCK_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `FK_STOCK_idTaille` FOREIGN KEY (`idTaille`) REFERENCES `taille` (`idTaille`);

--
-- Contraintes pour la table `taille`
--
ALTER TABLE `taille`
  ADD CONSTRAINT `FK_TAILLE_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie_produit` (`idCategorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
