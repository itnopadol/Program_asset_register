-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 01:00 PM
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
-- Table structure for table `send_sp`
--

CREATE TABLE IF NOT EXISTS `send_sp` (
`send_id` tinyint(2) NOT NULL,
  `send_bill` int(2) NOT NULL,
  `send_idSp` tinyint(3) unsigned zerofill NOT NULL,
  `send_nameSp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `send_brand` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `send_number` int(1) NOT NULL,
  `send_back` int(2) NOT NULL,
  `send_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `send_department` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `send_sp`
--

INSERT INTO `send_sp` (`send_id`, `send_bill`, `send_idSp`, `send_nameSp`, `send_brand`, `send_number`, `send_back`, `send_name`, `send_department`, `send_date`) VALUES
(1, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(2, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(3, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(4, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(5, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(6, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(7, 35, 002, 'สายแลน', '', 3, 1, '', '', '0000-00-00'),
(8, 41, 006, 'กระต่าย', '11111', 1, 0, '', '', '0000-00-00'),
(9, 35, 002, 'สายแลน', 'amp', 3, 2, '', '', '0000-00-00'),
(10, 41, 006, 'กระต่าย', '11111', 1, 0, '', '', '0000-00-00'),
(11, 39, 002, 'สายแลน', 'amp', 4, 1, '', '', '0000-00-00'),
(12, 35, 002, 'สายแลน', 'amp', 3, 2, '', '', '0000-00-00'),
(13, 35, 002, 'สายแลน', 'amp', 3, 2, '', '', '2018-01-18'),
(14, 43, 002, 'สายแลน', 'amp', 1, 2, '', '', '0000-00-00'),
(15, 54, 006, 'กระต่าย', '11111', 1, 1, '', '', '0000-00-00'),
(16, 45, 002, 'สายแลน', 'amp', 1, 0, '', '', '0000-00-00'),
(17, 60, 019, 'คีบอร์ดด', '111111111111', 1, 1, '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `send_sp`
--
ALTER TABLE `send_sp`
 ADD PRIMARY KEY (`send_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `send_sp`
--
ALTER TABLE `send_sp`
MODIFY `send_id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
