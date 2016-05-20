-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 10:08 AM
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
(4, 83184);

-- --------------------------------------------------------

--
-- Table structure for table `collectie`
--

DROP TABLE IF EXISTS `collectie`;
CREATE TABLE IF NOT EXISTS `collectie` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `gebruikersId` int(9) NOT NULL,
  `filmId` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
