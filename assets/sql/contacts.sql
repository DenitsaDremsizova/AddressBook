-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 04:45 PM
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
  `Address` varchar(500) DEFAULT NULL,
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
(6, 'Muttley', '0798 725 117', 'muttley@WackyRaces.com', 'WackyRaces Str 23, USA', './pics/6.jpg'),
(19, 'Aladdin', '0989 688 566', 'aladdin@baghdad.org', 'Royal Palace, Baghdad', './pics/aladdin.png'),
(20, 'Abu', '0989 562 451', 'abu@coolmonkeys.com', 'Royal Palace, Baghdad', './pics/abu.png'),
(21, 'Tweety Bird', '0989 456 268', 'tweety@cutethings.com', 'Bird''s Cage, Old Woman''s House', './pics/tweety.jpg'),
(22, 'Mickey Mouse', '0989 678 445', 'mickey@rodents.com', 'Mickey Mouse''s House, Mickey''s Toontown, Disneyland', './pics/Mickey_Mouse.png'),
(23, 'Minnie Mouse', '0989 678 449', 'minnie@rodents.com', 'Minnie Mouse''s House, Mickey''s Toontown, Disneyland', './pics/minnie.jpg'),
(24, 'Bamm-Bamm Rubble', '0987 418 473', 'bamm-bamm@stoneagerocks.com', 'Rolling Stones Avenue 4, Bedrock', './pics/Bamm-Bamm_Rubble.png'),
(25, 'Eeyore', '0363 234 890', 'eeyore@everythingsucks.com', 'Shitty Place, Pooh''s Wood', './pics/eeyore.jpg'),
(26, 'Dino', '0313 464 562', 'dino@stoneagerocks.com', 'Front Door''s Mat Rolling Stones Avenue 3, Bedrock', './pics/dino.jpg'),
(27, 'Dumbo', '0313 389 233', 'dumbo@somecircus.org', 'Some Circus, Dineyland', './pics/dumbo.jpg'),
(28, 'Taz', '0231 329 239', 'taz@LooneyTunes.com', 'Island of Tasmania, Australia', './pics/taz.jpg'),
(29, 'Goofy', '0881 378 209', 'goofy@weirdcreatures.com', 'Goofy''s House, Mickey''s Toontown, Disneyland', './pics/goofy.png'),
(30, 'Bambi', '0843 567 400', 'bambi@cutethings.com', 'Where Deers Live, Disneyland', './pics/bambi.jpg'),
(31, 'Donald Duck', '0843 783 009', 'donald-duck@coolbirds.com', 'Donald Duck''s House, Mickey''s Toontown, Disneyland', './pics/donaldduck.jpg'),
(32, 'Dennie', '0998 671 567', 'deni4ka_d@yahoo.com', 'Lulin, Sofia', './pics/default.jpg'),
(34, 'Test', '', 'test@test.com', '', './pics/default.jpg');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
