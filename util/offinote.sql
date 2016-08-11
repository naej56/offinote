-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 29 Juillet 2016 à 00:59
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `offinote`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`categorie_id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `categorie`) VALUES
(1, 'info'),
(2, 'rappel');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
`note_id` int(11) NOT NULL,
  `entete` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contenu` longtext CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=4 ;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`note_id`, `entete`, `contenu`, `date`, `categorie_id`) VALUES
(1, 'rappel grp lafayette 1', 'PDO::ATTR_TIMEOUT: Précise la durée de timeout en secondes. Tous les pilotes ne supportent pas cette option et sa signification peut différer en fonctions des pilotes. Par exemple, sqlite attendra pendant cette période pour obtenir un verrou en écriture sur le fichier, mais les autres pilotes considèreront ceci comme un timeout de connexion ou de lecture.', '2016-07-27 23:56:54', 1),
(2, 'rappel grp lafayette 2', 'PDO::ATTR_EMULATE_PREPARES Active ou désactive la simulation des requêtes préparées. Certainspilotes ne supportent pas nativement les requêtes préparées ou en ont un support limité. Ce paramètre force PDO à émuler (TRUE) les requêtes préparées ou (FALSE) à utiliser l''interface native. Il tentera toujours une émulation si le pilote n''a pas de support natif.', '2016-07-28 00:03:09', 2),
(3, 'rappel grp lafayette 3', 'PDO::CASE_LOWER : force les noms de colonnes à être en minuscules.', '2016-07-28 00:03:15', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
 ADD PRIMARY KEY (`note_id`), ADD KEY `categorie_id` (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
