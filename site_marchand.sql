CREATE TABLE `categorie_produit` (
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

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'client',
  `email` varchar(50) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `type`, `email`, `nom`, `prenom`, `mdp`, `adresse`, `telephone`) VALUES
(23, 'admin', 'admin', 'NomAdm', 'PrenomAdm', '$2y$10$ftrzKc.OwPhFVY.J6aNPLuy0Ozd4RznDyKJfpVporunWLddfsxrDO', 'Adresse de l''admin', '0123456879'),
(24, 'client', 'client1@client.client', 'Client1Nom', 'Client1', '$2y$10$AqfzuDl2BIBGukmMLCkwQuFTdWnYp9k2XCiCNlEv3oUDHZ2vSK4Za', 'Adresse du client', '0123456789'),
(25, 'client', 'client2@client.client', 'Client2', 'Client2', '$2y$10$/a3tr7PH.Z.eE6g00GvmX.NQzJ2Pl95/r0gmERwuKmdCuwY0MVfTS', 'adresse client', '0123456789'),
(26, 'client', 'a@a.aa', 'Ajax01', 'aze', '$2y$10$McmGAvMAPOdnl75s1by.nugQLXEaJ2E4roZ6Vw3ia4N3OxSU7nDFO', 'adresse client 3', '0123456789'),
(27, 'client', 'test@test.test', 'Ajax02', 'test', '$2y$10$Be7peEuldR0clKSz2/bgQuXW0zcWr7YkeBEOcq5C1/90qY3eqCGn6', 'test', 'test'),
(33, 'client', 'jean', 'Jean', 'Jean', '$2y$10$R2LFDeXFdEVOFioKlN45PuZzsyCtvzB5xBQc5KlYzml8KgtHTP8Eq', 'jean', 'jean');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
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

CREATE TABLE `ligne_commande` (
  `idProduit` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `idMarque` int(4) NOT NULL,
  `nomMarque` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idTaille` int(4) NOT NULL,
  `idCategorie` int(4) NOT NULL,
  `idSport` int(4) NOT NULL,
  `idMarque` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libelle`, `description`, `prix`, `photo`, `idTaille`, `idCategorie`, `idSport`, `idMarque`) VALUES
(1, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(2, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(3, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(4, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(5, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(6, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(7, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(8, 'Maillot home PSG', 'Lorem ipsum', 85, 'photo', 3, 6, 1, 1),
(9, 'Maillot home Marseil', 'Lorem ipsum', 85, 'photo', 4, 6, 1, 2),
(10, 'Short Federer', 'Lorem ipsum', 35, 'photo', 2, 2, 2, 1),
(11, 'Survêtement', 'Lorem ipsum', 70, 'photo', 5, 3, 3, 4),
(12, 'Mercurial', 'Lorem ipsum', 140, 'photo', 8, 5, 1, 1),
(13, 'Maillot home PSG', 'Lorem ipsum', 85, 'photo', 3, 6, 1, 1),
(14, 'Maillot home Marseil', 'Lorem ipsum', 85, 'photo', 4, 6, 1, 2),
(15, 'Short Federer', 'Lorem ipsum', 35, 'photo', 2, 2, 2, 1),
(16, 'Survêtement', 'Lorem ipsum', 70, 'photo', 5, 3, 3, 4),
(17, 'Pantalon survêtement', 'Lorem ipsum', 80, 'photo', 6, 3, 6, 3),
(18, 'Short Warriors', 'Lorem ipsum', 45, 'photo', 3, 2, 3, 1),
(19, 'Short away PSG', 'Lorem ipsum', 35, 'photo', 1, 2, 1, 1),
(20, 'T-Shirt rugby', 'Lorem ipsum', 15, 'photo', 3, 1, 6, 3),
(21, 'T-Shirt Jordan', 'Lorem ipsum', 30, 'photo', 4, 1, 3, 2),
(22, 'Haut Federer', 'Lorem ipsum', 35, 'photo', 5, 1, 2, 1),
(23, 'Tiempo', 'Lorem ipsum', 100, 'photo', 10, 5, 1, 1),
(24, 'Hypervenom', 'Lorem ipsum', 200, 'photo', 11, 5, 1, 1),
(25, 'Survêtement Bulls', 'Lorem ipsum', 90, 'photo', 2, 3, 3, 2),
(26, 'Mercurial', 'Lorem ipsum', 140, 'Football/mercurial.jpg', 8, 5, 1, 1),
(27, 'Maillot home PSG', 'Lorem ipsum', 85, 'Football/maillotHomePSG.jpg', 3, 6, 1, 1),
(28, 'Maillot home Marseil', 'Lorem ipsum', 85, '', 4, 6, 1, 2),
(29, 'Short Federer', 'Lorem ipsum', 35, '', 2, 2, 2, 1),
(30, 'Survêtement', 'Lorem ipsum', 70, '', 5, 3, 3, 4),
(31, 'Pantalon survêtement', 'Lorem ipsum', 80, '', 6, 3, 6, 3),
(32, 'Short Warriors', 'Lorem ipsum', 45, '', 3, 2, 3, 1),
(33, 'Short away PSG', 'Lorem ipsum', 35, '', 1, 2, 1, 1),
(34, 'T-Shirt rugby', 'Lorem ipsum', 15, '', 3, 1, 6, 3),
(35, 'T-Shirt Jordan', 'Lorem ipsum', 30, '', 4, 1, 3, 2),
(36, 'Haut Federer', 'Lorem ipsum', 35, '', 5, 1, 2, 1),
(37, 'Tiempo', 'Lorem ipsum', 100, '', 10, 5, 1, 1),
(38, 'Hypervenom', 'Lorem ipsum', 200, '', 11, 5, 1, 1),
(39, 'Survêtement Bulls', 'Lorem ipsum', 90, '', 2, 3, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `idSport` int(4) NOT NULL,
  `nomSport` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

CREATE TABLE `taille` (
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
  ADD KEY `FK_COMMANDE_idClient` (`idClient`);

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
  ADD KEY `idTaille` (`idTaille`),
  ADD KEY `idMarque` (`idMarque`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`idSport`);

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
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
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
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `idMarque` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
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
  ADD CONSTRAINT `FK_PRODUIT_idSport` FOREIGN KEY (`idSport`) REFERENCES `sport` (`idSport`),
  ADD CONSTRAINT `FK_PRODUIT_idTaille` FOREIGN KEY (`idTaille`) REFERENCES `taille` (`idTaille`);

--
-- Contraintes pour la table `taille`
--
ALTER TABLE `taille`
  ADD CONSTRAINT `FK_TAILLE_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie_produit` (`idCategorie`);
