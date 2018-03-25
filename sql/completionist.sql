-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 01:13 PM
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
  `Status` varchar(20) NOT NULL,
  `GameID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ContractID`, `PaymentDate`, `PaymentAmount`, `TimeGiven`, `Status`, `GameID`) VALUES
(1, '20/20/10', 100, '10 hrs', 'Completed', 1),
(2, '2', 2, '2', 'Another Game Title', 2),
(3, '3', 3, '3', 'Game Name', 3),
(4, '4', 4, '4', 'Name of Game', 4),
(14, '4/4/4', 50, '5 hrs', 'Completed', 3),
(15, '4/4/4', 50, '2 hrs', 'Completed', 3),
(24, '4/4/4', 40, '1 hrs', 'Completed', 3),
(25, '4/4/4', 50, '1 hrs', 'Completed', 2),
(26, '2/4/17', 350, '50 hrs', 'In Progress', 1),
(27, '23/4/17', 100, '4 hrs', 'In Progress', 4),
(28, '2/4/18', 150, '10 hrs', 'Finalizing Contract', 4),
(30, '25/3/18', 200, '100 hrs', 'Awaiting Payment', 3),
(124, '23/3/18', 50, '2 hrs', 'In Progress', 3),
(126, '1', 1, '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contractstatus`
--

CREATE TABLE `contractstatus` (
  `StatusID` int(20) UNSIGNED NOT NULL,
  `CurrentStatus` varchar(20) NOT NULL,
  `ContractID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `contractstatus`
--

INSERT INTO `contractstatus` (`StatusID`, `CurrentStatus`, `ContractID`) VALUES
(1, 'Progressing', 1),
(2, 'Working', 14);

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
(2, 'Password1', 'Ben', 'Doe', 'test@gmail.com', 'Australia', 'Test1', 'Test1', 'Test1', 'Customer'),
(23, 'iskdsfs', '', '', 'dfsskj', '', NULL, NULL, NULL, 'Customer'),
(24, '$2y$10$Y4jXInoU3vmndYqI7MMaFuS', '', '', 'difojkdg', '', NULL, NULL, NULL, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ContractID`),
  ADD KEY `GameID` (`GameID`);

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
  MODIFY `ContractID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `contractstatus`
--
ALTER TABLE `contractstatus`
  MODIFY `StatusID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `contractstatus`
--
ALTER TABLE `contractstatus`
  ADD CONSTRAINT `contractID.status` FOREIGN KEY (`ContractID`) REFERENCES `contract` (`ContractID`) ON UPDATE NO ACTION;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `contract` (`GameID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
