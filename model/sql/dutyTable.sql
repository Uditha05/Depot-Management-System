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
-- Table structure for table `dutyTable`
--

CREATE TABLE `dutyTable` (
  `id` int(11) NOT NULL,
  `busNo` varchar(40) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `conductor` varchar(100) NOT NULL,
  `dispathTime` TIME NOT NULL,
  `arriveTime` TIME NOT NULL,
  `is_disP` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dutyTable`
--
SELECT TIME_FORMAT("dispathTime", "%H:%I") FROM `dutyTable` ;

 -- INSERT INTO `dutyTable` (`id`, `busNo`, `destination`, `driver`, `conductor`,`dispathTime`,`arriveTime`) VALUES
 -- (1, 'NB22', 'panadura', 'Amal', 'saman','00:00');
-- (2, 'NB23', 'colombo', 'kamal', 'ranwa','00:00:00'),
-- (4, 'NB24', 'padukka', 'bimal', 'chamth','00:00:00'),
-- (5, 'NB25', 'kalutara', 'sunil', 'lanka','00:00:00'),
-- (6, 'NB26', 'meepe', 'ranga', 'silva');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dutyTable`
--
ALTER TABLE `dutyTable`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dutyTable`
--
ALTER TABLE `dutyTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
