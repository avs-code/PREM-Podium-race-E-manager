-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql101.0lx.net
-- Tiempo de generación: 04-10-2016 a las 20:56:33
-- Versión del servidor: 5.6.21-69.0
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `0lx_2282133_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `type` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `1st` int(30) NOT NULL,
  `2nd` int(30) NOT NULL,
  `3rd` int(30) NOT NULL,
  `driver_photo` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `point_ruleset`
--

CREATE TABLE IF NOT EXISTS `point_ruleset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
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
  `qp1` int(11) NOT NULL DEFAULT '0',
  `qp2` int(11) NOT NULL DEFAULT '0',
  `qp3` int(11) NOT NULL DEFAULT '0',
  `qp4` int(11) NOT NULL DEFAULT '0',
  `qp5` int(11) NOT NULL DEFAULT '0',
  `fl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `track` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `laps` int(11) NOT NULL DEFAULT '0',
  `season` int(11) NOT NULL DEFAULT '0',
  `division` int(11) NOT NULL DEFAULT '0',
  `ruleset` int(11) NOT NULL DEFAULT '0',
  `ruleset_qualifying` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `maxplayers` int(11) NOT NULL DEFAULT '0',
  `result_official` tinyint(1) NOT NULL DEFAULT '0',
  `progress` int(11) NOT NULL DEFAULT '0',
  `imagelink` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `division` int(11) NOT NULL DEFAULT '0',
  `ruleset` int(11) NOT NULL DEFAULT '0',
  `ruleset_qualifying` int(11) NOT NULL DEFAULT '0',
  `maxteams` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season_team`
--

CREATE TABLE IF NOT EXISTS `season_team` (
  `season` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`season`,`team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sim_results`
--

CREATE TABLE IF NOT EXISTS `sim_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `season` int(11) NOT NULL DEFAULT '0',
  `simresults_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `logo` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_driver`
--

CREATE TABLE IF NOT EXISTS `team_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` int(11) NOT NULL DEFAULT '0',
  `driver` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `passwd` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `video_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
