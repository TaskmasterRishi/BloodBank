-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 12:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `donordetail`
--

CREATE TABLE `donordetail` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood` varchar(5) NOT NULL,
  `address` varchar(200) NOT NULL,
  `campid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donordetail`
--

INSERT INTO `donordetail` (`id`, `name`, `email`, `age`, `contact`, `gender`, `blood`, `address`, `campid`) VALUES
(1, 'shlok goswami', 'shlok.goswami2002@gmail.com', '19', '', 'male', 'O+', 'erfverve,etvevetrtv,\r\nerverver,\r\nerrv,79879e', 10),
(3, 'shlok', 'shlok.goswami2002@gmail.com', '22', '', 'male', 'B+', 'emkclermkcflermnfl\r\nerfverf\r\nrefv', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donordetail`
--
ALTER TABLE `donordetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donordetail`
--
ALTER TABLE `donordetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
