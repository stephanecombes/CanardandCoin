-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2018 at 02:59 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canardandcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cac_carnetAdresses`
--

CREATE TABLE `cac_carnetAdresses` (
  `idCarnetAdresse` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `idVille` int(11) NOT NULL,
  `telephone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cac_categories`
--

CREATE TABLE `cac_categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cac_commandes`
--

CREATE TABLE `cac_commandes` (
  `idCommande` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `idStatut` int(11) NOT NULL,
  `montantCommande` int(11) NOT NULL,
  `idAdresseLivraison` int(11) NOT NULL,
  `idAdresseFacturation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_galerieImage`
--

CREATE TABLE `cac_galerieImage` (
  `idProduit` int(11) NOT NULL,
  `idImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_images`
--

CREATE TABLE `cac_images` (
  `idImage` int(11) NOT NULL,
  `lienImage` varchar(256) NOT NULL,
  `descriptionImage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_ligneCommande`
--

CREATE TABLE `cac_ligneCommande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantitéProduits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_produits`
--

CREATE TABLE `cac_produits` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(32) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `couleurProduit` varchar(32) NOT NULL,
  `descriptionProduit` text NOT NULL,
  `tailleProduit` int(11) DEFAULT NULL,
  `poidsProduit` int(11) DEFAULT NULL,
  `ageProduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cac_roles`
--

CREATE TABLE `cac_roles` (
  `idRole` int(11) NOT NULL,
  `nomRole` varchar(16) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cac_statut`
--

CREATE TABLE `cac_statut` (
  `idStatut` int(11) NOT NULL,
  `nomStatut` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cac_utilisateurs`
--

CREATE TABLE `cac_utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(32) NOT NULL,
  `prenomUtilisateur` varchar(32) NOT NULL,
  `mailUtilisateur` varchar(64) NOT NULL,
  `ageUtilisateur` int(11) NOT NULL,
  `mdpUtilisateur` int(11) NOT NULL,
  `bloqué` tinyint(1) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_villes`
--

CREATE TABLE `cac_villes` (
  `idVille` int(11) NOT NULL,
  `nomVille` varchar(32) CHARACTER SET utf8 NOT NULL,
  `codePostal` varchar(16) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cac_carnetAdresses`
--
ALTER TABLE `cac_carnetAdresses`
  ADD PRIMARY KEY (`idCarnetAdresse`),
  ADD KEY `cac_fk_utilisateurs_carnets` (`idUtilisateur`),
  ADD KEY `cac_fk_villes_carnets` (`idVille`);

--
-- Indexes for table `cac_categories`
--
ALTER TABLE `cac_categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `cac_commandes`
--
ALTER TABLE `cac_commandes`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `cac_fk_utilisateurs_commandes` (`idUtilisateur`),
  ADD KEY `cac_fk_statut_commandes` (`idStatut`),
  ADD KEY `cac_fk_carnetAdresseFacturation_commandes` (`idAdresseFacturation`),
  ADD KEY `cac_fk_carnetAdresseLivraison_commandes` (`idAdresseLivraison`);

--
-- Indexes for table `cac_galerieImage`
--
ALTER TABLE `cac_galerieImage`
  ADD PRIMARY KEY (`idProduit`,`idImage`),
  ADD KEY `cac_fk_images_galeries` (`idImage`);

--
-- Indexes for table `cac_images`
--
ALTER TABLE `cac_images`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `cac_ligneCommande`
--
ALTER TABLE `cac_ligneCommande`
  ADD PRIMARY KEY (`idCommande`,`idProduit`),
  ADD KEY `cac_fk_produits_lignecommande` (`idProduit`);

--
-- Indexes for table `cac_produits`
--
ALTER TABLE `cac_produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `cac_fk_categories_produits` (`idCategorie`);

--
-- Indexes for table `cac_roles`
--
ALTER TABLE `cac_roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `cac_statut`
--
ALTER TABLE `cac_statut`
  ADD PRIMARY KEY (`idStatut`);

--
-- Indexes for table `cac_utilisateurs`
--
ALTER TABLE `cac_utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `cac_fk_roles_utilisateurs` (`idRole`);

--
-- Indexes for table `cac_villes`
--
ALTER TABLE `cac_villes`
  ADD PRIMARY KEY (`idVille`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cac_carnetAdresses`
--
ALTER TABLE `cac_carnetAdresses`
  MODIFY `idCarnetAdresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_categories`
--
ALTER TABLE `cac_categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_commandes`
--
ALTER TABLE `cac_commandes`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_images`
--
ALTER TABLE `cac_images`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_produits`
--
ALTER TABLE `cac_produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_roles`
--
ALTER TABLE `cac_roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_statut`
--
ALTER TABLE `cac_statut`
  MODIFY `idStatut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_utilisateurs`
--
ALTER TABLE `cac_utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cac_villes`
--
ALTER TABLE `cac_villes`
  MODIFY `idVille` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cac_carnetAdresses`
--
ALTER TABLE `cac_carnetAdresses`
  ADD CONSTRAINT `cac_fk_utilisateurs_carnets` FOREIGN KEY (`idUtilisateur`) REFERENCES `cac_utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_villes_carnets` FOREIGN KEY (`idVille`) REFERENCES `cac_villes` (`idVille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_commandes`
--
ALTER TABLE `cac_commandes`
  ADD CONSTRAINT `cac_fk_carnetAdresseFacturation_commandes` FOREIGN KEY (`idAdresseFacturation`) REFERENCES `cac_carnetAdresses` (`idCarnetAdresse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_carnetAdresseLivraison_commandes` FOREIGN KEY (`idAdresseLivraison`) REFERENCES `cac_carnetAdresses` (`idCarnetAdresse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_statut_commandes` FOREIGN KEY (`idStatut`) REFERENCES `cac_statut` (`idStatut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_utilisateurs_commandes` FOREIGN KEY (`idUtilisateur`) REFERENCES `cac_utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_galerieImage`
--
ALTER TABLE `cac_galerieImage`
  ADD CONSTRAINT `cac_fk_images_galeries` FOREIGN KEY (`idImage`) REFERENCES `cac_images` (`idImage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_produits_galeries` FOREIGN KEY (`idProduit`) REFERENCES `cac_produits` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_ligneCommande`
--
ALTER TABLE `cac_ligneCommande`
  ADD CONSTRAINT `cac_fk_commande_lignecommande` FOREIGN KEY (`idCommande`) REFERENCES `cac_commandes` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_produits_lignecommande` FOREIGN KEY (`idProduit`) REFERENCES `cac_produits` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_produits`
--
ALTER TABLE `cac_produits`
  ADD CONSTRAINT `cac_fk_categories_produits` FOREIGN KEY (`idCategorie`) REFERENCES `cac_categories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_utilisateurs`
--
ALTER TABLE `cac_utilisateurs`
  ADD CONSTRAINT `cac_fk_roles_utilisateurs` FOREIGN KEY (`idRole`) REFERENCES `cac_roles` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
