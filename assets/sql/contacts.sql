-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 04:49 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `Id` int(11) NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`Id`, `ContactName`, `Phone`, `Email`, `Address`, `Picture`) VALUES
(1, 'Tom', '0888 234 567', 'tom@tomandjerryinc.com', 'Tom and Jerry''s House, USA', './pics/1.jpg'),
(2, 'Jerry', '0888 555 452', 'jerry@tomandjerryinc.com', 'Tom and Jerry''s House, USA', './pics/2.jpg'),
(3, 'Fred Flinstone', '0898 471 992', 'fred@stoneagerocks.com', 'Rolling Stones Avenue 3, Bedrock', './pics/3.jpg'),
(4, 'Genie', '0898 471 992', 'genie@WackyRaces.com', 'The Lamp, Royal Palace, Baghdad', './pics/4.jpg'),
(5, 'Bugs Bunny', '08978 482 092', 'bugs@LooneyTunes.com', 'Rabbit Hole, Some Wood', './pics/5.jpg'),
(6, 'Muttley', '0798 725 117', 'muttley@WackyRaces.com', 'WackyRaces Str 23, USA', './pics/6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `ContactName_UNIQUE` (`ContactName`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
