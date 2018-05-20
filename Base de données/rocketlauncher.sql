-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 03 mai 2018 à 15:32
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `rocketlauncher`
--

-- --------------------------------------------------------

--
-- Structure de la table `Brands`
--

CREATE TABLE `Brands` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `firstNameRes` varchar(255) NOT NULL,
  `lastNameRes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Brands`
--

INSERT INTO `Brands` (`id`, `idUser`, `name`, `description`, `image`, `url`, `firstNameRes`, `lastNameRes`) VALUES
(1, 3, 'Rocket Launcher', 'Site internet de mise en avant sur les réseaux sociaux', 'abcdef', 'rocketlauncher.wassimdahmane.fr', 'Wassim', 'MOHAMED DAHMANE'),
(3, 8, 'test', 'test', 'test', 'test', 'test', 'test'),
(5, 20, 'wassim', 'wassim', 'wassim', 'wassim', 'wassim', 'wassim'),
(6, 23, 'Arthur', 'Arthur', 'Arthur', 'Arthur', 'Arthur', 'Arthur'),
(7, 25, 'louis', 'louis', 'louis', 'louis', 'louis', 'louis');

-- --------------------------------------------------------

--
-- Structure de la table `Campaigns`
--

CREATE TABLE `Campaigns` (
  `id` int(11) NOT NULL,
  `idBrand` int(11) NOT NULL,
  `description` mediumtext,
  `followersMin` varchar(7) DEFAULT NULL,
  `followersMax` varchar(7) DEFAULT NULL,
  `themes` mediumtext,
  `gratificationType` varchar(6) DEFAULT NULL,
  `gratificationDetail` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Candidates`
--

CREATE TABLE `Candidates` (
  `id` int(11) NOT NULL,
  `idInfluencer` int(11) NOT NULL,
  `idCampaign` int(11) NOT NULL,
  `statut` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Facebook`
--

CREATE TABLE `Facebook` (
  `id` int(11) NOT NULL,
  `idInfluencer` int(11) NOT NULL,
  `info` mediumtext,
  `dateLastUpade` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Influencers`
--

CREATE TABLE `Influencers` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postalCode` varchar(6) DEFAULT NULL,
  `themes` mediumtext,
  `bio` mediumtext,
  `hobbies` mediumtext,
  `remunerationType` varchar(6) DEFAULT NULL,
  `instagram` tinyint(4) DEFAULT NULL,
  `youtube` tinyint(4) DEFAULT NULL,
  `facebook` tinyint(4) DEFAULT NULL,
  `twitter` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Influencers`
--

INSERT INTO `Influencers` (`id`, `idUser`, `firstName`, `lastName`, `address`, `city`, `postalCode`, `themes`, `bio`, `hobbies`, `remunerationType`, `instagram`, `youtube`, `facebook`, `twitter`) VALUES
(1, 2, 'Wassim', 'DAHMANE', '19 ravue du gavaliavon', 'Puiseux', '95380', 'Thèmes', '1BIOGRAPHIE', 'HOBBITE', 'EUROS', 0, 0, 0, 0),
(3, 7, 'wass', 'wass', 'TEST', 'COSMA', 'LATIF', 'WASSIM', 'wass', 'DOUZE', 'wass', 0, 0, 0, 0),
(4, 9, 'root', 'root', 'root', 'root', 'root', 'root', 'root', 'root', 'root', 0, 0, 0, 0),
(5, 22, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Instagram`
--

CREATE TABLE `Instagram` (
  `id` int(11) NOT NULL,
  `idInfluencer` int(11) NOT NULL,
  `info` mediumtext,
  `dateLastUpade` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `idSender` int(11) NOT NULL,
  `idReceiver` int(11) NOT NULL,
  `content` mediumtext,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Twitter`
--

CREATE TABLE `Twitter` (
  `id` int(11) NOT NULL,
  `idInfluencer` int(11) NOT NULL,
  `info` mediumtext,
  `dateLastUpade` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userType` varchar(15) DEFAULT NULL,
  `dateRegistration` datetime DEFAULT NULL,
  `dateLastConnection` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `userType`, `dateRegistration`, `dateLastConnection`) VALUES
(1, 'ravokavette@lavaunchaveur.fr', '$2y$10$pdvwSbbPs10ELT8VG2Siw.FpW1PszcRQWL1LUr1QKD/Hbvj1a1.qe', 'Influencer', NULL, NULL),
(2, 'wox@gmail.com', '$2y$10$jV/ehxTKvBiAZNNmLrursu9/IOocLwNWMEwiWEclPdFn//W4afiz.', 'Influencer', NULL, NULL),
(3, 'contact@wassimdahmane.fr', '$2y$10$Jm8WC48eZs2HL9Bmi3MPqerCxhwPrYXy1H1tO91G1WGSVM8DYhhhm', 'Marque', NULL, NULL),
(4, 'wox@wox.fr', '$2y$10$I7jEfK5gqDSrXujQ22GfyuIzyjGs8q/qQYkZOxTru62KniMTJIWd6', 'Marque', NULL, NULL),
(6, 'a@b.c', '$2y$10$3ynwcZRRLyOGqZT9GC0FleNOMGRoUofBh6bC1YjXKT/FOi0Q5UoTW', 'Influencer', NULL, NULL),
(7, 'wass@wass.fr', '$2y$10$ytvNFM5OOoDvEfGEoYSR1.EL6hQxB.09HVeIFuGkYoQLChWYiASEq', 'Influencer', NULL, '2018-05-02 12:59:01'),
(8, 'test@test.fr', '$2y$10$JdzPEwocOxDBemsqtCBYUu6rEe8gEVtUkE7SyRkT04W2D90tCOzoO', 'Marque', NULL, NULL),
(9, 'root@root.fr', '$2y$10$4.H8ItHyw9JTsOiuJyeG1eN1iTQbf5K/92sEfXb9P5qXIbapcKIfi', 'Influencer', NULL, '2018-05-02 01:02:08'),
(13, 'test@testa.fr', '$2y$10$dF.i0EwnQgb0Md2r1c0UL.Zw3J.ytPTwnVd31XM228P.uMD60s7b.', 'Marque', NULL, NULL),
(14, 'clavier@clavier.fr', '$2y$10$DxJlk9HD5EUrUnLrHbvfp.3BeL06metF5HJiqmZrrHyehEMseSsZ.', 'Marque', NULL, NULL),
(15, 'souris@souris.fr', '$2y$10$ls81ecUpm14V/Ra2ewH6L.IVcWOpx7XKzF5h486o.RpJk1HXvVEAu', 'Marque', NULL, NULL),
(16, 'testo@testo.fr', '$2y$10$hB35lq4eaMxvdO7tHAgKA.GGOAj1wDCW3DvkvGqyFQDGO7B5Dot6C', 'Marque', NULL, NULL),
(17, 'testi@testi.fr', '$2y$10$x9ZN74qIBaL3lRPfUhcaXOVf5TTFOiGsS9NH.zsrYgbkkqwLkN8RS', 'Marque', NULL, NULL),
(20, 'wassim@wassim.fr', '$2y$10$dYy/uPa4BZdcl1c4CoXKNusx.yIKHHwd7HoIithtx2LZqwDKu7abe', 'Marque', NULL, '2018-05-02 00:54:26'),
(21, 'latif@latif.fr', '$2y$10$kqPYuv.dVSOGeYAIT2fwAun4MTZeYtc7kgPbYDTqXVg61vBk77opG', 'Influencer', '2018-05-01 23:06:13', '2018-05-01 23:06:13'),
(22, 'a@b.b', '$2y$10$zjhwIOQbBTSbwAn7/xC1qeuzlHryf8TpLS2JkhZuZbjx7AQWhG1HG', 'Influencer', '2018-05-02 00:21:01', '2018-05-02 00:21:01'),
(23, 'arthur@arthur.fr', '$2y$10$ucuO2DGioCdvh4H0jJdkQO4yuzx9.ytk4wUMUsTxszwfWL4zyInJq', 'Influencer', '2018-05-02 09:48:12', '2018-05-02 09:48:12'),
(24, 'toast@toast.fr', '$2y$10$1WsI/hjSEwqEeSTPE9RKM.bRc.40Zk6pXJKVoIMT7if6cnK0S12ZK', 'Marque', NULL, NULL),
(25, 'louis@louis.fr', '$2y$10$/u/3tb9BXDxyTN/ojXoV9OeW4q3Al3rYOGMvF2GmvlJBMT.oyh0He', 'Influencer', '2018-05-02 12:59:18', '2018-05-02 12:59:18');

-- --------------------------------------------------------

--
-- Structure de la table `Youtube`
--

CREATE TABLE `Youtube` (
  `id` int(11) NOT NULL,
  `idInfluencer` int(11) NOT NULL,
  `info` mediumtext,
  `dateLastUpade` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Brands`
--
ALTER TABLE `Brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Brands_Users1_idx` (`idUser`);

--
-- Index pour la table `Campaigns`
--
ALTER TABLE `Campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Campaigns_Brands1_idx` (`idBrand`);

--
-- Index pour la table `Candidates`
--
ALTER TABLE `Candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Candidates_Influencers1_idx` (`idInfluencer`),
  ADD KEY `fk_Candidates_Campaigns1_idx` (`idCampaign`);

--
-- Index pour la table `Facebook`
--
ALTER TABLE `Facebook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Facebook_Influencers1_idx` (`idInfluencer`);

--
-- Index pour la table `Influencers`
--
ALTER TABLE `Influencers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Influencers_Users_idx` (`idUser`);

--
-- Index pour la table `Instagram`
--
ALTER TABLE `Instagram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Instagram_Influencers1_idx` (`idInfluencer`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Messages_Users1_idx` (`idSender`),
  ADD KEY `fk_Messages_Users2_idx` (`idReceiver`);

--
-- Index pour la table `Twitter`
--
ALTER TABLE `Twitter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Twitter_Influencers1_idx` (`idInfluencer`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Youtube`
--
ALTER TABLE `Youtube`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Youtube_Influencers1_idx` (`idInfluencer`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Brands`
--
ALTER TABLE `Brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Campaigns`
--
ALTER TABLE `Campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Candidates`
--
ALTER TABLE `Candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Facebook`
--
ALTER TABLE `Facebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Influencers`
--
ALTER TABLE `Influencers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Instagram`
--
ALTER TABLE `Instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Twitter`
--
ALTER TABLE `Twitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `Youtube`
--
ALTER TABLE `Youtube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Brands`
--
ALTER TABLE `Brands`
  ADD CONSTRAINT `fk_Brands_Users1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Campaigns`
--
ALTER TABLE `Campaigns`
  ADD CONSTRAINT `fk_Campaigns_Brands1` FOREIGN KEY (`idBrand`) REFERENCES `Brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Candidates`
--
ALTER TABLE `Candidates`
  ADD CONSTRAINT `fk_Candidates_Campaigns1` FOREIGN KEY (`idCampaign`) REFERENCES `Campaigns` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Candidates_Influencers1` FOREIGN KEY (`idInfluencer`) REFERENCES `Influencers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Facebook`
--
ALTER TABLE `Facebook`
  ADD CONSTRAINT `fk_Facebook_Influencers1` FOREIGN KEY (`idInfluencer`) REFERENCES `Influencers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Influencers`
--
ALTER TABLE `Influencers`
  ADD CONSTRAINT `fk_Influencers_Users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Instagram`
--
ALTER TABLE `Instagram`
  ADD CONSTRAINT `fk_Instagram_Influencers1` FOREIGN KEY (`idInfluencer`) REFERENCES `Influencers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `fk_Messages_Users1` FOREIGN KEY (`idSender`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Messages_Users2` FOREIGN KEY (`idReceiver`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Twitter`
--
ALTER TABLE `Twitter`
  ADD CONSTRAINT `fk_Twitter_Influencers1` FOREIGN KEY (`idInfluencer`) REFERENCES `Influencers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Youtube`
--
ALTER TABLE `Youtube`
  ADD CONSTRAINT `fk_Youtube_Influencers1` FOREIGN KEY (`idInfluencer`) REFERENCES `Influencers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
