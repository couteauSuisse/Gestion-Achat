-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 13 Mars 2016 à 12:42
-- Version du serveur: 5.1.30
-- Version de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `achats`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_droits` int(2) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id_admin`, `id_user`, `id_droits`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_tbl`
--

CREATE TABLE IF NOT EXISTS `commandes_tbl` (
  `id_commande` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_site_cesi` int(3) NOT NULL,
  `date_commande` datetime NOT NULL,
  `code_analytique` varchar(20) NOT NULL,
  `date_reception_prevue` date NOT NULL,
  `details_commande` text NOT NULL,
  `quantite` int(5) NOT NULL,
  `prix_HT` varchar(10) NOT NULL,
  `prix_TTC` varchar(10) NOT NULL,
  `prix_TVA` varchar(10) NOT NULL,
  `id_TVA` int(1) NOT NULL DEFAULT '0',
  `id_fournisseur` int(11) NOT NULL DEFAULT '0',
  `ref_produits` varchar(15) NOT NULL,
  `etat_commande` int(1) NOT NULL DEFAULT '0',
  `nb_email` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commandes_tbl`
--


-- --------------------------------------------------------

--
-- Structure de la table `couleurs_tbl`
--

CREATE TABLE IF NOT EXISTS `couleurs_tbl` (
  `id_couleur` int(2) NOT NULL AUTO_INCREMENT,
  `valeur` varchar(25) NOT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `couleurs_tbl`
--

INSERT INTO `couleurs_tbl` (`id_couleur`, `valeur`) VALUES
(1, '#FFFFFF;'),
(2, '#FFCC99;'),
(3, '#00CCFF;'),
(4, '#99CC00;'),
(5, '#008000;'),
(6, '#993366;'),
(7, '#CC99FF;'),
(8, '#99CCFF;'),
(9, '#CCECFF;'),
(10, '#FFFF99;');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs_tbl`
--

CREATE TABLE IF NOT EXISTS `fournisseurs_tbl` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(50) NOT NULL,
  `adresse_fournisseur` varchar(100) NOT NULL,
  `code_postal` varchar(6) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `fax` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `SIRET` varchar(18) NOT NULL,
  `note` int(1) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `fournisseurs_tbl`
--


-- --------------------------------------------------------

--
-- Structure de la table `genre_tbl`
--

CREATE TABLE IF NOT EXISTS `genre_tbl` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `type_genre` varchar(10) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `genre_tbl`
--

INSERT INTO `genre_tbl` (`id_genre`, `type_genre`) VALUES
(1, 'madame'),
(2, 'monsieur');

-- --------------------------------------------------------

--
-- Structure de la table `historique_commandes_tbl`
--

CREATE TABLE IF NOT EXISTS `historique_commandes_tbl` (
  `id_historique` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_demande` datetime NOT NULL,
  `date_reception` datetime NOT NULL,
  `id_decision` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_historique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `historique_commandes_tbl`
--


-- --------------------------------------------------------

--
-- Structure de la table `imputation_budg_tbl`
--

CREATE TABLE IF NOT EXISTS `imputation_budg_tbl` (
  `id_imputbudg` int(11) NOT NULL AUTO_INCREMENT,
  `code_imputbudg` varchar(11) NOT NULL,
  `nom_imputbudg` varchar(33) NOT NULL,
  `couleur` int(1) NOT NULL,
  PRIMARY KEY (`id_imputbudg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `imputation_budg_tbl`
--


-- --------------------------------------------------------

--
-- Structure de la table `paiement_tbl`
--

CREATE TABLE IF NOT EXISTS `paiement_tbl` (
  `id_paiement` int(1) NOT NULL AUTO_INCREMENT,
  `type_paiement` varchar(25) NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Contenu de la table `paiement_tbl`
--

INSERT INTO `paiement_tbl` (`id_paiement`, `type_paiement`) VALUES
(1, 'carte bancaire'),
(2, 'mandat administratif'),
(3, 'à la livraison'),
(4, 'à réception de la facture'),
(5, 'à j + 30');

-- --------------------------------------------------------

--
-- Structure de la table `services_tbl`
--

CREATE TABLE IF NOT EXISTS `services_tbl` (
  `id_service` int(2) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(25) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Contenu de la table `services_tbl`
--

INSERT INTO `services_tbl` (`id_service`, `nom_service`) VALUES
(1, 'général'),
(2, 'administratif');

-- --------------------------------------------------------

--
-- Structure de la table `sites_cesi_tbl`
--

CREATE TABLE IF NOT EXISTS `sites_cesi_tbl` (
  `id_site_cesi` int(3) NOT NULL AUTO_INCREMENT,
  `nom_site_cesi` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `BP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cedex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_site_cesi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sites_cesi_tbl`
--

INSERT INTO `sites_cesi_tbl` (`id_site_cesi`, `nom_site_cesi`, `adresse`, `code_postal`, `BP`, `ville`, `cedex`, `tel`, `fax`) VALUES
(1, 'Nanterre - Paris', '93, boulevard de la Seine', '92006', 'BP 602', 'Nanterre', 'Cedex', '+33(0)1 55 17 80 00', '+33(0)1 55 17 80 01');

-- --------------------------------------------------------

--
-- Structure de la table `supervisor_tbl`
--

CREATE TABLE IF NOT EXISTS `supervisor_tbl` (
  `id_supervisor` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_droits` int(2) NOT NULL,
  PRIMARY KEY (`id_supervisor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Contenu de la table `supervisor_tbl`
--

INSERT INTO `supervisor_tbl` (`id_supervisor`, `id_user`, `id_droits`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tva_tbl`
--

CREATE TABLE IF NOT EXISTS `tva_tbl` (
  `id_tva` int(11) NOT NULL AUTO_INCREMENT,
  `taux_tva` double NOT NULL,
  PRIMARY KEY (`id_tva`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tva_tbl`
--

INSERT INTO `tva_tbl` (`id_tva`, `taux_tva`) VALUES
(1, 20),
(2, 10),
(3, 5.5),
(4, 2.1);

-- --------------------------------------------------------

--
-- Structure de la table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mtp` varchar(50) NOT NULL,
  `genre` int(1) NOT NULL,
  `id_site_cesi` int(3) NOT NULL,
  `id_services` int(3) NOT NULL,
  `date_rec` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users_tbl`
--

INSERT INTO `users_tbl` (`id_user`, `nom`, `prenom`, `email`, `mtp`, `genre`, `id_site_cesi`, `id_services`, `date_rec`) VALUES
(1, 'Curie', 'Marie', 'marie.curie@radium.fr', '', 1, 0, 0, '2015-11-27'),
(2, 'Pasteur', 'Louis', 'louisp@curie.fr', 'jBXBfn', 2, 0, 0, '2016-01-29');
