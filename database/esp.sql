-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 21 août 2020 à 00:23
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esp`
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

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CODECAT`, `NOMCAT`, `DESCRIPTION`) VALUES
(1, 'boisson', 'naturel');

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
(4, 'Salka', 'Etat', 'Etudiant', 22621124, 223344, 'Nouakchott');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `NUMCOM` int(11) NOT NULL,
  `NUM_CLIENT` int(11) NOT NULL,
  `DATECOM` date NOT NULL DEFAULT current_timestamp(),
  `TOTALE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NUMCOM`, `NUM_CLIENT`, `DATECOM`, `TOTALE`) VALUES
(1, 1, '2020-08-04', 0),
(2, 1, '2020-08-20', 0),
(3, 1, '2020-08-20', 0),
(4, 1, '2020-08-20', 0),
(5, 1, '2020-08-20', 0),
(6, 2, '2020-08-20', 0),
(7, 2, '2020-08-20', 0),
(8, 2, '2020-08-20', 0),
(9, 2, '2020-08-20', 300),
(10, 2, '2020-08-20', 450),
(11, 4, '2020-08-20', 300),
(12, 1, '2020-08-20', 150);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `NUMCOM` int(11) NOT NULL,
  `PRIX_VENTE` double NOT NULL,
  `REFERENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`NUMCOM`, `PRIX_VENTE`, `REFERENCE`) VALUES
(7, 7801, 1),
(1, 15, 12);

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

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`IDFOURNISSEUR`, `NOM`, `PRENOM`, `TEL`) VALUES
(1, 'moustapha', 'taleb', 27273333);

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

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`REFERENCE`, `LIBELLE`, `PRIX`, `CODECAT`, `IDFOURNISSEUR`) VALUES
(1, 'riz', 150, 1, 1),
(2, 'rose', 300, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `IDPROFIL` int(11) NOT NULL,
  `LIBELEPROFIL` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`IDPROFIL`, `LIBELEPROFIL`) VALUES
(1, 'Administrateur'),
(2, 'Approviseur'),
(3, 'Vendeur');

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
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDUSER`, `NOM`, `PRENOM`, `LOGIN`, `MDP`, `IDPROFIL`) VALUES
(1, 'elhadj', 'malik', '3lhj', '6afe3227bdc2e95761be0b5568f72eca7eb21de9', 1),
(2, 'malik', 'ndiaye', 'malik', '6afe3227bdc2e95761be0b5568f72eca7eb21de9', 2),
(3, 'hadra', '92i', 'hadra', '6afe3227bdc2e95761be0b5568f72eca7eb21de9', 3);

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
  MODIFY `CODECAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `NUM_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `NUMCOM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `IDFOURNISSEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `REFERENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `IDPROFIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_num_client` FOREIGN KEY (`NUM_CLIENT`) REFERENCES `client` (`NUM_CLIENT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `fk_num_com_id` FOREIGN KEY (`NUMCOM`) REFERENCES `commande` (`NUMCOM`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_fournisseur_id` FOREIGN KEY (`IDFOURNISSEUR`) REFERENCES `fournisseur` (`IDFOURNISSEUR`),
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`CODECAT`) REFERENCES `categorie` (`CODECAT`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_profil_id` FOREIGN KEY (`IDPROFIL`) REFERENCES `profil` (`IDPROFIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
