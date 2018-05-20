-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Mars 2018 à 09:39
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rocketlauncher`
--

-- --------------------------------------------------------

--
-- Structure de la table `acceptedmissions`
--

CREATE TABLE `acceptedmissions` (
  `idMission` int(11) NOT NULL,
  `idInflu` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `numSiret` int(14) NOT NULL,
  `addMail` varchar(100) NOT NULL,
  `nomMarque` varchar(120) NOT NULL,
  `urlMarque` varchar(200) NOT NULL,
  `motPasse` varchar(60) NOT NULL,
  `logo` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `prenom`, `numSiret`, `addMail`, `nomMarque`, `urlMarque`, `motPasse`, `logo`) VALUES
(1, 'Baptiste', 'Jean', 552354155, 'monentreprise@lentreprise.fr', 'Sisi Chakal', 'sisichakal.fr', 'sisichakal', NULL),
(2, 'DAHMANE', 'Wassim', 12345678, 'contact@rocketlauncher.fr', 'Rocket Launcher', 'rocketlauncher.fr', 'rocketlauncher', NULL),
(3, 'test', 'test', 100085, 'test@test.fr', 'test.test', 'test.test.fr', 'test', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `influenceur`
--

CREATE TABLE `influenceur` (
  `username` varchar(90) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `thematiques` varchar(300) NOT NULL,
  `nbFollowers` bigint(20) NOT NULL,
  `telephone` char(10) NOT NULL,
  `logo` blob,
  `valide` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `influenceur`
--

INSERT INTO `influenceur` (`username`, `nom`, `prenom`, `mail`, `mdp`, `thematiques`, `nbFollowers`, `telephone`, `logo`, `valide`) VALUES
('12Wass', 'MOHAMED DAHMANE', 'Wassim', 'wassimdah@gmail.com', 'wassox', 'produits beauté', 12000000, '0650673679', NULL, 1),
('Lastaffa', 'Diomandé', 'Latif', 'lat.diomande@gmail.com', 'lastaffa', 'Produits Gaming', 50000000, '0612345678', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `idmessage` int(11) NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `destinataire` varchar(50) NOT NULL,
  `commenditaire` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `id` int(50) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `facebook` tinyint(1) NOT NULL,
  `twitter` tinyint(1) NOT NULL,
  `instagram` tinyint(1) NOT NULL,
  `youtube` tinyint(1) NOT NULL,
  `entreprise` varchar(120) NOT NULL,
  `deadLine` int(6) NOT NULL,
  `descriptif` varchar(300) NOT NULL,
  `remuneration` int(6) NOT NULL,
  `influenceursMin` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mission`
--

INSERT INTO `mission` (`id`, `titre`, `facebook`, `twitter`, `instagram`, `youtube`, `entreprise`, `deadLine`, `descriptif`, `remuneration`, `influenceursMin`) VALUES
(1, 'Publicité pour produits beauté', 0, 0, 1, 1, 'Moi et toi ', 150, 'descriptiftest', 300, 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acceptedmissions`
--
ALTER TABLE `acceptedmissions`
  ADD PRIMARY KEY (`idMission`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `influenceur`
--
ALTER TABLE `influenceur`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idmessage`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entreprise_mission` (`entreprise`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
