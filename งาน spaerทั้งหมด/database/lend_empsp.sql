-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 07:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `lend_empsp`
--

CREATE TABLE IF NOT EXISTS `lend_empsp` (
`No` int(12) NOT NULL,
  `rent_empID` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `rent_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rent_phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `rent_date` date NOT NULL,
  `lend_status` tinyint(2) unsigned zerofill NOT NULL DEFAULT '01',
  `rent_department` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lend_Log` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lend_empsp`
--

INSERT INTO `lend_empsp` (`No`, `rent_empID`, `rent_name`, `rent_phone`, `rent_date`, `lend_status`, `rent_department`, `lend_Log`) VALUES
(35, '1234', 'น้องต่าย', '094-636508', '0000-00-00', 01, 'บุคคล', 1),
(36, '987', 'poot', '097-976544', '0000-00-00', 01, 'บุคคล', 1),
(37, '1234', 'น้องต่าย', '094-636508', '0000-00-00', 01, 'บุคคล', 1),
(38, '987', 'poot', '097-976544', '0000-00-00', 01, 'บุคคล', 1),
(39, '1150', 'thantip', '097-976544', '0000-00-00', 01, 'การเงินสินเชื่อ', 1),
(40, '1150', 'thantip', '097-853799', '0000-00-00', 01, 'การเงินสินเชื่อ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lend_empsp`
--
ALTER TABLE `lend_empsp`
 ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lend_empsp`
--
ALTER TABLE `lend_empsp`
MODIFY `No` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
