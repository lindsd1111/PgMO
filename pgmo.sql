-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2016 at 05:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pgmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_names`
--

CREATE TABLE IF NOT EXISTS `category_names` (
  `id` int(2) NOT NULL,
  `category_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_names`
--

INSERT INTO `category_names` (`id`, `category_name`) VALUES
(1, '1 - Affordability Initiatives'),
(2, '2 - DE Enrollment Plan'),
(3, '3 - Integrated Tool Set'),
(4, '4 - State Authorization'),
(5, '5 - UNIZIN'),
(6, '6 - Supports ODEE General Mission'),
(7, '7 - Required for Ops, Regs, Mandates, Etc'),
(8, '8 - Placeholder'),
(9, '9 - Placeholder');

-- --------------------------------------------------------

--
-- Table structure for table `deliver_count`
--

CREATE TABLE IF NOT EXISTS `deliver_count` (
`id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `total` int(3) NOT NULL,
  `complete` int(3) NOT NULL,
  `late` int(3) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver_count`
--

INSERT INTO `deliver_count` (`id`, `proj_id`, `total`, `complete`, `late`, `updated`) VALUES
(1, 2, 100, 45, 7, '2016-04-07 13:35:25'),
(2, 2, 110, 0, 7, '2016-04-07 13:36:25'),
(3, 2, 106, 22, 7, '2016-04-07 13:37:18'),
(4, 2, 200, 100, 24, '2016-04-07 13:37:30'),
(5, 2, 200, 100, 24, '2016-04-07 13:39:42'),
(6, 1, 25, 7, 2, '2016-04-15 15:35:50'),
(7, 1, 0, 0, 0, '2016-04-15 15:36:01'),
(8, 10, 22, 17, 1, '2016-04-15 15:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `deliver_notes`
--

CREATE TABLE IF NOT EXISTS `deliver_notes` (
`id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `recent_1` text,
  `recent_2` text,
  `recent_3` text,
  `next_1` text,
  `next_2` text,
  `next_3` text,
  `late_1` text,
  `late_2` text,
  `late_3` text,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver_notes`
--

INSERT INTO `deliver_notes` (`id`, `proj_id`, `recent_1`, `recent_2`, `recent_3`, `next_1`, `next_2`, `next_3`, `late_1`, `late_2`, `late_3`, `updated`) VALUES
(1, 2, 'Recent 1', 'Recent TWO', 'Recent 3', 'Next 1', 'Next TWO', 'Next 3', 'Late 1', '', '', '2016-04-07 13:23:52'),
(2, 2, 'Recent 1', 'Recent TWO', 'Recent 3', 'Next 1', 'Next TWO', NULL, 'Late 1', NULL, NULL, '2016-04-07 13:25:21'),
(3, 2, 'one', 'Two', 'Three', 'four', '', '', 'five', 'six', 'seven', '2016-04-07 13:27:30'),
(4, 1, 'Multi-hour facilitated session between Clutch and OSU Faculty', 'All-day design session facilitated by Clutch', '', 'Clutch to document ideas from all-day design session', 'Clutch to start wireframe work', 'Clutch to present wireframe work to project team 4/18/16', '', '', '', '2016-04-13 13:55:29'),
(5, 9, 'Test one', 'Test two', '', 'Test four', 'Test five', '', '', '', '', '2016-04-17 19:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `phase_gate`
--

CREATE TABLE IF NOT EXISTS `phase_gate` (
`id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `next_phase` datetime NOT NULL,
  `notes` text NOT NULL,
  `bucket` int(1) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase_gate`
--

INSERT INTO `phase_gate` (`id`, `proj_id`, `phase_id`, `next_phase`, `notes`, `bucket`, `updated`) VALUES
(1, 2, 2, '2016-04-21 00:00:00', 'Nulla facilisi. Phasellus consequat mi eget massa venenatis sagittis. Pellentesque sit amet gravida enim. Vivamus vel laoreet metus. Sed a ultrices lectus, non bibendum erat. Integer erat metus, viverra nec orci a, finibus pretium elit. Aenean sed sagittis nibh. In nec dolor sed ligula hendrerit interdum. In vestibulum accumsan eros, sed suscipit purus condimentum quis. Suspendisse potenti. ', 0, '2016-04-07 12:50:49'),
(2, 2, 6, '2016-05-13 00:00:00', 'Loren ipsum. Loren ipsum. Loren ipsum. Loren ipsum. Loren ipsum. Loren ipsum. Loren ipsum. Loren ipsum. Loren ipsum. ', 0, '2016-04-07 12:56:18'),
(3, 2, 3, '2016-06-30 00:00:00', 'Nulla facilisi. Phasellus consequat mi eget massa venenatis sagittis. Pellentesque sit amet gravida enim. Vivamus vel laoreet metus. Sed a ultrices lectus, non bibendum erat. Integer erat metus, viverra nec orci a, finibus pretium elit. Aenean sed sagittis nibh. In nec dolor sed ligula hendrerit interdum. In vestibulum accumsan eros, sed suscipit purus condimentum quis. Suspendisse potenti. ', 0, '2016-04-07 12:58:19'),
(4, 2, 6, '2016-06-30 00:00:00', 'Three Boogers', 0, '2016-04-07 13:01:54'),
(5, 2, 6, '2016-06-30 00:00:00', 'Well, whatever you this is best.', 0, '2016-04-07 14:09:20'),
(6, 1, 4, '0000-00-00 00:00:00', '', 0, '2016-04-07 14:14:18'),
(7, 1, 8, '0000-00-00 00:00:00', '', 0, '2016-04-07 14:24:09'),
(8, 1, 2, '0000-00-00 00:00:00', '', 0, '2016-04-07 14:26:36'),
(9, 1, 6, '0000-00-00 00:00:00', '', 0, '2016-04-07 14:26:41'),
(10, 1, 8, '0000-00-00 00:00:00', '', 0, '2016-04-07 14:26:45'),
(11, 3, 6, '2016-07-12 00:00:00', 'Blah', 0, '2016-04-07 18:56:40'),
(13, 1, 5, '2016-08-11 00:00:00', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. ', 0, '2016-04-07 19:04:30'),
(14, 2, 5, '2016-06-08 00:00:00', 'Lorem ipsum. ', 0, '2016-04-07 19:04:30'),
(15, 3, 5, '2016-07-02 00:00:00', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. ', 0, '2016-04-07 19:04:57'),
(17, 2, 6, '2016-06-08 00:00:00', 'Lorem ipsum. ', 0, '2016-04-13 20:04:45'),
(18, 6, 6, '0000-00-00 00:00:00', '', 0, '2016-04-13 20:05:05'),
(19, 7, 6, '0000-00-00 00:00:00', '', 0, '2016-04-13 20:05:12'),
(20, 8, 6, '0000-00-00 00:00:00', '', 0, '2016-04-13 20:05:23'),
(21, 10, 7, '0000-00-00 00:00:00', '', 0, '2016-04-13 20:05:38'),
(22, 5, 6, '0000-00-00 00:00:00', '', 0, '2016-04-13 20:06:09'),
(23, 12, 6, '0000-00-00 00:00:00', '', 0, '2016-04-14 11:40:08'),
(24, 9, 6, '0000-00-00 00:00:00', '', 0, '2016-04-14 11:50:38'),
(25, 11, 6, '0000-00-00 00:00:00', '', 0, '2016-04-14 11:50:57'),
(26, 15, 6, '0000-00-00 00:00:00', '', 0, '2016-04-14 11:52:37'),
(27, 14, 5, '0000-00-00 00:00:00', '', 0, '2016-04-14 11:52:49'),
(28, 13, 1, '0000-00-00 00:00:00', '', 0, '2016-04-14 11:53:16'),
(31, 4, 6, '2016-08-17 00:00:00', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. ', 0, '2016-04-14 11:56:05'),
(32, 1, 5, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 0, '2016-04-14 12:02:41'),
(33, 1, 4, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 0, '2016-04-15 15:33:34'),
(34, 1, 2, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 0, '2016-04-15 15:33:41'),
(35, 1, 4, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 0, '2016-04-15 15:33:46'),
(36, 9, 6, '0000-00-00 00:00:00', 'Test of Updated status', 0, '2016-04-17 19:14:58'),
(37, 9, 6, '2016-04-29 15:14:58', 'Test of Updated status', 0, '2016-04-17 19:15:16'),
(38, 9, 6, '2016-04-29 15:14:58', '4/19/16 - Adding the Timekeeping Bucket checkmark field', 0, '2016-04-19 13:18:11'),
(39, 9, 6, '2016-04-29 15:14:58', '4/19/16 - Adding the Timekeeping Bucket checkmark field', 0, '2016-04-19 13:18:40'),
(40, 9, 6, '2016-04-29 15:14:58', '4/19/16 - Adding the Timekeeping Bucket checkmark field', 0, '2016-04-19 13:19:08'),
(41, 9, 6, '2016-04-29 15:14:58', '4/19/16 - Adding the Timekeeping Bucket checkmark field', 0, '2016-04-19 13:28:21'),
(42, 9, 6, '2016-04-29 15:14:58', '4/19/16 - Adding the Timekeeping Bucket checkmark field', 0, '2016-04-19 13:30:14'),
(43, 2, 6, '2016-06-08 00:00:00', 'Lorem ipsum. ', 0, '2016-04-19 13:35:34'),
(44, 2, 6, '2016-06-08 00:00:00', 'Lorem ipsum. ', 0, '2016-04-19 13:36:31'),
(45, 2, 6, '2016-06-08 00:00:00', 'Lorem ipsum. ', 0, '2016-04-19 13:36:36'),
(46, 5, 6, '0000-00-00 00:00:00', '', 0, '2016-04-19 13:36:58'),
(47, 5, 6, '0000-00-00 00:00:00', '', 0, '2016-04-19 13:37:45'),
(48, 5, 6, '0000-00-00 00:00:00', '', 0, '2016-04-19 13:37:53'),
(49, 5, 6, '0000-00-00 00:00:00', '', 0, '2016-04-19 13:38:48'),
(50, 1, 4, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 1, '2016-04-19 13:43:10'),
(51, 1, 4, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 0, '2016-04-19 13:43:13'),
(52, 1, 4, '2016-08-11 00:00:00', '4/14/16 - We are still trying to decide how we want to approach a project plan and schedule given that Clutch will be handling most of this using and Agile methodology.', 1, '2016-04-19 13:43:18'),
(53, 4, 6, '2016-08-17 00:00:00', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. ', 1, '2016-04-19 13:45:13'),
(54, 4, 6, '2016-08-17 00:00:00', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. ', 0, '2016-04-19 13:45:17'),
(55, 4, 6, '2016-08-17 00:00:00', '4/19/16 - Checking the functionality of the new timekeeping bucket checkmark.  ', 1, '2016-04-19 13:45:49'),
(56, 2, 6, '2016-06-08 00:00:00', 'Aliquam id blandit arcu. Nam aliquet semper risus sit amet hendrerit. Integer id lacinia magna, ut laoreet dui. Sed tristique eget dolor blandit faucibus.', 1, '2016-04-19 13:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `phase_names`
--

CREATE TABLE IF NOT EXISTS `phase_names` (
  `id` int(2) NOT NULL,
  `phase_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase_names`
--

INSERT INTO `phase_names` (`id`, `phase_name`) VALUES
(0, '0 - Pipeline'),
(1, '1 - Initiate'),
(2, '2 - Pre-Approval'),
(3, '3 - Approval'),
(4, '4 - Plan'),
(5, '5 - Plan Approval'),
(6, '6 - Execute'),
(7, '7 - Close'),
(8, '8 - Archive');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `pm` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `hours` int(5) NOT NULL,
  `category` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `finish_type` enum('Unmovable','Beneficial','Flexible','') NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `pm`, `description`, `hours`, `category`, `finish_type`, `updated`) VALUES
(1, 'Online Readiness Tools', 'Ben Scragg', 'Cras tempor nibh rutrum, vehicula diam nec, tempus purus. Cras ullamcorper, nisl nec sodales convallis, sem nibh sollicitudin purus, vitae lobortis eros ex in neque. Sed et dui pharetra, consequat lorem id, facilisis tellus. Suspendisse porta bibendum justo ut rhoncus. Integer egestas arcu justo, tempus pellentesque sem vehicula in. Donec volutpat est faucibus, bibendum justo ac, gravida risus. Praesent lobortis nibh lectus, nec aliquam felis elementum ac. Mauris ultrices tellus porttitor tempus cursus.', 250, '2', 'Unmovable', '2016-04-14 12:20:37'),
(2, 'ALX: Website Phase 2', 'Melissa Miller', 'Comptus facilisi. Phasellus consequat mi eget massa venenatis sagittis. Pellentesque sit amet gravida enim. Vivamus vel laoreet metus. Sed a ultrices lectus, non bibendum erat. Integer erat metus, viverra nec orci a, finibus pretium elit. Aenean sed sagittis nibh. In nec dolor sed ligula hendrerit interdum. In vestibulum accumsan eros, sed suscipit purus condimentum quis. Suspendisse potenti. ', 255, '8', 'Beneficial', '2016-04-07 14:09:05'),
(3, 'DELTA Website Upgrade P2', 'Marcia Ham', 'Do this then do that then do some of the other.', 260, '4', 'Flexible', '2016-04-01 16:30:51'),
(4, 'Data Visualization', 'Janis Wolens', 'Curabitur ultrices turpis a lacus interdum iaculis. Ut suscipit fringilla urna ut aliquam. Aliquam neque tortor, ullamcorper hendrerit tempor et, pharetra ut justo. Aliquam mollis a nulla in imperdiet. Maecenas ipsum eros, gravida id lorem et, condimentum bibendum lorem. Aenean bibendum, turpis nec bibendum aliquet, diam dolor suscipit dui, sed semper leo turpis eget augue. ', 425, '6', 'Flexible', '2016-04-01 19:31:04'),
(5, 'Canvas Spring Pilot (2016)', 'Valerie Rake', '', 0, '1', 'Unmovable', '2016-04-13 15:18:21'),
(6, 'DE Dashboard', 'Robin Surland', '', 0, '2', 'Beneficial', '2016-04-13 15:18:21'),
(7, 'FAES Extension Application', 'Robin Surland', '', 0, '3', 'Beneficial', '2016-04-13 15:19:26'),
(8, 'FIS Implementation', 'Robin Surland', '', 0, '4', 'Unmovable', '2016-04-13 15:19:26'),
(9, 'Innovative Spaces', 'Sam Craighead', '', 5880, '4', 'Beneficial', '2016-04-17 19:14:44'),
(10, 'ODEE Site Architecture Upgrade', 'Melissa Miller', '', 0, '3', 'Beneficial', '2016-04-13 19:37:10'),
(11, 'Online Proctoring Solutions Recommendations', 'Aaron Carpenter', '', 0, '5', 'Beneficial', '2016-04-13 19:37:36'),
(12, 'State Science Day', 'Angela Davis', '', 0, '8', 'Unmovable', '2016-04-13 19:38:05'),
(13, 'Inclusive Teams Website', 'Matt Delucas', 'Develop a more appealing and interactive co-branded website landing page for OCIO, ODEE and Security that will help us to attract, hire and retain more diverse talent to our organizations.', 0, '4', 'Flexible', '2016-04-13 19:39:24'),
(14, 'DE Canvas Migration', 'Cheryl Brilmyer', 'Establish a comprehensive process, documentation, and migration plan for migrating all ODEE developed online courses (programs and GE online) from D2L to Canvas and enact the developed migration plan', 3929, '2', 'Unmovable', '2016-04-13 19:40:15'),
(15, 'State Auth DB in Alpha', 'Surland', 'Create a tracking system and database in Alpha for use by the DE State Authorization team.', 0, '4', 'Flexible', '2016-04-13 19:42:19'),
(16, 'SEP - Symantec Endpoint Protection', 'Mike Groeniger', 'Anti-virus product adopted by OSU which replaces SCEP (System Center Endpoint Protection).', 0, '7', 'Flexible', '2016-04-13 19:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `target_finish` datetime NOT NULL,
  `est_finish` datetime NOT NULL,
  `baseline_finish` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `proj_id`, `start`, `target_finish`, `est_finish`, `baseline_finish`, `updated`) VALUES
(1, 2, '2016-02-08 00:00:00', '2016-06-01 00:00:00', '2016-08-01 00:00:00', '2016-06-01 00:00:00', '2016-04-05 19:40:57'),
(2, 2, '2016-04-04 00:00:00', '2016-04-30 00:00:00', '2016-05-19 00:00:00', '2016-04-30 00:00:00', '2016-04-07 12:12:57'),
(3, 2, '2016-04-04 00:00:00', '2016-04-30 00:00:00', '2016-05-19 00:00:00', '2016-04-30 00:00:00', '2016-04-07 12:13:40'),
(4, 2, '2016-04-04 00:00:00', '2016-04-30 00:00:00', '2016-05-19 00:00:00', '2016-04-30 00:00:00', '2016-04-07 12:17:45'),
(5, 2, '2016-01-08 00:00:00', '2016-06-01 00:00:00', '2016-06-01 00:00:00', '2016-08-01 00:00:00', '2016-04-07 12:18:29'),
(6, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2017-06-01 00:00:00', '2019-08-01 00:00:00', '2016-04-07 12:19:02'),
(7, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2017-06-01 00:00:00', '2019-08-01 00:00:00', '2016-04-07 12:20:01'),
(8, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2017-06-01 00:00:00', '2019-08-01 00:00:00', '2016-04-07 12:20:34'),
(9, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2017-06-01 00:00:00', '2019-08-01 00:00:00', '2016-04-07 12:21:43'),
(10, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2019-08-01 00:00:00', '2020-06-01 00:00:00', '2016-04-07 12:22:23'),
(11, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2222-06-01 00:00:00', '2019-08-01 00:00:00', '2016-04-07 12:22:47'),
(12, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2019-08-01 00:00:00', '2222-06-01 00:00:00', '2016-04-07 12:25:42'),
(13, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2020-08-01 00:00:00', '2017-06-01 00:00:00', '2016-04-07 12:25:58'),
(14, 2, '2015-02-08 00:00:00', '2017-06-01 00:00:00', '2020-08-01 00:00:00', '2017-06-01 00:00:00', '2016-04-07 12:26:00'),
(15, 1, '2016-04-05 00:00:00', '2016-09-16 00:00:00', '2016-10-14 00:00:00', '2016-10-14 00:00:00', '2016-04-07 19:01:15'),
(16, 3, '2016-02-01 00:00:00', '2016-09-09 00:00:00', '2016-10-14 00:00:00', '2016-10-14 00:00:00', '2016-04-07 19:01:40'),
(17, 4, '2015-11-10 00:00:00', '2016-09-15 00:00:00', '2016-10-21 00:00:00', '2016-09-15 00:00:00', '2016-04-07 19:02:06'),
(18, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-04-13 19:58:53'),
(19, 6, '0000-00-00 00:00:00', '0006-01-16 00:00:00', '0000-00-00 00:00:00', '0006-01-16 00:00:00', '2016-04-13 19:59:16'),
(20, 6, '0000-00-00 00:00:00', '2016-06-01 00:00:00', '2016-06-15 00:00:00', '2016-06-01 00:00:00', '2016-04-13 20:00:39'),
(21, 5, '0000-00-00 00:00:00', '2016-07-17 00:00:00', '2016-07-17 00:00:00', '2016-07-17 00:00:00', '2016-04-13 20:06:30'),
(22, 5, '0000-00-00 00:00:00', '2016-07-17 00:00:00', '2016-07-17 00:00:00', '2016-07-17 00:00:00', '2016-04-13 20:06:32'),
(23, 4, '2015-11-10 00:00:00', '2016-06-15 00:00:00', '2016-06-30 00:00:00', '2016-06-15 00:00:00', '2016-04-14 11:57:18'),
(24, 1, '2016-04-05 00:00:00', '2016-09-16 00:00:00', '2016-09-16 00:00:00', '2016-09-16 00:00:00', '2016-04-15 15:34:00'),
(25, 1, '2016-04-05 00:00:00', '2016-09-16 00:00:00', '2016-09-16 00:00:00', '2016-09-16 00:00:00', '2016-04-15 15:35:03'),
(26, 1, '2016-04-05 00:00:00', '2016-09-16 00:00:00', '2016-09-16 00:00:00', '2016-09-16 00:00:00', '2016-04-15 15:35:41'),
(27, 10, '2016-05-15 00:00:00', '2016-10-15 00:00:00', '2016-10-15 00:00:00', '2016-10-15 00:00:00', '2016-04-15 15:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `pm_status` int(1) NOT NULL,
  `stake_status` int(1) NOT NULL,
  `lind_status` int(1) NOT NULL,
  `exec_sum` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `proj_id`, `pm_status`, `stake_status`, `lind_status`, `exec_sum`, `updated`) VALUES
(1, 2, 4, 2, 7, 'Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  ', '2016-04-07 13:04:48'),
(2, 2, 0, 4, 3, 'Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  ', '2016-04-07 13:06:24'),
(3, 2, 4, 3, 5, 'Dogs', '2016-04-07 13:07:30'),
(4, 2, 3, 4, 5, 'Why oh why?', '2016-04-07 13:20:18'),
(5, 2, 1, 1, 1, 'Who can tell, eh?', '2016-04-07 13:20:39'),
(6, 2, 5, 3, 2, 'Who can tell, eh?', '2016-04-07 13:28:24'),
(7, 2, 5, 3, 2, 'Who can tell, eh?', '2016-04-07 13:33:56'),
(8, 1, 3, 3, 4, 'Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  Loren ipsum.  ', '2016-04-07 14:23:50'),
(9, 1, 3, 3, 4, '4/13/16 - Clutch facilitated an all-day design session with four ODEE members.  Many good ideas were generated during this session.  Clutch will use these ideas and come up with the first wireframe design to show to us on 4/18/16.', '2016-04-13 13:57:07'),
(10, 1, 4, 8, 6, '4/13/16 - Clutch facilitated an all-day design session with four ODEE members.  Many good ideas were generated during this session.  Clutch will use these ideas and come up with the first wireframe design to show to us on 4/18/16.', '2016-04-13 13:59:16'),
(11, 1, 8, 8, 6, '4/13/16 - Clutch facilitated an all-day design session with four ODEE members.  Many good ideas were generated during this session.  Clutch will use these ideas and come up with the first wireframe design to show to us on 4/18/16.', '2016-04-13 13:59:43'),
(12, 1, 7, 8, 6, '4/13/16 - Clutch facilitated an all-day design session with four ODEE members.  Many good ideas were generated during this session.  Clutch will use these ideas and come up with the first wireframe design to show to us on 4/18/16.', '2016-04-13 14:00:01'),
(13, 1, 8, 7, 6, '4/13/16 - Clutch facilitated an all-day design session with four ODEE members.  Many good ideas were generated during this session.  Clutch will use these ideas and come up with the first wireframe design to show to us on 4/18/16.', '2016-04-13 14:02:17'),
(14, 9, 5, 6, 1, '', '2016-04-14 13:38:29'),
(15, 8, 4, 4, 2, '', '2016-04-14 17:21:43'),
(16, 9, 5, 6, 6, '', '2016-04-14 17:22:31'),
(17, 2, 5, 3, 2, '4/19/16 - Aliquam id blandit arcu. Nam aliquet semper risus sit amet hendrerit. Integer id lacinia magna, ut laoreet dui. Sed tristique eget dolor blandit faucibus.', '2016-04-19 13:49:12'),
(18, 4, 3, 4, 1, '4/19/16 - Testing status score coloration.', '2016-04-19 14:40:47'),
(19, 8, 5, 3, 1, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 14:59:53'),
(20, 8, 5, 3, 5, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:03:49'),
(21, 8, 5, 3, 4, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:03:55'),
(22, 8, 5, 3, 2, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:04:07'),
(23, 8, 5, 2, 2, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:06:56'),
(24, 8, 2, 4, 5, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:07:06'),
(25, 8, 2, 2, 5, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:07:25'),
(26, 8, 2, 2, 5, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:09:02'),
(27, 8, 5, 2, 5, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:09:08'),
(28, 8, 5, 2, 5, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:09:49'),
(29, 8, 1, 2, 3, '4/19/16 - Working to set colors for the status scores.', '2016-04-19 15:10:11'),
(30, 5, 5, 3, 1, '4/19/16 - Testing color coding for status indicators', '2016-04-19 15:17:07'),
(31, 5, 5, 4, 1, '4/19/16 - Testing color coding for status indicators', '2016-04-19 15:17:17'),
(32, 5, 5, 4, 3, '4/19/16 - Testing color coding for status indicators', '2016-04-19 15:17:30'),
(33, 5, 5, 4, 3, '4/19/16 - Testing color coding for status indicators', '2016-04-19 15:18:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_names`
--
ALTER TABLE `category_names`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_count`
--
ALTER TABLE `deliver_count`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_notes`
--
ALTER TABLE `deliver_notes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phase_gate`
--
ALTER TABLE `phase_gate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phase_names`
--
ALTER TABLE `phase_names`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliver_count`
--
ALTER TABLE `deliver_count`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `deliver_notes`
--
ALTER TABLE `deliver_notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `phase_gate`
--
ALTER TABLE `phase_gate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
