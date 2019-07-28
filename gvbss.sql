-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 06:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gvbss`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_fifth`
--

CREATE TABLE `users_fifth` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(60) DEFAULT NULL,
  `ladd` varchar(100) DEFAULT NULL,
  `padd` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pphone` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `tenth` varchar(15) DEFAULT NULL,
  `twelveth` varchar(15) DEFAULT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `enrollno` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_seventh`
--

CREATE TABLE `users_seventh` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(60) DEFAULT NULL,
  `ladd` varchar(100) DEFAULT NULL,
  `padd` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pphone` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `tenth` varchar(15) DEFAULT NULL,
  `twelveth` varchar(15) DEFAULT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `enrollno` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_third`
--

CREATE TABLE `users_third` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(60) DEFAULT NULL,
  `ladd` varchar(100) DEFAULT NULL,
  `padd` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pphone` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `tenth` varchar(15) DEFAULT NULL,
  `twelveth` varchar(15) DEFAULT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `enrollno` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_third`
--

INSERT INTO `users_third` (`id`, `username`, `password`, `created_at`, `fullname`, `ladd`, `padd`, `phone`, `pphone`, `emailid`, `tenth`, `twelveth`, `semester`, `enrollno`) VALUES
(9, '11111', '$2y$10$N7mdj/qEqbTCzUaZd1StoewV0tcV3vz.xVk2.b9kwymSA3cFMQ5TG', '2019-07-27 12:48:42', 'Student 1', 'asd', 'qwe', '1234567890', '0987654321', 'a@b.c', '1', '2', 'users_third', 'asd'),
(10, '22222', '$2y$10$kYv2mB5vB4Ewp8DkWq215eul9mOetazmpfyCkATxhdAbtFh/O32uS', '2019-07-27 12:49:20', 'Student 2', '123', 'zxc', '0987654321', '1234567890', 'c@b.a', '3', '4', 'users_third', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_fifth`
--
ALTER TABLE `users_fifth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_seventh`
--
ALTER TABLE `users_seventh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_third`
--
ALTER TABLE `users_third`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_fifth`
--
ALTER TABLE `users_fifth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_seventh`
--
ALTER TABLE `users_seventh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_third`
--
ALTER TABLE `users_third`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
