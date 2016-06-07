-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 12:07 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

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
-- Table structure for table `bekeken`
--

DROP TABLE IF EXISTS `bekeken`;
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
(6, 1854),
(6, 5212),
(6, 104182),
(6, 34463),
(6, 84),
(6, 188),
(6, 24168),
(6, 17409),
(6, 6379),
(6, 38066),
(6, 64859),
(6, 15561),
(6, 105925),
(6, 244626),
(6, 75814),
(6, 4687),
(6, 324),
(6, 500),
(6, 3934),
(6, 1912),
(6, 1082),
(6, 9845),
(6, 100170),
(6, 146406),
(6, 945),
(6, 63188),
(6, 80246);

-- --------------------------------------------------------

--
-- Table structure for table `collectie`
--

DROP TABLE IF EXISTS `collectie`;
CREATE TABLE IF NOT EXISTS `collectie` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectie`
--

INSERT INTO `collectie` (`gebruikersId`, `filmId`) VALUES
(6, 38066),
(6, 64859),
(6, 15561),
(6, 324),
(6, 1082),
(6, 945),
(6, 80246);

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikersid` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersrol` varchar(1) NOT NULL,
  `emailadres` text NOT NULL,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `verificatieCode` text NOT NULL,
  PRIMARY KEY (`gebruikersid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersid`, `gebruikersrol`, `emailadres`, `gebruikersnaam`, `wachtwoord`, `verificatieCode`) VALUES
(2, '1', 'mikeo26@gmail.com', 'mike', 'admin', ''),
(3, '1', 'peter.vanderkrift@casema.nl', 'peter', 'admin', ''),
(6, '0', 'menno.vd.krift@gmail.com', 'menno', '$2y$11$SKxWk6iuBGDZeyODZ5MiveLqltVkrBAdUHqYn3015sYT/I3EmUehe', 'gabd5pqsnoe86971mxlcikrjt40z23yhf');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE IF NOT EXISTS `watchlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`gebruikersId`, `filmId`) VALUES
(6, 7888),
(6, 1234),
(6, 1312),
(6, 103747),
(6, 80246);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`gebruikersId`, `filmId`) VALUES
(6, 80246);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
