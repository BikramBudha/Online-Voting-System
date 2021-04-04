-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 04:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'hello', '$2y$10$V4ffw70W9LP0TJOpxeMGHe9PLIb0kn9663BQJGUNCmM8L9pI2nDQ.', '2020-01-17 05:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `collector`
--

CREATE TABLE `collector` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collector`
--

INSERT INTO `collector` (`id`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'orange', '$2y$10$QkD4PDv2xbpKJ2HgEVdIXeAlCXnODBR0.oZaQm.ij5cDBivS/pi6e', 0, '2020-01-17 04:53:28'),
(3, 'mango', '$2y$10$WGs.kF7ac.ZNzwQJEQMdSOfBxYKh1yCum/Yy8rJdWOcnjMiVaAsnO', 0, '2020-01-17 09:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `collector_voting`
--

CREATE TABLE `collector_voting` (
  `id` int(11) NOT NULL,
  `votingname` varchar(255) NOT NULL,
  `collectorname` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collector_voting`
--

INSERT INTO `collector_voting` (`id`, `votingname`, `collectorname`, `status`) VALUES
(9, 'Power plant presidency voting', 'orange', 0),
(10, 'Water Manager voting', 'orange', 0),
(11, 'Power plant presidency voting', 'congress', 0),
(12, 'Power plant presidency voting', 'hero', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'leon', '$2y$10$B/PfaNo0nOMVtffHY0ygX.AQdulH8aSz5cXYoH/kwMxwwljlrtY/.', 0, '2020-01-01 13:26:07'),
(2, 'robin', '$2y$10$90.5lyqZSVPY1.MXByeNa.GjV1nq24Hzh.m3cTzLnyNAvrqmtrFQO', 0, '2020-01-01 13:40:50'),
(6, 'apple', '$2y$10$Z/Ji8f.aLs8gqbtrnufeme36uhC5yTCurvGjpX3uLiPx8gguwyaDu', 1, '2020-01-17 04:51:38'),
(7, 'rabin', '$2y$10$pc8ctnTdj.bfW.W6q4Hz.OQe4AmJmDazAoAonwUrxNsqQBk2ymRCK', 1, '2020-01-17 05:14:13'),
(9, 'hero', '$2y$10$O9NNh7rhh3wLFs3Ply42fetwcaMBd0eTRNhfnySyZVXFocmQpUajG', 0, '2020-01-17 09:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `candidate` varchar(255) NOT NULL,
  `votingsystem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user`, `candidate`, `votingsystem`) VALUES
(11, 'rabin', 'orange', 'Power plant presidency voting'),
(12, 'rabin', 'orange', 'Power plant presidency voting');

-- --------------------------------------------------------

--
-- Table structure for table `votingsystem`
--

CREATE TABLE `votingsystem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votingsystem`
--

INSERT INTO `votingsystem` (`id`, `name`, `status`) VALUES
(1, 'Power plant presidency voting', 0),
(3, 'Water Manager voting', 0),
(4, 'Nepal Government Election', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `collector`
--
ALTER TABLE `collector`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `collector_voting`
--
ALTER TABLE `collector_voting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votingsystem`
--
ALTER TABLE `votingsystem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collector`
--
ALTER TABLE `collector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collector_voting`
--
ALTER TABLE `collector_voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `votingsystem`
--
ALTER TABLE `votingsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
