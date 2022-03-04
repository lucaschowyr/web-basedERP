-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 11:15 AM
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
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `emp_id` int(3) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_pwd` varchar(20) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `job_position` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `status` enum('Active','Resign') NOT NULL,
  `country` varchar(30) NOT NULL,
  `appt_date` date NOT NULL,
  `auth` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`emp_id`, `user_id`, `user_pwd`, `emp_name`, `job_position`, `dept`, `gender`, `status`, `country`, `appt_date`, `auth`) VALUES
(101, 'raphael101', '101', 'Raphael Foo', 'CEO', 'Management', 'Male', 'Active', 'Singapore', '2022-01-03', 'User'),
(201, 'dini201', '201', 'Dini Fitriyani', 'Sales Manager', 'Sales', 'Female', 'Active', 'China', '2022-01-03', 'Admin'),
(202, 'lucas202', '202', 'Lucas Chow', 'IT Manager', 'IT', 'Male', 'Active', 'Vietnam', '2022-01-03', 'Admin'),
(203, 'ivy203', '203', 'Lai Pei Chen', 'Logistics Manager', 'Logistics', 'Female', 'Active', 'Singapore', '2022-01-03', 'Admin'),
(204, 'sherinna204', '204', 'Sin San Sung', 'HR Manager', 'HR', 'Female', 'Active', 'China', '2022-01-03', 'Admin'),
(205, 'mark205', '205', 'Mark', 'Manager', 'IT', 'Male', 'Active', 'China', '2022-01-10', 'User'),
(206, 'sharon206', '206', 'Sharon206', 'Manager', 'Sales', 'Female', 'Resign', 'CHN', '2022-01-10', 'User'),
(207, 'yeo207', '207', 'Yeo', 'Manager', 'IT', 'Male', 'Active', 'Vietnam', '2022-01-10', 'User'),
(208, 'don208', '208', 'DON', 'Manager', 'Sales', 'Male', 'Active', 'Vietnam', '2022-01-10', 'User'),
(209, 'sham209', '209', 'Sham', 'Manager', 'Logistics', 'Male', 'Active', 'Vietnam', '2022-02-14', 'User'),
(210, 'shu210', '210', 'Shu', 'Manager', 'Logistics', 'Female', 'Resign', 'China', '2022-02-14', 'User'),
(211, 'iris211', '211', 'Iris', 'Clerk', 'Sales', 'Female', 'Active', 'Singapore', '2022-01-14', 'User'),
(212, 'alex212', '212', 'Alex', 'Clerk', 'IT', 'Male', 'Resign', 'Vietnam', '2022-01-14', 'User'),
(213, 'christy213', '213', 'Christy', 'Clerk', 'Logistics', 'Female', 'Resign', 'Singapore', '2022-01-18', 'User'),
(214, 'wendy214', '214', 'Wendy', 'Clerk', 'HR', 'Female', 'Active', 'China', '2022-01-18', 'User'),
(215, 'roy215', '215', 'Roy', 'Clerk', 'IT', 'Male', 'Resign', 'China', '2022-01-18', 'User'),
(216, 'sandy216', '216', 'Sandy', 'Clerk', 'Sales', 'Female', 'Active', 'China', '2022-01-18', 'User'),
(217, 'ray217', '217', 'Ray', 'Clerk', 'IT', 'Male', 'Active', 'Singapore', '2022-01-20', 'User'),
(218, 'george218', '218', 'George', 'Clerk', 'Sales', 'Male', 'Resign', 'Vietnam', '2022-01-20', 'User'),
(219, 'morgan219', '219', 'Morgan', 'Clerk', 'Logistics', 'Male', 'Resign', 'Vietnam', '2022-01-20', 'User'),
(220, 'jelin220', '220', 'Jelin', 'Clerk', 'Logistics', 'Female', 'Active', 'China', '2022-01-20', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
