-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 04:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product` text NOT NULL,
  `model` text NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `currency` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product`, `model`, `price`, `country`, `currency`) VALUES
(1, 'Car', 'Model Y', 220000, 'Singapore', 'SGD'),
(2, 'Car', 'Model 3', 150000, 'Singapore', 'SGD'),
(3, 'Car', 'Model X', 200000, 'Singapore', 'SGD'),
(4, 'Car', 'Model S', 180000, 'Singapore', 'SGD'),
(5, 'Charging Parts', 'Gen 1 NEMA Adapter', 60, 'Singapore', 'SGD'),
(6, 'Charging Parts', 'Gen 2 NEMA Adapter', 70, 'Singapore', 'SGD'),
(7, 'Car Accessories', 'Car Cover', 300, 'Singapore', 'SGD'),
(8, 'Car Accessories', 'Wireless Phone Charger', 150, 'Singapore', 'SGD'),
(9, 'Car Parts', 'Wiper Blade', 35, 'Singapore', 'SGD'),
(10, 'Car Parts', 'HEPA Air Filtration Upgrade', 675, 'Singapore', 'SGD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
