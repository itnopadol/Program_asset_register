-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 08:45 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `Asset_serial` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_receivr_amout` tinyint(2) NOT NULL,
  `Asset_remain_amout` tinyint(2) NOT NULL,
  `Asset_unit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_date` date NOT NULL,
  `Asset_company` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_price` decimal(8,2) NOT NULL,
  `Asset_barcode` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `Category_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Asset_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(005, 'Note Book');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_department` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `Rent_id` tinyint(3) NOT NULL,
  `Asset_id` tinyint(4) NOT NULL,
  `Emp_id` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `Status_id` tinyint(2) NOT NULL,
  `Active_id` tinyint(3) NOT NULL,
  `Rent_count` tinyint(7) NOT NULL,
  `rent_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `Asset_id` tinyint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
