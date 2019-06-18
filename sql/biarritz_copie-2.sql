-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 11 juin 2019 à 17:42
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biarritz_copie`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` int(6) UNSIGNED NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(40) DEFAULT 'France',
  `location` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `zip_code`, `city`, `country`, `location`) VALUES
(83, 'test insert event 1', 12345, 'test insert event 1', 'France', NULL),
(84, 'test insert event 2', 12345, 'test insert event 2', 'France', NULL),
(85, 'test insert event 3', 12345, 'test insert event 3', 'France', NULL),
(86, 'test insert event 4', 12345, 'test insert event 4', 'France', NULL),
(87, 'test insert event 5', 12345, 'test insert event 5', 'France', NULL),
(88, 'test insert service 1', 12345, 'test insert service 1', 'France', NULL),
(89, 'test insert service 2', 12345, 'test insert service 2', 'France', NULL),
(90, 'dasefdgh', 345, 'dasfgn', 'France', NULL),
(91, 'dasefdgh', 345, 'dasfgn', 'France', NULL),
(92, '', 2134, '', 'France', NULL),
(93, '', 2134, 'dfbg', 'France', NULL),
(94, 'test service plusieurs images', 75011, 'paris', 'France', NULL),
(95, '61 Boulevard Beaumarchais', 75003, 'paris', 'France', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_from` date NOT NULL,
  `bill_to` date NOT NULL,
  `paid` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(200) NOT NULL,
  `amount_due` tinyint(6) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted`) VALUES
(1, 'spectacle', 0),
(2, 'exposition', 0),
(3, 'sport', 0),
(4, 'test', 0),
(5, 'test insert', 0),
(6, 'test new again', 0),
(7, 'test new update normal', 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `phone_number` tinyint(15) DEFAULT NULL,
  `email` varchar(75) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `is_published` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Publiée ? oui/non',
  `published_at` date NOT NULL COMMENT 'date a publier sur le site',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `summary`, `content`, `event_date`, `event_time`, `phone_number`, `is_published`, `published_at`, `created_at`, `address_id`, `category_id`) VALUES
(12, 'test insert event 1', 'Test insert event 1', 'test insert event 1', '2019-06-02', '20:30:00', '0123456789', 1, '2019-06-02', '2019-06-02 20:03:55', 83, 1),
(13, 'test insert event 2', 'Test insert event 2', 'test insert event 2', '2019-06-04', '20:30:00', '0123456789', 1, '2019-06-03', '2019-06-02 20:04:38', 84, 2),
(14, 'test insert event 3', 'Test insert event 3', 'test insert event 3', '2019-06-12', '20:30:00', '0123456789', 1, '2019-06-02', '2019-06-02 20:05:24', 85, 3),
(15, 'test insert event 4', 'Test insert event 4', 'test insert event 4', '2019-06-12', '20:30:00', '0123456789', 1, '2019-06-02', '2019-06-02 20:06:28', 86, 4),
(16, 'test insert event 5', 'Test insert event 5', 'test insert event 5', '2019-06-13', '20:30:00', '0123456789', 1, '2019-06-02', '2019-06-02 20:07:04', 87, 5);

-- --------------------------------------------------------

--
-- Structure de la table `faq_answers`
--

