-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2020 at 01:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `CODECAT` int(11) NOT NULL,
  `NOMCAT` varchar(32) NOT NULL,
  `DESCRIPTION` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
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
-- Dumping data for table `client`
--

INSERT INTO `client` (`NUM_CLIENT`, `NOMCLIENT`, `RAISONSOCIAL`, `FONCTION`, `TEL`, `FAX`, `ADRESS`) VALUES
(1, 'Sabta', 'Fonctionnaire', 'Professeur', 22345568, 456789, 'pk4533'),
(2, 'Khadija', 'Etudiant', 'Etudiant', 44556543, 45653789, 'Socogime'),
(3, 'Salka', 'Etat', 'Medecin', 42642225, 234, 'Rosso'),
(4, 'Salka', 'Etat', 'Etudiant', 22621124, 223344, 'Nouakchott');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `NUMCOM` int(11) NOT NULL,
  `NUM_CLIENT` int(11) NOT NULL,
  `DATECOM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contenir`
--

CREATE TABLE `contenir` (
  `NUMCOM` int(11) NOT NULL,
  `PRIX_VENTE` double NOT NULL,
  `REFERENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `IDFOURNISSEUR` int(11) NOT NULL,
  `NOM` varchar(64) NOT NULL,
  `PRENOM` varchar(64) NOT NULL,
  `TEL` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`IDFOURNISSEUR`, `NOM`, `PRENOM`, `TEL`) VALUES
(1, 'moustapha', 'taleb', 27272733),
(2, 'elhadj', 'Ahmed', 37737353);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
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
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `IDPROFIL` int(11) NOT NULL,
  `LIBELEPROFIL` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`IDPROFIL`, `LIBELEPROFIL`) VALUES
(1, 'Administrateur'),
(2, 'Approviseur'),
(3, 'Vendeur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
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
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`IDUSER`, `NOM`, `PRENOM`, `LOGIN`, `MDP`, `IDPROFIL`) VALUES
(1, 'elhadj', 'malick', '3lhj', '6afe3227bdc2e95761be0b5568f72eca7eb21de9', 2),
(2, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(3, 'hadrami', 'moustapha', 'hadra', '6afe3227bdc2e95761be0b5568f72eca7eb21de9', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CODECAT`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`NUM_CLIENT`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NUMCOM`),
  ADD KEY `FK_COMMANDE2` (`NUM_CLIENT`);

--
-- Indexes for table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`REFERENCE`,`NUMCOM`),
  ADD KEY `FK_CONT1` (`NUMCOM`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`IDFOURNISSEUR`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`REFERENCE`),
  ADD KEY `FK_COMMANDE` (`CODECAT`),
  ADD KEY `FK_FOURNIS4` (`IDFOURNISSEUR`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`IDPROFIL`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDUSER`),
  ADD KEY `FK_USER` (`IDPROFIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CODECAT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `NUM_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `NUMCOM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `IDFOURNISSEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `REFERENCE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `IDPROFIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_num_client` FOREIGN KEY (`NUM_CLIENT`) REFERENCES `client` (`NUM_CLIENT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `fk_num_com_id` FOREIGN KEY (`NUMCOM`) REFERENCES `commande` (`NUMCOM`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_fournisseur_id` FOREIGN KEY (`IDFOURNISSEUR`) REFERENCES `fournisseur` (`IDFOURNISSEUR`),
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`CODECAT`) REFERENCES `categorie` (`CODECAT`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_profil_id` FOREIGN KEY (`IDPROFIL`) REFERENCES `profil` (`IDPROFIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
