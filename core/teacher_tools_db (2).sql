-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 05:48 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher_tools_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_mname` varchar(50) NOT NULL,
  `admin_lname` varchar(50) NOT NULL,
  `admin_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `att_id` int(11) NOT NULL,
  `att_date` date NOT NULL,
  `P` int(2) NOT NULL,
  `L` int(2) NOT NULL,
  `A` int(2) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `att_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`att_id`, `att_date`, `P`, `L`, `A`, `class_id`, `stu_id`, `term`, `att_status`) VALUES
(1, '2018-01-03', 0, 0, 0, 1, -1, 1, 1),
(2, '2018-01-03', 1, 0, 0, 1, 1, 1, 1),
(3, '2018-01-03', 1, 0, 0, 1, 2, 1, 1),
(4, '2018-01-28', 0, 0, 0, 2, -1, 1, 1),
(5, '2018-01-28', 0, 0, 1, 2, 5, 1, 1),
(6, '2018-01-28', 0, 1, 0, 2, 6, 1, 1),
(7, '2018-01-28', 0, 0, 1, 2, 7, 1, 1),
(8, '2018-01-28', 0, 0, 1, 2, 8, 1, 1),
(9, '2018-01-29', 0, 0, 0, 2, -1, 1, 1),
(10, '2018-01-29', 0, 0, 1, 2, 5, 1, 1),
(11, '2018-01-29', 0, 1, 0, 2, 6, 1, 1),
(12, '2018-01-29', 0, 0, 1, 2, 7, 1, 1),
(13, '2018-01-29', 0, 0, 1, 2, 8, 1, 1),
(14, '2018-01-29', 0, 0, 0, 2, -1, 1, 1),
(15, '2018-01-29', 0, 0, 1, 2, 5, 1, 1),
(16, '2018-01-29', 0, 0, 1, 2, 6, 1, 1),
(17, '2018-01-29', 0, 0, 1, 2, 7, 1, 1),
(18, '2018-01-29', 0, 0, 1, 2, 8, 1, 1),
(19, '2018-01-01', 0, 0, 0, 1, -1, 1, 1),
(20, '2018-01-01', 0, 1, 0, 1, 1, 1, 1),
(21, '2018-01-01', 0, 0, 1, 1, 2, 1, 1),
(22, '2018-01-01', 0, 0, 1, 1, 3, 1, 1),
(23, '2018-01-01', 0, 0, 1, 1, 4, 1, 1),
(24, '2018-02-05', 0, 0, 0, 4, -1, 5, 1),
(25, '2018-02-05', 0, 1, 0, 4, 29, 5, 1),
(26, '2018-02-05', 0, 0, 1, 4, 30, 5, 1),
(27, '2018-02-05', 0, 0, 1, 4, 31, 5, 1),
(28, '2018-02-05', 0, 0, 1, 4, 32, 5, 1),
(29, '2018-02-05', 0, 0, 0, 4, -1, 5, 1),
(30, '2018-02-05', 1, 0, 0, 4, 29, 5, 1),
(31, '2018-02-05', 1, 0, 0, 4, 30, 5, 1),
(32, '2018-02-05', 1, 0, 0, 4, 31, 5, 1),
(33, '2018-02-05', 1, 0, 0, 4, 32, 5, 1),
(34, '2018-02-05', 1, 0, 0, 4, 37, 5, 1),
(35, '2018-02-05', 0, 0, 0, 5, -1, 5, 1),
(36, '2018-02-05', 0, 0, 1, 5, 33, 5, 1),
(37, '2018-02-05', 0, 0, 1, 5, 34, 5, 1),
(38, '2018-02-05', 0, 0, 1, 5, 35, 5, 1),
(39, '2018-02-05', 0, 0, 1, 5, 36, 5, 1),
(40, '2018-02-05', 0, 0, 0, 5, -1, 5, 1),
(41, '2018-02-05', 0, 0, 1, 5, 33, 5, 1),
(42, '2018-02-05', 0, 0, 1, 5, 34, 5, 1),
(43, '2018-02-05', 0, 0, 1, 5, 35, 5, 1),
(44, '2018-02-05', 0, 0, 1, 5, 36, 5, 1),
(45, '2018-02-06', 0, 0, 0, 5, -1, 5, 1),
(46, '2018-02-06', 0, 0, 1, 5, 33, 5, 1),
(47, '2018-02-06', 0, 0, 1, 5, 34, 5, 1),
(48, '2018-02-06', 0, 0, 1, 5, 35, 5, 1),
(49, '2018-02-06', 0, 0, 1, 5, 36, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(50) NOT NULL,
  `f_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `year` year(4) NOT NULL,
  `row` int(2) NOT NULL,
  `column` int(2) NOT NULL,
  `class_status` int(1) NOT NULL,
  `is_Submitted` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_code`, `f_id`, `subject`, `section`, `semester`, `year`, `row`, `column`, `class_status`, `is_Submitted`) VALUES
(1, '101', 1, 'MATH', 'BSIS 3A', 'First', 2018, 10, 5, 1, 0),
(2, '0002', 1, 'Bsbd', 'dfvd', 'First', 2017, 8, 5, 1, 0),
(3, 'test123', 3, 'Math', 'A', 'First', 2018, 10, 5, 1, 1),
(4, 'scdc', 2, 'dcdcd', 'cdcd', 'First', 2017, 10, 5, 1, 1),
(5, '002', 2, 'ENG 1', 'BSIS I - A', 'First', 2017, 5, 4, 1, 1),
(6, 'asdcas', 3, 'sdsd', 'sdsds', 'First', 2017, 5, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_load`
--

