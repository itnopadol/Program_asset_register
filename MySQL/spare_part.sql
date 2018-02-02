-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 08:49 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spare_part`
--

INSERT INTO `spare_part` (`id`, `photo`, `name`, `brand`, `price`, `category`, `stock`, `acquire`, `pay`, `balance`, `time`) VALUES
(019, 'le.png', 'คีบอร์ดด', '111111111111', '500.00', ' 01', 2, 1, 1, -1, '0000-00-00'),
(020, '27073252_1618193011563581_6725749658834367060_n.jpg', 'คีบอร์ด', 'BENQ', '120.00', ' 01', 9, 5, 0, 9, '0000-00-00'),
(006, 'link-cat5e-10-m-white-1483941012-7590801-aba4535b8261c8e2d65da5dd5929a1fd-product.jpg', 'สายแลน', '11111', '500.00', ' 03', 13, 5, 1, 13, '0000-00-00'),
(007, 'if_Avatar_Famous_Characters-11_2612543.png', 'คีบอร์ด', 'POO', '1500.00', ' 01', 4, 1, 0, 4, '0000-00-00'),
(008, '4004093.jpg', 'เมาส์', 'Genius ', '120.00', ' 02', 3, 1, 0, 3, '0000-00-00'),
(009, 'aHR0cHM6Ly9zLmlzYW5vb2suY29tL2hpLzAvdWQvMjgyLzE0MTMxODEvc3VyZmFjZS1tb3VzZS1zdG9yZS5qcGc=.jpg', 'เมาส์เกมมิ้ง', 'ZIRCON ', '220.00', ' 02', 4, 3, 0, 4, '0000-00-00'),
(010, 'zn.jpg', 'สายแลน', 'AAA ', '120.00', ' 03', 1, 0, 0, 1, '0000-00-00'),
(012, 'สานแลน-UTP-04-01.jpg', 'สายแลนดำขึลึ', 'LNWZA', '120.00', ' 03', 5, 0, 0, 5, '0000-00-00'),
(014, '3930134.jpg', 'เมาส์', 'rezer', '500.00', ' 02', 2, 0, 0, 2, '0000-00-00'),
(015, 'สายแลน CAT 5E HISATTEL 305ม_ สีขาว (ภายใน) 3.jpg', 'สายแลนขั้นเทพ', 'amp', '120.00', ' 03', 3, 1, 0, 3, '0000-00-00');

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
MODIFY `id` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
