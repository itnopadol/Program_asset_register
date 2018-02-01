-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 01:49 PM
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
  `Asset_Category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active_point` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_log` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`Asset_id`, `Asset_code`, `Asset_serial`, `Asset_name`, `mac_address`, `computer_name`, `brand`, `Asset_date`, `Asset_company`, `Asset_price`, `Asset_barcode`, `Asset_Category`, `Asset_photo`, `Asset_time`, `detail`, `Asset_status`, `active_point`, `Asset_log`) VALUES
(0001, '5500100', 'ETP780I79ISLO', 'คอมพิวเตอร์', '00-00-TH-12-88', 'what a ', 'Sumsung', '0000-00-00', 'JIB', '35000.00', 'OIU901273547', '002', '14710258A8_14274357.png', '2017-11-18 03:54:02', 'เอาใหม่ๆนะ จะได้ไหม\r\nลองเทสรูปปปป', '', '', 1),
(0007, '5800327', 'US0023S307', 'เครื่องนำทางสู่อนาคต', '127.0.00.152', 'PANAMA', 'Susi', '0000-00-00', 'โดเรมอน', '999999.99', '123456789012', '007', '11117CA403_if_printer_289614.png', '2017-11-18 03:54:43', 'อุปกรณ์ที่จะทำให้คุณเดินทางไปสู่อนาคตได้\r\nเพียงแค่คุณ...หลับ', '', '', 1),
(0002, '5500122', 'POQ780I79ISLO', 'จอ', '00-00-88-12-12', 'Jason', 'lenovo', '0000-00-00', 'บริษัทอินเกรสโอเอ(เชียงใหม่)จำกัด', '3500.00', 'OIU901273577', '001', '', '2017-11-18 01:33:55', '', '', '', 1),
(0003, '35678990343', 'T3P02139485PE', 'โน๊ตบุ๊ค', '12-A0-TH-12-M7', 'TOY', 'acer', '0000-00-00', 'MMM', '26000.00', 'PPP780I79ISL', '005', '1B4C793820_if_fax_531890.png', '2017-11-18 08:36:24', 'ซื้อมาใช้ได้เลย', '', '', 1),
(0004, '1249411234', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'thantip', 'X1', '0000-00-00', 'บริษัท MMM', '30000.00', 'OIU901272222', '002', '851C1792BA_if_3_2694136.png', '2017-11-18 08:22:25', '', '', '', 1),
(0006, '5800326', 'US00233307', 'เครื่อง Lenovo', 'none', 'none', 'Lenovo', '0000-00-00', 'กาดหลวง', '9999.00', '123456789012', '005', '38B117530A_draw-23-128.png', '2017-11-18 03:53:38', 'ทดลองใส่เฉยๆ', '', '', 1),
(0008, '5800145', 'ABCDEF12345', 'Barcode', '', '', 'Susi', '2017-11-01', 'กาดหลวง', '500.00', '123456789012', '006', '1A87B34014_home-128.png', '2017-11-18 04:43:48', '', '', '', 1),
(0009, '0000007', 'ABCDEF12345x', 'แฮนไดร์', '127.0.00.152', 'PANAMA', 'Susi', '2017-10-31', 'กาดหลวง', '500.00', '12345678909', '006', '00111B29C7_P-1-36-128.png', '0000-00-00 00:00:00', 'ทดสอบการแอดลำดับที่ 9 ครั้งที่ 4', '', '', 1),
(0010, '0000008', 'ZXCVBNM005OSLQ', 'IPhone X', '', '', 'Susi', '0000-00-00', 'กาดหลวง', '999999.99', '9876543210', '002', 'C794081312_magnifier-cheque-128.png', '2017-11-18 08:39:43', 'ทดสอบ Pop up', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`Category_id` tinyint(3) unsigned zerofill NOT NULL,
  `Category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`) VALUES
(001, 'จอมอนิเตอร์'),
(002, 'เครื่องคอมพิวเตอร์'),
(003, 'Handheld'),
(004, 'All in One'),
(005, 'Note Book'),
(007, 'Ram'),
(006, 'Flash Drive'),
(008, 'ถ่าน'),
(009, 'แรม'),
(010, 'แรม'),
(011, 'แรม'),
(012, 'แรม');

-- --------------------------------------------------------

--
-- Table structure for table `category_spare`
--

CREATE TABLE IF NOT EXISTS `category_spare` (
  `Category_id` tinyint(2) unsigned zerofill NOT NULL,
  `Category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_spare`
--

INSERT INTO `category_spare` (`Category_id`, `Category_name`) VALUES
(01, 'คีบอร์ด'),
(02, 'เมาส์'),
(03, 'สายแลน'),
(04, 'สายอื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE IF NOT EXISTS `lend` (
`id_lend` tinyint(6) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lend_empsp`
--

