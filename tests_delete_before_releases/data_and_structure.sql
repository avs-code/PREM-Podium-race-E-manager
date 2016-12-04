-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql112.byethost17.com
-- Tiempo de generación: 04-12-2016 a las 16:19:44
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

--
-- Volcado de datos para la tabla `blocks`
--

INSERT INTO `blocks` (`id`, `title`, `content_file`, `content_html`, `language`, `sort_order`, `active`) VALUES
(1, 'Next Events', 'next_events', '', 'english', 1, 1),
(2, 'Last Race', 'last_race', '', 'english', 2, 1),
(3, 'Standings', 'standings', '', 'english', 3, 1);

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

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id`, `name`, `type`) VALUES
(5, 'Blancpain GT Series Sprint Cup', 'Case D'),
(6, 'Formula 3', 'openwheel');

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

--
-- Volcado de datos para la tabla `driver`
--

INSERT INTO `driver` (`id`, `name`, `1st`, `2nd`, `3rd`, `driver_photo`) VALUES
(1, 'Spark', 0, 0, 1, 'http://spark.byethost17.com/prem/uploads/spark.png'),
(54, 'Occam', 0, 0, 1, ''),
(56, 'Fonsooo', 0, 0, 0, ''),
(57, 'Luft', 0, 0, 0, 'http://spark.byethost17.com/prem/uploads/luft.png'),
(50, 'InGuNi', 2, 1, 0, ''),
(51, 'Flame', 0, 0, 1, ''),
(52, 'flipe2001', 0, 0, 0, ''),
(53, 'Chacal', 0, 1, 0, ''),
(55, 'Munchkin', 1, 1, 0, ''),
(58, 'martinwrx', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `language_name`) VALUES
(1, 'english');

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

--
-- Volcado de datos para la tabla `main_news`
--

INSERT INTO `main_news` (`id`, `title`, `news`, `day`) VALUES
(6, 'tÃ­tulo 6', '<p>sexta noticia</p>', '2016-11-01 00:58:07'),
(5, 'tÃ­tulo 5', '<p>quinta noticia</p>', '2016-11-01 00:55:50'),
(7, 'tÃ­tulo 7', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a viverra diam. In nec neque id odio maximus convallis. Aenean tincidunt mi quam, et lobortis nulla dictum in. Cras pulvinar quis erat vel pretium. Nullam tempor, ligula vel dictum gravida, ex metus cursus sapien, quis euismod dolor dolor scelerisque mauris. Duis gravida, velit et mollis sodales, arcu sapien tristique erat, nec tincidunt purus odio a elit. Cras eget suscipit dui. Cras volutpat nec enim ut efficitur. Maecenas imperdiet velit magna, in efficitur ante pulvinar quis. Proin at pulvinar mauris. Morbi aliquam justo pretium mauris vestibulum, nec sollicitudin enim imperdiet. Sed finibus ante hendrerit nisi vestibulum, vitae molestie urna semper.</p>\r\n<p>&nbsp;</p>\r\n<p><img src="http://carsfera.com/wp-content/uploads/2016/06/formula1-gp-live.jpg" width="880" height="551" /></p>\r\n<div id="lipsum">\r\n<div id="lipsum">\r\n<p>Phasellus in molestie risus. Nulla semper massa et nulla tristique sodales. Nam rhoncus neque mauris, euismod ultrices purus suscipit sit amet. Proin mattis euismod libero, et aliquam odio pulvinar vitae. Sed faucibus diam tristique metus luctus feugiat. Duis tempor eget eros ut iaculis. Nam pretium imperdiet diam, vel finibus risus accumsan eget. Ut vehicula lectus sit amet pharetra porttitor. Aliquam erat volutpat. Maecenas vel dui pellentesque tellus accumsan dictum. Cras suscipit aliquet ullamcorper.</p>\r\n<p>Aenean volutpat elit ac ultricies cursus. Integer ut velit vel urna elementum placerat id a mauris. Nulla congue id massa sed egestas. Curabitur tempus elit a lectus mattis, facilisis ullamcorper felis scelerisque. Sed porta orci eu efficitur semper. Nam lectus risus, varius vitae lorem sit amet, molestie vestibulum risus. Aenean rhoncus orci id leo dictum, vel dictum tortor interdum. Cras faucibus viverra metus sit amet porttitor. Integer ex urna, consequat at erat vitae, faucibus sagittis augue. Vivamus pretium consequat pharetra. Morbi condimentum, tellus sed venenatis iaculis, nisl massa sollicitudin sapien, eu viverra arcu est sit amet purus. Etiam auctor risus pharetra massa commodo gravida. Nullam non nibh ullamcorper, vulputate sapien eu, venenatis quam.</p>\r\n</div>\r\n</div>', '2016-11-01 01:00:38');

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
  `qp1` int(11) NOT NULL DEFAULT '0',
  `qp2` int(11) NOT NULL DEFAULT '0',
  `qp3` int(11) NOT NULL DEFAULT '0',
  `qp4` int(11) NOT NULL DEFAULT '0',
  `qp5` int(11) NOT NULL DEFAULT '0',
  `fl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `point_ruleset`
