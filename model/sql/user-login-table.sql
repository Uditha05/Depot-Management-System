-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 04:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlist`
--


INSERT INTO `userlist` (`id`, `first_name`, `designation`, `email`, `password`, `is_deleted`) VALUES
(1, 'Uditha', 'transporter', 'transporter@mora.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(2, 'Tharinda', 'security', 'security@mora.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(4, 'Avishka', 'addmin', 'addmin@mora.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(5, 'Sandaru', 'chashier', 'chashier@mora.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0),
(6, 'Isuranga', 'clerk', 'clerk@mora.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
