-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 juil. 2024 à 16:29
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
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `habitat_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `species`, `habitat_id`, `image`, `created_at`) VALUES
(1, 'Lion', 'Panthera leo', 3, 'lion.jpg', '2024-07-22 10:46:30'),
(2, 'Léopard', 'Panthera pardus', 3, 'leopard.jpg', '2024-07-22 10:46:30'),
(3, 'Gnou', 'Connochaetes', 3, 'gnou.jpg', '2024-07-22 10:46:31'),
(4, 'Antilope', 'Antilopinae', 3, 'antilope.jpg', '2024-07-22 10:46:31'),
(5, 'Zèbre', 'Equus quagga', 3, 'zebre.jpg', '2024-07-22 10:46:32'),
(6, 'Autruche', 'Struthio camelus', 3, 'autruche.jpg', '2024-07-22 10:46:32'),
(7, 'Lémurien', 'Lemuriformes', 3, 'lemurien.jpg', '2024-07-22 10:46:33'),
(8, 'Rhinocéros', 'Rhinocerotidae', 3, 'rhinoceros.jpg', '2024-07-22 10:46:35'),
(9, 'Orang-outan', 'Pongo', 1, 'orang_outan.jpg', '2024-07-22 10:47:06'),
(10, 'Panda', 'Ailuropoda melanoleuca', 1, 'panda.jpg', '2024-07-22 10:47:07'),
(11, 'Éléphant', 'Loxodonta africana', 1, 'elephant.jpg', '2024-07-22 10:47:07'),
(12, 'Gorille', 'Gorilla', 1, 'gorille.jpg', '2024-07-22 10:47:08'),
(13, 'Chimpanzé', 'Pan troglodytes', 1, 'chimpanze.jpg', '2024-07-22 10:47:08'),
(14, 'Tigre', 'Panthera tigris', 1, 'tigre.jpg', '2024-07-22 10:47:09'),
(15, 'Boa', 'Boa constrictor', 2, 'boa.jpg', '2024-07-22 10:47:30'),
(16, 'Caméléon', 'Chamaeleonidae', 2, 'cameleon.jpg', '2024-07-22 10:47:31'),
(17, 'Iguane', 'Iguana', 2, 'iguane.jpg', '2024-07-22 10:47:33'),
(18, 'Crocodile', 'Crocodylidae', 2, 'crocodile.jpg', '2024-07-22 10:47:33'),
(19, 'Tortue de Galapagos', 'Chelonoidis nigra', 2, 'tortue_galapagos.jpg', '2024-07-22 10:47:34'),
(20, 'Crotale', 'Crotalus', 2, 'crotale.jpg', '2024-07-22 10:47:35'),
(21, 'Python', 'Pythonidae', 2, 'python.jpg', '2024-07-22 10:47:35'),
(22, 'Pingouin', 'Spheniscidae', 4, 'pingouin.jpg', '2024-07-22 10:47:58'),
(23, 'Ours Polaire', 'Ursus maritimus', 4, 'ours_polaire.jpg', '2024-07-22 10:47:58'),
(24, 'Phoque', 'Phocidae', 4, 'phoque.jpg', '2024-07-22 10:47:59'),
(25, 'Poisson Exotique', 'Exotic Fish', 4, 'poisson_exotique.jpg', '2024-07-22 10:48:00'),
(26, 'Dauphin', 'Delphinidae', 4, 'dauphin.jpg', '2024-07-22 10:48:00'),
(27, 'Hippopotame', 'Hippopotamus amphibius', 4, 'hippopotame.jpg', '2024-07-22 10:48:01'),
(28, 'Ours', 'Ursidae', 5, 'ours.jpg', '2024-07-22 10:48:23'),
(29, 'Gibbon argenté', 'Hylobates moloch', 5, 'gibbon_argente.jpg', '2024-07-22 10:48:23'),
(30, 'Ouistiti', 'Callitrichidae', 5, 'ouistiti.jpg', '2024-07-22 10:48:24'),
(31, 'Koala', 'Phascolarctos cinereus', 5, 'koala.jpg', '2024-07-22 10:48:24'),
(32, 'Loup', 'Canis lupus', 5, 'loup.jpg', '2024-07-22 10:48:25'),
(33, 'Loutre', 'Lutrinae', 5, 'loutre.jpg', '2024-07-22 10:48:25'),
(34, 'Panda roux', 'Ailurus fulgens', 5, 'panda_roux.jpg', '2024-07-22 10:48:25'),
(35, 'Kangourou', 'Macropodidae', 5, 'kangourou.jpg', '2024-07-22 10:48:27'),
(36, 'Girafe', 'Giraffa camelopardalis', 5, 'girafe.jpg', '2024-07-22 10:48:28'),
(37, 'Faucon', 'Falconidae', 6, 'faucon.jpg', '2024-07-22 10:48:50'),
(38, 'Aigle', 'Aquila chrysaetos', 6, 'aigle.jpg', '2024-07-22 10:48:51'),
(39, 'Toucan', 'Ramphastos', 6, 'toucan.jpg', '2024-07-22 10:48:52'),
(40, 'Flamant Rose', 'Phoenicopterus', 6, 'flamant_rose.jpg', '2024-07-22 10:48:53'),
(41, 'Oiseau exotique', 'Exotic Bird', 6, 'oiseau_exotique.jpg', '2024-07-22 10:48:53'),
(42, 'Perroquet', 'Psittaciformes', 6, 'perroquet.jpg', '2024-07-22 10:48:54');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
