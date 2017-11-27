-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 02:45 AM
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
-- Table structure for table `active_point`
--

CREATE TABLE `active_point` (
  `Active_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `Active_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `Asset_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active_point` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_log` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`Asset_id`, `Asset_code`, `Asset_serial`, `Asset_name`, `mac_address`, `computer_name`, `brand`, `Asset_date`, `Asset_company`, `Asset_price`, `Asset_barcode`, `Asset_Category`, `Asset_photo`, `Asset_time`, `detail`, `Asset_status`, `active_point`, `Asset_log`) VALUES
(0001, '5500100', 'ETP780I79ISLO', 'คอมพิวเตอร์', '00-00-TH-12-88', 'what a ', 'Sumsung', '0000-00-00', 'JIB', '35000.00', 'OIU901273547', '002', '7C3A3215B0_14274357.png', '2017-11-21 07:35:48', 'เอาใหม่ๆนะ จะได้ไหม\r\nลองเทสรูปปปป', '01', '004', 1),
(0007, '5800327', 'US0023S307', 'เครื่องนำทางสู่อนาคต', '127.0.00.152', 'PANAMA', 'Susi', '0000-00-00', 'โดเรมอน', '999999.99', '123456789012', '007', '11117CA403_if_printer_289614.png', '2017-11-21 09:16:18', 'อุปกรณ์ที่จะทำให้คุณเดินทางไปสู่อนาคตได้\r\nเพียงแค่คุณ...หลับ', '03', '004', 1),
(0002, '5500122', 'POQ780I79ISLO', 'จอ', '00-00-88-12-12', 'Jason', 'lenovo', '0000-00-00', 'บริษัทอินเกรสโอเอ(เชียงใหม่)จำกัด', '3500.00', 'OIU901273577', '001', '', '2017-11-23 01:25:18', '', '03', '003', 1),
(0003, '35678990343', 'T3P02139485PE', 'โน๊ตบุ๊ค', '12-A0-TH-12-M7', 'TOY', 'acer', '0000-00-00', 'MMM', '26000.00', 'PPP780I79ISL', '005', '', '2017-11-21 08:09:50', 'ซื้อมาใช้ได้เลย', '04', '001', 1),
(0004, '1249411234', 'AAA780I79ISLO', 'คอมพิวเตอร์', 'A1-SQ-89-PP-99', 'thantip', 'X1', '0000-00-00', 'บริษัท MMM', '30000.00', 'OIU901272222', '002', '851C1792BA_if_3_2694136.png', '2017-11-22 07:12:20', '', '03', '002', 1),
(0006, '5800326', 'US00233307', 'เครื่อง Lenovo', 'none', 'none', 'Lenovo', '0000-00-00', 'กาดหลวง', '9999.00', '123456789012', '005', '51B4C5470A_if_6_2694143.png', '2017-11-22 07:13:18', 'ทดลองใส่เฉยๆ', '03', '002', 1),
(0008, '5800145', 'ABCDEF12345', 'Barcode', '', '', 'Susi', '2017-11-01', 'กาดหลวง', '500.00', '123456789012', '006', '1A87B34014_home-128.png', '2017-11-21 09:16:06', '', '03', '005', 1),
(0009, '0000007', 'ABCDEF12345x', 'แฮนไดร์', '127.0.00.152', 'PANAMA', 'Susi', '2017-10-31', 'กาดหลวง', '500.00', '12345678909', '006', '00111B29C7_P-1-36-128.png', '2017-11-22 07:13:26', 'ทดสอบการแอดลำดับที่ 9 ครั้งที่ 4', '01', '006', 1),
(0010, '0000008', 'ZXCVBNM005OSLQ', 'IPhone X', '', '', 'Susi', '0000-00-00', 'กาดหลวง', '999999.99', '9876543210', '002', 'C794081312_magnifier-cheque-128.png', '2017-11-21 09:15:47', 'ทดสอบ Pop up', '01', '006', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `Category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`) VALUES
(001, 'จอ'),
(002, 'เครื่องคอมพิวเตอร์'),
(003, 'Handheld'),
(004, 'All in One'),
(005, 'Note Book'),
(007, 'Ram'),
(006, 'Flash Drive');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_department` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_tel` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Emp_code`, `Emp_name`, `Emp_department`, `Emp_tel`) VALUES
('N0001', 'TAI00', 'ธารทิพย์ เศรษฐกิจ', 'แผนก IT', '0946365086'),
('N0002', 'P1213', 'กฤติยา กันทารักษ์', 'แผนกบัญชี', '0383635533'),
('N0003', 'E2121', 'พี่ใจดี', 'แผนกขายโครงการ', '0383735353'),
('N0004', 'T3333', 'พี่แตงโมคนสวย', 'แผนกการเงิน', '0986535355'),
('N0005', 'YPEER', 'น้องบิ๊กเอ็ม', 'แผนก IT', '0841720778');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `acquire` tinyint(1) NOT NULL,
  `paying` int(1) NOT NULL,
  `balance` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `name`, `brand`, `price`, `stock`, `acquire`, `paying`, `balance`) VALUES
