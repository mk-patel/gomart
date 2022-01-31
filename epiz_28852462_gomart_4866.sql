-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql209.byetcluster.com
-- Generation Time: Jan 07, 2022 at 11:24 AM
-- Server version: 5.7.36-39
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28852462_gomart_4866`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(10) NOT NULL,
  `address_fullname` varchar(500) NOT NULL,
  `address_mobile` varchar(15) NOT NULL,
  `address_city` varchar(500) NOT NULL,
  `address_fulladdress` varchar(1000) NOT NULL,
  `address_postcode` varchar(7) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_fullname`, `address_mobile`, `address_city`, `address_fulladdress`, `address_postcode`, `user_id`) VALUES
(1, 'sankalp trimade', '7974897322', 'raipur', 'q-16 shri ram nagar phase-2', '492007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(1) NOT NULL,
  `ad_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_image`) VALUES
(1, 'images/61af0cf773af58.98159534.jpg'),
(2, 'images/61af0d022f00f3.07529202.jpg'),
(3, 'images/61af0d113f1f61.85075992.jpg'),
(4, 'images/61af0d227d2c52.02957910.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `cart_pr_id` int(10) NOT NULL,
  `cart_user_id` int(10) NOT NULL,
  `cart_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_pr_id`, `cart_user_id`, `cart_date`) VALUES
(1, 2, 1, '07 Dec 2021 13:06 PM');

-- --------------------------------------------------------

--
-- Table structure for table `cashback`
--

CREATE TABLE `cashback` (
  `cb_id` int(1) NOT NULL,
  `cb_cash_order` int(10) NOT NULL,
  `cb_cash_signup` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cashback`
--

INSERT INTO `cashback` (`cb_id`, `cb_cash_order`, `cb_cash_signup`) VALUES
(1, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ct_id` int(10) NOT NULL,
  `ct_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ct_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ct_id`, `ct_name`, `ct_image`) VALUES
(2, 'Grocery', 'images/61af0d9caf3b96.71673651.jpg'),
(3, 'Dairy', 'images/61af0daa959d24.07339887.jpg'),
(5, 'Veg', 'images/61af8c310c2517.69388238.jpg'),
(6, 'Fruits', 'images/61af8c3d8ec1b2.54834666.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `dlr_id` int(1) NOT NULL,
  `dlr_charge` varchar(50) NOT NULL,
  `dlr_time` varchar(100) NOT NULL,
  `dlr_charge_wallet` varchar(10) NOT NULL,
  `dlr_time_wallet` varchar(500) NOT NULL,
  `dlr_loc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`dlr_id`, `dlr_charge`, `dlr_time`, `dlr_charge_wallet`, `dlr_time_wallet`, `dlr_loc_id`) VALUES
(1, '20', 'within 3 hours', '10', 'within 2 hours', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fd_id` int(10) NOT NULL,
  `fd_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fd_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fd_mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fd_data` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fd_date` varchar(21) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `order_unique_id` int(11) NOT NULL,
  `order_product_id` varchar(1000) NOT NULL,
  `order_pricing` varchar(100) NOT NULL,
  `order_quantity` varchar(100) NOT NULL,
  `order_sum_amount` int(100) NOT NULL,
  `order_sum_quantity` int(100) NOT NULL,
  `order_sum_wallet` int(100) NOT NULL,
  `order_address` varchar(1000) NOT NULL,
  `order_user_id` varchar(10) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_user_status` varchar(50) NOT NULL,
  `order_status` int(2) NOT NULL,
  `cancellation_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_unique_id`, `order_product_id`, `order_pricing`, `order_quantity`, `order_sum_amount`, `order_sum_quantity`, `order_sum_wallet`, `order_address`, `order_user_id`, `order_date`, `order_user_status`, `order_status`, `cancellation_time`) VALUES
(1, 989290742, '2', '9', '1', 29, 1, 0, 'sankalp trimade, 7974897322, raipur, q-16 shri ram nagar phase-2, 492007', '1', '07 Dec 2021 13:07 PM', '0', 0, 'Not Cancelled Yet');

-- --------------------------------------------------------

--
-- Table structure for table `pass_request`
--

CREATE TABLE `pass_request` (
  `pass_id` int(10) NOT NULL,
  `pass_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass_mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pass_date` varchar(21) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pr_id` int(10) NOT NULL,
  `pr_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `pr_actual_price` varchar(10) NOT NULL,
  `pr_unit_actual` varchar(20) NOT NULL,
  `pr_effective_price` varchar(10) NOT NULL,
  `pr_unit_effective` varchar(20) NOT NULL,
  `pr_discount` varchar(10) NOT NULL,
  `pr_wallet_disc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `pr_desc` mediumtext CHARACTER SET utf8 NOT NULL,
  `pr_offers` varchar(1000) NOT NULL,
  `pr_category` varchar(10) CHARACTER SET utf8 NOT NULL,
  `pr_returns` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pr_status` int(1) NOT NULL,
  `pr_stock_count` int(10) NOT NULL,
  `pr_entry_date` varchar(21) NOT NULL,
  `pr_modifying_date` varchar(21) NOT NULL,
  `pr_image` varchar(100) NOT NULL,
  `pr_user_id` int(10) NOT NULL,
  `pr_loc_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pr_id`, `pr_name`, `pr_actual_price`, `pr_unit_actual`, `pr_effective_price`, `pr_unit_effective`, `pr_discount`, `pr_wallet_disc`, `pr_desc`, `pr_offers`, `pr_category`, `pr_returns`, `pr_status`, `pr_stock_count`, `pr_entry_date`, `pr_modifying_date`, `pr_image`, `pr_user_id`, `pr_loc_id`) VALUES
