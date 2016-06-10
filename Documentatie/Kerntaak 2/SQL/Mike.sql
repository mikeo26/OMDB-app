-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jun 2016 om 13:03
-- Serverversie: 5.7.9
-- PHP-versie: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdwa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bekeken`
--

DROP TABLE IF EXISTS `bekeken`;
CREATE TABLE IF NOT EXISTS `bekeken` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bekeken`
--

INSERT INTO `bekeken` (`gebruikersId`, `filmId`) VALUES
(4, 83184),
(4, 83184),
(7, 42837),
(7, 43388),
(7, 28943),
(7, 11990),
(7, 4862),
(7, 24825),
(7, 71031),
(7, 1737),
(7, 29140),
(7, 41296),
(7, 16991),
(7, 64316),
(7, 66192),
(7, 88813),
(7, 778),
(7, 96315),
(7, 46917),
(7, 49607),
(7, 88249),
(7, 51482),
(7, 52621);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `collectie`
--

DROP TABLE IF EXISTS `collectie`;
CREATE TABLE IF NOT EXISTS `collectie` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `collectie`
--

INSERT INTO `collectie` (`gebruikersId`, `filmId`) VALUES
(7, 28943),
(7, 11990),
(7, 4862),
(7, 64316),
(7, 43388),
(7, 51482);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikersid` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersrol` varchar(1) NOT NULL,
  `emailadres` text NOT NULL,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `verificatieCode` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gebruikersid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersid`, `gebruikersrol`, `emailadres`, `gebruikersnaam`, `wachtwoord`, `verificatieCode`, `active`) VALUES
(2, '1', 'mikeo26@gmail.com', 'mike', 'admin', '', 0),
(3, '1', 'peter.vanderkrift@casema.nl', 'peter', 'admin', '', 0),
(7, '1', 'mike@strongbase.nl', 'miketest', '$2y$11$kW7GHkhMtPmvN4oTF9.oyu5cl4oAwVu8YiiMtDti2OfUlTjrm7.9.', '73o0rp6jbe41dthmqacyi5gs9lfnz8x2k', 1),
(9, '0', 'testgebruiker@gmail.com', 'Testaccount', '$2y$11$gWQ5DzW2To.s8n/3A6gJUOSGsVk3hZejRzf6rkqG0fdzT6nXCYUUy', 'iao8p96hcg30kjs17xqd25zrfnty4melb', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE IF NOT EXISTS `watchlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `watchlist`
--

INSERT INTO `watchlist` (`gebruikersId`, `filmId`) VALUES
(7, 74355),
(7, 51482),
(7, 12524),
(7, 778),
(7, 64316),
(7, 4862),
(7, 11990),
(7, 28943),
(7, 43388),
(7, 42837);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `wishlist`
--

INSERT INTO `wishlist` (`gebruikersId`, `filmId`) VALUES
(7, 778),
(7, 94121),
(7, 51482),
(7, 12524),
(7, 98702),
(7, 64316),
(7, 4862),
(7, 11990),
(7, 28943),
(7, 43388);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
