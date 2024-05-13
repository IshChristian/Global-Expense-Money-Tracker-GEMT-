-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 11:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `date`, `user`) VALUES
(1, 'Dining Out', '2024-05-10', 'IshChristian'),
(2, 'Salary', '2024-05-10', 'IshChristian'),
(6, 'Bitcoin', '2024-05-12', 'IshChristian');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `en_id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`en_id`, `category`, `amount`, `date`, `user`) VALUES
(1, 'Dining Out', 100, '2024-05-10', 'IshChristian'),
(4, 'Bitcon', 500, '2024-05-12', 'IshChristian');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `in_id` int(11) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `outgoing` int(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`in_id`, `source`, `amount`, `date`, `outgoing`, `user`) VALUES
(1, 'Salary', 100000, '2024-05-10', 100000, 'IshChristian'),
(2, 'Bitcon', 400000, '2024-05-10', 399500, 'IshChristian');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `lo_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`lo_id`, `type`, `amount`, `date`, `user`) VALUES
(1, 'Insurance', 100, '2024-05-11', 'IshChristian'),
(2, 'Car', 60, '2024-05-11', 'IshChristian');

-- --------------------------------------------------------

--
-- Table structure for table `saving`
--

CREATE TABLE `saving` (
  `sa_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `target` int(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saving`
--

INSERT INTO `saving` (`sa_id`, `name`, `target`, `amount`, `date`, `user`) VALUES
(1, 'Insurance', 100000, 200, '2024-05-11', 'IshChristian'),
(2, 'Car', 20000000, 19900100, '2024-05-11', 'IshChristian'),
(3, 'House', 200000, 450, '2024-05-11', 'IshChristian');

-- --------------------------------------------------------

--
-- Table structure for table `setbudget`
--

CREATE TABLE `setbudget` (
  `bu_id` int(11) NOT NULL,
  `category` varchar(10) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `period` int(100) DEFAULT NULL,
  `days` varchar(10) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `user` varchar(20) DEFAULT NULL,
  `spend` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setbudget`
--

INSERT INTO `setbudget` (`bu_id`, `category`, `amount`, `period`, `days`, `date`, `user`, `spend`) VALUES
(1, 'Dining Out', 500, 2, '0', '2024-05-10', 'IshChristian', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `passwordconf` varchar(20) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `fname`, `lname`, `email`, `password`, `passwordconf`, `country`, `type`, `sex`, `date`) VALUES
(1, 'black', 'nillah', 'black@gmail.com', '123', '', 'Rwanda', 'Personal', 'Female', '2024-05-12'),
(2, 'ishimwe', 'christian', 'ishimwechris94@gmail.com', '123', '', 'Rwanda', 'Business', 'Male', '2024-05-12'),
(3, 'munezero', 'keven', 'munezero@gmail.com', '123', '', 'Uganda', 'Business', 'Male', '2024-05-12'),
(4, 'tian', 'IshChristian', 'ishimwechristi94@gmail.com', '123', '', 'Tanzania', 'Business', 'Male', '2024-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `wi_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`wi_id`, `type`, `amount`, `date`, `user`) VALUES
(1, 'Insurance', 100, '2024-05-11', 'IshChristian'),
(2, 'Car', 100000, '2024-05-11', 'IshChristian'),
(3, 'Car', 100000, '2024-05-11', 'IshChristian'),
(4, 'Car', 200000000, '2024-05-11', 'IshChristian'),
(5, 'House', 100, '2024-05-11', 'IshChristian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `saving`
--
ALTER TABLE `saving`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `setbudget`
--
ALTER TABLE `setbudget`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`wi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saving`
--
ALTER TABLE `saving`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setbudget`
--
ALTER TABLE `setbudget`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `wi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
