-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 30 août 2023 à 13:58
-- Version du serveur : 8.0.30
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `perception_ipr_fiscale_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_dgi_clients`
--

CREATE TABLE `tb_dgi_clients` (
  `client_id` int NOT NULL,
  `noms_complet` varchar(75) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `profession` varchar(75) DEFAULT NULL,
  `adresse` text,
  `client_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tb_dgi_clients`
--

INSERT INTO `tb_dgi_clients` (`client_id`, `noms_complet`, `telephone`, `email`, `profession`, `adresse`, `client_code`) VALUES
(1, 'melanie chirene', '+243853385285', 'rumbu@trecazad.com', 'Medecin', '25, savonnier, bel-air, kampemba, rdc', '1669638844'),
(2, 'iLUNGA Mwana', '2929348491', 'ilunga@yahoo.fr', 'Entrepreneur', 'Lushi, RDC', '1669653174'),
(3, 'Daniel Simbi', '984940940403', '', 'Entrepreneur', '23, Savonniers, Bel-Air, Kampemba, RDC', '1669881424');

-- --------------------------------------------------------

--
-- Structure de la table `tb_dgi_fiches`
--

CREATE TABLE `tb_dgi_fiches` (
  `fiche_id` int NOT NULL,
  `numero_fiche` varchar(75) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `client_sid` int DEFAULT NULL,
  `nombre_travailleur` int DEFAULT NULL,
  `periode_declaration` varchar(50) DEFAULT NULL,
  `numero_impot` varchar(50) DEFAULT NULL,
  `annee` int DEFAULT NULL,
  `revenue` double DEFAULT NULL,
  `raison_sociale` varchar(50) DEFAULT NULL,
  `mode_paiement` varchar(50) DEFAULT NULL,
  `statut_declaration` varchar(75) DEFAULT NULL,
  `observation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tb_dgi_fiches`
--

INSERT INTO `tb_dgi_fiches` (`fiche_id`, `numero_fiche`, `date_creation`, `date_validation`, `client_sid`, `nombre_travailleur`, `periode_declaration`, `numero_impot`, `annee`, `revenue`, `raison_sociale`, `mode_paiement`, `statut_declaration`, `observation`) VALUES
(5, '1669651212', '2022-11-28 16:00:29', NULL, 1, NULL, NULL, '23319-33239', 2022, 45000, 'DITOTASE', 'banque', 'annule', 'RAS'),
(6, '1669880069', '2022-12-01 07:35:09', '2022-12-01 07:55:07', 2, NULL, NULL, '33319-332333', 2022, 5000000, 'New global hoorizon consulting', 'banque', 'valide', 'RAS'),
(8, '1693403552', '2023-08-30 13:53:53', NULL, 2, 12, '', '858523-LBB', 2023, 1000, 'TRECAZ', '', 'encours', '');

-- --------------------------------------------------------

--
-- Structure de la table `tb_dgi_notes`
--

CREATE TABLE `tb_dgi_notes` (
  `note_id` int NOT NULL,
  `numero_reference_note` varchar(25) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `numero_impot` varchar(75) DEFAULT NULL,
  `numero_compte_bancaire` varchar(75) DEFAULT NULL,
  `nom_banque` varchar(75) DEFAULT NULL,
  `devise_compte` varchar(75) DEFAULT NULL,
  `pourcentage_impot` varchar(10) DEFAULT NULL,
  `montant_impot_du` float DEFAULT NULL,
  `observation` text,
  `fiche_sid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `tb_dgi_paiements`
--

CREATE TABLE `tb_dgi_paiements` (
  `paiement_id` int NOT NULL,
  `date_paiement` datetime DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `montant_verser` float DEFAULT NULL,
  `statut_paiement` varchar(75) DEFAULT NULL,
  `observation` text,
  `numero_note_sid` int DEFAULT NULL,
  `client_sid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `tb_im_users`
--

CREATE TABLE `tb_im_users` (
  `id_asset` int NOT NULL,
  `asset_fullname` varchar(75) NOT NULL,
  `asset_username` varchar(50) DEFAULT NULL,
  `asset_password` varchar(60) DEFAULT NULL,
  `asset_email` varchar(50) DEFAULT NULL,
  `asset_sexe` varchar(10) DEFAULT NULL,
  `asset_phone` varchar(50) DEFAULT NULL,
  `asset_type` varchar(20) DEFAULT 'agent',
  `date_ajout` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_connected` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `account_activated` varchar(25) DEFAULT 'active',
  `asset_avatar` varchar(75) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `asset_fonction` varchar(75) NOT NULL,
  `asset_matricule` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tb_im_users`
--

INSERT INTO `tb_im_users` (`id_asset`, `asset_fullname`, `asset_username`, `asset_password`, `asset_email`, `asset_sexe`, `asset_phone`, `asset_type`, `date_ajout`, `date_connected`, `account_activated`, `asset_avatar`, `date_update`, `asset_fonction`, `asset_matricule`) VALUES
(21, 'Elie Mwez', 'eliemwez', '$2y$12$lgSZ78FDfw7MUBBIrMgsfOB2BEBDapoD4jIJEtr.arj6dSYRoBDZG', 'eliemwez.rubuz@gmail.com', 'Masculin', '+243858533285', 'admin', '2020-09-11 10:08:58', '2020-09-21 10:02:11', 'active', 'global/img/avatars/avatar-eliemwez2.jpg', '2020-09-19 14:07:30', 'admin', '11220'),
(27, 'Administrateur', 'admin', '$2y$12$bGYGbrhUKpkUVun35wVyq.E3xoHKEsztWso0Hw6xlP4pRPrhNqxpu', 'admin@gmail.com', 'Homme', '+243903774951', 'admin', '2020-09-21 10:01:52', '2020-10-25 12:27:05', 'active', 'global/img/avatars/12f5af7aaaaf19c688cbddeb0cac45a5.jpg', '2020-10-25 14:26:54', 'admin', '2020010');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_dgi_clients`
--
ALTER TABLE `tb_dgi_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `tb_dgi_fiches`
--
ALTER TABLE `tb_dgi_fiches`
  ADD PRIMARY KEY (`fiche_id`),
  ADD KEY `plaque_vehicule_sid` (`client_sid`) USING BTREE;

--
-- Index pour la table `tb_dgi_notes`
--
ALTER TABLE `tb_dgi_notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `fiche_sid` (`fiche_sid`);

--
-- Index pour la table `tb_dgi_paiements`
--
ALTER TABLE `tb_dgi_paiements`
  ADD PRIMARY KEY (`paiement_id`),
  ADD KEY `client_sid` (`client_sid`),
  ADD KEY `numero_note_sid` (`numero_note_sid`);

--
-- Index pour la table `tb_im_users`
--
ALTER TABLE `tb_im_users`
  ADD PRIMARY KEY (`id_asset`),
  ADD UNIQUE KEY `asset_username` (`asset_username`,`asset_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_dgi_clients`
--
ALTER TABLE `tb_dgi_clients`
  MODIFY `client_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tb_dgi_fiches`
--
ALTER TABLE `tb_dgi_fiches`
  MODIFY `fiche_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tb_dgi_notes`
--
ALTER TABLE `tb_dgi_notes`
  MODIFY `note_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_dgi_paiements`
--
ALTER TABLE `tb_dgi_paiements`
  MODIFY `paiement_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_im_users`
--
ALTER TABLE `tb_im_users`
  MODIFY `id_asset` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
