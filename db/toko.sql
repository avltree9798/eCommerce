-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2016 at 09:21 PM
-- Server version: 5.6.28-1
-- PHP Version: 5.6.17-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'Baju'),
(2, 'tops'),
(3, 'bottom'),
(4, 'dress'),
(5, 'bags'),
(6, 'totebag'),
(7, 'sticker'),
(8, 'homedecor'),
(9, 'notebook'),
(10, 'case hp'),
(11, 'artbook'),
(12, 'artprint'),
(13, 'pin'),
(14, 'scarf'),
(15, 'greeting cards'),
(16, 'post card'),
(17, 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryName`) VALUES
(1, 'Indonesia'),
(2, 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `Id` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `RequestPrice` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`Id`, `ProductName`, `ProductImage`, `RequestPrice`, `UserID`, `created_at`) VALUES
(6, '34rf43r', '34rf43r.png', 23234, 1, '2016-02-16 13:45:06'),
(7, 'egrgtgrt', 'egrgtgrt.png', 23232, 1, '2016-02-16 13:54:56'),
(8, 'Lala', 'Lala.jpg', 24355, 1, '2016-02-16 16:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `DesignID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `DesignID`, `CategoryID`) VALUES
(7, 6, 1),
(8, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `productsprice`
--

CREATE TABLE `productsprice` (
  `Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `isCurrent` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productsprice`
--

INSERT INTO `productsprice` (`Id`, `ProductID`, `Price`, `isCurrent`) VALUES
(4, 7, 23234, 0),
(5, 7, 3000, 1),
(6, 8, 24355, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productstags`
--

CREATE TABLE `productstags` (
  `Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productstags`
--

INSERT INTO `productstags` (`Id`, `ProductID`, `Tag`) VALUES
(11, 6, 'ee3e3'),
(12, 7, 'apa'),
(13, 7, 'asa'),
(14, 7, 'sas'),
(15, 7, 'dgreg'),
(16, 8, 'tai');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UnitID` int(11) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Id`, `ProductID`, `UnitID`, `Stock`) VALUES
(1, 7, 1, 20),
(2, 7, 2, 0),
(3, 7, 3, 19),
(4, 7, 4, 0),
(5, 7, 5, 0),
(6, 8, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `Id` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES
(1, 1, 'XS'),
(2, 1, 'S'),
(3, 1, 'M'),
(4, 1, 'L'),
(5, 1, 'XL'),
(6, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Fullname`, `Username`, `Email`, `Password`, `CountryID`, `Address`, `Role`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'TEst', 1),
(19, 'apadah', 'apadah', 'apadah@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'erferferf', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `productsprice`
--
ALTER TABLE `productsprice`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `productstags`
--
ALTER TABLE `productstags`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CountryID` (`CountryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `productsprice`
--
ALTER TABLE `productsprice`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `productstags`
--
ALTER TABLE `productstags`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
