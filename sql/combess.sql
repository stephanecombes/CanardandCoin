-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 01 déc. 2018 à 22:50
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `combess`
--

-- --------------------------------------------------------

--
-- Structure de la table `cac_carnetadresses`
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
-- Structure de la table `cac_categories`
--

DROP TABLE IF EXISTS `cac_categories`;
CREATE TABLE IF NOT EXISTS `cac_categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(32) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cac_commandes`
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
-- Structure de la table `cac_galerieimage`
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
-- Structure de la table `cac_images`
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
-- Structure de la table `cac_lignecommande`
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
-- Structure de la table `cac_produits`
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
-- Structure de la table `cac_roles`
--

DROP TABLE IF EXISTS `cac_roles`;
CREATE TABLE IF NOT EXISTS `cac_roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(16) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cac_statut`
--

DROP TABLE IF EXISTS `cac_statut`;
CREATE TABLE IF NOT EXISTS `cac_statut` (
  `idStatut` int(11) NOT NULL AUTO_INCREMENT,
  `nomStatut` varchar(32) NOT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cac_utilisateurs`
--

DROP TABLE IF EXISTS `cac_utilisateurs`;
CREATE TABLE IF NOT EXISTS `cac_utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(32) NOT NULL,
  `prenomUtilisateur` varchar(32) NOT NULL,
  `mailUtilisateur` varchar(64) NOT NULL,
  `ageUtilisateur` int(11) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL,
  `bloque` tinyint(1) DEFAULT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `cac_fk_roles_utilisateurs` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cac_villes`
--

DROP TABLE IF EXISTS `cac_villes`;
CREATE TABLE IF NOT EXISTS `cac_villes` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(32) NOT NULL,
  `codePostal` varchar(16) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cac_carnetadresses`
--
ALTER TABLE `cac_carnetadresses`
  ADD CONSTRAINT `cac_fk_utilisateurs_carnets` FOREIGN KEY (`idUtilisateur`) REFERENCES `cac_utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_villes_carnets` FOREIGN KEY (`idVille`) REFERENCES `cac_villes` (`idVille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cac_commandes`
--
ALTER TABLE `cac_commandes`
  ADD CONSTRAINT `cac_fk_carnetAdresseFacturation_commandes` FOREIGN KEY (`idAdresseFacturation`) REFERENCES `cac_carnetadresses` (`idCarnetAdresse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_carnetAdresseLivraison_commandes` FOREIGN KEY (`idAdresseLivraison`) REFERENCES `cac_carnetadresses` (`idCarnetAdresse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_statut_commandes` FOREIGN KEY (`idStatut`) REFERENCES `cac_statut` (`idStatut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_utilisateurs_commandes` FOREIGN KEY (`idUtilisateur`) REFERENCES `cac_utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cac_galerieimage`
--
ALTER TABLE `cac_galerieimage`
  ADD CONSTRAINT `cac_fk_images_galeries` FOREIGN KEY (`idImage`) REFERENCES `cac_images` (`idImage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_produits_galeries` FOREIGN KEY (`idProduit`) REFERENCES `cac_produits` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cac_lignecommande`
--
ALTER TABLE `cac_lignecommande`
  ADD CONSTRAINT `cac_fk_commande_lignecommande` FOREIGN KEY (`idCommande`) REFERENCES `cac_commandes` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cac_fk_produits_lignecommande` FOREIGN KEY (`idProduit`) REFERENCES `cac_produits` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cac_produits`
--
ALTER TABLE `cac_produits`
  ADD CONSTRAINT `cac_fk_categories_produits` FOREIGN KEY (`idCategorie`) REFERENCES `cac_categories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cac_utilisateurs`
--
ALTER TABLE `cac_utilisateurs`
  ADD CONSTRAINT `cac_fk_roles_utilisateurs` FOREIGN KEY (`idRole`) REFERENCES `cac_roles` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
