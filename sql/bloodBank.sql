-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2024 at 01:55 PM
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
-- Database: `bloodBank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodcenterdetail`
--

CREATE TABLE `bloodcenterdetail` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodcenterdetail`
--

INSERT INTO `bloodcenterdetail` (`id`, `name`, `address`, `email`, `state`, `district`) VALUES
(1, 'blood center', 'dummy address', 'bloodbank@gmail.com', 'gujarat', 'vadodara'),
(2, 'hospital', 'powe,efwrgvv,ef', 'wndf@gmail.com', 'gujarat', 'vadodara'),
(3, 'hospital1', 'wfnwewnf,3ferf,f', 'hospital1@gmail.com', 'gujarat', 'vadodara');

-- --------------------------------------------------------

--
-- Table structure for table `blooddetail`
--

CREATE TABLE `blooddetail` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `bloodcenterid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campdetail`
--

CREATE TABLE `campdetail` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `organizedBy` varchar(30) NOT NULL,
  `time1` time(6) NOT NULL,
  `time2` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campdetail`
--

INSERT INTO `campdetail` (`id`, `date`, `name`, `address`, `state`, `district`, `contact`, `organizedBy`, `time1`, `time2`) VALUES
(5, '2024-04-08', 'name', 'address', 'state', 'district', '0123456789', 'blood center', '08:00:00.000000', '20:30:00.000000'),
(10, '2024-04-08', 'blood center', 'RC Dutt Rd, Near to Indian Oil Petrol pump, Aradhana Society, Vishwas Colony, Alkapuri, Vadodara, Gujarat 390007', 'gujarat', 'vadodara', '9999999999', 'hospital', '07:00:00.000000', '22:30:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `donordetail`
--

CREATE TABLE `donordetail` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `bloodGroup` varchar(5) NOT NULL,
  `height` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `address` varchar(225) NOT NULL,
  `pincode` int(6) NOT NULL,
  `campid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donordetail`
--

INSERT INTO `donordetail` (`id`, `name`, `email`, `contact`, `gender`, `dob`, `bloodGroup`, `height`, `weight`, `address`, `pincode`, `campid`) VALUES
(1, 'shlok goswami', 'shlok.goswami2002@gmail.com', '', 'male', '0000-00-00', 'O+', 0, 0, 'erfverve,etvevetrtv,\r\nerverver,\r\nerrv,79879e', 0, 10),
(3, 'shlok', 'shlok.goswami2002@gmail.com', '', 'male', '0000-00-00', 'B+', 0, 0, 'emkclermkcflermnfl\r\nerfverf\r\nrefv', 0, 5),
(4, 'Rishi Patodiya', 'rishipatodiya12@gmail.com', '8980402010', 'male', '2004-09-18', 'A+', 185, 85, 'A - 10, Decora City, Gundala, Gondal , Rajkot, Gujrat', 360311, 5);

-- --------------------------------------------------------

--
-- Table structure for table `donorlogin`
--

CREATE TABLE `donorlogin` (
  `ID` int(100) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `otp` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorlogin`
--

INSERT INTO `donorlogin` (`ID`, `userEmail`, `password`, `date`, `otp`) VALUES
(2, 'rishipatodiya12@gmail.com', '$2y$10$mhJMl4a7tDKEJs13M/27fu1LNqYIfMXhz7Kq9to4rNJQ6n3LRTgIy', '2024-04-01 21:37:24', NULL),
(3, 'shlok.goswami2002@gmail.com', '$2y$10$qgNyTjXPELH/rN66ahKuVe3CYl7EZ.LTub0bBy3/aIE4bmaq8m.Na', '2024-04-02 10:17:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospitallogin`
--

CREATE TABLE `hospitallogin` (
  `id` int(5) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitallogin`
--

INSERT INTO `hospitallogin` (`id`, `pass`, `email`) VALUES
(3, '$2y$10$MOZuwAtZG5Lyf12AKijHWerApIc5ExNNgVo7hPDpPrMOVbk7iwEwa', 'hospital1@gmail.com'),
(4, '$2y$10$cDsnEWGzo1C1ss5LVV7tNeHZiWb4Hw6b0Rkx0IFZ7Yu4lIWE7YTjS', 'hospital2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodcenterdetail`
--
ALTER TABLE `bloodcenterdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blooddetail`
--
ALTER TABLE `blooddetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campdetail`
--
ALTER TABLE `campdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donordetail`
--
ALTER TABLE `donordetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donorlogin`
--
ALTER TABLE `donorlogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodcenterdetail`
--
ALTER TABLE `bloodcenterdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blooddetail`
--
ALTER TABLE `blooddetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campdetail`
--
ALTER TABLE `campdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `donordetail`
--
ALTER TABLE `donordetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donorlogin`
--
ALTER TABLE `donorlogin`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
