-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 09:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dety`
--

CREATE TABLE `dety` (
  `id` int(11) NOT NULL,
  `ipadd` varchar(50) DEFAULT NULL,
  `battery` varchar(25) DEFAULT NULL,
  `det` varchar(255) DEFAULT NULL,
  `mob` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dety`
--

INSERT INTO `dety` (`id`, `ipadd`, `battery`, `det`, `mob`, `created_at`) VALUES
(1, '::1', NULL, NULL, NULL, '2019-05-16 23:40:30'),
(2, '::1', NULL, NULL, NULL, '2019-05-16 23:41:14'),
(3, '::1', NULL, NULL, NULL, '2019-05-16 23:41:27'),
(4, '::1', NULL, NULL, NULL, '2019-05-16 23:48:27'),
(5, '::1', NULL, NULL, NULL, '2019-05-16 23:50:52'),
(6, '::1', NULL, NULL, NULL, '2019-05-17 06:13:57'),
(7, '::1', NULL, NULL, NULL, '2019-05-17 06:16:22'),
(8, '::1', NULL, NULL, NULL, '2019-05-17 06:32:16'),
(9, '::1', NULL, NULL, NULL, '2019-05-17 06:32:29'),
(10, '::1', NULL, NULL, NULL, '2019-05-17 06:32:39'),
(11, '::1', NULL, NULL, NULL, '2019-05-17 06:33:09'),
(12, '::1', NULL, NULL, NULL, '2019-05-17 06:33:26'),
(13, '::1', NULL, NULL, NULL, '2019-05-17 06:33:39'),
(14, '::1', NULL, NULL, NULL, '2019-05-17 06:33:48'),
(15, '::1', NULL, NULL, NULL, '2019-05-17 06:33:53'),
(16, '::1', NULL, NULL, NULL, '2019-05-17 06:33:58'),
(17, '::1', NULL, NULL, NULL, '2019-05-17 06:34:06'),
(18, '::1', NULL, NULL, NULL, '2019-05-17 06:34:10'),
(19, '::1', NULL, NULL, NULL, '2019-05-17 06:35:00'),
(20, '::1', NULL, NULL, NULL, '2019-05-17 06:35:17'),
(21, '::1', NULL, NULL, NULL, '2019-05-17 06:35:32'),
(22, '::1', NULL, NULL, NULL, '2019-05-17 06:36:19'),
(23, '::1', NULL, NULL, NULL, '2019-05-17 06:36:31'),
(24, '::1', NULL, NULL, NULL, '2019-05-17 06:37:35'),
(25, '::1', NULL, NULL, NULL, '2019-05-17 06:39:41'),
(26, '::1', NULL, NULL, NULL, '2019-05-17 06:39:48'),
(27, '::1', NULL, NULL, NULL, '2019-05-17 06:39:57'),
(28, '::1', NULL, NULL, NULL, '2019-05-17 06:40:01'),
(29, '::1', NULL, NULL, NULL, '2019-05-17 06:41:57'),
(30, '::1', NULL, NULL, NULL, '2019-05-17 06:42:03'),
(31, '::1', NULL, NULL, NULL, '2019-05-17 06:42:06'),
(32, '::1', NULL, NULL, NULL, '2019-05-17 06:45:27'),
(33, '::1', NULL, NULL, NULL, '2019-05-17 06:45:35'),
(34, '::1', NULL, NULL, NULL, '2019-05-17 06:45:37'),
(35, '::1', NULL, NULL, NULL, '2019-05-17 06:47:28'),
(36, '::1', NULL, NULL, NULL, '2019-05-17 06:48:33'),
(37, '::1', NULL, NULL, NULL, '2019-05-17 06:49:16'),
(38, '::1', NULL, NULL, NULL, '2019-05-17 06:49:31'),
(39, '::1', NULL, NULL, NULL, '2019-05-17 06:49:37'),
(40, '::1', NULL, NULL, NULL, '2019-05-17 06:50:03'),
(41, '::1', NULL, NULL, NULL, '2019-05-17 06:50:03'),
(42, '::1', NULL, NULL, NULL, '2019-05-17 06:51:50'),
(43, '::1', NULL, NULL, NULL, '2019-05-17 06:52:07'),
(44, '::1', NULL, NULL, NULL, '2019-05-17 06:52:55'),
(45, '::1', NULL, NULL, NULL, '2019-05-17 06:53:36'),
(46, '::1', NULL, NULL, NULL, '2019-05-17 06:55:40'),
(47, '::1', NULL, NULL, NULL, '2019-05-17 06:57:10'),
(48, '::1', NULL, NULL, NULL, '2019-05-17 06:57:46'),
(49, '::1', NULL, NULL, NULL, '2019-05-17 06:58:06'),
(50, '::1', NULL, NULL, NULL, '2019-05-17 06:58:12'),
(51, '::1', NULL, NULL, NULL, '2019-05-17 06:58:47'),
(52, '::1', NULL, NULL, NULL, '2019-05-17 06:58:47'),
(53, '::1', NULL, NULL, NULL, '2019-05-17 06:59:30'),
(54, '::1', NULL, NULL, NULL, '2019-05-17 06:59:58'),
(55, '::1', NULL, NULL, NULL, '2019-05-17 07:00:13'),
(56, '::1', NULL, NULL, NULL, '2019-05-17 07:01:16'),
(57, '::1', NULL, NULL, NULL, '2019-05-17 07:01:31'),
(58, '::1', NULL, NULL, NULL, '2019-05-17 07:01:56'),
(59, '::1', NULL, NULL, NULL, '2019-05-17 07:02:08'),
(60, '::1', NULL, NULL, NULL, '2019-05-17 07:02:12'),
(61, '::1', NULL, NULL, NULL, '2019-05-17 07:02:26'),
(62, '::1', NULL, NULL, NULL, '2019-05-17 07:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `paraone` varchar(255) DEFAULT NULL,
  `paratwo` varchar(255) DEFAULT NULL,
  `imgoneloc` varchar(255) DEFAULT NULL,
  `imgtwoloc` varchar(255) DEFAULT NULL,
  `posted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(50) DEFAULT NULL,
  `whos` varchar(10) DEFAULT 'casual',
  `bio` varchar(100) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `bday` varchar(15) DEFAULT NULL,
  `pimgloc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `password`, `created_at`, `fullname`, `whos`, `bio`, `city`, `bday`, `pimgloc`) VALUES
