-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 09:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Rank` varchar(50) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `MobileNumber` varchar(15) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Rank`, `FullName`, `AdminEmail`, `MobileNumber`, `UserName`, `Password`, `updationDate`) VALUES
(1, NULL, 'MH devlali', 'medicalstoresmhdevlali@gmail.com', NULL, 'admin@MH.dvl', 'd343ccb2836c946899be737423c4d019', '2023-07-25 04:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Johnson & Johnson', '2022-01-22 01:53:03', '2023-07-22 14:32:29'),
(2, 'Poly Medicure Ltd', '2022-01-22 01:53:03', '2023-07-22 14:32:41'),
(3, 'Opto Circuits (India) Limited', '2022-01-22 01:53:03', '2023-07-22 14:32:55'),
(4, 'Novartis AG', '2022-01-22 01:53:03', '2023-07-22 14:33:08'),
(5, 'Johari Digital Healthcare Ltd', '2022-01-22 01:53:03', '2023-07-22 14:33:23'),
(9, 'Abbott Laboratories', '2022-01-22 01:53:03', '2023-07-22 14:33:39'),
(10, 'Medtronic PLC', '2022-01-22 01:45:32', '2023-07-22 14:33:54'),
(11, 'Danaher Corporation', '2022-01-22 01:46:34', '2023-07-22 14:34:08'),
(12, 'Baxter International', '2022-01-22 01:48:38', '2023-07-22 14:34:26'),
(13, 'General Electric', '2022-01-22 01:51:54', '2023-07-22 14:34:41'),
(14, 'Herbert Schildt', '2022-01-22 01:53:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `BookPrice` decimal(10,2) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `isIssued` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `bookImage`, `isIssued`, `RegDate`, `UpdationDate`) VALUES
(5, 'equipment 1', 4, 1, '9350237695', 200000.00, '6f40ca8b1937a439c41facec2a1ef914.jpg', 1, '2022-01-21 11:12:11', '2023-07-23 02:59:23'),
(12, 'equipment 2', 6, 4, '224455m', 30000.00, 'cbefe7cec22c1464faf3e1b4eb8d9e66.jpg', 1, '2023-07-23 03:03:05', '2024-04-11 22:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Storage and Transport Medical Equipment', 1, '2022-01-22 01:53:03', '2023-07-22 14:13:44'),
(5, 'Durable Medical Equipment', 1, '2022-01-22 01:53:03', '2023-07-22 14:14:03'),
(6, 'Diagnostic Medical Equipment', 1, '2022-01-22 01:53:03', '2023-07-22 14:14:19'),
(7, 'Electronic Medical Equipment', 1, '2022-01-22 01:53:03', '2023-07-22 14:14:38'),
(8, 'General', 1, '2022-01-22 01:53:03', '2022-01-22 10:54:40'),
(9, 'Surgical Medical Equipment', 1, '2022-01-22 01:53:03', '2023-07-22 14:14:57'),
(10, 'Acute Care', 1, '2023-07-22 14:15:29', '0000-00-00 00:00:00'),
(11, 'Procedural Medical Equipment', 1, '2023-07-22 14:15:46', '0000-00-00 00:00:00'),
(12, 'new', 1, '2023-07-24 18:47:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldevelopers`
--

CREATE TABLE `tbldevelopers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldevelopers`
--

INSERT INTO `tbldevelopers` (`id`, `FullName`, `EmailId`, `UserName`, `Password`, `RegDate`) VALUES
(1, 'Nitin Prakash', 'nitinprakash16@gmail.com', 'nitinprakash16@gmail.com', 'd343ccb2836c946899be737423c4d019', '2024-04-14 11:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` varchar(159) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(18, 12, 'EMSID001', '2024-04-11 22:22:30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblscale`
--

CREATE TABLE `tblscale` (
  `id` int(11) NOT NULL,
  `s_no` varchar(150) DEFAULT NULL,
  `pvms_number` varchar(150) DEFAULT NULL,
  `equipment_name` varchar(150) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblscale`
--

INSERT INTO `tblscale` (`id`, `s_no`, `pvms_number`, `equipment_name`, `CreationDate`) VALUES
(1, ' ', '2423423', 'surgical blade', '2022-01-22 01:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblsoftware_setup`
--

CREATE TABLE `tblsoftware_setup` (
  `id` int(11) NOT NULL,
  `software_name` varchar(255) NOT NULL,
  `accepted_terms` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstdlogindetails`
--

CREATE TABLE `tblstdlogindetails` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) NOT NULL,
  `LastSessionTime` datetime NOT NULL,
  `LoginIP` varchar(50) NOT NULL,
  `ErrorLogs` text DEFAULT NULL,
  `Activity` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `login_activity` datetime DEFAULT NULL,
  `last_session_time` datetime DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `error_logs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`, `login_activity`, `last_session_time`, `ip_address`, `error_logs`) VALUES
(1, 'EMSID001', 'om prakash singh', 'op@MH.dvl', 'jc1009n', 'd343ccb2836c946899be737423c4d019', 1, '2023-07-23 12:19:10', NULL, NULL, NULL, NULL, NULL),
(2, 'EMSID002', 'mh', 'mh@MH.dvl', '244323rter', 'd343ccb2836c946899be737423c4d019', 1, '2023-07-24 15:24:03', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldevelopers`
--
ALTER TABLE `tbldevelopers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblscale`
--
ALTER TABLE `tblscale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsoftware_setup`
--
ALTER TABLE `tblsoftware_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstdlogindetails`
--
ALTER TABLE `tblstdlogindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbldevelopers`
--
ALTER TABLE `tbldevelopers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblscale`
--
ALTER TABLE `tblscale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsoftware_setup`
--
ALTER TABLE `tblsoftware_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstdlogindetails`
--
ALTER TABLE `tblstdlogindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
