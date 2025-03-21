-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 09:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipt2_midterm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pure_pour`
--

CREATE TABLE `pure_pour` (
  `CUSTOMER_ID` bigint(255) NOT NULL,
  `CUSTOMER_NAME` text NOT NULL,
  `DRINK_NAME` text NOT NULL,
  `CATEGORY` text NOT NULL,
  `PREFERENCE` text NOT NULL,
  `SIZE` text NOT NULL,
  `PRICE` varchar(255) NOT NULL,
  `SERVICE_TYPE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pure_pour`
--

INSERT INTO `pure_pour` (`CUSTOMER_ID`, `CUSTOMER_NAME`, `DRINK_NAME`, `CATEGORY`, `PREFERENCE`, `SIZE`, `PRICE`, `SERVICE_TYPE`) VALUES
(3, 'Christian Macaranas', 'Tea tea', 'Milk Tea', 'More ice', 'Large', '100', 'Take Out'),
(8, 'Rochelle', 'Tower', 'Alcohol', 'Strong', 'Large', '120', 'Dine in'),
(9, 'Lyra Mae', 'GIN', 'BEER', '100%ALCOHOL', 'EXTRA LARGE', '0', 'Take Out'),
(10, 'Diether', 'Coffee', 'Cafe ', 'Strong and Sweet', 'Large Cup', '120', 'Dine in'),
(11, 'Diether', 'royal', 'softdrinks', 'cold', 'Large Cup', '0', 'Dine in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pure_pour`
--
ALTER TABLE `pure_pour`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pure_pour`
--
ALTER TABLE `pure_pour`
  MODIFY `CUSTOMER_ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
