-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 01:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'code.lpu1@gmail.com', 'Test@1234', '2016-04-04 20:31:45', '2016-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `marital` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `national` varchar(45) NOT NULL,
  `countrybirth` varchar(45) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `address` varchar(500) NOT NULL,
  `locality` varchar(500) NOT NULL,
  `stand` varchar(45) NOT NULL,
  `house` varchar(500) NOT NULL,
  `period` varchar(500) NOT NULL,
  `nextname` varchar(500) NOT NULL,
  `nextsurname` varchar(50) NOT NULL,
  `nextid` varchar(45) NOT NULL,
  `nextdob` varchar(45) NOT NULL,
  `nextphone` varchar(45) NOT NULL,
  `nextaddress` varchar(45) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `surname`, `firstName`, `gender`, `contact`, `marital`, `email`, `dob`, `national`, `countrybirth`, `nationality`, `address`, `locality`, `stand`, `house`, `period`, `nextname`, `nextsurname`, `nextid`, `nextdob`, `nextphone`, `nextaddress`, `postingDate`, `updationDate`) VALUES
(9, 'Eli', 'Svobs', 'Male', '777175291', 'Single', 'eloi@live.com', '', '32-1566272C55', 'Zimbabwe', 'Zimbabwean', '43 - 21 St Crescent\r\nGlen View 1\r\nHarare', 'Zimre Park, Hre', '600 mÂ²', 'na', '5years', 'Eli', 'Svobs', '23-73738838c55', '2012-12-12', '078299292', '43-62272\r\nHarare', '2019-08-24 04:00:23', '0000-00-00 00:00:00'),
(10, 'Bafana', 'Evans', 'Male', '0772571335', 'Married', 'evanbafs@gmail.com', '1981-01-16', '63-1109260A29', 'Zimbabwe', 'Harare', '20 York Avenue, Newlands', 'Westlea, Hre', '300', 'na', '5 Years', 'MacDonald Muza', 'Svobs', '23-73738838c55', '1995-02-09', '0772921367', '167 Chinhoyi Street, Fairview Mall', '2019-09-16 16:40:06', '0000-00-00 00:00:00'),
(11, 'Sur', 'Name', 'Female', '07777175291', 'Married', 'sur@live.com', '2013-12-13', '63-9183933C33', 'Zimbabwe', 'Zimbabwean', 'Glencoe Avenue, Highlands', 'Zimre Park, Harare', '200 mÂ²', 'Not Applicable', '5 Years', 'Elias ', 'Svoba', '23-1739393X77', '2012-12-12', '0777175291', '12 Maasdorp Avenue\r\nAlex Park\r\nHarare', '2019-10-03 08:59:24', '2019-10-03 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `exchange_rate` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `applicant_no`, `amount`, `exchange_rate`, `posting_date`) VALUES
(1, 'M000003', '10000', '1', '2016-04-11 19:31:42'),
(7, 'M00001', '2500', '1', '2019-09-18 11:14:00'),
(8, 'M0000023', '2500', '1', '2019-09-18 11:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(1, 5, 100, 8000, '2016-04-11 22:45:43'),
(2, 2, 201, 6000, '2016-04-12 01:30:47'),
(3, 2, 200, 6000, '2016-04-12 01:30:58'),
(4, 3, 112, 4000, '2016-04-12 01:31:07'),
(5, 5, 132, 2000, '2016-04-12 01:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Andaman and Nicobar Island (UT)'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh (UT)'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli (UT)'),
(9, 'Daman and Diu (UT)'),
(10, 'Delhi (NCT)'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep (UT)'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry (UT)'),
(28, 'Punjab'),
(29, 'Rajastha'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttarakhand'),
(35, 'EPE'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 10, 'test@gmail.com', '', '', '', '2016-06-22 06:16:42'),
(2, 10, 'test@gmail.com', '', '', '', '2016-06-24 11:20:28'),
(4, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-24 11:22:47'),
(5, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-26 15:37:40'),
(6, 20, 'Benjamin@gmail.com', 0x3a3a31, '', '', '2016-06-26 16:40:57'),
(7, 10, 'test@gmail.com', 0x3a3a31, '', '', '2019-02-10 07:43:43'),
(8, 21, 'flga@gmail.com', 0x3a3a31, '', '', '2019-02-10 08:49:33'),
(9, 21, 'flga@gmail.com', 0x3a3a31, '', '', '2019-02-10 08:52:11'),
(10, 21, 'flga@gmail.com', 0x3a3a31, '', '', '2019-02-10 08:54:58'),
(11, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-08-22 11:31:22'),
(12, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-08-28 08:18:13'),
(13, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-08-28 08:24:03'),
(14, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-08-28 08:49:58'),
(15, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-08-28 09:57:32'),
(16, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-09 08:17:20'),
(17, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-09 15:45:24'),
(18, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-09 16:38:59'),
(19, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-11 11:09:04'),
(20, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-16 15:07:27'),
(21, 23, 'evanbafs@gmail.com', 0x3a3a31, '', '', '2019-09-16 16:31:13'),
(22, 23, 'evanbafs@gmail.com', 0x3a3a31, '', '', '2019-09-16 16:51:15'),
(23, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-17 11:34:33'),
(24, 22, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-18 08:22:28'),
(25, 23, 'evanbafs@gmail.com', 0x3a3a31, '', '', '2019-09-18 16:24:27'),
(26, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-25 08:49:18'),
(27, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-09-30 08:41:07'),
(28, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-02 10:09:51'),
(29, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-02 10:43:45'),
(30, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-03 07:38:26'),
(31, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-03 08:54:01'),
(32, 25, 'sur@live.com', 0x3a3a31, '', '', '2019-10-03 08:57:10'),
(33, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-05 11:46:46'),
(34, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-08 09:58:49'),
(35, 24, 'eloi@live.com', 0x3a3a31, '', '', '2019-10-09 08:25:59'),
(36, 26, 'eli@live.com', 0x3a3a31, '', '', '2019-10-14 11:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `gender`, `contactNo`, `email`, `dob`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(23, 'Evans', 'Bafana', 'Male', '0772571335', 'evanbafs@gmail.com', '1981-01-16', 'Mrbafs@123!', '2019-09-16 16:30:13', '', ''),
(24, 'Eloi', 'Svobs', 'Male', '0717720731', 'eloi@live.com', '2012-12-12', '1234', '2019-09-25 08:48:20', '', ''),
(25, 'Name', 'Sur', 'Female', '07777175291', 'sur@live.com', '2013-12-13', '0000', '2019-10-03 08:56:59', '', ''),
(26, 'Eli', 'Svobs', 'Male', '0717720731', 'eli@live.com', '2010-10-10', '4a7d1ed414474e4033ac29ccb8653d9b', '2019-10-14 11:14:07', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
