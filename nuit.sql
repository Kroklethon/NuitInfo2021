-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 déc. 2021 à 05:18
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nuit_info`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE `bateau` (
  `id_bateau` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`id_bateau`, `type`, `nom`) VALUES
(1, 'Chasse-marée', 'LES TROIS SOEURS');

-- --------------------------------------------------------

--
-- Structure de la table `equipage`
--

CREATE TABLE `equipage` (
  `id_equipage` int(11) NOT NULL,
  `id_sauveteur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipage`
--

INSERT INTO `equipage` (`id_equipage`, `id_sauveteur`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

CREATE TABLE `heure` (
  `id_heure` int(11) NOT NULL,
  `heure` varchar(50) NOT NULL,
  `id_trajet` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `date_naissance`, `image`) VALUES
(1, 'Bonnaventure Bommelaer', 'Mathias', '1791-07-14', NULL),
(2, 'Neuts', 'Gaspard', '0000-00-00', NULL),
(3, 'Louis', 'Charles', '1815-11-27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

CREATE TABLE `position` (
  `id_position` bigint(20) UNSIGNED NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `id_trajet` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `sauvetage`
--

CREATE TABLE `sauvetage` (
  `id_sauvetage` bigint(20) UNSIGNED NOT NULL,
  `date_sauvetage` date DEFAULT NULL,
  `id_bateau_sauve` int(11) DEFAULT NULL,
  `id_bateau_sauvetage` int(11) DEFAULT NULL,
  `id_commandant` int(11) DEFAULT NULL,
  `id_sous_commandant` int(11) DEFAULT NULL,
  `id_equipage` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sauvetage`
--

INSERT INTO `sauvetage` (`id_sauvetage`, `date_sauvetage`, `id_bateau_sauve`, `id_bateau_sauvetage`, `id_commandant`, `id_sous_commandant`, `id_equipage`) VALUES
(1, '2021-12-02', NULL, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sauveteur`
--

CREATE TABLE `sauveteur` (
  `id_sauveteur` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sauveteur`
--

INSERT INTO `sauveteur` (`id_sauveteur`, `grade`, `id_personne`) VALUES
(1, 'chef des pilotes', 1),
(2, NULL, 1),
(3, 'Aspirant pilote', 3);

-- --------------------------------------------------------

--
-- Structure de la table `survie`
--

CREATE TABLE `survie` (
  `id_personne` int(11) NOT NULL,
  `id_sauvetage` int(11) NOT NULL,
  `mort` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

CREATE TABLE `texte` (
  `id_texte` int(11) NOT NULL,
  `texte` varchar(500) NOT NULL,
  `id_trajet` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_trajet` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `nom_util` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `prenom_util` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mail_util` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mdp_util` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `type_compte_util` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`id_bateau`),
  ADD UNIQUE KEY `id_bateau` (`id_bateau`);

--
-- Index pour la table `heure`
--
ALTER TABLE `heure`
  ADD PRIMARY KEY (`id_heure`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id_position`),
  ADD UNIQUE KEY `id_position` (`id_position`);

--
-- Index pour la table `sauvetage`
--
ALTER TABLE `sauvetage`
  ADD PRIMARY KEY (`id_sauvetage`),
  ADD UNIQUE KEY `id_sauvetage` (`id_sauvetage`);

--
-- Index pour la table `sauveteur`
--
ALTER TABLE `sauveteur`
  ADD PRIMARY KEY (`id_sauveteur`),
  ADD UNIQUE KEY `id_sauvetage` (`id_sauveteur`);

--
-- Index pour la table `texte`
--
ALTER TABLE `texte`
  ADD PRIMARY KEY (`id_texte`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_trajet`),
  ADD UNIQUE KEY `id_trajet` (`id_trajet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `id_utilisateur` (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bateau`
--
ALTER TABLE `bateau`
  MODIFY `id_bateau` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `heure`
--
ALTER TABLE `heure`
  MODIFY `id_heure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `position`
--
ALTER TABLE `position`
  MODIFY `id_position` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sauvetage`
--
ALTER TABLE `sauvetage`
  MODIFY `id_sauvetage` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sauveteur`
--
ALTER TABLE `sauveteur`
  MODIFY `id_sauveteur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `texte`
--
ALTER TABLE `texte`
  MODIFY `id_texte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
