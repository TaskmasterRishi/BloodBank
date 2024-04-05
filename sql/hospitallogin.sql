-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 10:27 PM
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
-- Indexes for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