INSERT INTO `lend_empsp` (`No`, `rent_empID`, `rent_name`, `rent_phone`, `rent_date`, `lend_status`, `rent_department`, `lend_Log`) VALUES
(35, '1234', 'น้องต่าย', '094-636508', '0000-00-00', 01, 'บุคคล', 1),
(36, '987', 'poot', '097-976544', '0000-00-00', 01, 'บุคคล', 1),
(37, '1234', 'น้องต่าย', '094-636508', '0000-00-00', 01, 'บุคคล', 1),
(38, '987', 'poot', '097-976544', '0000-00-00', 01, 'บุคคล', 1),
(39, '1150', 'thantip', '097-976544', '0000-00-00', 01, 'การเงินสินเชื่อ', 1),
(40, '1150', 'thantip', '097-853799', '0000-00-00', 01, 'การเงินสินเชื่อ', 1),
(41, '888888', 'pim', '097-976544', '0000-00-00', 01, 'บุคคล', 1),
(42, '1349', 'น้องต่าย', '094-636508', '0000-00-00', 01, 'ไอที', 1),
(43, '1234', 'thantip', '094-636508', '0000-00-00', 01, 'การตลาด', 1),
(44, '1234', 'thantip', '094-636508', '0000-00-00', 01, 'การตลาด', 1),
(45, '1234', 'thantip', '094-636508', '0000-00-00', 01, 'การตลาด', 1),
(46, '1150', '111', '111', '0000-00-00', 01, 'การตลาด', 1),
(47, '1150', '111', '111', '0000-00-00', 01, 'การตลาด', 1),
(48, '1150', '111', '111', '0000-00-00', 01, 'การตลาด', 1),
(49, '1150', '111', '111', '0000-00-00', 01, 'การตลาด', 1),
(50, '1150', '111', '111', '0000-00-00', 01, 'การตลาด', 1),
(51, '987', 'thantip', '099-976541', '0000-00-00', 01, 'การเงินสินเชื่อ', 1),
(52, '1349', 'thantip', '094-636508', '0000-00-00', 01, 'การเงินสินเชื่อ', 1),
(53, '987', 'thantip', '099-976541', '0000-00-00', 01, 'บัญชี', 1),
(54, '1349', 'thantip', '094-636508', '0000-00-00', 01, 'บัญชี', 1),
(55, '9900', 'ppppppppppp', '099-976541', '0000-00-00', 01, 'การเงินสินเชื่อ', 1),
(56, '9999', 'อะไรก็ได้', '097-853799', '0000-00-00', 01, 'บัญชี', 1),
(57, '1234', 'thantip', '094-636508', '0000-00-00', 01, 'ไอที', 1),
(58, '4444', 'ooooo', '099-976541', '0000-00-00', 01, 'บัญชี', 1),
(59, '1234', 'thantip', '097-853799', '0000-00-00', 01, 'ไอที', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(24, 006, 'กระต่าย', '11111', ' 03', 1, 59, '0000-00-00', '1234');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(15, 54, 006, 'กระต่าย', '11111', 1, 1, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `spare_part`
--

CREATE TABLE IF NOT EXISTS `spare_part` (
`id` tinyint(3) unsigned zerofill NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(3) NOT NULL,
  `acquire` tinyint(1) NOT NULL,
  `pay` tinyint(2) NOT NULL,
  `balance` tinyint(3) NOT NULL,
  `time` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spare_part`
--

INSERT INTO `spare_part` (`id`, `photo`, `name`, `brand`, `price`, `category`, `stock`, `acquire`, `pay`, `balance`, `time`) VALUES
(019, '', 'คีบอร์ดด', '111111111111', '500.00', '01', 1, 0, 0, 0, '0000-00-00'),
(020, '', 'คีบอร์ด', 'BENQ', '120.00', '01', 2, 0, 0, 0, '0000-00-00'),
(021, '', 'สายแลน', 'amp', '120.00', '03', 2, 0, 0, 0, '0000-00-00'),
(006, 'link-cat5e-10-m-white-1483941012-7590801-aba4535b8261c8e2d65da5dd5929a1fd-product.jpg', 'สายแลน', '11111', '500.00', ' 03', 8, 1, 1, 7, '0000-00-00'),
(007, 'if_Avatar_Famous_Characters-11_2612543.png', 'คีบอร์ด', 'BENQ', '1500.00', ' 01', 4, 1, 0, 4, '0000-00-00'),
(008, '4004093.jpg', 'เมาส์', 'Genius ', '120.00', ' 02', 2, 0, 0, 0, '0000-00-00'),
(009, 'aHR0cHM6Ly9zLmlzYW5vb2suY29tL2hpLzAvdWQvMjgyLzE0MTMxODEvc3VyZmFjZS1tb3VzZS1zdG9yZS5qcGc=.jpg', 'เมาส์เกมมิ้ง', 'ZIRCON ', '220.00', ' 02', 1, 0, 0, 0, '0000-00-00'),
(010, 'zn.jpg', 'สายแลน', 'AAA ', '120.00', ' 03', 1, 0, 0, 0, '0000-00-00'),
(012, 'สานแลน-UTP-04-01.jpg', 'สายแลนดำขึลึ', 'LNWZA', '120.00', ' 03', 5, 0, 0, 0, '0000-00-00'),
(014, '3930134.jpg', 'เมาส์', 'rezer', '500.00', ' 02', 2, 0, 0, 0, '0000-00-00'),
(015, 'สายแลน CAT 5E HISATTEL 305ม_ สีขาว (ภายใน) 3.jpg', 'สายแลนขั้นเทพ', 'amp', '120.00', ' 03', 2, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`Status_id` tinyint(2) unsigned zerofill NOT NULL,
  `Status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_id`, `Status_name`) VALUES
(01, 'พร้อมใช้งาน'),
(02, 'เสีย'),
(03, 'รอซ่อม'),
(04, 'ยืม');

-- --------------------------------------------------------

--
-- Table structure for table `take`
--

CREATE TABLE IF NOT EXISTS `take` (
`take_id` tinyint(2) unsigned zerofill NOT NULL,
  `id_inventory` tinyint(3) unsigned zerofill NOT NULL,
  `take_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `take_brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `take_pice` decimal(8,2) NOT NULL,
  `take_category` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `take_acquire` tinyint(1) NOT NULL,
  `take_time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `take`
--

INSERT INTO `take` (`take_id`, `id_inventory`, `take_name`, `take_brand`, `take_pice`, `take_category`, `take_acquire`, `take_time`) VALUES
(59, 002, 'สายแลน', 'amp', '150.00', 'สายแลน', 1, '2018-01-25'),
(60, 003, 'เม้าส์', ' Gaming G300S  ', '530.00', 'เมาส์', 1, '2018-01-25'),
(61, 006, 'กระต่าย', '11111', '500.00', 'สายแลน', 1, '2018-01-25'),
(62, 006, 'กระต่าย', '11111', '500.00', 'สายแลน', 3, '2018-01-25'),
(63, 007, 'iii', 'BENQ', '1500.00', 'คีบอร์ด', 1, '2018-01-25'),
(64, 006, 'กระต่าย', '11111', '500.00', 'สายแลน', 1, '2018-01-25'),
(65, 006, 'กระต่าย', '11111', '500.00', 'สายแลน', 1, '2018-01-27'),
(66, 006, 'กระต่าย', '11111', '500.00', 'สายแลน', 1, '2018-01-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_point`
--
ALTER TABLE `active_point`
 ADD PRIMARY KEY (`Active_id`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
 ADD PRIMARY KEY (`Asset_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `category_spare`
--
ALTER TABLE `category_spare`
 ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `lend`
--
ALTER TABLE `lend`
 ADD PRIMARY KEY (`id_lend`);

--
-- Indexes for table `lend_empsp`
--
ALTER TABLE `lend_empsp`
 ADD PRIMARY KEY (`No`);

--
-- Indexes for table `lend_spare`
--
ALTER TABLE `lend_spare`
 ADD PRIMARY KEY (`No`);

--
-- Indexes for table `send_sp`
--
ALTER TABLE `send_sp`
 ADD PRIMARY KEY (`send_id`);

--
-- Indexes for table `spare_part`
--
ALTER TABLE `spare_part`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `take`
--
ALTER TABLE `take`
 ADD PRIMARY KEY (`take_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_point`
--
ALTER TABLE `active_point`
MODIFY `Active_id` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
MODIFY `Asset_id` tinyint(4) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `Category_id` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lend`
--
ALTER TABLE `lend`
MODIFY `id_lend` tinyint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lend_empsp`
--
ALTER TABLE `lend_empsp`
MODIFY `No` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `lend_spare`
--
ALTER TABLE `lend_spare`
MODIFY `No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `send_sp`
--
ALTER TABLE `send_sp`
MODIFY `send_id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `spare_part`
--
ALTER TABLE `spare_part`
MODIFY `id` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `Status_id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `take`
--
ALTER TABLE `take`
MODIFY `take_id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
