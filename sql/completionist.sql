-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 07:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `GameID` int(20) UNSIGNED NOT NULL,
  `UserID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ContractID`, `PaymentDate`, `PaymentAmount`, `GameID`, `UserID`) VALUES
(1, '20/20/10', 100, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contractstatus`
--

CREATE TABLE `contractstatus` (
  `StatusID` int(20) UNSIGNED NOT NULL,
  `CurrentStatus` varchar(20) NOT NULL,
  `ContractID` int(20) UNSIGNED NOT NULL,
  `GameID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `contractstatus`
--

INSERT INTO `contractstatus` (`StatusID`, `CurrentStatus`, `ContractID`, `GameID`) VALUES
(1, 'Progressing', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `GameID` int(20) UNSIGNED NOT NULL,
  `GameTitle` varchar(30) NOT NULL,
  `DateReleased` date NOT NULL,
  `GamePlatform` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameID`, `GameTitle`, `DateReleased`, `GamePlatform`) VALUES
(1, 'TitleTest', '2030-10-10', 'PC'),
(2, 'Another Game Title', '0005-06-17', 'PS4'),
(3, 'Game Name', '0002-02-18', 'Xbox'),
(4, 'Name of Game', '2010-12-17', 'PS4');

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
(2, 'Password1', 'Ben', 'Doe', 'test@gmail.com', 'Australia', 'Test1', 'Test1', 'Test1', 'Customer');

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
-- Indexes for table `contractstatus`
--
ALTER TABLE `contractstatus`
  ADD PRIMARY KEY (`StatusID`),
  ADD KEY `ContractID` (`ContractID`);

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
  MODIFY `ContractID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contractstatus`
--
ALTER TABLE `contractstatus`
  MODIFY `StatusID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`ContractID`) REFERENCES `contractstatus` (`ContractID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
