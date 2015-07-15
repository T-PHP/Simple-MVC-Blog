-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 15 Juillet 2015 à 22:44
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `simpleblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `sb_categories`
--

CREATE TABLE `sb_categories` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id_parent` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_description` text NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_url` varchar(255) DEFAULT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_meta_desc` varchar(255) NOT NULL,
  `category_meta_robots` tinyint(1) NOT NULL DEFAULT '1',
  `category_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`),
  KEY `category_id_parent` (`category_id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `sb_categories`
--

INSERT INTO `sb_categories` (`category_id`, `category_id_parent`, `category_name`, `category_description`, `category_image`, `category_url`, `category_title`, `category_meta_desc`, `category_meta_robots`, `category_active`) VALUES
(4, 0, 'Home', '', '', NULL, '', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sb_members`
--

CREATE TABLE `sb_members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_lastname` varchar(255) NOT NULL,
  `member_firstname` varchar(255) NOT NULL,
  `member_username` varchar(255) DEFAULT NULL,
  `member_password` varchar(255) DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `sb_members`
--

INSERT INTO `sb_members` (`member_id`, `member_lastname`, `member_firstname`, `member_username`, `member_password`, `member_email`, `member_added`) VALUES
(1, 'Admin', 'Admin', 'Admin', '$2y$12$UwWuRhQtfROz4/mzbfgY.Oas5tReZrQK187iVEA77LMkW/9HIhMsS', 'test@test.com', '2014-12-08 18:07:19');

-- --------------------------------------------------------

--
-- Structure de la table `sb_posts`
--

CREATE TABLE `sb_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_member_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_short_description` text NOT NULL,
  `post_long_description` text NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) DEFAULT NULL,
  `post_meta_description` varchar(255) NOT NULL,
  `post_meta_robots` tinyint(1) NOT NULL DEFAULT '1',
  `post_image` varchar(255) NOT NULL,
  `post_created` datetime NOT NULL,
  `post_modified` datetime NOT NULL,
  `post_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`post_id`),
  KEY `post_category_id` (`post_category_id`),
  KEY `post_member_id` (`post_member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
