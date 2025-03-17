-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 03:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avalons_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(255) NOT NULL COMMENT 'ไอดี',
  `emp_fullname` varchar(100) NOT NULL COMMENT 'ชื่อพนักงาน',
  `emp_user` varchar(100) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `emp_password` varchar(100) NOT NULL COMMENT 'รหัสเข้าสู่ระบบ',
  `emp_administrator` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'พนักงาน 0, ผู้ดูแลระบบ 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_fullname`, `emp_user`, `emp_password`, `emp_administrator`) VALUES
(1, 'นายธีรภัทร สีม่วงงาม', 't@gmail.com', '12345', '0'),
(2, 'วัชราภรณ์', 'admin', '1234', '1'),
(147, 'Bell', 'test@gmail.com', '98765', '0'),
(148, 'ทดสอบ', 'admin@gmail.com', '12345', '0'),
(149, 'นายธีรภัทร2 สีม่วงงาม2', 'admin2@gmail.com', '12345', '1'),
(150, 'นายธีรภัทร สีม่วงงาม', 'teerapat_@gmail.com', '12345', '0'),
(151, 'นายธีรภัทร สีม่วงงาม3', 'teerapat3_@gmail.com', '12345', '1'),
(152, 'นายธีรภัทร สีม่วงงาม3', 'teerapa3t_@gmail.com', '12345', '0'),
(153, 'test', 'test', '1234', '1'),
(154, 'ศุภกิจ', 'bell', '12345', '0'),
(155, 'รัฐทชัย', 'cross', '12345', '0'),
(156, 'เบล', 'admin', '6789', '1'),
(157, 'รัฐทชัย บุญสุข', 'cross', '1234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pro_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `img` text NOT NULL,
  `pro_price` int(100) NOT NULL COMMENT 'ราคาสินค้า',
  `pro_qty` int(100) NOT NULL COMMENT 'จำนวนคงเหลือ',
  `pro_size_id` int(10) DEFAULT NULL COMMENT 'ขนาดไซส์',
  `pro_cate_id` int(10) NOT NULL COMMENT 'หมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`pro_id`, `pro_name`, `img`, `pro_price`, `pro_qty`, `pro_size_id`, `pro_cate_id`) VALUES
(0004, 'อเมริกาโน่ส้ม', 'tu.jpg', 45, 0, 2, 0),
(0007, 'โกโก้', 'ai.jpg', 40, 501, 3, 3),
(0008, 'อเมริกาโน่ส้ม', '', 45, 0, 2, 0),
(0009, 'นมชมพู', '', 45, 0, 3, 0),
(0010, 'นมชมพู', '', 40, 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_categories`
--

CREATE TABLE `tbl_products_categories` (
  `cate_id` int(10) NOT NULL COMMENT 'ไอดีหมวดหมู่',
  `cate_name` varchar(100) NOT NULL COMMENT 'ชื่อหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products_categories`
--

INSERT INTO `tbl_products_categories` (`cate_id`, `cate_name`) VALUES
(1, 'เสื้อ'),
(2, 'กางเกง'),
(3, 'รองเท้า'),
(4, 'อื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_sizes`
--

CREATE TABLE `tbl_products_sizes` (
  `size_id` int(10) NOT NULL COMMENT 'ไอดีไซส์',
  `size_name` varchar(100) NOT NULL COMMENT 'ชื่อไซส์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products_sizes`
--

INSERT INTO `tbl_products_sizes` (`size_id`, `size_name`) VALUES
(2, 'กาแฟ'),
(3, 'นม'),
(4, 'ชา'),
(5, 'โซดา');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_class`
--

CREATE TABLE `tbl_student_class` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_student_class`
--

INSERT INTO `tbl_student_class` (`class_id`, `class_name`) VALUES
(1, 'การจัดการ'),
(2, 'การจัดการทรัพยากรมนุษย์และองค์การ'),
(3, 'การจัดการเทคโนโลยีสารสนเทศทางธุรกิจ'),
(4, 'ธุรกิจการค้าสมัยใหม่'),
(5, 'การบัญชี'),
(6, 'นิเทศศาสตร์'),
(7, 'การท่องเที่ยวและบริการยุคดิจิทัล'),
(8, 'การจัดการการท่องเที่ยวระหว่างประเทศ'),
(9, 'เศรษฐศาสตร์ธุรกิจและภาครัฐ'),
(10, 'การตลาดเชิงสร้างสรรค์และดิจิทัล');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userorders`
--

CREATE TABLE `tbl_userorders` (
  `uorder_id` bigint(120) NOT NULL COMMENT 'ไอดี',
  `uorder_emp_id` int(10) NOT NULL COMMENT 'พนักงานบันทึกข้อมูล',
  `uorder_prefix` enum('1','2','3') DEFAULT NULL COMMENT 'คำนำหน้า\r\n1, นาย\r\n2, นาง\r\n3, นางสาว',
  `uorder_fname` varchar(100) DEFAULT NULL COMMENT 'ชื่อผู้สั่งซื้อ',
  `uorder_lname` varchar(100) DEFAULT NULL COMMENT 'นามสกุลผู้สั่งซื้อ',
  `uorder_idstudent` varchar(20) DEFAULT NULL COMMENT 'รหัสนักศึกษา',
  `uorder_class_id` int(10) DEFAULT NULL COMMENT 'ระดับชั้น',
  `uorder_phone` varchar(10) DEFAULT NULL COMMENT 'เบอร์โทรติดต่อ',
  `uorder_datetimeAt` datetime DEFAULT current_timestamp() COMMENT 'วันที่สั่งซื้อ',
  `uorder_datesend` date DEFAULT NULL COMMENT 'วันที่ออกใบสั่งซื้อ',
  `uorder_totalqty` int(100) DEFAULT NULL COMMENT 'รายการสินค้าทั้งหมด',
  `uorder_totalprice` int(100) DEFAULT NULL COMMENT 'ราคาที่ต้องชำระ',
  `uorder_status` enum('1','2','3','4','5') NOT NULL DEFAULT '1' COMMENT 'สถานะออเดอร์\r\n1, กำลังบันทึกข้อมูลส่วนนักศึกษา\r\n2, กำลังบันทึกข้อมูลส่วนใบเสร็จ\r\n3, กำลังดำเนินการเพิ่มสินค้า\r\n4, ดำเนินการเสร็จสิ้น\r\n5, ยกเลิกการสั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userorders`
--

INSERT INTO `tbl_userorders` (`uorder_id`, `uorder_emp_id`, `uorder_prefix`, `uorder_fname`, `uorder_lname`, `uorder_idstudent`, `uorder_class_id`, `uorder_phone`, `uorder_datetimeAt`, `uorder_datesend`, `uorder_totalqty`, `uorder_totalprice`, `uorder_status`) VALUES
(2024143313701, 1, '1', 'ธีรภัทร2', 'สีม่วงงาม2', '234432', 3, '0820312370', '2024-01-31 00:37:45', '2024-01-23', 2, 798, '4'),
(92024101305601, 1, '1', 'ธีรภัทร', 'สีม่วงงาม', '234432', 10, '0820312370', '2024-01-30 09:56:02', '2024-01-30', 4, 10390, '4'),
(202414758315801, 147, '1', 'ธีรภัทร3', 'สีม่วงงาม3', '234432', 7, '0820312370', '2024-01-31 00:59:00', '2024-01-30', 1, 1596, '5'),
(202515521271501, 155, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:15:24', NULL, 2, 125, '4'),
(202515542274501, 155, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:45:52', NULL, NULL, NULL, '1'),
(222024143014802, 1, '1', 'ธีรภัทร444', 'สีม่วงงาม444', '2344324', 5, '0820312374', '2024-02-01 22:48:47', '2024-02-01', 1, 788, '4'),
(232024144113102, 1, '1', 'ธีรภัทร222', 'สีม่วงงาม222', '222222', 7, '0820312372', '2024-02-11 23:32:42', '2024-02-10', 3, 8379, '4'),
(2202415024010102, 150, '1', 'ธีรภัทร', 'สีม่วงงาม', '123456', 10, '0820312370', '2024-02-01 02:11:14', '2024-01-29', 2, 1995, '4'),
(8202514751273801, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 08:38:55', NULL, 2, 85, '4'),
(9202514709273801, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 09:38:23', NULL, 2, 130, '4'),
(10202514717305901, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 10:59:23', NULL, 2, 85, '4'),
(11202514717300501, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 11:05:22', NULL, 1, 40, '4'),
(11202514725300201, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 11:02:32', NULL, NULL, NULL, '1'),
(11202514735300001, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 11:00:43', NULL, NULL, NULL, '1'),
(13202514701304201, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 13:42:04', NULL, NULL, NULL, '1'),
(13202514718302501, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 13:25:24', NULL, NULL, NULL, '1'),
(13202514724301201, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 13:12:31', NULL, NULL, NULL, '1'),
(13202514730304201, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 13:42:50', NULL, NULL, NULL, '1'),
(13202514756302501, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 13:26:02', NULL, NULL, NULL, '1'),
(14202514718300601, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 14:06:22', NULL, NULL, NULL, '1'),
(14202514723315301, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-31 14:53:29', NULL, NULL, NULL, '1'),
(14202514755300601, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-30 14:07:10', NULL, NULL, NULL, '1'),
(14202515554315001, 155, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-31 14:51:18', NULL, NULL, NULL, '1'),
(21202514729264701, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 21:48:14', '2025-01-23', 2, 85, '4'),
(21202514744264801, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 21:49:01', '2025-01-23', 1, 135, '4'),
(22202514706264101, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 22:41:18', '2025-01-23', 1, 90, '4'),
(22202514747265001, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 22:51:08', '2025-01-23', 2, 85, '4'),
(23202514715262401, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 23:24:32', NULL, NULL, NULL, '1'),
(23202514739262301, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 23:23:51', NULL, NULL, NULL, '1'),
(23202514743262501, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-26 23:26:02', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userorders_detail`
--

CREATE TABLE `tbl_userorders_detail` (
  `udetail_id` int(100) NOT NULL COMMENT 'ไอดี',
  `udetail_uorder_id` bigint(100) NOT NULL COMMENT 'เลขที่คำสั่งซื้อ',
  `udetail_pro_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `udetail_qty` int(100) NOT NULL DEFAULT 1 COMMENT 'จำนวนสั่งซื้อ',
  `udetail_price` int(100) NOT NULL COMMENT 'ราคาสินค้า',
  `udetail_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT 'สถานะสินค้าของนักศึกษา\r\n1, กำลังถูกจัดเตรียม\r\n2, ดำเนินการส่งถึงมือ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userorders_detail`
--

INSERT INTO `tbl_userorders_detail` (`udetail_id`, `udetail_uorder_id`, `udetail_pro_id`, `udetail_qty`, `udetail_price`, `udetail_status`) VALUES
(24, 92024101305601, 0001, 1, 399, '2'),
(25, 92024101305601, 0002, 2, 399, '2'),
(26, 92024101305601, 0003, 3, 399, '2'),
(27, 92024101305601, 0005, 4, 1999, '2'),
(30, 2024142315001, 0001, 2, 399, '2'),
(31, 2024142315001, 0001, 2, 399, '2'),
(32, 202414758315801, 0002, 4, 399, '2'),
(33, 2202415024010102, 0001, 2, 399, '2'),
(34, 2202415024010102, 0002, 3, 399, '2'),
(35, 222024143014802, 0007, 4, 197, '2'),
(36, 232024144113102, 0001, 16, 399, '2'),
(37, 232024144113102, 0003, 2, 399, '2'),
(38, 232024144113102, 0002, 3, 399, '2'),
(39, 21202514729264701, 0004, 1, 45, '2'),
(40, 21202514729264701, 0007, 1, 40, '2'),
(41, 21202514744264801, 0004, 3, 45, '2'),
(46, 22202514706264101, 0004, 2, 45, '2'),
(51, 22202514747265001, 0007, 1, 40, '2'),
(52, 22202514747265001, 0004, 1, 45, '2'),
(53, 202515521271501, 0004, 1, 45, '2'),
(54, 202515521271501, 0007, 2, 40, '2'),
(57, 8202514751273801, 0007, 1, 40, '2'),
(58, 8202514751273801, 0004, 1, 45, '2'),
(60, 9202514709273801, 0004, 2, 45, '2'),
(61, 9202514709273801, 0007, 1, 40, '2'),
(62, 10202514717305901, 0004, 1, 45, '2'),
(63, 10202514717305901, 0007, 1, 40, '2'),
(64, 11202514717300501, 0007, 1, 40, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_products_categories`
--
ALTER TABLE `tbl_products_categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `tbl_products_sizes`
--
ALTER TABLE `tbl_products_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_userorders`
--
ALTER TABLE `tbl_userorders`
  ADD PRIMARY KEY (`uorder_id`);

--
-- Indexes for table `tbl_userorders_detail`
--
ALTER TABLE `tbl_userorders_detail`
  ADD PRIMARY KEY (`udetail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `pro_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_products_categories`
--
ALTER TABLE `tbl_products_categories`
  MODIFY `cate_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีหมวดหมู่', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_products_sizes`
--
ALTER TABLE `tbl_products_sizes`
  MODIFY `size_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีไซส์', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_userorders_detail`
--
ALTER TABLE `tbl_userorders_detail`
  MODIFY `udetail_id` int(100) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
