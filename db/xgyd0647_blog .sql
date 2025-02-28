-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 28 fév. 2025 à 00:54
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
-- Base de données : `xgyd0647_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `author` int DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `article` text,
  `valid` tinyint(1) DEFAULT '1',
  `publish` tinyint(1) DEFAULT NULL,
  `creat_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `author`, `title`, `article`, `valid`, `publish`, `creat_date`, `update_date`) VALUES
(3, 58, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis justo leo. Sed nec diam ante. Etiam risus sem, molestie nec maximus ac, pulvinar nec urna. Duis id fermentum turpis, eu dapibus lacus. Duis vitae ipsum dui. Vestibulum in tellus ex. Fusce ac sapien velit. Duis consectetur lorem nisi, lobortis ullamcorper nulla commodo vel. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis molestie risus id velit aliquet, vitae faucibus purus commodo. Sed rutrum nulla vel luctus viverra. Morbi id rhoncus justo, vitae ultricies purus. Integer est ipsum, placerat eget urna sed, iaculis aliquet ligula.\r\n\r\nFusce eu libero lacus. Pellentesque tempor vulputate arcu, ac congue ipsum tempor ut. Donec sed iaculis mauris. Quisque gravida sapien in arcu ultricies molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin gravida orci non erat sollicitudin aliquam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ultricies nunc lorem, sed volutpat nisi accumsan eget. Integer sollicitudin, est a placerat maximus, ante magna rhoncus metus, sed consequat felis mi tincidunt justo.\r\n\r\nVivamus vel ex aliquam, fermentum nibh sed, porta lorem. Suspendisse lobortis dolor metus, eget ultricies urna dictum vel. Nulla eget molestie mauris, ut eleifend massa. Vestibulum congue tortor id enim scelerisque, id aliquam odio posuere. Vestibulum maximus vehicula turpis quis efficitur. Suspendisse porta neque eu tellus pharetra, sit amet convallis libero ullamcorper. Etiam placerat enim eros, id vestibulum felis eleifend quis.', 1, 1, '2025-02-28 01:18:38', '2025-02-28 01:18:38'),
(4, 58, 'Lorem Ipsum', '*sArt*\r\n*sP*\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis justo leo. Sed nec diam ante. Etiam risus sem, molestie nec maximus ac, pulvinar nec urna. Duis id fermentum turpis, eu dapibus lacus. Duis vitae ipsum dui. Vestibulum in tellus ex. Fusce ac sapien velit. Duis consectetur lorem nisi, lobortis ullamcorper nulla commodo vel. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis molestie risus id velit aliquet, vitae faucibus purus commodo. Sed rutrum nulla vel luctus viverra. Morbi id rhoncus justo, vitae ultricies purus. Integer est ipsum, placerat eget urna sed, iaculis aliquet ligula.\r\n*eP*\r\n*sP*\r\n\r\nFusce eu libero lacus. Pellentesque tempor vulputate arcu, ac congue ipsum tempor ut. Donec sed iaculis mauris. Quisque gravida sapien in arcu ultricies molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin gravida orci non erat sollicitudin aliquam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ultricies nunc lorem, sed volutpat nisi accumsan eget. Integer sollicitudin, est a placerat maximus, ante magna rhoncus metus, sed consequat felis mi tincidunt justo.\r\n*eP*\r\n*sP*\r\nVivamus vel ex aliquam, fermentum nibh sed, porta lorem. Suspendisse lobortis dolor metus, eget ultricies urna dictum vel. Nulla eget molestie mauris, ut eleifend massa. Vestibulum congue tortor id enim scelerisque, id aliquam odio posuere. Vestibulum maximus vehicula turpis quis efficitur. Suspendisse porta neque eu tellus pharetra, sit amet convallis libero ullamcorper. Etiam placerat enim eros, id vestibulum felis eleifend quis.\r\n*eP*\r\n*sP*\r\nPhasellus nec aliquam mauris. Proin id ligula eu metus bibendum bibendum id sed nulla. Integer molestie, tellus at sagittis vulputate, nibh lacus dapibus dui, sit amet tempor ex arcu interdum ex. Pellentesque leo neque, blandit at justo sed, aliquet elementum turpis. Nullam rhoncus nisl sit amet congue scelerisque. In hac habitasse platea dictumst. Phasellus scelerisque pharetra libero non tempus. Quisque commodo elit sit amet ipsum interdum aliquet. Integer sed elementum enim. Integer vel libero maximus risus cursus luctus ac non magna. Morbi euismod sed odio vel laoreet. Suspendisse sit amet tortor et sapien convallis finibus.\r\n*eP*\r\n*sP*\r\nEtiam in metus mi. Suspendisse mattis justo diam, ut mollis elit tempor vitae. Donec in ex et risus blandit pharetra vitae sit amet lorem. Nunc non mauris in nisl commodo semper sit amet non elit. Vestibulum porta eleifend commodo. Fusce et turpis enim. Aliquam eu ligula mi.\r\n*eP*\r\n*sP*\r\nNunc vulputate felis pharetra purus gravida fringilla. Nulla arcu tortor, molestie ut eleifend nec, tincidunt at velit. Vivamus purus mi, ornare quis odio sed, mattis ultricies ex. Fusce sem urna, ullamcorper ac sodales et, fermentum sed felis. Mauris risus lorem, volutpat at iaculis ut, fringilla id justo. Quisque ac tempor velit. Nullam neque nisl, dignissim et auctor ac, efficitur facilisis sem.\r\n*eP*\r\n*eArt*', 1, 0, '2025-02-28 01:21:14', '2025-02-28 01:21:14');

-- --------------------------------------------------------

--
-- Structure de la table `link_picture_article`
--

CREATE TABLE `link_picture_article` (
  `id_picture` int NOT NULL,
  `id_article` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `link_subject_article`
--

CREATE TABLE `link_subject_article` (
  `id_subject` int NOT NULL,
  `id_article` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `link_subject_article`
--

INSERT INTO `link_subject_article` (`id_subject`, `id_article`) VALUES
(2, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int NOT NULL,
  `name_picture` varchar(42) DEFAULT NULL,
  `author` int DEFAULT NULL,
  `creat_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `subject` varchar(60) DEFAULT NULL,
  `creat_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `creat_date`, `update_date`, `valid`) VALUES
(1, '# News', '2025-02-27 18:41:10', '2025-02-27 19:47:04', 1),
(2, '# Utiliser', '2025-02-27 18:44:30', '2025-02-27 19:36:27', 1),
(3, '# Dev', '2025-02-27 18:44:49', '2025-02-27 23:15:05', 1),
(4, '# Test R5', '2025-02-27 19:11:38', '2025-02-27 19:36:15', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `link_picture_article`
--
ALTER TABLE `link_picture_article`
  ADD PRIMARY KEY (`id_picture`,`id_article`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `link_subject_article`
--
ALTER TABLE `link_subject_article`
  ADD PRIMARY KEY (`id_subject`,`id_article`),
  ADD KEY `link_subject_article_ibfk_2` (`id_article`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
