-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 16 ก.ค. 2010  น.
-- รุ่นของเซิร์ฟเวอร์: 5.1.41
-- รุ่นของ PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `hrstock`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_beg_master`
--

CREATE TABLE IF NOT EXISTS `stock_tb_beg_master` (
  `nobeg` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `begno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `datedo` date NOT NULL,
  `datebeg` date NOT NULL,
  `datebegtotal` date NOT NULL,
  `iduser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `statusbeg` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nobeg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `stock_tb_beg_master`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_beg_master_sub`
--

CREATE TABLE IF NOT EXISTS `stock_tb_beg_master_sub` (
  `nobegsub` int(11) NOT NULL AUTO_INCREMENT,
  `nobeg` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kindtypeid` int(11) NOT NULL,
  `forbeg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `beg` int(11) NOT NULL,
  `receive` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nobegsub`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3394 ;

--
-- dump ตาราง `stock_tb_beg_master_sub`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_kind`
--

CREATE TABLE IF NOT EXISTS `stock_tb_kind` (
  `kindid` int(11) NOT NULL AUTO_INCREMENT,
  `kindname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kindid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- dump ตาราง `stock_tb_kind`
--

INSERT INTO `stock_tb_kind` (`kindid`, `kindname`) VALUES
(11, 'ปากกา'),
(9, 'กระดาษ'),
(12, 'ดินสอ'),
(13, 'เทปกาว'),
(27, 'ใบมีด'),
(22, 'สมุด'),
(23, 'หมึกเติม'),
(24, 'บิล'),
(25, 'ยางลบ'),
(26, 'หมึกปริ้น'),
(20, 'ลิควิด (สำหรับสำนักงานเท่านั้นค่ะ)'),
(28, 'ลูกเเม็คเย็บกระดาษ (สำหรับสำนักงานเท่านั้นค่ะ)'),
(29, 'ตัวหนีบ (สำหรับสำนักงานเท่านั้นค่ะ)'),
(30, 'ถ่าน '),
(31, 'ไม้บรรทัด'),
(32, 'แผ่นเคลือบ (สำหรับสำนักงานเท่านั้นค่ะ)'),
(33, 'ไม้กวาด'),
(34, 'กระดาษชำระ'),
(35, 'ฟองน้ำล้างจาน'),
(36, 'ดับกลิ่น'),
(37, 'เครื่องดื่ม'),
(38, 'อุปกรณ์คอมพิวเตอร์ (สำหรับ ITเท่านั้นค่ะ)'),
(39, 'น้ำยาทำความสะอาด'),
(40, 'ของทั่วไป'),
(41, 'สติ๊กเกอร์ Tega');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_kind_type`
--

CREATE TABLE IF NOT EXISTS `stock_tb_kind_type` (
  `kindtypeid` int(11) NOT NULL AUTO_INCREMENT,
  `kindid` int(11) NOT NULL,
  `kindtypename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unitid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kindtypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=134 ;

--
-- dump ตาราง `stock_tb_kind_type`
--

INSERT INTO `stock_tb_kind_type` (`kindtypeid`, `kindid`, `kindtypename`, `unitid`) VALUES
(6, 11, 'ปากกาน้ำเงิน', '02'),
(13, 9, 'กระดาษแข็งสีชมพู', '04'),
(7, 11, 'ปากกาดำ', '02'),
(8, 11, 'ปากกาแดง', '02'),
(9, 11, 'ปากกาไวท์บอร์ดสีน้ำเงิน', '02'),
(10, 11, 'ปากกาไวท์บอร์ดสีแดง', '02'),
(11, 9, 'กระดาษ A4', '10'),
(12, 9, 'กระดาษแข็งสีเขียว', '04'),
(14, 9, 'กระดาษแข็งสีขาว', '04'),
(15, 11, 'ปากกาไวท์บอร์ดสีดำ', '02'),
(16, 11, 'ปากกาเคมีสีน้ำเงิน 2หัว', '02'),
(17, 11, 'ปากกาเคมีสีแดง 2หัว', '02'),
(18, 11, 'ปากกาเคมีสีดำ 2หัว', '02'),
(19, 11, 'ปากกาเมจิสีดำ', '02'),
(20, 11, 'ปากกาเมจิสีแดง', '02'),
(21, 11, 'ปากกาเมจิสีน้ำเงิน', '02'),
(22, 12, 'ดินสอดำ', '05'),
(23, 13, 'เทปใสม้วนเล็ก 1/2"', '06'),
(24, 13, 'เทปใสม้วนใหญ่ 1/2"', '06'),
(131, 24, 'บิลเบิกยืมจักร', '01'),
(26, 13, 'เทปใสม้วนใหญ่ 3/4"', '06'),
(27, 22, 'สมุดปกอ่อน', '01'),
(28, 22, 'สมุดปกแข็ง', '01'),
(83, 22, 'สมุดปกแข็ง-ปกสีน้ำเงิน', '01'),
(30, 24, 'บิลจ่ายงานนอก', '01'),
(31, 24, 'บิลยอดผลผลิตออก(ไลน์โหล)', '01'),
(32, 23, 'หมึกเติมปากกาเคมีสีน้ำเงิน', '08'),
(33, 23, 'หมึกเติมปากกาเคมีสีแดง', '08'),
(34, 23, 'หมึกเติมปากกาเคมีสีดำ', '08'),
(35, 23, 'หมึกเติมปากกาไวท์บอร์ดสีน้ำเงิน', '08'),
(36, 23, 'หมึกเติมปากกาไวท์บอร์ดสีดำ', '08'),
(37, 23, 'หมึกเติมปากกาไวท์บอร์ดสีแดง', '08'),
(38, 13, 'เทปกาว 2หน้าเเบบบาง', '06'),
(39, 13, 'เทปกาว 2หน้าเเบบโฟม', '06'),
(40, 13, 'เทปกาว OPP', '06'),
(41, 25, 'ยางลบดินสอ', '13'),
(42, 25, 'ยางลบปากกา', '13'),
(43, 13, 'กาวแท่ง', '05'),
(44, 26, '12A', '07'),
(45, 26, '35A', '07'),
(46, 26, '49A', '07'),
(47, 26, 'LQ-1170', '07'),
(48, 27, 'ใบมีด ขนาดเล็ก A-100', '14'),
(49, 27, 'ใบมีด ขนาดใหญ่ A-150', '14'),
(50, 28, 'ลูกแม็ค ขนาด-NO.10', '07'),
(51, 28, 'ลูกเเม็ค ขนาด-NO.35', '07'),
(52, 29, 'ตัวหนีบสีดำ 2ขา', '12'),
(53, 29, 'ลวดหนีบกระดาษ', '07'),
(54, 30, 'ถ่านนาฬิกา', '13'),
(55, 30, 'ถ่านรีโมท์แอร์', '13'),
(56, 31, 'ไม้บรรทัดอ่อน', '09'),
(57, 32, 'แ่ผ่นเคลือบ A4', '04'),
(58, 33, 'ไม้กวาดอ่อน', '02'),
(59, 33, 'ไม้กวาดแข็ง', '02'),
(60, 33, 'ไม้กวาดยักใย่', '02'),
(61, 34, 'กระดาษชำระ', '06'),
(62, 35, 'เเบบตาข่าย', '09'),
(63, 35, 'แบบฝอยสแตนเลส', '09'),
(64, 35, 'แบบบางสีเขียว', '09'),
(65, 36, 'สเปรย์ฉีด', '08'),
(66, 36, 'ลูกเหม็น', '15'),
(67, 33, 'แปรงขัดโถส้วม', '02'),
(68, 33, 'แปรงขัดพื้นด้ามยาว', '02'),
(69, 33, 'ไม้กรีดกระจก', '02'),
(70, 33, 'ไม้ถูพื้น', '02'),
(71, 9, 'กระดาษแข็งสีฟ้า', '04'),
(82, 20, 'น้ำเติมลิคลิด', '08'),
(81, 20, 'ลิคลิด', '08'),
(74, 23, 'หมึกเติมแท่นประทับตราสีน้ำเงิน', '08'),
(75, 23, 'หมึกเติมแท่นประทับตราสีแดง', '08'),
(76, 23, 'หมึกเติมแท่นประทับตราสีดำ', '08'),
(77, 37, 'กาแฟ', '15'),
(78, 37, 'คอฟฟี่เมต', '15'),
(79, 37, 'ชาซอง', '07'),
(80, 37, 'ชาไหว้ศาล', '07'),
(84, 24, 'บิลนำของออกนอกบริษัท', '01'),
(85, 26, 'หมึกเครื่องถ่ายเอกสาร', '07'),
(86, 27, 'มีดเหลาดินสอ', '14'),
(87, 38, 'เมาส์', '09'),
(88, 38, 'คีย์บอร์ด', '09'),
(89, 38, 'แผ่น CD เปล่า', '04'),
(90, 39, 'น้ำยากัดสนิม', '16'),
(91, 39, 'น้ำยาล้างจาน', '16'),
(92, 39, 'น้ำยาถูพื้น', '16'),
(93, 39, 'น้ำยาดับกลิ่นฆ่าเชื้อ', '16'),
(94, 39, 'ผงซักฟอก', '07'),
(95, 39, 'สบู่ล้างมือ', '16'),
(96, 13, 'กาวลาเท็กซ์', '08'),
(97, 32, 'แ่ผ่นเคลือบบัตร 65x95mm.250micron', '04'),
(98, 32, 'แ่ผ่นเคลือบบัตร 75x100mm.250micron', '04'),
(99, 13, 'เทปกาวย่น-หนังไก่', '06'),
(100, 37, 'น้ำตาล', '17'),
(101, 26, 'hp-21', '18'),
(102, 26, 'หมึกเติมhp21-สีดำ', '08'),
(103, 26, 'หมึกเติมhp21-สีแดง', '08'),
(104, 26, 'หมึกเติมhp21-สีเหลือง', '08'),
(105, 26, 'หมึกเติมhp21-สีน้ำเงิน', '08'),
(106, 9, 'กระดาษแฟ็กซ์', '06'),
(107, 9, 'กระดาษต่อเนื่อง 9x11 1ชั้น', '07'),
(108, 9, 'กระดาษต่อเนื่อง 9x5.5 3ชั้น', '07'),
(109, 9, 'กระดาษต่อเนื่อง 9x11 2ชั้น', '07'),
(110, 9, 'กระดาษต่อเนื่อง 9x11 3ชั้น', '07'),
(111, 40, 'ลิ้นแฟ้ม', '09'),
(112, 40, 'ที่เจาะรูกระดาษ/เล็ก', '09'),
(113, 40, 'สติ๊กเกอร์ตาไก่', '07'),
(114, 39, 'ถุงมือสีส้ม', '19'),
(115, 32, 'แผ่นใสสำหรับเขียน', '04'),
(116, 40, 'เชือกฟางสีแดง', '06'),
(117, 37, 'น้ำดื่มลูกค้า', '07'),
(118, 32, 'ซองใสใส่เอกสาร', '04'),
(119, 40, 'แอลกอฮอล(สำหรับแผนก Packเท่านั้นค่ะ)', '08'),
(120, 9, 'กระดาษใบ Memo ใบใหญ่', '04'),
(121, 9, 'กระดาษใบ Memo ใบเล็ก', '04'),
(122, 9, 'กระดาษต่อเนื่อง 9x5.5 1ชั้น', '07'),
(123, 24, 'บิลเบิกวัสดุอุปกรณ์/สโตร์แพ็ค', '01'),
(130, 40, 'ไดโมยิงทรัพย์สิน', '06'),
(125, 30, 'ถ่านนาฬิกาจับเวลา', '13'),
(126, 41, 'แบบ 3แถว/รุ่น15,000ดวง                            ', '06'),
(127, 41, 'แบบ 2แถว', '06'),
(128, 41, 'แบบ 3แถวแบ่งครึ่ง', '06'),
(129, 41, 'Ribbon', '06'),
(132, 41, 'แบบ 3แถว/รุ่น5,000ดวง', '06'),
(133, 41, 'แบบ 3แถว/รุ่น10,000ดวง', '06');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_module`
--

CREATE TABLE IF NOT EXISTS `stock_tb_module` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `typeuser` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- dump ตาราง `stock_tb_module`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_receive_master`
--

CREATE TABLE IF NOT EXISTS `stock_tb_receive_master` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `po` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datedo` date NOT NULL,
  `datereceive` date NOT NULL,
  `iduser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `supplierid` int(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=176 ;

--
-- dump ตาราง `stock_tb_receive_master`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_receive_master_sub`
--

CREATE TABLE IF NOT EXISTS `stock_tb_receive_master_sub` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `kindtypeid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=440 ;

--
-- dump ตาราง `stock_tb_receive_master_sub`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_supplier`
--

CREATE TABLE IF NOT EXISTS `stock_tb_supplier` (
  `supplierid` int(11) NOT NULL AUTO_INCREMENT,
  `suppliername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`supplierid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- dump ตาราง `stock_tb_supplier`
--

INSERT INTO `stock_tb_supplier` (`supplierid`, `suppliername`, `addr`, `tel`, `contact`) VALUES
(1, 'แผนกบุคคล ฝ่ายจัดซื้อ', 'มหาชัย', '1415,4101', 'คุณปลา'),
(2, 'ฝ่ายจัดซื้อโรงงาน', 'บางบอน', '', 'คุณมอญ'),
(3, 'ฝ่ายจัดซื้อ มหาชัยอาหารไทย', 'มหาชัย', '8109', 'คุณนุช');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_type`
--

CREATE TABLE IF NOT EXISTS `stock_tb_type` (
  `typeuser` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `typeusername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`typeuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `stock_tb_type`
--

INSERT INTO `stock_tb_type` (`typeuser`, `typeusername`) VALUES
('01', 'ผู้ดูแลระบบ'),
('02', 'เจ้าหน้าที่'),
('03', 'ผู้ใช้ทั่วไป');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_type_user`
--

CREATE TABLE IF NOT EXISTS `stock_tb_type_user` (
  `typeuser` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `typeusername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`typeuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `stock_tb_type_user`
--

INSERT INTO `stock_tb_type_user` (`typeuser`, `typeusername`) VALUES
('01', 'ผู้ดูแลระบบ'),
('02', 'เจ้าหน้าที่บุคคล'),
('03', 'ผู้ใช้งานทั่วไป');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `stock_tb_unit`
--

CREATE TABLE IF NOT EXISTS `stock_tb_unit` (
  `unitid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `unitname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`unitid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `stock_tb_unit`
--

INSERT INTO `stock_tb_unit` (`unitid`, `unitname`) VALUES
('02', 'ด้าม'),
('01', 'เล่ม'),
('03', 'โหล'),
('04', 'แผ่น'),
('05', 'แท่ง'),
('06', 'ม้วน'),
('07', 'กล่อง'),
('08', 'ขวด'),
('09', 'อัน'),
('10', 'รีม'),
('11', 'เครื่อง'),
('12', 'ตัว'),
('13', 'ก้อน'),
('14', 'ใบ'),
('15', 'ถุง'),
('16', 'แกลลอน'),
('17', 'kg'),
('18', 'ตลับ'),
('19', 'คู่');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_chat`
--

CREATE TABLE IF NOT EXISTS `tb_chat` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `datefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ipuser` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userby` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=165 ;

--
-- dump ตาราง `tb_chat`
--

INSERT INTO `tb_chat` (`no`, `subject`, `datefix`, `timefix`, `ipuser`, `userby`) VALUES
(164, 'จิตกรใช้อารมณ์ผสมสี<br>นักดนตรี ใช้อารมณ์ผสมเสียง<br>นักร้องใช้อารมณ์ผสมสำเนียง<br>นอนบนเตียง ใช้อารมณ์ ผสมพันธุ์ \n :D', '10-14-2009', '11:14:38', '192.168.1.45', 'M-6144'),
(163, 'ภาษาเวียดนามวันนี้ขอเสนอ<br>น้ำกาม แปลว่า น้ำส้ม<br>เช่น วันนี้อากาศร้อนจัง ได้ซดน้ำกามสักแก้ว คงสดชื่นน่าดู', '10-14-2009', '11:03:44', '192.168.1.45', 'M-6144'),
(162, 'วิธีแก้ง่วงที่ดีที่สุด คือ หลับ  ^<^', '10-14-2009', '11:00:00', '192.168.1.45', 'M-6144'),
(161, 'บนไลน์ไม่มีกระดาษใช้สักเเผ่นเลยลงงานบ่อยต้องใช้กระดาษถ่ายเอกสารกรดาษรีไซร์เคิลก็ไม่มีไม่รู้ว่าจะเอาอะไรถ่ายให้เขาถ้าไม่มีอะไรถ่ายให้เขา  เขาก็าบ่นว่าเราทำงานช้าขอเบิกปเเล้วก็ไม่รู้ว่าจะได้หรือเปล่าหรือจะมีใครเห็นใจจะให้ยืมก่อนหรือเปล่า....โธ่...โธ่่.....ไพลอตจงเจริญ -:-', '09-30-2009', '14:53:04', '192.168.1.91', 'M7248'),
(159, ' T-T', '09-30-2009', '11:02:02', '192.168.1.45', 'M-6144'),
(160, 'พี่โอ๋ บุคคล สามารถเพิ่มข่าวได้แล้วครับ  -o-', '09-30-2009', '11:20:20', '192.168.1.45', 'M-6144'),
(158, 'ยู/ยังคลิกไม่ได้เลย :D', '09-30-2009', '10:43:38', '192.168.1.52', 'M-3119'),
(157, 'พี่รุ่ง / ลองใช้หน้ารายงาน ตรวจสอบประวัติการจ่ายวัสดุทีนะครับ ว่า มันคลิกเปิด ปิดได้หรือเปล่า  :D', '09-30-2009', '10:27:22', '192.168.1.45', 'M-6144'),
(156, 'พรุ่งนี้ 30 ก.ย. 52 เวลา 16.00 น.ขอเชิญคณะกรรมการสวัสดิการฯ ประชุมที่ห้องบุคคล หลังห้องบุคคล( อาคาร 2 ) ด้วยนะค่ะ', '09-29-2009', '16:13:35', '192.168.1.40', 'M-5143'),
(155, 'กรณีเบิกของด่วน!!\nให้เบิกเฉพาะหมึกปริ๊นอย่างเดียวนะคะ O-O', '09-29-2009', '14:32:25', '192.168.1.52', 'M-3119'),
(154, 'ถ้าสมุดปกเเ้ข็งเเละผงซักฟอกมีให้เบิกก็เเจ้งหน่อยนะครับเพราะพี่อ้อยต้องการใช้สมุดปกเเข็งเล่มใหญ่สำหรับลงยองานของพี่อ้อยเเละผงซักฟอกด้วยบนไลน์ต้องซักผ้าที่เปื้อนเเต่ไม่มีผงซักฟอกซักเลย -o-', '09-29-2009', '13:56:01', '192.168.1.91', 'M7248'),
(153, 'ดินสอสีจุุดงานก็เบิกที่แผนกช่างจักรนะ -o-', '09-29-2009', '10:59:02', '192.168.1.52', 'M-3119'),
(152, 'เอ๋/แผนกตัด**รายการของที่เบิกวันนี้ที่พี่ไม่ได้อนุมัติ **ของหมดค่ะถ้ามีจะเเจ้งอีกครั้งนะคะ 555', '09-29-2009', '10:55:16', '192.168.1.52', 'M-3119'),
(151, 'ในไลน์ต้องการใช้ดินสอสีสำหรับจุดตำเเหน่งงานไม่รู้ว่าจะขอเบิกได้ที่ใหน', '09-29-2009', '10:15:30', '192.168.1.61', 'M7248'),
(149, 'ขอจองห้องอบรมหลังห้องบุคคล(อาคาร 2 ) ในวันที่ 29และ 30 ก.ย. 52 เวลา 16.00 น.เป็นต้นไป O-O', '09-29-2009', '08:21:32', '192.168.1.40', 'M-5143'),
(150, 'น้องกุล/กระแข็งสีฟ้าหมดค่ะ', '09-29-2009', '10:00:29', '192.168.1.52', 'M-3119'),
(148, 'ถุงใส่ขยะทางแม่บ้านจะใส่ให้หลังไลน์ทุกไลน์นะ ส่วนเศษผ้าก็ขึ้นอยู่กับเเต่ละไลน์จะเวียนเอาถุงเก่ามาใช้เองค่ะไม่มีให้เบิกนะคะ O-O', '09-28-2009', '12:45:32', '192.168.1.52', 'M-3119'),
(145, 'เเล้วเล่มเล็กหละครับพอมีใหม', '09-25-2009', '09:03:49', '192.168.1.91', 'M7248'),
(146, 'มีแบบบาง 28แผ่นค่ะ ^<^', '09-25-2009', '10:23:55', '192.168.1.52', 'M-3119'),
(147, 'พี่รุ่งถ้าจะเบิกถุงใส่ขยะพวกเศษผ้าที่อยู่ในรายเย็บต้องเบิกกับใครหรอค่ะ -_- -_-', '09-28-2009', '10:00:11', '192.168.1.91', 'M6874'),
(144, 'สมุดหมดค่ะ\nถ้ามีจะแจ้งอีกครั้งนะ', '09-25-2009', '08:39:22', '192.168.1.52', 'M-3119'),
(143, 'ตอบด่วน..........................พี่รุ่งครับ....พี่อ้อย E จะใช้สมุดปกเเข็งเล่มใหญ่มีของให้เบิกใหมครับ', '09-25-2009', '07:56:55', '192.168.1.91', 'M7248'),
(142, 'ดูสถานะการเบิกของว่าได้เท่าไหร่ ไม่ได้เท่าไหร่ อันไหน อนุมัติ ไม่อนุมัติ ให้ดูที่ รายการที่ขอเบิก ครับ  :-)', '09-24-2009', '15:05:23', '192.168.1.45', 'M-6144'),
(141, 'พรุ่งนี้ ( 25/9/52 ) เวลา 17.00 น. อย่าลืมไปให้กำลังใจนักกีฬาฟุตซอลของเราที่สนามฯ ', '09-24-2009', '11:21:15', '192.168.1.40', 'M-5143'),
(138, ' :-)', '09-22-2009', '17:04:35', '192.168.1.45', 'M-6144'),
(139, ' -:-', '09-22-2009', '17:06:02', '192.168.1.45', 'M-6144'),
(140, 'เเจ้งให้ทราบค่ะ....ก่อนมารับของที่เบิกไว้กรุณาตรวจสอบด้วยว่าอนุมัตไปจำนวนเท่าไหร่จะได้ไม่ งงๆๆ เวลามารับของค่ะ 555', '09-24-2009', '11:05:20', '192.168.1.52', 'M-3119'),
(137, ' -o- -o- -o-', '09-22-2009', '17:04:32', '192.168.1.45', 'M-6144'),
(133, 'ใช่...เห็นด้วยค่ะ :@', '09-21-2009', '11:13:34', '192.168.1.86', 'M-3119'),
(134, 'กาว 2หน้าแบบบาง มีให้เบิกแล้วค่ะ ^-^', '09-22-2009', '09:37:09', '192.168.1.86', 'M-3119'),
(135, ' :-)', '09-22-2009', '16:57:03', '192.168.1.45', 'M-6144'),
(136, ' T-T T-T T-T', '09-22-2009', '16:57:48', '192.168.1.45', 'M-6144'),
(132, 'ขอความร่วมมือ ฝากข้อความ เรื่อง งาน เท่านั้นนะครับ  ^-^', '09-21-2009', '10:54:36', '192.168.1.45', 'M-6144');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_department`
--

CREATE TABLE IF NOT EXISTS `tb_department` (
  `depid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `depname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`depid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_department`
--

INSERT INTO `tb_department` (`depid`, `depname`, `fid`) VALUES
('IT02', 'เทคโนโลยีสารสนเทศ', 'HR02');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_faction`
--

CREATE TABLE IF NOT EXISTS `tb_faction` (
  `fid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_faction`
--

INSERT INTO `tb_faction` (`fid`, `fname`, `facid`) VALUES
('HR02', 'ฝ่ายบุคคลและธุรการ', 'PL02');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_factory`
--

CREATE TABLE IF NOT EXISTS `tb_factory` (
  `facid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `facname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`facid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_factory`
--

INSERT INTO `tb_factory` (`facid`, `facname`) VALUES
('PL02', 'บ. คาราเมลกิ้ว ๆ จำกัด');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_jobstatus`
--

CREATE TABLE IF NOT EXISTS `tb_jobstatus` (
  `statusjob` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `statusjobname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`statusjob`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_jobstatus`
--

INSERT INTO `tb_jobstatus` (`statusjob`, `statusjobname`) VALUES
('01', 'เจ้าหน้าที่ยังไม่รับเรื่อง'),
('02', 'อยู่ในระหว่างดำเนินการซ่อม'),
('03', 'ซ่อมเสร็จเรียบร้อย'),
('04', 'ยกเลิกซ่อม');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_prefix`
--

CREATE TABLE IF NOT EXISTS `tb_prefix` (
  `prefixid` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `prefixnames` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prefixnamel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`prefixid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_prefix`
--

INSERT INTO `tb_prefix` (`prefixid`, `prefixnames`, `prefixnamel`) VALUES
('01', 'นาย', 'นาย'),
('02', 'น.ส.', 'นางสาว'),
('03', 'นาง', 'นาง'),
('04', 'ว่าที่ ร.ต', 'ว่าที่ร้อยตรี');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_type`
--

CREATE TABLE IF NOT EXISTS `tb_type` (
  `statususer` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `statusname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`statususer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tb_type`
--

INSERT INTO `tb_type` (`statususer`, `statusname`) VALUES
('01', 'ผู้ดูแลระบบ'),
('02', 'ผู้ใช้งานทั่วไป'),
('03', 'ช่างซ่อมฯ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `iduser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prefixid` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nameuser` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwfix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `depid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `statusUser` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `prefixid`, `nameuser`, `surname`, `username`, `pw`, `pwfix`, `depid`, `statusUser`, `avatar`) VALUES
('M-6144', '01', 'บัณฑิต', 'แสนคำภา        ', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'IT02', '01', 'baby.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
