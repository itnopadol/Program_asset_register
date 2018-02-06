-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 10:16 AM
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
(15, 'root', 'Susi', '500.00', 5, 3, 0, 0),
(16, 'Ram', 'Lenovo', '200.00', 1, 1, 0, 0),
(17, '', '', '0.00', 0, 5, 0, 0);

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
  MODIFY `rent_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
