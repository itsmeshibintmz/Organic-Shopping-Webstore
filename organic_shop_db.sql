-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 11:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organic_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `caid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `cart_qunty` varchar(11) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `old_stock` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_info`
--

CREATE TABLE `tbl_bank_info` (
  `bank_info_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name_on_card` varchar(10) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `CVV` varchar(10) NOT NULL,
  `expiration_date` varchar(10) NOT NULL,
  `balance_amount` decimal(10,0) NOT NULL,
  `status` varchar(10) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank_info`
--

INSERT INTO `tbl_bank_info` (`bank_info_id`, `user_type_id`, `name_on_card`, `card_number`, `CVV`, `expiration_date`, `balance_amount`, `status`, `otp`) VALUES
(1, 2, 'Anu', '4532123485', '497', '12/22', '54134', 'VALID', '1948929281'),
(2, 3, 'Seller', '5674565545675645', '498', '13/23', '62248', 'VALID', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `caid` int(11) NOT NULL,
  `email` varchar(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `qunty` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `category`, `status`) VALUES
(1, 'vegetables', '1'),
(2, 'fruits', 'VAlid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `complaints_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customer_order` int(11) NOT NULL,
  `stock_product_id` int(11) NOT NULL,
  `complaint_message` varchar(100) NOT NULL,
  `replay_message` varchar(50) NOT NULL DEFAULT 'Not Yet Replied',
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaints_id`, `email`, `customer_order`, `stock_product_id`, `complaint_message`, `replay_message`, `status`) VALUES
(5, 'anjalygeorge2023@gmail.com', 50, 1, 'not', 'Not Yet Replied', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_delv_address`
--

CREATE TABLE `tbl_customer_delv_address` (
  `delv_adres_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `Mobile number` varchar(20) NOT NULL,
  `address_line` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `town_city` varchar(30) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `address_type` varchar(10) NOT NULL,
  `status5` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_delv_address`
--

INSERT INTO `tbl_customer_delv_address` (`delv_adres_id`, `email`, `fname`, `Mobile number`, `address_line`, `landmark`, `town_city`, `pin_code`, `address_type`, `status5`) VALUES
(35, 'anjalygeorge2023@gmail.com', 'anjaly', '8765434567', 'pala', 'near temple', 'pala', '686581', '2', 'VALID');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order`
--

CREATE TABLE `tbl_customer_order` (
  `customer_order_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `stock_product_id` int(10) NOT NULL,
  `delv_adres_id` int(10) NOT NULL,
  `purchase_qty` int(10) NOT NULL,
  `purchase_price` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `status` varchar(15) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_order`
--

INSERT INTO `tbl_customer_order` (`customer_order_id`, `email`, `stock_product_id`, `delv_adres_id`, `purchase_qty`, `purchase_price`, `order_date`, `delivery_date`, `status`, `otp`) VALUES
(50, 'anjalygeorge2023@gmail.com', 1, 35, 1, '10', '2020-07-08 22:31:26', '2020-07-08', 'DISPATCHED', ''),
(52, 'anjalygeorge2023@gmail.com', 1, 35, 1, '10', '2020-07-09 13:16:19', '2020-07-09', 'order placed', ''),
(53, 'anjalygeorge2023@gmail.com', 2, 35, 10, '500', '2020-07-09 13:16:19', '2020-07-09', 'DISPATCHED', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivary`
--

CREATE TABLE `tbl_delivary` (
  `did` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `named` varchar(10) NOT NULL,
  `email1` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_delivary`
--

INSERT INTO `tbl_delivary` (`did`, `rid`, `named`, `email1`, `address`, `city`, `state`, `zip`, `status`) VALUES
(1, 11, 'asdgh', 'a@gmail.co', 'wertyujik\r\nsrtyhjk\r\nertyu\r\ntyujkl\r\nrtyui\r\nrtyu\r\n', 'tr', 'u', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `email` varchar(30) NOT NULL,
  `user_type_id` int(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`email`, `user_type_id`, `password`, `status`) VALUES
('admin@gmail.com', 1, 'Admin123*', 'ACTIVE'),
('albin@gmail.com', 3, 'Albin@123', 'ACTIVE'),
('ammu@gmail.com', 2, 'Ammu@123', 'ACTIVE'),
('anil@gmail.com', 2, 'Anil@123', 'ACTIVE'),
('anjalygeorge2023@gmail.com', 2, 'Anjaly@96', 'ACTIVE'),
('ashbin@gmail.com', 3, 'Ashbin@123', 'ACTIVE'),
('charly@gmail.com', 2, 'Charly@123', 'ACTIVE'),
('chinnu@gmail.com', 2, 'Chinnu@123', 'ACTIVE'),
('sophy@gmail.com', 3, 'Sophy@123', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pyid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `caid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `des` text NOT NULL,
  `qunty` float NOT NULL,
  `date` date NOT NULL,
  `image` varchar(20) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `rid`, `product_category_id`, `name`, `price`, `des`, `qunty`, `date`, `image`, `picStatus`) VALUES
(1, 24, 9, 'chilly', '10', 'organic product', 19, '2020-07-10', 'h2.jpg', 0),
(2, 22, 9, 'orange', '50', 'good', 0, '2020-07-11', 'o1.jpg', 0),
(3, 24, 9, 'mango', '100', 'goog', 10, '2020-07-11', 'b2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `product_category_id` int(11) NOT NULL,
  `prod_category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`product_category_id`, `prod_category_name`) VALUES
(9, 'fruits'),
(23, 'Vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `rid` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `images` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`rid`, `fname`, `lname`, `phone_no`, `email`, `place`, `images`) VALUES
(1, 'ammu', 'Admin', '8765434567', 'admin@gmail.com', 'Kottayam', 'e.jpg'),
(20, 'ashbin', 'eli', '2345678765', 'ashbin@gmail.com', 'pala', 'c.jpg'),
(21, 'AMMU', 'george', '8157032365', 'ammu@gmail.com', 'poonjar', 'c.jpg'),
(22, 'albin', 'george', '9874563012', 'albin@gmail.com', 'poonjar', 'b.jpg'),
(24, 'sophy', 'grorge', '8765434567', 'sophy@gmail.com', 'poonjar', 'f.jpg'),
(25, 'anil', 'base', '3456787654', 'anil@gmail.com', 'pala', 'd.jpg'),
(26, 'chinnu', 'df', '3456787654', 'chinnu@gmail.com', 'pala', 'c.jpg'),
(29, 'charly', 'base', '3456787654', 'charly@gmail.com', 'pala', 'b.jpg'),
(30, 'anjaly', 'base', '8157643456', 'anjalygeorge2023@gmail.com', 'pala', 'g.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller_updated_order`
--

CREATE TABLE `tbl_seller_updated_order` (
  `updated_order_id` int(11) NOT NULL,
  `customer_order_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deliver_on` datetime NOT NULL,
  `additional_cost` decimal(10,0) NOT NULL,
  `dispatched_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seller_updated_order`
--

INSERT INTO `tbl_seller_updated_order` (`updated_order_id`, `customer_order_id`, `email`, `deliver_on`, `additional_cost`, `dispatched_date`, `status`) VALUES
(46, 50, 'sophy@gmail.com', '2020-07-10 00:00:00', '10', '2020-07-09 09:39:17', 'DISPATCHED'),
(47, 53, 'albin@gmail.com', '2020-07-10 00:00:00', '10', '2020-07-09 13:31:07', 'DISPATCHED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(10) NOT NULL,
  `user_type_name` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_name`, `status`) VALUES
(1, 'admin', 'ACTIVE'),
(2, 'customer', 'ACTIVE'),
(3, 'seller', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `email` (`email`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `tbl_bank_info`
--
ALTER TABLE `tbl_bank_info`
  ADD PRIMARY KEY (`bank_info_id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `email` (`email`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`complaints_id`),
  ADD KEY `customer_order` (`customer_order`),
  ADD KEY `stock_product_id` (`stock_product_id`);

--
-- Indexes for table `tbl_customer_delv_address`
--
ALTER TABLE `tbl_customer_delv_address`
  ADD PRIMARY KEY (`delv_adres_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  ADD PRIMARY KEY (`customer_order_id`),
  ADD KEY `delv_adres_id` (`delv_adres_id`),
  ADD KEY `stock_product_id` (`stock_product_id`);

--
-- Indexes for table `tbl_delivary`
--
ALTER TABLE `tbl_delivary`
  ADD PRIMARY KEY (`did`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`email`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pyid`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_seller_updated_order`
--
ALTER TABLE `tbl_seller_updated_order`
  ADD PRIMARY KEY (`updated_order_id`),
  ADD KEY `customer_order_id` (`customer_order_id`),
  ADD KEY `seller_register_email` (`email`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `caid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_bank_info`
--
ALTER TABLE `tbl_bank_info`
  MODIFY `bank_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `caid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `complaints_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer_delv_address`
--
ALTER TABLE `tbl_customer_delv_address`
  MODIFY `delv_adres_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  MODIFY `customer_order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_delivary`
--
ALTER TABLE `tbl_delivary`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pyid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_seller_updated_order`
--
ALTER TABLE `tbl_seller_updated_order`
  MODIFY `updated_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbl_login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `tbl_product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bank_info`
--
ALTER TABLE `tbl_bank_info`
  ADD CONSTRAINT `tbl_bank_info_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `tbl_user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbl_login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `tbl_product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD CONSTRAINT `tbl_complaints_ibfk_1` FOREIGN KEY (`customer_order`) REFERENCES `tbl_customer_order` (`customer_order_id`),
  ADD CONSTRAINT `tbl_complaints_ibfk_2` FOREIGN KEY (`stock_product_id`) REFERENCES `tbl_product` (`pid`);

--
-- Constraints for table `tbl_customer_delv_address`
--
ALTER TABLE `tbl_customer_delv_address`
  ADD CONSTRAINT `tbl_customer_delv_address_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbl_login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  ADD CONSTRAINT `tbl_customer_order_ibfk_1` FOREIGN KEY (`delv_adres_id`) REFERENCES `tbl_customer_delv_address` (`delv_adres_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_customer_order_ibfk_2` FOREIGN KEY (`stock_product_id`) REFERENCES `tbl_product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `tbl_user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `tbl_product_category` (`product_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD CONSTRAINT `tbl_registration_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbl_login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
