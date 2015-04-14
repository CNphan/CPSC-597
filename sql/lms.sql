-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 05:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(20) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_type` varchar(50) DEFAULT NULL,
  `course_days` varchar(50) DEFAULT NULL,
  `course_time` varchar(50) DEFAULT NULL,
  `course_unit` int(20) DEFAULT NULL,
  `course_startDate` date DEFAULT NULL,
  `course_endDate` date DEFAULT NULL,
  `course_loc` varchar(50) DEFAULT NULL,
  `course_inst` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_type`, `course_days`, `course_time`, `course_unit`, `course_startDate`, `course_endDate`, `course_loc`, `course_inst`) VALUES
(1, 'HIS 101', 'LEC', 'T,Th', '9:00 - 10:00 AM', 3, '2015-02-01', '2015-05-30', 'HIS Building', 'Phan,C'),
(2, 'Art HIS', 'LAB', 'M,W,F', '1:00 - 2:15 PM', 3, NULL, NULL, 'Art Building ', 'Phan,C'),
(3, 'Introduction to Computer Science ', 'SEM', 'W', '3:00 - 6:00PM', 4, NULL, NULL, 'Computer Engineering Building', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(20) NOT NULL,
  `user_FName` varchar(50) DEFAULT NULL,
  `user_LName` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_state` varchar(50) DEFAULT NULL,
  `user_country` varchar(50) DEFAULT NULL,
  `user_pic` varchar(50) DEFAULT NULL,
  `degree_type` varchar(50) DEFAULT NULL,
  `degree_program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_FName`, `user_LName`, `username`, `password`, `user_email`, `role`, `user_city`, `user_state`, `user_country`, `user_pic`, `degree_type`, `degree_program`) VALUES
(1, 'Jane', 'Do', 'Admin', 'admin', 'janedo@lms.com', 'admin', 'Fullerton', 'CA', 'USA', NULL, 'Masters of Arts ', 'Education '),
(2, 'John ', 'Do ', 'Student', 'student', 'johndo@lms.com', 'student', 'Long Beach', 'CA', 'USA', NULL, 'Bachelor of Science', 'Computer Engineering'),
(3, 'Christie', 'Phan', 'CNphan', 'password', 'cnphan@lms.com', 'student', 'Fullerton', 'CA', 'USA', NULL, 'MBA', 'Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE IF NOT EXISTS `user_course` (
  `user_id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`user_id`, `course_id`) VALUES
(2, 2),
(3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
