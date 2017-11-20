-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 03:26 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nopadol`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `Asset_id` tinyint(4) UNSIGNED ZEROFILL NOT NULL,
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
  `Asset_Category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_log` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`Asset_id`, `Asset_code`, `Asset_serial`, `Asset_name`, `mac_address`, `computer_name`, `brand`, `Asset_date`, `Asset_company`, `Asset_price`, `Asset_barcode`, `Asset_Category`, `Asset_photo`, `Asset_time`, `detail`, `Asset_log`) VALUES
(0001, '5500100', 'ETP780I79ISLO', 'คอมพิวเตอร์', '00-00-TH-12-88', 'what a ', 'Sumsung', '0000-00-00', 'JIB', '35000.00', 'OIU901273547', '002', '14710258A8_14274357.png', '2017-11-18 03:54:02', 'เอาใหม่ๆนะ จะได้ไหม\r\nลองเทสรูปปปป', 1),
(0007, '5800327', 'US0023S307', 'เครื่องนำทางสู่อนาคต', '127.0.00.152', 'PANAMA', 'Susi', '0000-00-00', 'โดเรมอน', '999999.99', '123456789012', '007', '11117CA403_if_printer_289614.png', '2017-11-18 03:54:43', 'อุปกรณ์ที่จะทำให้คุณเดินทางไปสู่อนาคตได้\r\nเพียงแค่คุณ...หลับ', 1),
(0002, '5500122', 'POQ780I79ISLO', 'จอ', '00-00-88-12-12', 'Jason', 'lenovo', '0000-00-00', 'บริษัทอินเกรสโอเอ(เชียงใหม่)จำกัด', '3500.00', 'OIU901273577', '001', '', '2017-11-18 01:33:55', '', 1),
(0003, '35678990343', 'T3P02139485PE', 'โน๊ตบุ๊ค', '12-A0-TH-12-M7', 'TOY', 'acer', '0000-00-00', 'MMM', '26000.00', 'PPP780I79ISL', '005', '1B4C793820_if_fax_531890.png', '2017-11-18 08:36:24', 'ซื้อมาใช้ได้เลย', 1),
(0004, '1249411234', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'thantip', 'X1', '0000-00-00', 'บริษัท MMM', '30000.00', 'OIU901272222', '002', '851C1792BA_if_3_2694136.png', '2017-11-18 08:22:25', '', 1),
(0006, '5800326', 'US00233307', 'เครื่อง Lenovo', 'none', 'none', 'Lenovo', '0000-00-00', 'กาดหลวง', '9999.00', '123456789012', '005', '38B117530A_draw-23-128.png', '2017-11-18 03:53:38', 'ทดลองใส่เฉยๆ', 1),
(0008, '5800145', 'ABCDEF12345', 'Barcode', '', '', 'Susi', '2017-11-01', 'กาดหลวง', '500.00', '123456789012', '006', '1A87B34014_home-128.png', '2017-11-18 04:43:48', '', 1),
(0009, '0000007', 'ABCDEF12345x', 'แฮนไดร์', '127.0.00.152', 'PANAMA', 'Susi', '2017-10-31', 'กาดหลวง', '500.00', '12345678909', '006', '00111B29C7_P-1-36-128.png', '0000-00-00 00:00:00', 'ทดสอบการแอดลำดับที่ 9 ครั้งที่ 4', 1),
(0010, '0000008', 'ZXCVBNM005OSLQ', 'IPhone X', '', '', 'Susi', '0000-00-00', 'กาดหลวง', '999999.99', '9876543210', '002', 'C794081312_magnifier-cheque-128.png', '2017-11-18 08:39:43', 'ทดสอบ Pop up', 1);

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
  MODIFY `Asset_id` tinyint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
