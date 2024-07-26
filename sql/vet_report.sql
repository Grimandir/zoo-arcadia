-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 juil. 2024 à 16:31
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoo_arcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `vet_report`
--

CREATE TABLE `vet_report` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `health_status` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vet_report`
--

INSERT INTO `vet_report` (`id`, `animal_id`, `report_date`, `health_status`, `food`, `quantity`, `remarks`) VALUES
(1, 1, '2024-07-20', 'Bon', 'Viande', '5kg', 'Aucun problème détecté'),
(2, 2, '2024-07-20', 'Bon', 'Viande', '4kg', 'Léger problème de peau'),
(3, 3, '2024-07-20', 'Bon', 'Herbe', '10kg', 'En bonne santé'),
(4, 4, '2024-07-20', 'Bon', 'Herbe', '8kg', 'Rien à signaler'),
(5, 5, '2024-07-20', 'Bon', 'Herbe', '7kg', 'Bon état général'),
(6, 6, '2024-07-20', 'Bon', 'Grains', '3kg', 'Aucun problème détecté'),
(7, 7, '2024-07-20', 'Bon', 'Fruits', '2kg', 'Très actif'),
(8, 8, '2024-07-20', 'Bon', 'Herbe', '15kg', 'En bonne santé'),
(9, 9, '2024-07-20', 'Bon', 'Fruits', '6kg', 'Très actif'),
(10, 10, '2024-07-20', 'Bon', 'Bambou', '30kg', 'Très actif'),
(11, 11, '2024-07-20', 'Bon', 'Herbe', '50kg', 'Très actif'),
(12, 12, '2024-07-20', 'Bon', 'Fruits', '7kg', 'Très actif'),
(13, 13, '2024-07-20', 'Bon', 'Fruits', '8kg', 'Très actif'),
(14, 14, '2024-07-20', 'Bon', 'Viande', '4kg', 'Très actif'),
(15, 15, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(16, 16, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(17, 17, '2024-07-20', 'Bon', 'Viande', '4kg', 'Très actif'),
(18, 18, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(19, 19, '2024-07-20', 'Bon', 'Herbe', '20kg', 'Très actif'),
(20, 20, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(21, 21, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(22, 22, '2024-07-20', 'Bon', 'Poissons', '10kg', 'Très actif'),
(23, 23, '2024-07-20', 'Bon', 'Poissons', '15kg', 'Très actif'),
(24, 24, '2024-07-20', 'Bon', 'Poissons', '12kg', 'Très actif'),
(25, 25, '2024-07-20', 'Bon', 'Algues', '5kg', 'Très actif'),
(26, 26, '2024-07-20', 'Bon', 'Poissons', '20kg', 'Très actif'),
(27, 27, '2024-07-20', 'Bon', 'Herbe', '30kg', 'Très actif'),
(28, 28, '2024-07-20', 'Bon', 'Viande', '4kg', 'Très actif'),
(29, 29, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(30, 30, '2024-07-20', 'Bon', 'Insectes', '1kg', 'Très actif'),
(31, 31, '2024-07-20', 'Bon', 'Feuilles d’eucalyptus', '5kg', 'Très actif'),
(32, 32, '2024-07-20', 'Bon', 'Viande', '5kg', 'Très actif'),
(33, 33, '2024-07-20', 'Bon', 'Poissons', '3kg', 'Très actif'),
(34, 34, '2024-07-20', 'Bon', 'Bambou', '2kg', 'Très actif'),
(35, 35, '2024-07-20', 'Bon', 'Herbe', '25kg', 'Très actif'),
(36, 36, '2024-07-20', 'Bon', 'Feuilles', '15kg', 'Très actif'),
(37, 37, '2024-07-20', 'Bon', 'Viande', '2kg', 'Très actif'),
(38, 38, '2024-07-20', 'Bon', 'Viande', '3kg', 'Très actif'),
(39, 39, '2024-07-20', 'Bon', 'Fruits', '5kg', 'Très actif'),
(40, 40, '2024-07-20', 'Bon', 'Fruits', '3kg', 'Très actif'),
(41, 41, '2024-07-20', 'Bon', 'Graines', '2kg', 'Très actif'),
(42, 42, '2024-07-20', 'Bon', 'Graines', '1kg', 'Très actif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vet_report`
--
ALTER TABLE `vet_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vet_report`
--
ALTER TABLE `vet_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vet_report`
--
ALTER TABLE `vet_report`
  ADD CONSTRAINT `vet_report_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
