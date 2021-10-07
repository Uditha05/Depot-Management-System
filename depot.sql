-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 06:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depot`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendancerecord`
--

CREATE TABLE `attendancerecord` (
  `aid` int(15) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `ontime` time NOT NULL,
  `offtime` time NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` int(5) NOT NULL,
  `StartDate` date NOT NULL,
  `Numplate` varchar(10) NOT NULL,
  `State` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `StartDate`, `Numplate`, `State`) VALUES
(1, '2000-04-20', 'NB1254', 'waiting'),
(2, '2000-04-20', 'NB3278', 'waiting'),
(3, '2000-04-20', 'NB4567', 'parked'),
(4, '2000-04-20', 'NB1235', 'parked'),
(5, '2000-04-20', 'NB9876', 'parked'),
(6, '2020-11-15', 'NB2345', 'parked'),
(7, '2020-11-15', 'NB2346', 'parked'),
(8, '2020-11-15', 'NB2345', 'parked'),
(9, '2020-11-15', 'NB2347', 'parked'),
(10, '2020-11-15', 'NB2348', 'parked'),
(11, '2020-11-15', 'NB2344', 'parked'),
(12, '2020-11-15', 'NB2236', 'parked'),
(13, '2020-11-15', 'NB1345', 'parked'),
(14, '2020-11-15', 'NB2235', 'parked'),
(15, '2020-11-15', 'NB2234', 'parked'),
(16, '2020-11-15', 'NB2233', 'parked'),
(17, '2020-11-15', 'NB2232', 'parked'),
(18, '2020-11-15', 'NB2230', 'parked'),
(19, '2020-11-15', 'NB2229', 'parked'),
(20, '2020-11-15', 'NB2228', 'parked'),
(21, '2020-11-15', 'NB2227', 'parked'),
(22, '2020-11-15', 'NB2226', 'parked'),
(23, '2020-11-15', 'NB2225', 'parked');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `compid` int(5) NOT NULL,
  `dutyid` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dutyrecord`
--

CREATE TABLE `dutyrecord` (
  `dutyid` int(15) NOT NULL,
  `busid` int(11) DEFAULT NULL,
  `routeid` int(11) DEFAULT NULL,
  `slotid` int(11) DEFAULT NULL,
  `ticketbookid` int(11) DEFAULT NULL,
  `driverid` int(11) DEFAULT NULL,
  `conductorid` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `DispatchTime` time DEFAULT NULL,
  `dieselusage` int(11) DEFAULT NULL,
  `CashAmount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dutyrecord`
--

INSERT INTO `dutyrecord` (`dutyid`, `busid`, `routeid`, `slotid`, `ticketbookid`, `driverid`, `conductorid`, `Date`, `DispatchTime`, `dieselusage`, `CashAmount`) VALUES
(18, 2, 1, 37, NULL, 31, 50, '2020-12-11', NULL, 0, NULL),
(19, 1, 1, 37, NULL, 32, 53, '2020-12-11', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(5) NOT NULL,
  `FirstName` tinytext NOT NULL,
  `LastName` tinytext NOT NULL,
  `Birthday` date NOT NULL,
  `Gender` tinytext NOT NULL,
  `Address` text DEFAULT NULL,
  `Telephone` tinytext NOT NULL,
  `NIC` tinytext NOT NULL,
  `Designation` tinytext NOT NULL,
  `Email` text DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `IsDeleted` tinytext DEFAULT NULL,
  `Available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `FirstName`, `LastName`, `Birthday`, `Gender`, `Address`, `Telephone`, `NIC`, `Designation`, `Email`, `StartDate`, `EndDate`, `IsDeleted`, `Available`) VALUES
(1, 'Avishka', 'Rathnavibushana', '1998-03-31', 'male', '47,Dias place,Panadura', '0711737706', '980910814V', 'Worker', 'mailavishka@gmail.com', '2020-11-13', NULL, '0', 1),
(2, 'Sandaru', 'Kaveesha', '1998-06-10', 'male', '45, Mathugama', '0712565486', '980652235V', 'Driver', 'sandaru@gmail.com', '2020-11-13', NULL, '0', 0),
(3, 'Uditha', 'Isuranga', '1997-12-03', 'male', '23, Horan', '0772549526', '980256426V', 'Engineer', 'uditha@gmail.com', '2020-11-13', NULL, '0', 1),
(4, 'Tharinda', 'Kadanarachchi', '1999-06-10', 'male', '32, Horana', '0762546581', '980125463V', 'Conductor', 'tharinda@gmail.com', '2020-11-13', NULL, '0', 0),
(5, 'Ashen', 'Shanuka', '1998-06-17', 'male', '23, Wadduwa', '0712565495', '980650325V', 'Conductor', 'ashen@gmail.com', '2020-11-13', NULL, '0', 0),
(6, 'Isuru', 'Lakmal', '1998-04-01', 'male', '34, Suduwalla', '0712546985', '980910853V', 'Driver', 'isuru@gmail.com', '2020-11-13', NULL, '0', 0),
(7, 'Sahan', 'Viduranga', '1998-04-03', 'male', '34, Wadduwa', '0761524358', '980650435V', 'Worker', 'sahan@gmail.com', '2020-11-13', NULL, '0', 1),
(8, 'Benil', 'Srilal', '1997-06-19', 'male', '23, kalutara', '0714568526', '953265425V', 'Admin', 'mailavishka@gmail.com', '2020-11-13', NULL, '0', 1),
(9, 'Nandana ', 'Pushpakumara', '1998-07-05', 'male', '7/A, Kurusa handiya', '0761249856', '956954125V', 'Transporter', 'nandana@gmail.com', '2020-11-13', NULL, '0', 1),
(10, 'Asel', 'Manjitha', '1997-11-25', 'male', '34, Horana', '0714526549', '952465254V', 'Transporter', 'asel@gmail.com', '2020-11-13', NULL, '0', 1),
(11, 'Yomali', 'Nissanka', '1997-09-11', 'Female', '56/B, Hirana', '0714587456', '952654852V', 'Cashier', 'yomali@gmail.com', '2020-11-13', NULL, '0', 1),
(12, 'Himesha', 'Malshan', '1998-12-26', 'male', '12, Horana', '0764587423', '984523648V', 'Transporter', 'himesha@gmail.com', '2020-11-13', NULL, '0', 1),
(13, 'Sithmi', 'Amalka', '1998-08-30', 'Female', '23, Kalutara', '0717842563', '972456854V', 'Cashier', 'sithmi@gmail.com', '2020-11-13', NULL, '0', 1),
(14, 'Jehan', 'Kulathunga', '1997-09-05', 'male', '34, Kalutara', '0712545125', '963251256v', 'Cashier', 'jehan@gmail.com', '2020-11-13', NULL, '0', 1),
(15, 'Kalana', 'Jayalath', '1997-12-05', 'male', '98, Horana', '0717856456', '982452354V', 'Security', 'kalana@gmail.com', '2020-11-13', NULL, '0', 1),
(16, 'Pasindu', 'Yeshan', '1998-06-23', 'male', '58, Horana', '0714526456', '982456789V', 'Security', 'pasindu@gmail.com', '2020-11-13', NULL, '0', 1),
(17, 'Rishitha', 'Kalupahana', '1997-12-05', 'male', '12, Horana', '0717892493', '963456159V', 'Security', 'rishitha@gmail.com', '2020-11-13', NULL, '0', 1),
(18, 'Rumal', 'Pethangoda', '1997-05-26', 'male', '34, Wadduwa', '0712512159', '952635452V', 'Clerk', 'rumal@gmail.com', '2020-11-13', NULL, '0', 1),
(19, 'Uresh', 'Kandanarachchi', '1996-12-05', 'male', '34, Horana', '0764525459', '952458523V', 'Clerk', 'uresh@gmail.com', '2020-11-13', NULL, '0', 1),
(20, 'Venusha', 'Dulshan', '1997-02-20', 'male', '34, Hoeana', '0772255456', '963357159V', 'Engineer', 'venusha@gmail.com', '2020-11-13', NULL, '0', 1),
(21, 'Vidura', 'Erandika', '1997-02-15', 'male', '23, Panadura', '0778845666', '957554159V', 'Engineer', 'vidura@gmail.com', '2020-11-13', NULL, '0', 1),
(22, 'Vishwa', 'Oshada', '1997-02-12', 'male', '12, Horana', '0775436444', '975112455V', 'Worker', 'vishwa@gmail.com', '2020-11-13', NULL, '0', 1),
(23, 'Avishka', 'Shamendra', '1998-12-05', 'male', '23, Colombo', '0772255485', '965845259V', 'Worker', 'shamendra@gmail.com', '2020-11-13', NULL, '0', 1),
(24, 'Charuka', 'Rathnayaka', '1997-02-15', 'male', '45, Galle', '0779945888', '975225448V', 'Worker', 'charuka@gmail.com', '2020-11-13', NULL, '0', 1),
(25, 'Lishan', 'Isuru', '1997-11-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-11-13', NULL, '0', 0),
(26, 'Lishan', 'Isuru', '1998-10-04', 'male', '32, Panadura', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(27, 'Maleesha', 'Dilshan', '1998-05-24', 'male', '22, Hoarana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(28, 'Milindu', 'Malshan', '1997-01-21', 'male', '12, Bandaraga', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(29, 'Nipun', 'Deelaka', '1998-01-21', 'male', '9, Ingiriya', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(30, 'Nisal', 'Senadeera', '1999-10-11', 'male', '45, Kalutara', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(31, 'Pramod', 'Fonseka', '1999-10-11', 'male', '56, Nalluruwa', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(32, 'Prasanna', 'Rangajith', '1997-06-30', 'male', '15, Walana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(33, 'Randil', 'Ashen', '1997-06-30', 'male', '43, Walapala', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(34, 'Rumal', 'Pethangoda', '1999-06-30', 'male', '12, Bandaraga', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(35, 'Sadun', 'Nimshan', '1999-08-30', 'male', '56, Nalluruwa', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(36, 'Sakuntha', 'Dilshan', '1999-10-24', 'male', '56, Nalluruwa', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(37, 'Sithum', 'Amalka', '1999-10-23', 'male', '458, Bandaragama', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(38, 'Pasindu', 'Nelaka', '1999-02-23', 'male', '12, Panadura', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(39, 'Yohan', 'Deelak', '1998-02-23', 'male', '42, Bandaraga', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(40, 'Sithul', 'Deshan', '1998-06-30', 'male', '32, Nalluruwa', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(41, 'Tharindu', 'Kosala', '1998-06-30', 'male', '45, Horana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(42, 'Tharuka', 'Shenal', '1998-06-04', 'male', '65, Horana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(43, 'Thavindu', 'Keshan', '1998-02-04', 'male', '5, Horana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(44, 'Tishan', 'Ravishanka', '1998-05-04', 'male', '45, Panadura', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(45, 'Thisal', 'Nimnaka', '1998-05-04', 'male', '45, Walana', '0771645259', '980256415V', 'Driver', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(46, 'Sadun', 'Kavinda', '1998-09-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(47, 'Gayan', 'Danushka', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(48, 'Dushan', 'Sadaru', '1998-09-24', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(49, 'Lahiru', 'Sampath', '1998-09-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(50, 'Mihira', 'Dilshan', '1998-02-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(51, 'Achala', 'Sulakshana', '1998-02-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(52, 'Dulan', 'Santhush', '1999-10-23', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(53, 'Geeth', 'De mel', '1998-06-30', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(54, 'Hasala', 'Nimnaka', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(55, 'Hasindu', 'Lakshan', '1999-10-23', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(56, 'Kavindu', 'Kavinda', '1999-10-23', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(57, 'Mahima', 'Sampath', '1998-02-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(58, 'Noshan', 'Viduranga', '1999-02-23', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(59, 'Pasindu', 'Rashan', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(60, 'Ravindu', 'Sasanka', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(61, 'Sangeeth', 'Peiris', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(62, 'Sasitha', 'Lakmal', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 0),
(63, 'Thilan', 'Meegoda', '1998-02-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(64, 'Ushan', 'Isuranga', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(65, 'Kushan', 'Ravintha', '1998-02-04', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1),
(66, 'Lahiru', 'Perera', '1998-09-14', 'male', '22, Hoarana', '0771645259', '980256415V', 'Conductor', 'maillishan@gmail.com', '2020-01-01', NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paysheet`
--

CREATE TABLE `paysheet` (
  `paysheetid` int(15) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `paidFor` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `employeeName` varchar(30) NOT NULL,
  `workingdays` int(3) NOT NULL,
  `dailyamount` float NOT NULL,
  `basicsalary` float NOT NULL,
  `othours` int(10) NOT NULL,
  `hourlyotamount` float NOT NULL,
  `ottotal` float NOT NULL,
  `totalsalary` float NOT NULL,
  `bonusNames` longtext NOT NULL,
  `bonusValues` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeid` int(5) NOT NULL,
  `RouteName` tinytext NOT NULL,
  `Description` text NOT NULL,
  `RouteNumber` tinytext NOT NULL,
  `Distance` float(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeid`, `RouteName`, `Description`, `RouteNumber`, `Distance`) VALUES
(1, 'Katharagama', 'Horana - Rathnapura , Alpitiya - Katharagama', '1', 222.9),
(2, 'Colombo', 'Horana - Colombo', '2', 43.2),
(3, 'Purahala', 'Horana - Purahala', '3', 37.1),
(4, 'Kohuwala', 'Horana - Kohuwala', '4', 30.0),
(5, 'Piliyandala', 'Horana - Piliyandala', '5', 20.6),
(6, 'Colombo', 'Horana - Batuwita - Colombo', '6', 43.0),
(7, 'Gonapola', 'Horana - Batuwita - Gonapola', '7', 11.6),
(8, 'Maharagama', 'Horana - Moragahahena - Maharagama', '8', 29.5),
(9, 'Thalgahavila', 'Horana - Thalgahavila', '9', 10.8),
(10, 'Padukka', 'Horana - Malagama - Padukka', '10', 20.2),
(11, 'Millawa', 'Horana - Puhuwala - Millawa', '11', 13.1),
(12, 'Moronthuduwa', 'Horana - Millaniya - Moronthuduwa', '12', 16.0),
(13, 'Batagoda', 'Horana - Batagoda', '13', 12.0),
(14, 'Mathugama', 'Horana - Kalawallawa - Mathugama', '13', 43.8),
(15, 'Bulathsinhala', 'Horana - Bulathsinhala', '14', 22.6),
(16, 'Warakagoda', 'Horana - Gowinna - Warakagoda', '15', 19.0),
(17, 'Wagawaththa', 'Horana - Wagawaththa', '16', 11.0),
(18, 'Meepe', 'Horana - Moragahahena - Meepe', '17', 20.0),
(19, 'Moragahahena', 'Horana - Owitigala - Moragahahena', '18', 10.4),
(20, 'Hadapangoda', 'Horana - Hadapangoda', '19', 14.6),
(21, 'Ranawirugama', 'Horana - Ranawirugama', '20', 12.3),
(22, 'Karadana', 'Horana - Madala - Karadana', '21', 32.4),
(23, 'Ingiriya', 'Horana - Ingiriya', '22', 13.8),
(24, 'Mathugama', 'Horana - Naabada - Mathugama', '23', 32.2),
(25, 'Aguruwathota', 'Horana - Aguruwathota', '24', 12.0),
(26, 'Mathugama', 'Horana - Kottiyahena - Mathugama', '25', 31.0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sid` int(3) NOT NULL,
  `Designation` tinytext NOT NULL,
  `DaySal` int(10) NOT NULL,
  `HourOt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sid`, `Designation`, `DaySal`, `HourOt`) VALUES
(1, 'Admin', 3000, 800),
(2, 'Engineer', 2340, 700),
(3, 'Cashier', 1670, 500),
(4, 'Transporter', 1670, 500),
(5, 'Driver', 1340, 400),
(6, 'Worker', 1340, 400),
(7, 'Clerk', 1000, 200),
(8, 'Security', 1000, 200),
(9, 'Conductor', 1000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `ticketbook`
--

CREATE TABLE `ticketbook` (
  `ticketbookid` int(10) NOT NULL,
  `Tickets` int(5) NOT NULL,
  `CurruntNumber` int(10) NOT NULL,
  `StartNumber` int(10) NOT NULL,
  `EndNumber` int(10) NOT NULL,
  `State` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticketbook`
--

INSERT INTO `ticketbook` (`ticketbookid`, `Tickets`, `CurruntNumber`, `StartNumber`, `EndNumber`, `State`) VALUES
(1, 1001, 0, 0, 1000, 'ready'),
(2, 2001, 0, 0, 2000, 'ready'),
(3, 2001, 200, 200, 2200, 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `timeslottable`
--

CREATE TABLE `timeslottable` (
  `slotid` int(5) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslottable`
--

INSERT INTO `timeslottable` (`slotid`, `day`, `time`) VALUES
(1, 'Monday', '08:00:00'),
(3, 'Monday', '09:00:00'),
(4, 'Monday', '10:00:00'),
(5, 'Monday', '13:00:00'),
(6, 'Monday', '14:00:00'),
(7, 'Monday', '15:00:00'),
(8, 'Tuesday', '09:00:00'),
(9, 'Tuesday', '13:00:00'),
(10, 'Tuesday', '14:00:00'),
(11, 'Wednesday', '09:00:00'),
(12, 'Wednesday', '10:00:00'),
(13, 'Wednesday', '13:00:00'),
(14, 'Wednesday', '14:00:00'),
(15, 'Wednesday', '15:00:00'),
(16, 'Thursday', '09:00:00'),
(17, 'Thursday', '10:00:00'),
(18, 'Thursday', '13:00:00'),
(19, 'Thursday', '14:00:00'),
(20, 'Thursday', '15:00:00'),
(21, 'Friday', '09:00:00'),
(22, 'Friday', '10:00:00'),
(23, 'Friday', '13:00:00'),
(24, 'Friday', '14:00:00'),
(25, 'Friday', '15:00:00'),
(26, 'Saturday', '09:00:00'),
(27, 'Saturday', '14:00:00'),
(28, 'Saturday', '15:00:00'),
(29, 'Sunday', '09:00:00'),
(30, 'Sunday', '10:00:00'),
(31, 'Sunday', '13:00:00'),
(32, 'Sunday', '14:00:00'),
(33, 'Sunday', '15:00:00'),
(34, 'Monday', '17:00:00'),
(35, 'Monday', '18:00:00'),
(36, 'Monday', '20:00:00'),
(37, 'Friday', '16:00:00'),
(38, 'Friday', '18:00:00'),
(39, 'Friday', '20:00:00'),
(40, 'Friday', '21:00:00'),
(41, 'Friday', '23:00:00'),
(42, 'Friday', '23:00:00'),
(43, 'Saturday', '08:00:00'),
(44, 'Saturday', '10:00:00'),
(45, 'Saturday', '12:00:00'),
(46, 'Saturday', '16:00:00'),
(47, 'Saturday', '18:00:00'),
(48, 'Saturday', '20:00:00'),
(49, 'Saturday', '23:00:00'),
(50, 'Sunday', '11:00:00'),
(51, 'Sunday', '17:00:00'),
(52, 'Sunday', '19:00:00'),
(53, 'Sunday', '20:00:00'),
(54, 'Sunday', '22:00:00'),
(55, 'Sunday', '11:00:00'),
(56, 'Tuesday', '11:00:00'),
(57, 'Tuesday', '16:00:00'),
(58, 'Tuesday', '19:00:00'),
(59, 'Tuesday', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(5) NOT NULL,
  `routeid` int(11) DEFAULT NULL,
  `slotid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tid`, `routeid`, `slotid`) VALUES
(1, 1, 1),
(2, 2, 3),
(5, 15, 8),
(6, 25, 9),
(7, 25, 15),
(8, 20, 12),
(9, 1, 33),
(10, 20, 51),
(11, 1, 37),
(12, 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(5) NOT NULL,
  `designation` tinytext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `is_deleted` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `designation`, `email`, `password`, `is_deleted`) VALUES
(1, 'ADMIN', 'admin@horana.depot.lk', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0'),
(2, 'TRANSPORTER', 'transporter@horana.depot.lk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0'),
(3, 'SECURITY', 'security@horana.depot.lk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0'),
(4, 'CASHIER', 'cashier@horana.depot.lk', 'a5b42198e3fb950b5ab0d0067cbe077a41da1245', '0'),
(5, 'CLERK', 'clerk@horana.depot.lk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0'),
(6, 'ENGINEER', 'engineer@horana.depot.lk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0');

-- --------------------------------------------------------

--
-- Table structure for table `workerassign`
--

CREATE TABLE `workerassign` (
  `compid` int(11) DEFAULT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendancerecord`
--
ALTER TABLE `attendancerecord`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`compid`),
  ADD KEY `dutyid` (`dutyid`);

--
-- Indexes for table `dutyrecord`
--
ALTER TABLE `dutyrecord`
  ADD PRIMARY KEY (`dutyid`),
  ADD KEY `busid` (`busid`),
  ADD KEY `routeid` (`routeid`),
  ADD KEY `slotid` (`slotid`),
  ADD KEY `ticketbookid` (`ticketbookid`),
  ADD KEY `driverid` (`driverid`),
  ADD KEY `conductorid` (`conductorid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `paysheet`
--
ALTER TABLE `paysheet`
  ADD PRIMARY KEY (`paysheetid`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `ticketbook`
--
ALTER TABLE `ticketbook`
  ADD PRIMARY KEY (`ticketbookid`);

--
-- Indexes for table `timeslottable`
--
ALTER TABLE `timeslottable`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `routeid` (`routeid`),
  ADD KEY `slotid` (`slotid`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workerassign`
--
ALTER TABLE `workerassign`
  ADD KEY `compid` (`compid`),
  ADD KEY `empid` (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendancerecord`
--
ALTER TABLE `attendancerecord`
  MODIFY `aid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `busid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `compid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dutyrecord`
--
ALTER TABLE `dutyrecord`
  MODIFY `dutyid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `paysheet`
--
ALTER TABLE `paysheet`
  MODIFY `paysheetid` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `routeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `timeslottable`
--
ALTER TABLE `timeslottable`
  MODIFY `slotid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendancerecord`
--
ALTER TABLE `attendancerecord`
  ADD CONSTRAINT `attendancerecord_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`);

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`dutyid`) REFERENCES `dutyrecord` (`dutyid`);

--
-- Constraints for table `dutyrecord`
--
ALTER TABLE `dutyrecord`
  ADD CONSTRAINT `dutyrecord_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `bus` (`busid`),
  ADD CONSTRAINT `dutyrecord_ibfk_2` FOREIGN KEY (`routeid`) REFERENCES `route` (`routeid`),
  ADD CONSTRAINT `dutyrecord_ibfk_3` FOREIGN KEY (`slotid`) REFERENCES `timeslottable` (`slotid`),
  ADD CONSTRAINT `dutyrecord_ibfk_4` FOREIGN KEY (`ticketbookid`) REFERENCES `ticketbook` (`ticketbookid`),
  ADD CONSTRAINT `dutyrecord_ibfk_5` FOREIGN KEY (`driverid`) REFERENCES `employee` (`empid`),
  ADD CONSTRAINT `dutyrecord_ibfk_6` FOREIGN KEY (`conductorid`) REFERENCES `employee` (`empid`);

--
-- Constraints for table `paysheet`
--
ALTER TABLE `paysheet`
  ADD CONSTRAINT `paysheet_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`routeid`) REFERENCES `route` (`routeid`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`slotid`) REFERENCES `timeslottable` (`slotid`);

--
-- Constraints for table `workerassign`
--
ALTER TABLE `workerassign`
  ADD CONSTRAINT `workerassign_ibfk_1` FOREIGN KEY (`compid`) REFERENCES `complain` (`compid`),
  ADD CONSTRAINT `workerassign_ibfk_2` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
