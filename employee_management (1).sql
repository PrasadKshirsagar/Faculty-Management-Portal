-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 01:22 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assis_registrar`
--

CREATE TABLE `assis_registrar` (
  `staff_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assis_registrar`
--

INSERT INTO `assis_registrar` (`staff_id`, `doa`) VALUES
(107, NULL),
(108, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assis_registrar_leave_route`
--

CREATE TABLE `assis_registrar_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assoc_dean`
--

CREATE TABLE `assoc_dean` (
  `faculty_id` int(11) NOT NULL,
  `cc_dept_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assoc_dean`
--

INSERT INTO `assoc_dean` (`faculty_id`, `cc_dept_id`, `doa`) VALUES
(105, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assoc_dean_leave_route`
--

CREATE TABLE `assoc_dean_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `year1` int(11) NOT NULL,
  `month1` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`year1`, `month1`, `bonus`) VALUES
(2019, 3, 200);

-- --------------------------------------------------------

--
-- Table structure for table `cross_cutting`
--

CREATE TABLE `cross_cutting` (
  `cc_dept_id` int(11) NOT NULL,
  `cc_dept_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cross_cutting`
--

INSERT INTO `cross_cutting` (`cc_dept_id`, `cc_dept_name`) VALUES
(1, 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `faculty_id` int(11) NOT NULL,
  `cc_dept_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`faculty_id`, `cc_dept_id`, `doa`) VALUES
(104, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dean_leave_route`
--

CREATE TABLE `dean_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dean_sec`
--

CREATE TABLE `dean_sec` (
  `staff_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL,
  `dean_dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dean_sec`
--

INSERT INTO `dean_sec` (`staff_id`, `doa`, `dean_dept_id`) VALUES
(110, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dean_sec_leave_route`
--

CREATE TABLE `dean_sec_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`) VALUES
(1, 'cse'),
(2, 'ee'),
(3, 'me');

-- --------------------------------------------------------

--
-- Table structure for table `dept_sec`
--

CREATE TABLE `dept_sec` (
  `staff_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL,
  `faculty_dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_sec`
--

INSERT INTO `dept_sec` (`staff_id`, `doa`, `faculty_dept_id`) VALUES
(111, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept_sec_leave_route`
--

CREATE TABLE `dept_sec_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `faculty_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`faculty_id`, `doa`) VALUES
(103, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `director_leave_route`
--

CREATE TABLE `director_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director_leave_route`
--

INSERT INTO `director_leave_route` (`from_post`, `to_post`) VALUES
('director', 'dean');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `grade` varchar(5) NOT NULL,
  `leaves` int(11) NOT NULL,
  `next_year_leaves` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `experience` int(11) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `name`, `joining_date`, `address`, `grade`, `leaves`, `next_year_leaves`, `dept_id`, `experience`, `post`) VALUES
(101, 1, 'a', NULL, NULL, 'a', 54017, 10, 1, 2, 'faculty'),
(102, 2, 'b', NULL, NULL, 'b', 6, 10, 1, 3, 'hod'),
(103, 3, 'c', NULL, NULL, 'b', 3, 10, 3, 3, 'director'),
(104, 4, 'd', NULL, NULL, 'a', 2, 10, 2, 5, 'dean'),
(105, 5, 'e', NULL, NULL, 'c', 0, 9, 2, 5, 'assoc_dean');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_leave_route`
--

CREATE TABLE `faculty_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_leave_route`
--

INSERT INTO `faculty_leave_route` (`from_post`, `to_post`) VALUES
('hod', 'dean'),
('faculty', 'hod');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `faculty_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`faculty_id`, `doa`) VALUES
(102, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hod_leave_route`
--

CREATE TABLE `hod_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_paper_trail`
--

CREATE TABLE `leave_paper_trail` (
  `faculty_id_wants_leave` int(11) NOT NULL,
  `date_of_leave` date NOT NULL,
  `end_leave_date` date DEFAULT NULL,
  `comment_added` varchar(100) DEFAULT NULL,
  `note_added` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approving_authority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_paper_trail`
--

INSERT INTO `leave_paper_trail` (`faculty_id_wants_leave`, `date_of_leave`, `end_leave_date`, `comment_added`, `note_added`, `status`, `approving_authority_id`) VALUES
(101, '2019-04-03', '2019-04-05', 'afsad', '', 'Accepted', 102),
(101, '2019-04-22', '2019-04-23', 'af', '', 'Accepted', 102),
(101, '2019-04-27', '2019-04-28', 'asd', '', 'Accepted', 102),
(101, '2019-04-30', '2019-05-01', 'as', '', 'Accepted', 102),
(101, '2019-04-30', '2019-05-01', 'fada', '', 'Accepted', 104),
(101, '2019-11-13', '2019-11-14', 'trial check', '', 'Accepted', 102),
(101, '2019-11-13', '2019-11-14', 'trial check', '', 'Accepted', 104),
(101, '2019-11-15', '2019-11-17', 'illness', 'note 1', 'Accepted', 102),
(101, '2019-11-15', '2019-11-17', 'illness', 'Enter_here.', 'Accepted', 104),
(101, '2019-11-17', '2019-11-18', 'trial check', 'note 1', 'Accepted', 102);

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `faculty_id` int(11) NOT NULL,
  `current_authority_post` varchar(20) NOT NULL,
  `faculty_post` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `comment_added` varchar(100) DEFAULT NULL,
  `note_added` varchar(255) NOT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`faculty_id`, `current_authority_post`, `faculty_post`, `status`, `comment_added`, `note_added`, `leave_from`, `leave_to`) VALUES
(101, 'dean', 'faculty', 'pending', 'trial check', 'note 1', '2019-11-17', '2019-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`, `post`) VALUES
(1, 1111, 'faculty'),
(2, 2222, 'hod'),
(3, 3333, 'director'),
(4, 4444, 'dean'),
(5, 5555, 'assoc_dean'),
(6, 6666, 'staff'),
(7, 7777, 'assis_registrar'),
(8, 8888, 'assis_registrar'),
(9, 9999, 'registrar'),
(10, 1010, 'dean_sec'),
(11, 1111, 'dept_sec'),
(12, 1212, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `pay_roll`
--

CREATE TABLE `pay_roll` (
  `faculty_id` int(11) NOT NULL,
  `pay_month` int(11) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `bonus_salary` int(11) DEFAULT NULL,
  `generated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_roll_paper_trail`
--

CREATE TABLE `pay_roll_paper_trail` (
  `faculty_id` int(11) NOT NULL,
  `pay_month` int(11) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `bonus_salary` int(11) DEFAULT NULL,
  `generated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_roll_paper_trail`
--

INSERT INTO `pay_roll_paper_trail` (`faculty_id`, `pay_month`, `pay_year`, `basic_salary`, `bonus_salary`, `generated_by`) VALUES
(101, 1, 2019, 10000, 0, 112);

-- --------------------------------------------------------

--
-- Table structure for table `previous_leave_app`
--

CREATE TABLE `previous_leave_app` (
  `faculty_id_wants_leave` int(11) NOT NULL,
  `date_of_leave` date DEFAULT NULL,
  `end_leave_date` date DEFAULT NULL,
  `comment_added` varchar(100) DEFAULT NULL,
  `note_added` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approving_authority` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previous_leave_app`
--

INSERT INTO `previous_leave_app` (`faculty_id_wants_leave`, `date_of_leave`, `end_leave_date`, `comment_added`, `note_added`, `status`, `approving_authority`) VALUES
(101, '2019-11-15', '2019-11-17', 'illness', 'Enter_here.', 'Accepted', 'dean');

-- --------------------------------------------------------

--
-- Table structure for table `prof_cfti`
--

CREATE TABLE `prof_cfti` (
  `goe` varchar(5) NOT NULL,
  `experience` int(11) NOT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof_cfti`
--

INSERT INTO `prof_cfti` (`goe`, `experience`, `salary`) VALUES
('a', 2, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `registrar`
--

CREATE TABLE `registrar` (
  `staff_id` int(11) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrar`
--

INSERT INTO `registrar` (`staff_id`, `doa`) VALUES
(109, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrar_leave_route`
--

CREATE TABLE `registrar_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `grade` varchar(5) NOT NULL,
  `leaves` int(11) NOT NULL,
  `next_year_leaves` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `experience` int(11) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `user_id`, `name`, `joining_date`, `address`, `grade`, `leaves`, `next_year_leaves`, `dept_id`, `experience`, `post`) VALUES
(106, 6, 'f', NULL, NULL, 'd', 1, 10, 1, 5, 'staff'),
(107, 7, 'g', NULL, NULL, 'a', 5, 10, 1, 5, 'assis_registrar'),
(108, 8, 'h', NULL, NULL, 'b', 5, 10, 3, 5, 'assis_registrar'),
(109, 9, 'i', NULL, NULL, 'd', 5, 10, 3, 5, 'registrar'),
(110, 10, 'j', NULL, NULL, 'a', 5, 10, 1, 5, 'dean_sec'),
(111, 11, 'k', NULL, NULL, 'c', 5, 10, 1, 5, 'dept_sec'),
(112, 12, 'l', NULL, NULL, 'd', 5, 10, 3, 5, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `staff_calendar`
--

CREATE TABLE `staff_calendar` (
  `year1` int(11) NOT NULL,
  `month1` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_calendar`
--

INSERT INTO `staff_calendar` (`year1`, `month1`, `bonus`) VALUES
(2019, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `staff_cfti`
--

CREATE TABLE `staff_cfti` (
  `goe` varchar(5) NOT NULL,
  `experience` int(11) NOT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_cfti`
--

INSERT INTO `staff_cfti` (`goe`, `experience`, `salary`) VALUES
('d', 5, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `staff_dept`
--

CREATE TABLE `staff_dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_dept`
--

INSERT INTO `staff_dept` (`dept_id`, `dept_name`) VALUES
(1, 'establishment_office'),
(2, 'purchase'),
(3, 'accounts');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave_paper_trail`
--

CREATE TABLE `staff_leave_paper_trail` (
  `staff_id_wants_leave` int(11) NOT NULL,
  `date_of_leave` date NOT NULL,
  `end_leave_date` date DEFAULT NULL,
  `comment_added` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approving_authority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_leave_paper_trail`
--

INSERT INTO `staff_leave_paper_trail` (`staff_id_wants_leave`, `date_of_leave`, `end_leave_date`, `comment_added`, `status`, `approving_authority_id`) VALUES
(106, '2019-04-12', '2019-04-13', 'asd', 'Accepted', 107),
(106, '2019-04-12', '2019-04-13', 'asd', 'Accepted', 109);

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave_route`
--

CREATE TABLE `staff_leave_route` (
  `from_post` varchar(20) NOT NULL,
  `to_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_leave_route`
--

INSERT INTO `staff_leave_route` (`from_post`, `to_post`) VALUES
('staff', 'assis_registrar'),
('assis_registrar', 'registrar');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave_status`
--

CREATE TABLE `staff_leave_status` (
  `staff_id` int(11) NOT NULL,
  `current_authority_post` varchar(20) NOT NULL,
  `staff_post` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `comment_added` varchar(100) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_pay_roll`
--

CREATE TABLE `staff_pay_roll` (
  `staff_id` int(11) NOT NULL,
  `pay_month` int(11) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `bonus_salary` int(11) DEFAULT NULL,
  `generated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_pay_roll_paper_trail`
--

CREATE TABLE `staff_pay_roll_paper_trail` (
  `staff_id` int(11) NOT NULL,
  `pay_month` int(11) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `bonus_salary` int(11) DEFAULT NULL,
  `generated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_previous_leave_app`
--

CREATE TABLE `staff_previous_leave_app` (
  `staff_id_wants_leave` int(11) NOT NULL,
  `date_of_leave` date DEFAULT NULL,
  `end_leave_date` date DEFAULT NULL,
  `comment_added` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approving_authority` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_previous_leave_app`
--

INSERT INTO `staff_previous_leave_app` (`staff_id_wants_leave`, `date_of_leave`, `end_leave_date`, `comment_added`, `status`, `approving_authority`) VALUES
(106, '2019-04-12', '2019-04-13', 'asd', 'Accepted', 'registrar');

-- --------------------------------------------------------

--
-- Table structure for table `valid_post`
--

CREATE TABLE `valid_post` (
  `post_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valid_post`
--

INSERT INTO `valid_post` (`post_name`) VALUES
('assis_registrar'),
('assoc_dean'),
('dean'),
('dean_sec'),
('dept_sec'),
('director'),
('faculty'),
('hod'),
('registrar'),
('staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assis_registrar`
--
ALTER TABLE `assis_registrar`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `assis_registrar_leave_route`
--
ALTER TABLE `assis_registrar_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `assoc_dean`
--
ALTER TABLE `assoc_dean`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `cc_dept_id` (`cc_dept_id`);

--
-- Indexes for table `assoc_dean_leave_route`
--
ALTER TABLE `assoc_dean_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`month1`,`year1`);

--
-- Indexes for table `cross_cutting`
--
ALTER TABLE `cross_cutting`
  ADD PRIMARY KEY (`cc_dept_id`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `cc_dept_id` (`cc_dept_id`);

--
-- Indexes for table `dean_leave_route`
--
ALTER TABLE `dean_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `dean_sec`
--
ALTER TABLE `dean_sec`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `dean_dept_id` (`dean_dept_id`);

--
-- Indexes for table `dean_sec_leave_route`
--
ALTER TABLE `dean_sec_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dept_sec`
--
ALTER TABLE `dept_sec`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `faculty_dept_id` (`faculty_dept_id`);

--
-- Indexes for table `dept_sec_leave_route`
--
ALTER TABLE `dept_sec_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `director_leave_route`
--
ALTER TABLE `director_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `faculty_leave_route`
--
ALTER TABLE `faculty_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `hod_leave_route`
--
ALTER TABLE `hod_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `leave_paper_trail`
--
ALTER TABLE `leave_paper_trail`
  ADD PRIMARY KEY (`faculty_id_wants_leave`,`date_of_leave`,`approving_authority_id`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`faculty_id`,`current_authority_post`),
  ADD KEY `current_authority_post` (`current_authority_post`),
  ADD KEY `faculty_post` (`faculty_post`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `pay_roll`
--
ALTER TABLE `pay_roll`
  ADD PRIMARY KEY (`faculty_id`,`pay_month`,`pay_year`);

--
-- Indexes for table `pay_roll_paper_trail`
--
ALTER TABLE `pay_roll_paper_trail`
  ADD PRIMARY KEY (`faculty_id`,`pay_month`,`pay_year`);

--
-- Indexes for table `previous_leave_app`
--
ALTER TABLE `previous_leave_app`
  ADD PRIMARY KEY (`faculty_id_wants_leave`);

--
-- Indexes for table `prof_cfti`
--
ALTER TABLE `prof_cfti`
  ADD PRIMARY KEY (`goe`,`experience`);

--
-- Indexes for table `registrar`
--
ALTER TABLE `registrar`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `registrar_leave_route`
--
ALTER TABLE `registrar_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `staff_calendar`
--
ALTER TABLE `staff_calendar`
  ADD PRIMARY KEY (`month1`,`year1`);

--
-- Indexes for table `staff_cfti`
--
ALTER TABLE `staff_cfti`
  ADD PRIMARY KEY (`goe`,`experience`);

--
-- Indexes for table `staff_dept`
--
ALTER TABLE `staff_dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `staff_leave_paper_trail`
--
ALTER TABLE `staff_leave_paper_trail`
  ADD PRIMARY KEY (`staff_id_wants_leave`,`date_of_leave`,`approving_authority_id`);

--
-- Indexes for table `staff_leave_route`
--
ALTER TABLE `staff_leave_route`
  ADD PRIMARY KEY (`from_post`),
  ADD KEY `to_post` (`to_post`);

--
-- Indexes for table `staff_leave_status`
--
ALTER TABLE `staff_leave_status`
  ADD PRIMARY KEY (`staff_id`,`current_authority_post`),
  ADD KEY `current_authority_post` (`current_authority_post`),
  ADD KEY `staff_post` (`staff_post`);

--
-- Indexes for table `staff_pay_roll`
--
ALTER TABLE `staff_pay_roll`
  ADD PRIMARY KEY (`staff_id`,`pay_month`,`pay_year`);

--
-- Indexes for table `staff_pay_roll_paper_trail`
--
ALTER TABLE `staff_pay_roll_paper_trail`
  ADD PRIMARY KEY (`staff_id`,`pay_month`,`pay_year`);

--
-- Indexes for table `staff_previous_leave_app`
--
ALTER TABLE `staff_previous_leave_app`
  ADD PRIMARY KEY (`staff_id_wants_leave`);

--
-- Indexes for table `valid_post`
--
ALTER TABLE `valid_post`
  ADD PRIMARY KEY (`post_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assis_registrar`
--
ALTER TABLE `assis_registrar`
  ADD CONSTRAINT `assis_registrar_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `assis_registrar_leave_route`
--
ALTER TABLE `assis_registrar_leave_route`
  ADD CONSTRAINT `assis_registrar_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `assis_registrar_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `assoc_dean`
--
ALTER TABLE `assoc_dean`
  ADD CONSTRAINT `assoc_dean_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `assoc_dean_ibfk_2` FOREIGN KEY (`cc_dept_id`) REFERENCES `cross_cutting` (`cc_dept_id`);

--
-- Constraints for table `assoc_dean_leave_route`
--
ALTER TABLE `assoc_dean_leave_route`
  ADD CONSTRAINT `assoc_dean_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `assoc_dean_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `dean`
--
ALTER TABLE `dean`
  ADD CONSTRAINT `dean_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `dean_ibfk_2` FOREIGN KEY (`cc_dept_id`) REFERENCES `cross_cutting` (`cc_dept_id`);

--
-- Constraints for table `dean_leave_route`
--
ALTER TABLE `dean_leave_route`
  ADD CONSTRAINT `dean_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `dean_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `dean_sec`
--
ALTER TABLE `dean_sec`
  ADD CONSTRAINT `dean_sec_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `dean_sec_ibfk_2` FOREIGN KEY (`dean_dept_id`) REFERENCES `cross_cutting` (`cc_dept_id`);

--
-- Constraints for table `dean_sec_leave_route`
--
ALTER TABLE `dean_sec_leave_route`
  ADD CONSTRAINT `dean_sec_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `dean_sec_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `dept_sec`
--
ALTER TABLE `dept_sec`
  ADD CONSTRAINT `dept_sec_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `dept_sec_ibfk_2` FOREIGN KEY (`faculty_dept_id`) REFERENCES `dept` (`dept_id`);

--
-- Constraints for table `dept_sec_leave_route`
--
ALTER TABLE `dept_sec_leave_route`
  ADD CONSTRAINT `dept_sec_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `dept_sec_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `director_leave_route`
--
ALTER TABLE `director_leave_route`
  ADD CONSTRAINT `director_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `director_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`),
  ADD CONSTRAINT `faculty_ibfk_3` FOREIGN KEY (`post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `faculty_leave_route`
--
ALTER TABLE `faculty_leave_route`
  ADD CONSTRAINT `faculty_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `faculty_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `hod_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `hod_leave_route`
--
ALTER TABLE `hod_leave_route`
  ADD CONSTRAINT `hod_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `hod_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD CONSTRAINT `leave_status_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `leave_status_ibfk_2` FOREIGN KEY (`current_authority_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `leave_status_ibfk_3` FOREIGN KEY (`faculty_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `pay_roll`
--
ALTER TABLE `pay_roll`
  ADD CONSTRAINT `pay_roll_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `pay_roll_paper_trail`
--
ALTER TABLE `pay_roll_paper_trail`
  ADD CONSTRAINT `pay_roll_paper_trail_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `registrar`
--
ALTER TABLE `registrar`
  ADD CONSTRAINT `registrar_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `registrar_leave_route`
--
ALTER TABLE `registrar_leave_route`
  ADD CONSTRAINT `registrar_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `registrar_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `staff_dept` (`dept_id`),
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `staff_leave_route`
--
ALTER TABLE `staff_leave_route`
  ADD CONSTRAINT `staff_leave_route_ibfk_1` FOREIGN KEY (`from_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `staff_leave_route_ibfk_2` FOREIGN KEY (`to_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `staff_leave_status`
--
ALTER TABLE `staff_leave_status`
  ADD CONSTRAINT `staff_leave_status_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `staff_leave_status_ibfk_2` FOREIGN KEY (`current_authority_post`) REFERENCES `valid_post` (`post_name`),
  ADD CONSTRAINT `staff_leave_status_ibfk_3` FOREIGN KEY (`staff_post`) REFERENCES `valid_post` (`post_name`);

--
-- Constraints for table `staff_pay_roll`
--
ALTER TABLE `staff_pay_roll`
  ADD CONSTRAINT `staff_pay_roll_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff_pay_roll_paper_trail`
--
ALTER TABLE `staff_pay_roll_paper_trail`
  ADD CONSTRAINT `staff_pay_roll_paper_trail_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
