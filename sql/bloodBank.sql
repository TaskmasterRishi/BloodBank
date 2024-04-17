-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2024 at 01:26 PM
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
(1, 'Blood Bank', 'dummy address', 'bloodbank@gmail.com', 'gujarat', 'vadodara'),
(6, 'hospital', 'dummy address', 'hospital1@gmail.com', 'gujarat', 'vadodara');

-- --------------------------------------------------------

--
-- Table structure for table `blooddetail`
--

CREATE TABLE `blooddetail` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL,
  `amount` float NOT NULL,
  `bloodcenterid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blooddetail`
--

INSERT INTO `blooddetail` (`id`, `email`, `type`, `amount`, `bloodcenterid`) VALUES
(12, 'shlok.goswami2002@gmail.com', 'O+', 300, 6),
(13, 'abc@gmail.com', 'A-', 100, 6),
(14, 'dummy@gmail.com', 'B+', 150, 6);

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
(10, '2024-04-08', 'blood center', 'RC Dutt Rd, Near to Indian Oil Petrol pump, Aradhana Society, Vishwas Colony, Alkapuri, Vadodara, Gujarat 390007', 'gujarat', 'vadodara', '9999999999', 'hospital', '07:00:00.000000', '22:30:00.000000'),
(18, '2024-04-26', 'camp blood', 'envnee\r\nevvewrvwrvwv\r\neverv,32323', 'state', 'district', '1234567890', 'hospital', '08:00:00.000000', '21:00:00.000000'),
(20, '2024-04-24', 'dummy', 'dummy address', 'dummy', 'dummy', '0987654321', 'Blood Bank', '22:26:00.000000', '23:26:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `donordetail`
--

CREATE TABLE `donordetail` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bloodGroup` varchar(5) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `campid` int(10) DEFAULT NULL,
  `present` varchar(5) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donordetail`
--

INSERT INTO `donordetail` (`id`, `name`, `email`, `contact`, `gender`, `dob`, `bloodGroup`, `height`, `weight`, `address`, `pincode`, `campid`, `present`) VALUES
(1, 'Rishi Patodiya', 'rishipatodiya12@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `donorlogin`
--

CREATE TABLE `donorlogin` (
  `ID` int(100) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorlogin`
--

INSERT INTO `donorlogin` (`ID`, `userEmail`, `password`, `date`) VALUES
(1, 'rishipatodiya12@gmail.com', '$2y$10$6cK.D2izDj9zDSuIZgTXSOkQDdTFfT73pCTqqojSPJGFB/TVcFH6.', '2024-04-17 16:38:56');

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
(6, '$2y$10$zuaYbs/Jg7cKfUIVk2zHtOtAG/jlGt517AqcPfO8/kwunWnLwsIUm', 'bloodbank@gmail.com');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blooddetail`
--
ALTER TABLE `blooddetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `campdetail`
--
ALTER TABLE `campdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `donorlogin`
--
ALTER TABLE `donorlogin`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
