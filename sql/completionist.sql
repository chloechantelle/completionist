-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 08:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `completionist`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `ContractID` int(20) UNSIGNED NOT NULL,
  `PaymentDate` varchar(10) NOT NULL,
  `PaymentAmount` int(5) NOT NULL,
  `TimeGiven` varchar(10) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `GameID` int(20) UNSIGNED NOT NULL,
  `UserID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ContractID`, `PaymentDate`, `PaymentAmount`, `TimeGiven`, `Status`, `GameID`, `UserID`) VALUES
(132, '23/2/18', 50, '2', 'In Progress', 2, 2),
(134, '27/04/18', 60, '60', 'Awaiting confirmation', 3, 2),
(135, '2/2/18', 50, '50', 'Completed', 1, 2),
(136, '4/4/18', 1, '2', 'Finishing', 3, 1),
(147, '', 0, '', 'Submitted', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `GameID` int(20) UNSIGNED NOT NULL,
  `GameTitle` varchar(30) NOT NULL,
  `DateReleased` date NOT NULL,
  `GamePlatform` varchar(10) NOT NULL,
  `Cover` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameID`, `GameTitle`, `DateReleased`, `GamePlatform`, `Cover`) VALUES
(1, 'Nioh', '2017-02-07', 'PS4', 'http://localhost/completionist/view/img/games/Nioh.jpg'),
(2, 'Ninja Gaiden', '2005-09-20', 'Xbox 360', 'http://localhost/completionist/view/img/games/NinjaGaiden.jpg'),
(3, 'Bloodborne', '2015-03-24', 'PS4', 'http://localhost/completionist/view/img/games/Bloodborne.jpg'),
(4, 'Silent Hill: Homecoming', '2008-09-30', 'PC', 'http://localhost/completionist/view/img/games/SilentHill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(20) UNSIGNED NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `PSNID` varchar(50) DEFAULT NULL,
  `SteamID` varchar(50) DEFAULT NULL,
  `XboxID` varchar(50) DEFAULT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Password`, `FirstName`, `LastName`, `Email`, `Country`, `PSNID`, `SteamID`, `XboxID`, `Role`) VALUES
(1, 'Password1', 'Jim', 'Doe', 'completionist@gmail.com', 'Australia', 'TheCompletionist', 'TheCompletionist', 'TheCompletionist', 'Admin'),
(2, 'Password1', 'Ben', 'Doe', 'test@gmail.com', 'Australia', 'Test1', 'Test1', 'Test1', 'Customer'),
(24, '$2y$10$Y4jXInoU3vmndYqI7MMaFuS', '', '', 'difojkdg', '', NULL, NULL, NULL, 'Customer'),
(35, '$2y$10$BXS71wD/IXrVcsfJKp20E.4', '', '', 'cbb', '', NULL, NULL, NULL, 'Customer'),
(36, '$2y$10$A0fgrgyoyulRg4TE2yh0OOf', '', '', 'gnbvhnvgngf', '', NULL, NULL, NULL, 'Customer'),
(37, '$2y$10$AxlsO0uW4QKyp1ScITg5Qu9', '', '', 'gnbvhnvgngf', '', NULL, NULL, NULL, 'Customer'),
(38, '$2y$10$V0UZC9PotqcUmZQbfFj87OU', '', '', 'gnbvhnvgngf', '', NULL, NULL, NULL, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ContractID`),
  ADD KEY `GameID` (`GameID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `ContractID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
