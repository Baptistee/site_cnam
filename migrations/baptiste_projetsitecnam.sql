-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-baptiste.alwaysdata.net
-- Generation Time: May 26, 2021 at 04:13 PM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baptiste_projetsitecnam`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `created_at`) VALUES
(3, 'test', 'test', '2021-05-24 13:32:51'),
(4, 'test2', 'test', '2021-05-24 13:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `cv` int(11) NOT NULL,
  `libelle` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_maitrise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_anniversaire` date DEFAULT NULL,
  `lien_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(1028) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `email`, `adresse`, `telephone`, `date_anniversaire`, `lien_site`, `bio`, `utilisateur`, `public`) VALUES
(62, 'a', NULL, NULL, '2021-01-01', NULL, 'a', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210521175756', '2021-05-23 13:03:08', 55),
('DoctrineMigrations\\Version20210523131354', '2021-05-23 13:17:51', 855),
('DoctrineMigrations\\Version20210523132126', '2021-05-23 13:21:38', 223),
('DoctrineMigrations\\Version20210523132158', '2021-05-23 13:22:23', 271),
('DoctrineMigrations\\Version20210523133058', '2021-05-23 13:31:09', 110),
('DoctrineMigrations\\Version20210523223454', '2021-05-23 22:37:11', 241),
('DoctrineMigrations\\Version20210524111242', '2021-05-24 11:12:55', 56),
('DoctrineMigrations\\Version20210524172358', '2021-05-24 17:25:14', 85),
('DoctrineMigrations\\Version20210526091217', '2021-05-26 09:13:40', 192);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `journee_complete` tinyint(1) NOT NULL,
  `couleur_fond` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_bordure` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_texte` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `debut`, `fin`, `description`, `journee_complete`, `couleur_fond`, `couleur_bordure`, `couleur_texte`) VALUES
(1, 'RDV journée complète', '2021-05-25 00:00:00', '2021-05-25 00:00:00', 'Rendez-vous journée complète', 1, '#0000ff', '#ff0000', '#ffffff'),
(2, 'Réunion matin', '2021-05-25 08:00:00', '2021-05-25 12:00:00', 'Réunion web', 0, '#ff0000', '#ffff00', '#000000'),
(3, 'RDV', '2021-05-27 10:00:00', '2021-05-27 11:00:00', 'Petite réunion', 0, '#8000ff', '#000000', '#ffffff'),
(4, 'test', '2021-05-27 03:30:00', '2021-05-28 07:30:00', 'test', 0, '#00c3d1', '#276fce', '#265aba'),
(5, 'La Journée de la truite', '2021-05-26 00:00:00', '2021-05-27 00:00:00', 'Journée de la truite', 1, '#00ffff', '#ff80ff', '#000000'),
(6, 'Soirée pyjama', '2021-05-29 19:00:00', '2021-05-30 12:00:00', 'Venez nombreux ! :-)', 0, '#d4a2d7', '#19f00a', '#ff0000');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `pwd`, `role`, `cv`) VALUES
(8, 'Blanchet', 'Baptiste', 'baptiste', '$2y$13$SgLN1ryui2hcRNefz//.RudgaOwoUUY47ZTQ8MCE2SL9JQq93hwHG', 'abcd', 62),
(10, 'Hermange', 'Julien', 'Julien', '$2y$13$HYi.Eh6slb8xt/oK6EctvenU3Cwa1I/Jh8W2reMvQhlVy6t/iK4cC', 'abcd', NULL),
(13, 'brucomachin', 'Aloa', 'Aloa', '$2y$13$NMk8JZbrdEPNS1xmwJFReek0AH8g0SXvjWM45CgxbKJQ9ghvg/4va', 'abcd', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_94D4687FB66FFE92` (`cv`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B66FFE921D1C63B3` (`utilisateur`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3B66FFE92` (`cv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `FK_94D4687FB66FFE92` FOREIGN KEY (`cv`) REFERENCES `cv` (`id`);

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `FK_B66FFE921D1C63B3` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B3B66FFE92` FOREIGN KEY (`cv`) REFERENCES `cv` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
