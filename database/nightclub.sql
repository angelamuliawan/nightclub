-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2014 at 01:54 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nightclub`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumID`, `AlbumName`, `AlbumDescription`, `DateTaken`, `StaffID`) VALUES
(1, 'Hai', 'hari ini kita jalan jalan loh', '2014-06-03', 1),
(4, 'Jalan testiing', 'hari ini kita jalan jalan loh', '2014-06-03', 2),
(6, 'iya deh apa', 'apa tuuuh', '2014-06-22', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`CareerID`, `CareerPosition`, `Requirement`, `Contact`, `StaffID`) VALUES
(1, ' Waitress Cantik', 'Pria / Wanita, usia 21 - 33 tahun.<br>Pengalaman minimal 1 tahun di Club/Hotel<br>Bersedia mengikuti training.<br>Berpenampilan menarik dan kepribadian menarik.<br>Ramah & Komunikatif.<br>Rajin, jujur<br>disiplin.', 'email : admin@infinity.com', 1),
(4, 'aaa', 'aaaa<br>aaaaa<br>bbbb', 'asdf', 1),
(5, 'Kasir cantik ganteng', 'cantik atau ganteng<br>rajin<br>pinter<br>ngoding<br>au ah', 'email aa@aa.com<br>call me 12345', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `Name`, `Email`, `Subject`, `Message`) VALUES
(2, 'Angela Muliawan', 'amuliawan93@gmail.com', 'Hai', 'Hallooooooooooooooooooooooooooooo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `Title`, `Date`, `Time`, `Description`, `Place`, `ImageURL`, `StaffID`) VALUES
(3, 'Event Club 1', '2014-06-28', '10.00 pm - 05.00 am', 'Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fu', 'Club Infinity', 'event1.jpg', 1),
(4, 'asdf', '2015-06-20', '10.00 pm sampe abis', 'deskripsi brohh, keren deh pokoknya, deskripsi brohh, keren deh pokoknya, deskripsi brohh, keren deh pokoknya,deskripsi brohh, keren deh pokoknya', 'disini broh', 'event2.jpg', 1),
(7, 'ihiy unyu event', '2014-06-27', '10.00 pm - 05.00 pm', 'input lah suka suka suka suka sukaaaaaaaaaaaaaaaaaaaaaaa', 'aaa', 'gallery_big_img6.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`PhotoID`, `PhotoURL`, `PhotoDescription`, `AlbumID`, `StaffID`) VALUES
(2, 'gallery_big_img1.jpg', 'gw jalan jalan', 1, 1),
(3, 'gallery_big_img2.jpg', 'asdfasdfasdfasd', 1, 2);

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
