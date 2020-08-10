-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 19 juil. 2020 à 09:06
-- Version du serveur :  10.1.31-MariaDB
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
-- Base de données :  `esp`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CODECAT` int(11) NOT NULL,
  `NOMCAT` varchar(32) NOT NULL,
  `DESCRIPTION` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `NUM_CLIENT` int(11) NOT NULL,
  `NOMCLIENT` varchar(32) NOT NULL,
  `RAISONSOCIAL` varchar(64) NOT NULL,
  `FONCTION` varchar(32) NOT NULL,
  `TEL` int(8) NOT NULL,
  `FAX` int(8) NOT NULL,
  `ADRESS` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NUM_CLIENT`, `NOMCLIENT`, `RAISONSOCIAL`, `FONCTION`, `TEL`, `FAX`, `ADRESS`) VALUES
(1, 'Sabta', 'Fonctionnaire', 'Professeur', 22345567, 456789, 'pk4533'),
(2, 'Khadija', 'Etudiant', 'Etudiant', 44556543, 45653789, 'Socogime'),
(3, 'Salka', 'Etat', 'Medecin', 42642225, 234, 'Rosso'),
(4, 'Salka', 'Etat', 'Etudiant', 22621124, 223344, 'Nouakchott');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `NUMCOM` int(11) NOT NULL,
  `NUM_CLIENT` int(11) NOT NULL,
  `DATECOM` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `NUMCOM` int(11) NOT NULL,
  `PRIX_VENTE` double NOT NULL,
  `REFERENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `IDFOURNISSEUR` int(11) NOT NULL,
  `NOM` varchar(64) NOT NULL,
  `PRENOM` varchar(64) NOT NULL,
  `TEL` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `REFERENCE` int(11) NOT NULL,
  `LIBELLE` varchar(64) NOT NULL,
  `PRIX` double NOT NULL,
  `CODECAT` int(11) NOT NULL,
  `IDFOURNISSEUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `IDPROFIL` int(11) NOT NULL,
  `LIBELEPROFIL` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDUSER` int(11) NOT NULL,
  `NOM` varchar(32) NOT NULL,
  `PRENOM` varchar(32) NOT NULL,
  `LOGIN` varchar(32) NOT NULL,
  `MDP` varchar(128) NOT NULL,
  `IDPROFIL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CODECAT`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`NUM_CLIENT`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NUMCOM`),
  ADD KEY `FK_COMMANDE2` (`NUM_CLIENT`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`REFERENCE`,`NUMCOM`),
  ADD KEY `FK_CONT1` (`NUMCOM`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`IDFOURNISSEUR`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`REFERENCE`),
  ADD KEY `FK_COMMANDE` (`CODECAT`),
  ADD KEY `FK_FOURNIS4` (`IDFOURNISSEUR`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`IDPROFIL`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDUSER`),
  ADD KEY `FK_USER` (`IDPROFIL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CODECAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `NUM_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `NUMCOM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `IDFOURNISSEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `REFERENCE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `IDPROFIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDE2` FOREIGN KEY (`NUM_CLIENT`) REFERENCES `client` (`NUM_CLIENT`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
