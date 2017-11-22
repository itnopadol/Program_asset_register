-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 09:14 AM
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
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
`rent_id` tinyint(2) unsigned zerofill NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `acquire` tinyint(1) NOT NULL,
  `paying` int(1) NOT NULL,
  `balance` tinyint(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `name`, `brand`, `price`, `stock`, `acquire`, `paying`, `balance`) VALUES
(01, 'คีบอร์ด', 'X1', '500.00', 1, 0, 0, 0),
(02, 'สายแลน', 'amp', '150.00', 5, 0, 0, 0),
(03, 'เม้าส์', ' Gaming G300S  ', '530.00', 2, 0, 0, 0),
(04, 'sdf', 'X1', '500.00', 2, 0, 0, 0),
(05, 'sdf', 'X1', '500.00', 2, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
 ADD PRIMARY KEY (`rent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
MODIFY `rent_id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
