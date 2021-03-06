-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 05:09 AM
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
  `Date` varchar(10) NOT NULL,
  `PaymentAmount` int(5) NOT NULL,
  `TimeGiven` varchar(10) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `GameID` int(20) UNSIGNED NOT NULL,
  `UserID` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ContractID`, `Date`, `PaymentAmount`, `TimeGiven`, `Status`, `GameID`, `UserID`) VALUES
(132, '23/02/2018', 404, '4', 'Confirmed and Payed', 2, 2),
(134, '27/04/2018', 60, '60', 'Awaiting confirmation', 3, 2),
(152, '05/05/2018', 88, '888', 'Completed', 3, 1),
(154, '05/05/2018', 70, '739', 'Completed', 5, 1),
(155, '05/05/2018', 70, '746', 'Completed', 6, 1),
(156, '05/05/2018', 300, '3178', 'Completed', 7, 1),
(157, '05/05/2018', 400, '480', 'Completed', 8, 1),
(158, '05/05/2018', 300, '342', 'Completed', 9, 1),
(159, '05/05/2018', 700, '732', 'Completed', 10, 1),
(171, '23/05/2018', 300, '3000', 'Payment Recieved', 10, 2);

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
(1, 'Nioh', '2017-02-07', 'PS4', '../view/img/games/nioh.jpg'),
(2, 'Ninja Gaiden', '2005-09-20', 'Xbox 360', '../view/img/games/ninjagaiden.jpg'),
(3, 'Bloodborne', '2015-03-24', 'PS4', '../view/img/games/bloodborne.jpg'),
(4, 'Silent Hill: Homecoming', '2008-09-30', 'PC', '../view/img/games/silenthill.jpg'),
(5, 'Batman', '2016-08-02', 'PS4', '../view/img/games/batman.png'),
(6, 'Far Cry Primal', '2016-02-23', 'PS4', '../view/img/games/farcry.jpg'),
(7, 'Killing Floor 2', '2016-11-18', 'PS4', '../view/img/games/killingfloor.jpg'),
(8, 'Fallout 4', '2015-11-20', 'PS4', '../view/img/games/fallout.jpg'),
(9, 'Final Fantasy 15', '2016-11-29', 'PS4', '../view/img/games/finalfantasyxv.jpg'),
(10, 'Skyrim', '2011-11-11', 'PS4', '../view/img/games/skyrim.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `emailID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`emailID`, `email`, `subject`, `message`) VALUES
(38, 'test@email', 'Subject', 'Message');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(20) UNSIGNED NOT NULL,
  `Avi` varchar(255) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `PSNID` varchar(50) DEFAULT NULL,
  `SteamID` varchar(50) DEFAULT NULL,
  `XboxID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Avi`, `Role`, `Password`, `FirstName`, `LastName`, `Email`, `Country`, `PSNID`, `SteamID`, `XboxID`) VALUES
(1, '../view/img/avi/fav.png ', 'Admin', 'Password1', 'Jim', 'Doe', 'completionist@gmail.com', 'Australia', 'TheCompletionist', 'TheCompletionist', 'TheCompletionist'),
(2, '../view/img/avi/default.png', 'Customer', 'Password1', 'Ben', 'Doe', 'test@gmail.com', 'Australia', 'Test1', 'Test1', 'Test1');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`emailID`);

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
  MODIFY `ContractID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
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
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
