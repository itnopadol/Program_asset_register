-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 11:09 AM
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
  ` Pay` tinyint(1) NOT NULL,
  `balance` tinyint(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spare_part`
--

INSERT INTO `spare_part` (`id`, `photo`, `name`, `brand`, `price`, `category`, `stock`, `acquire`, ` Pay`, `balance`, `time`) VALUES
(01, '81.jpg', 'คีบอร์ด', 'X1', '500.00', ' 01', 3, 1, 0, 5, '2017-12-11 02:12:27'),
(02, 'link-cable-cat5e-10-1475490076-8901313-1b1bffb5fc324a5ea6da3ebc9f6314ab-product.jpg', 'สายแลน', 'amp', '150.00', '3', 6, 5, 0, 6, '2017-11-29 07:58:06'),
(03, 'images.jpg', 'เม้าส์', ' Gaming G300S  ', '530.00', '1', 1, 5, 0, 5, '2017-12-11 03:26:41'),
(04, '81.jpg', 'ASD', 'X1', '333.00', ' 02', 2, 5, 0, 2, '2017-12-04 02:35:10'),
(05, 'link-cable-cat5e-10-1475490076-8901313-1b1bffb5fc324a5ea6da3ebc9f6314ab-product.jpg', 'sdf', 'X1', '200.00', ' 3', 3, 1, 0, 3, '2017-12-11 02:15:26'),
(06, 'draw-23-128.png', 'กระต่าย', '111111111111', '500.00', ' 03', 5, 5, 0, 0, '2017-12-11 02:14:38');

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
MODIFY `id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
