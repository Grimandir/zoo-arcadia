-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 juil. 2024 à 16:30
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
-- Structure de la table `feeding_log`
--

CREATE TABLE `feeding_log` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `feeding_date` date NOT NULL,
  `food` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `feeding_log`
--

INSERT INTO `feeding_log` (`id`, `animal_id`, `feeding_date`, `food`, `quantity`) VALUES
(1, 1, '2024-07-20', 'Viande', '5kg'),
(2, 2, '2024-07-20', 'Viande', '4kg'),
(3, 3, '2024-07-20', 'Herbe', '10kg'),
(4, 4, '2024-07-20', 'Herbe', '8kg'),
(5, 5, '2024-07-20', 'Herbe', '7kg'),
(6, 6, '2024-07-20', 'Grains', '3kg'),
(7, 7, '2024-07-20', 'Fruits', '2kg'),
(8, 8, '2024-07-20', 'Herbe', '15kg'),
(9, 9, '2024-07-20', 'Fruits', '6kg'),
(10, 10, '2024-07-20', 'Bambou', '30kg'),
(11, 11, '2024-07-20', 'Herbe', '50kg'),
(12, 12, '2024-07-20', 'Fruits', '7kg'),
(13, 13, '2024-07-20', 'Fruits', '8kg'),
(14, 14, '2024-07-20', 'Viande', '4kg'),
(15, 15, '2024-07-20', 'Insectes', '1kg'),
(16, 16, '2024-07-20', 'Insectes', '1kg'),
(17, 17, '2024-07-20', 'Viande', '4kg'),
(18, 18, '2024-07-20', 'Insectes', '1kg'),
(19, 19, '2024-07-20', 'Herbe', '20kg'),
(20, 20, '2024-07-20', 'Insectes', '1kg'),
(21, 21, '2024-07-20', 'Insectes', '1kg'),
(22, 22, '2024-07-20', 'Poissons', '10kg'),
(23, 23, '2024-07-20', 'Poissons', '15kg'),
(24, 24, '2024-07-20', 'Poissons', '12kg'),
(25, 25, '2024-07-20', 'Algues', '5kg'),
(26, 26, '2024-07-20', 'Poissons', '20kg'),
(27, 27, '2024-07-20', 'Herbe', '30kg'),
(28, 28, '2024-07-20', 'Viande', '4kg'),
(29, 29, '2024-07-20', 'Insectes', '1kg'),
(30, 30, '2024-07-20', 'Insectes', '1kg'),
(31, 31, '2024-07-20', 'Feuilles d’eucalyptus', '5kg'),
(32, 32, '2024-07-20', 'Viande', '5kg'),
(33, 33, '2024-07-20', 'Poissons', '3kg'),
(34, 34, '2024-07-20', 'Bambou', '2kg'),
(35, 35, '2024-07-20', 'Herbe', '25kg'),
(36, 36, '2024-07-20', 'Feuilles', '15kg'),
(37, 37, '2024-07-20', 'Viande', '2kg'),
(38, 38, '2024-07-20', 'Viande', '3kg'),
(39, 39, '2024-07-20', 'Fruits', '5kg'),
(40, 40, '2024-07-20', 'Fruits', '3kg'),
(41, 41, '2024-07-20', 'Graines', '2kg'),
(42, 42, '2024-07-20', 'Graines', '1kg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `feeding_log`
--
ALTER TABLE `feeding_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `feeding_log`
--
ALTER TABLE `feeding_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `feeding_log`
--
ALTER TABLE `feeding_log`
  ADD CONSTRAINT `feeding_log_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
