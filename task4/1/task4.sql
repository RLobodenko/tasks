-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 23, 2024 at 06:43 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task4`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `status`) VALUES
(17, 'roman12', '5350d9dbd5d3b8850271244798d37475', 'roman', 'roman@sfd.fsd', 1),
(18, 'root1', 'e5d9dee0892c9f474a174d3bfffb7810', 'root', 'root@dfs.fds', 1),
(19, 'roman123', '30df196559f6c591e936d7873119f5c9', 'root', 'wre@fsd.fds', 1),
(20, 'roman1234', '625f5553b1a300f53a1ab2507f19e660', 'roman', 'rfds@ds.dfs', 1),
(21, '123', '202cb962ac59075b964b07152d234b70', '342', '234@dfs.re', 1),
(22, 'name', 'b068931cc450442b63f5b3d276ea4297', '132', '312@3.r', 1),
(23, '1235', '9996535e07258a7bbfd8b132435c5962', 'ewq', 'qwe@ewq.eqw', 1),
(24, 'roman12345', '9b04d152845ec0a378394003c96da594', '123124', 'e@e.g', 1),
(25, '123z', '71d5b2f94a90409b19c4496704cf0ce4', '123', 'root@das.dsa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