(1, 'test1', '9999999999', '$2y$10$mpzPdWf.gmDcx41LHC5BAepF5iO1iVOKNppJt1gnHGJdOjh1WOtFe', '2019-05-12 22:35:08', 'Test User 1', 'casual', NULL, NULL, NULL, NULL),
(2, 'test2', NULL, '$2y$10$N7l5IWoOfolmlxJNW5UNi.Lfg3ZsptjCTgIJDhg5uiAjwANzACCyi', '2019-05-13 01:24:03', 'Test User 2', 'casual', NULL, NULL, NULL, NULL),
(3, 'root', NULL, '$2y$10$s8HwTW0nWOfRCl4AoLVnU.RCit.VgTJ9SRO8z/k5AE9NWRiIk4Cna', '2019-05-13 01:38:43', 'Admin 1', 'casual', NULL, NULL, NULL, NULL),
(4, 'admin1', NULL, '$2y$10$Y5aIRXfTfcNqlQkz3pwfHO.vWamFYGCvb1IvA35SFflhjwlkTbC1G', '2019-05-13 01:39:15', 'Admin 1', 'allowhai', NULL, NULL, NULL, NULL),
(5, 'ishan', '1111111111', '$2y$10$r50BMj.G/aYcA4Wp5uyIu.rYENdZi/E/E/mJxdexdzb9.3irQDrDS', '2019-05-13 04:16:26', 'Ishan Mathur', 'allowhai', 'Hi I am Ishan', 'Jaippur', '2013-09-09', '../img/profilepic/ishan_dfeb7abb9284b53a8a0b9ab5c939a9c8.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dety`
--
ALTER TABLE `dety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dety`
--
ALTER TABLE `dety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
