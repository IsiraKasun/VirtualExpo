CREATE DATABASE virtualexpo;
USE virtualexpo;
-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2016 at 07:03 AM
-- Server version: 10.0.26-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vexpofuturemind_jayandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_Id` varchar(5) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_Id`, `description`, `created_at`, `updated_at`) VALUES
('CS1', 'O/L (Local)', '2016-05-25 05:21:12', '0000-00-00 00:00:00'),
('CS10', 'A/L (London)Arts', '2016-05-25 05:25:00', '0000-00-00 00:00:00'),
('CS11', 'Bachelor Software Engineering', '2016-05-25 05:27:23', '0000-00-00 00:00:00'),
('CS12', 'Phd in Mechanical Engineering', '2016-05-25 05:27:23', '0000-00-00 00:00:00'),
('CS13', 'MBA in Accounting', '2016-05-25 05:28:11', '0000-00-00 00:00:00'),
('CS14', 'Bachelor of Laws', '2016-05-25 05:28:11', '0000-00-00 00:00:00'),
('CS15', 'Bachelor of Civil Engineering', '2016-05-25 13:34:13', '0000-00-00 00:00:00'),
('CS16', 'HR Management certification level', '2016-05-25 13:40:21', '0000-00-00 00:00:00'),
('CS17', 'Bachelor of Accounting ', '2016-05-25 13:40:21', '0000-00-00 00:00:00'),
('CS2', 'O/L (London)', '2016-05-25 05:21:12', '0000-00-00 00:00:00'),
('CS3', 'A/L (Local)Physical Science', '2016-05-25 05:22:36', '0000-00-00 00:00:00'),
('CS4', 'A/L (Local)Bio Science', '2016-05-25 05:22:36', '0000-00-00 00:00:00'),
('CS5', 'A/L (Local)Commerce', '2016-05-25 05:23:23', '0000-00-00 00:00:00'),
('CS6', 'A/L (Local)Arts', '2016-05-25 05:23:23', '0000-00-00 00:00:00'),
('CS7', 'A/L (London)Physical Science', '2016-05-25 05:24:12', '0000-00-00 00:00:00'),
('CS8', 'A/L (London)Bio Science', '2016-05-25 05:24:12', '0000-00-00 00:00:00'),
('CS9', 'A/L (London)Commerce', '2016-05-25 05:25:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_institutions`
--

CREATE TABLE IF NOT EXISTS `course_institutions` (
  `Id` varchar(5) NOT NULL,
  `course_Id` varchar(5) NOT NULL,
  `institution_Id` varchar(5) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id`),
  KEY `fk_courses_has_institutions_institutions1_idx` (`institution_Id`),
  KEY `fk_courses_has_institutions_courses1_idx` (`course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_institutions`
--

INSERT INTO `course_institutions` (`Id`, `course_Id`, `institution_Id`, `duration`, `cost`, `created_at`, `updated_at`) VALUES
('CI1', 'CS1', 'I13', NULL, NULL, '2016-05-25 05:59:34', '0000-00-00 00:00:00'),
('CI10', 'CS10', 'I14', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI11', 'CS11', 'I1', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI12', 'CS11', 'I11', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI13', 'CS11', 'I12', NULL, NULL, '2016-05-25 06:05:00', '0000-00-00 00:00:00'),
('CI14', 'CS14', 'I6', NULL, NULL, '2016-05-25 06:05:00', '0000-00-00 00:00:00'),
('CI15', 'CS14', 'I7', NULL, NULL, '2016-05-25 06:07:14', '0000-00-00 00:00:00'),
('CI16', 'CS14', 'I8', NULL, NULL, '2016-05-25 06:07:14', '0000-00-00 00:00:00'),
('CI17', 'CS14', 'I9', NULL, NULL, '2016-05-25 06:07:35', '0000-00-00 00:00:00'),
('CI18', 'CS15', 'I10', NULL, NULL, '2016-05-25 13:48:28', '0000-00-00 00:00:00'),
('CI19', 'CS16', 'I11', NULL, NULL, '2016-05-25 13:48:28', '0000-00-00 00:00:00'),
('CI2', 'CS2', 'I4', NULL, NULL, '2016-05-25 05:59:34', '0000-00-00 00:00:00'),
('CI20', 'CS16', 'I12', NULL, NULL, '2016-05-25 13:48:28', '0000-00-00 00:00:00'),
('CI21', 'CS17', 'I6', NULL, NULL, '2016-05-25 13:48:28', '0000-00-00 00:00:00'),
('CI22', 'CS17', 'I11', NULL, NULL, '2016-05-25 13:48:28', '0000-00-00 00:00:00'),
('CI3', 'CS3', 'I13', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI4', 'CS4', 'I13', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI5', 'CS5', 'I13', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI6', 'CS6', 'I13', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI7', 'CS7', 'I14', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI8', 'CS8', 'I14', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00'),
('CI9', 'CS9', 'I14', NULL, NULL, '2016-05-25 06:04:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `curriculum_Id` varchar(5) NOT NULL,
  `description` varchar(250) NOT NULL,
  `group_Id` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`curriculum_Id`),
  KEY `fk_curriculum_curriculum_group_idx` (`group_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculum_Id`, `description`, `group_Id`, `created_at`, `updated_at`) VALUES
('C0', 'General', 'CG0', '2016-05-24 21:29:08', '0000-00-00 00:00:00'),
('C1', 'Civil', 'CG1', '2016-05-24 20:22:48', '0000-00-00 00:00:00'),
('C10', 'Physical Science ', 'CG0', '2016-05-25 05:00:04', '0000-00-00 00:00:00'),
('C11', 'Bio Science', 'CG0', '2016-05-25 05:00:32', '0000-00-00 00:00:00'),
('C12', 'Commerce', 'CG0', '2016-05-25 05:01:55', '0000-00-00 00:00:00'),
('C13', 'Arts', 'CG0', '2016-05-25 05:01:55', '0000-00-00 00:00:00'),
('C2', 'Mechanical', 'CG1', '2016-05-24 20:23:27', '0000-00-00 00:00:00'),
('C3', 'Electrical', 'CG1', '2016-05-24 20:23:27', '0000-00-00 00:00:00'),
('C4', 'Computer Science', 'CG1', '2016-05-24 20:24:37', '0000-00-00 00:00:00'),
('C5', 'Electronic', 'CG1', '2016-05-24 20:24:37', '0000-00-00 00:00:00'),
('C6', 'Law', 'CG6', '2016-05-24 20:25:46', '0000-00-00 00:00:00'),
('C7', 'HR', 'CG2', '2016-05-24 20:25:46', '0000-00-00 00:00:00'),
('C8', 'Network', 'CG5', '2016-05-24 20:26:32', '0000-00-00 00:00:00'),
('C9', 'Accounting ', 'CG4', '2016-05-24 21:19:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_group`
--

CREATE TABLE IF NOT EXISTS `curriculum_group` (
  `group_Id` varchar(5) NOT NULL,
  `description` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`group_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curriculum_group`
--

INSERT INTO `curriculum_group` (`group_Id`, `description`, `created_at`, `updated_at`) VALUES
('CG0', 'General', '2016-05-24 21:28:40', '0000-00-00 00:00:00'),
('CG1', 'Engineering ', '2016-05-24 20:04:06', '0000-00-00 00:00:00'),
('CG2', 'Management', '2016-05-24 20:04:06', '0000-00-00 00:00:00'),
('CG3', 'Medicine', '2016-05-24 20:05:03', '0000-00-00 00:00:00'),
('CG4', 'Accounting ', '2016-05-24 20:05:03', '0000-00-00 00:00:00'),
('CG5', 'IT', '2016-05-24 20:05:36', '0000-00-00 00:00:00'),
('CG6', 'Law', '2016-05-24 20:05:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_Id` varchar(5) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`designation_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_Id`, `description`, `created_at`, `updated_at`) VALUES
('D1', 'Civil Engineer', '2016-05-24 20:49:34', '0000-00-00 00:00:00'),
('D10', 'Senior Mechanical Engineer', '2016-05-25 19:13:37', '0000-00-00 00:00:00'),
('D11', 'O/L Student', '2016-05-25 19:13:37', '0000-00-00 00:00:00'),
('D12', 'A/L Student', '2016-05-25 19:13:37', '0000-00-00 00:00:00'),
('D2', 'Software Engineer', '2016-05-24 20:49:34', '0000-00-00 00:00:00'),
('D3', 'Accountant', '2016-05-24 20:50:41', '0000-00-00 00:00:00'),
('D4', 'DB Engineer', '2016-05-24 20:50:41', '0000-00-00 00:00:00'),
('D5', 'Senior Executive', '2016-05-24 20:51:30', '0000-00-00 00:00:00'),
('D6', 'Project Manager', '2016-05-24 20:51:30', '0000-00-00 00:00:00'),
('D7', 'Junior HR Manager ', '2016-05-24 20:54:06', '0000-00-00 00:00:00'),
('D8', 'Lawyer', '2016-06-03 06:41:09', '0000-00-00 00:00:00'),
('D9', 'Nurse', '2016-05-24 20:54:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE IF NOT EXISTS `institutions` (
  `institution_Id` varchar(5) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`institution_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`institution_Id`, `description`, `created_at`, `updated_at`) VALUES
('I1', 'University Of Moratuwa', '2016-05-25 05:11:14', '2016-05-24 23:00:55'),
('I10', 'SLIIT', '2016-05-25 05:16:42', '0000-00-00 00:00:00'),
('I11', 'NIBM', '2016-05-25 05:17:12', '0000-00-00 00:00:00'),
('I12', 'NSBM', '2016-05-25 05:17:12', '0000-00-00 00:00:00'),
('I13', 'Government ', '2016-05-25 05:32:39', '0000-00-00 00:00:00'),
('I14', 'British Council Sri Lanka', '2016-05-25 05:32:39', '0000-00-00 00:00:00'),
('I2', 'Nawaloka Campus', '2016-05-25 05:14:01', '2016-05-25 00:15:23'),
('I3', 'ABS', '2016-05-25 05:14:39', '0000-00-00 00:00:00'),
('I4', 'RIC', '2016-05-25 05:14:39', '0000-00-00 00:00:00'),
('I5', 'University Of Surrey', '2016-05-25 05:15:22', '0000-00-00 00:00:00'),
('I6', 'University of Colombo', '2016-05-25 05:15:22', '0000-00-00 00:00:00'),
('I7', 'Law collage, Sri Lanka', '2016-05-25 05:16:08', '0000-00-00 00:00:00'),
('I8', 'CfPS Law School', '2016-05-25 05:16:08', '0000-00-00 00:00:00'),
('I9', 'BCAS Campus', '2016-05-25 05:16:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `node_Id` varchar(5) NOT NULL,
  `curriculum_Id` varchar(5) NOT NULL,
  `qualification_Id` varchar(5) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`node_Id`),
  UNIQUE KEY `curriculum_Id` (`curriculum_Id`,`qualification_Id`),
  KEY `fk_nodes_curriculum1_idx` (`curriculum_Id`),
  KEY `fk_nodes_qualifications1_idx` (`qualification_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`node_Id`, `curriculum_Id`, `qualification_Id`, `description`, `created_at`, `updated_at`) VALUES
('N1', 'C1', 'Q7', 'BSc in Civil', '2016-05-25 12:28:24', '0000-00-00 00:00:00'),
('N10', 'C12', 'Q3', 'A/L(Local) Passed Commerce', '2016-05-25 12:30:58', '0000-00-00 00:00:00'),
('N2', 'C8', 'Q7', 'Bachelor in network related', '2016-05-25 12:29:02', '0000-00-00 00:00:00'),
('N3', 'C9', 'Q8', 'Account with MBA', '2016-05-24 21:31:17', '0000-00-00 00:00:00'),
('N4', 'C7', 'Q5', 'HR at certification level', '2016-05-24 21:31:17', '0000-00-00 00:00:00'),
('N5', 'C2', 'Q9', 'Mechanical Eng with Phd', '2016-05-24 21:32:41', '0000-00-00 00:00:00'),
('N6', 'C9', 'Q7', 'Accounting with BSc', '2016-05-24 21:32:41', '0000-00-00 00:00:00'),
('N7', 'C0', 'Q1', 'O/L(Local)  Passed', '2016-05-25 12:29:41', '0000-00-00 00:00:00'),
('N8', 'C10', 'Q3', 'A/L(Local) Passed Physical Science', '2016-05-25 12:29:48', '0000-00-00 00:00:00'),
('N9', 'C6', 'Q7', 'Bachelor in Law', '2016-05-25 12:30:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `node_designations`
--

CREATE TABLE IF NOT EXISTS `node_designations` (
  `node_Id` varchar(5) NOT NULL,
  `designation_Id` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`node_Id`,`designation_Id`),
  KEY `fk_node_has_designation_designation1_idx` (`designation_Id`),
  KEY `fk_node_has_designation_node1_idx` (`node_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `node_designations`
--

INSERT INTO `node_designations` (`node_Id`, `designation_Id`, `created_at`, `updated_at`) VALUES
('N1', 'D1', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N10', 'D12', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N2', 'D2', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N3', 'D3', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N3', 'D5', '2016-05-25 19:16:44', '0000-00-00 00:00:00'),
('N4', 'D7', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N5', 'D10', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N5', 'D5', '2016-05-25 19:16:44', '0000-00-00 00:00:00'),
('N6', 'D3', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N7', 'D11', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N8', 'D12', '2016-05-25 19:16:18', '0000-00-00 00:00:00'),
('N9', 'D8', '2016-05-25 19:16:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE IF NOT EXISTS `paths` (
  `path_Id` varchar(5) NOT NULL,
  `start_Node` varchar(5) DEFAULT NULL,
  `end_Node` varchar(5) DEFAULT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`path_Id`),
  KEY `start_Node_idx` (`start_Node`),
  KEY `end_Node_idx` (`end_Node`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`path_Id`, `start_Node`, `end_Node`, `description`, `created_at`, `updated_at`) VALUES
('P1', 'N7', 'N8', 'O/L(Local) to A/L(Local) Passed Physical Science', '2016-05-25 13:16:20', '0000-00-00 00:00:00'),
('P10', 'N8', 'N9', 'A/L(Local)Passed Physical Science to Bachelor in Law', '2016-05-25 13:22:06', '0000-00-00 00:00:00'),
('P11', 'N10', 'N9', 'A/L(Local)Passed Commerce to Bachelor in Law', '2016-05-25 13:23:45', '0000-00-00 00:00:00'),
('P12', 'N1', 'N9', 'BSc In Civil Ecngineering to Bachelor in Law', '2016-05-25 13:23:45', '0000-00-00 00:00:00'),
('P13', 'N2', 'N9', 'Bachelor of Network Engineering to Bachelor in Law', '2016-05-25 13:23:45', '0000-00-00 00:00:00'),
('P14', 'N3', 'N9', 'MBA Accounting to Bachelor in Law', '2016-05-25 14:41:55', '0000-00-00 00:00:00'),
('P15', 'N5', 'N9', 'PhD Mechanical Engineering to Bachelor in Law', '2016-05-25 15:04:29', '0000-00-00 00:00:00'),
('P16', 'N6', 'N9', 'Bachelor of Accounting to Bachelor in Law', '2016-05-25 14:41:55', '0000-00-00 00:00:00'),
('P2', 'N8', 'N1', 'A/L(Local) to BSc In Civil Ecngineering', '2016-05-25 13:16:20', '0000-00-00 00:00:00'),
('P3', 'N8', 'N2', 'A/L(Local) Passed Physical Science to Bachelor of Network Ecngineering', '2016-05-25 13:16:20', '0000-00-00 00:00:00'),
('P4', 'N8', 'N4', 'A/L(Local) Passed Physical Science to HR at certification level', '2016-05-25 13:16:20', '0000-00-00 00:00:00'),
('P5', 'N7', 'N4', 'O/L(Local) to HR at certification level', '2016-05-25 13:16:20', '0000-00-00 00:00:00'),
('P6', 'N7', 'N10', 'O/L(Local) to A/L(Local) Passed Commerece', '2016-05-25 13:22:06', '0000-00-00 00:00:00'),
('P7', 'N10', 'N6', 'A/L(Local) Passsed Commerce to Bachelor of Accounting', '2016-05-25 13:22:06', '0000-00-00 00:00:00'),
('P8', 'N6', 'N3', 'Bachelor of Accounting to Accounting MBA', '2016-05-25 13:22:06', '0000-00-00 00:00:00'),
('P9', 'N10', 'N4', 'A/L(Local)Passed Commerce to HR at Certification Level', '2016-05-25 13:22:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `path_courses`
--

CREATE TABLE IF NOT EXISTS `path_courses` (
  `course_Id` varchar(5) NOT NULL,
  `path_Id` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`course_Id`,`path_Id`),
  KEY `fk_courses_has_paths_paths1_idx` (`path_Id`),
  KEY `fk_courses_has_paths_courses1_idx` (`course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `path_courses`
--

INSERT INTO `path_courses` (`course_Id`, `path_Id`, `created_at`, `updated_at`) VALUES
('CS13', 'P8', '2016-05-25 14:10:32', '0000-00-00 00:00:00'),
('CS14', 'P10', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS14', 'P11', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS14', 'P12', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS14', 'P13', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS14', 'P14', '2016-05-25 14:47:00', '0000-00-00 00:00:00'),
('CS14', 'P15', '2016-05-25 14:47:00', '0000-00-00 00:00:00'),
('CS14', 'P16', '2016-05-25 14:47:00', '0000-00-00 00:00:00'),
('CS15', 'P2', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS16', 'P4', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS16', 'P5', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS16', 'P9', '2016-05-25 14:10:32', '0000-00-00 00:00:00'),
('CS17', 'P7', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS3', 'P1', '2016-05-25 14:10:11', '0000-00-00 00:00:00'),
('CS5', 'P6', '2016-05-25 14:10:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qualification_Id` varchar(5) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`qualification_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_Id`, `description`, `created_at`, `updated_at`) VALUES
('Q1', 'O/L (Local)', '2016-05-24 19:58:02', '0000-00-00 00:00:00'),
('Q2', 'O/L (London)', '2016-05-24 19:58:02', '0000-00-00 00:00:00'),
('Q3', 'A/L (Local)', '2016-05-24 19:58:56', '0000-00-00 00:00:00'),
('Q4', 'A/L (London)', '2016-05-24 19:58:56', '0000-00-00 00:00:00'),
('Q5', 'Certification', '2016-05-24 20:00:15', '0000-00-00 00:00:00'),
('Q6', 'Diploma', '2016-05-24 20:00:15', '0000-00-00 00:00:00'),
('Q7', 'Bachelor', '2016-05-24 21:15:10', '0000-00-00 00:00:00'),
('Q8', 'Masters', '2016-05-24 21:15:19', '0000-00-00 00:00:00'),
('Q9', 'Phd', '2016-05-24 21:08:44', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_institutions`
--
ALTER TABLE `course_institutions`
  ADD CONSTRAINT `fk_courses_has_institutions_courses1` FOREIGN KEY (`course_Id`) REFERENCES `courses` (`course_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_courses_has_institutions_institutions1` FOREIGN KEY (`institution_Id`) REFERENCES `institutions` (`institution_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `fk_curriculum_curriculum_group` FOREIGN KEY (`group_Id`) REFERENCES `curriculum_group` (`group_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `node`
--
ALTER TABLE `node`
  ADD CONSTRAINT `fk_nodes_curriculum1` FOREIGN KEY (`curriculum_Id`) REFERENCES `curriculum` (`curriculum_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nodes_qualifications1` FOREIGN KEY (`qualification_Id`) REFERENCES `qualification` (`qualification_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `node_designations`
--
ALTER TABLE `node_designations`
  ADD CONSTRAINT `fk_node_has_designation_designation1` FOREIGN KEY (`designation_Id`) REFERENCES `designation` (`designation_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_node_has_designation_node1` FOREIGN KEY (`node_Id`) REFERENCES `node` (`node_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paths`
--
ALTER TABLE `paths`
  ADD CONSTRAINT `end_Node` FOREIGN KEY (`end_Node`) REFERENCES `node` (`node_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `start_Node` FOREIGN KEY (`start_Node`) REFERENCES `node` (`node_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `path_courses`
--
ALTER TABLE `path_courses`
  ADD CONSTRAINT `fk_courses_has_paths_courses1` FOREIGN KEY (`course_Id`) REFERENCES `courses` (`course_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_courses_has_paths_paths1` FOREIGN KEY (`path_Id`) REFERENCES `paths` (`path_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
