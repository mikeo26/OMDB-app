-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2016 at 08:31 PM
-- Server version: 5.5.41
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mennoep141_mdwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bekeken`
--

CREATE TABLE IF NOT EXISTS `bekeken` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bekeken`
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
-- Table structure for table `collectie`
--

CREATE TABLE IF NOT EXISTS `collectie` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectie`
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
-- Table structure for table `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
`gebruikersid` int(11) NOT NULL,
  `gebruikersrol` varchar(1) NOT NULL,
  `emailadres` text NOT NULL,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `verificatieCode` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersid`, `gebruikersrol`, `emailadres`, `gebruikersnaam`, `wachtwoord`, `verificatieCode`, `active`) VALUES
(2, '1', 'mikeo26@gmail.com', 'mike', 'admin', '', 0),
(3, '1', 'peter.vanderkrift@casema.nl', 'peter', 'admin', '', 0),
(7, '1', 'mike@strongbase.nl', 'miketest', '$2y$11$kW7GHkhMtPmvN4oTF9.oyu5cl4oAwVu8YiiMtDti2OfUlTjrm7.9.', '73o0rp6jbe41dthmqacyi5gs9lfnz8x2k', 1),
(9, '0', 'testgebruiker@gmail.com', 'Testaccount', '$2y$11$gWQ5DzW2To.s8n/3A6gJUOSGsVk3hZejRzf6rkqG0fdzT6nXCYUUy', 'iao8p96hcg30kjs17xqd25zrfnty4melb', 0),
(10, '', 'menno.vd.krift@gmail.com', 'menno', '$2y$11$A8ls6GvlIo9Hm9kQAjDPWuQWrqUnzUPpT79d1ot4W9aA3m29LUiDu', '73o0rp6jbe41dthmqacyi5gs9lfnz8x2k', 1);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE IF NOT EXISTS `watchlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
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
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
 ADD PRIMARY KEY (`gebruikersid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
MODIFY `gebruikersid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
