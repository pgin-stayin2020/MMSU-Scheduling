-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 01:13 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedulingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `leclab_sched`
--

CREATE TABLE `leclab_sched` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `bldg_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `fr_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `curricula_id` int(11) NOT NULL,
  `year` tinyint(3) NOT NULL,
  `sem` tinyint(3) NOT NULL,
  `cy_id` int(11) NOT NULL,
  `section` varchar(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_codes`
--

CREATE TABLE `time_codes` (
  `id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_codes`
--

INSERT INTO `time_codes` (`id`, `time`, `created_at`, `updated_at`) VALUES
(1, '7:00 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(2, '7:30 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(3, '8:00 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(4, '8:30 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(5, '9:00 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(6, '9:30 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(7, '10:00 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(8, '10:30 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(9, '11:00 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(10, '11:30 AM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(11, '12:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(12, '12:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(13, '1:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(14, '1:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(15, '2:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(16, '2:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(17, '3:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(18, '3:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(19, '4:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(20, '4:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(21, '5:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(22, '5:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(23, '6:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(24, '6:30 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(25, '7:00 PM', '2018-03-16 19:43:01', '2018-03-16 19:43:01'),
(26, '7:30 PM', '2018-03-16 19:43:02', '2018-03-16 19:43:02'),
(27, '8:00 PM', '2018-03-16 19:43:02', '2018-03-16 19:43:02'),
(28, '8:30 PM', '2018-03-16 19:43:02', '2018-03-16 19:43:02'),
(29, '9:00 PM', '2018-03-16 19:43:02', '2018-03-16 19:43:02'),
(30, '9:30 PM', '2018-03-16 19:43:02', '2018-03-16 19:43:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leclab_sched`
--
ALTER TABLE `leclab_sched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_codes`
--
ALTER TABLE `time_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leclab_sched`
--
ALTER TABLE `leclab_sched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_codes`
--
ALTER TABLE `time_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
