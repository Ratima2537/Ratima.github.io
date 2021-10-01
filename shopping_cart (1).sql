-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 11:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `arrival`
--

CREATE TABLE `arrival` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_price` int(11) NOT NULL,
  `a_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arrival`
--

INSERT INTO `arrival` (`a_id`, `a_name`, `a_price`, `a_img`) VALUES
(1, 'SPIDERMAN Exclusive Edition', 39999, 'img/003.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(10) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_subtotal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`d_id`, `o_id`, `p_id`, `d_qty`, `d_subtotal`) VALUES
(31, 0, 1, 1, 25000),
(30, 0, 1, 1, 25000),
(29, 4, 1, 23, 575000),
(28, 2, 1, 23, 575000),
(27, 1, 2, 1, 29000),
(26, 1, 1, 15, 375000),
(25, 0, 2, 1, 29000),
(24, 0, 1, 15, 375000);

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `o_id` int(10) NOT NULL,
  `o_dttm` datetime NOT NULL,
  `o_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `o_addr` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `o_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `o_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `o_qty` int(11) NOT NULL,
  `o_total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`o_id`, `o_dttm`, `o_name`, `o_addr`, `o_email`, `o_phone`, `o_qty`, `o_total`) VALUES
(1, '2021-10-01 09:39:39', 'nontawat', 'asdasd', 'Ratima2537@hotmail.com', '0831111444', 0, 404000),
(2, '2021-10-01 09:40:17', 'nontawat', '123132', 'Kanjanapangka.best@gmail.com', '0831111444', 0, 575000),
(3, '2021-10-01 09:40:26', 'nontawat', '123132', 'Kanjanapangka.best@gmail.com', '0831111444', 0, 0),
(4, '2021-10-01 09:40:38', 'asd', 'asdasda', 'lukyimratima@gmail.com', '000000554', 0, 575000),
(5, '2021-10-01 09:40:47', 'asd', 'asdasda', 'lukyimratima@gmail.com', '000000554', 0, 575000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` float NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_detail` varchar(1500) NOT NULL,
  `p_spec` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_img`, `p_detail`, `p_spec`) VALUES
(1, 'PS4', 25000, 'img/001.PNG', 'PlayStation®4  มาพร้อมกับความจุขนาด 500GB หรือ 1TB พบกับเกมอันน่าทึ่งบน PS4 เกมความชัดระดับ 4K และความบันเทิงในภาพสีสันสดใสแบบ HDR1', ' ชื่อผลิตภัณฑ์ PlayStation®4. รหัสผลิตภัณฑ์ ซีรีส์ CUH-2000. ตัวประมวลผลหลัก ตัวประมวลผลที่ปรับแต่งเองได้แบบชิปเดียว CPU: x86-64 AMD “Jaguar”, 8 cores. หน่วยความจำ GDDR5 8GB. พื้นที่จัดเก็บ* 500GB, 1TB. ขนาดภายนอก ประมาณ 265×39×288 มม. (กว้าง × สูง × ยาว)'),
(2, 'PS5', 29000, 'img/002.PNG', 'Sony PlayStation 5 Standard แบรนด์: SONY SKU: 4948872415019 ความเร็วดุจสายฟ้า ใช้ประโยชน์จากขุมพลัง CPU, GPU และ SDD แบบเฉพาะ พร้อม Integrated I/O ที่จะกำหนดกฎเกณฑ์ใหม่ที่คอนโซล PlayStation สามารถทำได้, SSD ความเร็วสูงโหลดเกมส์ ได้รวดเร็ว', 'คุณสมบัติสินค้า Type:PlsyStation 5/Model:CFI-1018A 01/Processor Type:CPU: x86-64-AMD Ryzen Zen2, 8 cores/16 threads/Memory:GDDR6 16 GB/Storage:825 GB Custom SSD/Connectivity:HDMI/bd dvd drive:Yes/Battery Capacity:N/A/Dimensions W x D x H:10.4 x 26.0 x 39.0 cm./Weight:4.5 Kg./Color:White and Black/Warranty 1 Year warranty (local warranty)/Option:N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arrival`
--
ALTER TABLE `arrival`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrival`
--
ALTER TABLE `arrival`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
