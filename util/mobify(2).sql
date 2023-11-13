-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 08:02 AM
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
-- Database: `mobify`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
(11, 'Apple'),
(12, 'Samsung'),
(13, 'Realme'),
(14, 'Redmi'),
(15, 'Poco');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `buy_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `buy_qty`) VALUES
(5, 2, 2),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(50) NOT NULL,
  `c_add` varchar(250) NOT NULL,
  `c_uname` varchar(50) NOT NULL,
  `c_pwd` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_phno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_fname`, `c_add`, `c_uname`, `c_pwd`, `c_email`, `c_phno`) VALUES
(1, 'guest', 'sample address', 'guest', '12345678', 'guest@guest.com', 9312345678),
(2, 'Gavin', 'Guirdolim Goa', '', '12345678', 'gavindacosta@gmail.com', 12345678),
(3, 'ascac', 'casca', 'xzcsc', 'acsca', 'scacasc@hac.com', 12345),
(4, 'Gavin Da Costa', 'Guirdolim Goa', 'gavin', '12345678', 'gavindacosta123@gmail.com', 9307325976),
(5, 'Wayne', 'Guirdolim Goa', 'wayne', '12345678', 'wayne@gmail.com', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `orderpayment`
--

CREATE TABLE `orderpayment` (
  `od_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `od_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `od_date` date NOT NULL,
  `od_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderstrack`
--

CREATE TABLE `orderstrack` (
  `od_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `track_id` int(11) NOT NULL,
  `track_status` varchar(50) DEFAULT NULL,
  `del_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pt_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `pt_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `p_desc` varchar(250) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `p_pic` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_desc`, `s_id`, `p_pic`, `b_id`, `p_qty`) VALUES
(1, 'Samsung Galaxy S22 Ultra', 85000, '5G Ready powered by Galaxy’s first 4nm processor. Our fastest, most powerful chip ever.', 3, 'samsung_galaxy_ultra.jpg', 12, 15),
(2, 'Apple iPhone 13', 50499, 'Advanced dual-camera system with 12MP Wide and Ultra Wide cameras; Photographic Styles, Smart HDR 4', 4, 'iphone 13.jpg', 11, 20),
(3, 'Realme GT Neo 3', 29999, ' 6.7 Inch Full HD+ | AMOLED Display, GT Neo 3 comes With a 120 Hz display and a touch sampling rate of up to 360 Hz', 3, 'realme_gt_neo_3.jpg', 13, 14),
(4, 'Apple iPhone 14 Pro', 139900, '15.54 cm (6.1-inch) Super Retina XDR display featuring Always-On and ProMotion. ', 4, 'apple_14_pro.jpg', 11, 16),
(5, 'Redmi Note 11T 5G', 12999, 'Processor: MediaTek Dimensity 810 Octa-core 5G processor based on 6nm process with HyperEngine 2.0 and clock speed up to 2.4GHz.', 3, 'redmi_note_11t_5g.jpg', 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_add` varchar(250) NOT NULL,
  `s_uname` varchar(50) NOT NULL,
  `s_pwd` varchar(20) NOT NULL,
  `s_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`s_id`, `s_name`, `s_add`, `s_uname`, `s_pwd`, `s_email`) VALUES
(3, 'Margao Electronics', 'Mayfair Apartment, Margao, Goa - 403601 (Near Margao Muncipality, Behind Canara Bank)', 'melectronics', '12345678', 'margaoelectronics@gmail.com'),
(4, 'Amey Retailer', 'Curtorim Goa', 'aretailer', '12345678', 'example123@gmail.com'),
(5, 'Patric And Sons', 'Quelosim Goa', 'patcolaco', '12345678', 'patriccolaco125@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`,`p_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_uname` (`c_uname`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD PRIMARY KEY (`od_id`,`pt_id`),
  ADD KEY `pt_id` (`pt_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `orderstrack`
--
ALTER TABLE `orderstrack`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `od_id` (`od_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_uname` (`s_uname`),
  ADD UNIQUE KEY `s_email` (`s_email`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderpayment`
--
ALTER TABLE `orderpayment`
  ADD CONSTRAINT `orderpayment_ibfk_1` FOREIGN KEY (`od_id`) REFERENCES `orders` (`od_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderpayment_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `payment` (`pt_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderstrack`
--
ALTER TABLE `orderstrack`
  ADD CONSTRAINT `orderstrack_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`),
  ADD CONSTRAINT `orderstrack_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `seller` (`s_id`),
  ADD CONSTRAINT `orderstrack_ibfk_3` FOREIGN KEY (`od_id`) REFERENCES `orders` (`od_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seller` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `brand` (`b_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