CREATE TABLE `tbl_class_load` (
  `class_load_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_fname` varchar(50) NOT NULL,
  `stu_mname` varchar(50) NOT NULL,
  `stu_lname` varchar(50) NOT NULL,
  `class_load_status` int(1) NOT NULL,
  `final_grade` decimal(6,3) NOT NULL,
  `remarks` varchar(11) NOT NULL,
  `date_remark` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class_load`
--

INSERT INTO `tbl_class_load` (`class_load_id`, `class_id`, `stu_fname`, `stu_mname`, `stu_lname`, `class_load_status`, `final_grade`, `remarks`, `date_remark`) VALUES
(1, 1, 'Rino', 'Q', 'Carton', 1, '0.000', '', '0000-00-00'),
(2, 1, 'Alex', 'R', 'Matti', 1, '0.000', '', '0000-00-00'),
(3, 1, 'gfhghg', 'ghgh', 'gfhgf', 1, '0.000', '', '0000-00-00'),
(4, 1, 'n n', 'nmn', 'n n', 1, '0.000', '', '0000-00-00'),
(5, 2, 'raphael', 'gegeg', 'claveria', 1, '0.000', '', '0000-00-00'),
(6, 2, 'arman', 'jorge', 'jacolbe', 1, '0.000', '', '0000-00-00'),
(7, 3, 'mechanic', 'juan', 'jorge', 1, '0.000', '', '0000-00-00'),
(8, 3, 'juan', 'palabore', 'dela cruz', 1, '0.000', '', '0000-00-00'),
(9, 3, 'd', 'a', 'juan', 1, '88.840', 'Passed', '0000-00-00'),
(10, 3, 'b', 'c', 'a', 1, '91.448', 'Passed', '0000-00-00'),
(11, 3, 'e', 'f', 'd', 1, '84.570', 'Passed', '0000-00-00'),
(12, 3, 'rafael', '.', 'claveria', 1, '86.390', 'Passed', '0000-00-00'),
(13, 3, 'kaye', 'naverette', 'jacildo', 1, '87.248', 'Passed', '0000-00-00'),
(14, 3, '2', '3', '1', 1, '91.798', 'Passed', '0000-00-00'),
(15, 3, 'john', 'mark', 'amar', 1, '88.840', 'Passed', '0000-00-00'),
(16, 3, 'kim', 'jade', 'baroa', 1, '90.275', 'Passed', '0000-00-00'),
(17, 3, 'judywen', '.', 'guapin', 1, '85.848', 'Passed', '0000-00-00'),
(18, 3, 'h', 'i', 'g', 1, '88.228', 'Passed', '0000-00-00'),
(19, 3, 'k', 'l', 'j', 1, '89.820', 'Passed', '0000-00-00'),
(20, 3, 'm', 'n', 'l', 1, '86.478', 'Passed', '0000-00-00'),
(21, 3, 'p', 'q', 'o', 1, '89.138', 'Passed', '0000-00-00'),
(22, 3, 's', 't', 'r', 1, '88.333', 'Passed', '0000-00-00'),
(23, 6, 'deded', 'eded', 'wefde', 1, '0.000', '', '0000-00-00'),
(24, 6, 'edede', 'deded', 'ded', 1, '0.000', '', '0000-00-00'),
(28, 6, 'ddcd', 'cdcdc', 'dsfvd', 1, '0.000', '', '0000-00-00'),
(29, 4, 'dfdf', 'dfdf', 'dfdf', 1, '96.150', 'Passed', '2018-02-05'),
(30, 4, 'dfdfd', 'fdfd', 'dfdf', 1, '96.990', 'Passed', '2018-02-05'),
(31, 4, 'a', 'a', 'a', 1, '98.250', 'Passed', '2018-02-05'),
(32, 4, 'ss', 'ss', 'sss', 1, '96.430', 'Passed', '2018-02-05'),
(33, 5, 'ccc', 'cc', 'cc', 1, '6.500', 'Dropped', '2018-02-05'),
(34, 5, 'sas', 'asa', 'asa', 1, '6.500', 'Dropped', '2018-02-05'),
(35, 5, 'xs', 'xsx', 'ssx', 1, '6.500', 'Dropped', '2018-02-05'),
(36, 5, 'xsxs', 'xsxsx', 'xsx', 1, '6.500', 'Dropped', '2018-02-05'),
(37, 4, 'uuu', 'u', 'u', 1, '66.750', 'Failed', '2018-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_schedule`
--

CREATE TABLE `tbl_class_schedule` (
  `sched_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `room` varchar(50) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `sched_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class_schedule`
--

INSERT INTO `tbl_class_schedule` (`sched_id`, `class_id`, `day`, `room`, `time_from`, `time_to`, `sched_status`) VALUES
(1, 1, 'Monday', '3A', '01:00:00', '02:00:00', 1),
(2, 1, 'Wednesday', '3A', '01:00:00', '02:00:00', 1),
(3, 1, 'Friday', '3A', '01:00:00', '02:00:00', 1),
(4, 4, 'Monday', '3A', '13:00:00', '14:00:00', 1),
(5, 4, 'Wednesday', '3A', '13:00:00', '14:00:00', 1),
(6, 4, 'Friday', '3A', '13:00:00', '14:00:00', 1),
(10, 5, 'Wednesday', '3C', '10:30:00', '12:00:00', 1),
(9, 5, 'Monday', '3C', '10:30:00', '12:00:00', 1),
(11, 5, 'Friday', '3C', '10:30:00', '12:00:00', 1),
(12, 5, 'Saturday', 'QUAD', '08:00:00', '11:30:00', 1),
(13, 5, 'Tuesday', 'IT LAB 1', '13:30:00', '15:00:00', 1),
(14, 5, 'Thursday', 'IT LAB 1', '13:30:00', '15:00:00', 1),
(15, 4, 'Monday', 'I LAB U', '13:30:00', '15:00:00', 1),
(16, 4, 'Wednesday', 'I LAB U', '13:30:00', '15:00:00', 1),
(17, 4, 'Friday', 'I LAB U', '13:30:00', '15:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_term`
--

CREATE TABLE `tbl_class_term` (
  `class_term_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `term_name` varchar(50) NOT NULL,
  `class_term_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class_term`
--

INSERT INTO `tbl_class_term` (`class_term_id`, `f_id`, `term_name`, `class_term_status`) VALUES
(1, 1, 'First Term', 1),
(2, 3, 'Prelim', 1),
(3, 3, 'Midterm', 0),
(4, 3, 'Finals', 0),
(5, 2, 'Mid Term', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `f_id` int(11) NOT NULL,
  `f_id_no` varchar(11) NOT NULL,
  `f_fname` varchar(50) NOT NULL,
  `f_mname` varchar(50) NOT NULL,
  `f_lname` varchar(50) NOT NULL,
  `f_gender` int(1) NOT NULL,
  `f_bdate` date NOT NULL,
  `f_address` varchar(50) NOT NULL,
  `f_con` varchar(11) NOT NULL,
  `f_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`f_id`, `f_id_no`, `f_fname`, `f_mname`, `f_lname`, `f_gender`, `f_bdate`, `f_address`, `f_con`, `f_status`) VALUES
(1, 'AWG01091800', 'Wayne', 'G', 'Alegata', 1, '2018-01-09', 'Bacolod City', '09121333434', 1),
(2, 'TM.02011800', 'Mark', '.', 'Talanquines', 1, '2018-02-01', 'Bacolod City', '09123456789', 1),
(3, 'CJD02011800', 'juan', 'dela', 'cruz', 1, '2018-02-01', 'Bacolod City', '09123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grading_system`
--

CREATE TABLE `tbl_grading_system` (
  `g_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `g_quiz` int(2) NOT NULL,
  `g_recitation` int(2) NOT NULL,
  `g_exam` int(2) NOT NULL,
  `g_skills` int(2) NOT NULL,
  `g_attendance` int(2) NOT NULL,
  `g_project` int(2) NOT NULL,
  `g_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grading_system`
--

INSERT INTO `tbl_grading_system` (`g_id`, `class_id`, `g_quiz`, `g_recitation`, `g_exam`, `g_skills`, `g_attendance`, `g_project`, `g_status`) VALUES
(1, 1, 20, 10, 20, 20, 10, 20, 1),
(2, 2, 15, 10, 25, 15, 10, 25, 1),
(3, 3, 25, 5, 20, 35, 5, 10, 1),
(4, 6, 10, 10, 30, 10, 10, 30, 1),
(5, 4, 10, 10, 30, 10, 10, 30, 1),
(6, 5, 10, 10, 30, 10, 10, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notif_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `message` varchar(110) NOT NULL,
  `date` date NOT NULL,
  `notif_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notif_id`, `f_id`, `class_id`, `stu_id`, `message`, `date`, `notif_status`) VALUES
(11, 2, 5, 36, 'dropped', '2018-02-05', 0),
(10, 2, 5, 35, 'dropped', '2018-02-05', 0),
(8, 2, 5, 33, 'dropped', '2018-02-05', 0),
(9, 2, 5, 34, 'dropped', '2018-02-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scores`
--

CREATE TABLE `tbl_scores` (
  `id` int(11) NOT NULL,
  `score_no` int(11) NOT NULL,
  `grading_system` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_term` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `perfect_score` int(11) NOT NULL,
  `percentage_score` decimal(6,3) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_scores`
--

INSERT INTO `tbl_scores` (`id`, `score_no`, `grading_system`, `class_id`, `class_term`, `faculty_id`, `student_id`, `score`, `perfect_score`, `percentage_score`, `date_added`) VALUES
(1, 1, 'g_quiz', 1, 1, 1, 1, 10, 10, '100.000', '2018-01-08 00:00:00'),
(2, 1, 'g_quiz', 1, 1, 1, 2, 7, 10, '89.500', '2018-01-08 00:00:00'),
(3, 1, 'g_exam', 1, 1, 1, 1, 18, 20, '96.500', '2018-01-03 00:00:00'),
(4, 1, 'g_exam', 1, 1, 1, 2, 12, 20, '86.000', '2018-01-03 00:00:00'),
(5, 1, 'g_project', 1, 1, 1, 1, 9, 10, '96.500', '2018-01-10 00:00:00'),
(6, 1, 'g_project', 1, 1, 1, 2, 9, 10, '96.500', '2018-01-10 00:00:00'),
(7, 1, 'g_skills', 1, 1, 1, 1, 5, 10, '82.500', '2018-01-24 00:00:00'),
(8, 1, 'g_skills', 1, 1, 1, 2, 5, 10, '82.500', '2018-01-24 00:00:00'),
(9, 1, 'g_recitation', 1, 1, 1, 1, 10, 10, '100.000', '2018-01-11 00:00:00'),
(10, 1, 'g_recitation', 1, 1, 1, 2, 5, 10, '82.500', '2018-01-11 00:00:00'),
(11, 2, 'g_quiz', 1, 1, 1, 1, 1, 1, '100.000', '2018-01-02 00:00:00'),
(12, 2, 'g_quiz', 1, 1, 1, 4, 3, 1, '170.000', '2018-01-02 00:00:00'),
(13, 2, 'g_quiz', 1, 1, 1, 2, 2, 1, '135.000', '2018-01-02 00:00:00'),
(14, 2, 'g_quiz', 1, 1, 1, 3, 2, 1, '135.000', '2018-01-02 00:00:00'),
(15, 1, 'g_quiz', 3, 2, 3, 14, 10, 10, '100.000', '2018-02-01 00:00:00'),
(16, 1, 'g_quiz', 3, 2, 3, 10, 10, 10, '100.000', '2018-02-01 00:00:00'),
(17, 1, 'g_quiz', 3, 2, 3, 15, 8, 10, '93.000', '2018-02-01 00:00:00'),
(18, 1, 'g_quiz', 3, 2, 3, 16, 9, 10, '96.500', '2018-02-01 00:00:00'),
(19, 1, 'g_quiz', 3, 2, 3, 12, 6, 10, '86.000', '2018-02-01 00:00:00'),
(20, 1, 'g_quiz', 3, 2, 3, 11, 4, 10, '79.000', '2018-02-01 00:00:00'),
(21, 1, 'g_quiz', 3, 2, 3, 18, 8, 10, '93.000', '2018-02-01 00:00:00'),
(22, 1, 'g_quiz', 3, 2, 3, 17, 5, 10, '82.500', '2018-02-01 00:00:00'),
(23, 1, 'g_quiz', 3, 2, 3, 19, 8, 10, '93.000', '2018-02-01 00:00:00'),
(24, 1, 'g_quiz', 3, 2, 3, 13, 6, 10, '86.000', '2018-02-01 00:00:00'),
(25, 1, 'g_quiz', 3, 2, 3, 9, 7, 10, '89.500', '2018-02-01 00:00:00'),
(26, 1, 'g_quiz', 3, 2, 3, 20, 5, 10, '82.500', '2018-02-01 00:00:00'),
(27, 1, 'g_quiz', 3, 2, 3, 21, 8, 10, '93.000', '2018-02-01 00:00:00'),
(28, 1, 'g_quiz', 3, 2, 3, 22, 8, 10, '93.000', '2018-02-01 00:00:00'),
(29, 1, 'g_skills', 3, 2, 3, 14, 85, 100, '94.750', '2018-02-01 00:00:00'),
(30, 1, 'g_skills', 3, 2, 3, 10, 87, 100, '95.450', '2018-02-01 00:00:00'),
(31, 1, 'g_skills', 3, 2, 3, 18, 83, 100, '94.050', '2018-02-01 00:00:00'),
(32, 1, 'g_skills', 3, 2, 3, 15, 82, 100, '93.700', '2018-02-01 00:00:00'),
(33, 1, 'g_skills', 3, 2, 3, 12, 84, 100, '94.400', '2018-02-01 00:00:00'),
(34, 1, 'g_skills', 3, 2, 3, 11, 82, 100, '93.700', '2018-02-01 00:00:00'),
(35, 1, 'g_skills', 3, 2, 3, 16, 86, 100, '95.100', '2018-02-01 00:00:00'),
(36, 1, 'g_skills', 3, 2, 3, 17, 83, 100, '94.050', '2018-02-01 00:00:00'),
(37, 1, 'g_skills', 3, 2, 3, 19, 84, 100, '94.400', '2018-02-01 00:00:00'),
(38, 1, 'g_skills', 3, 2, 3, 13, 85, 100, '94.750', '2018-02-01 00:00:00'),
(39, 1, 'g_skills', 3, 2, 3, 9, 88, 100, '95.800', '2018-02-01 00:00:00'),
(40, 1, 'g_skills', 3, 2, 3, 20, 87, 100, '95.450', '2018-02-01 00:00:00'),
(41, 1, 'g_skills', 3, 2, 3, 21, 87, 100, '95.450', '2018-02-01 00:00:00'),
(42, 1, 'g_skills', 3, 2, 3, 22, 81, 100, '93.350', '2018-02-01 00:00:00'),
(43, 1, 'g_exam', 3, 2, 3, 10, 41, 50, '93.700', '2018-02-01 00:00:00'),
(44, 1, 'g_exam', 3, 2, 3, 12, 32, 50, '87.400', '2018-02-01 00:00:00'),
(45, 1, 'g_exam', 3, 2, 3, 15, 38, 50, '91.600', '2018-02-01 00:00:00'),
(46, 1, 'g_exam', 3, 2, 3, 16, 39, 50, '92.300', '2018-02-01 00:00:00'),
(47, 1, 'g_exam', 3, 2, 3, 11, 33, 50, '88.100', '2018-02-01 00:00:00'),
(48, 1, 'g_exam', 3, 2, 3, 14, 44, 50, '95.800', '2018-02-01 00:00:00'),
(49, 1, 'g_exam', 3, 2, 3, 18, 35, 50, '89.500', '2018-02-01 00:00:00'),
(50, 1, 'g_exam', 3, 2, 3, 20, 41, 50, '93.700', '2018-02-01 00:00:00'),
(51, 1, 'g_exam', 3, 2, 3, 17, 41, 50, '93.700', '2018-02-01 00:00:00'),
(52, 1, 'g_exam', 3, 2, 3, 13, 41, 50, '93.700', '2018-02-01 00:00:00'),
(53, 1, 'g_exam', 3, 2, 3, 9, 42, 50, '94.400', '2018-02-01 00:00:00'),
(54, 1, 'g_exam', 3, 2, 3, 19, 45, 50, '96.500', '2018-02-01 00:00:00'),
(55, 1, 'g_exam', 3, 2, 3, 21, 38, 50, '91.600', '2018-02-01 00:00:00'),
(56, 1, 'g_exam', 3, 2, 3, 22, 39, 50, '92.300', '2018-02-01 00:00:00'),
(57, 1, 'g_recitation', 3, 2, 3, 14, 8, 10, '93.000', '2018-02-01 00:00:00'),
(58, 1, 'g_recitation', 3, 2, 3, 10, 7, 10, '89.500', '2018-02-01 00:00:00'),
(59, 1, 'g_recitation', 3, 2, 3, 15, 8, 10, '93.000', '2018-02-01 00:00:00'),
(60, 1, 'g_recitation', 3, 2, 3, 16, 9, 10, '96.500', '2018-02-01 00:00:00'),
(61, 1, 'g_recitation', 3, 2, 3, 17, 4, 10, '79.000', '2018-02-01 00:00:00'),
(62, 1, 'g_recitation', 3, 2, 3, 11, 8, 10, '93.000', '2018-02-01 00:00:00'),
(63, 1, 'g_recitation', 3, 2, 3, 18, 7, 10, '89.500', '2018-02-01 00:00:00'),
(64, 1, 'g_recitation', 3, 2, 3, 12, 8, 10, '93.000', '2018-02-01 00:00:00'),
(65, 1, 'g_recitation', 3, 2, 3, 19, 8, 10, '93.000', '2018-02-01 00:00:00'),
(66, 1, 'g_recitation', 3, 2, 3, 13, 6, 10, '86.000', '2018-02-01 00:00:00'),
(67, 1, 'g_recitation', 3, 2, 3, 9, 7, 10, '89.500', '2018-02-01 00:00:00'),
(68, 1, 'g_recitation', 3, 2, 3, 20, 5, 10, '82.500', '2018-02-01 00:00:00'),
(69, 1, 'g_recitation', 3, 2, 3, 21, 8, 10, '93.000', '2018-02-01 00:00:00'),
(70, 1, 'g_recitation', 3, 2, 3, 22, 7, 10, '89.500', '2018-02-01 00:00:00'),
(71, 1, 'g_project', 3, 2, 3, 14, 95, 100, '98.250', '2018-02-01 00:00:00'),
(72, 1, 'g_project', 3, 2, 3, 12, 92, 100, '97.200', '2018-02-01 00:00:00'),
(73, 1, 'g_project', 3, 2, 3, 15, 95, 100, '98.250', '2018-02-01 00:00:00'),
(74, 1, 'g_project', 3, 2, 3, 16, 88, 100, '95.800', '2018-02-01 00:00:00'),
(75, 1, 'g_project', 3, 2, 3, 10, 95, 100, '98.250', '2018-02-01 00:00:00'),
(76, 1, 'g_project', 3, 2, 3, 11, 93, 100, '97.550', '2018-02-01 00:00:00'),
(77, 1, 'g_project', 3, 2, 3, 18, 91, 100, '96.850', '2018-02-01 00:00:00'),
(78, 1, 'g_project', 3, 2, 3, 17, 89, 100, '96.150', '2018-02-01 00:00:00'),
(79, 1, 'g_project', 3, 2, 3, 19, 88, 100, '95.800', '2018-02-01 00:00:00'),
(80, 1, 'g_project', 3, 2, 3, 13, 87, 100, '95.450', '2018-02-01 00:00:00'),
(81, 1, 'g_project', 3, 2, 3, 9, 88, 100, '95.800', '2018-02-01 00:00:00'),
(82, 1, 'g_project', 3, 2, 3, 20, 88, 100, '95.800', '2018-02-01 00:00:00'),
(83, 1, 'g_project', 3, 2, 3, 21, 86, 100, '95.100', '2018-02-01 00:00:00'),
(84, 1, 'g_project', 3, 2, 3, 22, 85, 100, '94.750', '2018-02-01 00:00:00'),
(85, 1, 'g_quiz', 6, 2, 3, 23, 9, 10, '96.500', '2018-02-01 00:00:00'),
(86, 1, 'g_quiz', 6, 2, 3, 24, 10, 10, '100.000', '2018-02-01 00:00:00'),
(88, 1, 'g_quiz', 6, 2, 3, 28, 0, 10, '65.000', '2018-02-01 00:00:00'),
(89, 2, 'g_quiz', 6, 2, 3, 28, 4, 5, '93.000', '2018-02-01 00:00:00'),
(90, 2, 'g_quiz', 6, 2, 3, 24, 5, 5, '100.000', '2018-02-01 00:00:00'),
(91, 2, 'g_quiz', 6, 2, 3, 23, 5, 5, '100.000', '2018-02-01 00:00:00'),
(92, 1, 'g_quiz', 4, 5, 2, 29, 9, 10, '96.500', '2018-02-05 00:00:00'),
(93, 1, 'g_quiz', 4, 5, 2, 31, 10, 10, '100.000', '2018-02-05 00:00:00'),
(94, 1, 'g_quiz', 4, 5, 2, 32, 7, 10, '89.500', '2018-02-05 00:00:00'),
(95, 1, 'g_quiz', 4, 5, 2, 30, 8, 10, '93.000', '2018-02-05 00:00:00'),
(96, 1, 'g_exam', 4, 5, 2, 31, 50, 50, '100.000', '2018-02-06 00:00:00'),
(97, 1, 'g_exam', 4, 5, 2, 29, 45, 50, '96.500', '2018-02-06 00:00:00'),
(98, 1, 'g_exam', 4, 5, 2, 30, 49, 50, '99.300', '2018-02-06 00:00:00'),
(99, 1, 'g_exam', 4, 5, 2, 32, 48, 50, '98.600', '2018-02-06 00:00:00'),
(100, 1, 'g_project', 4, 5, 2, 31, 100, 100, '100.000', '2018-02-05 00:00:00'),
(101, 1, 'g_project', 4, 5, 2, 29, 100, 100, '100.000', '2018-02-05 00:00:00'),
(102, 1, 'g_project', 4, 5, 2, 30, 100, 100, '100.000', '2018-02-05 00:00:00'),
(103, 1, 'g_project', 4, 5, 2, 32, 100, 100, '100.000', '2018-02-05 00:00:00'),
(104, 1, 'g_skills', 4, 5, 2, 29, 8, 10, '93.000', '2018-02-05 00:00:00'),
(105, 1, 'g_skills', 4, 5, 2, 31, 10, 10, '100.000', '2018-02-05 00:00:00'),
(106, 1, 'g_skills', 4, 5, 2, 30, 9, 10, '96.500', '2018-02-05 00:00:00'),
(107, 1, 'g_skills', 4, 5, 2, 32, 9, 10, '96.500', '2018-02-05 00:00:00'),
(108, 1, 'g_recitation', 4, 5, 2, 31, 10, 10, '100.000', '2018-02-05 00:00:00'),
(109, 1, 'g_recitation', 4, 5, 2, 29, 10, 10, '100.000', '2018-02-05 00:00:00'),
(110, 1, 'g_recitation', 4, 5, 2, 30, 10, 10, '100.000', '2018-02-05 00:00:00'),
(111, 1, 'g_recitation', 4, 5, 2, 32, 10, 10, '100.000', '2018-02-05 00:00:00'),
(112, 1, 'g_exam', 4, 5, 2, 37, 0, 50, '65.000', '2018-02-06 00:00:00'),
(113, 1, 'g_project', 4, 5, 2, 37, 0, 100, '65.000', '2018-02-05 00:00:00'),
(114, 1, 'g_quiz', 4, 5, 2, 37, 0, 10, '65.000', '2018-02-05 00:00:00'),
(115, 1, 'g_recitation', 4, 5, 2, 37, 0, 10, '65.000', '2018-02-05 00:00:00'),
(116, 1, 'g_skills', 4, 5, 2, 37, 0, 10, '65.000', '2018-02-05 00:00:00'),
(117, 2, 'g_quiz', 4, 5, 2, 31, 9, 10, '96.500', '2018-02-05 00:00:00'),
(118, 2, 'g_quiz', 4, 5, 2, 29, 9, 10, '96.500', '2018-02-05 00:00:00'),
(119, 2, 'g_quiz', 4, 5, 2, 30, 9, 10, '96.500', '2018-02-05 00:00:00'),
(120, 2, 'g_quiz', 4, 5, 2, 32, 9, 10, '96.500', '2018-02-05 00:00:00'),
(121, 2, 'g_quiz', 4, 5, 2, 37, 9, 10, '96.500', '2018-02-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat_plan`
--

CREATE TABLE `tbl_seat_plan` (
  `seat_plan_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `seat_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seat_plan`
--

INSERT INTO `tbl_seat_plan` (`seat_plan_id`, `class_id`, `student_id`, `seat_number`, `seat_status`) VALUES
(1, 1, 1, 3, 0),
(2, 1, 2, 14, 0),
(3, 1, 3, 35, 0),
(4, 1, 4, 38, 0),
(5, 2, 5, 7, 0),
(6, 2, 6, 14, 0),
(11, 3, 9, 3, 0),
(8, 2, 7, 26, 0),
(9, 2, 8, 27, 0),
(12, 3, 12, 2, 0),
(13, 3, 14, 9, 0),
(14, 3, 13, 12, 0),
(15, 4, 29, 3, 0),
(16, 4, 30, 2, 0),
(17, 4, 32, 6, 0),
(18, 4, 31, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `set_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `late` int(2) NOT NULL,
  `absent` int(2) NOT NULL,
  `value_for_zero` decimal(4,2) NOT NULL,
  `passing_grade` decimal(5,2) NOT NULL,
  `set_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`set_id`, `f_id`, `late`, `absent`, `value_for_zero`, `passing_grade`, `set_status`) VALUES
(1, 1, 2, 3, '65.00', '75.00', 1),
(2, 6, 0, 0, '0.00', '0.00', 1),
(3, 3, 3, 11, '65.00', '75.00', 1),
(4, 2, 3, 3, '65.00', '75.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `user_type`, `account_id`, `user_status`) VALUES
(1, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 0, 1, 1),
(14, 'AWG01091800', 'ytLdgUi1TUajZDx4wg/NMEXKWIOj2lRTpA+293x81ng=', 1, 1, 1),
(15, 'TM.02011800', '/m2vzpyKBnz87jWTNMRcWay86AW17ebsDnzzx/kz+M8=', 1, 2, 1),
(16, 'CJD02011800', 'OJUb4rZV5QITQ4vgnwti8ozM5g68018XxcDSpTXbOuo=', 1, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_class_load`
--
ALTER TABLE `tbl_class_load`
  ADD PRIMARY KEY (`class_load_id`);

--
-- Indexes for table `tbl_class_schedule`
--
ALTER TABLE `tbl_class_schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `tbl_class_term`
--
ALTER TABLE `tbl_class_term`
  ADD PRIMARY KEY (`class_term_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_grading_system`
--
ALTER TABLE `tbl_grading_system`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seat_plan`
--
ALTER TABLE `tbl_seat_plan`
  ADD PRIMARY KEY (`seat_plan_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_class_load`
--
ALTER TABLE `tbl_class_load`
  MODIFY `class_load_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_class_schedule`
--
ALTER TABLE `tbl_class_schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_class_term`
--
ALTER TABLE `tbl_class_term`
  MODIFY `class_term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_grading_system`
--
ALTER TABLE `tbl_grading_system`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tbl_seat_plan`
--
ALTER TABLE `tbl_seat_plan`
  MODIFY `seat_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
