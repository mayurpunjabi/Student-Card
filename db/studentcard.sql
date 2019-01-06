-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 08:52 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE studentcard;
USE studentcard;

--
-- Database: `studentcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `jrcollege`
--

CREATE TABLE `jrcollege` (
  `jrcollege_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `board` varchar(100) DEFAULT NULL,
  `medium` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jrcollege`
--

INSERT INTO `jrcollege` (`jrcollege_id`, `name`, `board`, `medium`) VALUES
(11272, 'CHM', 'HSC', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(9) NOT NULL,
  `f_name` varchar(60) DEFAULT NULL,
  `f_education` varchar(60) DEFAULT NULL,
  `f_occupation` varchar(60) DEFAULT NULL,
  `f_email` varchar(60) DEFAULT NULL,
  `f_phone` bigint(10) DEFAULT NULL,
  `m_name` varchar(60) DEFAULT NULL,
  `m_education` varchar(60) DEFAULT NULL,
  `m_occupation` varchar(60) DEFAULT NULL,
  `m_email` varchar(60) DEFAULT NULL,
  `m_phone` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `f_name`, `f_education`, `f_occupation`, `f_email`, `f_phone`, `m_name`, `m_education`, `m_occupation`, `m_email`, `m_phone`) VALUES
(11272, 'Dad', 'HSC', 'Doccupation', 'b@c.a', 1235467890, 'Mom', 'HSC', 'Moccupation', 'd@a.b', 7894561230);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `board` varchar(100) DEFAULT NULL,
  `medium` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `name`, `board`, `medium`) VALUES
(11272, 'School', 'SSC', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(9) NOT NULL,
  `attendance` float DEFAULT NULL,
  `gpa_grade` varchar(50) DEFAULT NULL,
  `achievements` varchar(200) DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  `year_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `attendance`, `gpa_grade`, `achievements`, `meeting_date`, `description`, `year_id`) VALUES
(1, NULL, '', '', NULL, '', 112721),
(2, NULL, '', '', NULL, '', 112721),
(3, NULL, '', '', NULL, '', 112722),
(4, NULL, '', '', NULL, '', 112722),
(5, NULL, '', '', NULL, '', 112723),
(6, NULL, '', '', NULL, '', 112723);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(7) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `address` char(150) DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `X_percent` float DEFAULT NULL,
  `XII_percent` float DEFAULT NULL,
  `siblings` int(2) DEFAULT NULL,
  `enrollment_year` year(4) DEFAULT NULL,
  `program` varchar(7) DEFAULT NULL,
  `course` varchar(40) DEFAULT NULL,
  `prn_no` bigint(16) DEFAULT NULL,
  `hobbies` char(150) DEFAULT NULL,
  `other_course` varchar(4) DEFAULT NULL,
  `working` varchar(4) DEFAULT NULL,
  `health_problem` varchar(4) DEFAULT NULL,
  `fy_reason_for_vesasc` char(255) DEFAULT NULL,
  `fy_want_to_join` varchar(17) DEFAULT NULL,
  `fy_library_card` varchar(3) DEFAULT NULL,
  `sy_skills_lacked` char(200) DEFAULT NULL,
  `ty_placement_activities` char(200) DEFAULT NULL,
  `current_year` varchar(20) DEFAULT NULL,
  `school_id` int(10) DEFAULT NULL,
  `jrcollege_id` int(10) DEFAULT NULL,
  `parent_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `middle_name`, `last_name`, `address`, `blood_group`, `phone`, `email`, `pass`, `X_percent`, `XII_percent`, `siblings`, `enrollment_year`, `program`, `course`, `prn_no`, `hobbies`, `other_course`, `working`, `health_problem`, `fy_reason_for_vesasc`, `fy_want_to_join`, `fy_library_card`, `sy_skills_lacked`, `ty_placement_activities`, `current_year`, `school_id`, `jrcollege_id`, `parent_id`) VALUES
(11272, 'Mayur', 'Haresh', 'Punjabi', 'Titwala\r\n421605', 'A+', 1235467890, 'a@b.c', 'MayurP', 83.4, 75, 1, 2017, 'BSc', 'Computer Science', 1234567891234567, 'Ille', 'Yes1', 'No2', 'Yes3', 'r2,r3,r7,#None', 'j2,', 'Yes', '', '', NULL, 11272, 11272, 11272);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year_id` int(9) NOT NULL,
  `roll_no` int(4) DEFAULT NULL,
  `class_coordinator` varchar(40) DEFAULT NULL,
  `ex_meet_desc` varchar(200) DEFAULT NULL,
  `internship` varchar(150) DEFAULT NULL,
  `goals` varchar(200) DEFAULT NULL,
  `suggestion_for_college` varchar(250) DEFAULT NULL,
  `student_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year_id`, `roll_no`, `class_coordinator`, `ex_meet_desc`, `internship`, `goals`, `suggestion_for_college`, `student_id`) VALUES
(112721, 36, 'Shravanti Ma\'am', '', NULL, NULL, 'No', 11272),
(112722, NULL, NULL, NULL, NULL, NULL, NULL, 11272),
(112723, 30, 'Kamlakar Sir', '', '', '', '', 11272);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jrcollege`
--
ALTER TABLE `jrcollege`
  ADD PRIMARY KEY (`jrcollege_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`,`year_id`),
  ADD KEY `FK_5` (`year_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `FK_1` (`parent_id`),
  ADD KEY `FK_2` (`school_id`),
  ADD KEY `FK_3` (`jrcollege_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year_id`),
  ADD KEY `FK_4` (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`year_id`) REFERENCES `years` (`year_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`parent_id`),
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`jrcollege_id`) REFERENCES `jrcollege` (`jrcollege_id`);

--
-- Constraints for table `years`
--
ALTER TABLE `years`
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
