-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2022 at 01:35 AM
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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `salesperson_name` varchar(30) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `date`, `product_id`, `product`, `model`, `qty`, `customer_name`, `salesperson_name`, `employee_id`, `country`) VALUES
(1, '2021-01-04 00:55:45', 1, 'Car', 'Model Y', 10, 'Ron', 'Dini', 201, 'Singapore'),
(2, '2022-01-25 00:56:25', 2, 'Car', 'Model 3', 15, 'Lee', 'Lucas', 202, 'Singapore'),
(3, '2021-01-13 08:34:34', 1, 'Car', 'Model Y', 24, 'Hermoine', 'Dini', 201, 'China'),
(4, '2021-01-19 01:00:07', 3, 'Car', 'Model X', 10, 'Truan', 'Ivy', 203, 'Singapore'),
(5, '2022-01-25 01:01:38', 4, 'Car', 'Model S', 20, 'Siti', 'Don', 208, 'Singapore'),
(6, '2022-01-26 11:45:57', 1, 'Car', 'Model Y', 18, 'Ron', 'Dini', 201, 'Singapore'),
(7, '2022-02-16 21:19:16', 4, 'Car', 'Model S', 14, 'Elsa', 'Dini', 201, 'Singapore'),
(8, '2022-02-24 01:35:32', 1, 'Car', 'Model Y', 15, 'Sherinna', 'Dini', 201, 'Vietnam'),
(9, '2022-02-24 01:35:32', 3, 'Car', 'Model X', 12, 'Ron', 'Dini', 201, 'China'),
(10, '2022-02-24 01:33:42', 2, 'Car', 'Model 3', 19, 'Ron', 'Dini', 201, 'Singapore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
