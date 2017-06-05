-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql112.byethost17.com
-- Tiempo de generación: 08-12-2016 a las 17:15:49
-- Versión del servidor: 5.6.32-78.0
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `b17_19080370_prem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content_file` varchar(150) NOT NULL,
  `content_html` text NOT NULL,
  `language` varchar(150) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sort_order` (`sort_order`),
  KEY `active` (`active`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `1st` int(30) NOT NULL,
  `2nd` int(30) NOT NULL,
  `3rd` int(30) NOT NULL,
  `driver_photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `main_news`
--

CREATE TABLE IF NOT EXISTS `main_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `news` text CHARACTER SET utf8 NOT NULL,
  `day` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `point_ruleset`
--

CREATE TABLE IF NOT EXISTS `point_ruleset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `rp1` int(11) NOT NULL DEFAULT '0',
  `rp2` int(11) NOT NULL DEFAULT '0',
  `rp3` int(11) NOT NULL DEFAULT '0',
  `rp4` int(11) NOT NULL DEFAULT '0',
  `rp5` int(11) NOT NULL DEFAULT '0',
  `rp6` int(11) NOT NULL DEFAULT '0',
  `rp7` int(11) NOT NULL DEFAULT '0',
  `rp8` int(11) NOT NULL DEFAULT '0',
  `rp9` int(11) NOT NULL DEFAULT '0',
  `rp10` int(11) NOT NULL DEFAULT '0',
  `rp11` int(11) NOT NULL DEFAULT '0',
  `rp12` int(11) NOT NULL DEFAULT '0',
  `rp13` int(11) NOT NULL DEFAULT '0',
  `rp14` int(11) NOT NULL DEFAULT '0',
  `rp15` int(11) NOT NULL DEFAULT '0',
  `rp16` int(11) NOT NULL DEFAULT '0',
  `rp17` int(11) NOT NULL DEFAULT '0',
  `rp18` int(11) NOT NULL DEFAULT '0',
  `rp19` int(11) NOT NULL DEFAULT '0',
  `rp20` int(11) NOT NULL DEFAULT '0',
  `rp21` int(11) NOT NULL DEFAULT '0',
  `rp22` int(11) NOT NULL DEFAULT '0',
  `rp23` int(11) NOT NULL DEFAULT '0',
  `rp24` int(11) NOT NULL DEFAULT '0',
  `rp25` int(11) NOT NULL DEFAULT '0',
  `rp26` int(11) NOT NULL DEFAULT '0',
  `rp27` int(11) NOT NULL DEFAULT '0',
  `rp28` int(11) NOT NULL DEFAULT '0',
  `rp29` int(11) NOT NULL DEFAULT '0',
  `rp30` int(11) NOT NULL DEFAULT '0',
  `rp31` int(11) NOT NULL DEFAULT '0',
  `rp32` int(11) NOT NULL DEFAULT '0',
  `rp33` int(11) NOT NULL DEFAULT '0',
  `rp34` int(11) NOT NULL DEFAULT '0',
  `rp35` int(11) NOT NULL DEFAULT '0',
  `rp36` int(11) NOT NULL DEFAULT '0',
  `rp37` int(11) NOT NULL DEFAULT '0',
  `rp38` int(11) NOT NULL DEFAULT '0',
  `rp39` int(11) NOT NULL DEFAULT '0',
  `rp40` int(11) NOT NULL DEFAULT '0',
  `qp1` int(11) NOT NULL DEFAULT '0',
  `qp2` int(11) NOT NULL DEFAULT '0',
  `qp3` int(11) NOT NULL DEFAULT '0',
  `qp4` int(11) NOT NULL DEFAULT '0',
  `qp5` int(11) NOT NULL DEFAULT '0',
  `fl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `track` varchar(30) NOT NULL DEFAULT '',
  `laps` int(11) NOT NULL DEFAULT '0',
  `season` int(11) NOT NULL DEFAULT '0',
  `division` int(11) NOT NULL DEFAULT '0',
  `ruleset` int(11) NOT NULL DEFAULT '0',
  `ruleset_qualifying` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `maxplayers` int(11) NOT NULL DEFAULT '0',
  `result_official` tinyint(1) NOT NULL DEFAULT '0',
  `progress` int(11) NOT NULL DEFAULT '0',
  `imagelink` varchar(200) NOT NULL,
  `replay` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `race_driver`
--

CREATE TABLE IF NOT EXISTS `race_driver` (
  `race` int(11) NOT NULL DEFAULT '0',
  `team_driver` int(11) NOT NULL DEFAULT '0',
  `grid` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `fastest_lap` tinyint(1) NOT NULL DEFAULT '0',
  `laps` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`race`,`team_driver`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rules_table`
--

CREATE TABLE IF NOT EXISTS `rules_table` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `default_language` varchar(15) NOT NULL,
  `rules` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `division` int(11) NOT NULL DEFAULT '0',
  `ruleset` int(11) NOT NULL DEFAULT '0',
  `ruleset_qualifying` int(11) NOT NULL DEFAULT '0',
  `maxteams` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season_team`
--

CREATE TABLE IF NOT EXISTS `season_team` (
  `season` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`season`,`team`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sim_results`
--

CREATE TABLE IF NOT EXISTS `sim_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_name` varchar(30) NOT NULL,
  `season` int(11) NOT NULL DEFAULT '0',
  `simresults_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `standing_pages`
--

CREATE TABLE IF NOT EXISTS `standing_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `season` (`season`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `logo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_driver`
--

CREATE TABLE IF NOT EXISTS `team_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` int(11) NOT NULL DEFAULT '0',
  `driver` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `passwd` varchar(40) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(30) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