(1, 'CNC', '10', '1 packet', '9', '1 packet', '10', '1', 'CNC Biscuit', 'Buy 5 get 1 free', '2', 'Within 2 hours', 1, 20, '07 Dec 2021, 01:03 PM', 'none', 'images/61af0e411eca03.84968036.jpg', 1, 1),
(2, 'CNC', '10', '1 packet', '9', '1 packet', '10', '1', 'CNC Biscuit', 'Buy 5 get 1 free', '2', 'Within 2 hours', 1, 19, '07 Dec 2021, 01:03 PM', 'none', 'images/61af0e4a9b7104.93307222.jpg', 1, 1),
(3, 'Parle Magix', '5', '1 packet', '4', '1 packet', '20', '1', 'Parle Magix Biscuit', 'Buy 5 get 1 free', '2', 'Within 2 hours', 1, 20, '07 Dec 2021, 01:04 PM', 'none', 'images/61af0e6b998892.74529947.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `rt_id` int(10) NOT NULL,
  `rt_time` varchar(500) NOT NULL,
  `rt_loc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`rt_id`, `rt_time`, `rt_loc_id`) VALUES
(1, 'Within 2 hours', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_location`
--

CREATE TABLE `service_location` (
  `loc_id` int(10) NOT NULL,
  `loc_name` varchar(500) NOT NULL,
  `loc_district` varchar(500) NOT NULL,
  `loc_state` varchar(500) NOT NULL,
  `loc_pincode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_location`
--

INSERT INTO `service_location` (`loc_id`, `loc_name`, `loc_district`, `loc_state`, `loc_pincode`) VALUES
(1, 'Bhilai', 'Durg', 'Chhattisgarh', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_request`
--

CREATE TABLE `subscription_request` (
  `sb_id` int(10) NOT NULL,
  `sb_wlt_id` varchar(10) NOT NULL,
  `sb_date` varchar(21) NOT NULL,
  `sb_status` int(1) NOT NULL,
  `sb_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription_request`
--

INSERT INTO `subscription_request` (`sb_id`, `sb_wlt_id`, `sb_date`, `sb_status`, `sb_user_id`) VALUES
(1, '1', '07 Jan 2022 19:58 PM', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_wallet_owner` int(1) NOT NULL,
  `user_wallet` varchar(100) NOT NULL,
  `user_wallet_expiry` varchar(21) NOT NULL,
  `user_full_name` varchar(200) NOT NULL,
  `user_dob` varchar(20) NOT NULL,
  `user_gender` varchar(6) NOT NULL,
  `user_loc_id` int(10) NOT NULL,
  `user_entry_date` varchar(21) NOT NULL,
  `user_update_date` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `mobile_number`, `password`, `role`, `user_wallet_owner`, `user_wallet`, `user_wallet_expiry`, `user_full_name`, `user_dob`, `user_gender`, `user_loc_id`, `user_entry_date`, `user_update_date`) VALUES
(1, '1234567890', 'adcd7048512e64b48da55b027577886ee5a36350', 'superadmin89', 0, '0', '0', 'Manish Patel', '17-03-1999', 'male', 1, '05 Dec 2021, 07:58 PM', '05 Dec 2021, 08:19 PM'),
(2, '8269982648', '2e25e7d0559eea1d73912895423359489e514c81', 'none', 0, '50', '0', 'Teshu Gaurav Singh', '00-00-0000', 'male', 1, '07 Dec 2021, 09:53 PM', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wlt_id` int(10) NOT NULL,
  `wlt_rupees` varchar(100) NOT NULL,
  `wlt_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wlt_id`, `wlt_rupees`, `wlt_amount`) VALUES
(1, '500', '520');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recharges`
--

CREATE TABLE `wallet_recharges` (
  `wr_id` int(10) NOT NULL,
  `wr_rupees` varchar(50) NOT NULL,
  `wr_amount` varchar(50) NOT NULL,
  `wr_user_id` int(10) NOT NULL,
  `wr_date` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transaction`
--

CREATE TABLE `wallet_transaction` (
  `wtrsn_id` int(20) NOT NULL,
  `wtrsn_amount` varchar(100) NOT NULL,
  `wtrsn_date` varchar(21) NOT NULL,
  `wtrsn_type` varchar(100) NOT NULL,
  `wtrsn_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet_transaction`
--

INSERT INTO `wallet_transaction` (`wtrsn_id`, `wtrsn_amount`, `wtrsn_date`, `wtrsn_type`, `wtrsn_user_id`) VALUES
(1, '+50', '07 Dec 2021, 09:53 PM', 'signup bonus', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cashback`
--
ALTER TABLE `cashback`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`dlr_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pass_request`
--
ALTER TABLE `pass_request`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `service_location`
--
ALTER TABLE `service_location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `subscription_request`
--
ALTER TABLE `subscription_request`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wlt_id`);

--
-- Indexes for table `wallet_recharges`
--
ALTER TABLE `wallet_recharges`
  ADD PRIMARY KEY (`wr_id`);

--
-- Indexes for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD PRIMARY KEY (`wtrsn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashback`
--
ALTER TABLE `cashback`
  MODIFY `cb_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ct_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `dlr_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fd_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pass_request`
--
ALTER TABLE `pass_request`
  MODIFY `pass_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `rt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_location`
--
ALTER TABLE `service_location`
  MODIFY `loc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_request`
--
ALTER TABLE `subscription_request`
  MODIFY `sb_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wlt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet_recharges`
--
ALTER TABLE `wallet_recharges`
  MODIFY `wr_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  MODIFY `wtrsn_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
