-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2014 at 12:32 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toto_result`
--
CREATE DATABASE IF NOT EXISTS `toto_result` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `toto_result`;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `resultid` int(6) NOT NULL AUTO_INCREMENT,
  `resultnumber` varchar(4) NOT NULL,
  `resultdate` date NOT NULL,
  `prize` varchar(2) NOT NULL,
  `vendor` varchar(3) NOT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resultid`, `resultnumber`, `resultdate`, `prize`, `vendor`) VALUES
(1, '1234', '2014-03-05', '01', '01'),
(2, '0851', '2014-03-05', '02', '01'),
(3, '5801', '2014-03-05', '03', '01'),
(4, '6890', '2014-03-05', '10', '01'),
(5, '3493', '2014-03-05', '11', '01'),
(6, '7803', '2014-03-05', '01', '02'),
(7, '4687', '2014-03-05', '02', '02'),
(8, '3792', '2014-03-05', '03', '02'),
(9, '3890', '2014-03-05', '10', '02'),
(10, '4590', '2014-03-05', '11', '02'),
(11, '3435', '2014-03-05', '01', '03'),
(12, '3293', '2014-03-05', '02', '03'),
(13, '9766', '2014-03-05', '03', '03'),
(14, '8392', '2014-03-05', '10', '03'),
(15, '4904', '2014-03-05', '11', '03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`) VALUES
('Carbon', '6b3f244f179659616aadfc6d193103c8'),
('Jy', '89c868c8ff892bddf6e21e6883e69159'),
('Myiosus', '7db6e35659645f937556524ee14d3a83');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
