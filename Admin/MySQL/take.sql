-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 12:47 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(66, 006, 'กระต่าย', '11111', '500.00', 'สายแลน', 1, '2018-01-27'),
(67, 020, 'คีบอร์ด', 'BENQ', '120.00', 'คีบอร์ด', 1, '2018-01-29'),
(68, 020, 'คีบอร์ด', 'BENQ', '120.00', 'คีบอร์ด', 1, '2018-01-31'),
(69, 015, 'สายแลนขั้นเทพ', 'amp', '120.00', 'สายแลน', 1, '2018-01-31'),
(70, 008, 'เมาส์', 'Genius ', '120.00', 'เมาส์', 1, '2018-01-31'),
(71, 006, 'สายแลน', '11111', '500.00', 'สายแลน', 5, '2018-01-31'),
(72, 009, 'เมาส์เกมมิ้ง', 'ZIRCON ', '220.00', 'เมาส์', 3, '2018-01-31'),
(73, 020, 'คีบอร์ด', 'BENQ', '120.00', 'คีบอร์ด', 5, '2018-01-31'),
(74, 019, 'คีบอร์ดด', '111111111111', '500.00', 'คีบอร์ด', 1, '2018-01-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `take`
--
ALTER TABLE `take`
 ADD PRIMARY KEY (`take_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `take`
--
ALTER TABLE `take`
MODIFY `take_id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
