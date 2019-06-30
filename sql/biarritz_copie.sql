-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 30 juin 2019 à 22:31
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
(95, '61 Boulevard Beaumarchais', 75003, 'paris', 'France', NULL),
(98, '12 avenue Edouard VII', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.918222671094!2d-1.5609816844658069!3d43.483176979127386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad81bb912b5%3A0x297f061521e8d6c6!2s12+Avenue+Edouard+VII%2C+64200+Biarritz!5e0!3m2!1sfr!2sfr!4v1560810250352!5m2!1sfr!2sfr'),
(99, '5 square d\'Ixelles', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.376657483892!2d-1.5601604844660946!3d43.473609279127864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad6813b0809%3A0xab1cbcdf91ac0a99!2sBiarritz+Ev%C3%A8nement!5e0!3m2!1sfr!2sfr!4v1561919261756!5m2!1sfr!2sfr'),
(100, 'Villa Natacha – 110, rue d’Espagne', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.376657483892!2d-1.5601604844660946!3d43.473609279127864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad6813b0809%3A0xab1cbcdf91ac0a99!2sBiarritz+Ev%C3%A8nement!5e0!3m2!1sfr!2sfr!4v1561919261756!5m2!1sfr!2sfr'),
(101, 'Villa Natacha – 110, rue d’Espagne', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.376657483892!2d-1.5601604844660946!3d43.473609279127864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad6813b0809%3A0xab1cbcdf91ac0a99!2sBiarritz+Ev%C3%A8nement!5e0!3m2!1sfr!2sfr!4v1561919261756!5m2!1sfr!2sfr'),
(102, 'Hôtel de Ville, 12 avenue Edouard VII', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.922262244594!2d-1.5608014844657954!3d43.48309267912759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad8194c45d9%3A0x346ef8b0c9e093b7!2sMairie+de+Biarritz!5e0!3m2!1sfr!2sfr!4v1561919992797!5m2!1sfr!2sfr'),
(103, '19 Rue Yves Toudic', 75010, 'Paris', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.3564642210663!2d2.360851415712846!3d48.87048077928864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e0950555883%3A0x25e6ea66d950d9ec!2s19+Rue+Yves+Toudic%2C+75010+Paris!5e0!3m2!1sfr!2sfr!4v1561921162478!5m2!1sfr!2sfr'),
(104, '19 Rue Yves Toudic', 75010, 'Paris', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.3564642210663!2d2.360851415712846!3d48.87048077928864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e0950555883%3A0x25e6ea66d950d9ec!2s19+Rue+Yves+Toudic%2C+75010+Paris!5e0!3m2!1sfr!2sfr!4v1561921162478!5m2!1sfr!2sfr'),
(105, '1B Place Georges Clemenceau', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.920316733105!2d-1.5598468844657765!3d43.48313327912758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516b287e8139d7%3A0xcfa1d799d6914d13!2sMiremont!5e0!3m2!1sfr!2sfr!4v1561922653923!5m2!1sfr!2sfr'),
(106, '1B Place Georges Clemenceau', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.920316733105!2d-1.5598468844657765!3d43.48313327912758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516b287e8139d7%3A0xcfa1d799d6914d13!2sMiremont!5e0!3m2!1sfr!2sfr!4v1561922653923!5m2!1sfr!2sfr'),
(109, '2 rue Ambroise Paré', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.990430899307!2d-1.556498484465829!3d43.4816700791276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad0c47e0a49%3A0x4d705d5a940096af!2s2+Rue+Ambroise+Par%C3%A9%2C+64200+Biarritz!5e0!3m2!1sfr!2sfr!4v1561922862943!5m2!1sfr!2sfr'),
(110, '11 Avenue Sarasate', 64200, 'BIARRITZ', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.763947483872!2d-1.5535959844657135!3d43.48639637912738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516adb14990a35%3A0xf9757bd7a91c6930!2s11+Avenue+Sarasate%2C+64200+Biarritz!5e0!3m2!1sfr!2sfr!4v1561923927887!5m2!1sfr!2sfr'),
(111, '11 Avenue Sarasate', 64200, 'BIARRITZ', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.7255713455656!2d-1.5543141844656474!3d43.48719717912742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516adb6fddc6f9%3A0xde380fa3e84fd309!2s12+Avenue+Sarasate%2C+64200+Biarritz!5e0!3m2!1sfr!2sfr!4v1561924111400!5m2!1sfr!2sfr'),
(112, 'Avenue du Lac Marion', 64200, 'Biarritz', 'France', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.6958903236027!2d-1.5485657844663103!3d43.46694577912807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd511531de074fab%3A0x18fc5107f322b568!2sAvenue+du+Lac+Marion%2C+64200+Biarritz!5e0!3m2!1sfr!2sfr!4v1561925347187!5m2!1sfr!2sfr');

-- --------------------------------------------------------

--
-- Structure de la table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_from` date NOT NULL,
  `bill_to` date NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `amount_due` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'spectacle'),
(2, 'exposition'),
(3, 'sport'),
(9, 'stationnement'),
(10, 'conférence');

-- --------------------------------------------------------

--
-- Structure de la table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
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
(1, 'LE BALEINIER SAN JUAN', 'La renaissance du San Juan, baleinier basque du XVIème siècle. En 1563, le San Juan, construit dans les chantiers navals de la baie de Pasaia, en Guipuzcoa, hisse les voiles direction Terre-Neuve et la chasse à la baleine.', '<p class=\"p1\">La renaissance du San Juan, baleinier basque du XVI&egrave;me si&egrave;cle. En 1563, le San Juan, construit dans les chantiers navals de la baie de Pasaia, en Guipuzcoa, hisse les voiles direction Terre-Neuve et la chasse &agrave; la baleine. Une temp&ecirc;te, le navire sombre et reste endormi plus de quatre si&egrave;cles pr&egrave;s des c&ocirc;tes de l&rsquo;actuel Canada.</p>', '2019-07-27', '18:00:00', '0573821392', 1, '2019-06-30', '2019-06-30 19:25:35', 106, 2),
(4, 'MASCULIN // FÉMININ : QUAND L’ART L’EMPORTE', 'Affirmer que les femmes sont sous-représentées dans l’histoire de la création artistique est un euphémisme.', '<p><span style=\"color: #232323; font-family: rubik_regular, Arial, Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">Affirmer que les femmes sont sous-repr&eacute;sent&eacute;es dans l&rsquo;histoire de la cr&eacute;ation artistique est un euph&eacute;misme. Dans notre soci&eacute;t&eacute; patriarcale occidentale, l&rsquo;homme a domin&eacute; l&rsquo;histoire de l&rsquo;art en tant que g&eacute;nie cr&eacute;ateur, d&eacute;cideur du bon go&ucirc;t et collectionneur critique.</span></p>', '2019-07-11', '19:00:00', '05 59 22 28 86', 1, '2019-06-30', '2019-06-30 19:35:33', 109, 10),
(5, 'ABASTO - MÉLODIES SUD-AMÉRICAINES', 'ABASTO, du nom d’un vieux quartier de Buenos Aires, réunit trois excellents musiciens autour  de Simone Etcheverry, à la voix toujours aussi envoûtante.', '<p class=\"p1\">ABASTO, du nom d&rsquo;un vieux quartier de Buenos Aires, r&eacute;unit trois excellents musiciens autour</p>\r\n<p class=\"p1\">de Simone Etcheverry, &agrave; la voix toujours aussi envo&ucirc;tante.</p>\r\n<p class=\"p1\">L&rsquo;accord&eacute;on magique de J&eacute;sus Aured, aussi &agrave; l&rsquo;aise avec Bach qu&rsquo;avec Piazzola.</p>', '2019-07-03', '15:00:00', '0573847343', 1, '2019-06-30', '2019-06-30 19:45:48', 110, 1),
(6, 'LE BAL DES ÂMES VALOISES', 'Alice va perdre connaissance et commencer à vagabonder dans un monde parallèle, étrange. Un spectacle pleins de mystères et de fantaisies.', '<p class=\"p1\">\"Que se passe-t-il lorsque l\'on tombe dans le coma? Restons-nous inerte ou est-ce que notre esprit s\'&eacute;vade au gr&egrave;s de nos envies? Ce sont des r&ecirc;ves? Des cauchemars? Des blancs ou des trous noirs? Bienvenues dans l\'incident.</p>', '2019-07-04', '18:30:00', '0634348723', 1, '2019-06-30', '2019-06-30 19:48:57', 111, 1),
(7, 'COURSES AU TROT À L\'HIPPODROME DE BIARRITZ', 'La piste de l\'Hippodrome des Fleurs est atypique avec ses virages relevés et sa corde à droite. D\'une longueur de 803 mètres, elle est une des plus courtes de France.', '<p><span style=\"color: #525252; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\">La piste de l\'Hippodrome des Fleurs est atypique avec ses virages relev&eacute;s et sa corde &agrave; droite. D\'une longueur de 803 m&egrave;tres, elle est une des plus courtes de&nbsp;</span><a class=\"al\" style=\"box-sizing: inherit; text-decoration-line: none; color: #0000e0; transition: all 0.2s ease-out 0s; border-bottom: 1px dashed rgba(153, 153, 153, 0.3); font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\" href=\"https://www.eterritoire.fr/tout/france\">France</a><span style=\"color: #525252; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\">. Sa proximit&eacute; avec le public permet &agrave; celui-ci de vivre intens&eacute;ment le&nbsp;</span><a class=\"al\" style=\"box-sizing: inherit; text-decoration-line: none; color: #0000e0; transition: all 0.2s ease-out 0s; border-bottom: 1px dashed rgba(153, 153, 153, 0.3); font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\" href=\"https://www.eterritoire.fr/tout/spectacle\">spectacle</a><span style=\"color: #525252; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\">&nbsp;qui se d&eacute;roule sous ses yeux.&nbsp;</span><br style=\"box-sizing: inherit; color: #525252; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\" /><a class=\"al\" style=\"box-sizing: inherit; text-decoration-line: none; color: #0000e0; transition: all 0.2s ease-out 0s; border-bottom: 1px dashed rgba(153, 153, 153, 0.3); font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\" href=\"https://www.eterritoire.fr/tout/restauration\">Restauration</a><span style=\"color: #525252; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\">&nbsp;</span><a class=\"al\" style=\"box-sizing: inherit; text-decoration-line: none; color: #0000e0; transition: all 0.2s ease-out 0s; border-bottom: 1px dashed rgba(153, 153, 153, 0.3); font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\" href=\"https://www.eterritoire.fr/tout/restauration-sur-place\">sur place</a><span style=\"color: #525252; font-family: \'Open Sans\', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #fafafa;\">.</span></p>', '2019-07-04', '20:00:00', '0987654321', 1, '2019-06-30', '2019-06-30 20:09:38', 112, 3);

-- --------------------------------------------------------

--
-- Structure de la table `faq_answers`
--

CREATE TABLE `faq_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq_answers`
--

INSERT INTO `faq_answers` (`id`, `answer`, `question_id`) VALUES
(4, 'Tous les Biarrots / Biarrotes peuvent profiter de tarifs préférentiels pour se garer dans les rues de la ville. Pour ce faire, il est nécessaire d\'ouvrir ses droits auprès du service Tranquillité Urbaine (STU).', 6),
(5, 'Il n’est jamais trop tard pour débuter une activité physique et sportive ! Il y a cependant un certain nombre de règles à respecter.', 7),
(6, 'Oui, car il ne faut pas croire que l’intensité d’un effort soit proportionnelle à son efficacité en terme de bénéfice santé.', 8),
(7, 'QUELS BÉNÉFICES PEUT-ON ATTENDRE D’UNE ACTIVITÉ PHYSIQUE RÉGULIÈRE, EN CAS DE SURPOIDS ?', 9),
(8, 'Vous pouvez vous adresser aux points de vente habituels tels que la Fnac pour vous en procurer.', 10),
(9, 'En cas d\'annulation du spectacle, si vous souhaitez vous faire rembourser, merci de vous adresser au point de vente auprès duquel le billet a été acheté', 11),
(10, 'Les bouteilles sans bouchons et les sandwichs sont autorisées dans l\'enceinte du Zénith. Les boissons alcoolisées sont cependant interdites.', 12),
(11, 'Oui, un vestiaire payant est à votre disposition (CHF 2.- par article)', 13),
(12, 'Non. Par contre, des distributeurs se trouvent à la gare Genève-Aéroport et à l’aéroport situés à 200m de l’exposition.', 14),
(13, 'La demande de stationnement est supérieure à l\'offre et elle augmente régulièrement dans les centres villes des grandes agglomérations : organiser, maîtriser l\'utilisation de l\'espace public et permettre le partage répond au besoin de gérer un espace devenu étroit.', 16),
(14, 'Favoriser la rotation en limitant la durée de stationnement sur une place devient une nécessité pour rendre le centre ville toulousain accessible au plus grand nombre.', 17),
(15, 'Il s’agit d’une solution de conférence en ligne. Via notre interface, Studio, vous créez une conférence, vous invitez des participants en leur envoyant les informations de connexion par courriel. Au moment prévu pour la conférence, les participants n’auront plus qu’à composer un numéro de téléphone (fourni par Ubity), un numéro de conférence et un code d’accès.', 18);

-- --------------------------------------------------------

--
-- Structure de la table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `question`, `category_id`) VALUES
(6, 'Comment obtenir une carte de stationnement sur la Ville ?', 9),
(7, 'J’AI 40 ANS ET JE SOUHAITE DÉBUTER UNE ACTIVITÉ SPORTIVE. EST-IL TROP TARD ?', 3),
(8, 'POUR FAIRE DU SPORT, ON M’A DIT QU’IL FAUT METTRE UNE TENUE ADAPTÉE. DÈS LORS QUE DOIS-JE ACHETER ?', 3),
(9, 'QUELS BÉNÉFICES PEUT-ON ATTENDRE D’UNE ACTIVITÉ PHYSIQUE RÉGULIÈRE, EN CAS DE SURPOIDS ?', 3),
(10, 'Où acheter des billets pour un spectacle ?', 1),
(11, 'Le spectacle auquel je devais me rendre est annulé, comment me faire rembourser ?', 1),
(12, 'Puis-je venir avec mon sandwich et ma boisson ?', 1),
(13, 'Y-a-t-il un vestiaire ?', 2),
(14, 'Y-a-t-il un moyen de retirer du cash à un distributeur dans l’exposition ?', 2),
(16, 'Pourquoi le stationnement n\'est-il pas gratuit ?', 9),
(17, 'Pourquoi le stationnement est-il limité en durée sur une même place ?', 9),
(18, 'QU’EST-CE QU’UN PONT-CONFÉRENCE?', 10);

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` tinyint(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `bill_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `name`, `type_id`, `service_id`, `event_id`, `bill_id`) VALUES
(105, '3112450201560811251csm_IMG_4259_1be4f75989.jpg', 1, 64, NULL, 0),
(106, '7588733741561918965csm_BZ7I6316Copyright_delphinepernaud_Biarritz_3bd7eb2605.jpg', 1, 65, NULL, NULL),
(107, '2529763601561919326csm_DSCN1685_894d7e393d.jpg', 1, 66, NULL, NULL),
(108, '1080748841561919960csm_DOSSIER18_607b77d7c8.jpg', 1, 67, NULL, NULL),
(109, '18268148631561921330ecole-du-web-paris.jpg', 1, 68, NULL, NULL),
(110, '1383336048156192133023844698_1990845894512520_141590500748526599_n.jpg', 1, 68, NULL, NULL),
(111, '15073174791561921330formation-en-alternance-2.jpg', 1, 68, NULL, NULL),
(112, '20181197651561922735csm_image002-2_ee3a3f8b3e.jpg', 1, NULL, 1, NULL),
(114, '16069955321561923333csm_Mediatheque_moyendef_fdc5e641ef.jpg', 1, NULL, 4, NULL),
(115, '10910067141561923948csm_FMAAQU064V59Z4X0_SIMONE-AFF-800x600_1ce9fad516.jpg', 1, NULL, 5, NULL),
(116, '20975465921561923948téléchargement.jpeg', 1, NULL, 5, NULL),
(117, '15836565121561923948téléchargement (1).jpeg', 1, NULL, 5, NULL),
(118, '17004538651561924137csm_FMAAQU064V5A0WLK_Colisee-3-juillet-Le-bal-des-Ames-Valoises-Studio-Ilargia_0c99798673.jpg', 1, NULL, 6, NULL),
(119, '17456769401561924137téléchargement.jpeg', 1, NULL, 6, NULL),
(120, '698759301156192537864122_commune_0.jpg', 1, NULL, 7, NULL);

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
(2, 'video'),
(3, 'pdf');

-- --------------------------------------------------------

--
-- Structure de la table `objects`
--

CREATE TABLE `objects` (
  `id` int(10) UNSIGNED NOT NULL,
  `object_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `objects`
--

INSERT INTO `objects` (`id`, `object_name`) VALUES
(4, 'voirie'),
(5, 'signalisation'),
(6, 'espaces verts'),
(7, 'proprete');

-- --------------------------------------------------------

--
-- Structure de la table `reasons`
--

CREATE TABLE `reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason_name` varchar(255) NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reasons`
--

INSERT INTO `reasons` (`id`, `reason_name`, `object_id`) VALUES
(2, 'Mobiliers', 4),
(3, 'Revêtements', 4),
(4, 'Signalisations au sol', 4),
(5, 'Feux tricolores', 5),
(6, 'Panneaux directionnels', 5),
(7, 'Panneaux sectorisations', 5),
(8, 'Poubelles', 7),
(9, 'Ramassages', 7),
(10, 'Dégradations', 7),
(11, 'Propreté de la voirie', 7),
(12, 'Parcs', 6),
(13, 'Squares', 6),
(14, 'Aires de jeu', 6),
(15, 'Espaces ornementaux', 6);

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
(64, 'ACTES DE NAISSANCE, MARIAGE, DÉCÈS', 'Vous trouverez ici toutes les infos utiles pour obtenir un acte d\'Etat Civil de la Ville de Biarritz', '<p class=\"p1\">Les demandes de documents d&rsquo;actes d&rsquo;ETAT CIVIL sont trait&eacute;es GRATUITEMENT par nos services. Prenez garde &agrave; certains sites en ligne douteux qui proposent d&rsquo;effectuer votre d&eacute;marche contre r&eacute;tribution.</p>', '0559415941', 'du lundi au vendredi', '08:30:00', '17:30:00', '2019-06-17 22:25:20', 1, 98),
(65, 'DES STRUCTURES À VOTRE ÉCOUTE', 'Les structures sociales locales vous reçoivent, vous écoutent et essaient d’apporter des solutions à vos difficultés.', '<p class=\"p1\">Le Centre d&rsquo;accueil de jour Alzheimer&nbsp;(Activit&eacute;s th&eacute;rapeutiques, salle Snoezelen,..) re&ccedil;oit&nbsp;le temps d&rsquo;une ou plusieurs journ&eacute;es par semaine, les personnes atteintes de pathologies neurod&eacute;g&eacute;n&eacute;ratives de type Alzheimer vivant &agrave; domicile, ce qui permet de soulager les aidants familiaux.</p>\r\n<p class=\"p1\">Il compl&egrave;te l&rsquo;offre g&eacute;rontologique de la commune, d&eacute;j&agrave; dot&eacute;e d&rsquo;un service d&rsquo;aide &agrave; domicile, d&rsquo;un Ehpad public, d&rsquo;un Centre d&rsquo;accueil jour autonome et d&rsquo;une unit&eacute; Alzheimer, toutes ces structures &eacute;tant g&eacute;r&eacute;es par le CCAS.&nbsp;</p>', '0559016100', 'Lundi et Mercredi', '09:00:00', '16:00:00', '2019-06-30 18:22:45', 1, 99),
(66, 'SERVICE MUNICIPAL', 'Depuis plus de 25 ans, la Ville de Biarritz est engagée dans une politique volontariste de revitalisation de la langue basque', '<p class=\"active-title fade-in mui-enter-active\" style=\"box-sizing: inherit; border: 0px; padding: 0px; margin: 0px 0px 15px; font-family: rubik_regular, Arial, Verdana, sans-serif; font-size: 1.5em; line-height: 1.6em; color: #232323; background-color: #ffffff;\"><span style=\"font-size: 15px;\">A Biarritz, la politique publique de l&rsquo;euskara r&eacute;pond &agrave; 4 enjeux interconnect&eacute;s, qui, mobilis&eacute;s simultan&eacute;ment, cr&eacute;ent un cercle vertueux autour de la motivation du locuteur&nbsp;</span></p>', '0559415755', 'dimanche - samedi', '11:00:00', '15:00:00', '2019-06-30 18:28:46', 1, 101),
(67, 'INSCRIPTION CENTRE DE LOISIRS', 'Rendez-vous sur l\'espace Famille pour effectuer cette démarche', '<p><span style=\"color: #232323; font-family: rubik_regular, Arial, Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">A Biarritz, la plateforme en ligne&nbsp;</span><span class=\"active-title fade-in mui-enter-active\" style=\"box-sizing: inherit; border: 0px; padding: 0px; margin: 0px; line-height: inherit; color: #232323; font-size: 15px; background-color: #ffffff; font-family: rubik_medium, Arial, Verdana, sans-serif !important;\">Espace Famille</span><span style=\"color: #232323; font-family: rubik_regular, Arial, Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">, regroupe toutes les d&eacute;marches &agrave; effectuer li&eacute;es &agrave; l\'enfance et &agrave; la famille. (R&eacute;servation cantine CLSH, paiement,&nbsp;activit&eacute;s piscine...).&nbsp;Pour profiter pleinement de toutes ces fonctionnalit&eacute;s,&nbsp;vous serez amen&eacute;s &agrave; cr&eacute;er votre espace personnel.&nbsp;</span><a class=\"act active-title fade-in mui-enter-active\" style=\"box-sizing: inherit; border-width: 0px 0px 1px; border-image: initial; padding: 0px 2px; margin: 0px; font-family: rubik_medium_italic, Arial, Verdana, sans-serif; background-color: #ffffff; color: #232323; text-decoration-line: none; line-height: inherit; cursor: pointer; transition: all 0.3s ease-in-out 0s; position: relative; font-size: 15px; border-color: initial initial #fdbb50 initial; border-style: initial initial solid initial;\" href=\"https://www.espace-citoyens.net/biarritz/espace-citoyens/Home/AccueilPublic\" target=\"_blank\" rel=\"noopener\"> Rendez-vous sur notre Espace Famille</a></p>', '0559415941', 'du lundi au vendredi', '08:00:00', '16:30:00', '2019-06-30 18:39:20', 1, 102),
(68, 'École Webstart', 'Webstart est un Établissement d’enseignement supérieur technique privé faisant partie du groupe d’écoles MJM Graphic Design – Fort d’une experience de plus de 40 ans.', '<p><span style=\"color: #444444; font-family: \'Open Sans\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 16px; background-color: #ffffff;\">Notre philosophie ne se limite pas &agrave; &ecirc;tre qu&rsquo;une &eacute;cole, nous sommes une agence, une start-up avec un vivier de cr&eacute;atifs qui feront d&rsquo;aujourd&rsquo;hui le monde de demain. Cette &eacute;nergie s&rsquo;applique &agrave; nos m&eacute;thodes p&eacute;dagogiques actives transmisent par nos intervenants en activit&eacute;s, jusqu&rsquo;&agrave; l&rsquo;environnement des classes o&ugrave; le mobilier transpose les &eacute;tudiants dans un mode de travail&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: \'Open Sans\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; vertical-align: baseline; color: #444444; background-color: #ffffff;\">collaboratif</span><span style=\"color: #444444; font-family: \'Open Sans\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;et&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: \'Open Sans\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; vertical-align: baseline; color: #444444; background-color: #ffffff;\">professionnalisant</span><span style=\"color: #444444; font-family: \'Open Sans\', \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 16px; background-color: #ffffff;\">.</span></p>', '0142419776', 'du lundi au vendredi', '08:00:00', '20:00:00', '2019-06-30 19:02:10', 1, 104);

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
  `account_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `email`, `password`, `dob`, `home_number`, `mobile_number`, `is_admin`, `account_confirmed`, `registered_at`, `address_id`) VALUES
(1, 'edelman', 'Yoel', 'yoeledelman@gmail.com', '709bfa738ef16be56d391ac0c367f056', '1996-06-16', NULL, NULL, 1, 0, '2019-06-06 21:21:53', 95);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

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
  ADD KEY `event_id` (`event_id`),
  ADD KEY `bill_id` (`bill_id`);

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
-- Index pour la table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_id` (`object_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `faq_answers`
--
ALTER TABLE `faq_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `media_type`
--
ALTER TABLE `media_type`
  MODIFY `id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
