-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 10:13 AM
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
-- Table structure for table `spare_part`
--

CREATE TABLE IF NOT EXISTS `spare_part` (
`id` tinyint(2) unsigned zerofill NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(3) NOT NULL,
  `acquire` tinyint(1) NOT NULL,
  `balance` tinyint(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spare_part`
--

INSERT INTO `spare_part` (`id`, `photo`, `name`, `brand`, `price`, `category`, `stock`, `acquire`, `balance`, `time`) VALUES
(01, '81.jpg', 'คีบอร์ดfff', 'X1', '500.00', ' 1', 3, 0, 5, '2017-11-28 07:50:48'),
(02, 'link-cable-cat5e-10-1475490076-8901313-1b1bffb5fc324a5ea6da3ebc9f6314ab-product.jpg', 'สายแลน', 'amp', '150.00', '3', 6, 0, 6, '2017-11-27 03:29:01'),
(03, 'images.jpg', 'เม้าส์', ' Gaming G300S  ', '530.00', '1', 1, 0, 5, '2017-11-27 03:28:05'),
(04, '81.jpg', 'sdf', 'X1', '500.00', '2', 2, 0, 2, '2017-11-27 03:30:25'),
(05, 'link-cable-cat5e-10-1475490076-8901313-1b1bffb5fc324a5ea6da3ebc9f6314ab-product.jpg', 'sdf', 'X1', '500.00', '3', 3, 0, 3, '2017-11-27 03:30:48'),
(06, 'link-cable-cat5e-10-1475490076-8901313-1b1bffb5fc324a5ea6da3ebc9f6314ab-product.jpg', 'สายแลน', 'amp', '500.00', '1', 3, 0, 3, '2017-11-27 03:32:32'),
(07, 'razeranansi01.jpg', 'กระต่าย', 'X1', '500.00', '2', 2, 0, 0, '2017-11-27 03:32:53'),
(08, 'email-icon.png', 'กระต่าย', 'X1', '500.00', ' 2', 3, 0, 0, '2017-11-28 07:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spare_part`
--
ALTER TABLE `spare_part`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spare_part`
--
ALTER TABLE `spare_part`
MODIFY `id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
