-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 19 fév. 2025 à 23:03
-- Version du serveur : 8.0.41-0ubuntu0.24.04.1
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
  `idFaction` int DEFAULT NULL,
  `skirmich` tinyint(1) NOT NULL DEFAULT '0',
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `armyList`
--

INSERT INTO `armyList` (`id`, `nameArmyList`, `idAuthor`, `idFaction`, `skirmich`, `valid`) VALUES
(7, 'Print test', 59, 26, 2, 1),
(9, 'Defend motherland', 59, 37, 2, 1),
(10, 'Armoured platoon', 59, 37, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `armyListLinkMiniature`
--

CREATE TABLE `armyListLinkMiniature` (
  `id` int NOT NULL,
  `idminiature` int DEFAULT NULL,
  `idArmyList` int DEFAULT NULL,
  `nbr` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `armyListLinkMiniature`
--

INSERT INTO `armyListLinkMiniature` (`id`, `idminiature`, `idArmyList`, `nbr`) VALUES
(28, 23, 5, 2),
(31, 15, 7, 12),
(33, 16, 7, 4),
(35, 22, 9, 12),
(36, 22, 10, 6),
(37, 22, 10, 6);

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
  `id` int NOT NULL,
  `idVehicle` int DEFAULT NULL,
  `idArmyList` int DEFAULT NULL,
  `nbr` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `armyListLinkVehicle`
--

INSERT INTO `armyListLinkVehicle` (`id`, `idVehicle`, `idArmyList`, `nbr`) VALUES
(8, 13, 10, 2);

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
(26, 28, 'Aayari network', 59, 1),
(27, 28, 'Crisis troop Scroch', 59, 1),
(36, 30, 'Terran Empire', 59, 1),
(37, 31, 'German', 59, 1),
(39, 30, 'T&#039;au', 59, 1),
(40, 32, 'Empire Esco', 59, 1),
(41, 32, 'Les îles Chambrale', 59, 1);

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
(67, 26),
(72, 26),
(73, 26),
(74, 27),
(83, 27),
(84, 27),
(86, 36),
(90, 36),
(92, 36),
(93, 37),
(75, 27),
(57, 26),
(51, 37),
(99, 37);

-- --------------------------------------------------------

--
-- Structure de la table `miniatureLinkSpecialRules`
--

CREATE TABLE `miniatureLinkSpecialRules` (
  `idMiniature` int DEFAULT NULL,
  `idSpecialRules` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `miniatureLinkSpecialRules`
--

INSERT INTO `miniatureLinkSpecialRules` (`idMiniature`, `idSpecialRules`) VALUES
(17, 42),
(18, 42),
(20, 39),
(16, 42),
(23, 39),
(23, 42);

-- --------------------------------------------------------

--
-- Structure de la table `miniatureLinkWeapons`
--

CREATE TABLE `miniatureLinkWeapons` (
  `idWeapon` int DEFAULT NULL,
  `idminiature` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `miniatureLinkWeapons`
--

INSERT INTO `miniatureLinkWeapons` (`idWeapon`, `idminiature`) VALUES
(67, 15),
(79, 20),
(79, 22),
(84, 17),
(83, 18),
(94, 23),
(95, 23),
(72, 16);

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
  `valid` tinyint(1) DEFAULT '1',
  `stick` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `miniatures`
--

INSERT INTO `miniatures` (`id`, `idAuthor`, `idFaction`, `nameMiniature`, `dc`, `dqm`, `moving`, `fligt`, `stationnaryFligt`, `miniatureSize`, `typeTroop`, `armor`, `healtPoint`, `price`, `namePicture`, `valid`, `stick`) VALUES
(15, 59, 26, 'Guard Shurta', 2, 1, 6, 1, 1, 2, 2, 1, 1, 169.374, 'aBvhl2024terroD6.webp', 1, 2),
(16, 59, 26, 'Guard Muhtasib', 2, 2, 6, 1, 1, 2, 2, 2, 1, 276.301, '646nb2024TerroD10.webp', 1, 2),
(17, 59, 27, 'First lieutnant  Grey team', 4, 3, 6, 1, 1, 2, 4, 3, 1, 1074.73, 'IuYa2024greyTeam.webp', 1, 2),
(18, 59, 27, 'Red Team', 3, 3, 6, 1, 1, 2, 4, 2, 1, 528.91, 'y3R3W2025redTeamD12.jpg', 1, 2),
(21, 59, 36, 'Space Legionnaire', 3, 2, 4, 1, 1, 2, 3, 4, 1, 58.64, 'ENFHP2025LegionnaireBE.webp', 1, 1),
(22, 59, 37, 'Waffen SS / Assault', 3, 3, 6, 1, 1, 2, 5, 3, 1, 647.476, 'Ov1zd2025WaffenSSFM.webp', 1, 2),
(23, 59, 38, 'Martian Warlord', 3, 3, 6, 1, 1, 4, 4, 4, 4, 18267.1, '3yw4F2025martianMachine.webp', 1, 2);

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
(51, 16),
(51, 23),
(51, 27),
(73, 35),
(73, 24),
(73, 27),
(80, 35),
(80, 16),
(81, 35),
(81, 23),
(81, 16),
(82, 35),
(82, 16),
(82, 27),
(80, 27),
(81, 27),
(79, 26),
(67, 25),
(72, 25),
(74, 31),
(83, 29),
(83, 25),
(84, 35),
(84, 23),
(86, 26),
(89, 18),
(90, 31),
(92, 16),
(92, 27),
(92, 23),
(93, 25),
(94, 31),
(94, 28),
(95, 25),
(98, 27),
(97, 15),
(99, 69),
(99, 24),
(99, 25),
(99, 26);

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
(34, 1, 'Spotter', 'Sur un jet de DQM à 4+, le spotter donne à une figurine allié à moins de 3 pouces de son socle les avantages suivant :  +1 sur le ou les dés de puissance de l&#039;arme du tireur. Il double les dommages en cas de tir réussit.', 0.5, 1),
(35, 0, 'Bipod', 'Lors d&#039;un tir immobile (couverture ou tir ajusté) le bipod donne un +1 au dé de puissance de l&#039;arme.', 0.2, 1),
(36, 1, 'Combat au contact', 'Cette règle spéciale permet de se battre en mêlée même sans arme avec 1D (DC) sur un 4+.', 0.1, 1),
(37, 1, 'Equiper d&#039;un bouclier', 'Toucher une figurine avec un bouclier se fait sur une base de 5+.', 0.1, 1),
(38, 1, 'Camo', 'Une figurine avec la capacité spéciale « camouflage » n’a jamais le malus lier à l’immobilité quand elle est prise pour cible.', 0.5, 1),
(39, 1, 'Champs de force', 'Un champs de force détourne la puissance des tirs ou les projectiles dans un court rayon atour d&#039;une figurine. Les tir subissent un malus de -2 à leur dé.', 0.5, 1),
(40, 1, 'Discretion', 'Lorsque la figurine avec la règle spécial Discrétion opère à plus de 4 pouces de l’importe quelles figurines (de son groupe ou autre) elle gagne un malus quand elle est visé de -2 en raison de sa grande capacité à se fondre dans le décor.', 0.15, 1),
(41, 1, 'Opérateur armes lourde', 'Capacité de se mouvoir et utiliser une arme lourde sous l&#039;ordre &quot;mouvement tactique&quot;.', 0.75, 1),
(42, 1, 'Smart google', 'Rend la portée maximal de l’arme en combat nocturne.', 0.05, 1),
(43, 1, 'Tireur d&#039;élite', '+1 au dé de puissance des armes de tir qu&#039;utilise cette figurine.', 0.2, 1),
(44, 2, 'Blindage Chobham', 'Plusieurs couche de matériaux résistant et capable d&#039;absorber les ondes de choc d&#039;une arme anti-véhicule combiné ensemble donne un +1 au dé de sauvegarde du véhicule.', 0.1, 1),
(45, 2, 'Blindage céramique', 'Le blindage céramique annule l’effet ++ de toute les armes contre le véhicule.', 0.05, 1),
(46, 2, 'Blindage nano-tube de carbone', 'À la fois léger et robuste, les coques des blindés recouverte de nanotube de carbone sont capable d’encaisser les chocs des armes avec bien plus de faciliter. Les dommage subit sont divisé de moitié.', 0.2, 1),
(47, 2, 'Générateur de champs', 'Les dommages sont minimiser par un champs de force. Les sauvegarde échoue contre un véhicule sont relancer une fois pour confirmer les dommages subit.', 0.5, 1),
(48, 2, 'Phare et projecteur', 'Un phare ou plusieurs peuvent être monté sur un véhicule. Il permet de redonner au armes de tir leur portée maximal en cas de condition dégradé (mauvais temps, combat nocturne).', 0.05, 1),
(49, 2, 'Pod de contre-mesure électronique', 'Un véhicule avec un pod de contre-mesure électronique est plus difficile à toucher. Donne au tireur un malus de -1 pour toucher une cible équipé d&#039;un pod de contre-mesure.', 0.1, 1),
(50, 2, 'Prédicateur de trajectoire', 'Donne +1 au tireur.', 0.2, 1),
(51, 2, 'Radar de ciblage haute performance', 'Lors d’un tir en lobe, inutile d’avoir une unité qui éclaire la cible, la difficulté est toujours sur une base de 4+. On prend en compte les couvertes sans la règles de trois couvert qui rendent invisible une unité. Ne fonctionne que pour les armes dotées de l’option « tir en lobe » monté sur un véhicule.', 0.5, 1),
(52, 2, 'Système de communication', 'Le système de communication permet au véhicule de contacter toute les figurines sur le terrain. Tant que ce véhicule est en fonctionnement, le camps gagne lors du jet d&#039;initiative à chaque début de tour, un +1 sur son jet de DQM.', 0.05, 1),
(53, 2, 'Système de visée Infra-rouge', 'Dans les combats nocturne, redonne la portée maximal des armes et un +1 à la visé lors d&#039;un tir, nocturne ou non.', 0.15, 1),
(54, 2, 'Viseur tête haute', 'Élimine le malus pour tirer sur une cible en mouvement tactique.', 0.15, 1),
(55, 2, 'Moteur gonflé', 'Ajouter au mouvement tactique, +1D6 pouces de mouvement.\r\nAttention, sur 6, avancer de +6&quot; de mouvement et relancer votre jet. Si c&#039;est encore un 6 le moteur explose et le véhicule est immobiliser jusque la fin du combat. Dans le cadre d&#039;un véhicule volant, il est hors combat et quitte la zone.', 0.1, 1),
(56, 2, 'Camouflage', 'Le système de camouflage donne au véhicule un malus de -2 quand il est pris pour cible, si il est immobile. Le camouflage d&#039;un véhicule en mouvement ne fonctionne pas et donc, ne donne pas de malus quand il est pris pour cible.', 0.2, 1),
(57, 2, 'Véhicule de commandement', 'Le véhicule de commandement confère un +2 à son DQM pour tous ces jets.', 0.15, 1),
(58, 2, 'IA de combat Level 1', 'Une IA de combat level 1 donne un +1 au DC du véhicule.', 0.15, 1),
(59, 2, 'IA de combat level 2', 'Une IA de combat level 2, donne un +1 au DC et un +1 au DQM du véhicule.', 0.5, 1),
(60, 2, 'IA de combat level 3', 'Une IA de combat level 3 donne une relance du DQM du véhicule.', 0.75, 1),
(61, 2, 'IA de combat level 4', 'Une IA de combat level 4 donne une relance de son DC.', 1, 1),
(62, 2, '1 Passager', 'Le véhicule accepte un passager avec tous son équipement de combat.', 0.05, 1),
(63, 2, '4 passager', 'Le véhicule accepte jusque 4 passager avec leurs équipement de combat.', 0.1, 1),
(64, 2, '6 passagers', 'Le véhicule accepte jusque 6 passager avec leurs équipement de combat.', 0.15, 1),
(65, 2, '12 passagers', 'Le véhicule accepte jusque 12 passagers avec leurs équipement de combat.', 0.2, 1),
(66, 2, '24 passagers', 'Le véhicule accepte jusque 24 passager avec leurs équipement de combat.', 0.5, 1),
(67, 2, '36 passagers', 'Le véhicule accepte jusque 36 passager avec leurs équipement de combat.', 0.75, 1),
(68, 2, '50 passagers', 'Le véhicule accepte jusque 50 passagers avec leurs équipement de combat.', 1, 1),
(69, 0, 'Anti-véhicule', 'Ces armes sont capable d&#039;endommager des véhicules de type militaire.', 0.1, 1),
(70, 1, 'Spécialiste', 'Un figurine spécialiste, va doubler ces dommages sur le maximum de son DC lors d&#039;une action de combat.', 1, 1);

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
(28, 'BP - Red earth', 59, 9, 1),
(30, 'Warhammer 35K', 59, 14, 1),
(31, 'WWII - Warrior from mars', 59, 7, 1),
(32, 'Les royaumesd&#039;Esco', 59, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int NOT NULL,
  `idAuthor` int DEFAULT NULL,
  `nameVehicle` varchar(60) DEFAULT NULL,
  `idFaction` int NOT NULL,
  `sizeVehicle` tinyint(1) DEFAULT NULL,
  `typeVehicle` tinyint(1) DEFAULT NULL,
  `dqm` tinyint(1) DEFAULT NULL,
  `dc` tinyint(1) DEFAULT NULL,
  `moving` tinyint DEFAULT NULL,
  `fligt` tinyint(1) DEFAULT NULL,
  `stationnaryFligt` tinyint(1) DEFAULT NULL,
  `structurePoint` tinyint DEFAULT NULL,
  `armor` tinyint(1) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `namePicture` varchar(80) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '1',
  `fix` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`id`, `idAuthor`, `nameVehicle`, `idFaction`, `sizeVehicle`, `typeVehicle`, `dqm`, `dc`, `moving`, `fligt`, `stationnaryFligt`, `structurePoint`, `armor`, `price`, `namePicture`, `valid`, `fix`) VALUES
(2, 59, 'Leman Russ 3', 36, 2, 2, 2, 3, 9, 1, 1, 7, 3, 116119, 'VrY7ae22025LemanRuss.webp', 1, 3),
(11, 59, 'Pompom of Hell', 26, 1, 2, 4, 4, 18, 2, 2, 10, 6, 10371400, 'VOzVgNS2025pompomOfHell.webp', 1, 3),
(12, 59, 'Martian Warlord', 38, 4, 2, 3, 3, 6, 1, 1, 4, 4, 202624, 'VGSI6432025martianMachine.webp', 1, 3),
(13, 59, 'Tigre II IR', 37, 2, 2, 3, 3, 8, 1, 1, 7, 5, 101205, 'VfxfQDD2025pantherTigreII.webp', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `vehicleLinkSpecialRules`
--

CREATE TABLE `vehicleLinkSpecialRules` (
  `idVehicle` int DEFAULT NULL,
  `idSpecialRules` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vehicleLinkSpecialRules`
--

INSERT INTO `vehicleLinkSpecialRules` (`idVehicle`, `idSpecialRules`) VALUES
(6, 47),
(11, 68),
(11, 61),
(11, 44),
(2, 44),
(12, 59),
(12, 53),
(12, 47),
(13, 53);

-- --------------------------------------------------------

--
-- Structure de la table `vehicleLinkWeapon`
--

CREATE TABLE `vehicleLinkWeapon` (
  `idVehicle` int NOT NULL,
  `idWeapon` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vehicleLinkWeapon`
--

INSERT INTO `vehicleLinkWeapon` (`idVehicle`, `idWeapon`) VALUES
(8, 79),
(8, 78),
(7, 82),
(7, 91),
(11, 89),
(11, 82),
(2, 90),
(2, 92),
(12, 94),
(12, 95),
(13, 99),
(13, 51);

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
(51, 'MG42', 59, NULL, 2, 1, 1, 1, 0, 1, 6, 0, 32, 0, 0, 10.604, 1, 1, 0),
(57, 'Dague', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(67, 'AK-12', 59, NULL, 1, 0, 1, 0, 1, 1, 2, 0, 18, 0, 0, 6.457, 1, 1, 0),
(72, 'QBZ-191', 59, NULL, 1, 0, 1, 0, 0, 1, 1, 0, 24, 0, 0, 6.291, 1, 1, 0),
(73, 'QJB-201', 59, NULL, 0, 0, 1, 0, 0, 1, 4, 0, 32, 0, 0, 6.569, 1, 1, 0),
(74, 'K-Bar', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.85, 1, 1, 0),
(75, 'Dague', 59, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 0),
(76, 'Couteau', 58, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.1, 1, 1, 1),
(77, 'Pistolet', 58, NULL, 0, 0, 1, 0, 1, 0, 1, 0, 6, 0, 0, 3.325, 1, 1, 1),
(78, 'Rifle', 58, NULL, 0, 0, 1, 0, 1, 0, 1, 0, 24, 0, 0, 4.711, 1, 1, 1),
(79, 'Assault rifle', 58, NULL, 1, 0, 1, 0, 1, 1, 2, 0, 18, 0, 0, 6.757, 1, 1, 1),
(80, 'LMG', 58, NULL, 2, 0, 1, 0, 0, 1, 3, 0, 36, 0, 0, 9.044, 1, 1, 1),
(81, 'MMG', 58, NULL, 2, 1, 1, 0, 0, 1, 3, 0, 38, 0, 0, 15.238, 1, 1, 1),
(82, 'HMG', 58, NULL, 4, 0, 1, 1, 0, 1, 4, 0, 48, 0, 0, 13.505, 1, 1, 1),
(83, 'AR-15', 59, NULL, 1, 0, 1, 0, 1, 1, 2, 0, 24, 0, 0, 6.945, 1, 1, 0),
(84, 'M249', 59, NULL, 2, 0, 1, 1, 0, 1, 6, 0, 36, 0, 0, 10.304, 1, 1, 0),
(86, 'Ar-35k', 59, NULL, 1, 1, 1, 0, 1, 1, 2, 0, 28, 0, 0, 11.069, 1, 1, 0),
(89, 'Lance flamme', 58, NULL, 0, 0, 2, 0, 0, 0, 1, 3, 0, 2, 0, 7.583, 1, 1, 1),
(90, '95mm AG-AT', 59, NULL, 0, 1, 1, 1, 0, 0, 1, 0, 72, 0, 0, 8.41, 1, 1, 0),
(92, 'Bolter lourd', 59, NULL, 2, 1, 1, 1, 0, 1, 4, 0, 34, 0, 0, 15.62, 1, 1, 0),
(93, 'StG 44', 59, NULL, 1, 1, 1, 0, 1, 1, 3, 0, 18, 0, 0, 10.66, 1, 1, 0),
(94, 'Heavy-LazGun', 59, NULL, 2, 1, 1, 1, 0, 0, 1, 0, 38, 0, 0, 14.021, 1, 1, 0),
(95, 'Double LazGun', 59, NULL, 1, 0, 1, 0, 1, 1, 4, 0, 24, 0, 0, 7.411, 1, 1, 0),
(96, 'Epée', 58, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2.75, 1, 1, 1),
(97, 'Epée à 2 mains', 58, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2.25, 1, 1, 1),
(98, 'Cimeterre', 58, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2.35, 1, 1, 1),
(99, 'PzGrPatr 40/42', 59, NULL, 0, 1, 1, 1, 0, 0, 1, 0, 74, 0, 0, 8.537, 1, 1, 0);

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
-- Index pour la table `armyListLinkMiniature`
--
ALTER TABLE `armyListLinkMiniature`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `armyListLinkVehicle`
--
ALTER TABLE `armyListLinkVehicle`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `linkVehicleFaction` (`idFaction`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `armyListLinkMiniature`
--
ALTER TABLE `armyListLinkMiniature`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `armyListLinkVehicle`
--
ALTER TABLE `armyListLinkVehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `factions`
--
ALTER TABLE `factions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `miniatures`
--
ALTER TABLE `miniatures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `specialRules`
--
ALTER TABLE `specialRules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `univers`
--
ALTER TABLE `univers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
-- Contraintes pour la table `specialeRulesLinkWeapon`
--
ALTER TABLE `specialeRulesLinkWeapon`
  ADD CONSTRAINT `LinkSR` FOREIGN KEY (`idSpecialRules`) REFERENCES `specialRules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LinkWeapon` FOREIGN KEY (`idWeapon`) REFERENCES `weapons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