CREATE TABLE `faq_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` tinyint(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `name`, `type_id`, `service_id`, `event_id`) VALUES
(88, '16611603181559505835express.jpg', 1, NULL, 12),
(89, '7804467001559505835Seigneurs_de_Dogtown_.jpg', 1, NULL, 12),
(90, '270593563155950587849864914_2387290394890568_8322540042799022080_o.jpg', 1, NULL, 13),
(91, '3457518711559505924destiny.png', 1, NULL, 14),
(92, '1201517659155950592459248d643a98b.jpg', 1, NULL, 14),
(93, '2892132241559505924ac_media_screen-pyramids_ncsa.jpg', 1, NULL, 14),
(94, '12049403651559505988test-unlink.jpg', 1, NULL, 15),
(95, '2166344981559505988test-new-img.jpeg', 1, NULL, 15),
(96, '11574140681559506024star-wars-8-1.jpg', 1, NULL, 16),
(97, '16710353381559506088test-new-img.jpeg', 1, 58, NULL),
(98, '14198118371559506287ok1-27-XDIAVEL-S-750x410.jpg', 1, 59, NULL),
(99, '19359864111559680644Seigneurs_de_Dogtown_.jpg', 1, 63, NULL),
(100, '7587835651559680644star-wars-8-1.jpg', 1, 63, NULL),
(101, '18263343131559680644fb_star-wars-derniers-jedi-box-office.jpg', 1, 63, NULL),
(102, '4168005341559680644ramones_cchalkie_davies.jpg', 1, 63, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `media_type`
--

CREATE TABLE `media_type` (
  `id` tinyint(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `media_type`
--

INSERT INTO `media_type` (`id`, `type`) VALUES
(1, 'image'),
(2, 'video');

-- --------------------------------------------------------

--
-- Structure de la table `objects`
--

CREATE TABLE `objects` (
  `id` int(10) UNSIGNED NOT NULL,
  `object_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `payment_infos`
--

CREATE TABLE `payment_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_number` tinyint(20) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reasons`
--

CREATE TABLE `reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `opening_days` varchar(255) NOT NULL,
  `hours_from` time NOT NULL,
  `hours_to` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_published` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Publiée ? oui/non',
  `address_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `summary`, `content`, `phone_number`, `opening_days`, `hours_from`, `hours_to`, `created_at`, `is_published`, `address_id`) VALUES
(58, 'test insert service 1', 'Test insert service 1', 'test insert service 1', '123456789', 'test insert service 1', '10:00:00', '20:00:00', '2019-06-02 20:08:08', 1, 88),
(59, 'test insert service 2', 'Test insert service 2', 'test insert service 2', '123456789', 'test insert service 2', '12:00:00', '18:00:00', '2019-06-02 20:11:27', 1, 89),
(60, 'dfgn', 'Qwergfhn', 'qwerfgh', '12345', 'seffrdg', '12:45:00', '12:45:00', '2019-06-03 13:51:30', 1, 90),
(61, 'dfgn', 'Qwergfhn', 'qwerfgh', '12345', 'seffrdg', '12:45:00', '12:45:00', '2019-06-03 13:53:29', 1, 91),
(62, 'dfgh', '', '', '345', 'dfdg', '23:04:00', '23:45:00', '2019-06-03 14:24:00', 0, 93),
(63, 'test service plusieurs images', 'Test service plusieurs images test service plusieurs images', 'test service plusieurs images test service plusieurs images test service plusieurs images test service plusieurs images test service plusieurs images', '123456789', 'lundi', '10:00:00', '20:00:00', '2019-06-04 20:37:24', 1, 94);

-- --------------------------------------------------------

--
-- Structure de la table `signal_problem`
--

CREATE TABLE `signal_problem` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `reason_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `home_number` varchar(15) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `email`, `password`, `dob`, `home_number`, `mobile_number`, `is_admin`, `registered_at`, `address_id`) VALUES
(1, 'edelman', 'Yoel', 'yoeledelman@gmail.com', '709bfa738ef16be56d391ac0c367f056', '1996-06-16', NULL, NULL, 1, '2019-06-06 21:21:53', 95);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `address_id` (`address_id`) USING BTREE;

--
-- Index pour la table `faq_answers`
--
ALTER TABLE `faq_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payment_infos`
--
ALTER TABLE `payment_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`) USING BTREE;

--
-- Index pour la table `signal_problem`
--
ALTER TABLE `signal_problem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_id` (`object_id`),
  ADD KEY `reason_id` (`reason_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `faq_answers`
--
ALTER TABLE `faq_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT pour la table `media_type`
--
ALTER TABLE `media_type`
  MODIFY `id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payment_infos`
--
ALTER TABLE `payment_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `signal_problem`
--
ALTER TABLE `signal_problem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `media_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
