-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 11 fév. 2025 à 15:12
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
(1, '::1', 1, 'Admin', '0', '2025-01-27 11:21:13', 1),
(2, '::1', 59, 'Aresh', '0', '2025-01-27 11:21:27', 1),
(3, '::1', 1, 'Admin', '0', '2025-01-27 11:29:00', 1),
(4, '::1', 1, 'Admin', '0', '2025-01-27 11:30:23', 1),
(5, '::1', 59, 'Aresh', '0', '2025-01-27 11:30:30', 1),
(6, '::1', 1, 'Admin', '0', '2025-01-27 12:02:56', 1),
(7, '::1', 59, 'Aresh', '0', '2025-01-27 12:03:36', 1),
(8, '::1', 59, 'Aresh', '0', '2025-01-27 14:58:11', 1),
(9, '::1', 59, 'Aresh', '0', '2025-01-27 19:33:28', 1),
(10, '::1', 1, 'Admin', '0', '2025-01-27 19:56:27', 1),
(11, '::1', 59, 'Aresh', '0', '2025-01-27 19:58:08', 1),
(12, '::1', 59, 'Aresh', '0', '2025-01-28 08:48:18', 1),
(13, '::1', 59, 'Aresh', '0', '2025-01-28 15:09:50', 1),
(14, '::1', 59, 'Aresh', '0', '2025-01-28 15:12:27', 1),
(15, '::1', 1, 'Admin', '0', '2025-01-28 15:31:51', 1),
(16, '::1', 59, 'Aresh', '0', '2025-01-28 15:32:31', 1),
(17, '::1', 59, 'Aresh', '0', '2025-01-28 21:59:03', 1),
(18, '::1', 58, 'Gestionnaire', '0', '2025-01-28 22:01:59', 1),
(19, '::1', 58, 'Gestionnaire', '0', '2025-02-03 11:43:58', 1),
(20, '::1', 59, 'Aresh', '0', '2025-02-03 11:44:04', 1),
(21, '::1', 59, 'Aresh', '0', '2025-02-04 19:18:39', 1),
(22, '::1', 59, 'Aresh', '0', '2025-02-05 09:45:35', 1),
(23, '::1', 1, 'Admin', '0', '2025-02-05 11:00:28', 1),
(24, '::1', 59, 'Aresh', '0', '2025-02-05 11:01:18', 1),
(25, '::1', 59, 'Aresh', '0', '2025-02-05 13:56:48', 1),
(26, '::1', 0, 'r5v3', 'camille', '2025-02-05 14:15:52', 0),
(27, '::1', 1, 'Admin', '0', '2025-02-05 14:15:56', 1),
(28, '::1', 59, 'Aresh', '0', '2025-02-05 14:16:18', 1),
(29, '::1', 59, 'Aresh', '0', '2025-02-05 22:59:03', 1),
(30, '::1', 1, 'Admin', '0', '2025-02-05 23:02:37', 1),
(31, '::1', 59, 'Aresh', '0', '2025-02-05 23:03:09', 1),
(32, '::1', 59, 'Aresh', '0', '2025-02-06 09:18:54', 1),
(33, '::1', 1, 'Admin', '0', '2025-02-06 09:23:22', 1),
(34, '::1', 59, 'Aresh', '0', '2025-02-06 09:25:09', 1),
(35, '::1', 59, 'Aresh', '0', '2025-02-06 11:42:07', 1),
(36, '::1', 59, 'Aresh', '0', '2025-02-06 16:14:27', 1),
(37, '::1', 1, 'Admin', '0', '2025-02-06 16:26:32', 1),
(38, '::1', 59, 'Aresh', '0', '2025-02-06 19:45:45', 1),
(39, '::1', 59, 'Aresh', '0', '2025-02-07 09:21:25', 1),
(40, '::1', 1, 'Admin', '0', '2025-02-07 09:27:27', 1),
(41, '::1', 59, 'Aresh', '0', '2025-02-07 09:32:51', 1),
(42, '::1', 1, 'Admin', '0', '2025-02-07 09:59:41', 1),
(43, '::1', 59, 'Aresh', '0', '2025-02-07 10:20:49', 1),
(44, '::1', 59, 'Aresh', '0', '2025-02-07 13:05:16', 1),
(45, '::1', 59, 'Aresh', '0', '2025-02-07 14:08:21', 1),
(46, '::1', 58, 'Gestionnaire', '0', '2025-02-07 14:08:27', 1),
(47, '::1', 59, 'Aresh', '0', '2025-02-07 14:10:53', 1),
(48, '::1', 59, 'Aresh', '0', '2025-02-08 22:14:44', 1),
(49, '::1', 59, 'Aresh', '0', '2025-02-10 02:51:53', 1),
(50, '::1', 59, 'Aresh', '0', '2025-02-10 14:51:13', 1),
(51, '::1', 1, 'Admin', '0', '2025-02-10 15:03:56', 1),
(52, '::1', 59, 'Aresh', '0', '2025-02-10 15:05:12', 1),
(53, '::1', 59, 'Aresh', '0', '2025-02-10 16:31:32', 1),
(54, '::1', 58, 'Gestionnaire', '0', '2025-02-10 17:03:13', 1),
(55, '::1', 59, 'Aresh', '0', '2025-02-10 17:08:06', 1),
(56, '::1', 1, 'Admin', '0', '2025-02-10 17:49:12', 1),
(57, '::1', 59, 'Aresh', '0', '2025-02-10 17:52:20', 1),
(58, '::1', 1, 'Admin', '0', '2025-02-10 18:04:11', 1),
(59, '::1', 59, 'Aresh', '0', '2025-02-10 18:05:58', 1),
(60, '::1', 59, 'Aresh', '0', '2025-02-10 21:51:25', 1),
(61, '::1', 0, 'r5v3', 'camille', '2025-02-11 01:04:30', 0),
(62, '::1', 59, 'Aresh', '0', '2025-02-11 01:04:36', 1),
(63, '::1', 59, 'Aresh', '0', '2025-02-11 09:49:12', 1),
(64, '::1', 59, 'Aresh', '0', '2025-02-11 14:46:36', 1),
(65, '::1', 59, 'Aresh', '0', '2025-02-11 15:59:27', 1),
(66, '::1', 1, 'Admin', '0', '2025-02-11 15:59:37', 1),
(67, '::1', 59, 'Aresh', '0', '2025-02-11 16:02:00', 1);

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
(27, 'Vehicles');

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
(14, 'vehicles', 1);

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
(72, 'connexion', 'modules/connexion/connexion.php', 1, 0, 10, 0, 1, 0, '1565194586', 1),
(73, 'inscription', 'modules/users/inscription.php', 0, 0, 0, 0, 1, 0, '555885558543', 1),
(74, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 2, 1, 0, '46807525655198140446', 1),
(75, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 1, 1, 0, '882281902164', 1),
(76, 'Administration du site', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 1, '69440180746174', 1),
(77, 'Ajout lien de nav', 'modules/navigation/menuAdmin/creationNouveuMenu.php', 1, 1, 1, 2, 1, 0, '6093671644115', 1),
(78, 'Titres et SEO', 'modules/dataSite/titreInfo.php', 1, 1, 2, 2, 1, 0, '777355583690413', 1),
(81, 'Brassage des liens', 'modules/navigation/menuAdmin/dynamique.php', 1, 1, 2, 2, 1, 0, '0150345566183', 1),
(82, 'Ajout menu déroulant', 'modules/navigation/menuAdmin/ajoutMenuDeroulant.php', 1, 1, 2, 2, 1, 1, '55904568550680656184', 1),
(85, 'Administration User', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 6, '67774478890', 1),
(86, 'Users Actif', 'modules/users/administration/droitUser.php', 1, 6, 1, 2, 1, 6, '4054525055924', 1),
(87, 'Route Form', 'modules/navigation/menuAdmin/ajoutRouteForm.php', 1, 1, 2, 2, 1, 0, '45855796677602', 1),
(88, 'Users Anciens ', 'modules/users/administration/droitUserNonValide.php', 1, 6, 2, 2, 1, 0, '4681550475356578', 1),
(89, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 1, 1, 0, '5217919368676', 1),
(90, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 1, 2, 1, 0, '86358463715682', 1),
(91, 'Journeaux de log', 'modules/journaux/journaux.php', 1, 20, 1, 2, 1, 0, '12188491468', 1),
(92, 'Admin nav', 'modules/navigation/menuAdmin/adminMenu.php', 1, 1, 2, 2, 1, 0, '6663537599806362', 1),
(93, 'modification lien nav', 'modules/navigation/menuAdmin/modificationNav.php', 0, 0, 0, 2, 1, 0, '154661158454534', 1),
(95, 'Admin modules', 'modules/navigation/menuAdmin/administrationModules.php', 1, 1, 7, 2, 1, 1, '67805564814644567685', 1),
(99, 'Add roles', 'modules/users/administration/addRole.php', 1, 6, 3, 2, 0, 0, '07235456649081059126', 1),
(100, 'Deco', 'modules/securiter/deconnexion.php', 1, 0, 20, 3, 1, 0, '36441916765', 1),
(101, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 3, 1, 0, '84960654576032', 1),
(104, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '659021474489478', 1),
(136, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 0, 1, 0, '36653756061565', 1),
(137, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '26555860318', 1),
(138, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 3, 1, 0, '57483869926646', 1),
(140, 'Lost Password', 'modules/users/administration/lostPassword.php', 0, 0, 0, 0, 1, 0, '68410065056796', 1),
(141, 'Inscription', 'modules/users/inscription.php', 1, 0, 1, 0, 0, 0, '46902325427385654690', 1),
(148, 'Firewall', 'modules/navigation/erreurNav.php', 1, 0, 2, 2, 1, 20, '6312947533960', 1),
(150, 'IP ban panel', 'modules/journaux/ipBanPanel.php', 1, 20, 2, 2, 1, 0, '67530688257', 1),
(151, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 0, 1, 0, '95264662844574', 1),
(152, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 1, 1, 0, '4403984985634', 1),
(153, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 2, 1, 0, '91086114671', 1),
(154, 'Univers', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 21, 'fZBrAi6kAa9rlaQk', 9),
(155, 'Ajouter un univers', 'sources/univers/publics/addUnivers.php', 1, 21, 1, 1, 1, 0, '08643690665015465908', 9),
(156, 'updateFormUnivers.php', 'sources/univers/publics/updateFormUnivers.php', 0, 0, 1, 1, 1, 0, '2646620714544162', 9),
(157, 'Ajouter une faction', 'sources/factions/publics/addFactions.php', 1, 21, 2, 1, 1, 0, '4568135656558876', 10),
(158, 'Effacer une faction', 'sources/factions/publics/deleteFaction.php', 1, 21, 3, 1, 1, 0, '1959797048499693', 10),
(159, 'Mettre à jour factions', 'sources/factions/publics/updateFaction.php', 1, 21, 2, 1, 1, 0, '4554074583654453', 10),
(160, 'Regles speciales', 'modules/navigation/erreurNav.php', 1, 0, 0, 3, 1, 22, 'cnLYNNWN8gyCLODc', 11),
(161, 'Ajouter regle speciale', 'sources/specialRules/gestionnaires/addSpecialRules.php', 1, 22, 1, 3, 1, 0, '1512832805135157', 11),
(162, 'Special rules', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 23, '50464340780468567410', 11),
(163, 'Armes', 'sources/specialRules/publics/displaySpecialRulesWeapon.php', 1, 23, 1, 1, 1, 23, '9394861501575964', 11),
(164, 'Administration armes', 'sources/specialRules/administration/displaySpecialRulesWeapon.php', 1, 22, 1, 3, 1, 0, '6872056930426466', 11),
(165, 'Mettre a jour regles speciales', 'sources/specialRules/administration/updateSpecialRules.php', 0, 0, 0, 3, 1, 0, '9242658115487373', 11),
(166, 'Admi figurines', 'sources/specialRules/administration/displaySpecialRulesMiniature.php', 1, 22, 3, 3, 1, 0, '4408677515754443', 11),
(167, 'Admin vehicules', 'sources/specialRules/administration/displaySpecialRulesVehicle.php', 0, 22, 4, 3, 1, 0, '4923846657032525', 11),
(168, 'Admi liste armee', 'sources/specialRules/administration/displaySpecialRulesArmyList.php', 1, 22, 5, 3, 1, 0, '3248701917145756', 11),
(169, 'diplaySRPublic', 'sources/specialRules/publics/diplayPublicOneSpecialRules.php', 0, 0, 0, 1, 1, 0, '29476616024126165458', 11),
(170, 'Figurines', 'sources/specialRules/publics/displaySpecialRulesMiniature.php', 1, 23, 2, 1, 1, 0, '0364011360004074', 11),
(171, 'Vehicules', 'sources/specialRules/publics/displaySpecialRulesVehicle.php', 1, 23, 3, 1, 1, 0, '6542060055461854', 11),
(172, 'Liste armee', 'sources/specialRules/publics/displaySpecialRulesArmyList.php', 1, 23, 4, 1, 1, 0, '5086545857664781', 11),
(173, 'Gestion des armes', 'modules/navigation/erreurNav.php', 1, 0, 0, 3, 1, 24, '778L8UMd1lXMzoff', 12),
(174, 'Armes des univers', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 25, '57068033811403485525', 12),
(175, 'Ajouter arme', 'sources/weapons/administration/formWeapon.php', 1, 24, 1, 3, 1, 0, '5117585423662607', 12),
(176, 'Arme non fixe', 'sources/weapons/administration/displayWeaponNoFixe.php', 1, 24, 2, 3, 1, 0, '1046536824545657', 12),
(177, 'DisplayOneWeaponAdmin', 'sources/weapons/administration/displayOneWeapon.php', 0, 0, 0, 3, 1, 0, '0663794161145329', 12),
(178, 'Arme fix', '/var/www/html/r5v3local.com/sources/weapons/administration/displayWeaponFix.php', 1, 24, 3, 3, 1, 0, '5884847114209434', 12),
(179, 'Ajouter arme', 'sources/weapons/public/addWeaponPublic.php', 1, 25, 1, 1, 1, 0, '0444594487559108', 12),
(180, 'Liste des armes de faction', 'sources/weapons/public/listWeaponFactions.php', 0, 0, 1, 1, 1, 0, '6891421351096506', 12),
(181, 'Arme de faction', 'sources/weapons/public/listFaction.php', 1, 25, 1, 1, 1, 25, '4978943442460908', 12),
(182, 'Single weapon sheet', 'sources/weapons/public/singleWeaponSheet.php', 0, 0, 1, 1, 1, 0, '4714734841117745', 12),
(183, 'Global Weapon', 'sources/weapons/public/globalWeapon.php', 0, 25, 3, 1, 1, 0, '4563324376485038', 12),
(184, 'Figurines', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 26, 'eopHoO595kkjHfrU', 13),
(185, 'Ajouter une figurine', 'sources/miniatures/publics/miniaturesForm.php', 1, 26, 1, 1, 1, 0, '4227463269001830', 13),
(186, 'Regles speciales figurines', 'sources/miniatures/publics/listFactions.php', 1, 26, 2, 1, 1, 0, '12566850376544813427', 13),
(187, 'liste miniature of faction', 'sources/miniatures/publics/listMiniatureOfFaction.php', 0, 0, 1, 1, 1, 0, '0132687536557494', 13),
(188, 'Update miniature', 'sources/miniatures/publics/updateMiniatureByUser.php', 0, 0, 3, 1, 1, 0, '7248606504159220', 13),
(189, 'Arme figurines', 'sources/miniatures/publics/listFactionsWeaponManagement.php', 1, 26, 3, 1, 1, 0, '0741209405650843', 13),
(190, 'Figurine en service actif', 'sources/miniatures/publics/listFactionMiniatureInService.php', 1, 26, 4, 1, 1, 0, '5064638201451655', 13),
(191, 'liste Miniature in service', 'sources/miniatures/publics/listMiniatureInService.php', 0, 0, 0, 1, 1, 0, '4103040345146687', 13),
(192, 'Vehicules', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 27, 'd9nrwN4fguHarqPf', 14),
(193, 'Ajouter vehicule', 'sources/vehicles/publics/addVehicle.php', 1, 27, 1, 1, 1, 0, '3324069662444065', 14),
(194, 'Liste des vehicules', 'sources/vehicles/publics/listFactions.php', 0, 27, 2, 1, 1, 0, '6076545076167253', 14),
(195, 'listVehicleFaction', 'sources/vehicles/publics/listVehicleUnfix.php', 0, 0, 1, 1, 1, 0, '5596471246036524', 14),
(196, 'oneVehicleUpdate', 'sources/vehicles/publics/oneVehicleupdate.php', 0, 0, 7, 1, 1, 0, '1577943582432318', 14);

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
(1, 'modules/users/CUD/Create/inscriptionUser.php', 0, 1, '51845367664185849394', 1),
(2, 'modules/securiter/connexionUser.php', 0, 1, '045848476654590464', 1),
(3, 'modules/users/CUD/Update/activationUser.php', 0, 1, '565224463854795663', 1),
(4, 'modules/navigation/CUD/Create/addLien.php', 2, 1, '0638630692404441623', 1),
(5, 'modules/dataSite/CUD/Update/updateDataSite.php', 2, 1, '14378384307869', 1),
(6, 'modules/navigation/CUD/Create/addMenusDeroulant.php', 2, 1, '5074756025846581636', 1),
(7, 'modules/navigation/CUD/Create/addRouteForm.php', 2, 1, '551425556734057', 1),
(14, 'modules/users/CUD/Update/modAdminUser.php', 2, 1, '55664443375246', 1),
(16, 'modules/users/CUD/Update/emailUser.php', 1, 1, '60540909250544654', 1),
(17, 'modules/users/CUD/Update/loginUser.php', 1, 1, '99464707183450', 1),
(18, 'modules/users/CUD/Update/mdpUser.php', 1, 1, '6439011243454505', 1),
(19, 'modules/journaux/deleteLog.php', 2, 1, '59050513664614206', 1),
(20, 'modules/navigation/CUD/update/updateLienNav.php', 2, 1, '185443450566484', 1),
(21, 'modules/navigation/CUD/Delete/deleteLienNav.php', 2, 1, '720158905766988597', 1),
(22, 'modules/users/CUD/Update/desincriptionUser.php', 1, 1, '253124444504658', 1),
(23, 'modules/navigation/CUD/update/updateModule.php', 2, 1, '67452545339599013280', 1),
(25, 'modules/navigation/CUD/Create/addModule.php', 2, 1, '81447964053030956171', 1),
(29, 'modules/users/CUD/Create/addRoles.php', 2, 1, '95792366184257687', 1),
(56, 'modules/users/CUD/Update/sendToken.php', 0, 1, '55641470565571', 1),
(57, 'modules/users/CUD/Update/updatePassword.php', 0, 1, '6287637654614065', 1),
(63, 'modules/journaux/CD/Delete/deleteBanIP.php', 2, 1, '4876544906456058225', 1),
(64, 'modules/journaux/CD/Creat/addIPBAN.php', 2, 1, '665277085529664', 1),
(65, 'modules/journaux/CD/Creat/addIPBANfromJounaux.php', 2, 1, '645466550654565116', 1),
(66, 'sources/univers/cud/Creat/CreatUnivers.php', 1, 1, '62955717365013156452', 9),
(67, 'sources/univers/cud/Update/updateUnivers.php', 1, 1, '65402023464218146644', 9),
(68, 'sources/univers/cud/Delete/deleteUnivers.php', 1, 1, '44412564714643742567', 9),
(69, 'sources/factions/cud/Creat/CreatFaction.php', 1, 1, '26473706635045414356', 10),
(70, 'sources/factions/cud/Delete/DeleteFaction.php', 1, 1, '14176795866869604306', 10),
(71, 'sources/factions/cud/Update/updateFactionByUser.php', 1, 1, '28685953046736865496', 10),
(72, 'sources/specialRules/cud/creat/creatSpecialRules.php', 3, 1, '56740582636115445265', 11),
(73, 'sources/specialRules/cud/update/updateSpecialRules.php', 3, 1, '29332565802526141566', 11),
(74, 'sources/specialRules/cud/delete/deleteSpecialRules.php', 3, 1, '14226096684584660509', 11),
(75, 'sources/weapons/cud/creat/CreatNewWeaponCloseCombatByAdmin.php', 3, 1, '52611244563449063046', 12),
(76, 'sources/weapons/cud/creat/CreatNewWeaponShootingByAdmin.php', 3, 1, '30516290309891657718', 12),
(77, 'sources/weapons/cud/creat/CreatNewWeaponExplosiveByAdmin.php', 3, 1, '59515584945553656499', 12),
(78, 'sources/specialRules/cud/creat/assignSpecialRuleWeapon.php', 3, 1, '45985298026645471643', 11),
(79, 'sources/specialRules/cud/delete/unAssignedSpecialRuleWeapon.php', 3, 1, '04704686022546339630', 12),
(80, 'sources/weapons/cud/delete/deleteWeaponAdmin.php', 3, 1, '75065563919920479462', 12),
(81, 'sources/weapons/cud/update/fixWeaponByAdmin.php', 3, 1, '28094407069354646634', 12),
(82, 'sources/weapons/cud/creat/CreatWeaponCloseCombatByUser.php', 1, 1, '72977918696085375079', 12),
(83, 'sources/weapons/cud/creat/CreatWeaponShootingByUser.php', 1, 1, '41672553113513294455', 12),
(84, 'sources/weapons/cud/creat/CreatWeaponExplosiveByUser.php', 1, 1, '41554246437156448592', 12),
(85, 'sources/weapons/cud/delete/deleteWeaponByOwner.php', 1, 1, '64575706684942506426', 12),
(86, 'sources/specialRules/cud/creat/assignSRbyUserWeapon.php', 1, 1, '56220567529132225475', 12),
(87, 'sources/specialRules/cud/delete/unAssignSRWeaponByUser.php', 1, 1, '5745535443169161642', 12),
(88, 'sources/weapons/cud/update/fixWeaponByOwner.php', 1, 1, '33256654252642636196', 12),
(89, 'sources/weapons/cud/update/updateWeaponCloseByAdmin.php', 3, 1, '16355437686414236246', 12),
(90, 'sources/weapons/cud/update/updateWeaponShootingByAdmin.php', 3, 1, '79444311374125764045', 12),
(91, 'sources/weapons/cud/update/updateWeaponExplosiveByAdmin.php', 3, 1, '69553566059764146655', 12),
(92, 'sources/weapons/cud/update/updateWeaponCloseByOwner.php', 1, 1, '94336451582671044045', 12),
(93, 'sources/weapons/cud/update/updateWeaponShootingByOwner.php', 1, 1, '80483754637613443454', 12),
(94, 'sources/weapons/cud/update/updateWeaponExplosiveByOwner.php', 1, 1, '69864317455435884549', 12),
(95, 'sources/weapons/cud/update/fixWeaponByOwnerFromWeaponSheet.php', 1, 1, '14661208068544901434', 12),
(96, 'sources/miniatures/cud/Creat/addMiniature.php', 1, 1, '57185360456044505737', 13),
(97, 'sources/miniatures/cud/delete/deleteMiniatureByUser.php', 1, 1, '26345648586648356695', 13),
(98, 'sources/miniatures/cud/Creat/cloneMiniature.php', 1, 0, '54476946376715016746', 13),
(99, 'sources/miniatures/cud/update/updateMiniatureByUser.php', 1, 1, '95181009451738976643', 13),
(100, 'sources/miniatures/cud/update/fixMiniatureByOwner.php', 1, 1, '86464865685246717968', 13),
(101, 'sources/specialRules/cud/creat/assignSpecialRuleMiniature.php', 1, 1, '67635553555456940917', 11),
(102, 'sources/specialRules/cud/delete/unAssignedSRMiniatureByUser.php', 1, 1, '04255274234316468568', 13),
(103, 'sources/miniatures/cud/update/fixMiniatureByOwnerDataSheet.php', 1, 1, '60012674939145857859', 13),
(104, 'sources/miniatures/cud/Creat/addWeaponOnMiniature.php', 1, 1, '52795028243406025951', 13),
(105, 'sources/miniatures/cud/delete/substractAffectedWeaponByOwner.php', 1, 1, '16797273466367465068', 13),
(106, 'sources/miniatures/cud/update/goodForServiceMiniature.php', 1, 1, '64400855879200230247', 13),
(107, 'sources/miniatures/cud/update/UnServicingMiniatureByOwner.php', 1, 1, '62563616843017655384', 13),
(108, 'sources/vehicles/cud/creat/creatNewVehicle.php', 1, 1, '43562615524299437964', 14),
(109, 'sources/vehicles/cud/update/fixingVehicleByOwner.php', 1, 1, '51422965485180457143', 14),
(110, 'sources/vehicles/cud/update/updateVehicleByOwner.php', 1, 1, '56745430947652706223', 14),
(111, 'sources/specialRules/cud/creat/assignSpecialRuleVehicle.php', 1, 1, '75271862234210456339', 14),
(112, 'sources/specialRules/cud/delete/unassignSpecialRuleVehicle.php', 1, 1, '55686676728672445467', 14),
(113, 'sources/vehicles/cud/update/fixingVehicleByOwnerDataSheet.php', 1, 1, '36464718110149964161', 14),
(114, 'sources/vehicles/cud/delete/deleteVehicleByOwner.php', 1, 1, '63807674405863654109', 14),
(115, 'sources/vehicles/cud/update/equipVehicleByOwnerDataSheet.php', 1, 1, '76995347852062552565', 14),
(116, 'sources/miniatures/cud/Creat/addWeaponOnVehicle.php', 1, 1, '67746596848955236259', 12),
(117, 'sources/vehicles/cud/delete/unequipeVehicleWeaponByOwner.php', 1, 1, '02983576434831366855', 14),
(118, 'sources/vehicles/cud/update/updateInServiceVehicleByOwner.php', 1, 1, '04608613126960194631', 14),
(119, 'sources/vehicles/cud/update/updateNotInServiceVehicleByOwner.php', 1, 1, '94029969924451093853', 14);

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
(1, '9ETmEMoY7wcFAT25', 'christophe.calmes2020@laposte.net', 'Christophe', 'Calmes', 'Admin', '$2y$10$oADkGPsXhTD1m1.vawEEJevfSC1BwODMOuCHCntUrBQgpV5TmLy6S', 1, 2, '2022-06-12 14:26:13'),
(57, 'w2jbaXpwin', 'christophe.calmes22@gmail.com', 'Christophe', 'Calmes', 'Membre', '$2y$10$XyTgD4YJUyRXmYb5rJ7IGeCw5c..lxXVGNCEw2XdpS6GOtOfzvGfW', 1, 1, '2024-05-15 14:33:10'),
(58, 'iCYRpRnPGH', 'gestionnaire@gmail.com', 'Christophe', 'Calmes', 'Gestionnaire', '$2y$10$gIj/T1GuebPFWQwoR0GBcueEDa6Rc30/03E7.WE/Qp6rnbaZUy132', 1, 3, '2024-05-15 16:28:55'),
(59, 'jYNkMkN2VAnl1EGu', 'aresh@gmail.com', 'Christophe', 'Calmes', 'Aresh', '$2y$10$gt8CLzPRNbKJDBkuMl3DY.etNoPWYRxs/0ll.XgQ6xdIzkzD2GGRS', 1, 1, '2024-06-17 17:19:46');

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
  MODIFY `idConnexion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `menuNav`
--
ALTER TABLE `menuNav`
  MODIFY `idMenuDeroulant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `idNav` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `routageForm`
--
ALTER TABLE `routageForm`
  MODIFY `idForm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

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
