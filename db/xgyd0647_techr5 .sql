-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 28 fév. 2025 à 00:53
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
(31, '::1', 58, 'Gestionnaire', '0', '2025-02-28 01:52:44', 1);

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
(72, 'connexion', 'modules/connexion/connexion.php', 1, 0, 10, 0, 1, 0, '6372504347627357', 1),
(73, 'inscription', 'modules/users/inscription.php', 0, 0, 0, 0, 1, 0, '565410240884045', 1),
(74, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 2, 1, 0, '6089706480448336', 1),
(75, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 1, 1, 0, '586340582554618', 1),
(76, 'Administration du site', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 1, '87665057044416', 1),
(77, 'Ajout lien de nav', 'modules/navigation/menuAdmin/creationNouveuMenu.php', 1, 1, 1, 2, 1, 0, '196945540001', 1),
(78, 'Titres et SEO', 'modules/dataSite/titreInfo.php', 1, 1, 2, 2, 1, 0, '324846642858283', 1),
(81, 'Brassage des liens', 'modules/navigation/menuAdmin/dynamique.php', 1, 1, 2, 2, 1, 0, '2466705896624676', 1),
(82, 'Ajout menu déroulant', 'modules/navigation/menuAdmin/ajoutMenuDeroulant.php', 1, 1, 2, 2, 1, 1, '72487448693', 1),
(85, 'Administration User', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 6, '96844888666456', 1),
(86, 'Users Actif', 'modules/users/administration/droitUser.php', 1, 6, 1, 2, 1, 6, '3436154602661', 1),
(87, 'Route Form', 'modules/navigation/menuAdmin/ajoutRouteForm.php', 1, 1, 2, 2, 1, 0, '4986043009072184', 1),
(88, 'Users Anciens ', 'modules/users/administration/droitUserNonValide.php', 1, 6, 2, 2, 1, 0, '53854522864', 1),
(89, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 1, 1, 0, '95342643342', 1),
(90, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 1, 2, 1, 0, '06012158343733', 1),
(91, 'Journeaux de log', 'modules/journaux/journaux.php', 1, 20, 1, 2, 1, 0, '079485487488242', 1),
(92, 'Admin nav', 'modules/navigation/menuAdmin/adminMenu.php', 1, 1, 2, 2, 1, 0, '269462251366', 1),
(93, 'modification lien nav', 'modules/navigation/menuAdmin/modificationNav.php', 0, 0, 0, 2, 1, 0, '00781474713', 1),
(95, 'Admin modules', 'modules/navigation/menuAdmin/administrationModules.php', 1, 1, 7, 2, 1, 1, '93624108749685', 1),
(99, 'Add roles', 'modules/users/administration/addRole.php', 1, 6, 3, 2, 0, 0, '07235456649081059126', 1),
(100, 'Deco', 'modules/securiter/deconnexion.php', 1, 0, 20, 3, 1, 0, '193607056288446', 1),
(101, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 3, 1, 0, '3825934659', 1),
(104, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '708515458885', 1),
(136, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 0, 1, 0, '58426484229537', 1),
(137, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '831878500366', 1),
(138, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 3, 1, 0, '37599479220799', 1),
(140, 'Lost Password', 'modules/users/administration/lostPassword.php', 0, 0, 0, 0, 1, 0, '477631668859693', 1),
(141, 'Inscription', 'modules/users/inscription.php', 1, 0, 1, 0, 0, 0, '46902325427385654690', 1),
(148, 'Firewall', 'modules/navigation/erreurNav.php', 1, 0, 2, 2, 1, 20, '35405419665', 1),
(150, 'IP ban panel', 'modules/journaux/ipBanPanel.php', 1, 20, 2, 2, 1, 0, '23007260540243', 1),
(151, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 0, 1, 0, '651838760306', 1),
(152, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 1, 1, 0, '3696448525004387', 1),
(153, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 2, 1, 0, '594508275540', 1),
(154, 'Univers', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 21, '506646363644763', 9),
(155, 'Ajouter un univers', 'sources/univers/publics/addUnivers.php', 1, 21, 1, 1, 1, 0, '7738847345', 9),
(156, 'updateFormUnivers.php', 'sources/univers/publics/updateFormUnivers.php', 0, 0, 1, 1, 1, 0, '7534520466', 9),
(157, 'Ajouter une faction', 'sources/factions/publics/addFactions.php', 1, 21, 2, 1, 1, 0, '6063440236849', 10),
(158, 'Effacer une faction', 'sources/factions/publics/deleteFaction.php', 1, 21, 3, 1, 1, 0, '878245559558', 10),
(159, 'Mettre à jour factions', 'sources/factions/publics/updateFaction.php', 1, 21, 2, 1, 1, 0, '614120958325', 10),
(160, 'Regles speciales', 'modules/navigation/erreurNav.php', 1, 0, 6, 3, 1, 22, '04065627473', 11),
(161, 'Ajouter regle speciale', 'sources/specialRules/gestionnaires/addSpecialRules.php', 1, 22, 1, 3, 1, 0, '426636658726485', 11),
(162, 'Special rules', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 23, '7599302893', 11),
(163, 'Armes', 'sources/specialRules/publics/displaySpecialRulesWeapon.php', 1, 23, 1, 1, 1, 23, '894047885606', 11),
(164, 'Administration armes', 'sources/specialRules/administration/displaySpecialRulesWeapon.php', 1, 22, 1, 3, 1, 0, '4352662462464', 11),
(165, 'Mettre a jour regles speciales', 'sources/specialRules/administration/updateSpecialRules.php', 0, 0, 0, 3, 1, 0, '7710393464', 11),
(166, 'Admi figurines', 'sources/specialRules/administration/displaySpecialRulesMiniature.php', 1, 22, 3, 3, 1, 0, '6841475526432', 11),
(167, 'Admin vehicules', 'sources/specialRules/administration/displaySpecialRulesVehicle.php', 0, 22, 4, 3, 1, 0, '7834457566', 11),
(168, 'Admi liste armee', 'sources/specialRules/administration/displaySpecialRulesArmyList.php', 1, 22, 5, 3, 1, 0, '8845450721660', 11),
(169, 'diplaySRPublic', 'sources/specialRules/publics/diplayPublicOneSpecialRules.php', 0, 0, 0, 1, 1, 0, '4648886873399434', 11),
(170, 'Figurines', 'sources/specialRules/publics/displaySpecialRulesMiniature.php', 1, 23, 2, 1, 1, 0, '8155312775162703', 11),
(171, 'Vehicules', 'sources/specialRules/publics/displaySpecialRulesVehicle.php', 1, 23, 3, 1, 1, 0, '2849062514529920', 11),
(172, 'Liste armee', 'sources/specialRules/publics/displaySpecialRulesArmyList.php', 1, 23, 4, 1, 1, 0, '289488584823', 11),
(173, 'Gestion des armes', 'modules/navigation/erreurNav.php', 1, 0, 5, 3, 1, 24, '678746465312785', 12),
(174, 'Armes des univers', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 25, '4526056451647587', 12),
(175, 'Ajouter arme', 'sources/weapons/administration/formWeapon.php', 1, 24, 1, 3, 1, 0, '5125841919', 12),
(176, 'Arme non fixe', 'sources/weapons/administration/displayWeaponNoFixe.php', 1, 24, 2, 3, 1, 0, '726613968434927', 12),
(177, 'DisplayOneWeaponAdmin', 'sources/weapons/administration/displayOneWeapon.php', 0, 0, 0, 3, 1, 0, '4564627666955', 12),
(178, 'Arme fix', '/var/www/html/r5v3local.com/sources/weapons/administration/displayWeaponFix.php', 1, 24, 3, 3, 1, 0, '45953910326', 12),
(179, 'Ajouter arme', 'sources/weapons/public/addWeaponPublic.php', 1, 25, 1, 1, 1, 0, '97660623033200', 12),
(180, 'Liste des armes de faction', 'sources/weapons/public/listWeaponFactions.php', 0, 0, 1, 1, 1, 0, '8436106155', 12),
(181, 'Arme de faction', 'sources/weapons/public/listFaction.php', 1, 25, 1, 1, 1, 25, '66754435920665', 12),
(182, 'Single weapon sheet', 'sources/weapons/public/singleWeaponSheet.php', 0, 0, 1, 1, 1, 0, '7226835309', 12),
(183, 'Global Weapon', 'sources/weapons/public/globalWeapon.php', 0, 25, 3, 1, 1, 0, '9614511895080', 12),
(184, 'Figurines', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 26, '165451964244', 13),
(185, 'Ajouter une figurine', 'sources/miniatures/publics/miniaturesForm.php', 1, 26, 1, 1, 1, 0, '54468840128', 13),
(186, 'Regles speciales figurines', 'sources/miniatures/publics/listFactions.php', 1, 26, 2, 1, 1, 0, '704797453468', 13),
(187, 'liste miniature of faction', 'sources/miniatures/publics/listMiniatureOfFaction.php', 0, 0, 1, 1, 1, 0, '1548580538', 13),
(188, 'Update miniature', 'sources/miniatures/publics/updateMiniatureByUser.php', 0, 0, 3, 1, 1, 0, '446912045237334', 13),
(189, 'Arme figurines', 'sources/miniatures/publics/listFactionsWeaponManagement.php', 1, 26, 3, 1, 1, 0, '7476567624', 13),
(190, 'Figurine en service actif', 'sources/miniatures/publics/listFactionMiniatureInService.php', 1, 26, 4, 1, 1, 0, '7758547441685', 13),
(191, 'liste Miniature in service', 'sources/miniatures/publics/listMiniatureInService.php', 0, 0, 0, 1, 1, 0, '23121556734', 13),
(192, 'Vehicules', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 27, '41615548607977', 14),
(193, 'Ajouter vehicule', 'sources/vehicles/publics/addVehicle.php', 1, 27, 1, 1, 1, 0, '17898655574', 14),
(194, 'Liste des vehicules', 'sources/vehicles/publics/listFactions.php', 0, 27, 2, 1, 1, 0, '4466967668053', 14),
(195, 'listVehicleFaction', 'sources/vehicles/publics/listVehicleUnfix.php', 0, 0, 1, 1, 1, 0, '96254740689', 14),
(196, 'oneVehicleUpdate', 'sources/vehicles/publics/oneVehicleupdate.php', 0, 0, 7, 1, 1, 0, '9523968197355', 14),
(197, 'Compagnies', 'modules/navigation/erreurNav.php', 1, 0, 0, 1, 1, 28, '5413912463550', 15),
(198, 'Creer une compagnie', 'sources/armyList/publics/creatArmyList.php', 1, 28, 1, 1, 1, 0, '444856144421884', 15),
(199, 'Armylist', 'sources/armyList/publics/listArmy.php', 0, 0, 1, 1, 1, 0, '5949664824', 15),
(200, 'Listes de compagnie', 'sources/armyList/publics/listFactions.php', 1, 28, 2, 1, 1, 0, '7660411168674509', 15),
(201, 'AdminArmyList', 'sources/armyList/publics/adminArmyList.php', 0, 0, 3, 1, 1, 0, '698813430834', 15),
(202, 'Armes sans faction', 'sources/weapons/public/notAffectedWeapon.php', 0, 25, 5, 1, 1, 25, '62180162610', 12),
(203, 'printList.php', 'sources/armyList/publics/printArmyList.php', 0, 0, 5, 1, 1, 0, '002541849884246', 15),
(204, 'Figurines sans faction', 'sources/miniatures/publics/listOfNFactionMiniature.php', 1, 26, 5, 1, 1, 0, '44640733552935', 13),
(205, 'Vehicules sans faction', 'sources/vehicles/publics/listOfNoFactionVehicle.php', 1, 27, 3, 1, 1, 0, '374563759996571', 14),
(206, 'Admin blog', 'modules/navigation/erreurNav.php', 1, 0, 3, 3, 1, 29, '355708278691566', 16),
(207, 'Add new article', 'modules/blog/administration/addNewArticle.php', 1, 29, 1, 3, 1, 0, '41432640897869', 16),
(208, 'Add Categories', 'modules/blog/administration/addCategorie.php', 1, 29, 2, 3, 1, 0, '447085629450', 16),
(209, 'Acceuil', 'modules/navigation/pageGeneral.php', 1, 0, 1, 3, 1, 0, '0652570414', 1),
(210, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 0, 1, 0, '261984400954489', 16),
(211, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 1, 1, 0, '254399544636566', 16),
(212, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 2, 1, 0, '6544605862', 16),
(213, 'paginationArticle', 'modules/blog/public/paginationArticles.php', 0, 0, 0, 3, 1, 0, '4592909404', 16);

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
(119, 'sources/vehicles/cud/update/updateNotInServiceVehicleByOwner.php', 1, 1, '94029969924451093853', 14),
(120, 'sources/vehicles/cud/update/updateNotInServiceVehicleByOwnerByOneVehicle.php', 1, 1, '38669675735558934674', 14),
(121, 'sources/armyList/cud/creat/creatArmyList.php', 1, 1, '93454586544586681986', 15),
(122, 'sources/armyList/cud/creat/creatMiniatureInArmyList.php', 1, 1, '42541949524756886465', 15),
(123, 'sources/armyList/cud/creat/creatVehiculeInArmyList.php', 1, 1, '03589449552534987525', 15),
(124, 'sources/armyList/cud/delete/deleteGroupArmyList.php', 1, 1, '47040914445443868943', 15),
(125, 'sources/armyList/cud/delete/deleteGroupArmyListVehicle.php', 1, 1, '12606552036650915484', 15),
(126, 'sources/armyList/cud/delete/deleteArmyList.php', 1, 1, '64667028683456637550', 15),
(127, 'sources/armyList/cud/delete/deleteArmyListFaction.php', 1, 1, '05648604666647642793', 15),
(128, 'sources/weapons/cud/update/affectedFactionOfOneWeapon.php', 1, 1, '62624798012655489575', 12),
(129, 'modules/blog/CUD/creat/addNewArticle.php', 3, 1, '53641618697764862565', 16),
(130, 'modules/blog/CUD/creat/addCategorie.php', 3, 1, '87475205487380568083', 16),
(131, 'modules/blog/CUD/update/updateCategorie.php', 3, 1, '41625541378585255526', 16);

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
(1, 'asc0WFtBao', 'christophe.calmes2020@laposte.net', 'Christophe', 'Calmes', 'Admin', '$2y$10$oADkGPsXhTD1m1.vawEEJevfSC1BwODMOuCHCntUrBQgpV5TmLy6S', 1, 2, '2022-06-12 14:26:13'),
(57, 'w2jbaXpwin', 'christophe.calmes22@gmail.com', 'Christophe', 'Calmes', 'Membre', '$2y$10$XyTgD4YJUyRXmYb5rJ7IGeCw5c..lxXVGNCEw2XdpS6GOtOfzvGfW', 1, 1, '2024-05-15 14:33:10'),
(58, '16FloCicojVhfCym', 'gestionnaire@gmail.com', 'Christophe', 'Calmes', 'Gestionnaire', '$2y$10$gIj/T1GuebPFWQwoR0GBcueEDa6Rc30/03E7.WE/Qp6rnbaZUy132', 1, 3, '2024-05-15 16:28:55'),
(59, 'vjfS1Gruok', 'aresh@gmail.com', 'Christophe', 'Calmes', 'Aresh', '$2y$10$gt8CLzPRNbKJDBkuMl3DY.etNoPWYRxs/0ll.XgQ6xdIzkzD2GGRS', 1, 1, '2024-06-17 17:19:46');

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
  MODIFY `idConnexion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `idNav` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `routageForm`
--
ALTER TABLE `routageForm`
  MODIFY `idForm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

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
