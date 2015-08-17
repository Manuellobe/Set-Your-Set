-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2015 a las 11:45:12
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `syset`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blockwithinitemset`
--

CREATE TABLE IF NOT EXISTS `blockwithinitemset` (
  `Id_ItemSet` int(10) NOT NULL DEFAULT '0',
  `Id_Block` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonusspellstats`
--

CREATE TABLE IF NOT EXISTS `bonusspellstats` (
  `SpellKey` varchar(32) NOT NULL DEFAULT '',
  `StatName` varchar(32) NOT NULL DEFAULT '',
  `Amount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonusstats`
--

CREATE TABLE IF NOT EXISTS `bonusstats` (
  `StatName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `champion`
--

CREATE TABLE IF NOT EXISTS `champion` (
  `Id` int(10) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Title` varchar(128) NOT NULL,
  `ChampionKey` varchar(32) NOT NULL,
  `attackrange` double NOT NULL DEFAULT '0',
  `mpperlevel` double NOT NULL DEFAULT '0',
  `mp` double NOT NULL DEFAULT '0',
  `attackdamage` double NOT NULL DEFAULT '0',
  `hp` double NOT NULL DEFAULT '0',
  `hpperlevel` double NOT NULL DEFAULT '0',
  `attackdamageperlevel` double NOT NULL DEFAULT '0',
  `armor` double NOT NULL DEFAULT '0',
  `mpregenperlevel` double NOT NULL DEFAULT '0',
  `hpregen` double NOT NULL DEFAULT '0',
  `critperlevel` double NOT NULL DEFAULT '0',
  `spellblockperlevel` double NOT NULL DEFAULT '0',
  `mpregen` double NOT NULL DEFAULT '0',
  `attackspeedperlevel` double NOT NULL DEFAULT '0',
  `spellblock` double NOT NULL DEFAULT '0',
  `movespeed` double NOT NULL DEFAULT '0',
  `attackspeedoffset` double NOT NULL DEFAULT '0',
  `crit` double NOT NULL DEFAULT '0',
  `hpregenperlevel` double NOT NULL DEFAULT '0',
  `armorperlevel` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championspell`
--

CREATE TABLE IF NOT EXISTS `championspell` (
  `Id_Champion` int(10) NOT NULL DEFAULT '0',
  `SpellKey` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `Id` int(10) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Description` text NOT NULL,
  `TotalGold` int(10) NOT NULL,
  `BaseGold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemblock`
--

CREATE TABLE IF NOT EXISTS `itemblock` (
  `Id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `RecMath` tinyint(1) NOT NULL DEFAULT '0',
  `MinSummonerLevel` int(4) NOT NULL DEFAULT '-1',
  `MaxSummonerLevel` int(4) NOT NULL DEFAULT '-1',
  `ShowIfSummonerSpell` varchar(24) NOT NULL DEFAULT '',
  `HideIfSummonerSpell` varchar(24) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemset`
--

CREATE TABLE IF NOT EXISTS `itemset` (
  `Id` int(10) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Type` varchar(12) NOT NULL DEFAULT 'custom',
  `Map` varchar(24) NOT NULL DEFAULT 'any',
  `Mode` varchar(24) NOT NULL DEFAULT 'any'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemsetbychampion`
--

CREATE TABLE IF NOT EXISTS `itemsetbychampion` (
  `Id_Champion` int(10) NOT NULL DEFAULT '0',
  `Id_ItemSet` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemwithinblock`
--

CREATE TABLE IF NOT EXISTS `itemwithinblock` (
  `Id_Item` int(10) NOT NULL DEFAULT '0',
  `Id_ItemBlock` int(10) NOT NULL DEFAULT '0',
  `Number` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permalink`
--

CREATE TABLE IF NOT EXISTS `permalink` (
  `PermaKey` varchar(128) NOT NULL,
  `Id_ItemSet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spell`
--

CREATE TABLE IF NOT EXISTS `spell` (
  `SpellKey` varchar(32) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Tooltip` text NOT NULL,
  `EffectBurn` varchar(128) NOT NULL,
  `CostBurn` varchar(128) NOT NULL,
  `Resource` varchar(16) NOT NULL,
  `RangeBurn` varchar(128) NOT NULL,
  `CooldownBurn` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `summoner`
--

CREATE TABLE IF NOT EXISTS `summoner` (
  `Id` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `ProfileIconId` int(11) NOT NULL,
  `RevisionDate` varchar(64) DEFAULT NULL,
  `SummonerLevel` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Privilege` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userfavitemset`
--

CREATE TABLE IF NOT EXISTS `userfavitemset` (
  `Id_User` int(11) NOT NULL DEFAULT '0',
  `Id_ItemSet` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userfavsumm`
--

CREATE TABLE IF NOT EXISTS `userfavsumm` (
  `Id_User` int(11) NOT NULL,
  `Id_Summoner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userownitemset`
--

CREATE TABLE IF NOT EXISTS `userownitemset` (
  `Id_User` int(11) NOT NULL DEFAULT '0',
  `Id_ItemSet` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blockwithinitemset`
--
ALTER TABLE `blockwithinitemset`
  ADD PRIMARY KEY (`Id_ItemSet`,`Id_Block`),
  ADD KEY `Id_Block` (`Id_Block`);

--
-- Indices de la tabla `bonusspellstats`
--
ALTER TABLE `bonusspellstats`
  ADD PRIMARY KEY (`StatName`,`SpellKey`),
  ADD KEY `SpellKey` (`SpellKey`);

--
-- Indices de la tabla `bonusstats`
--
ALTER TABLE `bonusstats`
  ADD PRIMARY KEY (`StatName`);

--
-- Indices de la tabla `champion`
--
ALTER TABLE `champion`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `ChampionKey` (`ChampionKey`);

--
-- Indices de la tabla `championspell`
--
ALTER TABLE `championspell`
  ADD PRIMARY KEY (`Id_Champion`,`SpellKey`),
  ADD KEY `SpellKey` (`SpellKey`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `itemblock`
--
ALTER TABLE `itemblock`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `itemset`
--
ALTER TABLE `itemset`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `itemsetbychampion`
--
ALTER TABLE `itemsetbychampion`
  ADD PRIMARY KEY (`Id_Champion`,`Id_ItemSet`),
  ADD KEY `Id_ItemSet` (`Id_ItemSet`);

--
-- Indices de la tabla `itemwithinblock`
--
ALTER TABLE `itemwithinblock`
  ADD PRIMARY KEY (`Id_Item`,`Id_ItemBlock`),
  ADD KEY `Id_ItemBlock` (`Id_ItemBlock`);

--
-- Indices de la tabla `permalink`
--
ALTER TABLE `permalink`
  ADD PRIMARY KEY (`PermaKey`),
  ADD KEY `Id_ItemSet` (`Id_ItemSet`);

--
-- Indices de la tabla `spell`
--
ALTER TABLE `spell`
  ADD PRIMARY KEY (`SpellKey`);

--
-- Indices de la tabla `summoner`
--
ALTER TABLE `summoner`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indices de la tabla `userfavitemset`
--
ALTER TABLE `userfavitemset`
  ADD PRIMARY KEY (`Id_User`,`Id_ItemSet`),
  ADD KEY `Id_ItemSet` (`Id_ItemSet`);

--
-- Indices de la tabla `userfavsumm`
--
ALTER TABLE `userfavsumm`
  ADD PRIMARY KEY (`Id_User`,`Id_Summoner`),
  ADD KEY `Id_Summoner` (`Id_Summoner`);

--
-- Indices de la tabla `userownitemset`
--
ALTER TABLE `userownitemset`
  ADD PRIMARY KEY (`Id_User`,`Id_ItemSet`),
  ADD KEY `Id_ItemSet` (`Id_ItemSet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `itemblock`
--
ALTER TABLE `itemblock`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `itemset`
--
ALTER TABLE `itemset`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `summoner`
--
ALTER TABLE `summoner`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blockwithinitemset`
--
ALTER TABLE `blockwithinitemset`
  ADD CONSTRAINT `blockwithinitemset_ibfk_1` FOREIGN KEY (`Id_ItemSet`) REFERENCES `itemset` (`Id`),
  ADD CONSTRAINT `blockwithinitemset_ibfk_2` FOREIGN KEY (`Id_Block`) REFERENCES `itemblock` (`Id`);

--
-- Filtros para la tabla `bonusspellstats`
--
ALTER TABLE `bonusspellstats`
  ADD CONSTRAINT `bonusspellstats_ibfk_1` FOREIGN KEY (`SpellKey`) REFERENCES `spell` (`SpellKey`),
  ADD CONSTRAINT `bonusspellstats_ibfk_2` FOREIGN KEY (`StatName`) REFERENCES `bonusstats` (`StatName`);

--
-- Filtros para la tabla `championspell`
--
ALTER TABLE `championspell`
  ADD CONSTRAINT `championspell_ibfk_1` FOREIGN KEY (`SpellKey`) REFERENCES `spell` (`SpellKey`),
  ADD CONSTRAINT `championspell_ibfk_2` FOREIGN KEY (`Id_Champion`) REFERENCES `champion` (`Id`);

--
-- Filtros para la tabla `itemsetbychampion`
--
ALTER TABLE `itemsetbychampion`
  ADD CONSTRAINT `itemsetbychampion_ibfk_1` FOREIGN KEY (`Id_ItemSet`) REFERENCES `itemset` (`Id`),
  ADD CONSTRAINT `itemsetbychampion_ibfk_2` FOREIGN KEY (`Id_Champion`) REFERENCES `champion` (`Id`);

--
-- Filtros para la tabla `itemwithinblock`
--
ALTER TABLE `itemwithinblock`
  ADD CONSTRAINT `itemwithinblock_ibfk_1` FOREIGN KEY (`Id_Item`) REFERENCES `item` (`Id`),
  ADD CONSTRAINT `itemwithinblock_ibfk_2` FOREIGN KEY (`Id_ItemBlock`) REFERENCES `itemblock` (`Id`);

--
-- Filtros para la tabla `permalink`
--
ALTER TABLE `permalink`
  ADD CONSTRAINT `permalink_ibfk_1` FOREIGN KEY (`Id_ItemSet`) REFERENCES `itemset` (`Id`);

--
-- Filtros para la tabla `userfavitemset`
--
ALTER TABLE `userfavitemset`
  ADD CONSTRAINT `userfavitemset_ibfk_1` FOREIGN KEY (`Id_ItemSet`) REFERENCES `itemset` (`Id`),
  ADD CONSTRAINT `userfavitemset_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`);

--
-- Filtros para la tabla `userfavsumm`
--
ALTER TABLE `userfavsumm`
  ADD CONSTRAINT `UserFavSumm_ibfk_1` FOREIGN KEY (`Id_Summoner`) REFERENCES `summoner` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserFavSumm_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `userownitemset`
--
ALTER TABLE `userownitemset`
  ADD CONSTRAINT `userownitemset_ibfk_1` FOREIGN KEY (`Id_ItemSet`) REFERENCES `itemset` (`Id`),
  ADD CONSTRAINT `userownitemset_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
