<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 11:47 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3
=======
﻿-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 08:45 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10
>>>>>>> f2c1cecceb7b73d1dda3052ad723995c18c89a92

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nopadol`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_point`
--

CREATE TABLE IF NOT EXISTS `active_point` (
`Active_id` tinyint(3) unsigned zerofill NOT NULL,
  `Active_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `active_point`
--

INSERT INTO `active_point` (`Active_id`, `Active_name`) VALUES
(001, 'จุดบริการลูกค้า'),
(002, 'โรงเหล็ก'),
(003, 'ห้อง IT'),
(004, 'GR'),
(005, 'GR S02'),
(006, 'Home mart');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_point`
--
ALTER TABLE `active_point`
 ADD PRIMARY KEY (`Active_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_point`
--
ALTER TABLE `active_point`
MODIFY `Active_id` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
