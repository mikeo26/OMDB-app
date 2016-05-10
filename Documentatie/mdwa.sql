-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2016 at 03:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mdwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bekeken`
--

CREATE TABLE IF NOT EXISTS `bekeken` (
  `gebruikersId` int(11) NOT NULL,
  `filmId` int(11) NOT NULL,
  UNIQUE KEY `gebruikersId` (`gebruikersId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collectie`
--

CREATE TABLE IF NOT EXISTS `collectie` (
  `gebruikersId` int(11) NOT NULL,
  `filmId` int(11) NOT NULL,
  UNIQUE KEY `gebruikersId` (`gebruikersId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikersid` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersrol` varchar(1) NOT NULL,
  `emailadres` text NOT NULL,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `verificatieCode` text NOT NULL,
  PRIMARY KEY (`gebruikersid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersid`, `gebruikersrol`, `emailadres`, `gebruikersnaam`, `wachtwoord`, `verificatieCode`) VALUES
(1, '1', 'menno.vd.krift@gmail.com', 'menno', 'admin', ''),
(2, '1', 'mikeo26@gmail.com', 'mike', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE IF NOT EXISTS `watchlist` (
  `gebruikersId` int(11) NOT NULL,
  `filmId` int(11) NOT NULL,
  UNIQUE KEY `gebruikersId` (`gebruikersId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `gebruikersId` int(11) NOT NULL,
  `filmId` int(11) NOT NULL,
  UNIQUE KEY `gebruikersId` (`gebruikersId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bekeken`
--
ALTER TABLE `bekeken`
  ADD CONSTRAINT `bekeken_ibfk_1` FOREIGN KEY (`gebruikersId`) REFERENCES `gebruikers` (`gebruikersid`);

--
-- Constraints for table `collectie`
--
ALTER TABLE `collectie`
  ADD CONSTRAINT `collectie_ibfk_1` FOREIGN KEY (`gebruikersId`) REFERENCES `gebruikers` (`gebruikersid`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`gebruikersId`) REFERENCES `gebruikers` (`gebruikersid`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`gebruikersId`) REFERENCES `gebruikers` (`gebruikersid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
