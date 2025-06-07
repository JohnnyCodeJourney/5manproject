-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 05:03 PM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `role`, `username`) VALUES
(1, 'domasiandredd@gmail.com', '123dredd', 'Admin', 'Dredd'),
(3, 'gtc.dredd.domasian@cvsu.edu.ph', '1234dredd', 'Staff', 'YoungDon'),
(5, 'omg@gmail.com', '789dredd', 'Admin', 'KUPALIN');

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `customerID` int(11) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `MiddleName` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `barangay` varchar(250) NOT NULL,
  `detailedAddress` varchar(500) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `addedBy` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`customerID`, `LastName`, `FirstName`, `MiddleName`, `province`, `city`, `barangay`, `detailedAddress`, `contact`, `addedBy`) VALUES
(3, 'Domasian', 'Dredd', 'Villarba', 'CAVITE', 'GENERAL TRIAS', 'Buenavista I', 'Il Giardino Residences, Livorno Street, blk16 lot 46', '09272483891', 'KUPALIN'),
(4, 'Nanalsal', 'Robert', 'ey', 'CAVITE', 'GENERAL TRIAS', 'Pasong Camachile I', 'basta sa grs sila', '05646587351', 'Dredd');

-- --------------------------------------------------------

--
-- Table structure for table `staffrecords`
--

CREATE TABLE `staffrecords` (
  `id` int(11) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `MiddleInitial` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `ContactNumber` varchar(250) NOT NULL,
  `Salary` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffrecords`
--

INSERT INTO `staffrecords` (`id`, `LastName`, `FirstName`, `MiddleInitial`, `Address`, `ContactNumber`, `Salary`) VALUES
(20251, 'Domasian', 'Dredd', 'V', 'Block 14A Lot 17 Messina street Il Giardino', '09272483891', '250000'),
(20252, 'kupal', 'borjer', 'z', 'Block 14A Lot 17 Messina street Il Giardino', '04412345234', '250000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `staffrecords`
--
ALTER TABLE `staffrecords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
