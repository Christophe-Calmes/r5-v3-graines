-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 03 mars 2025 à 10:37
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
-- Base de données : `xgyd0647_techr5`
--

-- --------------------------------------------------------

--
-- Structure de la table `banIP`
--

CREATE TABLE `banIP` (
  `id` int NOT NULL,
  `BanIP` varchar(60) NOT NULL,
  `dateCreat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `dataSite`
--

CREATE TABLE `dataSite` (
  `idDataSite` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sousTitre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titreHTML` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dataSite`
--

INSERT INTO `dataSite` (`idDataSite`, `titre`, `sousTitre`, `description`, `titreHTML`) VALUES
(1, 'R5 - V3', 'Le jeux de figurines recyclées', 'jeux de figurines, recyclé, écologique, règles gratuite', 'Projet R5');

-- --------------------------------------------------------

--
-- Structure de la table `journaux`
--

CREATE TABLE `journaux` (
  `idConnexion` int NOT NULL,
  `ipUser` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `mdpHacker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `dateHeure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `okConnexion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `journaux`
--

INSERT INTO `journaux` (`idConnexion`, `ipUser`, `idUser`, `login`, `mdpHacker`, `dateHeure`, `okConnexion`) VALUES
(1, '::1', 59, 'Aresh', '0', '2025-02-26 10:14:02', 1),
(2, '::1', 1, 'Admin', '0', '2025-02-26 16:52:50', 1),
(3, '::1', 59, 'Aresh', '0', '2025-02-26 16:53:35', 1),
(4, '::1', 59, 'Aresh', '0', '2025-02-26 16:56:12', 1),
(5, '::1', 59, 'Aresh', '0', '2025-02-26 16:58:16', 1),
(6, '::1', 1, 'Admin', '0', '2025-02-26 17:12:22', 1),
(7, '::1', 58, 'Gestionnaire', '0', '2025-02-26 17:13:37', 1),
(8, '::1', 58, 'Gestionnaire', '0', '2025-02-27 09:30:24', 1),
(9, '::1', 1, 'Admin', '0', '2025-02-27 10:33:44', 1),
(10, '::1', 58, 'Gestionnaire', '0', '2025-02-27 10:36:15', 1),
(11, '::1', 58, 'Gestionnaire', '0', '2025-02-27 17:43:37', 1),
(12, '::1', 59, 'Aresh', '0', '2025-02-27 18:12:59', 1),
(13, '::1', 1, 'Admin', '0', '2025-02-27 18:13:58', 1),
(14, '::1', 58, 'Gestionnaire', '0', '2025-02-27 18:14:52', 1),
(15, '::1', 1, 'Admin', '0', '2025-02-27 18:15:46', 1),
(16, '::1', 58, 'Gestionnaire', '0', '2025-02-27 18:28:18', 1),
(17, '::1', 58, 'Gestionnaire', '0', '2025-02-27 19:46:48', 1),
(18, '::1', 58, 'Gestionnaire', '0', '2025-02-27 23:14:51', 1),
(19, '::1', 1, 'Admin', '0', '2025-02-27 23:17:13', 1),
(20, '::1', 58, 'Gestionnaire', '0', '2025-02-27 23:20:37', 1),
(21, '::1', 58, 'Gestionnaire', '0', '2025-02-28 00:46:37', 1),
(22, '::1', 1, 'Admin', '0', '2025-02-28 01:29:23', 1),
(23, '::1', 1, 'Admin', '0', '2025-02-28 01:37:47', 1),
(24, '::1', 1, 'Admin', '0', '2025-02-28 01:44:10', 1),
(25, '::1', 1, 'Admin', '0', '2025-02-28 01:48:11', 1),
(26, '::1', 1, 'Admin', '0', '2025-02-28 01:51:16', 1),
(27, '::1', 59, 'Aresh', '0', '2025-02-28 01:51:23', 1),
(28, '::1', 58, 'Gestionnaire', '0', '2025-02-28 01:51:41', 1),
(29, '::1', 1, 'Admin', '0', '2025-02-28 01:52:05', 1),
(30, '::1', 59, 'Aresh', '0', '2025-02-28 01:52:35', 1),
(31, '::1', 58, 'Gestionnaire', '0', '2025-02-28 01:52:44', 1),
(32, '::1', 58, 'Gestionnaire', '0', '2025-02-28 09:34:24', 1),
(33, '::1', 1, 'Admin', '0', '2025-02-28 10:30:09', 1),
(34, '::1', 58, 'Gestionnaire', '0', '2025-02-28 16:30:59', 1),
(35, '::1', 58, 'Gestionnaire', '0', '2025-03-01 18:02:00', 1),
(36, '::1', 58, 'Gestionnaire', '0', '2025-03-02 14:40:18', 1),
(37, '::1', 1, 'Admin', '0', '2025-03-02 14:42:46', 1),
(38, '::1', 58, 'Gestionnaire', '0', '2025-03-02 14:44:02', 1),
(39, '::1', 59, 'Aresh', '0', '2025-03-02 15:45:15', 1),
(40, '::1', 58, 'Gestionnaire', '0', '2025-03-02 19:49:00', 1),
(41, '::1', 1, 'Admin', '0', '2025-03-02 19:54:26', 1),
(42, '::1', 58, 'Gestionnaire', '0', '2025-03-03 09:11:08', 1),
(43, '::1', 1, 'Admin', '0', '2025-03-03 09:12:00', 1),
(44, '::1', 58, 'Gestionnaire', '0', '2025-03-03 09:14:01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `menuNav`
--

CREATE TABLE `menuNav` (
  `idMenuDeroulant` int NOT NULL,
  `titreMenu` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menuNav`
--

INSERT INTO `menuNav` (`idMenuDeroulant`, `titreMenu`) VALUES
(1, 'Administration du site'),
(6, 'Administration User'),
(12, 'News'),
(13, 'Admin Evenements'),
(15, 'Evenements'),
(16, 'Admin Réserver tables'),
(17, 'Reservations'),
(20, 'Firewall'),
(21, 'Univers'),
(22, 'Special rules'),
(23, 'Special rules membre'),
(24, 'Weapon Gestionnaire'),
(25, 'Weapons Membre'),
(26, 'miniatures'),
(27, 'Vehicles'),
(28, 'Compagnies'),
(29, 'Admin blog');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `module` varchar(30) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `module`, `valide`) VALUES
(1, 'Graines', 1),
(9, 'univers', 1),
(10, 'Factions', 1),
(11, 'Special Rules', 1),
(12, 'Weapons', 1),
(13, 'Miniatures', 1),
(14, 'vehicles', 1),
(15, 'armyList', 1),
(16, 'Blog', 1);

-- --------------------------------------------------------

--
-- Structure de la table `navigation`
--

CREATE TABLE `navigation` (
  `idNav` int NOT NULL,
  `nomNav` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cheminNav` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `menuVisible` tinyint(1) NOT NULL,
  `zoneMenu` int NOT NULL,
  `ordre` tinyint NOT NULL,
  `niveau` tinyint(1) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `deroulant` tinyint NOT NULL DEFAULT '0',
  `targetRoute` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `idModule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `navigation`
--

INSERT INTO `navigation` (`idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`, `idModule`) VALUES
(72, 'connexion', 'modules/connexion/connexion.php', 1, 0, 10, 0, 1, 0, '8115637472316835', 1),
(73, 'inscription', 'modules/users/inscription.php', 0, 0, 0, 0, 1, 0, '4427443426545', 1),
(74, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 2, 1, 0, '98955486766', 1),
(75, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 1, 1, 0, '11662169526164', 1),
(76, 'Administration du site', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 1, '55115544685', 1),
(77, 'Ajout lien de nav', 'modules/navigation/menuAdmin/creationNouveuMenu.php', 1, 1, 1, 2, 1, 0, '5681514976767', 1),
(78, 'Titres et SEO', 'modules/dataSite/titreInfo.php', 1, 1, 2, 2, 1, 0, '5686859414440', 1),
(81, 'Brassage des liens', 'modules/navigation/menuAdmin/dynamique.php', 1, 1, 2, 2, 1, 0, '6164478184413185', 1),
(82, 'Ajout menu déroulant', 'modules/navigation/menuAdmin/ajoutMenuDeroulant.php', 1, 1, 2, 2, 1, 1, '7533563623516894', 1),
(85, 'Administration User', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 6, '365410550445', 1),
(86, 'Users Actif', 'modules/users/administration/droitUser.php', 1, 6, 1, 2, 1, 6, '589126694019', 1),
(87, 'Route Form', 'modules/navigation/menuAdmin/ajoutRouteForm.php', 1, 1, 2, 2, 1, 0, '15906465627969', 1),
(88, 'Users Anciens ', 'modules/users/administration/droitUserNonValide.php', 1, 6, 2, 2, 1, 0, '607516636674', 1),
(89, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 1, 1, 0, '307414435560642', 1),
(90, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 1, 2, 1, 0, '1748406274441', 1),
(91, 'Journeaux de log', 'modules/journaux/journaux.php', 1, 20, 1, 2, 1, 0, '1927314512', 1),
(92, 'Admin nav', 'modules/navigation/menuAdmin/adminMenu.php', 1, 1, 2, 2, 1, 0, '01671655102', 1),
(93, 'modification lien nav', 'modules/navigation/menuAdmin/modificationNav.php', 0, 0, 0, 2, 1, 0, '554646861628846', 1),
(95, 'Admin modules', 'modules/navigation/menuAdmin/administrationModules.php', 1, 1, 7, 2, 1, 1, '433625450215', 1),
(99, 'Add roles', 'modules/users/administration/addRole.php', 1, 6, 3, 2, 0, 0, '07235456649081059126', 1),
(100, 'Deco', 'modules/securiter/deconnexion.php', 1, 0, 20, 3, 1, 0, '61437620881', 1),
(101, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 3, 1, 0, '811359615657566', 1),
(104, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '5841545475941', 1),
(136, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 0, 1, 0, '6004478660997940', 1),
(137, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '145887415636154', 1),
(138, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 3, 1, 0, '36034669822', 1),
(140, 'Lost Password', 'modules/users/administration/lostPassword.php', 0, 0, 0, 0, 1, 0, '117554256971255', 1),
(141, 'Inscription', 'modules/users/inscription.php', 1, 0, 1, 0, 0, 0, '46902325427385654690', 1),
(148, 'Firewall', 'modules/navigation/erreurNav.php', 1, 0, 2, 2, 1, 20, '9699529468558', 1),
(150, 'IP ban panel', 'modules/journaux/ipBanPanel.php', 1, 20, 2, 2, 1, 0, '9520095251506595', 1),
(151, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 0, 1, 0, '33561986820557', 1),
(152, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 1, 1, 0, '68330289094', 1),
(153, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 2, 1, 0, '02115283624378', 1),
(154, 'Univers', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 21, '8818802823414', 9),
(155, 'Ajouter un univers', 'sources/univers/publics/addUnivers.php', 1, 21, 1, 1, 1, 0, '6659467065046', 9),
(156, 'updateFormUnivers.php', 'sources/univers/publics/updateFormUnivers.php', 0, 0, 1, 1, 1, 0, '0420342714071', 9),
(157, 'Ajouter une faction', 'sources/factions/publics/addFactions.php', 1, 21, 2, 1, 1, 0, '2364505968', 10),
(158, 'Effacer une faction', 'sources/factions/publics/deleteFaction.php', 1, 21, 3, 1, 1, 0, '8860267665', 10),
(159, 'Mettre à jour factions', 'sources/factions/publics/updateFaction.php', 1, 21, 2, 1, 1, 0, '4093114682664', 10),
(160, 'Regles speciales', 'modules/navigation/erreurNav.php', 1, 0, 6, 3, 1, 22, '9648151484', 11),
(161, 'Ajouter regle speciale', 'sources/specialRules/gestionnaires/addSpecialRules.php', 1, 22, 1, 3, 1, 0, '55439968108694', 11),
(162, 'Special rules', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 23, '3546649564', 11),
(163, 'Armes', 'sources/specialRules/publics/displaySpecialRulesWeapon.php', 1, 23, 1, 1, 1, 23, '782461706943994', 11),
(164, 'Administration armes', 'sources/specialRules/administration/displaySpecialRulesWeapon.php', 1, 22, 1, 3, 1, 0, '65614607656694', 11),
(165, 'Mettre a jour regles speciales', 'sources/specialRules/administration/updateSpecialRules.php', 0, 0, 0, 3, 1, 0, '624946044431996', 11),
(166, 'Admi figurines', 'sources/specialRules/administration/displaySpecialRulesMiniature.php', 1, 22, 3, 3, 1, 0, '806454688306355', 11),
(167, 'Admin vehicules', 'sources/specialRules/administration/displaySpecialRulesVehicle.php', 0, 22, 4, 3, 1, 0, '46642883730', 11),
(168, 'Admi liste armee', 'sources/specialRules/administration/displaySpecialRulesArmyList.php', 1, 22, 5, 3, 1, 0, '565659200762', 11),
(169, 'diplaySRPublic', 'sources/specialRules/publics/diplayPublicOneSpecialRules.php', 0, 0, 0, 1, 1, 0, '05700626990229', 11),
(170, 'Figurines', 'sources/specialRules/publics/displaySpecialRulesMiniature.php', 1, 23, 2, 1, 1, 0, '9647335404', 11),
(171, 'Vehicules', 'sources/specialRules/publics/displaySpecialRulesVehicle.php', 1, 23, 3, 1, 1, 0, '646542761893829', 11),
(172, 'Liste armee', 'sources/specialRules/publics/displaySpecialRulesArmyList.php', 1, 23, 4, 1, 1, 0, '69464395842065', 11),
(173, 'Gestion des armes', 'modules/navigation/erreurNav.php', 1, 0, 5, 3, 1, 24, '5855064954906', 12),
(174, 'Armes des univers', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 25, '36313761043691', 12),
(175, 'Ajouter arme', 'sources/weapons/administration/formWeapon.php', 1, 24, 1, 3, 1, 0, '346945516746', 12),
(176, 'Arme non fixe', 'sources/weapons/administration/displayWeaponNoFixe.php', 1, 24, 2, 3, 1, 0, '78219506548', 12),
(177, 'DisplayOneWeaponAdmin', 'sources/weapons/administration/displayOneWeapon.php', 0, 0, 0, 3, 1, 0, '2546770614636', 12),
(178, 'Arme fix', '/var/www/html/r5v3local.com/sources/weapons/administration/displayWeaponFix.php', 1, 24, 3, 3, 1, 0, '618618744094924', 12),
(179, 'Ajouter arme', 'sources/weapons/public/addWeaponPublic.php', 1, 25, 1, 1, 1, 0, '5499417100575', 12),
(180, 'Liste des armes de faction', 'sources/weapons/public/listWeaponFactions.php', 0, 0, 1, 1, 1, 0, '45640596654', 12),
(181, 'Arme de faction', 'sources/weapons/public/listFaction.php', 1, 25, 1, 1, 1, 25, '7498963495558540', 12),
(182, 'Single weapon sheet', 'sources/weapons/public/singleWeaponSheet.php', 0, 0, 1, 1, 1, 0, '3476628921725', 12),
(183, 'Global Weapon', 'sources/weapons/public/globalWeapon.php', 0, 25, 3, 1, 1, 0, '68404897615646', 12),
(184, 'Figurines', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 26, '40712943376726', 13),
(185, 'Ajouter une figurine', 'sources/miniatures/publics/miniaturesForm.php', 1, 26, 1, 1, 1, 0, '580256322914322', 13),
(186, 'Regles speciales figurines', 'sources/miniatures/publics/listFactions.php', 1, 26, 2, 1, 1, 0, '074608865942', 13),
(187, 'liste miniature of faction', 'sources/miniatures/publics/listMiniatureOfFaction.php', 0, 0, 1, 1, 1, 0, '44744655771', 13),
(188, 'Update miniature', 'sources/miniatures/publics/updateMiniatureByUser.php', 0, 0, 3, 1, 1, 0, '7784544765858', 13),
(189, 'Arme figurines', 'sources/miniatures/publics/listFactionsWeaponManagement.php', 1, 26, 3, 1, 1, 0, '57583932064524', 13),
(190, 'Figurine en service actif', 'sources/miniatures/publics/listFactionMiniatureInService.php', 1, 26, 4, 1, 1, 0, '91691454106131', 13),
(191, 'liste Miniature in service', 'sources/miniatures/publics/listMiniatureInService.php', 0, 0, 0, 1, 1, 0, '148629246863', 13),
(192, 'Vehicules', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 27, '615751835295', 14),
(193, 'Ajouter vehicule', 'sources/vehicles/publics/addVehicle.php', 1, 27, 1, 1, 1, 0, '26474699044', 14),
(194, 'Liste des vehicules', 'sources/vehicles/publics/listFactions.php', 0, 27, 2, 1, 1, 0, '374214805026', 14),
(195, 'listVehicleFaction', 'sources/vehicles/publics/listVehicleUnfix.php', 0, 0, 1, 1, 1, 0, '756546697465', 14),
(196, 'oneVehicleUpdate', 'sources/vehicles/publics/oneVehicleupdate.php', 0, 0, 7, 1, 1, 0, '4942141524148535', 14),
(197, 'Compagnies', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 28, '4642030478', 15),
(198, 'Creer une compagnie', 'sources/armyList/publics/creatArmyList.php', 1, 28, 1, 1, 1, 0, '5741452595', 15),
(199, 'Armylist', 'sources/armyList/publics/listArmy.php', 0, 0, 1, 1, 1, 0, '6132235973', 15),
(200, 'Listes de compagnie', 'sources/armyList/publics/listFactions.php', 1, 28, 2, 1, 1, 0, '1749563939515', 15),
(201, 'AdminArmyList', 'sources/armyList/publics/adminArmyList.php', 0, 0, 3, 1, 1, 0, '6311275268', 15),
(202, 'Armes sans faction', 'sources/weapons/public/notAffectedWeapon.php', 0, 25, 5, 1, 1, 25, '7562413825', 12),
(203, 'printList.php', 'sources/armyList/publics/printArmyList.php', 0, 0, 5, 1, 1, 0, '052090424445', 15),
(204, 'Figurines sans faction', 'sources/miniatures/publics/listOfNFactionMiniature.php', 1, 26, 5, 1, 1, 0, '87648846064494', 13),
(205, 'Vehicules sans faction', 'sources/vehicles/publics/listOfNoFactionVehicle.php', 1, 27, 3, 1, 1, 0, '596547645363212', 14),
(206, 'Admin blog', 'modules/navigation/erreurNav.php', 1, 0, 3, 3, 1, 29, '5337864953054946', 16),
(207, 'Add new article', 'modules/blog/administration/addNewArticle.php', 1, 29, 1, 3, 1, 0, '862329403034', 16),
(208, 'Add Categories', 'modules/blog/administration/addCategorie.php', 1, 29, 2, 3, 1, 0, '6643646550434462', 16),
(209, 'Acceuil', 'modules/navigation/pageGeneral.php', 1, 0, 1, 3, 1, 0, '52575730289645', 1),
(210, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 0, 1, 0, '50991583625', 16),
(211, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 1, 1, 0, '50489687065', 16),
(212, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 2, 1, 0, '6323656756824404', 16),
(213, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 3, 1, 0, '8541625261', 16),
(214, 'displayOneArticleOfBlog', 'modules/blog/public/displayOneArticle.php', 0, 0, 0, 0, 1, 0, '195653511506070', 16),
(215, 'displayOneArticleOfBlog', 'modules/blog/public/displayOneArticle.php', 0, 0, 0, 1, 1, 0, '2730646367', 16),
(216, 'displayOneArticleOfBlog', 'modules/blog/public/displayOneArticle.php', 0, 0, 0, 2, 1, 0, '65111424598541', 16),
(217, 'displayOneArticleOfBlog', 'modules/blog/public/displayOneArticle.php', 0, 0, 0, 3, 1, 0, '419974085524', 16),
(218, 'displayOneArticleOfBlog', 'modules/blog/administration/displayOneArticleAdmin.php', 0, 0, 0, 3, 1, 0, '4199740845698', 16),
(219, 'Add picture for blog', 'modules/blog/administration/addPictureBlog.php', 1, 29, 3, 3, 1, 0, '2733530154135364', 16);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idRole` int NOT NULL,
  `typeRole` varchar(15) NOT NULL,
  `accreditation` tinyint DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `typeRole`, `accreditation`, `valide`) VALUES
(1, 'Visiteur', 0, 1),
(4, 'Membre', 1, 1),
(6, 'Administrateur', 2, 1),
(9, 'Gestionnaire', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `routageForm`
--

CREATE TABLE `routageForm` (
  `idForm` int NOT NULL,
  `chemin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `securiter` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `route` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idModule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `routageForm`
--

INSERT INTO `routageForm` (`idForm`, `chemin`, `securiter`, `valide`, `route`, `idModule`) VALUES
(1, 'modules/users/CUD/Create/inscriptionUser.php', 0, 1, '32051150618353524754', 1),
(2, 'modules/securiter/connexionUser.php', 0, 1, '626044355668848249', 1),
(3, 'modules/users/CUD/Update/activationUser.php', 0, 1, '12051668466686995561', 1),
(4, 'modules/navigation/CUD/Create/addLien.php', 2, 1, '4842267612507458', 1),
(5, 'modules/dataSite/CUD/Update/updateDataSite.php', 2, 1, '94526571732912163', 1),
(6, 'modules/navigation/CUD/Create/addMenusDeroulant.php', 2, 1, '821716546668599665', 1),
(7, 'modules/navigation/CUD/Create/addRouteForm.php', 2, 1, '47964416497134541', 1),
(14, 'modules/users/CUD/Update/modAdminUser.php', 2, 1, '45485533324634', 1),
(16, 'modules/users/CUD/Update/emailUser.php', 1, 1, '21174211159753455', 1),
(17, 'modules/users/CUD/Update/loginUser.php', 1, 1, '14605180526997', 1),
(18, 'modules/users/CUD/Update/mdpUser.php', 1, 1, '55692971554761', 1),
(19, 'modules/journaux/deleteLog.php', 2, 1, '9845646709464074561', 1),
(20, 'modules/navigation/CUD/update/updateLienNav.php', 2, 1, '387465805279322674', 1),
(21, 'modules/navigation/CUD/Delete/deleteLienNav.php', 2, 1, '654795232630669845', 1),
(22, 'modules/users/CUD/Update/desincriptionUser.php', 1, 1, '448505614394678646', 1),
(23, 'modules/navigation/CUD/update/updateModule.php', 2, 1, '844163548041396256', 1),
(25, 'modules/navigation/CUD/Create/addModule.php', 2, 1, '6759464022474346894', 1),
(29, 'modules/users/CUD/Create/addRoles.php', 2, 1, '588699406564322', 1),
(56, 'modules/users/CUD/Update/sendToken.php', 0, 1, '926766468786712', 1),
(57, 'modules/users/CUD/Update/updatePassword.php', 0, 1, '464563711554136128', 1),
(63, 'modules/journaux/CD/Delete/deleteBanIP.php', 2, 1, '14875622729497612', 1),
(64, 'modules/journaux/CD/Creat/addIPBAN.php', 2, 1, '6653521264052116232', 1),
(65, 'modules/journaux/CD/Creat/addIPBANfromJounaux.php', 2, 1, '509143100265064', 1),
(66, 'sources/univers/cud/Creat/CreatUnivers.php', 1, 1, '61094861653913359086', 9),
(67, 'sources/univers/cud/Update/updateUnivers.php', 1, 1, '9446456236843187', 9),
(68, 'sources/univers/cud/Delete/deleteUnivers.php', 1, 1, '887229634436420464', 9),
(69, 'sources/factions/cud/Creat/CreatFaction.php', 1, 1, '74549645379437442870', 10),
(70, 'sources/factions/cud/Delete/DeleteFaction.php', 1, 1, '27988550832446451', 10),
(71, 'sources/factions/cud/Update/updateFactionByUser.php', 1, 1, '544863734419368614', 10),
(72, 'sources/specialRules/cud/creat/creatSpecialRules.php', 3, 1, '193736936208679', 11),
(73, 'sources/specialRules/cud/update/updateSpecialRules.php', 3, 1, '831684542055608', 11),
(74, 'sources/specialRules/cud/delete/deleteSpecialRules.php', 3, 1, '9444295975822654040', 11),
(75, 'sources/weapons/cud/creat/CreatNewWeaponCloseCombatByAdmin.php', 3, 1, '7515864483837425544', 12),
(76, 'sources/weapons/cud/creat/CreatNewWeaponShootingByAdmin.php', 3, 1, '2467962034543471', 12),
(77, 'sources/weapons/cud/creat/CreatNewWeaponExplosiveByAdmin.php', 3, 1, '7051465153459555', 12),
(78, 'sources/specialRules/cud/creat/assignSpecialRuleWeapon.php', 3, 1, '76944650898740934685', 11),
(79, 'sources/specialRules/cud/delete/unAssignedSpecialRuleWeapon.php', 3, 1, '4224514452159848', 12),
(80, 'sources/weapons/cud/delete/deleteWeaponAdmin.php', 3, 1, '55469840263873736248', 12),
(81, 'sources/weapons/cud/update/fixWeaponByAdmin.php', 3, 1, '605580361700591', 12),
(82, 'sources/weapons/cud/creat/CreatWeaponCloseCombatByUser.php', 1, 1, '477364349624661', 12),
(83, 'sources/weapons/cud/creat/CreatWeaponShootingByUser.php', 1, 1, '66145679787586', 12),
(84, 'sources/weapons/cud/creat/CreatWeaponExplosiveByUser.php', 1, 1, '08451666989460741434', 12),
(85, 'sources/weapons/cud/delete/deleteWeaponByOwner.php', 1, 1, '46616550698802', 12),
(86, 'sources/specialRules/cud/creat/assignSRbyUserWeapon.php', 1, 1, '8497198959389510941', 12),
(87, 'sources/specialRules/cud/delete/unAssignSRWeaponByUser.php', 1, 1, '57414337684665255', 12),
(88, 'sources/weapons/cud/update/fixWeaponByOwner.php', 1, 1, '31536595969036022758', 12),
(89, 'sources/weapons/cud/update/updateWeaponCloseByAdmin.php', 3, 1, '850565654563436446', 12),
(90, 'sources/weapons/cud/update/updateWeaponShootingByAdmin.php', 3, 1, '108915404955454630', 12),
(91, 'sources/weapons/cud/update/updateWeaponExplosiveByAdmin.php', 3, 1, '14962642531770', 12),
(92, 'sources/weapons/cud/update/updateWeaponCloseByOwner.php', 1, 1, '755496056551964', 12),
(93, 'sources/weapons/cud/update/updateWeaponShootingByOwner.php', 1, 1, '66156515598658096', 12),
(94, 'sources/weapons/cud/update/updateWeaponExplosiveByOwner.php', 1, 1, '6386726354494762423', 12),
(95, 'sources/weapons/cud/update/fixWeaponByOwnerFromWeaponSheet.php', 1, 1, '1456467455735476', 12),
(96, 'sources/miniatures/cud/Creat/addMiniature.php', 1, 1, '780651449176437180', 13),
(97, 'sources/miniatures/cud/delete/deleteMiniatureByUser.php', 1, 1, '02120514221529440428', 13),
(98, 'sources/miniatures/cud/Creat/cloneMiniature.php', 1, 0, '54476946376715016746', 13),
(99, 'sources/miniatures/cud/update/updateMiniatureByUser.php', 1, 1, '4398804052977989', 13),
(100, 'sources/miniatures/cud/update/fixMiniatureByOwner.php', 1, 1, '5845943762441045341', 13),
(101, 'sources/specialRules/cud/creat/assignSpecialRuleMiniature.php', 1, 1, '51165554620815460225', 11),
(102, 'sources/specialRules/cud/delete/unAssignedSRMiniatureByUser.php', 1, 1, '506494654554074', 13),
(103, 'sources/miniatures/cud/update/fixMiniatureByOwnerDataSheet.php', 1, 1, '85139305653440404', 13),
(104, 'sources/miniatures/cud/Creat/addWeaponOnMiniature.php', 1, 1, '447685538407500676', 13),
(105, 'sources/miniatures/cud/delete/substractAffectedWeaponByOwner.php', 1, 1, '8055332665657940713', 13),
(106, 'sources/miniatures/cud/update/goodForServiceMiniature.php', 1, 1, '944592752727414742', 13),
(107, 'sources/miniatures/cud/update/UnServicingMiniatureByOwner.php', 1, 1, '16343665911149', 13),
(108, 'sources/vehicles/cud/creat/creatNewVehicle.php', 1, 1, '941755785550436959', 14),
(109, 'sources/vehicles/cud/update/fixingVehicleByOwner.php', 1, 1, '3686162565544614', 14),
(110, 'sources/vehicles/cud/update/updateVehicleByOwner.php', 1, 1, '4405525770006516', 14),
(111, 'sources/specialRules/cud/creat/assignSpecialRuleVehicle.php', 1, 1, '62521443692446440044', 14),
(112, 'sources/specialRules/cud/delete/unassignSpecialRuleVehicle.php', 1, 1, '05560331656478', 14),
(113, 'sources/vehicles/cud/update/fixingVehicleByOwnerDataSheet.php', 1, 1, '469913301038924', 14),
(114, 'sources/vehicles/cud/delete/deleteVehicleByOwner.php', 1, 1, '828309550645479', 14),
(115, 'sources/vehicles/cud/update/equipVehicleByOwnerDataSheet.php', 1, 1, '835976815657665', 14),
(116, 'sources/miniatures/cud/Creat/addWeaponOnVehicle.php', 1, 1, '888830655862952664', 12),
(117, 'sources/vehicles/cud/delete/unequipeVehicleWeaponByOwner.php', 1, 1, '77531902564793', 14),
(118, 'sources/vehicles/cud/update/updateInServiceVehicleByOwner.php', 1, 1, '4261744616566557', 14),
(119, 'sources/vehicles/cud/update/updateNotInServiceVehicleByOwner.php', 1, 1, '74565093398483658664', 14),
(120, 'sources/vehicles/cud/update/updateNotInServiceVehicleByOwnerByOneVehicle.php', 1, 1, '16940662814966566', 14),
(121, 'sources/armyList/cud/creat/creatArmyList.php', 1, 1, '57050585536856421', 15),
(122, 'sources/armyList/cud/creat/creatMiniatureInArmyList.php', 1, 1, '54472647405796581', 15),
(123, 'sources/armyList/cud/creat/creatVehiculeInArmyList.php', 1, 1, '288249574005044728', 15),
(124, 'sources/armyList/cud/delete/deleteGroupArmyList.php', 1, 1, '59450427954458', 15),
(125, 'sources/armyList/cud/delete/deleteGroupArmyListVehicle.php', 1, 1, '5522547073469453549', 15),
(126, 'sources/armyList/cud/delete/deleteArmyList.php', 1, 1, '349396560258426', 15),
(127, 'sources/armyList/cud/delete/deleteArmyListFaction.php', 1, 1, '4966442570337766', 15),
(128, 'sources/weapons/cud/update/affectedFactionOfOneWeapon.php', 1, 1, '65660858032418491904', 12),
(129, 'modules/blog/CUD/creat/addNewArticle.php', 3, 1, '248755499484367', 16),
(130, 'modules/blog/CUD/creat/addCategorie.php', 3, 1, '9733518748764265', 16),
(131, 'modules/blog/CUD/update/updateCategorie.php', 3, 1, '4486357813659565', 16),
(132, 'modules/blog/CUD/update/updateArticle.php', 3, 1, '66066469226840626203', 16),
(133, 'modules/blog/CUD/Delete/deleteArticle.php', 3, 1, '56095996566170514055', 16),
(134, 'modules/blog/CUD/creat/addPictureBlog.php', 3, 1, '59211903761656954476', 16);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `token` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `token`, `email`, `prenom`, `nom`, `login`, `mdp`, `valide`, `role`, `dateCreation`) VALUES
(1, 'nuRjvqStpv', 'christophe.calmes2020@laposte.net', 'Christophe', 'Calmes', 'Admin', '$2y$10$oADkGPsXhTD1m1.vawEEJevfSC1BwODMOuCHCntUrBQgpV5TmLy6S', 1, 2, '2022-06-12 14:26:13'),
(57, 'w2jbaXpwin', 'christophe.calmes22@gmail.com', 'Christophe', 'Calmes', 'Membre', '$2y$10$XyTgD4YJUyRXmYb5rJ7IGeCw5c..lxXVGNCEw2XdpS6GOtOfzvGfW', 1, 1, '2024-05-15 14:33:10'),
(58, 'SDMi1t7S0f6sFn92', 'gestionnaire@gmail.com', 'Christophe', 'Calmes', 'Gestionnaire', '$2y$10$gIj/T1GuebPFWQwoR0GBcueEDa6Rc30/03E7.WE/Qp6rnbaZUy132', 1, 3, '2024-05-15 16:28:55'),
(59, '4PuI8cLlF5', 'aresh@gmail.com', 'Christophe', 'Calmes', 'Aresh', '$2y$10$gt8CLzPRNbKJDBkuMl3DY.etNoPWYRxs/0ll.XgQ6xdIzkzD2GGRS', 1, 1, '2024-06-17 17:19:46');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `banIP`
--
ALTER TABLE `banIP`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dataSite`
--
ALTER TABLE `dataSite`
  ADD PRIMARY KEY (`idDataSite`);

--
-- Index pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD PRIMARY KEY (`idConnexion`);

--
-- Index pour la table `menuNav`
--
ALTER TABLE `menuNav`
  ADD PRIMARY KEY (`idMenuDeroulant`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`idNav`),
  ADD KEY `lierModule` (`idModule`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `routageForm`
--
ALTER TABLE `routageForm`
  ADD PRIMARY KEY (`idForm`),
  ADD KEY `lienModule` (`idModule`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `banIP`
--
ALTER TABLE `banIP`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `dataSite`
--
ALTER TABLE `dataSite`
  MODIFY `idDataSite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `journaux`
--
ALTER TABLE `journaux`
  MODIFY `idConnexion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `menuNav`
--
ALTER TABLE `menuNav`
  MODIFY `idMenuDeroulant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `idNav` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `routageForm`
--
ALTER TABLE `routageForm`
  MODIFY `idForm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD CONSTRAINT `lierModule` FOREIGN KEY (`idModule`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `routageForm`
--
ALTER TABLE `routageForm`
  ADD CONSTRAINT `lienModule` FOREIGN KEY (`idModule`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
