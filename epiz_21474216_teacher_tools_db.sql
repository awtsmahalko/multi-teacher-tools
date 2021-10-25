-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql108.epizy.com
-- Generation Time: Jan 30, 2018 at 03:41 AM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_21474216_teacher_tools_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(50) NOT NULL,
  `admin_mname` varchar(50) NOT NULL,
  `admin_lname` varchar(50) NOT NULL,
  `admin_status` int(1) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `att_date` date NOT NULL,
  `P` int(2) NOT NULL,
  `L` int(2) NOT NULL,
  `A` int(2) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `att_status` int(1) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(23, '2018-01-01', 0, 0, 1, 1, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_code` varchar(50) NOT NULL,
  `f_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `year` year(4) NOT NULL,
  `row` int(2) NOT NULL,
  `column` int(2) NOT NULL,
  `class_status` int(1) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_code`, `f_id`, `subject`, `section`, `semester`, `year`, `row`, `column`, `class_status`) VALUES
(1, '101', 1, 'MATH', 'BSIS 3A', 'First', 2018, 10, 5, 1),
(2, '0002', 1, 'Bsbd', 'dfvd', 'First', 2017, 8, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_load`
--

CREATE TABLE IF NOT EXISTS `tbl_class_load` (
  `class_load_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `stu_fname` varchar(50) NOT NULL,
  `stu_mname` varchar(50) NOT NULL,
  `stu_lname` varchar(50) NOT NULL,
  `class_load_status` int(1) NOT NULL,
  `remarks` varchar(11) NOT NULL,
  PRIMARY KEY (`class_load_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_class_load`
--

INSERT INTO `tbl_class_load` (`class_load_id`, `class_id`, `stu_fname`, `stu_mname`, `stu_lname`, `class_load_status`, `remarks`) VALUES
(1, 1, 'Rino', 'Q', 'Carton', 1, ''),
(2, 1, 'Alex', 'R', 'Matti', 1, ''),
(3, 1, 'gfhghg', 'ghgh', 'gfhgf', 1, ''),
(4, 1, 'n n', 'nmn', 'n n', 1, ''),
(5, 2, 'raphael', 'gegeg', 'claveria', 1, 'dropped'),
(6, 2, 'arman', 'jorge', 'jacolbe', 1, ''),
(7, 2, 'mechanic', 'juan', 'jorge', 1, 'dropped'),
(8, 2, 'juan', 'palabore', 'dela cruz', 1, 'dropped');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_class_schedule` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `room` varchar(50) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `sched_status` int(1) NOT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_class_schedule`
--

INSERT INTO `tbl_class_schedule` (`sched_id`, `class_id`, `day`, `room`, `time_from`, `time_to`, `sched_status`) VALUES
(1, 1, 'Monday', '3A', '01:00:00', '02:00:00', 1),
(2, 1, 'Wednesday', '3A', '01:00:00', '02:00:00', 1),
(3, 1, 'Friday', '3A', '01:00:00', '02:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_term`
--

CREATE TABLE IF NOT EXISTS `tbl_class_term` (
  `class_term_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` int(11) NOT NULL,
  `term_name` varchar(50) NOT NULL,
  `class_term_status` int(1) NOT NULL,
  PRIMARY KEY (`class_term_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_class_term`
--

INSERT INTO `tbl_class_term` (`class_term_id`, `f_id`, `term_name`, `class_term_status`) VALUES
(1, 1, 'First Term', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id_no` varchar(11) NOT NULL,
  `f_fname` varchar(50) NOT NULL,
  `f_mname` varchar(50) NOT NULL,
  `f_lname` varchar(50) NOT NULL,
  `f_gender` int(1) NOT NULL,
  `f_bdate` date NOT NULL,
  `f_address` varchar(50) NOT NULL,
  `f_con` varchar(11) NOT NULL,
  `f_status` int(1) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`f_id`, `f_id_no`, `f_fname`, `f_mname`, `f_lname`, `f_gender`, `f_bdate`, `f_address`, `f_con`, `f_status`) VALUES
(1, 'AWG01091800', 'Wayne', 'G', 'Alegata', 1, '2018-01-09', 'Bacolod City', '09121333434', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grading_system`
--

CREATE TABLE IF NOT EXISTS `tbl_grading_system` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `g_quiz` int(2) NOT NULL,
  `g_recitation` int(2) NOT NULL,
  `g_exam` int(2) NOT NULL,
  `g_skills` int(2) NOT NULL,
  `g_attendance` int(2) NOT NULL,
  `g_project` int(2) NOT NULL,
  `g_status` int(1) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_grading_system`
--

INSERT INTO `tbl_grading_system` (`g_id`, `class_id`, `g_quiz`, `g_recitation`, `g_exam`, `g_skills`, `g_attendance`, `g_project`, `g_status`) VALUES
(1, 1, 20, 10, 20, 20, 10, 20, 1),
(2, 2, 15, 10, 25, 15, 10, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `message` varchar(110) NOT NULL,
  `date` date NOT NULL,
  `notif_status` int(1) NOT NULL,
  PRIMARY KEY (`notif_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notif_id`, `f_id`, `class_id`, `stu_id`, `message`, `date`, `notif_status`) VALUES
(1, 1, 2, 5, 'Students is dropping!', '2018-01-29', 1),
(2, 1, 2, 7, 'Students is dropping!', '2018-01-29', 1),
(3, 1, 2, 8, 'Students is dropping!', '2018-01-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scores`
--

CREATE TABLE IF NOT EXISTS `tbl_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score_no` int(11) NOT NULL,
  `grading_system` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_term` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `perfect_score` int(11) NOT NULL,
  `percentage_score` decimal(6,3) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(14, 2, 'g_quiz', 1, 1, 1, 3, 2, 1, '135.000', '2018-01-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat_plan`
--

CREATE TABLE IF NOT EXISTS `tbl_seat_plan` (
  `seat_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `seat_status` int(1) NOT NULL,
  PRIMARY KEY (`seat_plan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(7, 2, 0, 5, 0),
(8, 2, 7, 26, 0),
(9, 2, 8, 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` int(11) NOT NULL,
  `late` int(2) NOT NULL,
  `absent` int(2) NOT NULL,
  `value_for_zero` decimal(4,2) NOT NULL,
  `passing_grade` decimal(5,2) NOT NULL,
  `set_status` int(1) NOT NULL,
  PRIMARY KEY (`set_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`set_id`, `f_id`, `late`, `absent`, `value_for_zero`, `passing_grade`, `set_status`) VALUES
(1, 1, 2, 3, '65.00', '75.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_status` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `user_type`, `account_id`, `user_status`) VALUES
(1, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 0, 1, 1),
(14, 'AWG01091800', 'ytLdgUi1TUajZDx4wg/NMEXKWIOj2lRTpA+293x81ng=', 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
