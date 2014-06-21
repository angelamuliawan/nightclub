-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2014 at 10:11 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nightclub`
--
CREATE DATABASE IF NOT EXISTS `nightclub` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nightclub`;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `AlbumID` int(11) NOT NULL AUTO_INCREMENT,
  `AlbumName` varchar(100) NOT NULL,
  `AlbumDescription` varchar(500) NOT NULL,
  `DateTaken` date NOT NULL,
  `StaffID` int(11) NOT NULL,
  PRIMARY KEY (`AlbumID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `CareerID` int(11) NOT NULL AUTO_INCREMENT,
  `CareerPosition` varchar(100) NOT NULL,
  `Requirement` varchar(1000) NOT NULL,
  `Contact` varchar(500) NOT NULL,
  `StaffID` int(11) NOT NULL,
  PRIMARY KEY (`CareerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`CareerID`, `CareerPosition`, `Requirement`, `Contact`, `StaffID`) VALUES
(1, 'Waitress', '- Pria / Wanita, usia 21 - 33 tahun.<br>- Pengalaman minimal 1 tahun di Club/Hotel<br>- Bersedia mengikuti training.<br>- Berpenampilan menarik dan kepribadian menarik.<br>- Ramah & Komunikatif.<br>- Rajin, jujur, dan disiplin.', 'email : admin@infinity.com<br>phone : 021 - 9876654', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(500) NOT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `Name`, `Email`, `Subject`, `Message`) VALUES
(1, 'Angela Muliawan', 'amuliawan93@gmail.com', 'Hai', 'Hallooooooooooooooooooooooooooooo'),
(2, 'Angela Muliawan', 'amuliawan93@gmail.com', 'Hai', 'Hallooooooooooooooooooooooooooooo'),
(3, 'Testing lagi ya', 'amuliawan93@gmail.com', 'Call me!', 'Hai');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Place` varchar(50) NOT NULL,
  `ImageURL` varchar(50) NOT NULL,
  `StaffID` int(11) NOT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `Title`, `Date`, `Time`, `Description`, `Place`, `ImageURL`, `StaffID`) VALUES
(3, 'Event Club 1', '2014-06-28', '10.00 pm - 05.00 am', 'Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fu', 'Club Infinity', 'event1.jpg', 1),
(4, 'Event Club 2', '2014-07-05', '10.00 pm - 05.00 am', 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eve provident, similique sunt in culpa qui officia deserunt mollitia', 'Club Infinity', 'event2.jpg', 1),
(5, 'Event Club 2', '2014-08-30', '10.00 pm - 05.00 am', 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eve provident, similique sunt in culpa qui officia deserunt molliti', 'Club Infinity', 'event3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `PhotoID` int(11) NOT NULL AUTO_INCREMENT,
  `PhotoURL` varchar(100) NOT NULL,
  `PhotoDescription` varchar(200) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  PRIMARY KEY (`PhotoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `UserName`, `FullName`, `Password`) VALUES
(1, 'admin', 'Admin Backend', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
