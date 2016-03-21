-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 21 Mars 2016 à 15:24
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
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `type`, `email`, `nom`, `prenom`, `mdp`, `adresse`, `telephone`) VALUES
(23, 'admin', 'admin', 'NomAdm', 'PrenomAdm', '$2y$10$ftrzKc.OwPhFVY.J6aNPLuy0Ozd4RznDyKJfpVporunWLddfsxrDO', 'Adresse de l''admin', '0123456879'),
(24, 'client', 'client1@client.client', 'Client1Nom', 'Client1', '$2y$10$AqfzuDl2BIBGukmMLCkwQuFTdWnYp9k2XCiCNlEv3oUDHZ2vSK4Za', 'Adresse du client', '0123456789'),
(25, 'client', 'client2@client.client', 'Client2', 'Client2', '$2y$10$/a3tr7PH.Z.eE6g00GvmX.NQzJ2Pl95/r0gmERwuKmdCuwY0MVfTS', 'adresse client', '0123456789'),
(26, 'client', 'a@a.aa', 'Ajax01', 'aze', '$2y$10$McmGAvMAPOdnl75s1by.nugQLXEaJ2E4roZ6Vw3ia4N3OxSU7nDFO', 'adresse client 3', '0123456789'),
(27, 'client', 'test@test.test', 'Ajax02', 'test', '$2y$10$Be7peEuldR0clKSz2/bgQuXW0zcWr7YkeBEOcq5C1/90qY3eqCGn6', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `prixCommande` float DEFAULT NULL,
  `passee` tinyint(1) DEFAULT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `idProduit` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idCategorie` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
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
  ADD KEY `FK_COMMANDE_idClient` (`idClient`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`idProduit`,`idCommande`),
  ADD KEY `FK_LIGNE_COMMANDE_idCommande` (`idCommande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `FK_PRODUIT_idCategorie` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `FK_PRODUIT_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
