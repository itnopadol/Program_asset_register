-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 10:57 AM
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
`take_id` tinyint(4) unsigned zerofill NOT NULL,
  `id_inventory` tinyint(2) unsigned zerofill NOT NULL,
  `take_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `take_brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `take_pice` decimal(8,2) NOT NULL,
  `take_category` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `take_acquire` tinyint(1) NOT NULL,
  `take_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
MODIFY `take_id` tinyint(4) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
