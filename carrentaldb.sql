-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 09:10 PM
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
(6, 'Domasian', 'Cley', 'Villarba', 'CAVITE', 'GENERAL TRIAS', 'Buenavista I', 'IG', '0560844548', 'KUPALIN'),
(7, 'Domasian', 'Dredd', 'Villarba', 'BATANGAS', 'NASUGBU', 'Latag', 'Damulag kay kakang reyne', '09272483891', 'YoungDon'),
(9, 'magalulo', 'francis', 'middleMan', 'TARLAC', 'CITY OF TARLAC (Capital)', 'Batang-batang', 'ilaya', '065768752', 'Dredd'),
(10, 'burak', 'rubert', 'pagsanghan', 'BATANGAS', 'MABINI', 'Poblacion', 'kapatagan', '08945654', 'Dredd'),
(11, 'aywan sayo ya', 'jrizz', 'bengbeng', 'BENGUET', 'BAKUN', 'Ampusongan', 'vengvang', '089245', 'Dredd');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rentalID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `carType` varchar(250) DEFAULT NULL,
  `ratePerDay` decimal(10,2) DEFAULT NULL,
  `numberOfDays` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `dateStart` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `addedBy` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rentalID`, `customerID`, `carType`, `ratePerDay`, `numberOfDays`, `total`, `dateStart`, `dateEnd`, `addedBy`) VALUES
(7, 7, 'SEDAN', 500.00, 5, 2500.00, '2025-06-10', '2025-06-15', 'Dredd'),
(8, 7, 'VAN', 55.00, 3, 165.00, '2025-06-07', '2025-06-10', 'Dredd'),
(9, 11, 'SEDAN', 55.00, 6, 330.00, '2025-06-12', '2025-06-18', 'Dredd'),
(10, 11, 'SEDAN', 500.00, 9, 4500.00, '2025-06-13', '2025-06-22', 'KUPALIN');

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
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rentalID`),
  ADD KEY `customerID` (`customerID`);

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
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customerinfo` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
