-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Erstellungszeit: 23. Dez 2017 um 11:50
=======
-- Erstellungszeit: 21. Dez 2017 um 20:47
>>>>>>> logo_simresults
-- Server-Version: 5.7.20-0ubuntu0.16.04.1
-- PHP-Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `prem`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content_file` varchar(150) NOT NULL,
  `content_html` text NOT NULL,
  `language` varchar(150) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `plate` smallint(3) DEFAULT NULL,
  `country` varchar(2) CHARACTER SET ascii DEFAULT NULL,
  `1st` int(30) DEFAULT NULL,
  `2nd` int(30) DEFAULT NULL,
  `3rd` int(30) DEFAULT NULL,
  `driver_photo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `main_news`
--

CREATE TABLE `main_news` (
  `id` int(11) NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `news` text CHARACTER SET utf8 NOT NULL,
  `day` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `point_ruleset`
--

CREATE TABLE `point_ruleset` (
  `id` int(11) NOT NULL,
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
  `fl` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `race`
--

CREATE TABLE `race` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `track` varchar(30) NOT NULL DEFAULT '',
  `laps` int(11) NOT NULL DEFAULT '0',
  `season` int(11) NOT NULL DEFAULT '0',
  `division` int(11) NOT NULL DEFAULT '0',
  `ruleset` int(11) NOT NULL DEFAULT '0',
  `ruleset_qualifying` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '2000-01-01 11:00:00',
  `maxplayers` int(11) NOT NULL DEFAULT '0',
  `result_official` tinyint(1) NOT NULL DEFAULT '0',
  `progress` int(11) NOT NULL DEFAULT '0',
  `imagelink` varchar(200) DEFAULT NULL,
  `replay` varchar(200) DEFAULT NULL,
  `simresults` varchar(200) DEFAULT NULL,
  `forumlink` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `race_driver`
--

CREATE TABLE `race_driver` (
  `race` int(11) NOT NULL DEFAULT '0',
  `team_driver` int(11) NOT NULL DEFAULT '0',
  `grid` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `fastest_lap` tinyint(1) NOT NULL DEFAULT '0',
  `laps` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rules_table`
--

CREATE TABLE `rules_table` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(15) NOT NULL,
  `rules` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `division` int(11) NOT NULL DEFAULT '0',
  `ruleset` int(11) NOT NULL DEFAULT '0',
  `ruleset_qualifying` int(11) NOT NULL DEFAULT '0',
  `maxteams` int(11) NOT NULL DEFAULT '0',
  `series_logo_simresults` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `season_team`
--

CREATE TABLE `season_team` (
  `season` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sim_results`
--

CREATE TABLE `sim_results` (
  `id` int(11) NOT NULL,
  `race_name` varchar(30) NOT NULL,
  `season` int(11) NOT NULL DEFAULT '0',
  `simresults_url` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `standing_pages`
--

CREATE TABLE `standing_pages` (
  `id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `season` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `logo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team_driver`
--

CREATE TABLE `team_driver` (
  `id` int(11) NOT NULL,
  `team` int(11) NOT NULL DEFAULT '0',
  `driver` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `team_driver_top3`
--
CREATE TABLE `team_driver_top3` (
`team_driver` int(11)
,`position_1_count` decimal(23,0)
,`position_2_count` decimal(23,0)
,`position_3_count` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `passwd` varchar(40) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `video_name` varchar(30) NOT NULL,
  `video_url` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur des Views `team_driver_top3`
--
DROP TABLE IF EXISTS `team_driver_top3`;

CREATE VIEW `team_driver_top3`  AS  select `race_driver`.`team_driver` AS `team_driver`,sum((case when (`race_driver`.`position` = 1) then 1 else 0 end)) AS `position_1_count`,sum((case when (`race_driver`.`position` = 2) then 1 else 0 end)) AS `position_2_count`,sum((case when (`race_driver`.`position` = 3) then 1 else 0 end)) AS `position_3_count` from `race_driver` group by `race_driver`.`team_driver` order by `position_1_count` desc ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `active` (`active`);

--
-- Indizes für die Tabelle `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `main_news`
--
ALTER TABLE `main_news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `point_ruleset`
--
ALTER TABLE `point_ruleset`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `race_driver`
--
ALTER TABLE `race_driver`
  ADD PRIMARY KEY (`race`,`team_driver`);

--
-- Indizes für die Tabelle `rules_table`
--
ALTER TABLE `rules_table`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `season_team`
--
ALTER TABLE `season_team`
  ADD PRIMARY KEY (`season`,`team`);

--
-- Indizes für die Tabelle `sim_results`
--
ALTER TABLE `sim_results`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `standing_pages`
--
ALTER TABLE `standing_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `season` (`season`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `team_driver`
--
ALTER TABLE `team_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `main_news`
--
ALTER TABLE `main_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `point_ruleset`
--
ALTER TABLE `point_ruleset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `race`
--
ALTER TABLE `race`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `rules_table`
--
ALTER TABLE `rules_table`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `sim_results`
--
ALTER TABLE `sim_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `standing_pages`
--
ALTER TABLE `standing_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `team_driver`
--
ALTER TABLE `team_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
