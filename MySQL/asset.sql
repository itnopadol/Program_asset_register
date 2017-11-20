-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 09:24 AM
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
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
`Asset_id` tinyint(4) unsigned zerofill NOT NULL,
  `Asset_code` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_serial` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mac_address` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `computer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_date` date NOT NULL,
  `Asset_company` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_price` decimal(8,2) NOT NULL,
  `Asset_barcode` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `Category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active_point` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`Asset_id`, `Asset_code`, `Asset_serial`, `Asset_name`, `mac_address`, `computer_name`, `brand`, `Asset_date`, `Asset_company`, `Asset_price`, `Asset_barcode`, `Category`, `Asset_photo`, `Asset_time`, `detail`, `status`, `active_point`) VALUES
(0001, '5500100', 'ETP780I79ISLO', 'คอมพิวเตอร์', '00-00-TH-12-88', 'what a ', 'Sumsung', '2017-11-07', 'JIB', '35000.00', 'OIU901273547', '002', 'draw-23-128.png', '2017-11-18 08:59:11', '', '', '001'),
(0009, '35678990343', 'T3P02139485PE', 'โน๊ตบุ๊ค', '12-A0-TH-12-M7', 'TOY', 'acer', '2017-11-13', 'MMM', '26000.00', 'PPP780I79ISL', '', '500.jpg', '2017-11-18 08:59:11', 'ดีเยี่ยม', '', '002'),
(0007, '1249411234', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'ooooo', 'azus', '2017-11-15', 'บริษัท Mooo', '30000.00', 'OIU901272222', '', '81cAwMHEfwL._SX355_.jpg', '2017-11-18 08:59:11', '', '', '006'),
(0002, '5500122', 'POQ780I79ISLO', 'จอ', '00-00-88-12-12', 'Jason', 'lenovo', '2017-11-07', 'บริษัทอินเกรสโอเอ(เชียงใหม่)จำกัด', '3500.00', 'OIU901273577', '02', '', '2017-11-18 08:59:11', '', '', '001'),
(0003, '35678990343', 'T3P02139485PE', 'โน๊ตบุ๊ค', '12-A0-TH-12-M7', 'TOY', 'acer', '2017-11-13', 'MMM', '26000.00', 'PPP780I79ISL', '005', 'if_fax_531890.png', '2017-11-18 08:59:11', 'ซื้อมาใช้ได้เลย', '', '004'),
(0004, '11232343535', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'thantip', 'X1', '2017-11-02', 'บริษัท MMM', '30000.00', 'OIU901272222', '', '', '2017-11-18 08:59:11', '', '', '003'),
(0005, '1249411234', 'AAA780I79ISLO', 'โน๊ตบุ๊ค', 'A1-SQ-89-PP-99', 'thantip', 'X1', '2017-11-07', 'บริษัท MMM', '30000.00', 'OIU901272222', '', '500.jpg', '2017-11-18 08:59:11', '', '', '005'),
(0006, '1249411234', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'thantip', '111111111111', '2017-11-01', 'บริษัท MMM', '30000.00', 'OIU901272222', '002', '500.jpg', '2017-11-18 08:59:11', '', '', '006'),
(0008, '4500122', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'thantip', 'X1', '2017-11-04', 'บริษัท MMM', '30000.00', 'OIU901272222', '001', '', '2017-11-18 08:59:11', 'ddddddddddddddd', '', '005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
 ADD PRIMARY KEY (`Asset_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
MODIFY `Asset_id` tinyint(4) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
