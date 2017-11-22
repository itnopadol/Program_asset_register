-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 09:15 AM
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
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
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
('N0005', 'YPEER', 'น้องบิ๊กเอ็ม', 'แผนก IT', '092726253');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`Emp_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
