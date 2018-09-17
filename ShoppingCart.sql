-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2018 at 09:44 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ShoppingCart`
--

-- --------------------------------------------------------

--
-- Table structure for table `iOrder`
--

CREATE TABLE `iOrder` (
  `orderID` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `send` int(1) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` varchar(100) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `unitPrice` decimal(10,0) NOT NULL,
  `imgPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `stock`, `unitPrice`, `imgPath`) VALUES
('I001', 'Computer Mouse', 100, '950', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/710fsQrhqlL.jpg'),
('I002', 'Head Set', 150, '750', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/jbl-t450bt-original-imaexkruy5e2rpw3.jpeg'),
('I003', 'Ear Phone', 250, '450', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/51vDXz4sw8L._SX425_.jpg'),
('I004', 'T Shirt', 600, '850', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/231,width=300,height=300,backgroundColor=ffffff.jpg'),
('I005', '64 GB Pen Drive', 50, '4500', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/s-l640.jpg'),
('I006', 'Google Home', 250, '20000', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/10721100.jpg'),
('I007', 'Google Home Mini', 350, '11000', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/u_10171098.jpg'),
('I008', 'G-Shok Watch ', 125, '2500', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/GPRB1000-1_large.png'),
('I009', 'Wireless Mouse', 450, '1750', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/u_21888525.jpg'),
('I010', 'Bag', 200, '1230', '/media/sahan/Data 1/IJSE/WEB/ShoppingCart/images/girls-backpack-bags-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderDetial`
--

CREATE TABLE `orderDetial` (
  `orderDetailID` int(100) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `unitPrice` decimal(10,0) NOT NULL,
  `orderID` int(100) NOT NULL,
  `ItemID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `contact`, `address`, `isAdmin`) VALUES
('heshan', '0000', 'Heshan Rodrigo', '0713025045', 'Mathugama', 0),
('leel', '0000', 'Leel Karunarathne', '0778525630', 'Aluthga,a', 0),
('sahan95', '0000', 'Sahan Rajakaruna', '0713025062', 'Rathnapura', 0),
('vish', '0000', 'Damitha Vishmitha', '0713025062', 'Maharagama', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iOrder`
--
ALTER TABLE `iOrder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `orderDetial`
--
ALTER TABLE `orderDetial`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iOrder`
--
ALTER TABLE `iOrder`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orderDetial`
--
ALTER TABLE `orderDetial`
  MODIFY `orderDetailID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iOrder`
--
ALTER TABLE `iOrder`
  ADD CONSTRAINT `iOrder_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderDetial`
--
ALTER TABLE `orderDetial`
  ADD CONSTRAINT `orderDetial_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderDetial_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `iOrder` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
