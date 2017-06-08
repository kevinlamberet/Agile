-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db684624950.db.1and1.com
-- Généré le :  Ven 02 Juin 2017 à 11:59
-- Version du serveur :  5.5.55-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db684624950`
--

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `iddocument` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `title` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `subtitle` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `origin` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `document_category_iddocument_category` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `source` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`iddocument`,`document_category_iddocument_category`),
  UNIQUE KEY `iddocument_UNIQUE` (`iddocument`),
  KEY `fk_document_document_category_idx` (`document_category_iddocument_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `document_category`
--

CREATE TABLE IF NOT EXISTS `document_category` (
  `iddocument_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `image` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`iddocument_category`),
  UNIQUE KEY `iddocument_category_UNIQUE` (`iddocument_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `document_has_tag`
--

CREATE TABLE IF NOT EXISTS `document_has_tag` (
  `document_iddocument` int(11) NOT NULL,
  `tag_idtag` int(11) NOT NULL,
  PRIMARY KEY (`document_iddocument`,`tag_idtag`),
  KEY `fk_document_has_tag_tag1_idx` (`tag_idtag`),
  KEY `fk_document_has_tag_document1_idx` (`document_iddocument`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `user_iduser` int(11) NOT NULL,
  `document_iddocument` int(11) NOT NULL,
  PRIMARY KEY (`user_iduser`,`document_iddocument`),
  KEY `fk_user_has_document_document1_idx` (`document_iddocument`),
  KEY `fk_user_has_document_user1_idx` (`user_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `idtag` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idtag`),
  UNIQUE KEY `idtag_UNIQUE` (`idtag`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`idtag`, `name`) VALUES
(1, 'erp'),
(2, 'football');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `theme_color` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `theme_font` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `theme_font_color` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `updating_date` date DEFAULT NULL,
  `username` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `usercol` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `iduser_UNIQUE` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `first_name`, `last_name`, `password`, `theme_color`, `theme_font`, `theme_font_color`, `creation_date`, `updating_date`, `username`, `email`, `usercol`) VALUES
(1, 'mael', 'chiav', 'toto', 'red', 'arial', 'red', '2017-06-07', '2017-06-07', 'mama', 'mama@gmail.com', 'red');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_document_category`
--

CREATE TABLE IF NOT EXISTS `user_has_document_category` (
  `user_iduser` int(11) NOT NULL,
  `document_category_iddocument_category` int(11) NOT NULL,
  PRIMARY KEY (`user_iduser`,`document_category_iddocument_category`),
  KEY `fk_user_has_document_category_document_category1_idx` (`document_category_iddocument_category`),
  KEY `fk_user_has_document_category_user1_idx` (`user_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_document_document_category` FOREIGN KEY (`document_category_iddocument_category`) REFERENCES `document_category` (`iddocument_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `document_has_tag`
--
ALTER TABLE `document_has_tag`
  ADD CONSTRAINT `fk_document_has_tag_document1` FOREIGN KEY (`document_iddocument`) REFERENCES `document` (`iddocument`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_document_has_tag_tag1` FOREIGN KEY (`tag_idtag`) REFERENCES `tag` (`idtag`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fk_user_has_document_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_document_document1` FOREIGN KEY (`document_iddocument`) REFERENCES `document` (`iddocument`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_document_category`
--
ALTER TABLE `user_has_document_category`
  ADD CONSTRAINT `fk_user_has_document_category_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_document_category_document_category1` FOREIGN KEY (`document_category_iddocument_category`) REFERENCES `document_category` (`iddocument_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