(01, 'คีบอร์ด', 'GenX01', '500.00', 2, 0, 0, 0),
(02, 'สายแลน', 'amp', '150.00', 5, 0, 0, 0),
(03, 'เม้าส์', ' Gaming G300S  ', '530.00', 2, 0, 0, 0),
(04, 'Ram', 'GenX', '500.00', 2, 0, 0, 0),
(05, 'Card', 'X1', '500.00', 2, 0, 0, 0),
(13, 'Profile Screen 2', 'Susi', '200.00', 1, 3, 0, 0),
(14, 'Profile Screen', 'Susi', '200.00', 1, 3, 0, 0),
(15, '', '', '0.00', 0, 3, 0, 0),
(16, '', '', '0.00', 0, 1, 0, 0),
(17, '', '', '0.00', 0, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `Status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Level` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Level`) VALUES
('57541204144-5', '1234', 'Student'),
('5901030205259', '12345 ', 'Student'),
('5901080906144', '1234', 'Student'),
('5901100207011', '1234', 'Student'),
('5901100506442', '1234', 'Student'),
('5901130710311', '1234', 'Student'),
('5901140201260', '1234', 'Student'),
('5902010608305', '1234', 'Student'),
('5902020302466', '1234', 'Student'),
('5902030509034', '1234', 'Student'),
('5902040905064', '1234', 'Student'),
('5902050501482', '1234', 'Student'),
('5902070805029', '1234', 'Student'),
('5902170204309', '1234', 'Student'),
('5903020906414', '1234', 'Student'),
('5903030303460', '1234', 'Student'),
('5903040202203', '1234', 'Student'),
('5903070807105', '1234', 'Student'),
('5903090603303', '1234', 'Student'),
('5903100204078', '1234', 'Student'),
('5903101006361', '1234', 'Student'),
('5903110404303', '1234', 'Student'),
('5903150906496', '1234', 'Student'),
('5903180208390', '1234', 'Student'),
('5903180901321', '1234', 'Student'),
('5904010410157', '1234', 'Student'),
('5904090706038', '1234', 'Student'),
('5904090808264', '1234', 'Student'),
('5904111003077', '1234', 'Student'),
('5904160106258', '1234', 'Student'),
('5905040304459', '1234', 'Student'),
('5905110608243', '1234', 'Student'),
('5905180802492', '1234', 'Student'),
('5906030210360', '1234', 'Student'),
('5906070501100', '1234', 'Student'),
('5906070803424', '1234', 'Student'),
('5906100205470', '1234', 'Student'),
('5906110303497', '1234', 'Student'),
('5906110709473', '1234', 'Student'),
('5906120802223', '1234', 'Student'),
('5906150707329', '1234', 'Student'),
('5906160403065', '1234', 'Student'),
('5907050205136', '1234', 'Student'),
('5907050210280', '1234', 'Student'),
('5907090102383', '1234', 'Student'),
('5907090105119', '1234', 'Student'),
('5907121002454', '1234', 'Student'),
('5907140805448', '1234', 'Student'),
('5907140905176', '1234', 'Student'),
('5908010901174', '1234', 'Student'),
('5908030305371', '1234', 'Student'),
('5908030401056', '1234', 'Student'),
('5908040309473', '1234', 'Student'),
('5908070501063', '1234', 'Student'),
('5908090306022', '1234', 'Student'),
('5908090903500', '1234', 'Student'),
('5908090909140', '1234', 'Student'),
('5908101006363', '1234', 'Student'),
('5908110804222', '1234', 'Student'),
('5908130501160', '1234', 'Student'),
('5908170802110', '1234', 'Student'),
('5909010407425', '1234', 'Student'),
('5909020906262', '1234', 'Student'),
('5909060304180', '1234', 'Student'),
('5909060402478', '1234', 'Student'),
('5909060806334', '1234', 'Student'),
('5909070501160', '1234', 'Student'),
('5909110604302', '1234', 'Student'),
('5909150306140', '1234', 'Student'),
('5909151009014', '1234', 'Student'),
('5910020602025', '1234', 'Student'),
('5910060702460', '1234', 'Student'),
('5910060805106', '1234', 'Student'),
('5910090508278', '1234', 'Student'),
('5910090909367', '1234', 'Student'),
('5910100309138', '1234', 'Student'),
('5910130410035', '1234', 'Student'),
('5910171006459', '1234', 'Student'),
('5911020808147', '1234', 'Student'),
('5911051003442', '1234', 'Student'),
('5911080709443', '1234', 'Student'),
('5911100606275', '1234', 'Student'),
('5911110601237', '1234', 'Student'),
('5911120203423', '1234', 'Student'),
('5912060509390', '1234', 'Student'),
('5912110208022', '1234', 'Student'),
('5912120110392', '1234', 'Student'),
('5912160207487', '1234', 'Student'),
('5912160208050', '1234', 'Student'),
('5912170707048', '1234', 'Student'),
('5913010108191', '1234', 'Student'),
('5913020704228', '1234', 'Student'),
('5913020706320', '1234', 'Student'),
('5913060108083', '1234', 'Student'),
('5913070508034', '1234', 'Student'),
('5913080106040', '1234', 'Student'),
('5913080203087', '1234', 'Student'),
('5913180303367', '1234', 'Student'),
('5914010205221', '1234', 'Student'),
('5914020206174', '1234', 'Student'),
('5914020308497', '1234', 'Student'),
('5914020901421', '1234', 'Student'),
('5914050803490', '1234', 'Student'),
('5914051007006', '1234', 'Student'),
('5914090508305', '1234', 'Student'),
('5914110801193', '1234', 'Student'),
('5914120910128', '1234', 'Student'),
('5914130404464', '1234', 'Student'),
('5914160910108', '1234', 'Student'),
('5914170209001', '1234', 'Student'),
('5914170908455', '1234', 'Student'),
('5915020502494', '1234', 'Student'),
('5915040207301', '1234', 'Student'),
('5915070405389', '1234', 'Student'),
('5915081001463', '1234', 'Student'),
('5915110102013', '1234', 'Student'),
('5915140208205', '1234', 'Student'),
('5915160708116', '1234', 'Student'),
('5916010706126', '1234', 'Student'),
('5916020505293', '1234', 'Student'),
('5916060706397', '1234', 'Student'),
('5916080105429', '1234', 'Student'),
('5916080907228', '1234', 'Student'),
('5916090403033', '1234', 'Student'),
('5916090404120', '1234', 'Student'),
('5916110902364', '1234', 'Student'),
('5916150305389', '1234', 'Student'),
('5916170304080', '1234', 'Student'),
('5917020405301', '1234', 'Student'),
('5917051002002', '1234', 'Student'),
('5917100610179', '1234', 'Student'),
('5917101010011', '1234', 'Student'),
('5917140104367', '1234', 'Student'),
('5917150605254', '1234', 'Student'),
('5917180605370', '1234', 'Student'),
('5917180607260', '1234', 'Student'),
('5918050101280', '1234', 'Student'),
('5918060109201', '1234', 'Student'),
('5918090909436', '1234', 'Student'),
('5918130302162', '1234', 'Student'),
('5918140906283', '1234', 'Student'),
('5918150607107', '1234', 'Student'),
('5918150903110', '1234', 'Student'),
('5918150908426', '1234', 'Student'),
('5918151004236', '1234', 'Student'),
('5918161005327', '1234', 'Student'),
('5918170101187', '1234', 'Student'),
('admin', '1234', 'Admin'),
('bigm', '1150', 'Admin'),
('Chile', '1234', 'Teacher'),
('teacher', '1234', 'Teacher');

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_point`
--
ALTER TABLE `active_point`
  MODIFY `Active_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `Asset_id` tinyint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
