-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Apr 29, 2018 at 08:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7
=======
-- Generation Time: Mar 26, 2018 at 08:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30
>>>>>>> origin/master

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
  `TimeGiven` varchar(10) NOT NULL,
<<<<<<< HEAD
  `Status` varchar(30) NOT NULL,
=======
  `Status` varchar(20) NOT NULL,
>>>>>>> origin/master
  `GameID` int(20) UNSIGNED NOT NULL,
  `UserID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ContractID`, `PaymentDate`, `PaymentAmount`, `TimeGiven`, `Status`, `GameID`, `UserID`) VALUES
<<<<<<< HEAD
(132, '23/2/18', 50, '2', 'In Progress', 2, 2),
(134, '27/04/18', 60, '60', 'Awaiting confirmation', 3, 2),
(135, '2/2/18', 50, '50', 'Completed', 1, 2),
(136, '4/4/18', 1, '2', 'Finishing', 3, 1),
(147, '', 0, '', 'Submitted', 4, 2);
=======
(1, '20/20/10', 100, '10', 'Completed', 1, 2),
(2, '2', 2, '2', 'Completed', 2, 2),
(3, '3', 3, '3', 'Completed', 3, 2),
(4, '4', 4, '4', 'Completed', 4, 2),
(14, '4/4/4', 50, '5', 'Completed', 3, 24),
(15, '4/4/4', 50, '2', 'Completed', 3, 23),
(24, '4/4/4', 40, '1', 'Completed', 3, 2),
(25, '4/4/4', 50, '1', 'Completed', 2, 2),
(26, '2/4/17', 350, '50', 'In Progress', 1, 2),
(27, '23/4/17', 100, '4', 'In Progress', 4, 2),
(28, '2/4/18', 150, '10', 'Finalizing Contract', 4, 2),
(30, '25/3/18', 200, '100', 'Awaiting Payment', 3, 24),
(124, '23/3/18', 50, '2', 'In Progress', 3, 24),
(131, '26/3/18', 100, '2', 'Finalizing Contract', 3, 24),
(132, '23/2/18', 50, '2', 'In Progress', 2, 2),
(133, '58943', 5984395, '58349', '59898', 2, 35);

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
>>>>>>> origin/master

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
<<<<<<< HEAD
=======

--
-- Indexes for table `contractstatus`
--
ALTER TABLE `contractstatus`
  ADD PRIMARY KEY (`StatusID`),
  ADD KEY `ContractID` (`ContractID`);
>>>>>>> origin/master

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
<<<<<<< HEAD
  MODIFY `ContractID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
=======
  MODIFY `ContractID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `contractstatus`
--
ALTER TABLE `contractstatus`
  MODIFY `StatusID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> origin/master
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
<<<<<<< HEAD
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;
=======
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

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
>>>>>>> origin/master

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