--

INSERT INTO `point_ruleset` (`id`, `name`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `rp7`, `rp8`, `rp9`, `rp10`, `rp11`, `rp12`, `rp13`, `rp14`, `rp15`, `qp1`, `qp2`, `qp3`, `qp4`, `qp5`, `fl`) VALUES
(2, 'WTCC', 30, 23, 19, 16, 13, 10, 7, 4, 2, 1, 0, 0, 0, 0, 0, 5, 4, 3, 2, 1, 0),
(4, 'BlancPaint D case', 25, 18, 15, 12, 10, 8, 6, 4, 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(5, 'Formula 3', 25, 18, 15, 12, 10, 8, 6, 4, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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

--
-- Volcado de datos para la tabla `race`
--

INSERT INTO `race` (`id`, `name`, `track`, `laps`, `season`, `division`, `ruleset`, `ruleset_qualifying`, `date`, `maxplayers`, `result_official`, `progress`, `imagelink`, `replay`) VALUES
(10, 'Monza Italy', 'Autodromo Nazionale', 20, 4, 5, 4, 4, '2016-09-12 02:30:00', 24, 1, 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Monza_track_map.svg/2000px-Monza_track_map.svg.png', 'https://mega.nz/#!pMoyERJK!6GYYHDQcs3JUfZPpGD9XFfTMVs-qdDR4lOLbpZRwcMA'),
(11, 'A. Vallelunga Piero Taruffi', 'Autodromo Vallelunga Piero T.', 20, 4, 5, 4, 4, '2016-09-18 03:00:00', 20, 1, 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Autodromo_Vallelunga.svg/1280px-Autodromo_Vallelunga.svg.png', ''),
(13, 'Silverstone International', 'Silverstone Circuit', 37, 4, 5, 4, 4, '2016-09-25 03:30:00', 20, 1, 2, 'http://silverstone.co.uk/wp-content/uploads/2016/05/si2417_map_international_v7.png__2744x3371_q85_crop_subsampling-2_upscale-834x1024.png', 'https://mega.nz/#!8d4BRYaL!KuPxvJIhsVJcREXyOU9G8p8ERC9TRop-b6YD6Nk16hc'),
(14, 'GP short circuit 3.8km', 'Circuit Paul Ricard', 26, 4, 5, 4, 4, '2016-10-16 03:00:00', 20, 1, 2, 'http://motorsportm8.com/wp-content/uploads/2014/04/Image80.png', ''),
(15, 'Spa-Francorchamps GT3', 'Circuito de Spa-Francorchamps', 18, 4, 5, 4, 4, '2016-10-30 03:00:00', 20, 1, 2, 'https://upload.wikimedia.org/wikipedia/commons/5/54/Spa-Francorchamps_of_Belgium.svg', 'https://mega.nz/#!kBY3nDQB!6ou4yXkfW6owzjPnQnXMCC6Ovznu-x5wqW4NtjMesSA'),
(16, 'Budapest Truck Grand Prix', 'Hungaroring', 23, 4, 5, 4, 4, '2016-11-13 04:00:00', 20, 1, 2, 'https://upload.wikimedia.org/wikipedia/commons/9/91/Hungaroring.svg', 'https://mega.nz/#!3kwGyL6T!FfAPPgVBnjQxhegR5tcuOiybDiTe9WFPpxOiAceiu0s'),
(17, 'Bridgehampton', 'Bridgehampton Race Circuit', 25, 4, 5, 4, 4, '2016-12-04 04:00:00', 20, 1, 2, 'http://bridgehamptonraceway.net/wp-content/uploads/2016/04/UsE-THIStrackscan.jpg', 'https://mega.nz/#!QMwg1KaY!LE7aMk3-ulAnZrlEqmffnEUGoaVJ7DWPPWrlmZWsI9I'),
(19, 'Mazda Raceway', 'Laguna Seca', 30, 4, 5, 4, 4, '2016-12-11 04:00:00', 20, 0, 0, 'https://upload.wikimedia.org/wikipedia/commons/5/57/Laguna_Seca.svg', ''),
(20, 'sin_season', 'sin_season', 20, 0, 5, 4, 4, '2016-12-11 17:00:00', 20, 0, 0, 'https://upload.wikimedia.org/wikipedia/commons/8/88/Sq_blank.svg', '');

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

--
-- Volcado de datos para la tabla `race_driver`
--

INSERT INTO `race_driver` (`race`, `team_driver`, `grid`, `position`, `fastest_lap`, `laps`, `time`, `status`) VALUES
(10, 80, 2, 2, 0, 20, 2424370, 0),
(10, 76, 6, 5, 0, 17, 353000, 1),
(10, 82, 4, 4, 0, 19, 2478016, 0),
(10, 75, 1, 1, 1, 20, 2335867, 0),
(10, 83, 5, 3, 0, 20, 2456008, 0),
(11, 92, 8, 8, 0, 0, 0, 3),
(11, 87, 4, 7, 0, 20, 2155045, 0),
(11, 83, 6, 6, 0, 20, 2151051, 0),
(11, 93, 5, 5, 0, 20, 2147046, 0),
(11, 82, 3, 4, 0, 20, 2137039, 0),
(11, 91, 7, 3, 1, 20, 2061037, 0),
(11, 86, 2, 2, 0, 20, 2052000, 0),
(11, 75, 1, 1, 0, 20, 2039193, 0),
(13, 82, 3, 3, 0, 37, 2613212, 0),
(13, 92, 6, 6, 0, 37, 2704311, 0),
(13, 75, 2, 2, 0, 37, 2533155, 0),
(13, 93, 4, 4, 0, 37, 2668642, 0),
(13, 86, 1, 1, 1, 37, 2512659, 0),
(13, 83, 7, 7, 0, 36, 2736903, 0),
(13, 91, 8, 8, 0, 0, 0, 3),
(13, 87, 5, 5, 0, 37, 2688189, 0),
(14, 92, 8, 8, 0, 0, 0, 3),
(14, 86, 7, 7, 0, 0, 0, 3),
(14, 91, 6, 6, 0, 0, 0, 3),
(14, 87, 5, 5, 0, 10, 965492, 1),
(14, 83, 4, 4, 0, 25, 2483564, 0),
(14, 93, 3, 3, 0, 26, 2480710, 0),
(14, 75, 1, 2, 0, 26, 2449668, 0),
(14, 82, 2, 1, 1, 26, 2448608, 0),
(15, 92, 8, 8, 0, 0, 0, 3),
(15, 83, 4, 3, 0, 17, 2838742, 0),
(15, 82, 1, 1, 0, 18, 2801489, 0),
(15, 93, 5, 4, 0, 16, 2626341, 1),
(15, 75, 3, 5, 1, 17, 2578392, 1),
(15, 86, 2, 2, 0, 18, 2874459, 0),
(15, 80, 7, 7, 0, 0, 0, 3),
(15, 91, 6, 6, 0, 0, 0, 3),
(16, 102, 2, 1, 1, 21, 2454396, 0),
(16, 75, 3, 2, 0, 21, 2495195, 0),
(16, 83, 5, 5, 0, 20, 2535045, 0),
(16, 93, 6, 4, 0, 20, 2488449, 0),
(16, 82, 4, 6, 0, 19, 2510158, 0),
(16, 92, 7, 7, 0, 0, 0, 3),
(16, 87, 8, 8, 0, 0, 0, 3),
(16, 86, 1, 3, 0, 21, 2513498, 0),
(16, 91, 9, 9, 0, 0, 0, 3),
(17, 93, 4, 5, 0, 24, 2526862, 0),
(17, 87, 9, 9, 0, 0, 0, 3),
(17, 86, 3, 2, 0, 27, 2561732, 0),
(17, 82, 6, 6, 0, 1, 115800, 1),
(17, 102, 2, 3, 0, 27, 2494112, 0),
(17, 83, 5, 4, 0, 10, 1066970, 1),
(17, 75, 1, 1, 1, 27, 2462877, 0),
(17, 92, 7, 7, 0, 0, 0, 3),
(17, 91, 8, 8, 0, 0, 0, 3);

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

--
-- Volcado de datos para la tabla `rules_table`
--

INSERT INTO `rules_table` (`id`, `default_language`, `rules`) VALUES
(1, 'english', '<div class="w3-container">\r\n<p>&nbsp;10/08/2016</p>\r\n<h1>Indice:</h1>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" title="Reglas de conducci&oacute;n" href="#reglas_de_conduccion_bp">Reglas de conducci&oacute;n</a></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" title="Campeonato blancpain E111" href="#reglas_del_campeonato_bp_y_server">Reglas de nuestro Campeonato blancpain E111</a></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="#ajustes_del_server_bp">Ajustes del servidor</a></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="#circtuitos_bp">Circuitos blancpain de nuestro campeonato</a></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="#coches_bp">Coches blancpain de nuestro campeonato y skins.</a></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="#otros_mods">Otros mods</a></span></p>\r\n<h1>NORMATIVA Real:</h1>\r\n<h2><span style="color: #0000ff;"><strong><a style="color: #0000ff;" href="https://www.fiawtcc.com/wp-content/uploads/2015/02/FIA-WTCC-2016-Sporting-Regulations-290316.pdf" target="_blank">1. Normativa completa WTCC</a></strong></span></h2>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<h2><span style="color: #0000ff;"><strong><a style="color: #0000ff;" href="http://www.racb.com/fileadmin/library/Reglements%20General%20site/Circuit%20-%20Blancpain%20Endurance%20Series/Blancpain_GT_Series_2016_Sporting_Regulations_S02_FINAL.pdf" target="_blank">1. Normativa completa BlancPain</a></strong></span></h2>\r\n<p>&nbsp;</p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="http://www.blancpain-gt-series.com/images/documents/2016%20SRO%20Series-Team%20Presentation-Final.pdf" target="_blank">1.b Normas resumen y presentaci&oacute;n de la serie.</a></span><br /><span style="color: #0000ff;"> <a style="color: #0000ff;" href="http://www.fia.com/file/46790/download/12337?token=YNFCpbC2" target="_blank">1.c Regulaci&oacute;n deportiva FIA GT world CUP</a></span></p>\r\n<p>&nbsp;</p>\r\n<p>En las sprint cups series no est&aacute; permitido repostar durante la carrera.<br /> Un tipo de neumatico seco y uno mojado ser&aacute; designado por el fabricante de neumaticos para cada carrera.<br /> Una parada es obligatoria a la mitad de la duraci&oacute;n de la carrera, en ese momento se abre una ventana de tiempo para entrar (en el caso de la carrera de Hungr&iacute;a 1h de duraci&oacute;n, cuando faltaban 34 minutos para finalizar la carrera se abrieron los pits durante 10 minutos).</p>\r\n<h3>Extracto de</h3>\r\n<h1><a id="reglas_de_conduccion_bp"></a>R</h1>\r\n<h1>Reglas de conducci&oacute;n</h1>\r\n<h3>de FIA GT world cup y Blancpain GT Sporting Regulations</h3>\r\n<p>19.1 El conductor debe conducir el coche solo y sin ayuda.</p>\r\n<p>19.2 Los conductores no est&aacute;n autorizados a participar en cualquier entrenamiento, clasificaci&oacute;n o carrera ADICIONAL dentro/durante el evento.</p>\r\n<p>19.3 Los conductores deben utilizar la pista en todo momento. Para evitar dudas las l&iacute;neas blancas que definen los bordes de la pista se consideran parte de la pista, pero los bordillos no lo son. Un conductor ser&aacute; juzgado por haber salido de la pista si ninguna parte del coche permanece en contacto con la pista. En caso de que un coche abandone la pista por cualquier motivo el conductor puede reincorporarse de nuevo a la pista. Sin embargo, esto s&oacute;lo puede hacerse cuando sea seguro hacerlo y sin obtener ninguna ventaja. A discreci&oacute;n absoluta del Director de carrera un conductor puede tener que dar la oportunidad de devolver la totalidad de cualquier ventaja que obtuvo al dejar la pista. Un conductor no podr&aacute; abandonar deliberadamente la pista sin raz&oacute;n justificable.</p>\r\n<p>19.4 M&aacute;s de un cambio de direcci&oacute;n para defender una posici&oacute;n no est&aacute; permitido. Cualquier conductor se mueve de nuevo hacia la l&iacute;nea de carrera, habiendo anteriormente defendi&oacute; su posici&oacute;n de fuera de l&iacute;nea, debe dejar por lo menos la anchura de un coche entre su propio coche y el borde de la pista en la aproximaci&oacute;n a la curva.</p>\r\n<p>19.5 Las maniobras que puedan obstaculizar a otros conductores, tales como acorralamiento deliberado de un coche m&aacute;s all&aacute; del borde de la pista o cualquier otro cambio anormal de la direcci&oacute;n, no est&aacute;n permitidos.</p>\r\n<p>19.6 Tan pronto como un coche es alcanzado por otro veh&iacute;culo que est&aacute; a una vuelta de ventaja (dobla al piloto que tiene delante) durante la carrera, el conductor debe permitir que el conductor m&aacute;s r&aacute;pido le adelante en la primera oportunidad disponible. Si el conductor que ha sido alcanzado no permite el el adelantamiento al conductor m&aacute;s r&aacute;pido, se agitaran y mostraran banderas azules para indicar que debe permitir adelantar al piloto perseguidor. Cualquier conductor que se considere que ignora las banderas azules sera comunicado a los comisarios del evento. INCIDENTES SON:<br /> 48.&ldquo;Incidente&rdquo; es un hecho o una serie de hechos que implique a uno o varios pilotos o toda acci&oacute;n de un piloto que haya sido informado por el Director de Prueba o el Director de Carrera a los Comisarios Deportivos(o como resultado de una investigaci&oacute;n llevada a cabo por el Director de Carrera/Prueba bajo demanda de los Comisarios Deportivos) que:<br /> a)Haya supuesto la interrupci&oacute;n de los entrenamientos (libres u oficiales) o la suspensi&oacute;n de una carrera.<br /> b)Constituya una violaci&oacute;n de la Normativa aplicable (Reglamento(s), CDI, etc.)<br /> c)Haya efectuado una falsa salida o haya provocado la de uno o m&aacute;s veh&iacute;culos.<br /> d)Provoque una colisi&oacute;n.<br /> e)Haya forzado a otro piloto a salir de la pista.<br /> f)Entorpezca o impida ileg&iacute;timamente cualquier maniobra l&iacute;cita de adelantamiento de otro deportista.<br /> g)Adelante ileg&iacute;timamente a otro piloto.<br /> h)Desobedezca o haga caso omiso a las indicaciones, instrucciones o comunicaciones de los oficiales o del personal de organizaci&oacute;n de la prueba.</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><a id="reglas_del_campeonato_bp_y_server"></a>Reglas del campeonato Blancpain y servidor:</h2>\r\n<p>La explicaci&oacute;n de la norma est&aacute; en normativa real reglas de conducci&oacute;n, <a href="#reglas_de_conduccion_bp">aqu&iacute;</a></p>\r\n<p><strong>19.3 Salirse de pista:</strong></p>\r\n<p>*Obtenci&oacute;n de ventaja:</p>\r\n<p>-Advertencia, si hay repetidas reincidencia Drive through en la siguiente carrera.</p>\r\n<p>-Si al obtener ventaja gana la posici&oacute;n a otro piloto debe devolverla o recibir&aacute; un Drive trought en la siguiente carrera.</p>\r\n<p>&nbsp;</p>\r\n<p>*Reincorporaci&oacute;n peligrosa a pista (citando a inguni):</p>\r\n<p>-Drive through en la siguiente carrera si provoca una colisi&oacute;n que haga retirarse al oponente.</p>\r\n<p>-Si hay colisi&oacute;n, 10 segundos al tiempo final de carrera, el otro piloto puede continuar pero con problemas de rendimiento. 5 segundos si hay colisi&oacute;n al reincorporarse pero el otro piloto puede correr a su ritmo normal.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>19.4 M&aacute;s de un cambio de direcci&oacute;n para defender la posici&oacute;n y no dejar espacio de un coche entre &eacute;l y el borde de pista:</strong></p>\r\n<p>Si devuelve la posici&oacute;n no hay sanci&oacute;n, 5 segundos a&ntilde;adido al tiempo final de carrera si incumple la norma reiteradamente.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>19.5 Maniobras para obstaculizar a otros pilotos, p.ej: acorralamiento deliberado:</strong></p>\r\n<p>-Drive throug en la siguiente carrera si se considera deliberado, perdida de puntos si es reincidente</p>\r\n<p>-5 segundos a a&ntilde;adir a final de carrera si no es deliberado.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>19.6 No permitir el adelantamiento bajo banderas azules:</strong></p>\r\n<p>1 advertencia.</p>\r\n<p>Siguientes ocasiones 10 segundos por incidente.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Otras:</strong></p>\r\n<p>*<strong>Una falsa salida:</strong> Drive through.<br /> *<strong>Provocar una colisi&oacute;n:</strong></p>\r\n<p>-Drive through en la siguiente carrera si provoca una colisi&oacute;n que haga retirarse al oponente.</p>\r\n<p>10 segundos al tiempo final de carrera si el oponente puede continuar pero con problemas de rendimiento .</p>\r\n<p>5 segundos si hay colisi&oacute;n al reincorporarse pero el otro piloto puede correr a su ritmo normal.</p>\r\n<p>-Si es dive bomb (<span style="color: #0000ff;"><a class="bbc_url" style="color: #0000ff;" title="Enlace Externo" href="https://youtu.be/nqkG6LfEMmk" rel="nofollow external">https://youtu.be/nqkG6LfEMmk</a></span>) Drive through si hace retirarse al oponente o puede continuar pero con problemas de rendimiento</p>\r\n<p>5 segundos pero el otro piloto puede correr a su ritmo normal.</p>\r\n<p>*<strong>Volver a boxes durante la carrera con la tecla ESC:</strong> Drive throug en la siguiente carrera.</p>\r\n<p>- Tras la clasificaci&oacute;n al modelo de veh&iacute;culo clasificado en primer lugar se le aplicar&aacute; un lastre de 80kg y a los siguientes -10kg por cada 0,5segundos de diferencia con el primer modelo clasificado.<br />- Para puntuar se debe haber completado el 70% de vueltas dadas por el ganador de la carrera, adem&aacute;s el coche no puede retirarse en ning&uacute;n caso ni permanecer en pits durante el resto de la carrera. Esto se aplica desde la salida dada por el sem&aacute;foro verde hasta que el primer coche que completa todas las vueltas cruce la l&iacute;nea de meta.<br />- Si el coche no puede permanecer en la pista por da&ntilde;os es obligatorio repararlo o retirarse.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Los Drive throug</strong> se cumplen en las primeras 5 vueltas.</p>\r\n<p>Sobre adelantamientos y l&iacute;neas de carrera <span style="color: #0000ff;"><a style="color: #0000ff;" href="https://f1metrics.wordpress.com/2014/08/28/the-rules-of-racing/" target="_blank">https://f1metrics.wordpress.com/2014/08/28/the-rules-of-racing/</a></span></p>\r\n<p>&nbsp;</p>\r\n<p>Establecidas las sanciones definitivas tras 1 mes de campeonato. 08/10/2016</p>\r\n<p>&nbsp;</p>\r\n<h2><a id="ajustes_del_server_bp"></a>Ajustes del servidor:</h2>\r\n<p>- Clima variable.<br /><br /></p>\r\n<p><img src="http://i.imgur.com/HLYsPzP.jpg" width="1208" height="485" />&nbsp;</p>\r\n<p><img src="http://i.imgur.com/qzPdqpi.jpg" width="1201" height="509" /></p>\r\n<p>&nbsp;</p>\r\n<h1><u><strong><a id="circtuitos_bp"></a>Circuitos elegidos para nuestro campeonato BlancPain:</strong></u></h1>\r\n<p><br /> Monza<br /> Vallelunga<br /> Silverstone (versi&oacute;n International)<br /> Paul Ricard (versi&oacute;n WTCC)<span style="color: #0000ff;"><a style="color: #0000ff;" href="http://www.racedepartment.com/downloads/paul-ricard.6115" target="_blank">http://www.racedepartment.com/downloads/paul-ricard.6115</a></span><br /> Spa Francorchamps<br /> Hungaroring <span style="color: #0000ff;"><a style="color: #0000ff;" href="https://mega.nz/#!JEYDCbhK!gfNyMVsX5amy4xvWMcDVWXSvb5np_rjVhFGJz4gipuQ" target="_blank">https://mega.nz/#!JEYDCbhK!gfNyMVsX5amy4xvWMcDVWXSvb5np_rjVhFGJz4gipuQ</a></span><br /> Bridgehampton&nbsp;<span style="color: #0000ff;"><a style="color: #0000ff;" href="http://www.racedepartment.com/downloads/bridgehampton-race-circuit.6604" target="_blank">http://www.racedepartment.com/downloads/bridgehampton-race-circuit.6604</a></span><br />Laguna Seca <span style="color: #0000ff;"><a style="color: #0000ff;" href="http://www.racedepartment.com/downloads/laguna-seca.10675/" target="_blank">http://www.racedepartment.com/downloads/laguna-seca.10675/</a></span><br /><br />&nbsp;</p>\r\n<h1><span style="text-decoration: underline;"><strong><a id="coches_bp"></a>Coches elegidos para nuestro campeonato de BlancPaint:</strong></span></h1>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="http://www.blancpain-gt-series.com/cars">Ver reales 2016</a></span></p>\r\n<p>En Asetto Corsa:</p>\r\n<p><span style="text-decoration: underline;"><strong>mclaren_mp412c_gt3</strong></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="https://mega.nz/#!MtQCUSKT!3yaYZWP8qKTx1o3t_im6bWkJvyDxO08z9b0d2yhUb5o" target="_blank">Skin equipo Army Monster</a></span><span style="text-decoration: underline;"><strong><br /></strong></span></p>\r\n<p><span style="text-decoration: underline;"><strong>mercedes_sls_gt3</strong></span></p>\r\n<p><span style="text-decoration: underline;"><strong>bmw_z4_gt3</strong></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="https://mega.nz/#!nowRDI5K!gOYPkvQvGWvarUZPtaeJpUYkj__V-j-_clno8scIm-U" target="_blank">Skin equipo Away</a></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="https://drive.google.com/open?id=0B2647on5nDx3OWpkSGJxVER3UjA" target="_blank">Skin equipo Rascando chapa</a></span></p>\r\n<p><span style="text-decoration: underline;"><strong>bmw_m3_gt2 (Similar a los GT3 en prestaciones, sin ABS)<br /></strong></span></p>\r\n<p><span style="text-decoration: underline;"><strong>ferrari_458_gt2 (Similar a los GT3 en prestaciones, sin ABS)</strong></span></p>\r\n<p><span style="color: #0000ff;"><a style="color: #0000ff;" href="https://mega.nz/#!GlAggKYL!BpYIC-snK2P-Ot0yTL-Q-P1YA9WvCDTFw9ZFVLY_FNQ" target="_blank">Skin equipo kunos ART</a></span><span style="text-decoration: underline;"><strong><br /></strong></span></p>\r\n<p><span style="color: #0000ff;"><a href="https://mega.nz/#!xNQUCKiD!8xduZATYsc8VndgscW-SO7XybHxOS0IoynFiVcdbta8" target="_blank">Skin equipo VITA4ONE</a></span></p>\r\n<p><span style="text-decoration: line-through;"><strong>Audi R8 LMS Ultra (2014) - Dream Pack #2</strong></span></p>\r\n<p><span style="text-decoration: line-through;"><strong>Ferrari 488 GT3 - Red Pack DLC</strong></span></p>\r\n<p><span style="text-decoration: line-through;"><strong>Lamborghini Huracan GT3 - Dream Pack #2</strong></span></p>\r\n<p><span style="text-decoration: line-through;"><strong>Mercedes AMG GT3 - Dream Pack #3</strong></span></p>\r\n<p><span style="text-decoration: line-through;"><strong>Mclaren 650S GT3 - Dream Pack #3</strong></span></p>\r\n<p><span style="text-decoration: line-through;"><strong>Nissan NISMO GT-R GT3 - Dream Pack #1</strong></span></p>\r\n<h1><span style="text-decoration: underline;"> <img src="http://i.imgur.com/0Hc51TZ.png" alt="" width="753" height="616" /></span></h1>\r\n<p><br />&nbsp;</p>\r\n<h1><!-- pagebreak --></h1>\r\n<hr />\r\n<h1><a id="otros_mods"></a>Otros Mods:</h1>\r\n<h1>&nbsp;</h1>\r\n<h1>APPs Interesantes</h1>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="ferito-livecartracker" href="http://www.racedepartment.com/downloads/ferito-livecartracker.3420/" target="_blank">ferito-livecartracker *</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="rivali-ov1-info" href="http://www.racedepartment.com/downloads/rivali-ov1-info-app.3128/" target="_blank">rivali-ov1-info (Lags ocasionales, lleva tiempo sin actualizarse)*</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="helicorsa" href="http://www.racedepartment.com/downloads/helicorsa.5199/" target="_blank">helicorsa *</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="ffbclip-app" href="http://www.racedepartment.com/downloads/ffbclip-app.7910/" target="_blank">ffbclip-app (para calibrar force feedback) *</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="acti-assetto-corsa-telemetry-interface (Motec)" href="http://www.racedepartment.com/downloads/acti-assetto-corsa-telemetry-interface.3948/" target="_blank">acti-assetto-corsa-telemetry-interface (Motec)*</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="raceessentials" href="http://www.racedepartment.com/downloads/raceessentials.10016/" target="_blank">raceessentials</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="Co-driver" href="http://patrick-brunner.net/codriver/" target="_blank">Co-driver para rally*</a></span></h2>\r\n<p>&nbsp;<strong>*Recomendados</strong></p>\r\n<h1>&nbsp;</h1>\r\n<h1>Coches</h1>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="PTsim WTCC 2016" href="http://www.ptsims.net/forum/index.php/topic,13024.0.html" target="_blank">PTsim WTCC 2016</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="Lada_granta_cup" href="http://assetto-db.com/car/lada_granta_cup" target="_blank">Lada_granta_cup</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="1999 Nissan Primera BTCC" href="http://www.racedepartment.com/downloads/1999-nissan-primera-btcc.3828/updates" target="_blank">1999 Nissan Primera BTCC *</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="RSR Formula 3" href="http://www.racedepartment.com/downloads/rsr-formula-3.8040/" target="_blank">RSR Formula 3 @Tristan Cliffe involved in our project. He is a Formula 3 driver in F3 Cup UK *</a></span></h2>\r\n<h2><span style="color: #0000ff;"><a style="color: #0000ff;" title="mazda-787b" href="http://www.racedepartment.com/downloads/mazda-787b.4608/" target="_blank">mazda-787b *</a></span></h2>\r\n<p>&nbsp;<strong>*Recomendados</strong></p>\r\n<p>&nbsp;</p>');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `season`
--

INSERT INTO `season` (`id`, `name`, `division`, `ruleset`, `ruleset_qualifying`, `maxteams`) VALUES
(4, 'BlancPainGTSeries T1', 5, 4, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season_team`
--

CREATE TABLE IF NOT EXISTS `season_team` (
  `season` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`season`,`team`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `season_team`
--

INSERT INTO `season_team` (`season`, `team`) VALUES
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 25),
(4, 28);

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

--
-- Volcado de datos para la tabla `sim_results`
--

INSERT INTO `sim_results` (`id`, `race_name`, `season`, `simresults_url`) VALUES
(5, 'Carrera1 Monza', 4, 'http://simresults.net/160912-Kx9'),
(6, 'Carrera 2 Vallelunga', 4, 'http://simresults.net/160917-u2d'),
(7, 'Carrera 3 Silverstone Internat', 4, 'http://simresults.net/161001-5MH'),
(13, 'Carrera 4 Paul Ricard WTCC', 4, 'http://simresults.net/161016-I6y'),
(15, 'Carrera 5 Spa-Francorchamps GT', 4, 'http://simresults.net/161030-k5q'),
(16, 'Carrera 6 Hungaroring', 4, 'http://simresults.net/161113-Ef9'),
(17, 'Carrera1 Bridgethampton', 4, 'http://simresults.net/161204-Kq1');

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

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id`, `name`, `logo`) VALUES
(19, 'Rascando Chapa (BMW)', ''),
(20, 'Monster Army (McLaren)', ''),
(17, 'Kunos ART (Ferrari)', ''),
(18, 'Carmageddon (Retirado)', ''),
(25, 'Equipo Away (BMW)', ''),
(26, 'Buzzin Hornets (F3)', 'http://spark.byethost17.com/prem/uploads/buzzin.jpg'),
(27, '111 Monster Team (F3)', 'http://www.tshirt1.ir/5813-thickbox_default/monster-energy-t-shirt.jpg'),
(28, 'Vita4one (Ferrari)', '');

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

--
-- Volcado de datos para la tabla `team_driver`
--

INSERT INTO `team_driver` (`id`, `team`, `driver`) VALUES
(75, 17, 50),
(80, 18, 53),
(76, 17, 52),
(82, 19, 51),
(83, 20, 1),
(87, 20, 53),
(86, 17, 55),
(93, 25, 57),
(92, 25, 56),
(91, 19, 54),
(100, 26, 1),
(99, 27, 57),
(102, 28, 58);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `uploads`
--

INSERT INTO `uploads` (`id`, `file`, `type`, `size`) VALUES
(18, 'spark.png', 'image/png', 162),
(19, 'luft.png', 'image/png', 131),
(21, 'buzzin.jpg', 'image/jpeg', 4);

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

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `passwd`, `active`) VALUES
(1, 'admin', '05f87dd4b30a93e4ea7a57a8a4605776490bb885', 1),
(5, 'inguni', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);

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

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `video_name`, `video_url`) VALUES
(1, 'Blancpain', 'https://www.youtube.com/embed/NmnkRlDhwtA'),
(6, 'T1 Blancpain Monza', 'https://www.youtube.com/embed/xPbofHptajU'),
(7, 'T1_Blancpain_vallelunga', 'https://www.youtube.com/embed/hleJkGpEpAQ'),
(8, 'T1_Blancpain_silverstone', 'https://www.youtube.com/embed/9XL0fyoQLek'),
(9, 'T1_Blancpain_Spa', 'https://www.youtube.com/embed/T5Fi2q3Jk4I');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
