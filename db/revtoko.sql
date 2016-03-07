-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Mar 2016 pada 01.13
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
-- Struktur dari tabel `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`CountryID` int(11) NOT NULL,
  `CountryName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `country`
--

INSERT INTO `country` (`CountryID`, `CountryName`) VALUES
(1, 'Indonesia'),
(2, 'United States of America');

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

INSERT INTO `design` (`Id`, `ProductName`, `ProductImage`, `RequestPrice`, `UserID`, `created_at`) VALUES
(9, 'Jennifer', 'Jennifer.PNG', 150000, 1, '2016-02-23 14:48:47');

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

INSERT INTO `productdesc` (`Id`, `ProductID`, `ProductName`, `Description`, `pimg1`, `pimg2`, `pimg3`, `pimg4`, `pimg5`) VALUES
(25, 51, 'Baju pertama', 'bajujujujuju', 'monositelogo(2).jpg', 'artisticcs(8).PNG', 'monositebg(1).PNG', '', '');

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

INSERT INTO `products` (`Id`, `DesignID`, `CategoryID`) VALUES
(51, 9, 1);

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

INSERT INTO `productsprice` (`Id`, `ProductID`, `Price`, `isCurrent`) VALUES
(49, 51, 150000, 1);

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

INSERT INTO `productstags` (`Id`, `ProductID`, `Tag`) VALUES
(17, 9, 'abstract');

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

INSERT INTO `stock` (`Id`, `ProductID`, `UnitID`, `Stock`) VALUES
(49, 51, 6, 0);

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

INSERT INTO `units` (`Id`, `CategoryID`, `Unit`) VALUES
(1, 1, 'XS'),
(2, 1, 'S'),
(3, 1, 'M'),
(4, 1, 'L'),
(5, 1, 'XL'),
(6, 0, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`Id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Id`), ADD KEY `CountryID` (`CountryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
