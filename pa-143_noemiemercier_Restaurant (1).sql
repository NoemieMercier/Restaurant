-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 04 déc. 2019 à 14:28
-- Version du serveur :  5.7.28-0ubuntu0.18.04.4
-- Version de PHP :  7.3.6-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pa-143_noemiemercier_Restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `id` int(30) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ADMIN`
--

INSERT INTO `ADMIN` (`id`, `email`, `mdp`, `nom`, `prenom`) VALUES
(1, 'noemie@mercier.fr', 'champi', 'mercier', 'noemie');

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDES`
--

CREATE TABLE `COMMANDES` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `COMMANDES`
--

INSERT INTO `COMMANDES` (`id`, `id_user`, `date`, `prix_total`) VALUES
(1, 8, '2019-10-17', 79),
(10, 8, '2019-10-18', 47),
(11, 9, '2019-10-18', 110),
(12, 9, '2019-10-18', 136.5);

-- --------------------------------------------------------

--
-- Structure de la table `LIGNES_CMD`
--

CREATE TABLE `LIGNES_CMD` (
  `id_cmd` int(11) NOT NULL,
  `id_meal` int(11) NOT NULL,
  `quantite` int(100) NOT NULL,
  `prix_unite` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `LIGNES_CMD`
--

INSERT INTO `LIGNES_CMD` (`id_cmd`, `id_meal`, `quantite`, `prix_unite`) VALUES
(1, 2, 2, 7.5),
(3, 1, 4, 8.5),
(9, 2, 2, 7.5),
(10, 1, 4, 8.5),
(11, 2, 2, 7.5),
(12, 1, 8, 8.5),
(12, 2, 2, 7.5),
(12, 1, 1, 8.5),
(12, 2, 6, 7.5);

-- --------------------------------------------------------

--
-- Structure de la table `MEAL`
--

CREATE TABLE `MEAL` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `MEAL`
--

INSERT INTO `MEAL` (`id`, `nom`, `description`, `prix`, `photo`) VALUES
(1, 'La champoêlée', 'Riz complet, petits pois, oignons au vinaigre balsamique, champignons de Paris au persil et cébettes.', 9.5, 'mushmush.jpg'),
(2, 'Le mushoto', 'Risotto de pleurotes fraîches, sauce lait de coco, citron et coriandre.', 7.5, 'mushoto.jpg'),
(3, 'Le shitofu', 'Algues et haricots marins sauce poires salée, tofu de shiitaké aux oignons grillés, pousses de soja.', 10.5, 'mushtofu.jpg'),
(6, 'Le champobowl', 'Salade au gingembre, champignons cru marinées à l\'huile de basilic, falafels de crevettes.', 10.5, 'ginger-bowl.jpg'),
(7, 'Suppléments', 'Au choix : avocat, confiture au gingembre, olives aux anchois, tapenade figue-basilic.', 2.5, 'herbs-906140__340.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `RESERVATION`
--

CREATE TABLE `RESERVATION` (
  `id` int(11) NOT NULL,
  `id_user` int(30) NOT NULL,
  `date` datetime NOT NULL,
  `nb_couverts` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `RESERVATION`
--

INSERT INTO `RESERVATION` (`id`, `id_user`, `date`, `nb_couverts`) VALUES
(1, 0, '2019-10-16 16:10:00', 2),
(17, 8, '2019-10-18 19:18:00', 2),
(18, 8, '2019-10-17 15:13:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `id_user` int(50) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(30) COLLATE utf8_bin NOT NULL,
  `code_postal` int(20) NOT NULL,
  `ville` varchar(20) COLLATE utf8_bin NOT NULL,
  `tel` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `naissance` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`id_user`, `nom`, `prenom`, `email`, `adresse`, `code_postal`, `ville`, `tel`, `password`, `naissance`) VALUES
(3, 'Mercier', 'Noémie', 'noemie@mercier.fr', 'Bd Malesherbes', 75008, 'Paris', '06 45 63 21 45', '$2y$10$yFpeH9Ih81ISyr3U0jlytux4TLwoxSIzbKcU4n6PntzVtAWUCtQWK', '1991-8-21'),
(4, 'Koukou', 'lesamis', 'nono@loulou.fr', 'geshf', 75008, 'kgkwhk', '06 45 85 21 47', '$2y$10$EkfQTM0xQ7wqDLYlV5nUReV6qkDTtGnQKgw8fM0zrXvE4XReTEDwu', '1948-4-8'),
(5, 'Mercier', 'Noémie', 'tutu@pou.fr', 'Bonjour', 75008, 'Paris', '06 45 85 21 47', '$2y$10$namgZXJLcEEXQ4i5rpB4HOXkXxfQAc5pP6VE0tsbZxZDzqgNhs9TS', '1956-10-8'),
(6, 'Mercier', 'Noémie', 'tutu@plu.fr', 'Bonjour', 75008, 'Paris', '0645852147', '$2y$10$To78AESovroMwZ7VL5NCIOTulLAO7T4SS6AFeHlkSGLsCIugfVlGq', '1956-1-8'),
(7, 'Doudou', 'Noémie', 'noemie@noemie.fr', 'gfjg', 75008, 'Paris', '06 46 58 75 45', '$2y$10$ISn3ieDPPvrJeUU3TtN7DeBaWQiFZDUFDNUJlIlYh/8mJsThu5EWy', '1946-6-5'),
(8, 'Cotcot', 'Kevinou', 'kevin@poulet.fr', 'gtreqyhry', 75019, 'Paris', '06 45 78 96 52', '$2y$10$uSjeAav/CP8F65t7kKYU5.B1NbFw7ta13sMIx5xepu4xUV.J1e.KK', '1954-12-15'),
(9, 'chakour', 'leyla', 'ff@ff.ff', 'sds', 222, 'paris', '9999999999', '$2y$10$JT.lQ08kfJWr9jXul5uIDu.bm3H8v1Fn2tRD1oaewt3s5fSPUhzCu', '1948-7-9'),
(10, 'Duchnok', 'Patrice', 'patrice@gmail.com', 'fedytrhygu', 75008, 'paris', '06 45 52 21 32', '$2y$10$0DK/T3BXiMKUtF3Isg6Bb.76BdaQS90b4FqaFzxymUHY6T.0pJBb2', '1953-4-18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `COMMANDES`
--
ALTER TABLE `COMMANDES`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Index pour la table `LIGNES_CMD`
--
ALTER TABLE `LIGNES_CMD`
  ADD KEY `id_meal` (`id_meal`) USING BTREE,
  ADD KEY `id_cmd` (`id_cmd`) USING BTREE;

--
-- Index pour la table `MEAL`
--
ALTER TABLE `MEAL`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `COMMANDES`
--
ALTER TABLE `COMMANDES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `LIGNES_CMD`
--
ALTER TABLE `LIGNES_CMD`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `MEAL`
--
ALTER TABLE `MEAL`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
