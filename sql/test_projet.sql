-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 05 mai 2019 à 19:03
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `summary`, `content`, `type`, `img`) VALUES
(1, 'Visite du chantier du Centre multisport Fournier', 'Val-d’Or, le 12 avril 2019 – La Ville de Val-d’Or a offert à ses partenaires et aux médias, cet après-midi, une visite du chantier du Centre multisport Fournier. Les entreprises Fournier et Fils, Agnico Eagle et Desjardins, ainsi que la ', 'La construction fut amorcée en juin 2018 et se terminera à la fin d’août 2019. L’ouverture officielle est prévue pour l’automne. Le nouveau centre annexé au bloc sportif de la Polyvalente Le Carrefour offrira notamment deux gymnases triples, une palestre, un mur d’escalade, une surface synthétique amovible et un dojo.\r\n\r\nCette infrastructure viendra pallier au manque actuel de plateaux sportifs et permettra le développement de plusieurs sports. De plus, elle favorisera l’adoption de saines habitudes de vie auprès de la population.\r\n', 'traveaux', '14082547811555594680test-unlink.jpg'),
(2, 'Deuxième édition de l’ORDRE DE VAL-D’OR', 'Val-d’Or, le 9 avril 2019 – La Ville de Val-d’Or désire souligner l’apport de Valdoriennes et de Valdoriens au rayonnement de notre communauté.', 'C’est lors d’une conférence de presse regroupant le premier lauréat de L’ORDRE DE VAL-D’OR, Monsieur Claude Buteau, des élus et les médias que le maire de Val-d’Or, Monsieur Pierre Corbeil, a annoncé le début de la période de dépôt des candidatures pour l’obtention de cette distinction.\r\n\r\nJusqu’au 26 avril à midi, il est possible de se procurer le formulaire au ville.valdor.qc.ca. Toutes les candidatures déposées seront analysées par un comité formé de huit (8) personnes issues de divers secteurs d’activités et du maire.\r\n\r\nLe premier magistrat a relaté l’importance de souligner les efforts de femmes et d’hommes, qui, à leur façon dans leur travail ou leurs implications à Val-d’Or, au Québec, au Canada ou ailleurs dans le monde, ont contribué au rayonnement et au développement de notre ville.\r\n', 'politique', '1551648914express.jpg'),
(3, 'Visite du chantier du Centre multisport Fournier', 'Val-d’Or, le 12 avril 2019 – La Ville de Val-d’Or a offert à ses partenaires et aux médias, cet après-midi, une visite du chantier du Centre multisport Fournier. Les entreprises Fournier et Fils, Agnico Eagle et Desjardins, ainsi que la ', 'Cette infrastructure viendra pallier au manque actuel de plateaux sportifs et permettra le développement de plusieurs sports. De plus, elle favorisera l’adoption de saines habitudes de vie auprès de la population.\r\n', 'sport', '1551648429skyrim-ok.jpg'),
(4, 'Deuxième édition de l’ORDRE DE VAL-D’OR', 'Val-d’Or, le 9 avril 2019 – La Ville de Val-d’Or désire souligner l’apport de Valdoriennes et de Valdoriens au rayonnement de notre communauté.', 'Cette infrastructure viendra pallier au manque actuel de plateaux sportifs et permettra le développement de plusieurs sports. De plus, elle favorisera l’adoption de saines habitudes de vie auprès de la population.\r\n', 'politique', '1551648365ac_media_screen-pyramids_ncsa.jpg'),
(5, 'Visite du chantier du Centre multisport Fournier', 'Val-d’Or, le 12 avril 2019 – La Ville de Val-d’Or a offert à ses partenaires et aux médias, cet après-midi, une visite du chantier du Centre multisport Fournier. Les entreprises Fournier et Fils, Agnico Eagle et Desjardins, ainsi que la ', 'Cette infrastructure viendra pallier au manque actuel de plateaux sportifs et permettra le développement de plusieurs sports. De plus, elle favorisera l’adoption de saines habitudes de vie auprès de la population.\r\n', 'Carnaval ', '155164831059248d643a98b.jpg'),
(6, 'Deuxième édition de l’ORDRE DE VAL-D’OR', 'Val-d’Or, le 9 avril 2019 – La Ville de Val-d’Or désire souligner l’apport de Valdoriennes et de Valdoriens au rayonnement de notre communauté.', 'Cette infrastructure viendra pallier au manque actuel de plateaux sportifs et permettra le développement de plusieurs sports. De plus, elle favorisera l’adoption de saines habitudes de vie auprès de la population.\r\n', 'sport', '1551648580hellfest-2018-définitive.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
