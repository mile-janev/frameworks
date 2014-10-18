-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2014 at 03:24 PM
-- Server version: 5.6.21
-- PHP Version: 5.3.10-1ubuntu3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frameworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `l_comment`
--

CREATE TABLE IF NOT EXISTS `l_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `l_post`
--

CREATE TABLE IF NOT EXISTS `l_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `l_user`
--

CREATE TABLE IF NOT EXISTS `l_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_comment`
--

CREATE TABLE IF NOT EXISTS `m_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_post`
--

CREATE TABLE IF NOT EXISTS `m_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `s_comment`
--

CREATE TABLE IF NOT EXISTS `s_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `s_post`
--

CREATE TABLE IF NOT EXISTS `s_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `s_user`
--

CREATE TABLE IF NOT EXISTS `s_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `l_comment`
--
ALTER TABLE `l_comment`
  ADD CONSTRAINT `l_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `l_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `l_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `l_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `l_post`
--
ALTER TABLE `l_post`
  ADD CONSTRAINT `l_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `l_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `m_comment`
--
ALTER TABLE `m_comment`
  ADD CONSTRAINT `m_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `m_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `m_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `m_post`
--
ALTER TABLE `m_post`
  ADD CONSTRAINT `m_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_comment`
--
ALTER TABLE `s_comment`
  ADD CONSTRAINT `s_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `s_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `s_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_post`
--
ALTER TABLE `s_post`
  ADD CONSTRAINT `s_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `s_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
