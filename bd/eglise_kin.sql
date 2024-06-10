-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 juin 2024 à 21:08
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eglise_kin`
--

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id`, `nom`, `supprimer`) VALUES
(1, 'centrale', 0),
(2, 'goma', 0),
(3, 'lubumbashi', 0),
(4, 'Beni', 0);

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `rapport` text NOT NULL,
  `dates` datetime NOT NULL,
  `user` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rapport`
--

INSERT INTO `rapport` (`id`, `description`, `rapport`, `dates`, `user`, `statut`, `supprimer`) VALUES
(1, 'kkkkkkkkk', 'PREMIER CHAPITRE.docx', '2024-05-25 11:05:28', 1, 0, 0),
(2, 'jjjj', 'tfc al.docx', '2024-05-25 12:05:10', 1, 0, 1),
(3, 'iiiiiiiiiiiiiiiiiii', 'KAMBALE KAMALA ALBERT PROJET TUTORE.pdf', '2024-05-25 12:05:41', 2, 0, 0),
(4, 'descriptionnjjijkj', 'état de la question .doc', '2024-05-25 12:05:23', 2, 0, 0),
(5, 'kkkkkkkkkkkkkkkkkknjh hjbfebjnj jnjdeincnm jncein jniniwd jijndenjni jncejicnnjnjenc jncejnj ejj jnnckk je cnjc je cnjncej jjnce', 'tfc  sifa.docx', '2024-05-25 02:05:25', 2, 0, 0),
(6, 'kkkkkkkkkkkkkkkkkknjh hjbfebjnj jnjdeincnm jncein jniniwd jijndenjni jncejicnnjnjenc jncejnj ejj jnnckk je cnjc je cnjncej jjnce kkkkkkkkkkkkkkkkkknjh hjbfebjnj jnjdeincnm jncein jniniwd jijndenjni jncejicnnjnjenc jncejnj ejj jnnckk je cnjc je cnjncej jjncekkkkkkkkkkkkkkkkkknjh hjbfebjnj jnjdeincnm jncein jniniwd jijndenjni jncejicnnjnjenc jncejnj ejj jnnckk je cnjc je cnjncej jjnce', 'PREMIER CHAPITRE.docx', '2024-05-25 02:05:31', 2, 0, 0),
(7, 'rappport pour ', 'KAMBALE KAMALA ALBERT PROJET TUTORE.pdf', '2024-05-25 02:05:34', 1, 0, 0),
(8, 'dddddw', 'KAMBALE KAMALA ALBERT PROJET TUTORE.pdf', '2024-05-25 03:05:10', 1, 0, 0),
(9, 'messageuuu', 'tfc al.docx', '2024-05-25 03:05:20', 1, 0, 0),
(10, 'jjjjjjjjjjjdee', 'tfc  sifa.docx', '2024-05-25 03:05:12', 2, 0, 0),
(11, 'uhuhwiuhd', 'tfc al.docx', '2024-05-25 04:05:44', 3, 0, 0),
(12, 'directive a suivre', 'état de la question .doc', '2024-05-26 11:05:39', 1, 0, 1),
(13, 'd&#039;accord', 'tfc al.docx', '2024-05-26 11:05:14', 2, 0, 0),
(14, 'jhuhui', 'état de la question .doc', '2024-05-27 09:05:57', 2, 0, 0),
(15, 'jjhkkj', 'gestion_venco_shop.sql', '2024-05-29 02:05:37', 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `username` text NOT NULL,
  `fonction` text NOT NULL,
  `poste` int(11) NOT NULL,
  `motdepasse` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `postnom`, `prenom`, `username`, `fonction`, `poste`, `motdepasse`, `supprimer`) VALUES
(1, 'kambale', 'kamala', 'Albert', 'kambalekamala@eglise.com', '1', 1, 'kaaM32AA1:KA1', 0),
(2, 'kasereka', 'kamala', 'john', 'kaserekakamala@eglise.com', '2', 2, 'kaaS24jA2:KA1', 0),
(3, 'muhindo', 'kombi', 'jospin', 'muhindokombi@eglise.com', '2', 4, 'muoH33jU2:KO4', 0),
(4, 'klklks', 'lkko', 'ooi', 'klklkslkko@eglise.com', '2', 4, 'klkK19oL9:LK4', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
