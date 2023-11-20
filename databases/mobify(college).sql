-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 08:56 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_username` varchar(50) NOT NULL,
  `adm_password` varchar(50) NOT NULL,
  `adm_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_username`, `adm_password`, `adm_name`) VALUES
('admin', 'admin123', 'Gavin Da Costa');

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
(14, 'Redmi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `buy_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'Wayne', 'Guirdolim Goa', 'wayne', '12345678', 'wayne@gmail.com', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `customerproduct`
--

CREATE TABLE `customerproduct` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `buy_qty` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `cp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerproduct`
--

INSERT INTO `customerproduct` (`c_id`, `p_id`, `buy_qty`, `od_id`, `cp_id`) VALUES
(5, 1, 3, 5, 1),
(5, 7, 7, 5, 2),
(5, 1, 5, 7, 4),
(5, 7, 7, 7, 5),
(5, 1, 1, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orderpayment`
--

CREATE TABLE `orderpayment` (
  `od_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderpayment`
--

INSERT INTO `orderpayment` (`od_id`, `pt_id`) VALUES
(7, 10),
(8, 11);

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`od_id`, `c_id`, `od_date`, `od_price`) VALUES
(7, 5, '2023-11-20', 508993),
(8, 5, '2023-11-20', 85000);

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
  `pt_total` float DEFAULT NULL,
  `txn_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pt_id`, `c_id`, `pt_total`, `txn_id`) VALUES
(10, 5, 508993, '1234567895252'),
(11, 5, 85000, 'abcd12345233');

-- --------------------------------------------------------

--
-- Stand-in structure for view `paymentview`
-- (See below for the actual view)
--
CREATE TABLE `paymentview` (
`pt_id` int(11)
,`txn_id` varchar(50)
,`od_id` int(11)
,`pt_total` float
,`c_fname` varchar(50)
,`c_uname` varchar(50)
,`c_email` varchar(50)
);

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
(1, 'Samsung Galaxy S22 Ultra', 85000, '5G Ready powered by Galaxy’s first 4nm processor. Our fastest, most powerful chip ever.', 3, 'samsung_galaxy_ultra.jpg', 12, 16),
(7, 'Redmi 12 5G Jade Black', 11999, 'Snapdragon 4 Gen 2 Mobile Platform : Power efficient 4nm architecture', 3, 'Redmi 12 5G.jpg', 14, 12);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `t1` BEFORE DELETE ON `product` FOR EACH ROW BEGIN
INSERT into productbackup(pb_id,pb_name,p_desc,p_pic,p_price,p_qty,b_id,s_id) VALUES(old.p_id,old.p_name,old.p_desc,old.p_pic,old.p_price,old.p_qty,old.b_id,old.s_id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productbackup`
--

CREATE TABLE `productbackup` (
  `pb_id` int(11) NOT NULL,
  `pb_name` varchar(50) DEFAULT NULL,
  `p_price` float DEFAULT NULL,
  `p_desc` varchar(250) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `p_pic` varchar(255) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `p_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productbackup`
--

INSERT INTO `productbackup` (`pb_id`, `pb_name`, `p_price`, `p_desc`, `s_id`, `p_pic`, `b_id`, `p_qty`) VALUES
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
(3, 'Margao Electronics', 'Mayfair Apartment, Margao, Goa - 403601 (Near Margao Muncipality, Behind Canara Bank)', 'melectronics', '12345678', 'margaoelectronics@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `paymentview`
--
DROP TABLE IF EXISTS `paymentview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paymentview`  AS SELECT `p`.`pt_id` AS `pt_id`, `p`.`txn_id` AS `txn_id`, `op`.`od_id` AS `od_id`, `p`.`pt_total` AS `pt_total`, `c`.`c_fname` AS `c_fname`, `c`.`c_uname` AS `c_uname`, `c`.`c_email` AS `c_email` FROM ((`payment` `p` join `orderpayment` `op` on(`p`.`pt_id` = `op`.`pt_id`)) join `customer` `c` on(`c`.`c_id` = `p`.`c_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_username`);

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
-- Indexes for table `customerproduct`
--
ALTER TABLE `customerproduct`
  ADD PRIMARY KEY (`cp_id`);

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
-- Indexes for table `productbackup`
--
ALTER TABLE `productbackup`
  ADD PRIMARY KEY (`pb_id`);

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
-- AUTO_INCREMENT for table `customerproduct`
--
ALTER TABLE `customerproduct`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderstrack`
--
ALTER TABLE `orderstrack`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
