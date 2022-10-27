-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2022 at 01:28 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carspace`
--
CREATE DATABASE IF NOT EXISTS `carspace` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `carspace`;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

DROP TABLE IF EXISTS `contactform`;
CREATE TABLE IF NOT EXISTS `contactform` (
  `rating` int(2) NOT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`rating`, `message`) VALUES
(4, ''),
(3, ''),
(3, 'vrfbthth htrhnytn '),
(3, 'swqd'),
(5, 'good'),
(3, ''),
(4, 'qs'),
(4, 'good'),
(1, 'ok'),
(4, 'Okay');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `locationid` int(10) NOT NULL,
  `locationname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `spacelot` int(5) NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`locationid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationid`, `locationname`, `spacelot`, `cost`) VALUES
(101, 'Basvanagudi', 5, 15),
(102, 'nagarbhavi', 18, 30),
(103, 'vijaynagar', 24, 30);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `userid` int(10) NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `locationid` int(10) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `locationid` (`locationid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `password`, `locationid`) VALUES
(11111, '12345', 101),
(11112, '23456', 102),
(11113, '34567', 103);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

DROP TABLE IF EXISTS `reserve`;
CREATE TABLE IF NOT EXISTS `reserve` (
  `bookingid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `carnum` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locationid` int(10) DEFAULT NULL,
  `checkin` datetime(6) NOT NULL,
  `checkout` datetime(6) DEFAULT NULL,
  `reservationstatus` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` int(5) DEFAULT NULL,
  `paymentstatus` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bookingid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`bookingid`, `carnum`, `locationid`, `checkin`, `checkout`, `reservationstatus`, `payment`, `paymentstatus`) VALUES
('BA22R54C28S', 'KA43T2345', 101, '2022-03-02 03:26:00.000000', '2022-03-02 09:23:00.000000', 'UNRESERVED', 12, 'YES'),
('BA36E49S76R', 'KA10TH1998', 101, '2022-03-01 03:32:00.000000', '2022-03-01 12:51:00.000000', 'UNRESERVED', 42, 'YES'),
('BC16T16E24R', 'ka02v1234', 101, '2022-03-01 10:45:00.000000', '2022-03-01 05:42:00.000000', 'UNRESERVED', 7, 'YES'),
('BR57O74T24S', 'KA12H4535', 101, '2022-03-01 07:25:00.000000', '2022-03-01 12:57:00.000000', 'UNRESERVED', -15, 'YES'),
('CR95T15A19O', 'ka02v1234', 101, '2022-03-02 02:39:00.000000', NULL, 'RESERVED', NULL, 'NO'),
('CT75R37A87B', 'KA02V2335', 103, '2022-03-01 11:30:00.000000', '2022-03-02 02:30:00.000000', 'RESERVED', 90, 'YES'),
('EA38R36T78C', 'KA43T2345', 102, '2022-03-02 04:23:00.000000', '2022-03-02 05:23:00.000000', 'RESERVED', 30, 'YES'),
('EB67T34S82R', 'KA02V1211', 101, '2022-03-01 02:07:00.000000', '2022-03-01 01:20:00.000000', 'UNRESERVED', 71, 'YES'),
('OC89S54B77R', 'KA12H4567', 101, '2022-03-01 07:25:00.000000', '2022-03-01 05:09:00.000000', 'UNRESERVED', 48, 'YES'),
('OT99E22S59C', 'KA23HV3456', 101, '2022-03-01 06:27:00.000000', NULL, 'RESERVED', NULL, 'NO'),
('SA28E74T91O', 'KA1B3456', 101, '2022-03-01 03:51:00.000000', NULL, 'RESERVED', NULL, 'NO'),
('TO84C24R55A', 'KA10G1468', 102, '2022-03-01 12:30:00.000000', '2022-03-01 03:30:00.000000', 'RESERVED', 90, 'YES'),
('TR68A12E54B', 'KA23UG5745', 101, '2022-03-01 07:45:00.000000', '2022-03-01 11:45:00.000000', 'RESERVED', 60, 'YES');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`locationid`) REFERENCES `location` (`locationid`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`locationid`) REFERENCES `location` (`locationid`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
