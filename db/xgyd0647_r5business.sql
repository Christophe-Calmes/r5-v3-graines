-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 17 juin 2024 à 17:05
-- Version du serveur : 8.0.37-0ubuntu0.22.04.3
-- Version de PHP : 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `xgyd0647_r5business`
--

-- --------------------------------------------------------

--
-- Structure de la table `armyList`
--

CREATE TABLE `armyList` (
  `id` int NOT NULL,
  `nameArmyList` varchar(60) DEFAULT NULL,
  `idAuthor` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `idFaction` int DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `armyListLinkMiniature`
--

CREATE TABLE `armyListLinkMiniature` (
  `idminiature` int DEFAULT NULL,
  `idArmyList` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `armyListLinkSpecialRules`
--

CREATE TABLE `armyListLinkSpecialRules` (
  `idSpecialRules` int DEFAULT NULL,
  `idArmyList` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `armyListLinkVehicle`
--

CREATE TABLE `armyListLinkVehicle` (
  `idVehicle` int DEFAULT NULL,
  `idArmyList` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `factions`
--

CREATE TABLE `factions` (
  `id` int NOT NULL,
  `idUnivers` int DEFAULT NULL,
  `nomFaction` varchar(60) DEFAULT NULL,
  `idAuthor` int DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `factionsLinkWeapon`
--

CREATE TABLE `factionsLinkWeapon` (
  `idWeapon` int DEFAULT NULL,
  `idFaction` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `miniatureLinkSpecialRules`
--

CREATE TABLE `miniatureLinkSpecialRules` (
  `idminiature` int DEFAULT NULL,
  `idSpecialRules` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `miniatureLinkWeapons`
--

CREATE TABLE `miniatureLinkWeapons` (
  `idWeapon` int DEFAULT NULL,
  `idminiature` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `miniatures`
--

CREATE TABLE `miniatures` (
  `id` int NOT NULL,
  `idAuthor` int DEFAULT NULL,
  `nameMiniature` varchar(60) DEFAULT NULL,
  `dc` tinyint(1) DEFAULT NULL,
  `dqm` tinyint(1) DEFAULT NULL,
  `move` tinyint DEFAULT NULL,
  `fligt` tinyint(1) DEFAULT NULL,
  `stationnaryFligt` tinyint(1) DEFAULT NULL,
  `miniatureSize` tinyint(1) DEFAULT NULL,
  `typeTroop` tinyint DEFAULT NULL,
  `armor` tinyint(1) DEFAULT NULL,
  `healtPoint` tinyint DEFAULT NULL,
  `price` float DEFAULT NULL,
  `namePicture` varchar(80) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `specialeRulesLinkWeapon`
--

CREATE TABLE `specialeRulesLinkWeapon` (
  `idWeapon` int DEFAULT NULL,
  `idSpecialRules` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `specialRules`
--

CREATE TABLE `specialRules` (
  `id` int NOT NULL,
  `typeSpecialRules` tinyint(1) DEFAULT NULL,
  `nameSpecialRules` varchar(80) DEFAULT NULL,
  `descriptionSpecialRules` text,
  `price` float DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `univers`
--

CREATE TABLE `univers` (
  `id` int NOT NULL,
  `nameUnivers` varchar(60) DEFAULT NULL,
  `idAuthor` int DEFAULT NULL,
  `nt` tinyint DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int NOT NULL,
  `idAuthor` int DEFAULT NULL,
  `nameVehicle` varchar(60) DEFAULT NULL,
  `sizeVehicle` tinyint(1) DEFAULT NULL,
  `typeVehicle` tinyint(1) DEFAULT NULL,
  `dqm` tinyint(1) DEFAULT NULL,
  `dc` tinyint(1) DEFAULT NULL,
  `move` tinyint DEFAULT NULL,
  `fligt` tinyint(1) DEFAULT NULL,
  `stationnaryFligt` tinyint(1) DEFAULT NULL,
  `structurePoint` tinyint DEFAULT NULL,
  `armour` tinyint(1) DEFAULT NULL,
  `point` float DEFAULT NULL,
  `namePicture` varchar(80) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `vehicleLinkSpecialRules`
--

CREATE TABLE `vehicleLinkSpecialRules` (
  `idVehicle` int DEFAULT NULL,
  `idSpecialRules` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `vehicleLinkWeapon`
--

CREATE TABLE `vehicleLinkWeapon` (
  `idVehicle` int NOT NULL,
  `idWeapon` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `weapons`
--

CREATE TABLE `weapons` (
  `id` int NOT NULL,
  `nameWeapon` varchar(60) DEFAULT NULL,
  `idAuthor` int DEFAULT NULL,
  `nt` tinyint DEFAULT NULL,
  `power` tinyint DEFAULT NULL,
  `overPower` tinyint(1) DEFAULT NULL,
  `closeWeapon` tinyint(1) DEFAULT NULL,
  `typeWeapon` tinyint(1) DEFAULT NULL,
  `assault` tinyint(1) DEFAULT NULL,
  `saturation` tinyint(1) DEFAULT NULL,
  `rateOfFire` tinyint DEFAULT NULL,
  `templateType` tinyint(1) DEFAULT NULL,
  `rangeWeapon` tinyint DEFAULT NULL,
  `blastDice` tinyint(1) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `armyList`
--
ALTER TABLE `armyList`
  ADD PRIMARY KEY (`id`),
  ADD KEY `linkFactionArmyList` (`idFaction`);

--
-- Index pour la table `factions`
--
ALTER TABLE `factions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LinkUniversFactions` (`idUnivers`);

--
-- Index pour la table `miniatures`
--
ALTER TABLE `miniatures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialRules`
--
ALTER TABLE `specialRules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `univers`
--
ALTER TABLE `univers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `armyList`
--
ALTER TABLE `armyList`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `factions`
--
ALTER TABLE `factions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `miniatures`
--
ALTER TABLE `miniatures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `specialRules`
--
ALTER TABLE `specialRules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `univers`
--
ALTER TABLE `univers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `armyList`
--
ALTER TABLE `armyList`
  ADD CONSTRAINT `linkFactionArmyList` FOREIGN KEY (`idFaction`) REFERENCES `factions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `factions`
--
ALTER TABLE `factions`
  ADD CONSTRAINT `LinkUniversFactions` FOREIGN KEY (`idUnivers`) REFERENCES `univers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
