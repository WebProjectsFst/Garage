-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Février 2017 à 01:49
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `cin` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `addresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matricule_voiture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modele_voiture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `marque_voiture` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `cin`, `nom`, `prenom`, `tel`, `addresse`, `email`, `matricule_voiture`, `modele_voiture`, `marque_voiture`) VALUES
(1, '45789658', 'Jaziri', 'Mouna', '26538574', 'Gammarth, Tunis', 'mouna@gmail.com', '124TN4578', 'i10', 'Hyandai'),
(2, '78965478', 'Ben Salem', 'Amr Amine', '52896745', 'Gammarth, Tunis', 'amr@gmail.com', '195TN5428', 'Rio', 'Kia');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `NSS` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DN` date NOT NULL,
  `CIN` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `SF` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `salaire` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `employees`
--

INSERT INTO `employees` (`NSS`, `email`, `password`, `nom`, `prenom`, `DN`, `CIN`, `SF`, `adresse`, `tel`, `type`, `salaire`) VALUES
('12345678', 'm.abdennadher.seif@gmail.com', '123456', 'Abdennadher', 'Seif', '1995-07-05', '05499648', 'celibataire', 'La Marsa, Tunis', '53057885', 1, 750),
('33333333', 'contable@gmail.com', '123458', 'Aloui', 'Khalil', '1994-08-15', '45871425', 'celibataire', 'Ariana', '98256354', 3, 1000),
('58749652', 'oussema@gmail.com', '123457', 'Kraiem', 'Oussema', '1995-08-11', '45788565', 'celibataire', 'Manar, Tunis', '21478542', 2, 500);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_payement` timestamp NULL DEFAULT NULL,
  `id_fiche_prestation` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`id`, `date_payement`, `id_fiche_prestation`, `status`, `montant`) VALUES
(7, '2017-01-25 07:35:52', 1, 1, 625),
(8, '2017-01-28 20:36:47', 2, 1, 383);

-- --------------------------------------------------------

--
-- Structure de la table `fiches_prestation`
--

CREATE TABLE `fiches_prestation` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(10) UNSIGNED NOT NULL,
  `id_prestation` int(10) UNSIGNED NOT NULL,
  `diagnostiques` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `solution` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_reparation` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_piece` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NSS_employee` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fiches_prestation`
--

INSERT INTO `fiches_prestation` (`id`, `date_creation`, `id_client`, `id_prestation`, `diagnostiques`, `solution`, `type_reparation`, `reference_piece`, `NSS_employee`) VALUES
(1, '2017-01-25 06:53:25', 2, 1, 'xfgcg', 'xd', 'fgd', '44485269', NULL),
(2, '2017-01-28 21:34:19', 2, 1, 'dsqdsqdsqdsqdqs', 'dsqdsqdsq', 'fdsfdsfdsfds', '54712652', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `addresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2016_12_26_200915_create_clients_table', 1),
(10, '2016_12_26_202516_create_pieces_de_rechange_table', 1),
(11, '2016_12_26_203301_create_prestations_table', 1),
(12, '2016_12_26_220804_create_employyes_table', 1),
(13, '2016_12_27_115813_create_fournisseurs_table', 1),
(14, '2016_12_27_120627_create_pieces_fournisseur_table', 1),
(15, '2017_01_25_011905_CreatePrestationSheetTable', 1),
(16, '2017_01_25_012316_CreateListFactures', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pieces_fournisseur`
--

CREATE TABLE `pieces_fournisseur` (
  `id_fournisseur` int(10) UNSIGNED NOT NULL,
  `reference_piece` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pieces_rechange`
--

CREATE TABLE `pieces_rechange` (
  `reference` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `marque` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `type` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pieces_rechange`
--

INSERT INTO `pieces_rechange` (`reference`, `marque`, `prix`, `type`, `libelle`, `quantity`) VALUES
('44485269', 'Ford', 250, 'Amortisseur', 'Amortisseur Libelle', 4),
('54712652', 'Kia', 30, 'Bougie', 'Bourgie Libelle', 5);

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `prestations`
--

INSERT INTO `prestations` (`id`, `libelle`, `prix`) VALUES
(1, 'Engine Revision', 350),
(2, 'Vidange', 150);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`NSS`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factures_id_fiche_prestation_foreign` (`id_fiche_prestation`);

--
-- Index pour la table `fiches_prestation`
--
ALTER TABLE `fiches_prestation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiches_prestation_id_client_foreign` (`id_client`),
  ADD KEY `fiches_prestation_id_prestation_foreign` (`id_prestation`),
  ADD KEY `fiches_prestation_reference_piece_foreign` (`reference_piece`),
  ADD KEY `fiches_prestation_nss_employee_foreign` (`NSS_employee`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pieces_fournisseur`
--
ALTER TABLE `pieces_fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`,`reference_piece`),
  ADD KEY `pieces_fournisseur_reference_piece_foreign` (`reference_piece`);

--
-- Index pour la table `pieces_rechange`
--
ALTER TABLE `pieces_rechange`
  ADD PRIMARY KEY (`reference`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `fiches_prestation`
--
ALTER TABLE `fiches_prestation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_id_fiche_prestation_foreign` FOREIGN KEY (`id_fiche_prestation`) REFERENCES `fiches_prestation` (`id`);

--
-- Contraintes pour la table `fiches_prestation`
--
ALTER TABLE `fiches_prestation`
  ADD CONSTRAINT `fiches_prestation_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `fiches_prestation_id_prestation_foreign` FOREIGN KEY (`id_prestation`) REFERENCES `prestations` (`id`),
  ADD CONSTRAINT `fiches_prestation_nss_employee_foreign` FOREIGN KEY (`NSS_employee`) REFERENCES `employees` (`NSS`),
  ADD CONSTRAINT `fiches_prestation_reference_piece_foreign` FOREIGN KEY (`reference_piece`) REFERENCES `pieces_rechange` (`reference`);

--
-- Contraintes pour la table `pieces_fournisseur`
--
ALTER TABLE `pieces_fournisseur`
  ADD CONSTRAINT `pieces_fournisseur_id_fournisseur_foreign` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `pieces_fournisseur_reference_piece_foreign` FOREIGN KEY (`reference_piece`) REFERENCES `pieces_rechange` (`reference`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
