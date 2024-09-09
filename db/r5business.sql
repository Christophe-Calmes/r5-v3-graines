-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 09 sep. 2024 à 13:03
-- Version du serveur : 8.0.39-0ubuntu0.24.04.2
-- Version de PHP : 8.3.6

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
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `factions`
--

INSERT INTO `factions` (`id`, `idUnivers`, `nomFaction`, `idAuthor`, `valid`) VALUES
(12, 21, 'Imperium', 59, 1),
(13, 21, 'Space Pirate', 59, 1),
(14, 21, 'United Nation T&#039;au System', 59, 1),
(15, 22, 'USA', 59, 1),
(16, 22, 'Germany', 59, 1),
(22, 26, 'Gugu - 85', 59, 1),
(23, 26, 'Tutu - 45', 59, 1);

-- --------------------------------------------------------

--
-- Structure de la table `factionsLinkWeapon`
--

CREATE TABLE `factionsLinkWeapon` (
  `idWeapon` int DEFAULT NULL,
  `idFaction` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `factionsLinkWeapon`
--

INSERT INTO `factionsLinkWeapon` (`idWeapon`, `idFaction`) VALUES
(53, 12),
(54, 13),
(55, 14),
(56, 15),
(57, 16),
(58, 15),
(59, 15);

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
  `idFaction` int NOT NULL,
  `nameMiniature` varchar(60) DEFAULT NULL,
  `dc` tinyint(1) DEFAULT NULL,
  `dqm` tinyint(1) DEFAULT NULL,
  `moving` tinyint DEFAULT NULL,
  `fligt` tinyint(1) DEFAULT NULL,
  `stationnaryFligt` tinyint(1) DEFAULT NULL,
  `miniatureSize` tinyint(1) DEFAULT NULL,
  `typeTroop` tinyint DEFAULT NULL,
  `armor` tinyint(1) DEFAULT NULL,
  `healtPoint` tinyint DEFAULT NULL,
  `price` float DEFAULT NULL,
  `namePicture` varchar(80) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `specialeRulesLinkWeapon`
--

CREATE TABLE `specialeRulesLinkWeapon` (
  `idWeapon` int DEFAULT NULL,
  `idSpecialRules` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `specialeRulesLinkWeapon`
--

INSERT INTO `specialeRulesLinkWeapon` (`idWeapon`, `idSpecialRules`) VALUES
(38, 16),
(40, 30),
(42, 16),
(46, 27),
(47, 26),
(49, 24),
(49, 16),
(50, 22),
(51, 16),
(51, 23),
(51, 27),
(55, 16),
(59, 16);

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
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `specialRules`
--

INSERT INTO `specialRules` (`id`, `typeSpecialRules`, `nameSpecialRules`, `descriptionSpecialRules`, `price`, `valid`) VALUES
(15, 0, 'Allonge', 'Lorsque la figurine charge ou qu&#039;elle est chargée, l&#039;allonge de l&#039;arme passe automatiquement à une attaque avec une base de 6+. Les modificateurs des combats en mêlée s&#039;appliquent normalement.', 0.1, 1),
(16, 0, 'Perce armure', 'Cette arme donne -1 au dé de sauvegarde de la cible d&#039;une touche de l&#039;arme.', 0.1, 1),
(17, 0, 'Choc', 'Une arme de choc fait reculer une cible de 1d4&quot; par rapport à la direction de frappe de l&#039;arme en plus des dommages normalement associé. La cible doit faire un jet de DQM pour éviter un statue &quot;Tête baissé&quot;.\r\nNe fonctionne pas sur les véhicules.', 0.2, 1),
(18, 0, 'Enflammé', 'L’effet enflammé oblige une figurine enflammée à faire une sauvegarde à la fin du tour. Si elle échoue, elle perd un point de vie. Si elle réussit, les flammes sont éteintes. Le test se fait jusqu’à ce que la figurine arrive à 0 point de vie / structure ou qu’elle réussisse sa sauvegarde et que le feu soit éteint. Ajouter le pion « enflammé » à côté de chaque figurine subissant les effets d’une arme « enflammé ».', 0.15, 1),
(19, 0, 'Petit fumigène', 'Un petit gabarit de fumigène est générer là où touche l&#039;arme, durant 1d4 tour.\r\nLes fumigène bloque les lignes de vue qui les traversent.\r\nImpossible de charger au travers d&#039;une zone de fumigène.', 0.05, 1),
(20, 0, 'Moyen fumigène', 'Un moyen gabarit de fumigène est générer là où touche l&#039;arme, durant 1d4 tour.\r\nLes fumigène bloque les lignes de vue qui les traversent.\r\nImpossible de charger au travers d&#039;une zone de fumigène.', 0.1, 1),
(21, 0, 'Grand fumigène', 'Un grand gabarit de fumigène est générer là où touche l&#039;arme, durant 1d4 tour.\r\nLes fumigène bloque les lignes de vue qui les traversent.\r\nImpossible de charger au travers d&#039;une zone de fumigène.', 0.15, 1),
(22, 0, 'Crosse rétractable', 'L&#039;arme est très efficace en combat au contact et gagne un ++ à son ou ces dés de puissance.', 0.2, 1),
(23, 0, 'Gros calibre', 'Annulation du bonus de couvert léger qui protège une cible.', 0.2, 1),
(24, 0, 'Lunette de visée', 'Le tireur a +1 pour viser une cible immobile.', 0.05, 1),
(25, 0, 'Viseur holographique', 'Les unités qui se déplace en &quot;mouvement tactique&quot; ne bénéficie pas du malus de -1 quand elles sont prise pour cible.', 0.2, 1),
(26, 0, 'Visée sûre', 'L&#039;arme donne un +1 à tous les dé de puissance de l&#039;arme.', 0.5, 1),
(27, 0, 'Rafale', 'Une rafale permet de distribuer les dé de puissance qui touchent sur plusieurs cibles éloigné maximum de 2 pouces les unes les autres.', 0.2, 1),
(28, 0, 'Surprise', 'Une arme surprise, en plus des dommages associée fait pour la cible de celle-ci faire un jet de DQM à 6+ sur un échec, c&#039;est toute l&#039;unité de la cible qui passe en statue &quot;Tête baissée&quot;.', 0.75, 1),
(29, 0, 'Pointeur laser', 'Un pointeur laser permet d&#039;obtenir un bonus de +1 pour les tirs dont la cible est à 12 pouces ou moins.', 0.2, 1),
(30, 0, 'Tir en lobe', 'Le tir en lobe permet de doubler la distance de la portée d’une arme.\r\nLa difficulté est de 6+ si il y a une ligne de vue directe et de 8+ si il n&#039;y a pas de ligne de vue direct.', 0.5, 1),
(31, 0, 'Arme dévastatrice', 'Chaque touche valider engendre 2 jets de sauvegarde réussit pour être absorber au lieu d&#039;un seul.', 0.75, 1),
(32, 0, 'Arme perforante', 'Un touche avec une arme perforante donne un malus de -2 au jet de sauvegarde.', 0.5, 1),
(33, 0, 'Enflammé', 'L’effet enflammé oblige une figurine enflammée à faire une sauvegarde à la fin du tour. Si elle échoue, elle perd un point de vie. Si elle réussit, les flammes sont éteintes. Le test se fait jusqu’à ce que la figurine arrive à 0 point de vie / structure ou qu’elle réussisse sa sauvegarde et que le feu soit éteint. Ajouter le pion « enflammé » à côté de chaque figurine subissant les effets d’une arme « enflammé ».', 0.15, 1),
(34, 1, 'Spotter', 'Sur un jet de DQM à 4+, le spotter donne à une figurine allié à moins de 3 pouces de son socle les avantages suivant :  +3 sur son dé de tir pour le reste du tour et +2 sur les dommages si le tir réussit.', 0.2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `univers`
--

CREATE TABLE `univers` (
  `id` int NOT NULL,
  `nameUnivers` varchar(60) DEFAULT NULL,
  `idAuthor` int DEFAULT NULL,
  `nt` tinyint DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `univers`
--

INSERT INTO `univers` (`id`, `nameUnivers`, `idAuthor`, `nt`, `valid`) VALUES
(21, 'Warhammer 30K', 59, 14, 1),
(22, 'WWII', 59, 7, 1),
(26, 'Test no faction', 59, 8, 1);

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
  `typeWeapon` tinyint(1) DEFAULT NULL,
  `heavy` tinyint(1) NOT NULL,
  `assault` tinyint(1) DEFAULT '0',
  `saturation` tinyint(1) DEFAULT '0',
  `rateOfFire` tinyint DEFAULT '0',
  `templateType` tinyint(1) DEFAULT '0',
  `rangeWeapon` tinyint DEFAULT '0',
  `blastDice` tinyint(1) DEFAULT '0',
  `spell` tinyint(1) NOT NULL DEFAULT '0',
  `price` float DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '1',
  `fixe` tinyint(1) NOT NULL DEFAULT '0',
  `globalWeapon` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `weapons`
--

INSERT INTO `weapons` (`id`, `nameWeapon`, `idAuthor`, `nt`, `power`, `overPower`, `typeWeapon`, `heavy`, `assault`, `saturation`, `rateOfFire`, `templateType`, `rangeWeapon`, `blastDice`, `spell`, `price`, `valid`, `fixe`, `globalWeapon`) VALUES
(38, 'K-barr', 58, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.2, 1, 0, 1),
(39, 'Glock17', 58, NULL, 0, 0, 1, 0, 1, 0, 1, 0, 12, 0, 0, 3.768, 1, 1, 1),
(40, 'Lance grenade', 58, NULL, 0, 0, 2, 0, 0, 0, 1, 1, 20, 4, 0, 8.679, 1, 1, 1),
(41, 'Kikoup', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(42, 'Kalibr&#039;', 59, NULL, 1, 0, 1, 0, 1, 1, 3, 0, 16, 0, 0, 5.598, 1, 1, 0),
(43, 'Lance flamme léger', 59, NULL, 0, 1, 2, 0, 0, 0, 1, 3, 0, 2, 0, 7.843, 1, 1, 0),
(45, 'Couteau de Combat', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(46, 'Thompson PM / M1', 59, NULL, 1, 0, 1, 0, 1, 1, 3, 0, 16, 0, 0, 5.698, 1, 1, 0),
(47, 'M1 Garand', 59, NULL, 0, 0, 1, 0, 1, 0, 1, 0, 22, 0, 0, 4.874, 1, 0, 0),
(48, 'Walther G43', 59, NULL, 0, 0, 1, 0, 1, 0, 1, 0, 22, 0, 0, 4.374, 1, 1, 0),
(49, 'Walther G43 / Lunette', 59, NULL, 0, 0, 1, 0, 0, 0, 1, 0, 40, 0, 0, 5.022, 1, 1, 0),
(50, 'MP40', 59, NULL, 1, 0, 1, 0, 1, 1, 2, 0, 18, 0, 0, 5.732, 1, 1, 0),
(51, 'MG42', 59, NULL, 2, 1, 1, 1, 0, 1, 6, 0, 32, 0, 0, 10.604, 1, 1, 0),
(52, 'Couteau de combat', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(53, 'Baïonette', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(54, 'Kikoup', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(55, 'Shalkan', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.2, 1, 1, 0),
(56, 'K-Barr', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 0, 0),
(57, 'Dague', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 0, 0),
(58, 'Colt 1911', 59, NULL, 0, 0, 1, 0, 1, 0, 1, 0, 12, 0, 0, 3.768, 1, 0, 0),
(59, 'Grenade frag', 59, NULL, 0, 0, 2, 0, 0, 0, 1, 1, 10, 2, 0, 1.2, 1, 0, 0);

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
-- Index pour la table `factionsLinkWeapon`
--
ALTER TABLE `factionsLinkWeapon`
  ADD KEY `linkFactionWeapon` (`idFaction`),
  ADD KEY `linkWeaponFaction` (`idWeapon`);

--
-- Index pour la table `miniatures`
--
ALTER TABLE `miniatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `linkFactionMiniature` (`idFaction`);

--
-- Index pour la table `specialeRulesLinkWeapon`
--
ALTER TABLE `specialeRulesLinkWeapon`
  ADD KEY `LinkWeapon` (`idWeapon`),
  ADD KEY `LinkSR` (`idSpecialRules`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `miniatures`
--
ALTER TABLE `miniatures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `specialRules`
--
ALTER TABLE `specialRules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `univers`
--
ALTER TABLE `univers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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

--
-- Contraintes pour la table `factionsLinkWeapon`
--
ALTER TABLE `factionsLinkWeapon`
  ADD CONSTRAINT `linkFactionWeapon` FOREIGN KEY (`idFaction`) REFERENCES `factions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `linkWeaponFaction` FOREIGN KEY (`idWeapon`) REFERENCES `weapons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `miniatures`
--
ALTER TABLE `miniatures`
  ADD CONSTRAINT `linkFactionMiniature` FOREIGN KEY (`idFaction`) REFERENCES `factions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `specialeRulesLinkWeapon`
--
ALTER TABLE `specialeRulesLinkWeapon`
  ADD CONSTRAINT `LinkSR` FOREIGN KEY (`idSpecialRules`) REFERENCES `specialRules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LinkWeapon` FOREIGN KEY (`idWeapon`) REFERENCES `weapons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
