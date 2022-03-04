-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 01:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `ticket_id` int(10) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `description` varchar(500) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dept` text NOT NULL,
  `emp_name` text NOT NULL,
  `emp_id` int(10) NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`ticket_id`, `time`, `description`, `priority`, `status`, `dept`, `emp_name`, `emp_id`, `country`) VALUES
(4, '2022-02-23 00:16:25.882365', 'Phone MDM issue', 'Low', 'Closed', 'Logistic', 'Ivy', 203, 'China'),
(5, '2022-02-23 00:16:33.494204', 'Laptop down', 'Low', 'Closed', 'HR', 'Sherinna', 204, 'Vietnam'),
(6, '2022-02-23 00:16:41.361681', 'Can not access web-based ERP', 'High', 'Open', 'HR', 'Rose', 301, 'Vietnam'),
(7, '2022-02-23 00:12:20.615716', 'Office 365, excel not working', 'High', 'Open', 'Sales', 'Jitsoo', 302, 'China'),
(9, '2022-02-23 00:13:16.154231', 'HP printer can not print', 'High', 'Open', 'IT', 'Jennie', 304, 'Others'),
(10, '2022-02-23 00:14:41.063672', 'Can not perform on-prem verification', 'High', 'Open', 'IT', 'June', 303, 'Vietnam'),
(18, '2022-02-23 00:15:53.190281', 'Monitor down', 'High', 'Open', 'Management 	', 'Nathan', 305, 'Singapore'),
(908, '2022-02-23 00:17:52.936111', 'Can not log in to email', 'Low', 'Closed', 'Sales', 'Nizam', 306, 'Singapore'),
(909, '2022-02-23 00:20:20.607532', 'DNS server down', 'High', 'Closed', 'IT', 'Rossi Law', 307, 'Vietnam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `ticket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
