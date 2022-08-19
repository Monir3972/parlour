-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 09:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parlar`
--

-- --------------------------------------------------------

--
-- Table structure for table `parlars`
--

CREATE TABLE `parlars` (
  `id` int(10) NOT NULL,
  `parlar_code` varchar(100) NOT NULL,
  `parlar_name` varchar(100) NOT NULL,
  `parlar_location` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parlars`
--

INSERT INTO `parlars` (`id`, `parlar_code`, `parlar_name`, `parlar_location`, `is_active`) VALUES
(1, '83008', 'Mirpur ', 'Mirpure, Vasantek', 1),
(2, '83003', 'Vasantek', 'Mirpure, 2', 1),
(3, '83002', 'Rampura', 'Rampura,Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_records`
--

CREATE TABLE `sales_records` (
  `id` int(10) NOT NULL,
  `date_of_sales` date NOT NULL,
  `parlar_id` int(10) NOT NULL,
  `net_sales` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `gross` varchar(100) NOT NULL,
  `received_date` date NOT NULL,
  `entry_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_records`
--

INSERT INTO `sales_records` (`id`, `date_of_sales`, `parlar_id`, `net_sales`, `vat`, `gross`, `received_date`, `entry_date`) VALUES
(1, '0000-00-00', 1, '10', '20', '30', '2022-08-01', '2022-08-18'),
(2, '2022-08-18', 2, '2344', '23', '32444', '2022-08-18', '2022-08-18'),
(3, '2022-08-18', 3, '2000', '23', '2023', '2022-08-19', '2022-08-18'),
(4, '2022-08-19', 1, '2344', '23', '2367', '2022-08-04', '2022-08-18'),
(5, '2022-08-19', 2, '200', '23', '223', '2022-08-01', '2022-08-18'),
(6, '0000-00-00', 0, '10', '3', '13', '0000-00-00', '2022-08-18'),
(7, '2022-08-18', 3, '10', '20', '30', '2022-08-26', '2022-08-18'),
(8, '2022-08-19', 1, '100', '100', '200', '2022-08-19', '2022-08-18'),
(9, '2022-08-18', 0, '500', '7', '507', '2022-08-01', '2022-08-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parlars`
--
ALTER TABLE `parlars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_records`
--
ALTER TABLE `sales_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parlars`
--
ALTER TABLE `parlars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_records`
--
ALTER TABLE `sales_records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
