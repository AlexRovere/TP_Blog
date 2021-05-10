-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 10 mai 2021 à 15:10
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_article` longtext,
  `date_creation_article` varchar(45) DEFAULT NULL,
  `date_publication_article` varchar(45) DEFAULT NULL,
  `categorie_id_categorie` int(11) NOT NULL,
  `titre_article` varchar(255) NOT NULL,
  `statut_article` enum('Brouillon','Publié','Corbeille') NOT NULL DEFAULT 'Brouillon',
  PRIMARY KEY (`id_article`),
  KEY `fk_article_categorie_idx` (`categorie_id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `contenu_article`, `date_creation_article`, `date_publication_article`, `categorie_id_categorie`, `titre_article`, `statut_article`) VALUES
(2, 'bonjour', '2021-05-10', NULL, 1, '1er article', 'Publié'),
(3, 'bonjour', '2021-05-10', NULL, 1, '1er article', 'Publié'),
(5, '', '2021-05-10', NULL, 1, '', 'Publié'),
(7, '', '2021-05-10', NULL, 1, '', 'Publié'),
(9, '', '2021-05-10', NULL, 1, '', 'Publié'),
(10, '', '2021-05-10', NULL, 2, 'deuxième article', 'Publié'),
(11, '', '2021-05-10', NULL, 2, 'troisième article', 'Publié'),
(12, 'hello', '2021-05-10', NULL, 1, 'troisième article', 'Publié'),
(13, 'zbla', '2021-05-10', NULL, 2, 'deuxième article', 'Publié'),
(14, 'bonjour', '2021-05-10', NULL, 2, 'techno', 'Publié'),
(15, 'plein de contenuplein de contenuplein de contenuplein de contenuplein de contenuplein de contenuplein de contenuplein de contenu', '2021-05-10', NULL, 2, 'visual', 'Publié');

-- --------------------------------------------------------

--
-- Structure de la table `article_has_tag`
--

DROP TABLE IF EXISTS `article_has_tag`;
CREATE TABLE IF NOT EXISTS `article_has_tag` (
  `article_id_article` int(11) NOT NULL,
  `tag_id_tag` int(11) NOT NULL,
  PRIMARY KEY (`article_id_article`,`tag_id_tag`),
  KEY `fk_article_has_tag_tag1_idx` (`tag_id_tag`),
  KEY `fk_article_has_tag_article1_idx` (`article_id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_has_tag`
--

INSERT INTO `article_has_tag` (`article_id_article`, `tag_id_tag`) VALUES
(11, 1),
(12, 1),
(15, 1),
(10, 2),
(13, 2),
(14, 2),
(15, 2),
(10, 3),
(13, 3),
(14, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(45) DEFAULT NULL,
  `description_categorie` text,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `description_categorie`) VALUES
(1, 'sport', NULL),
(2, 'cuisine', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tag` varchar(45) DEFAULT NULL,
  `description_tag` text,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id_tag`, `nom_tag`, `description_tag`) VALUES
(1, 'sante', NULL),
(2, 'alimentation', NULL),
(3, 'technologie', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_categorie` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `article_has_tag`
--
ALTER TABLE `article_has_tag`
  ADD CONSTRAINT `fk_article_has_tag_article1` FOREIGN KEY (`article_id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_has_tag_tag1` FOREIGN KEY (`tag_id_tag`) REFERENCES `tag` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
