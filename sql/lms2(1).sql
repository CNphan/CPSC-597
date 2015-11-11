-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2015 at 01:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(50) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_type` varchar(50) DEFAULT NULL,
  `course_day` varchar(255) DEFAULT NULL,
  `course_time` varchar(255) DEFAULT NULL,
  `course_unit` int(11) DEFAULT NULL,
  `course_startDate` date DEFAULT NULL,
  `course_endDate` date DEFAULT NULL,
  `course_loc` varchar(50) DEFAULT NULL,
  `course_inst` varchar(50) DEFAULT NULL,
  `top1` longtext,
  `top2` longtext,
  `top3` longtext,
  `top4` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_type`, `course_day`, `course_time`, `course_unit`, `course_startDate`, `course_endDate`, `course_loc`, `course_inst`, `top1`, `top2`, `top3`, `top4`) VALUES
(1, 'BIOL 101', 'BIOL', 'M,W', '09:00:00', 3, '2015-07-01', '2015-07-31', 'SCI Building', NULL, 'Bio description 1', 'Bio description 2', 'Bio Description 3', NULL),
(2, 'HIS 101', 'HIS', 'T', '07:00:00', 4, '2015-07-01', '2015-07-31', 'HIS Building', NULL, 'History description 1 ', 'History description 2', 'History description 3', NULL),
(3, 'GEOL 101', 'GEOL', 'F', '10AM - 11 AM', 3, '2015-07-01', '2015-07-31', 'GEOL Building', NULL, 'GEOL Description 1', 'GEOL Description 2', 'GEOL Description 3', NULL),
(4, 'ART', 'SEM', 'Th', '5-7PM', 3, '2015-07-01', '2015-07-31', 'Art Building', NULL, 'top 4', 'top 4', 'top 4', NULL),
(5, 'ENGL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'top 5', 'top 5', 'top 5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
`c_id` int(50) NOT NULL,
  `hw` int(50) DEFAULT NULL,
  `exam` int(50) DEFAULT NULL,
  `proj` int(50) DEFAULT NULL,
  `part` int(50) DEFAULT NULL,
  `final` int(50) DEFAULT NULL,
  `letter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`c_id`, `hw`, `exam`, `proj`, `part`, `final`, `letter`) VALUES
(1, 50, 36, 75, 100, 69, NULL),
(2, 100, 56, 89, 45, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `cid` int(50) DEFAULT NULL,
  `c1hw` int(50) DEFAULT NULL,
  `c1exam` int(50) DEFAULT NULL,
  `c1proj` int(50) DEFAULT NULL,
  `c1part` int(50) DEFAULT NULL,
  `c1final` int(50) DEFAULT NULL,
  `c1letter` varchar(255) DEFAULT NULL,
  `cid2` int(50) DEFAULT NULL,
  `c2hw` int(50) DEFAULT NULL,
  `c2exam` int(50) DEFAULT NULL,
  `c2proj` int(50) DEFAULT NULL,
  `c2part` int(50) DEFAULT NULL,
  `c2final` int(50) DEFAULT NULL,
  `c2letter` varchar(255) DEFAULT NULL,
  `cid3` int(50) DEFAULT NULL,
  `c3hw` int(50) DEFAULT NULL,
  `c3exam` int(50) DEFAULT NULL,
  `c3proj` int(50) DEFAULT NULL,
  `c3part` int(50) DEFAULT NULL,
  `c3final` int(50) DEFAULT NULL,
  `c3letter` varchar(255) DEFAULT NULL,
  `cid4` int(50) DEFAULT NULL,
  `c4hw` int(50) DEFAULT NULL,
  `c4exam` int(50) DEFAULT NULL,
  `c4proj` int(50) DEFAULT NULL,
  `c4part` int(50) DEFAULT NULL,
  `c4final` int(50) DEFAULT NULL,
  `c4letter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `email`, `role`, `city`, `state`, `degree`, `cid`, `c1hw`, `c1exam`, `c1proj`, `c1part`, `c1final`, `c1letter`, `cid2`, `c2hw`, `c2exam`, `c2proj`, `c2part`, `c2final`, `c2letter`, `cid3`, `c3hw`, `c3exam`, `c3proj`, `c3part`, `c3final`, `c3letter`, `cid4`, `c4hw`, `c4exam`, `c4proj`, `c4part`, `c4final`, `c4letter`) VALUES
(1, 'Christie', 'Phan', 'teacher', 'teacher', 'cnphan@lms.com', 'Teacher', 'Long', 'CA', '</td', 1, 0, 0, 0, 0, 0, '</td', 0, 0, 0, 0, 0, 0, '</td', 0, 0, 0, 0, 0, 0, '</td', 0, 0, 0, 0, 0, 0, '</td'),
(2, 'John', 'C', 'student', 'student', 'j@lms.com', 'Student', '', '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, ''),
(3, 'Quang', 'phan', 'admin', 'student', 'phan@gmail.com', 'Student', '</td', '</td', '</td', 0, 0, 0, 0, 0, 0, '</td', 0, 0, 0, 0, 0, 0, '</td', 0, 0, 0, 0, 0, 0, '</td', 0, 0, 0, 0, 0, 0, '</td');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
