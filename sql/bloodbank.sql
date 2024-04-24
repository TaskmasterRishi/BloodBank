-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 10:41 AM
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
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodcenterdetail`
--

CREATE TABLE `bloodcenterdetail` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hospitalName` varchar(100) DEFAULT NULL,
  `category` varchar(15) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `faxNo` varchar(20) DEFAULT NULL,
  `licenceNo` varchar(30) NOT NULL,
  `helplineNo` varchar(10) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `beds` int(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodcenterdetail`
--

INSERT INTO `bloodcenterdetail` (`id`, `email`, `name`, `hospitalName`, `category`, `contact`, `faxNo`, `licenceNo`, `helplineNo`, `website`, `beds`, `state`, `district`, `city`, `landmark`, `pincode`) VALUES
(1, 'hospital1@gmail.com', 'Red Bank', 'Mega Red', 'Private', '8980402011', 'Af0-85642', 'Haf-0984516', '9925393170', 'http://my-home-page.com', 95, 'Gujrat', 'Rajkot', 'Gondal ', 'Voluptas exercitatio', 360311),
(2, 'hospital2@gmail.com', 'blood bank', 'Mega Red 2', 'Private', '8980402010', 'Af0-85642', 'Haf-0984516', '9925393173', 'http://my-home-page.com', 105, 'Gujrat', 'Rajkot', 'Gondal ', 'Voluptas exercitatio', 360311),
(4, 'hospital4@gmail.com', 'hospital4', 'Red Bank', 'Govt.', '9856321470', 'asd-asdfgsgd', 'FDS-145221', '8965230147', 'www.hospital4.com', 104, 'Delhi', 'Agra', 'Hawda', 'Se. 4 near A M modi School', 121345);

-- --------------------------------------------------------

--
-- Table structure for table `blooddetail`
--

CREATE TABLE `blooddetail` (
  `id` int(10) NOT NULL,
  `donorid` int(10) NOT NULL,
  `type` varchar(5) NOT NULL,
  `amount` float NOT NULL,
  `bloodcenterid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blooddetail`
--

INSERT INTO `blooddetail` (`id`, `donorid`, `type`, `amount`, `bloodcenterid`) VALUES
(12, 0, 'O+', 300, 1),
(13, 0, 'A-', 100, 1),
(14, 0, 'B+', 150, 1),
(15, 1, 'B+', 20, 1),
(16, 4, 'O+', 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `id` int(10) NOT NULL,
  `donorid` int(10) NOT NULL,
  `campid` int(10) NOT NULL,
  `present` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`id`, `donorid`, `campid`, `present`) VALUES
(1, 1, 10, 'no'),
(14, 4, 10, 'no'),
(15, 4, 18, 'no'),
(16, 1, 18, 'no'),
(17, 1, 20, 'no');

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
(20, '2024-04-24', 'dummy', 'dummy address', 'dummy', 'dummy', '0987654321', 'Blood Bank', '22:26:00.000000', '23:26:00.000000'),
(31, '2024-04-27', 'Mega Red', 'asd asd asd ad a', 'Gujarat', 'Rajkot', '8980402010', 'Hot guy', '13:59:00.000000', '12:59:00.000000');

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
  `state` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `landmark` varchar(200) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donordetail`
--

INSERT INTO `donordetail` (`id`, `name`, `email`, `contact`, `gender`, `dob`, `bloodGroup`, `height`, `weight`, `state`, `district`, `city`, `landmark`, `pincode`) VALUES
(1, 'Rishi Patodiya', 'rishipatodiya12@gmail.com', '8980402010', 'male', '2004-09-18', 'B+', 185, 85, 'Gujarat', 'Rajkot', 'Gondal', 'A-10 Decora City', 360311),
(2, 'Devansh Kansagra', 'dkansagra04@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Shlok Goswami', 'shlok.goswami2002@gmail.com', '7016562277', 'male', '2004-07-06', 'O+', 170, 73, 'Gujarat', 'Vadodara', 'vadodara', 'opp. Tejas School', 123456),
(5, 'RishiPatodiya', 'patoliyarishi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Rishi Patodiya', 'rishipatodiya123@gmail.com', '8980402010', 'male', '2004-09-18', 'A+', 185, 85, 'Maharastra', 'Mumbai', 'Lokhandwala', 'st. 2 west cost', 120521),
(7, 'Shlok', 'shloak@gmail.com', '9856321470', 'male', '2003-06-03', 'AB+', 120, 70, 'Delhi', 'Noida', 'Noida', 'Sector 1 nr Hawda Bridge', 111111);

-- --------------------------------------------------------

--
-- Table structure for table `donorlogin`
--

CREATE TABLE `donorlogin` (
  `ID` int(100) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imagename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorlogin`
--

INSERT INTO `donorlogin` (`ID`, `userEmail`, `password`, `imagename`) VALUES
(1, 'rishipatodiya12@gmail.com', '$2y$10$V8HsuXsZvnCULj5ML6v0F.3kboEDFRdj8j4KA5eA7NrnipTN5uBAS', '1.jpg'),
(2, 'dkansagra04@gmail.com', '$2y$10$HpkDg2KnGMYIpvBvBnD6/OPYBNc7ZDfjgc81LzlO4QROu.8z60oO2', '2.jpg'),
(4, 'shlok.goswami2002@gmail.com', '$2y$10$vVhvOjaVqLPxAUDREg3LOOqfJQdMLU4RVDWfIr5RFObd6bVrbQKwK', '4.png'),
(5, 'patoliyarishi@gmail.com', '$2y$10$QXz/SR3toCqn1AD4PfMNve5JATNOLiUBudhTjW.Gms8R6xFru9iOm', NULL),
(6, 'rishipatodiya123@gmail.com', '$2y$10$5beVPat5LLOWg.IzSsegLOD8EuPH7j1SuJOdGhoMB.RsaOVMbOEZG', NULL),
(7, 'shloak@gmail.com', '$2y$10$RoaqmYB041VCC5X.nsCxpO7v1Ebz9Psvw6zS6HirmUG37IGXXMLWC', '7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `hospitallogin`
--

CREATE TABLE `hospitallogin` (
  `id` int(5) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imagename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitallogin`
--

INSERT INTO `hospitallogin` (`id`, `pass`, `email`, `imagename`) VALUES
(1, '$2y$10$UKTyW/XjPiKW7dS0i3uezeu7w0QrQ67Yz5BUOtxGiMqgApnA7VQW2', 'hospital1@gmail.com', '1.jpeg'),
(2, '$2y$10$0kKvUEJ4J9V6GGaRbq.eb.Xf8Ud.QwrqOZ5Ci934SrwDDRYILe7NW', 'hospital2@gmail.com', NULL),
(3, '$2y$10$DrKSE9T9auSQSvCQzZg0G.JwEp8bUWFsiDz6nGtjtFB7GHqNf44Em', 'xutukuzu@mailinator.com', NULL),
(4, '$2y$10$imicmsyXifpA8VSGVRpxHuZ8vAABKyvmfDanCDcd7077uEI/w4q4m', 'hospital4@gmail.com', NULL);

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
-- Indexes for table `camp`
--
ALTER TABLE `camp`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blooddetail`
--
ALTER TABLE `blooddetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `campdetail`
--
ALTER TABLE `campdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `donorlogin`
--
ALTER TABLE `donorlogin`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
