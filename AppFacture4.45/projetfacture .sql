-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Juin 2018 à 10:52
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetfacture`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `cli_id_client` int(3) NOT NULL,
  `cli_nom` varchar(30) NOT NULL,
  `cli_prenom` varchar(30) NOT NULL,
  `cli_telephone` varchar(20) NOT NULL,
  `cli_courriel` varchar(60) NOT NULL,
  `cli_societe` varchar(50) NOT NULL,
  `cli_adresse` varchar(50) NOT NULL,
  `cli_ville` varchar(30) NOT NULL,
  `cli_code_postal` int(5) NOT NULL,
  `cli_pays` varchar(25) NOT NULL,
  `cli_id_type_client` int(3) NOT NULL,
  `cli_id_devise` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`cli_id_client`, `cli_nom`, `cli_prenom`, `cli_telephone`, `cli_courriel`, `cli_societe`, `cli_adresse`, `cli_ville`, `cli_code_postal`, `cli_pays`, `cli_id_type_client`, `cli_id_devise`) VALUES
(1, 'Coelho', 'Alexandre', '06 23 32 66 46', 'acoelho1999@hotmail.fr', 'MTB 111', '63 Avenue Gabriel Péri', 'Saint-Ouen', 93400, 'France', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `dev_id_devise` int(3) NOT NULL,
  `dev_nom_devise` varchar(50) NOT NULL,
  `dev_taux_change` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `fac_id_facture` int(3) NOT NULL,
  `fec_numero_facture` int(6) NOT NULL,
  `fec_date_paiement` date NOT NULL,
  `fac_date_facture` date NOT NULL,
  `fac_id_client` int(3) NOT NULL,
  `fac_montant_euro` int(6) NOT NULL,
  `fac_montant_devise` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `fam_id_famille` int(3) NOT NULL,
  `fam_nom_famille` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_facture`
--

CREATE TABLE `ligne_facture` (
  `lfa_id_ligne_facture` int(3) NOT NULL,
  `lfa_quantite` bigint(10) NOT NULL,
  `lfa_prix_unitaire_facture` float NOT NULL,
  `lfa_id_facture` int(3) NOT NULL,
  `lfa_id_produit` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `pro_id_produit` int(3) NOT NULL,
  `pro_prix_unitaire_initial` float NOT NULL,
  `pro_nom_produit` varchar(50) NOT NULL,
  `pro_id_sous_famille` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sous_famille`
--

CREATE TABLE `sous_famille` (
  `sfa_id_sous_famille` int(3) NOT NULL,
  `sfa_nom_sous_famille` varchar(50) NOT NULL,
  `sfa_id_famille` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_client`
--

CREATE TABLE `type_client` (
  `tcl_id_type_client` int(3) NOT NULL,
  `tcl_activite` varchar(50) NOT NULL,
  `tcl_encours_autorise` bigint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cli_id_client`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`dev_id_devise`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`fac_id_facture`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`fam_id_famille`);

--
-- Index pour la table `ligne_facture`
--
ALTER TABLE `ligne_facture`
  ADD PRIMARY KEY (`lfa_id_ligne_facture`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`pro_id_produit`);

--
-- Index pour la table `sous_famille`
--
ALTER TABLE `sous_famille`
  ADD PRIMARY KEY (`sfa_id_sous_famille`);

--
-- Index pour la table `type_client`
--
ALTER TABLE `type_client`
  ADD PRIMARY KEY (`tcl_id_type_client`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
