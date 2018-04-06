-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 09:40 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simlitabmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `full_path` text NOT NULL,
  `title` text NOT NULL,
  `ppm_type` enum('a','b') NOT NULL COMMENT 'a = Penelitian Internal; b = PKM',
  `submitted_fund` bigint(20) NOT NULL,
  `period_type` enum('a','b','c') NOT NULL COMMENT 'a = 6, b = 7, c = 8 (all in month)',
  `user_id` int(11) NOT NULL COMMENT 'user id of the uploader',
  `acceptance_status` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '0 = rejected; 1 = accepted; 2 = unconfirmed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `file_name`, `full_path`, `title`, `ppm_type`, `submitted_fund`, `period_type`, `user_id`, `acceptance_status`, `created_at`, `updated_at`) VALUES
(9, 'admin_cv1.pdf', 'E:/xampp/htdocs/simlitabmasci/uploads/admin_cv1.pdf', '', 'a', 0, 'a', 1, '1', '2018-04-06 11:21:54', '2018-04-06 11:22:21'),
(10, 'cv_bature.pdf', 'E:/xampp/htdocs/simlitabmasci/uploads/cv_bature.pdf', '', 'a', 0, 'a', 1, '0', '2018-04-06 11:21:54', '2018-04-06 11:22:21'),
(11, 'andry3.txt', 'E:/xampp/htdocs/simlitabmasci/uploads/andry3.txt', 'Testament', 'a', 1000000, 'a', 2, '2', '2018-04-06 13:44:05', '2018-04-06 13:44:05'),
(12, 'andry4.txt', 'E:/xampp/htdocs/simlitabmasci/uploads/andry4.txt', 'Dante Must Die', 'a', 900000, 'b', 2, '2', '2018-04-06 14:38:43', '2018-04-06 14:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `level_number`) VALUES
(1, 'Admin', 1),
(2, 'Lecturer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
