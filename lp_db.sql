-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 06:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin', 'Admin@lp.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `constmat_tb`
--

CREATE TABLE `constmat_tb` (
  `mid` int(11) NOT NULL,
  `mname` varchar(60) COLLATE utf8_bin NOT NULL,
  `mdop` date NOT NULL,
  `mava` int(11) NOT NULL,
  `mtotal` int(11) NOT NULL,
  `moriginalcost` int(11) NOT NULL,
  `msellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `constmat_tb`
--

INSERT INTO `constmat_tb` (`mid`, `mname`, `mdop`, `mava`, `mtotal`, `moriginalcost`, `msellingcost`) VALUES
(1, 'brick', '2022-04-06', 192000, 200000, 14, 18);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `cid` int(11) NOT NULL,
  `cname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquant` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`cid`, `cname`, `cadd`, `cpname`, `cpquant`, `cpeach`, `cptotal`, `cpdate`) VALUES
(52, 'preeti', 'sindhupalchwok', 'brick', 2000, 18, 36000, '2022-04-19'),
(53, 'rohit', 'kathmandu', 'brick', 4000, 18, 72000, '2022-04-13'),
(54, 'preeti', 'sindhupalchwok', 'brick', 2000, 18, 36000, '2022-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `labours_tb`
--

CREATE TABLE `labours_tb` (
  `empid` int(11) NOT NULL,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(20) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `labours_tb`
--

INSERT INTO `labours_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(3, 'rohit', 'kahjsd', 8777872323, 'kjashd@gmail.com'),
(4, 'Anisha ', 'Kathmandu', 9877654444, 'anisha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `submitbooking_tb`
--

CREATE TABLE `submitbooking_tb` (
  `booking_id` int(11) NOT NULL,
  `booking_info` text COLLATE utf8_bin NOT NULL,
  `booking_desc` text COLLATE utf8_bin NOT NULL,
  `user_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_add1` text COLLATE utf8_bin NOT NULL,
  `user_add2` varchar(11) COLLATE utf8_bin NOT NULL,
  `user_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_zip` int(11) NOT NULL,
  `user_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitbooking_tb`
--

INSERT INTO `submitbooking_tb` (`booking_id`, `booking_info`, `booking_desc`, `user_name`, `user_add1`, `user_add2`, `user_city`, `user_state`, `user_zip`, `user_email`, `user_mobile`, `submit_date`) VALUES
(1, 'Need mistri.', 'I need a mistri to fix the tiles of my bathroom.', 'Preeti', 'Sankhu, Kathmandu', '09', 'Kathmandu', 'Kjadjk', 44600, 'preeti@gmail.com', 9873676762, '2022-04-27'),
(2, ' Need helpers', 'I need a helper to make my garden', 'pritam', ' 728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, ' kjashd@gmail.com', 8777872323, '2022-04-21'),
(3, ' jnjjkkf', 'lsklks', 'kjajsnjm', ' 728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, ' kjashd@gmail.com', 8777872323, '2022-04-16'),
(4, ' jknjnsjsa', 'lsklks', 'pritam', ' 728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, ' kjashd@gmail.com', 8777872323, '2022-04-16'),
(5, ' I need electrician', 'I need electrician to fix the lighting problem of my house', 'Neri', ' 89', ' Sankhu', 'Kathmandu', 'Bagmati', 44800, ' neri@gmail.com', 9876543246, '2022-04-11'),
(6, ' I need electrician', 'I need electrician to fix the lighting problem of my house', 'Neri', ' 728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, ' kjashd@gmail.com', 8777872323, '2022-04-11'),
(7, ' Need helpers', 'I need a helper to make my garden', 'pritam', ' 728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, ' kjashd@gmail.com', 8777872323, '2022-04-10'),
(8, ' Need helpers', 'I need a helper to make my garden', 'kjajsnjm', ' 728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, ' kjashd@gmail.com', 8777872323, '2022-04-11'),
(9, ' Need electricians', 'I need electrician to fix the lighting problem of my living room.', 'Anusha', ' 093', ' Khulaltar', 'Kathmandu', 'Bagmati', 44660, ' Anusha@gmail.com', 9876543255, '2022-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin_tb`
--

CREATE TABLE `userlogin_tb` (
  `u_login_id` int(11) NOT NULL,
  `u_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `u_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `u_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userlogin_tb`
--

INSERT INTO `userlogin_tb` (`u_login_id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'neri', 'neri@gmail.com', 'neri'),
(2, 'raksya', 'raksya@gmail.com', 'raksya'),
(3, 'preeti', 'preeti@gmail.com', 'preeti'),
(4, 'Sumit', 'sumit@gmail.com', 'sumit'),
(5, 'Yojana', 'yojana@gmail.com', 'yojana');

-- --------------------------------------------------------

--
-- Table structure for table `workassign_tb`
--

CREATE TABLE `workassign_tb` (
  `bno` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `booking_info` text COLLATE utf8_bin NOT NULL,
  `booking_desc` text COLLATE utf8_bin NOT NULL,
  `user_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_add1` text COLLATE utf8_bin NOT NULL,
  `user_add2` text COLLATE utf8_bin NOT NULL,
  `user_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_zip` int(11) NOT NULL,
  `user_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `assign_labour` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `workassign_tb`
--

INSERT INTO `workassign_tb` (`bno`, `booking_id`, `booking_info`, `booking_desc`, `user_name`, `user_add1`, `user_add2`, `user_city`, `user_state`, `user_zip`, `user_email`, `user_mobile`, `assign_labour`, `assign_date`) VALUES
(2, 3, ' jnjjkkf', 'lsklks', 'kjajsnjm', '  728378', ' jasjbj', 'kahjsd', 'kjahjd', 8738676, 'kjashd@gmail.com', 8777872323, 'rohit', '2022-04-28'),
(9, 5, ' I need electrician', 'I need electrician to fix the lighting problem of my house', 'Neri', '  89', ' Sankhu', 'Kathmandu', 'Bagmati', 44800, 'neri@gmail.com', 9876543246, 'rohit', '2022-04-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `constmat_tb`
--
ALTER TABLE `constmat_tb`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `labours_tb`
--
ALTER TABLE `labours_tb`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `submitbooking_tb`
--
ALTER TABLE `submitbooking_tb`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `userlogin_tb`
--
ALTER TABLE `userlogin_tb`
  ADD PRIMARY KEY (`u_login_id`);

--
-- Indexes for table `workassign_tb`
--
ALTER TABLE `workassign_tb`
  ADD PRIMARY KEY (`bno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `constmat_tb`
--
ALTER TABLE `constmat_tb`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `labours_tb`
--
ALTER TABLE `labours_tb`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submitbooking_tb`
--
ALTER TABLE `submitbooking_tb`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userlogin_tb`
--
ALTER TABLE `userlogin_tb`
  MODIFY `u_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workassign_tb`
--
ALTER TABLE `workassign_tb`
  MODIFY `bno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
