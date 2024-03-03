-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2024 at 05:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_courses`
--

CREATE TABLE `added_courses` (
  `added_courses_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `performance` enum('Pass','Fail','Ungraded') NOT NULL DEFAULT 'Ungraded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `added_courses`
--

INSERT INTO `added_courses` (`added_courses_id`, `course_id`, `user_id`, `attendance`, `performance`) VALUES
(1, 1002, 4, 1, 'Pass'),
(2, 1001, 5, 0, 'Ungraded');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_courses`
--
ALTER TABLE `added_courses`
  ADD PRIMARY KEY (`added_courses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_courses`
--
ALTER TABLE `added_courses`
  MODIFY `added_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
