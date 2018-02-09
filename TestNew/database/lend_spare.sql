-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 08:34 AM
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
-- Table structure for table `lend_spare`
--

CREATE TABLE IF NOT EXISTS `lend_spare` (
`No` int(11) NOT NULL,
  `id_spare` tinyint(3) unsigned zerofill NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `category_lend` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `Order_lend` int(11) NOT NULL,
  `lend_data` date NOT NULL,
  `rent_empID` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lend_spare`
--

INSERT INTO `lend_spare` (`No`, `id_spare`, `name`, `detail`, `category_lend`, `amount`, `Order_lend`, `lend_data`, `rent_empID`) VALUES
(2, 002, 'สายแลน', 'amp', '03', 3, 35, '0000-00-00', '1234'),
(3, 004, 'ASD', 'X1', '02', 2, 36, '0000-00-00', '987'),
(4, 015, 'XXR', 'amp', '01', 3, 36, '0000-00-00', '987'),
(5, 002, 'สายแลน', 'amp', '03', 1, 37, '0000-00-00', '987'),
(6, 002, 'สายแลน', 'amp', '03', 4, 39, '0000-00-00', '1150'),
(7, 002, 'สายแลน', 'amp', '03', 2, 40, '0000-00-00', '1150'),
(8, 003, 'เม้าส์', ' Gaming G300S  ', ' 02', 1, 40, '0000-00-00', '1150'),
(9, 006, 'กระต่าย', '11111', ' 03', 1, 41, '0000-00-00', '888888'),
(10, 003, 'เม้าส์', ' Gaming G300S  ', ' 02', 1, 42, '0000-00-00', '1349'),
(11, 002, 'สายแลน', 'amp', '03', 1, 42, '0000-00-00', '1349'),
(12, 002, 'สายแลน', 'amp', '03', 1, 43, '0000-00-00', '1234'),
(13, 002, 'สายแลน', 'amp', '03', 1, 44, '0000-00-00', '1234'),
(14, 002, 'สายแลน', 'amp', '03', 1, 45, '0000-00-00', '1234'),
(15, 002, 'สายแลน', 'amp', '03', 1, 50, '0000-00-00', '1150'),
(16, 002, 'สายแลน', 'amp', '03', 1, 51, '0000-00-00', '987'),
(17, 002, 'สายแลน', 'amp', '03', 1, 52, '0000-00-00', '1349'),
(18, 016, '11111111', '111111111111', ' 02', 1, 53, '0000-00-00', '987'),
(19, 006, 'กระต่าย', '11111', ' 03', 1, 54, '0000-00-00', '1349'),
(20, 008, 'lfefe', 'Genius ', ' 02', 2, 55, '0000-00-00', '9900'),
(21, 010, 'สายแลน', 'ZIRCON ', ' 03', 1, 56, '0000-00-00', '9999'),
(22, 004, 'ASD', 'X1', ' 02', 1, 57, '0000-00-00', '1234'),
(23, 002, 'สายแลน', 'amp', '03', 1, 58, '0000-00-00', '4444'),
(24, 006, 'กระต่าย', '11111', ' 03', 1, 59, '0000-00-00', '1234'),
(25, 019, 'คีบอร์ดด', '111111111111', ' 01', 1, 60, '0000-00-00', '2222'),
(26, 019, 'คีบอร์ดด', '111111111111', ' 01', 1, 61, '0000-00-00', '1349'),
(27, 019, 'คีบอร์ดด', '111111111111', ' 01', 1, 62, '0000-00-00', '1349'),
(28, 019, 'คีบอร์ดด', '111111111111', ' 01', 1, 63, '0000-00-00', '1349'),
(29, 019, 'คีบอร์ดด', '111111111111', ' 01', 1, 64, '0000-00-00', '1349');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lend_spare`
--
ALTER TABLE `lend_spare`
 ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lend_spare`
--
ALTER TABLE `lend_spare`
MODIFY `No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
