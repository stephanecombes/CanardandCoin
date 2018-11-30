-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2018 at 09:41 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `combess`
--

-- --------------------------------------------------------

--
-- Table structure for table `cac_carnetadresses`
--

DROP TABLE IF EXISTS `cac_carnetadresses`;
CREATE TABLE IF NOT EXISTS `cac_carnetadresses` (
  `idCarnetAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `idVille` int(11) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  PRIMARY KEY (`idCarnetAdresse`),
  KEY `cac_fk_utilisateurs_carnets` (`idUtilisateur`),
  KEY `cac_fk_villes_carnets` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_categories`
--

DROP TABLE IF EXISTS `cac_categories`;
CREATE TABLE IF NOT EXISTS `cac_categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(32) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_commandes`
--

DROP TABLE IF EXISTS `cac_commandes`;
CREATE TABLE IF NOT EXISTS `cac_commandes` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `idStatut` int(11) NOT NULL,
  `montantCommande` int(11) NOT NULL,
  `idAdresseLivraison` int(11) NOT NULL,
  `idAdresseFacturation` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `cac_fk_utilisateurs_commandes` (`idUtilisateur`),
  KEY `cac_fk_statut_commandes` (`idStatut`),
  KEY `cac_fk_carnetAdresseFacturation_commandes` (`idAdresseFacturation`),
  KEY `cac_fk_carnetAdresseLivraison_commandes` (`idAdresseLivraison`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_galerieimage`
--

DROP TABLE IF EXISTS `cac_galerieimage`;
CREATE TABLE IF NOT EXISTS `cac_galerieimage` (
  `idProduit` int(11) NOT NULL,
  `idImage` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idImage`),
  KEY `cac_fk_images_galeries` (`idImage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_images`
--

DROP TABLE IF EXISTS `cac_images`;
CREATE TABLE IF NOT EXISTS `cac_images` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `lienImage` varchar(256) NOT NULL,
  `descriptionImage` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_lignecommande`
--

DROP TABLE IF EXISTS `cac_lignecommande`;
CREATE TABLE IF NOT EXISTS `cac_lignecommande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantitéProduits` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `cac_fk_produits_lignecommande` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_produits`
--

DROP TABLE IF EXISTS `cac_produits`;
CREATE TABLE IF NOT EXISTS `cac_produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(32) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `couleurProduit` varchar(32) NOT NULL,
  `descriptionProduit` text NOT NULL,
  `tailleProduit` int(11) DEFAULT NULL,
  `poidsProduit` int(11) DEFAULT NULL,
  `ageProduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `cac_fk_categories_produits` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_roles`
--

DROP TABLE IF EXISTS `cac_roles`;
CREATE TABLE IF NOT EXISTS `cac_roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(16) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_statut`
--

DROP TABLE IF EXISTS `cac_statut`;
CREATE TABLE IF NOT EXISTS `cac_statut` (
  `idStatut` int(11) NOT NULL AUTO_INCREMENT,
  `nomStatut` varchar(32) NOT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_utilisateurs`
--

DROP TABLE IF EXISTS `cac_utilisateurs`;
CREATE TABLE IF NOT EXISTS `cac_utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(32) NOT NULL,
  `prenomUtilisateur` varchar(32) NOT NULL,
  `mailUtilisateur` varchar(64) NOT NULL,
  `ageUtilisateur` int(11) NOT NULL,
  `mdpUtilisateur` varchar(32) NOT NULL,
  `bloque` tinyint(1) DEFAULT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `cac_fk_roles_utilisateurs` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cac_villes`
--

DROP TABLE IF EXISTS `cac_villes`;
CREATE TABLE IF NOT EXISTS `cac_villes` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(32) NOT NULL,
  `codePostal` varchar(16) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passager`
--

DROP TABLE IF EXISTS `passager`;
CREATE TABLE IF NOT EXISTS `passager` (
  `trajet_id` int(11) NOT NULL,
  `utilisateur_login` varchar(32) NOT NULL,
  PRIMARY KEY (`trajet_id`,`utilisateur_login`),
  KEY `fk_passager_utilisateur` (`utilisateur_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passager`
--

INSERT INTO `passager` (`trajet_id`, `utilisateur_login`) VALUES
(1, 'bert'),
(4, 'dega'),
(2, 'juju'),
(5, 'oph'),
(2, 'soso');

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(32) NOT NULL,
  `arrivee` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `nbplaces` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `conducteur_login` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conducteur_login` (`conducteur_login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trajet`
--

INSERT INTO `trajet` (`id`, `depart`, `arrivee`, `date`, `nbplaces`, `prix`, `conducteur_login`) VALUES
(1, 'Montpellier', 'Sète', '2018-09-26', 2, 25, 'juju'),
(2, 'Paris', 'Beziers', '2018-09-30', 0, 52, 'oph'),
(3, 'Nimes', 'Marseille', '2018-10-08', 2, 3, 'bert'),
(4, 'Graissessac', 'Bédarieux', '2018-10-31', 2, 3, 'dega'),
(5, 'Narbonne', 'Gruissan', '2018-10-03', 1, 10, 'soso');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `prenom`) VALUES
('bert', 'Deterre', 'Albert'),
('dega', 'Gonzales', 'Dégadézo'),
('juju', 'Gregoire', 'Josette'),
('oph', 'Amarine', 'Aurélie'),
('soso', 'Benoit', 'Célinex');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `immatriculation` varchar(8) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`immatriculation`, `marque`, `couleur`) VALUES
('12345678', 'TotoCarV2', 'Verte'),
('142AFD56', 'Tata', 'Vert'),
('142AX456', 'Tesla', 'Noire'),
('142FFA56', 'Fiat', 'Jaune'),
('1A2AXA56', 'Peugeot', 'Rouge'),
('1F2AX456', 'Citroên', 'Bleu'),
('54-489-1', 'Tesla', 'Verte'),
('AZEDREAR', 'Tata', 'Vert caca d\'');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cac_carnetadresses`
--
ALTER TABLE `cac_carnetadresses`
  ADD CONSTRAINT `cac_fk_utilisateurs_carnets` FOREIGN KEY (`idUtilisateur`) REFERENCES `cac_utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_villes_carnets` FOREIGN KEY (`idVille`) REFERENCES `cac_villes` (`idVille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_commandes`
--
ALTER TABLE `cac_commandes`
  ADD CONSTRAINT `cac_fk_carnetAdresseFacturation_commandes` FOREIGN KEY (`idAdresseFacturation`) REFERENCES `cac_carnetadresses` (`idCarnetAdresse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_carnetAdresseLivraison_commandes` FOREIGN KEY (`idAdresseLivraison`) REFERENCES `cac_carnetadresses` (`idCarnetAdresse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_statut_commandes` FOREIGN KEY (`idStatut`) REFERENCES `cac_statut` (`idStatut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_utilisateurs_commandes` FOREIGN KEY (`idUtilisateur`) REFERENCES `cac_utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_galerieimage`
--
ALTER TABLE `cac_galerieimage`
  ADD CONSTRAINT `cac_fk_images_galeries` FOREIGN KEY (`idImage`) REFERENCES `cac_images` (`idImage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_produits_galeries` FOREIGN KEY (`idProduit`) REFERENCES `cac_produits` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cac_lignecommande`
--
ALTER TABLE `cac_lignecommande`
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

--
-- Constraints for table `passager`
--
ALTER TABLE `passager`
  ADD CONSTRAINT `fk_passager_trajet` FOREIGN KEY (`trajet_id`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_passager_utilisateur` FOREIGN KEY (`utilisateur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `fk_trajet_utilisateur` FOREIGN KEY (`conducteur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
