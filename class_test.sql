-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2019 at 01:01 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `UserType` varchar(30) NOT NULL,
  `Nic` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`Nic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`UserType`, `Nic`, `password`) VALUES
('Orgenizer', '950870285v', '123'),
('Orgenizer', '950870284v', '12345'),
('Orgenizer', '950870283v', '12345'),
('Orgenizer', '950870282v', '12345'),
('SystemAdmin', '950870281v', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

DROP TABLE IF EXISTS `contribution`;
CREATE TABLE IF NOT EXISTS `contribution` (
  `Nic` int(13) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Participation` varchar(15) NOT NULL,
  PRIMARY KEY (`Nic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`Nic`, `Name`, `Participation`) VALUES
(123456789, 'Supun Lakshitha', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `venue` varchar(50) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Id`, `name`, `datetime`, `venue`, `note`, `status`) VALUES
(7, 'Rajitha', '2019-07-25 17:00:00', 'PG', 'Rajja', 'Confirmed'),
(8, 'Cod', '2019-07-15 12:00:00', 'UG', 'cod', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Preferredname` varchar(20) NOT NULL,
  `DateofBirth` date NOT NULL,
  `Officialemail` varchar(200) NOT NULL,
  `Personalemail` varchar(200) NOT NULL,
  `Mobilenumber` bigint(10) NOT NULL,
  `Facebooklink` varchar(200) NOT NULL,
  `Designation` varchar(15) DEFAULT NULL,
  `Nic` varchar(12) NOT NULL,
  `StudentId` varchar(15) DEFAULT NULL,
  `Food` enum('V','N') NOT NULL,
  `UserType` varchar(30) NOT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`Nic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`Firstname`, `Lastname`, `Preferredname`, `DateofBirth`, `Officialemail`, `Personalemail`, `Mobilenumber`, `Facebooklink`, `Designation`, `Nic`, `StudentId`, `Food`, `UserType`, `Notes`, `password`) VALUES
('Supun', 'Senanayake', 'Lakshitha', '1995-03-27', 'lucky.senanayake1995@gmail.com', 'lucky.senanayake1995@gmail.com', 718515247, 'Senanayake', '', '950870281v', '16_101', 'N', 'Student', '', '12345'),
('Tharuka', 'Kularatne', 'Doka', '2019-07-13', 'Tharuka@', 'Tharuka@', 1111111111, 'Tharuka', NULL, '123456789', NULL, 'N', 'Student', NULL, '123'),
('Menaka', 'Misala', 'Mena', '2019-07-15', 'menaka@', 'menaka@', 0, 'menaka', NULL, '222222222', NULL, 'N', 'AcademicStaff', NULL, '123'),
('Vishwa', 'Lakruwan', 'Aliya', '2019-07-14', 'vishwa@', 'vishwa@', 3333333333, 'Vishwa', NULL, '3333333333', NULL, 'N', 'TemporaryAcademicStaff', NULL, '123'),
('Damith', 'Madusanka', 'Damith', '2008-07-15', 'damith@', 'damith@', 4444444444, 'damith', NULL, '444444444', NULL, 'N', 'AdministrativeStaff', NULL, '123'),
('Pasindu', 'Madusanka', 'Pasindu', '2010-07-23', 'pasindu@', 'pasindu@', 5555555555, 'pasindu', NULL, '555555555', NULL, 'V', 'Student', NULL, '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
