-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Feb 2016 pada 16.07
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES(1, 'Baju');
INSERT INTO `categories` (`Id`, `Name`) VALUES(2, 'tops');
INSERT INTO `categories` (`Id`, `Name`) VALUES(3, 'bottom');
INSERT INTO `categories` (`Id`, `Name`) VALUES(4, 'dress');
INSERT INTO `categories` (`Id`, `Name`) VALUES(5, 'bags');
INSERT INTO `categories` (`Id`, `Name`) VALUES(6, 'totebag');
INSERT INTO `categories` (`Id`, `Name`) VALUES(7, 'sticker');
INSERT INTO `categories` (`Id`, `Name`) VALUES(8, 'homedecor');
INSERT INTO `categories` (`Id`, `Name`) VALUES(9, 'notebook');
INSERT INTO `categories` (`Id`, `Name`) VALUES(10, 'case hp');
INSERT INTO `categories` (`Id`, `Name`) VALUES(11, 'artbook');
INSERT INTO `categories` (`Id`, `Name`) VALUES(12, 'artprint');
INSERT INTO `categories` (`Id`, `Name`) VALUES(13, 'pin');
INSERT INTO `categories` (`Id`, `Name`) VALUES(14, 'scarf');
INSERT INTO `categories` (`Id`, `Name`) VALUES(15, 'greeting cards');
INSERT INTO `categories` (`Id`, `Name`) VALUES(16, 'post card');
INSERT INTO `categories` (`Id`, `Name`) VALUES(17, 'accessories');

-- --------------------------------------------------------

--
-- Struktur dari tabel `design`
--

CREATE TABLE IF NOT EXISTS `design` (
`Id` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `RequestPrice` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `design`
--

INSERT INTO `design` (`Id`, `ProductName`, `ProductImage`, `RequestPrice`, `UserID`, `created_at`) VALUES(9, 'Jennifer', 'Jennifer.PNG', 150000, 1, '2016-02-23 14:48:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `productdesc`
--

CREATE TABLE IF NOT EXISTS `productdesc` (
`Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `pimg1` varchar(250) NOT NULL,
  `pimg2` varchar(250) NOT NULL,
  `pimg3` varchar(250) NOT NULL,
  `pimg4` varchar(250) NOT NULL,
  `pimg5` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `productdesc`
--

INSERT INTO `productdesc` (`Id`, `ProductID`, `ProductName`, `Description`, `pimg1`, `pimg2`, `pimg3`, `pimg4`, `pimg5`) VALUES(25, 51, 'Baju pertama', 'bajujujujuju', 'monositelogo(2).jpg', 'artisticcs(8).PNG', 'monositebg(1).PNG', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`Id` int(11) NOT NULL,
  `DesignID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`Id`, `DesignID`, `CategoryID`) VALUES(51, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `productsprice`
--

CREATE TABLE IF NOT EXISTS `productsprice` (
`Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `isCurrent` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `productsprice`
--

INSERT INTO `productsprice` (`Id`, `ProductID`, `Price`, `isCurrent`) VALUES(49, 51, 150000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `productstags`
--

CREATE TABLE IF NOT EXISTS `productstags` (
`Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Tag` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `productstags`
--

INSERT INTO `productstags` (`Id`, `ProductID`, `Tag`) VALUES(17, 9, 'abstract');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UnitID` int(11) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`Id`, `ProductID`, `UnitID`, `Stock`) VALUES(49, 51, 6, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE IF NOT EXISTS `units` (
`Id` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Unit` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES(1, 1, 'XS');
INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES(2, 1, 'S');
INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES(3, 1, 'M');
INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES(4, 1, 'L');
INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES(5, 1, 'XL');
INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES(6, 0, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `productdesc`
--
ALTER TABLE `productdesc`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `productdesc`
--
ALTER TABLE `productdesc`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `productsprice`
--
ALTER TABLE `productsprice`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `productstags`
--
ALTER TABLE `productstags`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
